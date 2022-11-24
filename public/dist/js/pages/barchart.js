var ctx = document.getElementById("grafikBulanan").getContext('2d');
var grafikBulanan = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: '#5ABC70',
          borderColor: '#5ABC70',
          borderWidth: 1
      }]
  },
  options: {
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true
              }
          }]
      }
  }
});

// const myChart = new Chart(document.getElementById("grafikBulanan"), config);