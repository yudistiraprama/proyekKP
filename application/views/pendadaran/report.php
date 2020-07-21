<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h3 class="mt-3">Report Jadwal Pendadaran</h3>

            <div class="form-group">
                <label for="bulan">Bulan</label>
                <select class="form-control" id="bulan" name="bulan">
                    <option value="">-</option>
                    <?php foreach ($bulan as $b): ?>
                        <option value="<?= $b; ?>"><?= $b; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('bulan'); ?></small>
            </div>
            <div class="form-group">
                <label for="dosen1">Dosen Pembimbing 1</label>
                <select class="form-control" id="dosen1" name="dosen1">
                    <option value="">-</option>
                    <?php foreach ($dosen as $ds): ?>
                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('dosen1'); ?></small>
            </div>
            <div class="form-group">
                <label for="dosen2">Dosen Pembimbing 2</label>
                <select class="form-control" id="dosen2" name="dosen2">
                    <option value="">-</option>
                    <?php foreach ($dosen as $ds): ?>
                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="reviewer">Reviewer</label>
                <select class="form-control" id="reviewer" name="reviewer">
                    <option value="">-</option>
                    <?php foreach ($dosen as $ds): ?>
                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ketuaPenguji">Ketua Penguji</label>
                <select class="form-control" id="ketuaPenguji" name="ketuaPenguji">
                    <option value="">-</option>
                    <?php foreach ($dosen as $ds): ?>
                        <option value="<?= $ds['nama']; ?>"><?= $ds['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <a href="<?= base_url() ?>kolokium" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <a href="#" class="btn btn-success"><i class="fas fa-search"></i> Cari</a>

        </div>
    </div>
</div>
