<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Form Edit Data Mahasiswa
                </div>
             <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim']; ?>">
                        <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dpa">Dosen Pembimbing Akademik</label>
                        <input type="text" name="dpa"class="form-control" id="dpa" value="<?= $mahasiswa['dpa']; ?>">
                        <small class="form-text text-danger"><?= form_error('dpa'); ?></small>
                    </div>
                    <a href="<?= base_url() ?>mahasiswa" class="btn btn-danger " role="button" >Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary ">Edit Data</button>
                    
                </form>
            </div>   
        </div>
    </div>
</div>
</div>