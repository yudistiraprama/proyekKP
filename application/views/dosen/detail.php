<div class="container">
    <div class="row mt-3">
        <div class="col--md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Dosen
                </div>
                <div class="card-body">
                <h5 class="card-title"><?= $dosen['nama']; ?></h5>
                <p class="card-text"><?= $dosen['nip']; ?></p>
                <a href="<?= base_url() ?>dosen" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>