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
                    Form Tambah Data Ruangan
                </div>
                <?php if ($this->session->userdata() == 1): ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <a href="<?= base_url() ?>ruangan" class="btn btn-danger " role="button" ><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                        </form>
                    </div>   
                <?php elseif ($this->session->userdata() != 1): ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $this->session->userdata('nama'); ?>">
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <a href="<?= base_url() ?>ruangan" class="btn btn-danger " role="button" ><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                        </form>
                    </div>  
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>