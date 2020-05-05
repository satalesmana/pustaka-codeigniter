<div class="card shadow mb-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buku Form</h6>
    </div>
    <div class="card-body">
        <?php if(isset($eror)){?>
            <div class="alert alert-danger" role="alert">
                <?php echo $eror; ?>
            </div>
        <?php } ?>

        <?php echo form_open_multipart("buku/submit",["class"=>"form-horizontal",]); ?>
        <input type="hidden" value="<?php echo $buku->id; ?>" name="id">

        <div class="form-group">
            <label class="control-label col-sm-2" >Judul :</label>
            <div class="col-sm-10">
                <input type="text" name="judul" value="<?php echo $buku->judul; ?>" class="form-control"  placeholder="Enter Judul">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Pengarang :</label>
            <div class="col-sm-10">
                <input type="text" name="pengarang" value="<?php echo $buku->pengarang; ?>" class="form-control"  placeholder="Enter Pengarang">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" >Gambar :</label>
            <div class="col-sm-10">
                <input type="file" name="gambar" class="form-control"  placeholder="Select Gambar">
            </div>
        </div>


        <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="reset" class="btn btn-danger">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>