<?php include("inc_header.php")?>
<?php 
if($_SESSION['pendaftaran_email'] == ''){ //dia belum login
    header("location:login.php");
    exit();
}
?>
<div style="background-color: red;font-size:large;padding:50px;color:#FFFFFF;text-align:center">
Selamat datang <?php echo $_SESSION['pendaftaran_nama_lengkap']?> di halaman rahasia. Hanya yang sudah login yang bisa akses halaman ini.
</div>
<?php include("inc_footer.php")?>