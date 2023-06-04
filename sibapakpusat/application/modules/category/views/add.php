
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$button;?> Category</h6>
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
                      <input type="hidden" name="category_id" value="<?php echo $category_id;?>"/>

                    </div>
                    <div class="card-footer">
                      <a href="<?=admin_url('category')?>" class="btn btn-danger btn-sm btn-icon-split">
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
