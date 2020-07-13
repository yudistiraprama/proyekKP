<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    
    <title><?php echo $judul; ?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <a class="navbar-brand" href="<?= base_url(); ?>">
      <img src="https://www.usd.ac.id/logo/usd.png" width="30" height="30" alt="Malas Ngoding">
      INFORMATIKA
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>mahasiswa">Mahasiswa</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>dosen">Dosen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Penjadwalan
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">UTS</a>
              <a class="dropdown-item" href="#">UAS</a>
              <a class="dropdown-item" href="<?= base_url() ?>kolokium">Kolokium</a>
              <a class="dropdown-item" href="<?= base_url() ?>pendadaran">Pendadaran</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>import">Import Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Tentang</a>
          </li>
        </ul>

    </div>
  </div>
</nav>

  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">SI-USD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?= base_url() ?>mahasiswa">Mahasiswa</a>
            <a class="nav-item nav-link" href="<?= base_url() ?>peoples">Dosen</a>
            <a class="nav-item nav-link" href="">Penjadwalan</a>
            <a class="nav-item nav-link" href="">Import Data</a>
            <a class="nav-item nav-link" href="#">About</a>
            </div>
        </div>
    </div>
</nav>  -->