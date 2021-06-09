<?php require_once './_init.php';

use lib\Component;
use models\Tma;

$data = array_map(fn ($tma) => [$tma->waktu, $tma->nilai], Tma::getAll());
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
            <h5 class="card-title">Grafik Tinggi Permukaan Air</h5>

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
          zoomType: 'x'
        },
        title: {
          text: 'Tinggi Muka Air'
        },
        subtitle: {
          text: 'Latihan Highcharts'
        },
        yAxis: {
          title: {
            text: 'Nilai Ketinggian'
          }
        },
        xAxis: {
          type: 'category',
          accessibility: {
            rangeDescription: 'Waktu'
          }
        },
        tooltip: {
          pointFormat: '{point.y} Meter'
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },
        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            }
          }
        },
        series: [{
          name: 'Tinggi Muka Air',
          lineWidth: 2,
          data: JSON.parse('<?= json_encode($data) ?>')
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
