// var ctx = document.getElementById("grafikBulanan").getContext("2d");
// var grafikBulanan = new Chart(ctx, {
//     type: "bar",
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [
//             {
//                 label: "# of Votes",
//                 data: [12, 19, 3, 5, 2, 3],
//                 backgroundColor: "#5ABC70",
//                 borderColor: "#5ABC70",
//                 borderWidth: 1,
//             },
//         ],
//     },
//     options: {
//         scales: {
//             yAxes: [
//                 {
//                     ticks: {
//                         beginAtZero: true,
//                     },
//                 },
//             ],
//         },
//     },
// });

var labels = [];
var users = [100, 200, 300, 400, 500];
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
    type: "bar",
    data: data,
    options: {
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                    },
                },
            ],
        },
    },
};

const myChart = new Chart(document.getElementById("grafikBulanan"), config);
