// document.querySelector("#search-input").addEventListener("input", filterList);

// function filterList() {
//     const searchInput = document.querySelector("#search-input");
//     const filter = searchInput.value.toLowerCase();
//     const listItems = document.querySelectorAll(".list-group-item");

//     listItems.forEach((item) => {
//         let text = item.textContent;
//         if (text.toLowerCase().includes(filter.toLowerCase())) {
//             item.style.display = "";
//         } else {
//             item.style.display = "none";
//         }
//     });
// }

const searchInput = document.getElementById("search-input");
const rows = document.querySelectorAll("tbody tr");
console.log(rows);
searchInput.addEventListener("keyup", function (e) {
    const q = e.target.value.toLowerCase();
    // console.log(q);
    rows.forEach((row) => {
        row.querySelector("#s").textContent.toLowerCase().startsWith(q)
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
    });
});
