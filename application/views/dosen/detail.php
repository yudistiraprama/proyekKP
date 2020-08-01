<div class="container">
    <div class="row mt-3">
        <div class="col--md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Dosen
                </div>
                <div class="card-body">
                    <table cellpadding="10">
                        <tr>
                            <td>NPP</td>
                            <td> : </td>
                            <td><?= $dosen['npp']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td><?= $dosen['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td> : </td>
                            <td><?= $dosen['status']; ?></td>
                        </tr>
                    </table>
                    <br>
                <a href="<?= base_url() ?>dosen" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>