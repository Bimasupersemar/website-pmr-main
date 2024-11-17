<?php include("inc_header.php")?>
<?php   
include("inc/inc_koneksi.php");
?>
<h3>Pendaftaran</h3>
<?php 
$nama_lengkap   = "";
$kelas            = "";
$nis              = "";
$gender           = "";
$alamat           = "";
$nomor            = "";
$err              ='';
$sukses           ='';

if(isset($_POST['simpan'])){
    $nama_lengkap   = $_POST['nama_lengkap'];
    $kelas          = $_POST['kelas'];
    $nis            = $_POST['nis'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $nomor          = $_POST['nomor'];

    if($nama_lengkap == '' or $kelas == '' or $nis == '' or $gender == '' or $alamat == '' or $nomor == ''){
        $err .= "<li>Silakan masukkan semua isian.</li>";
    } else {
        // Jika tidak ada error, masukkan data ke database
        $stmt = $koneksi->prepare("INSERT INTO pendaftaranan (nama_lengkap, kelas, nis, gender, alamat, nomor) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama_lengkap, $kelas, $nis, $gender, $alamat, $nomor);

        if($stmt->execute()){
            $sukses = "Data peserta berhasil disimpan!";
            // Reset form setelah berhasil disimpan
            $nama_lengkap = "";
            $kelas = "";
            $nis = "";
            $gender = "";
            $alamat = "";
            $nomor = "";
        } else {
            $err .= "<li>Terjadi kesalahan saat menyimpan data: " . $stmt->error . "</li>";
        }

        // Menutup pernyataan
        $stmt->close();
    }
}

// Menutup koneksi

?>
<?php if($err) {echo "<div class='error'><ul>$err</ul></div>";} ?>
<?php if($sukses) {echo "<div class='sukses'>$sukses</div>";} ?>

<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Kelas</td>
            <td>
                <input type="text" name="kelas" class="input" value="<?php echo $kelas?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">NIS</td>
            <td>
                <input type="number" name="nis" class="input" value="<?php echo $nis?>" />
            </td>
        </tr>
        <tr>
            <td class="label">Gender</td>
            <td>
                <select name="gender" class="input">
                    <option value="">Pilih Gender</option>
                    <option value="Laki-laki" <?php echo ($gender == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($gender == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>
                <input type="text" name="alamat" class="input" value="<?php echo $alamat?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Nomor Wangsaf</td>
            <td>
                <input type="number" name="nomor" class="input" value="<?php echo $nomor?>" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="simpan" class="tbl-biru"/>
            </td>
        </tr>
    </table>
</form>

<?php include("inc_footer.php")?>