<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Form Edit Data Dosen
                </div>
             <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $dosen['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $dosen['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="npp">NPP</label>
                        <input type="text" name="npp" class="form-control" id="npp" value="<?= $dosen['npp']; ?>">
                        <small class="form-text text-danger"><?= form_error('npp'); ?></small>
                    </div>
                    <a href="<?= base_url() ?>dosen" class="btn btn-danger " role="button" >Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary">Edit Data</button>    
                </form>
            </div>   
        </div>
    </div>
</div>