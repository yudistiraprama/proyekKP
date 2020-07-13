<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Form Tambah Jadwal Pendadaran
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nim">NIM Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim']; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="dosen1">Dosen Pembimbing 1</label>
                            <input type="text" name="dosen1" class="form-control" id="dosen1" value="<?= $mahasiswa['dosen1']; ?>" readonly>                       
                        </div>
                        <div class="form-group">
                            <label for="dosen2">Dosen Pembimbing 2</label>
                            <input type="text" name="dosen2" class="form-control" id="dosen2" value="<?= $mahasiswa['dosen2']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul Tugas Akhir</label>
                            <textarea class="form-control" name="judul" id="judul" rows="3" value="<?= $mahasiswa['judul']; ?>" readonly><?= $mahasiswa['judul']; ?></textarea>

                        </div>
                        <div class="form-group">
                            <label for="reviewer">Reviewer Kolokium</label>
                            <input type="text" name="reviewer" class="form-control" id="reviewer" value="<?= $mahasiswa['reviewer']; ?>" readonly>

                        </div>
                        <?php $hasil = rand(0, 1); ?>
                        <?php if ($hasil == 1): ?>
                            <div class="form-group">
                                <label for="ketuaPenguji">Ketua Penguji</label>
                                <input type="text" name="ketuaPenguji" class="form-control" id="ketuaPenguji" value="<?= $mahasiswa['reviewer']; ?>" readonly>

                            </div>
                            <div class="form-group">
                                <label for="sekretarisPenguji">Sekretaris Penguji</label>
                                <select class="form-control" id="sekretarisPenguji" name="sekretarisPenguji">
                                    <?php foreach ($dosen as $ds): ?>
                                        <?php if ($ds['nama'] != $mahasiswa['reviewer'] && $ds['nama'] != $mahasiswa['dosen1'] && $ds['nama'] != $mahaiswa['dosen2']): ?>
                                            <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('sekretarisPenguji'); ?></small>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label for="ketuaPenguji">Ketua Penguji</label>
                                <select class="form-control" id="ketua" name="ketuaPenguji">
                                    <?php foreach ($dosen as $ds): ?>
                                        <?php if ($ds['nama'] != $mahasiswa['reviewer'] && $ds['nama'] != $mahasiswa['dosen1'] && $ds['nama'] != $mahaiswa['dosen2']): ?>
                                            <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('ketuaPenguji'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="sekretarisPenguji">Sekretaris Penguji</label>
                                <input type="text" name="sekretarisPenguji" class="form-control" id="sekretarisPenguji" value="<?= $mahasiswa['reviewer']; ?>" readonly>
                            </div>
                        <?php endif; ?>
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