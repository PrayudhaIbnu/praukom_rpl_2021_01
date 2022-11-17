var labels = ["satu", "dua", "tiga"];
var users = [100, 200, 300];
const data = {
    labels: labels,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: ["rgb(255, 99, 132)", "#fff"],
            borderColor: "rgb(255, 99, 132)",
            fill: false,
            data: users,
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {},
};

const myChart = new Chart(document.getElementById("myChart"), config);
