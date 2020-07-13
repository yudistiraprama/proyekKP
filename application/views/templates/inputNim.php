<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <?= $form; ?>
                </div>
                <?php if ($this->session->flashdata('terdaftar')): ?><!--masih ngebug-->
<!--                    <div class="row mt-3">
                        <div class="col-md-10">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('terdaftar'); ?>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>  -->
                <?php endif; ?>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nim">NIM Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" id="nim">
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <button type="submit" name="inputNim" value="inputNim" class="btn btn-primary float-right">Search</button>
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div>
