<?php 

$conect = mysqli_connect("localhost", "root", "", "db_wemos");

$sql = mysqli_query($conect, "SELECT * FROM tb_turbidity");
$data = mysqli_fetch_array($sql);

$r = $data["turbidity"];

echo $r;

?>