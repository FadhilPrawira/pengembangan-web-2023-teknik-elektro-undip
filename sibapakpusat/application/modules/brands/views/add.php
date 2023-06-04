
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$button;?> Brand</h6>
                    </div>
                    <!-- Card Body -->
                    <form action="<?= $action;?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="usr">Name:</label>
                              <input type="text" class="form-control" id="" name="name" value="<?php echo $name;?>">
                              <?php echo form_error('name');?>
                            </div>
                        </div>
                      </div>

                      <div class="row">

                  <div class=" col-md-6 form-group">
                    <label for="varchar">Upload Image <?php echo form_error('picture') ?></label>
                    <?php if($image_path){ ?>
                    <input type="file" name="image" id="image" data-error="Please upload  image." value="<?php echo $image_path; ?>" />
                    <br/><img src="<?php echo $image_path; ?>" class="img-responsive"  style="width:120px;height:100px;">

                    <?php }else{ ?>
                      <input type="file" name="image" id="image" data-error="Please upload product image." value="<?php echo $image_path; ?>" />
                    <?php } ?>
                  </div>
                </div>

                      <input type="hidden" name="brand_id" value="<?php echo $brand_id;?>"/>

                    </div>
                    <div class="card-footer">
                      <a href="<?=admin_url('brands')?>" class="btn btn-danger btn-sm btn-icon-split">
                        <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Back</span>
                      </a>
                      <button type="submit" class="btn btn-success btn-sm btn-icon-split">
                        <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text"><?=$button;?></span>
                      </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>public/pekeupload/js/pekeUpload.js" ></script> -->
<script>
   $(document).ready(function ($) {
		$("#image").pekeUpload({
			bootstrap: true,
			url: "<?= admin_url("upload/"); ?>",
			data: {file: "image"},
			limit: 1,
			allowedExtensions: "JPG|JPEG|GIF|PNG|PDF|jpg|jpeg|gif|png|pdf"
		});

	});
</script>
