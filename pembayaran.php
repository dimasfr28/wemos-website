<?php

sleep(1);
date_default_timezone_set('Asia/Jakarta');
$tanggalhariini = date("F j, Y"); //get tampilan hari

$con = mysqli_connect("localhost", "xiirpl1", "xiirpl1", "siswa_26");
if (isset($_POST['request'])) {

    if ($_POST['request'] === 'pembayaranharian') {
        $request = date('Y-m-d');
        $where = "tanggal LIKE '$request%'";
        $select = "SUM(water_flow)";
        $order = "";
    } else {
        $request = date('m');
        $where = "MONTH(tanggal) = $request";
        $select = "SUM(water_flow)";
        $order = "";
    }

    $request = $_POST['request'];
    $result = mysqli_query($con, "SELECT $select FROM tb_sensor WHERE $where $order");
    $count = mysqli_num_rows($result);

    // select table water flow
    // $watr_flow = mysqli_query($con, );
?>
    <?php

    if ($count) {

    ?>

    <?php

    } else {
        echo "no";
    }

    ?>
    <?php
    function rupiah($angka)
    {
        $format_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $format_rupiah;
    }
    // $data = ;
    // var_dump(implode($result['water_flow']));
    // die;
    while ($row = mysqli_fetch_assoc($result)) {
        $implode = implode($row);
        $perkaliani = (float)$implode * 0.0019;
    ?>

        <tr class="table-row">
            <th><?= rupiah($perkaliani);  ?></th>
        </tr>


    <?php
        // if(end($)) {
        //     echo "<th> halo </th>";
        // }
    }
    // $data = (array) end($result);
    // var_dump();

    ?>


<?php
}
?>