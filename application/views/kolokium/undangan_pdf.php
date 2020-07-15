<html>
    <head>
        <title></title>
    </head>
    <body>

    <center>
        <h3>
            UNDANGAN UJIAN KOLOKIUM
        </h3>
    </center>
    <br>
    <?php if ($kolokium['dosen2'] != NULL): ?>
        <p>Yth. <?= $kolokium['dosen1']; ?>,<?= $kolokium['dosen2']; ?>, dan <?= $kolokium['reviewer']; ?><br>
            Terkait penetapan jadwal ujian Pendadaran, atas nama mahasiswa :<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['nim']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['nama']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['judul']; ?><br>
            Jadwal ujian pendadaran skripsi akan dilaksanakan pada:<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['tanggal']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['durasi']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 1 : <?= $kolokium['dosen1']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 2 : <?= $kolokium['dosen2']; ?><br>  
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Penguji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['reviewer']; ?><br>
            Saya ingin meminta konfirmasi Bapak, apakah bisa dilaksanakan sesuai jadwal diatas?<br>
            Atas perhatian dan kerjasama Bapak saya ucapkan terima kasih.
        </p>
    <?php else: ?>
        <p>Yth. <?= $kolokium['dosen1']; ?>,<?= $kolokium['dosen2']; ?>, dan <?= $kolokium['reviewer']; ?><br>
            Terkait penetapan jadwal ujian Pendadaran, atas nama mahasiswa :<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['nim']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['nama']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $kolokium['judul']; ?><br>
            Jadwal ujian pendadaran skripsi akan dilaksanakan pada:<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['tanggal']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['durasi']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Pembimbing 1 : <?= $kolokium['dosen1']; ?><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Penguji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $kolokium['reviewer']; ?><br>
            Saya ingin meminta konfirmasi Bapak, apakah bisa dilaksanakan sesuai jadwal diatas?<br>
            Atas perhatian dan kerjasama Bapak saya ucapkan terima kasih.
        </p>
    <?php endif; ?>

</body>
</html>