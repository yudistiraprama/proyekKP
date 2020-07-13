<div class="container">
    <?php if( $this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Jadwal Pendadaran <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>  
    <?php endif; ?>

    <h3 class="mt-3">Jadwal Pendadaran</h3>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>pendadaran/tambah" class="btn btn-primary">Tambah Jadwal Pendadaran</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('pendadaran'); ?>" method="post">
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
                        <th>Reviewer Kolokium</th>
                        <th>Ketua Penguji</th>
                        <th>Sekretaris Penguji</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Ruangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($pendadaran)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach($pendadaran as $pen) : ?>
                    <tr>
                        <th><?= ++$start;?></th>
                        <td><?= $pen['nim'];?></td>
                        <td><?= $pen['nama'];?></td>
                        <td><?= $pen['dosen1'];?></td>
                        <td><?= $pen['dosen2'];?></td>
                        <td><?= $pen['judul'];?></td>
                        <td><?= $pen['reviewer'];?></td>
                        <td><?= $pen['ketuaPenguji'];?></td>
                        <td><?= $pen['sekretarisPenguji'];?></td>
                        <td><?= $pen['tanggal'];?></td>
                        <td><?= $pen['jamMulai'];?></td>
                        <td><?= $pen['jamSelesai'];?></td>
                        <td><?= $pen['ruang'];?></td>
                        <td>
                            <a href="<?= base_url(); ?>pendadaran/hapus/<?= $pen['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
                            <a href="<?= base_url(); ?>pendadaran/edit/<?= $pen['id']; ?>" class="badge badge-success float-right" >Edit</a>
                            <a href="<?= base_url(); ?>pendadaran/detail/<?= $pen['id']; ?>" class="badge badge-primary float-right" >Detail</a>                    
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>
    
</div>