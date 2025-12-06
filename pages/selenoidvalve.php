<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_wemos");

$stat = $_GET['stat'];
if ($stat == "ON") {
    mysqli_query($koneksi, "UPDATE tb_selenoid SET status=1");
    echo "ON";
} else {
    mysqli_query($koneksi, "UPDATE tb_selenoid SET status=0");
    echo "OFF";
}
