<?php include_once("inc_header.php") ?>
<!-- untuk home -->
<section id="home">
    <img src="<?php echo ambil_gambar('11') ?>" />
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('11') ?></p>
        <h2><?php echo ambil_judul('11') ?></h2>
        <?php echo maximum_kata(ambil_isi('11'), 30) ?>
        <p><a href="<?php echo buat_link_halaman('11') ?>" class="tbl-pink">Lihat</a></p>
    </div>
</section>

<!-- untuk courses -->
<section id="courses">
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('12') ?></p>
        <h2><?php echo ambil_judul('12') ?></h2>
        <?php echo maximum_kata(ambil_isi('12'), 30) ?>
        <p><a href="<?php echo buat_link_halaman('12') ?>" class="tbl-biru">Lihat</a></p>
    </div>
    <img src="<?php echo ambil_gambar('12') ?>" />
</section>

<!-- untuk pengurus -->
<section id="pengurus">
    <div class="tengah">
        <div class="kolom">
            <h2>Pengurus</h2>
        </div>

        <div class="tutor-list">
            <?php
            $sql1       = "select * from pengurus order by id asc";
            $q1         = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <div class="kartu-tutor">
                    <a href="<?php echo buat_link_pengurus($r1['id']) ?>">
                        <img src="<?php echo url_dasar() . "/gambar/" . pengurus_foto($r1['id']) ?>" />
                        <p><?php echo $r1['nama'] ?></p>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>

<!-- untuk berita -->
<section id="berita">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top berita</p>
            <h2>berita</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
        </div>

        <div class="partner-list">
            <?php
            $sql1   = "select * from berita order by id asc";
            $q1     = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_assoc($q1)) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo buat_link_berita($r1['id'])?>">
                    <img src="<?php echo url_dasar()."/gambar/".berita_foto($r1['id'])?>"/>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>
<?php include_once("inc_footer.php") ?>