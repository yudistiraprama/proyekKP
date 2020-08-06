<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Nilai Pendadaran
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $pendadaran['id']; ?>">
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <select class="form-control" id="nilai" name="nilai">
                                <option value="-">-</option>
                                <?php foreach ($nilai as $n): ?>
                                    <option value="<?= $n; ?>"><?= $n; ?></option>                                  
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <a href="<?= base_url() ?>pendadaran" class="btn btn-danger " role="button" ><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-success float-right"><i class="fas fa-edit"></i>Ubah Nilai</button>
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div>



