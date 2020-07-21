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
                            <select class="form-control" id="dosen1" name="dosen1">
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['dosen1']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen2">Dosen Pembimbing 2</label>
                            <select class="form-control" id="dosen2" name="dosen2">
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['dosen2']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Tugas Akhir</label>
                            <textarea class="form-control" name="judul" id="judul" rows="3"><?= $pendadaran['judul']; ?></textarea>
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="reviewer">Reviewer</label>
                            <select class="form-control" id="reviewer" name="reviewer">
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['reviewer']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ketuaPenguji">Ketua Penguji</label>
                            <select class="form-control" id="ketuaPenguji" name="ketuaPenguji">
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['ketuaPenguji']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>              
                        <div class="form-group">
                            <label for="sekretarisPenguji">Sekretaris Penguji</label>
                            <select class="form-control" id="sekretarisPenguji" name="sekretarisPenguji">
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['sekretarisPenguji']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sekretarisPenguji">Anggota Penguji</label>
                            <select class="form-control" id="anggotaPenguji" name="anggotaPenguji">
                                <option value="-">-</option>
                                <?php foreach ($dosen as $ds): ?>
                                    <?php if ($ds['nama'] == $pendadaran['anggotaPenguji']): ?>
                                        <option value="<?= $ds['nama']; ?>"selected><?= $ds['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $pendadaran['tanggal']; ?>">
                            <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="durasi">Jam</label>
                            <select class="form-control" id="durasi" name="durasi">
                                <?php foreach ($jam as $j): ?>
                                    <?php if ($j == $pendadaran['durasi']): ?>
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
                                <?php foreach ($ruang as $r): ?>
                                    <?php if ($r['nama'] == $pendadaran['ruang']): ?>
                                        <option value="<?= $r['nama']; ?>" selected><?= $r['nama']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $r['nama']; ?>"><?= $r['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $pendadaran['keterangan']; ?></textarea>
                        </div>

                        <a href="<?= base_url() ?>pendadaran" class="btn btn-danger " role="button" >Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-primary ">Edit Data</button>

                    </form>
                </div>   
            </div>
        </div>
    </div>