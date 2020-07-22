<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Form Edit Data Ruangan
                </div>
             <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $ruangan['idRuangan']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $ruangan['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <a href="<?= base_url() ?>ruangan" class="btn btn-danger " role="button" >Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary">Edit Data</button>    
                </form>
            </div>   
        </div>
    </div>
</div>