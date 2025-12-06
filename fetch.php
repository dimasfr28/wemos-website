<?php

sleep(1);

$tanggalhariini = date("F j, Y"); //get tampilan hari

$con = mysqli_connect("localhost", "xiirpl1", "xiirpl1", "siswa_26");
if (isset($_POST['request'])) {

    if ($_POST['request'] === 'harian') {
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
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr class="table-row">
            <th><?= implode($row); ?> <span class="text-primary font-weight-bolder">Ml</span></th>
        </tr>
    <?php
    }
    ?>
<?php
}
?>