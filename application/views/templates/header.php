<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!--Fontawesome-->
        <script src="https://kit.fontawesome.com/b97fd1e223.js" crossorigin="anonymous"></script>

        <!-- My CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

        <title><?php echo $judul; ?></title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">

                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="fst.png" width="30" height="30">
                    INFORMATIKA
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>mahasiswa"><i class="fas fa-user-graduate"></i> Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>dosen"><i class="fas fa-user-friends"></i> Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>ruangan"><i class="fas fa-door-open"></i> Ruangan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-calendar-alt"></i>
                                Penjadwalan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="far fa-calendar-alt"></i> UTS</a>
                                <a class="dropdown-item" href="#"><i class="far fa-calendar-alt"></i> UAS</a>
                                <a class="dropdown-item" href="<?= base_url() ?>kolokium"><i class="far fa-calendar-alt"></i> Kolokium</a>
                                <a class="dropdown-item" href="<?= base_url() ?>pendadaran"><i class="far fa-calendar-alt"></i> Pendadaran</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>import"><i class="fas fa-file-import"></i> Import Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>tentang"><i class="far fa-address-card"></i> Tentang</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
