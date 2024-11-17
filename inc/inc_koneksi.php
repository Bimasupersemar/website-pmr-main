<?php 
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "website_pmr";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Gagal terkoneksi");
}