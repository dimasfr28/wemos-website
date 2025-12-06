<?php 

$konek = mysqli_connect("localhost", "root", "", "db_wemos");

$tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor GROUP BY tanggal");
$water_flow = mysqli_query($konek, "SELECT SUM(water_flow) FROM tb_sensor GROUP BY tanggal");

?>  

