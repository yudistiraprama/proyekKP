<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Edit Jadwal Pendadaran
                </div>
             <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $pendadaran['id']; ?>">
                    <div class="form-group">
                        <label for="nim">NIM Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $pendadaran['nim']; ?>">
                        <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $pendadaran['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dosen1">Dosen Pembimbing 1</label>
                        <input type="text" name="dosen1" class="form-control" id="dosen1" value="<?= $pendadaran['dosen1']; ?>">
                        <small class="form-text text-danger"><?= form_error('dosen1'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dosen2">Dosen Pembimbing 2</label>
                        <input type="text" name="dosen2" class="form-control" id="dosen2" value="<?= $pendadaran['dosen2']; ?>">
                        <small class="form-text text-danger"><?= form_error('dosen2'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Tugas Akhir</label>
                        <textarea class="form-control" name="judul" id="judul" rows="3"><?= $pendadaran['judul']; ?></textarea>
                        <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="reviewer">Reviewer Kolokium</label>
                        <input type="text" name="reviewer" class="form-control" id="reviewer" value="<?= $pendadaran['reviewer']; ?>">
                        <small class="form-text text-danger"><?= form_error('reviewer'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="ketuaPenguji">Ketua Penguji</label>
                        <input type="text" name="ketuaPenguji" class="form-control" id="ketuaPenguji" value="<?= $pendadaran['ketuaPenguji']; ?>">
                        <small class="form-text text-danger"><?= form_error('keketuaPengujitua'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="sekretarisPenguji">Sekretaris Penguji</label>
                        <input type="text" name="sekretarisPenguji" class="form-control" id="sekretarisPenguji" value="<?= $pendadaran['sekretarisPenguji']; ?>">
                        <small class="form-text text-danger"><?= form_error('sekretarisPenguji'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $pendadaran['tanggal']; ?>">
                        <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jamMulai">Jam Mulai</label>
                        <select class="form-control" id="jamMulai" name="jamMulai">
                            <?php foreach($jam as $j): ?>
                                <?php if($j == $pendadaran['jamMulai']): ?>
                                    <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                <?php else: ?>
                                    <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jamSelesai">Jam Selesai</label>
                        <select class="form-control" id="jamSelesai" name="jamSelesai">
                            <?php foreach($jam as $j): ?>
                                <?php if($j == $pendadaran['jamSelesai']): ?>
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
                                <?php if($r == $pendadaran['ruang']): ?>
                                    <option value="<?= $r; ?>" selected><?= $r; ?></option>
                                <?php else: ?>
                                    <option value="<?= $r; ?>"><?= $r; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <a href="<?= base_url() ?>pendadaran" class="btn btn-danger " role="button" >Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary ">Edit Data</button>
                    
                </form>
            </div>   
        </div>
    </div>
</div>