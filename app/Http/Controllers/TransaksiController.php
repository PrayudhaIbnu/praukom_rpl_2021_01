<?php

namespace App\Http\Controllers;

// use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenjualan;
use App\Models\Struk;
use App\Models\Penjualan;
use App\Models\Produk;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function index()
    {
        $produk = DB::select('SELECT id_produk, nama_produk FROM produk');

        $items = \Cart::getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });

        if (\Cart::isEmpty()) {
            $cartData = [];
        } else {
            foreach ($items as $item) {
                $cart[] = [
                    'rowId' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->quantity,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                ];
            }

            $cartData = collect($cart);
        }
        // dd($cartData);
        $sub_total = \Cart::getSubTotal();
        $total = \Cart::getTotal();

        $summary = [
            'sub_total' => $sub_total,
            'total' => $total
        ];

        return view(
            'Kasir.transaksi',
            [
                'produk' => $produk,
                'carts' => $cartData,
                'summary' => $summary
            ]
        );
    }

    // untuk detail transaksi role kasir dan pengawas
    public function DetailTransaksi($id)
    {
        $id_struk = DB::select("SELECT * FROM detail_transaksi WHERE id_struk = '$id'");
        // dd($id_struk);
        return view('components.cetakpdf.detailtransaksi', compact('id_struk'));
    }

    public function addItem(Request $request)
    {
        $rowId = $request->input('produk');
        if ($request->input('produk') == null) {
            $rowId = $request->input('barcode');
        }
        // dd($rowId);

        $cart = \Cart::getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        $cekQtyId = \Cart::get($rowId);
        // dd($cekQtyId);

        $product = Produk::find($rowId);
        if (!$product) {
            return redirect()->back()->with('warning', 'Produk Tidak Tersedia!');
        }
        // dd($cekItemId);
        if ($rowId == null) {
            return redirect()->back()->with('warning', 'Input Produk Terlebih Dahulu!');
        }
        if ($request->input('qty') < 1) {
            return redirect()->back()->with('warning', 'Input Jumlah
            Terlebih Dahulu (Minimal 1)!');
        } else {
            if ($product->stok < $request->input('qty')) {
                // session()->flash('error', 'Error:  Tidak dapat input stok (Melebihi Stok!)');
                return redirect()->back()->with('warning', 'Tidak dapat input stok (Stok Habis!)');
            } else {
                if ($cekItemId->isNotEmpty()) {
                    if ($product->stok < $request->input('qty')) {
                        return redirect()->back()->with('warning', 'Tidak dapat input stok (Melebihi Stok!)');
                    } else {
                        \Cart::update($rowId, [
                            'quantity' => [
                                'relative' => true,
                                'value' => $request->input('qty')
                            ]
                        ]);
                    }
                } else {
                    if ($product->stok == 0) {
                        return redirect()->back()->with('warning', 'Stok tidak cukup');
                    } else {
                        \Cart::add([
                            'id' => $product->id_produk,
                            'name' => $product->nama_produk,
                            'price' => $product->harga_jual,
                            'quantity' => $request->input('qty'),
                            'attributes' => [
                                'added_at' => Carbon::now()
                            ],
                        ]);
                    }
                    // \Cart::clear();
                }
            }
        }
        return redirect()->back();
    }




    // Tambahin QTY
    public function increaseItem(Request $request)
    {
        $rowId = $request->input('id');
        $product = Produk::find($rowId);
        $cart = \Cart::getContent();
        // dd($cart);

        $checkItem = $cart->whereIn('id', $rowId);

        if ($product->stok == $checkItem[$rowId]->quantity || $product->stok == 1) {
            return redirect()->back()->with('warning', 'Jumlah item kurang');
        } else {
            \Cart::update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => 1
                ]
            ]);
        }
        return redirect()->back();
    }

    // Kurangin QTY
    public function decreaseItem(Request $request)
    {
        $rowId = $request->input('id');
        $product = Produk::find($rowId);

        $cart = \Cart::getContent();

        $checkItem = $cart->whereIn('id', $rowId);

        if ($checkItem[$rowId]->quantity == 1) {
            \Cart::remove($request->input('id'));
        } else {
            \Cart::update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => -1
                ]
            ]);
        }
        return redirect()->back();
    }

    public function removeItem(Request $request)
    {
        \Cart::remove($request->input('id'));
        return redirect()->back();
    }

    public function handleSubmit(Request $request)
    {
        $cartTotal = \Cart::getTotal();
        $bayar = $request->input('tunai');
        $kembalian = $request->input('kembalian');
        if ($kembalian >= 0) {
            DB::beginTransaction();

            try {
                $allCart = \Cart::getContent();
                // dd($allCart);
                $filterCart = $allCart->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'quantity' => $item->quantity,
                        'price' => $item->getPriceSum()
                    ];
                });

                // dd($filterCart);
                foreach ($filterCart as $cart) {
                    $product = Produk::find($cart['id']);
                    // dd($product->stok);
                    // dd($cart['quantity']);

                    if ($product->stok === 0) {
                        return redirect()->back()->with('warning', 'Jumlah item kurang');
                    }
                    if ($product->stok < $cart['quantity']) {
                        return redirect()->back()->with('warning', $cart['name'] . ' Tidak dapat input stok (Melebihi Stok!)');
                    }
                    $product->decrement('stok', $cart['quantity']);

                    $product->increment('terjual', $cart['quantity']);
                }

                $id_penjualan = IdGenerator::generate([
                    'table' => 'penjualan',
                    'field' => 'id_penjualan',
                    'length' => 13,
                    'prefix' => 'INV-',
                ]);
                // dd($id_penjualan);
                $date =  date('ymdHi');
                $prefix = 'OD' . $date;
                $id_struk = IdGenerator::generate([
                    'table' => 'struk',
                    'field' => 'id_struk',
                    'length' => 12,
                    'prefix' => $prefix,
                ]);

                //harusnya ada field user => Auth()->user()->id(),
                Penjualan::create([
                    'id_penjualan' => $id_penjualan,
                    'tanggal' => Carbon::now(),
                    'jam_jual' => date('H:i:s'),
                    'kasir' => Session::get('levelbaru')->id
                ]);

                Struk::create([
                    'id_struk' => $id_struk,
                    'penjualan' => $id_penjualan,
                    'jml_tunai' => $bayar,
                    'jml_kembalian' => $kembalian,
                    'grand_total' => $cartTotal,
                    'kasir' => Session::get('levelbaru')->id
                ]);

                foreach ($filterCart as $cart) {
                    DetailPenjualan::create([
                        'produk' => $cart['id'],
                        'penjualan' => $id_penjualan,
                        'qty' => $cart['quantity'],
                        'sub_total_hrg' => $cart['price']
                    ]);
                }

                // foreach ($filterCart as $cart) {
                //     BarangKeluar::create([
                //         'produk' => $cart['id'],
                //         'qty' => $cart['quantity'],
                //         'tanggal_keluar' => Carbon::now(),
                //         'keterangan' => 'Transaksi'
                //     ]);
                // }
                \Cart::clear();

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                // dd($th);
                return redirect()->back()->with('error', $th);
            }

            return redirect()->back()->with('success', "Transaksi Berhasil!");
        }
    }
}    

// SELECT produk, tanggal_masuk, SUM(qty) FROM barang_masuk GROUP BY produk;