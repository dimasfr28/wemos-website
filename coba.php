<?php

$con = mysqli_connect("localhost", "root", "", "db_wemos");
    $bulan = date("Y-m");
    $hari = date("Y-m-d");
$tb1 = mysqli_query($con, "SELECT SUM(water_flow )FROM tb_sensor  WHERE tanggal = '$hari'");
$tanggalhariini = date("F j, Y"); //get tampilan hari
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/
bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Water Usage 
                    <div id="filters">
                        <select name="fetchval" id="fetchval" class="form-select form-select-sm mt-1">
                            <option disabled selected>DAILY DEFAULT</option>
                            <option value="harian">DAILY</option>
                            <option value="bulan">MONTHLY</option>
                        </select>
                    </div>
                    </p>
                    <div class="card-text-wt"></div>
                    <h5 class="font-weight-bolder text-primary" style="margin-left: 10px; margin-top: -10px;">
                    <?php
                     foreach ($tb1 as $row) {
                      ?>
                          <tr class="table-row">
                              <th><?= implode($row); ?> <span class="text-primary font-weight-bolder">Liter</span></th>
                          </tr>
                      <?php
                      }
                      ?>
                    </h5>
                    <p class="mb-0 text-sm" style="margin-left: 10px; margin-top: -5px;">
                      <span class="text-success text-sm font-weight-bolder">TODAY</span> <?= $tanggalhariini; ?>
                    </p>
                  </div>
                    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="fetchval"]').on('change', function() {
                let value = $(this).val();
                // console.log(value);
                // alert(value);

                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    data: 'request=' + value,
                    success: function(data) {
                            $('.card-text-wt').html(data);
                            // $('select[option]')
                    }
                });
            });
        });
    </script>
