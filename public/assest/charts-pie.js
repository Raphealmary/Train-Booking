/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
$.ajax({
  type: "get",
  url: "/adminget-chart-seat",
  success: function (response) {
    //chatjs
    const pieConfig = {
      type: 'doughnut',
      data: {
        datasets: [
          {
            data: response.map(it => it.total),
            //data: ,

            backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
            label: 'Dataset 1',
          },
        ],
        labels: response.map(it => it.coach.coach_type),
      },
      options: {
        responsive: true,
        cutoutPercentage: 80,

        legend: {
          display: true,
        },
      },
    }
    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')
    window.myPie = new Chart(pieCtx, pieConfig)

  }

});


