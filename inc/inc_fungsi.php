<?php
function url_dasar(){
    $url_dasar  = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function ambil_gambar($id_tulisan){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $text = $r1['isi'];
        preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
        $gambar = $img[1] ?? ''; // Gunakan null coalescing untuk menghindari error
        $gambar = str_replace("../gambar/", url_dasar() . "/gambar/", $gambar);
        return $gambar;
    } else {
        return ''; // atau gambar default jika data tidak ditemukan
    }
}

// Fungsi lainnya tetap sama, tambahkan pengecekan serupa pada setiap fungsi yang mengakses database

function ambil_kutipan($id_tulisan){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        return $r1['kutipan'];
    } else {
        return '';
    }
}

function ambil_judul($id_tulisan){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        return $r1['judul'];
    } else {
        return '';
    }
}

// Tambahkan validasi yang sama untuk fungsi lain yang mengakses database



function ambil_isi($id){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $text = strip_tags($r1['isi']);
        return $text;
    } else {
        return '';
    }
}

function bersihkan_judul($judul){
    $judul_baru = strtolower($judul);
    $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
    $judul_baru = str_replace(" ", "-", $judul_baru);
    return $judul_baru;
}

function buat_link_halaman($id){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $judul = bersihkan_judul($r1['judul']);
        return url_dasar() . "/halaman.php/$id/$judul";
    } else {
        return url_dasar() . "/halaman.php/$id";
    }
}

function dapatkan_id(){
    $id = "";
    if (isset($_SERVER['PATH_INFO'])) {
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/", "", $id);
    }
    return $id;
}

function set_isi($isi){
    $isi = str_replace("../gambar/", url_dasar() . "/gambar/", $isi);
    return $isi;
}

function maximum_kata($isi, $maximum){
    $array_isi = explode(" ", $isi);
    $array_isi = array_slice($array_isi, 0, $maximum);
    $isi = implode(" ", $array_isi);
    return $isi;
}

function pengurus_foto($id){
    global $koneksi;
    $sql1 = "SELECT * FROM pengurus WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $foto = $r1['foto'];
        return $foto ?: 'pengurus_default_picture.png';
    } else {
        return 'pengurus_default_picture.png';
    }
}

function buat_link_pengurus($id){
    global $koneksi;
    $sql1 = "SELECT * FROM pengurus WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $nama = bersihkan_judul($r1['nama']);
        return url_dasar() . "/pengurus.php/$id/$nama";
    } else {
        return url_dasar() . "/pengurus.php/$id";
    }
}

function berita_foto($id){
    global $koneksi;
    $sql1 = "SELECT * FROM berita WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $foto = $r1['foto'];
        return $foto ?: 'berita_default_picture.png';
    } else {
        return 'berita_default_picture.png';
    }
}

function buat_link_berita($id){
    global $koneksi;
    $sql1 = "SELECT * FROM berita WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        $nama = bersihkan_judul($r1['nama']);
        return url_dasar() . "/berita.php/$id/$nama";
    } else {
        return url_dasar() . "/berita.php/$id";
    }
}

function ambil_isi_info($id, $kolom){
    global $koneksi;
    $sql1 = "SELECT $kolom FROM info WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1 && mysqli_num_rows($q1) > 0) {
        $r1 = mysqli_fetch_array($q1);
        return $r1[$kolom];
    } else {
        return '';
    }
}
