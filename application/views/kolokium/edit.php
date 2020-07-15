<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Edit Jadwal Kolokium
                </div>
             <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $kolokium['id']; ?>">
                    <div class="form-group">
                        <label for="nim">NIM Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $kolokium['nim']; ?>">
                        <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $kolokium['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dosen1">Dosen Pembimbing 1</label>
                        <input type="text" name="dosen1" class="form-control" id="dosen1" value="<?= $kolokium['dosen1']; ?>">
                        <small class="form-text text-danger"><?= form_error('dosen1'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dosen2">Dosen Pembimbing 2</label>
                        <input type="text" name="dosen2" class="form-control" id="dosen2" value="<?= $kolokium['dosen2']; ?>">
                        <small class="form-text text-danger"><?= form_error('dosen2'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Tugas Akhir</label>
                        <textarea class="form-control" name="judul" id="judul" rows="3"><?= $kolokium['judul']; ?></textarea>
                        <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="reviewer">Reviewer</label>
                        <input type="text" name="reviewer" class="form-control" id="reviewer" value="<?= $kolokium['reviewer']; ?>">
                        <small class="form-text text-danger"><?= form_error('reviewer'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $kolokium['tanggal']; ?>">
                        <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Jam</label>
                        <select class="form-control" id="durasi" name="durasi">
                            <?php foreach($jam as $j): ?>
                                <?php if($j == $kolokium['durasi']): ?>
                                    <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                <?php else: ?>
                                    <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruang">Ruang</label>
                        <select class="form-control" id="ruang" name="ruang">
                            <?php foreach($ruang as $r): ?>
                                <?php if($r == $kolokium['ruang']): ?>
                                    <option value="<?= $r; ?>" selected><?= $r; ?></option>
                                <?php else: ?>
                                    <option value="<?= $r; ?>"><?= $r; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <a href="<?= base_url() ?>kolokium" class="btn btn-danger " role="button" >Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary ">Edit Data</button>
                    
                </form>
            </div>   
        </div>
    </div>
</div>