<div class="container">
    <div class="row mt-3">
        <div class="col--md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                <table>
                    <tr>
                        <td width="110">
                            <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $mahasiswa['nim']; ?>" width="100">
                        </td>
                        <td>
                            <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                            <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                            <p class="card-text"><?= $mahasiswa['dpa']; ?></p>
                        </td>
                    </tr>

                </table>
                <br>
                <a href="<?= base_url() ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>