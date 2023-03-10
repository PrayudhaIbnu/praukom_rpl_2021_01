<x-app-layout>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            /* border-style: dashed; */
            border-top: 1px dashed rgb(0 0 0);
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
     @section('title')
     Struk
     @endsection
    <div class="card my-3 mx-auto border" style="width: 25rem;" >
        <div class="card-body mx-2" >
            {{-- <div class="container"> --}}
                <div class="header" style="margin-bottom: 30px;">
                    <img src="/img/logoblud.png" alt="Logo BLUD" class="img" style="width: 15%">
                    <h2>One Mart</h2>
                    <small class="opacity-50">SMK Negeri 1 Kota Bekasi</small>
                </div>
                <hr>
                <div class="row">
                    <div class="col ">
                        <ul>
                            <li class="fw-semibold">No Order</li>
                            <li class="fw-semibold">Kasir</li>
                            <li class="fw-semibold">Tanggal/Jam</li>
                        </ul>
                    </div>
                    <div class="col text-right">
                        <ul>
                            <li> {{ $id_struk[0]->id_struk }} </li>
                            <li> {{ $id_struk[0]->nama}} </li>
                            <li> {{ $id_struk[0]->tanggal}}/{{ $id_struk[0]->jam_jual}} </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <table class="table table-borderless" style="padding: 0;">
                    <thead>
                      <tr>
                        <td class="opacity-40 text-left p-0 pb-2 fw-semibold">Produk</td>
                        <td class="opacity-40 text-center p-0 pb-2 pr-2 fw-semibold">Harga Satuan</td>
                        <td class="opacity-40 text-right p-0 pb-2 fw-semibold">Subtotal</td>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($id_struk as $item)
                        <tr>
                            <td class="text-left p-0">{{ $item->qty }}x {{ $item->nama_produk }}</td>
                            <td  class="text-center p-0">{{ number_format($item->harga_jual) }}</td>
                            <td class="text-right p-0">{{ number_format($item->sub_total_hrg) }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                {{-- @endforeach --}}
                <hr>
                <hr>
                <div class="row " style="text-align: right; margin-top: 10px;">
                    <div></div>
                    <div class="col">
                        <ul>
                            <li class="fw-semibold">Grand Total</li>
                            <li class="fw-semibold">Pembayaran</li>
                            <li class="fw-semibold">Kembalian</li>
                        </ul>
                    </div>
                    <div class="col" style="text-align: right;">
                        <ul>
                            <li>Rp  {{ number_format($id_struk[0]->grand_total) }} </li>
                            <li>Rp {{ number_format($id_struk[0]->jml_tunai) }} </li>
                            <li>Rp {{ number_format($id_struk[0]->jml_kembalian) }} </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="header" style="margin-top: 40px;">
                    <h3>Terimakasih</h3>
                    <p>Silahkan berkunjung kembali</p>
                </div>
            {{-- </div> --}}
        </div>
      </div>
</x-app-layout>
<script>
    window.print()
</script>