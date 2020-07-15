<html><head>
        <title></title>
    </head><body>
    <center>
        <h3>JADWAL PENDADARAN MAHASISWA</h3>
    </center>
    <br><br>
    <table cellpadding="5">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $pendadaran['nama']; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $pendadaran['nim']; ?></td>
        </tr>
        <tr>
            <td>Dosen Pembimbing 1</td>
            <td>:</td>
            <td><?= $pendadaran['dosen1']; ?></td>
        </tr>
        <tr>
            <td>Dosen Pembimbing 2</td>
            <td>:</td>
            <td><?= $pendadaran['dosen2']; ?></td>
        </tr>
        <tr>
            <td>Judul Tugas Akhir</td>
            <td>:</td>
            <td><?= $pendadaran['judul']; ?></td>
        </tr>
        <tr>
            <td>Reviewer</td>
            <td>:</td>
            <td><?= $pendadaran['reviewer']; ?></td>
        </tr>
        <tr>
            <td>Ketua Penguji</td>
            <td>:</td>
            <td><?= $pendadaran['ketuaPenguji']; ?></td>
        </tr>
        <tr>
            <td>Sekretaris Penguji</td>
            <td>:</td>
            <td><?= $pendadaran['sekretarisPenguji']; ?></td>
        </tr>
        <tr>
            <td>Tanggal<</td>
            <td>:</td>
            <td><?= $pendadaran['tanggal']; ?></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>:</td>
            <td><?= $pendadaran['durasi']; ?> WIB</td>
        </tr>
        <tr>
            <td>Ruangan</td>
            <td>:</td>
            <td><?= $pendadaran['ruang']; ?></td>
        </tr>
    </table>
</body></html>

