<?php require_once './_init.php';

use lib\Component;
use models\Tma;
use models\Kekeruhan;
use models\Ch;

$dataTma = array_map(fn ($tma) => [$tma->waktu, $tma->nilai], Tma::getAll());
$dataKekeruhan = array_map(fn ($kekeruhan) => [$kekeruhan->waktu, $kekeruhan->nilai], Kekeruhan::getAll());
$dataCh = array_map(fn ($ch) => [$ch->waktu, $ch->nilai], Ch::getAll());
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
      const dataTma = JSON.parse('<?= json_encode($dataTma) ?>');
      const dataKekeruhan = JSON.parse('<?= json_encode($dataKekeruhan) ?>');
      const dataCh = JSON.parse('<?= json_encode($dataCh) ?>');

      Highcharts.chart('grafik', {
        chart: {
          zoomType: 'x'
        },
        title: {
          text: 'Kekeruhan Air'
        },
        subtitle: {
          text: 'Latihan Highcharts'
        },
        yAxis: [{
          type: 'series',
          title: {
            text: 'Nilai Tinggi Muka Air'
          }
        }, {
          type: 'area',
          title: {
            text: 'Nilai Kekeruhan'
          }
        }, {
          type: 'column',
          title: {
            text: 'Curah hujan per menit'
          },
          opposite: true,
          reversed: true,
        }],
        xAxis: {
          type: 'category',
          accessibility: {
            rangeDescription: 'Waktu'
          }
        },
        tooltip: {
          shared: true
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },
        plotOptions: {
          series: {
            color: '#00F',
            label: {
              connectorAllowed: false
            }
          },
          area: {
            lineColor: '#FA0',
            color: '#F80',
            fillColor: {
              linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
              },
              stops: [
                [0, '#FA08'],
                [1, '#FFF']
              ]
            }
          },
          column: {
            color: '#0F08',
            pointPadding: 0.1
          },
        },
        series: [{
          name: 'Kekeruhan Air',
          data: dataKekeruhan,
          type: 'area'
        }, {
          name: 'Tinggi Muka Air',
          data: dataTma,
          lineWidth: 2,
        }, {
          name: 'Curah Hujan',
          data: dataCh,
          type: 'column',
          yAxis: 2,
        }, ],
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
