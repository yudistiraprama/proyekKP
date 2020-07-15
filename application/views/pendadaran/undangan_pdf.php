<html>
    <head>
        <title></title>
    </head>
    <body>

    <center>
        <h3>
            UNDANGAN UJIAN PENDADARAN SKRIPSI
        </h3>
    </center>
    <br>
    <?php if ($pendadaran['dosen2'] != NULL): ?>
        <p>Yth. <?= $pendadaran['dosen1']; ?>,<?= $pendadaran['dosen2']; ?>, dan <?= $pendadaran['reviewer']; ?><br>
            Terkait penetapan jadwal ujian Pendadaran, atas nama mahasiswa :<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['nim']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['nama']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['judul']; ?><br>
            Jadwal ujian pendadaran skripsi akan dilaksanakan pada:<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['tanggal']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['durasi']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 1 : <?= $pendadaran['dosen1']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 2 : <?= $pendadaran['dosen2']; ?><br>  
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Penguji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['ketuaPenguji']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['sekretarisPenguji']; ?><br>
            Saya ingin meminta konfirmasi Bapak, apakah bisa dilaksanakan sesuai jadwal diatas?<br>
            Atas perhatian dan kerjasama Bapak saya ucapkan terima kasih.
        </p>
    <?php else: ?>
        <p>Yth. <?= $pendadaran['dosen1']; ?>,<?= $pendadaran['dosen2']; ?>, dan <?= $pendadaran['reviewer']; ?><br>
            Terkait penetapan jadwal ujian Pendadaran, atas nama mahasiswa :<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['nim']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['nama']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $pendadaran['judul']; ?><br>
            Jadwal ujian pendadaran skripsi akan dilaksanakan pada:<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['tanggal']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['durasi']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 1 : <?= $pendadaran['dosen1']; ?><br> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Penguji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['ketuaPenguji']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pendadaran['sekretarisPenguji']; ?><br>
            Saya ingin meminta konfirmasi Bapak, apakah bisa dilaksanakan sesuai jadwal diatas?<br>
            Atas perhatian dan kerjasama Bapak saya ucapkan terima kasih.
        </p>
    <?php endif; ?>

</body>
</html>