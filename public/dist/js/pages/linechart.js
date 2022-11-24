// var labels = ["satu", "dua", "tiga"];
// var users = [100, 200, 300];
// const data = {
//     labels: labels,
//     datasets: [
//         {
//             label: "My First dataset",
//             backgroundColor: ["#E53945", "#52499C", "#00798C", "#EDAD49"],
//             borderColor:[ "#E53945", "#52499C", "#00798C", "#EDAD49"],
//             fill: false,
//             data: users,
//         },
//     ],
// };

// const config = {
//     type: "pie  ",
//     data: data,
//     options: {},
// };

// const myChart = new Chart(document.getElementById("myChart"), config);


var labels = ["satu", " ", "tiga"];
var users = [100, 200, 300];
const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: ["#E53945", "#52499C", "#00798C", "#EDAD49"],
            borderColor: ["#E53945", "#52499C", "#00798C", "#EDAD49"],
            fill: false,
            data: users,
        },
    ],
};

const config = {
    type: "pie",
    data: data,
    options: {},
};

const myChart = new Chart(document.getElementById("myChart"), config);