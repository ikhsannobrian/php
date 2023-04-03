<?php
/**koneksi database**/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursus";
$connection = mysqli_connect($servername,$username,$password,$dbname);
/**cek koneksi**/
if(!$connection){
    die("connection failed".mysqli_connect_error());
}


?>