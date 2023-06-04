
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$button;?> Attribute</h6>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="usr">Attribute Values:</label>
                              <input type="text" class="" id="" name="attributes_value" value="<?php echo $attributes_value;?>">
                              <?php echo form_error('name');?>
                            </div>
                        </div>
                      </div>

                      <input type="hidden" name="attributes_id" value="<?php echo $attributes_id;?>"/>

                    </div>
                    <div class="card-footer">
                      <a href="<?=admin_url('attributes')?>" class="btn btn-danger btn-sm btn-icon-split">
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
         <script src="<?php echo base_url()?>assets/js/tagify.js"></script>
        <link href="<?php echo base_url()?>assets/css/tagify.css" rel="stylesheet" />
         <!-- <script src="<?php echo base_url()?>assets/js/jQuery.tagify.min.js"></script> -->
        <script>
        var input = document.querySelector('input[name=attributes_value]'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                whitelist : [],
                blacklist : [], // <-- passed as an attribute in this demo
            });

        // "remove all tags" button event listener
        document.querySelector('.tags--removeAllBtn')
            // .addEventListener('click', tagify.removeAllTags.bind(tagify))

        // Chainable event listeners
        tagify.on('add', onAddTag)
              .on('remove', onRemoveTag)
              .on('input', onInput)
              .on('edit', onTagEdit)
              .on('invalid', onInvalidTag)
              .on('click', onTagClick);

        // tag added callback
        function onAddTag(e){
            // console.log("onAddTag: ", e.detail);
            // console.log("original input value: ", input.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e){
            // console.log(e.detail);
            // console.log("tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e){
            // console.log(e.detail);
            // console.log("onInput: ", e.detail);
        }

        function onTagEdit(e){
            // console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e){
            // console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e){
            // console.log(e.detail);
            // console.log("onTagClick: ", e.detail);
        }
        </script>
