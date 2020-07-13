<div class="container">
    <div class="row mt-3">
        <div class="col--md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Pendadaran
                </div>
                <div class="card-body">
                <table>
                    <tr>
                        <td width="110">
                            <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $pendadaran['nim']; ?>" width="100">
                        </td>
                        <td>
                            <h5 class="card-title"><?= $pendadaran['nama']; ?></h5>
                            <p class="card-text"><?= $pendadaran['nim']; ?></p>
                        </td>
                    </tr>

                </table>
                <br>
                <a href="<?= base_url() ?>pendadaran" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>