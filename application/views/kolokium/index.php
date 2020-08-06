<div class="container">
    <?php $k = array('awal', 'akhir', 'dosen1', 'dosen2', 'reviewer', 'jam', 'ruang'); ?>
    <?php $this->session->unset_userdata($k); ?>
    <h3 class="mt-3">History Jadwal Kolokium Yang di Hapus</h3>

    <div class="row mt-3">
        <div class="col-md-10">
            <a href="<?= base_url(); ?>kolokium/inputNim" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Jadwal Kolokium</a>
            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-history"></i> History
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="fas fa-table"></i> Data Pindahan</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-table"></i> Data Hapus</a>
                </div>
            </div>
            <a href="<?= base_url(); ?>kolokium/report" class="btn btn-success"><i class="fas fa-file-alt"></i> Report</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('kolokium'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari mahasiswa.." name="keyword" autocomplete="off" autofocus="">
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h7>Jumlah Data : <?= $total_rows; ?></h7>

            <table class="table" border="1">
                <thead class="thead-dark">
                    <tr style="text-align:center">
                        <th scope="col">No.</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kolokium)) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data tidak ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($kolokium as $kol) : ?>
                        <tr style="text-align: center;" >
                            <th style="vertical-align: middle"><?= ++$start; ?></th>
                            <td style="vertical-align: middle"><?= $kol['nim']; ?></td>
                            <td style="text-align:left; width: 280px"><?= $kol['nama']; ?></td>
                            <td style="vertical-align: middle"><?= format_indo($kol['tanggal']); ?></td>
                            <td style="vertical-align: middle"><?= $kol['durasi']; ?></td>
                            <td style="vertical-align: middle"><?= $kol['ruang']; ?></td>
                            <td style="vertical-align: middle"><?= $kol['nilai']; ?></td>
                            <td style="vertical-align: middle">
                                <a href="<?= base_url(); ?>kolokium/detail/<?= $kol['id']; ?>" class="badge badge-primary" >Detail</a> 
                                <a href="<?= base_url(); ?>kolokium/edit/<?= $kol['id']; ?>" class="badge badge-success" >Edit</a>
                                <a href="<?= base_url(); ?>kolokium/nilai/<?= $kol['id']; ?>" class="badge badge-secondary" >Nilai</a>
                                <a href="#" class="badge badge-warning" >Pindah</a>
                                <a href="<?= base_url(); ?>kolokium/hapus/<?= $kol['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>                                       
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>