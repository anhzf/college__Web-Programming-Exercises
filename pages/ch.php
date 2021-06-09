<?php require_once './_init.php';

use lib\Component;
use models\Ch;

$data = array_map(fn ($ch) => [$ch->waktu, $ch->nilai], Ch::getAll());
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
            <h5 class="card-title">Grafik Curah Hujan</h5>

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
          type: 'column',
        },
        title: {
          text: 'Curah Hujan'
        },
        subtitle: {
          text: 'Latihan Highcharts'
        },
        yAxis: {
          title: {
            text: 'Curah hujan per menit'
          },
          reversed: true,
        },
        xAxis: {
          type: 'category',
          accessibility: {
            rangeDescription: 'Waktu'
          }
        },
        tooltip: {
          pointFormat: '{point.y} mm'
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },
        plotOptions: {
          column: {
            pointPadding: 0.1
          },
          series: {
            color: '#00FF00'
          }
        },
        series: [{
          name: 'Curah Hujan',
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
