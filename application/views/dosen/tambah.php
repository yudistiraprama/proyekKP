<div class="container">
    <?php if ($this->session->flashdata('flash')): ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>  
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Dosen
                </div>
                <?php if ($this->session->userdata() == 1): ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                                <small class="form-text text-danger">Kolom Nama harus diisi.</small>
                            </div>
                            <div class="form-group">
                                <label for="npp">NPP</label>
                                <input type="text" name="npp" class="form-control" id="npp">
                                <small class="form-text text-danger">Kolom NPP harus diisi.</small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" id="status">
                            </div>
                            <a href="<?= base_url() ?>dosen" class="btn btn-danger " role="button" ><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                        </form>
                    </div>  
                <?php elseif ($this->session->userdata() != 1): ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $this->session->userdata('nama'); ?>">
                                <small class="form-text text-danger">Kolom Nama harus diisi.</small>
                            </div>
                            <div class="form-group">
                                <label for="npp">NPP</label>
                                <input type="text" name="npp" class="form-control" id="npp" value="<?= $this->session->userdata('npp'); ?>">
                                <small class="form-text text-danger">Kolom NPP harus diisi.</small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" id="status" value="<?= $this->session->userdata('status'); ?>">
                            </div>
                            <a href="<?= base_url() ?>dosen" class="btn btn-danger " role="button" ><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                        </form>
                    </div>  
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>