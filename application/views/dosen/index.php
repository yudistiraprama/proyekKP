<div class="container">
    <?php $this->session->sess_destroy(); ?>
    <?php if ($this->session->flashdata('flash')): ?>
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
            <a href="<?= base_url(); ?>dosen/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data Dosen</a>
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
        <div class="col-md-12">
            <h7>Jumlah Data : <?= $total_rows; ?></h7>

            <table class="table" border="1">
                <thead class="thead-dark">
                    <tr style="text-align:center">
                        <th>No.</th>
                        <th>NPP</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dosen)) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data tidak ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($dosen as $d) : ?>
                        <tr style="text-align:center">
                            <th><?= ++$start; ?></th>
                            <td><?= $d['npp']; ?></td>
                            <td style="text-align:left"><?= $d['nama']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>dosen/detail/<?= $d['id']; ?>" class="badge badge-primary" >Detail</a> 
                                <a href="<?= base_url(); ?>dosen/edit/<?= $d['id']; ?>" class="badge badge-success" >Edit</a>
                                <a href="<?= base_url(); ?>dosen/hapus/<?= $d['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>                   
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>