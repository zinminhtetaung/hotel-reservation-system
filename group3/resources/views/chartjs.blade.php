@extends('layouts.app')
@section('content')
<h1 class="head">Monthly Checked In Reservation</h1>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          <canvas id="canvas" height="280" width="600"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset ('js/lib/Chart.min.js')}}"></script>
<script>
  var months = <?php echo $months; ?>;
  var reservation = <?php echo $reservations; ?>;
  var barChartData = {
    labels: months,
    datasets: [{
      label: 'Reservations',
      backgroundColor: "#364E68",
      data: reservation
    }]
  };

  window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: 'bar',
      data: barChartData,
      options: {
        elements: {
          rectangle: {
            borderWidth: 2,
            borderColor: '#EBF0F6',
            borderSkipped: 'bottom'
          }
        },
        responsive: true,
        title: {
          display: true,
          text: 'Monthly Check In Reservations'
        }
      }
    });
  };
</script>
@endsection