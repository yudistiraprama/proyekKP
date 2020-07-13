<div class="container">
    <?php if( $this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Dosen <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>  
    <?php endif; ?>

    <h3 class="mt-3">Daftar Dosen</h3>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>dosen/tambah" class="btn btn-primary">Tambah Data Dosen</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="<?= base_url('dosen'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari dosen.." name="keyword" autocomplete="off" autofocus="">
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
                        <th>NIP</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($dosen)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach($dosen as $d) : ?>
                    <tr>
                        <th><?= ++$start;?></th>
                        <td><?= $d['nip'];?></td>
                        <td><?= $d['nama'];?></td>
                        <td>
                        <a href="<?= base_url(); ?>dosen/hapus/<?= $d['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
                            <a href="<?= base_url(); ?>dosen/edit/<?= $d['id']; ?>" class="badge badge-success float-right" >Edit</a>
                            <a href="<?= base_url(); ?>dosen/detail/<?= $d['id']; ?>" class="badge badge-primary float-right" >Detail</a>                    
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>