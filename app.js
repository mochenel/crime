$(document).ready(function(){
  $.ajax({
    url: "http://localhost/cosc300/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
     var crime= [];
      var frequency = [];

      for(var i in data) {
        crime.push(data[i].police_username);
        frequency.push(Math.round(data[i].frequency));
      }

      var chartdata = {
        labels: crime,
        datasets : [
          {
            label: 'crime',
            backgroundColor: 'rgba(150, 00, 100, 0.85)',
            borderColor: 'rgba(200, 200, 200, 0.45)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: frequency
          }
        ]

      };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "investigators who are currently working on cases",
      fontSize: 18,
      fontColor: "#111"
    },
    
    scales: {
      yAxes: [{
        ticks: {
          min: 0
        }
      }]
    }
  };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options:options
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
