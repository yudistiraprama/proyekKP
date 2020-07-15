<html><head>
        <title></title>
    </head><body>
    <center>
        <h3>JADWAL KOLOKIUM MAHASISWA</h3>
    </center>
    <br><br>
    <img src="img/logo.png" width="100">
    <table cellpadding="5">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $kolokium['nama']; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $kolokium['nim']; ?></td>
        </tr>
        <tr>
            <td>Dosen Pembimbing 1</td>
            <td>:</td>
            <td><?= $kolokium['dosen1']; ?></td>
        </tr>
        <tr>
            <td>Dosen Pembimbing 2</td>
            <td>:</td>
            <td><?= $kolokium['dosen2']; ?></td>
        </tr>
        <tr>
            <td>Judul Tugas Akhir</td>
            <td>:</td>
            <td><?= $kolokium['judul']; ?></td>
        </tr>
        <tr>
            <td>Reviewer</td>
            <td>:</td>
            <td><?= $kolokium['reviewer']; ?></td>
        </tr>
        <tr>
            <td>Tanggal<</td>
            <td>:</td>
            <td><?= $kolokium['tanggal']; ?></td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>:</td>
            <td><?= $kolokium['durasi']; ?></td>
        </tr>
        <tr>
            <td>Ruangan</td>
            <td>:</td>
            <td><?= $kolokium['ruang']; ?></td>
        </tr>
    </table>
</body></html>

