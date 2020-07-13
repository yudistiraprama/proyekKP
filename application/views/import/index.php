<style type="text/css">
	body{
		font-family: sans-serif;
	}

	p{
		color: green;
	}
</style>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <h3>Import Exel ke Database</h3>
            <br><br>
            
            <?php if(isset($_GET['berhasil'])) : ?>
		        echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	
            <?php endif;?>

                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("index.php/presensi/import") ?>">
                    Pilih File: 
                    <input name="file" type="file" multiple>
                    <br><br>
                    <input name="upload" type="submit" class="btn btn-primary" value="Import">
                </form>

        </div>
    </div>
</div>
    