<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Tambah Jadwal Kolokium
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nim">NIM Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" id="nim" value="<?=$mahasiswa['nim'];?>" readonly>
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$mahasiswa['nama'];?>" readonly>
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dosen1">Dosen Pembimbing 1</label>
                            <input type="text" name="dosen1" class="form-control" id="dosen1">
                            <small class="form-text text-danger"><?= form_error('dosen1'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dosen2">Dosen Pembimbing 2</label>
                            <input type="text" name="dosen2" class="form-control" id="dosen2">
                            <small class="form-text text-danger"><?= form_error('dosen2'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Tugas Akhir</label>
                            <textarea class="form-control" name="judul" id="judul" rows="3"></textarea>
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="reviewer">Reviewer</label>
                            <input type="text" name="reviewer" class="form-control" id="reviewer">
                            <small class="form-text text-danger"><?= form_error('reviewer'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">
                            <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jamMulai">Jam Mulai</label>
                            <select class="form-control" id="jamMulai" name="jamMulai">
                                <?php foreach ($jam as $j): ?>
                                    <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jamSelesai">Jam Selesai</label>
                            <select class="form-control" id="jamSelesai" name="jamSelesai">
                                <?php foreach ($jam as $j): ?>
                                    <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ruang">Ruang</label>
                            <select class="form-control" id="ruang" name="ruang">
                                <?php foreach ($ruang as $r): ?>
                                    <option value="<?= $r; ?>"><?= $r; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div>