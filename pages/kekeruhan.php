<?php require_once './_init.php';

use lib\Component;
use models\Kekeruhan;

$data = array_map(fn ($kekeruhan) => [$kekeruhan->waktu, $kekeruhan->nilai], Kekeruhan::getAll());
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <?= Component::render('BaseNavbar') ?>

  <main class="container py-4">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Grafik Kekeruhan Air</h5>

            <hr>

            <div id="grafik"></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('grafik', {
        chart: {
          type: 'area'
        },
        title: {
          text: 'Kekeruhan Air'
        },
        subtitle: {
          text: 'Latihan Highcharts'
        },
        yAxis: {
          title: {
            text: 'Nilai Kekeruhan'
          }
        },
        xAxis: {
          type: 'category',
          accessibility: {
            rangeDescription: 'Waktu'
          }
        },
        tooltip: {
          pointFormat: '{point.y} NTU',
          shared: true
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },
        plotOptions: {
          area: {
            fillColor: {
              linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
              stops: [
                [0, '#FA0'],
                [1, '#FFF']
              ]
            }
          }
        },
        series: [{
          name: 'Kekeruhan Air',
          data: JSON.parse('<?= json_encode($data) ?>'),
        }],
        responsive: {
          rules: [{
            condition: {
              maxWidth: 500
            },
            chartOptions: {
              legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
              }
            }
          }]
        }
      });
    });
  </script>
</body>

</html>
