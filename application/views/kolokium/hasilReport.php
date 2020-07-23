<?php var_dump($kolokium); ?>
<div class="container">
    <div class="row">
        <div class="col-md-16">
            <h3 class="mt-3">Report Jadwal Kolokium</h3>
            
            <h7>Jumlah Data : <?= $jumlahData; ?></h7>

            <table class="table" border="1">
                <thead class="thead-dark">
                    <tr style="text-align:center">
                        <th scope="col">No.</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Ruangan</th>
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

                    <?php $start = 0; ?>
                    <?php foreach ($kolokium as $kol) : ?>
                        <tr style="text-align:center">
                            <th><?= ++$start; ?></th>
                            <td><?= $kol['nim']; ?></td>
                            <td style="text-align:left"><?= $kol['nama']; ?></td>
                            <td><?= $kol['tanggal']; ?></td>
                            <td><?= $kol['durasi']; ?></td>
                            <td><?= $kol['ruang']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url(); ?>kolokium/report" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <a href="<?= base_url(); ?>kolokium/excel" class="btn btn-success"><i class="fas fa-file-excel"></i> Cetak Exel</a>


        </div>
    </div>

</div>