<div class="container">
    <?php if( $this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>  
    <?php endif; ?>

    <h3 class="mt-3">Daftar Mahasiswa</h3>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('mahasiswa'); ?>" method="post">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($mahasiswa)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach($mahasiswa as $mhs) : ?>
                    <tr>
                        <th><?= ++$start;?></th>
                        <td><?= $mhs['nim'];?></td>
                        <td><?= $mhs['nama'];?></td>
                        <td>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
                            <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['id']; ?>" class="badge badge-success float-right" >Edit</a>
                            <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right" >Detail</a>                    
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>