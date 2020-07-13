<div class="container">
    <?php if( $this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Jadwal Kolokium <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>  
    <?php endif; ?>

    <h3 class="mt-3">Jadwal Kolokium</h3>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>kolokium/tambah" class="btn btn-primary">Tambah Jadwal Kolokium</a>
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
        <div class="col">
            <h7>Jumlah Data : <?= $total_rows; ?></h7>

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Dosen Pembimbing 1</th>
                        <th>Dosen Pembimbing 2</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Reviewer</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Ruangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($kolokium)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach($kolokium as $kol) : ?>
                    <tr>
                        <th><?= ++$start;?></th>
                        <td><?= $kol['nim'];?></td>
                        <td><?= $kol['nama'];?></td>
                        <td><?= $kol['dosen1'];?></td>
                        <td><?= $kol['dosen2'];?></td>
                        <td><?= $kol['judul'];?></td>
                        <td><?= $kol['reviewer'];?></td>
                        <td><?= $kol['tanggal'];?></td>
                        <td><?= $kol['jamMulai'];?></td>
                        <td><?= $kol['jamSelesai'];?></td>
                        <td><?= $kol['ruang'];?></td>
                        <td>
                        <a href="<?= base_url(); ?>kolokium/hapus/<?= $kol['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
                            <a href="<?= base_url(); ?>kolokium/edit/<?= $kol['id']; ?>" class="badge badge-success float-right" >Edit</a>
                            <a href="<?= base_url(); ?>kolokium/detail/<?= $kol['id']; ?>" class="badge badge-primary float-right" >Detail</a>                    
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>