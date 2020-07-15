<div class="container">
    <div class="row mt-3">
        <div class="col-md-10">
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
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td width="200">
                                    <p class="card-text">Dosen Pembimbing 1:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['dosen1']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Dosen Pembimbing 2:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['dosen2']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Judul:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['judul']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Reviewer:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['reviewer']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Tanggal:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['tanggal']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Jam:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['durasi']; ?> WIB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="card-text">Ruangan:</p>
                                </td>
                                <td>
                                    <p class="card-text"><?= $kolokium['ruang']; ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <a href="<?= base_url() ?>kolokium" class="btn btn-primary float-right">Kembali</a>
                    <a href="<?= base_url() ?>kolokium/pdf/<?= $kolokium['id']; ?>" class="btn btn-danger">Simpan PDF</a>
                    <a href="<?= base_url() ?>kolokium/undangan/<?= $kolokium['id']; ?>" class="btn btn-success">Undangan</a>
                </div>
            </div>
        </div>
    </div>
</div>