<div class="card shadow mb-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Member</h6>
    </div>
    <div class="card-body">
        <?php echo form_open("member/submit",["class"=>"form-horizontal"]); ?>
            <?php //echo var_dump($member); ?>
            <input type="hidden" value="<?php echo $member->id; ?>" name="id">
            <div class="form-group">
                <label class="control-label col-sm-2" >Nim :</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" value="<?php echo $member->nim; ?>" placeholder="Enter Nim">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Nama :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" value="<?php echo $member->nama;  ?>" class="form-control"  placeholder="Enter Nama">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Telpon :</label>
                <div class="col-sm-10">
                    <input type="text" name="telpon" value="<?php echo $member->telpon; ?>" class="form-control"  placeholder="Enter Telpon">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" >Alamat :</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control"><?php echo $member->alamat; ?></textarea>
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