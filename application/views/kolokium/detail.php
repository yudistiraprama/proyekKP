<div class="container">
    <div class="row mt-3">
        <div class="col--md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Kolokium
                </div>
                <div class="card-body">
                <table>
                    <tr>
                        <td width="110">
                            <img src="http://exelsa.usd.ac.id/lihatGambar.php?act=nim&nim=<?= $kolokium['nim']; ?>" width="100">
                        </td>
                        <td>
                            <h5 class="card-title"><?= $kolokium['nama']; ?></h5>
                            <p class="card-text"><?= $kolokium['nim']; ?></p>
                        </td>
                    </tr>

                </table>
                <br>
                <a href="<?= base_url() ?>kolokium" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>