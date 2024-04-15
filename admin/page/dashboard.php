<?php
extract($data['list_loai']);
extract($data['tk_dh']);
extract($data['tkspdb']);
extract($data['tksp']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="tailwind.config.js"></script>
</head>
<body class="bg-gray-200">
    <div class="flex min-h-screen">
        <?php require "layout/sidebar.php"?>
        <div class="w-5/6">
        <?php require "layout/header.php"?>
            <div class="">
                <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
                    <h1 class="font-medium text-3xl">Dashboard</h1>
                </div>
                <div class="flex gap-5 m-3">
                    <div class="rounded-lg bg-white w-1/4 p-5 h-40">
                        <span>Số lượng sản phẩm có trên shop</span>
                        <p class="text-5xl text-center mt-5"><?=$tksp['sl_sp']?></p>
                    </div>
                    <div class="rounded-lg bg-white w-1/4 p-5">
                        <span>Tổng số lượng sản phẩm đã bán ra</span>
                        <p class="text-5xl text-center mt-5"><?=$tkspdb['so_luong']?></p>
                    </div>
                    <div id="piechart_3d" class="w-2/4">

                    </div>
                </div>
                
                <div id="chart_div">

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
    <script>
      google.charts.load("current", {packages:["corechart"]});
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php 
            foreach($list_loai as $loai){
                $sl_sp=thong_ke_san_pham_by_loai($loai['id']);
                echo "['".$loai['name']."',".$sl_sp['sl_sp']."],";
            }    
            ?>
        ]);

        var options = {
          title: 'Thống kê sản phẩm theo danh mục',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

function drawChartCols() {
  var data = google.visualization.arrayToDataTable([
    ['', ''],
    <?php 
    $dataForChart = []; // Tạo mảng để lưu dữ liệu cho biểu đồ

    for ($i = 1; $i < 13; $i++) {
      $found = false;
      foreach ($tk_dh as $doanh_thu) {
        if ($doanh_thu['month'] == $i) {
          $dataForChart[] = ['' . "tháng". $i, $doanh_thu['doanh_thu']];
          $found = true;
          break; // Thoát khỏi vòng lặp foreach khi đã tìm thấy
        }
      }

      // Nếu không tìm thấy dữ liệu cho tháng $i, thêm giá trị 0
      if (!$found) {
        $dataForChart[] = ['' . $i, 0];
      }
    }

    // Duyệt qua mảng dữ liệu và in ra biểu đồ
    foreach ($dataForChart as $row) {
      echo "['" . $row[0] . "', " . $row[1] . "],";
    }
    ?>
  ]);

  var options = {
    title: 'Biểu đồ doanh thu theo tháng năm 2024',
    hAxis: {
      title: 'Month'
    },
    vAxis: {
      title: ''
    }
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

  chart.draw(data, options);
}

google.charts.setOnLoadCallback(function () {
    drawChart();
    drawChartCols();
});
    </script>
</body>
</html>