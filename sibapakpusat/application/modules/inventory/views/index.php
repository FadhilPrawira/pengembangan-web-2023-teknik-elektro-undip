    <style>
    #input_container {
    position:relative;
    width: 110px;
    }
    #input {
        margin:0;
        padding-right: 30px;
        width: 100%;
    }
    #input_img {
        position:absolute;
        bottom:2px;
        right:5px;
        width:24px;
        height:24px;
    }
    </style>
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Inventory Details</h6>
                    </div>
                    <script type="text/javascript">
            							$(document).ready(function() {
            								$.extend($.fn.DataTable.ext.classes, {
            									sWrapper: "dataTables_wrapper dt-bootstrap4",
            								});
            								$("#myTable").DataTable({
            									"columnDefs": [
                              {
            										className: 'text-center',
            										targets: 4
            									},
                              {
            										className: 'text-center',
                                orderable: false,
            										targets: 5
            									},
                              {
            										className: 'text-center',
            										targets: 6
            									},
                              {
            										className: 'text-center',
            										orderable: false,
            										targets: 7
            									},
                            ],
            									"columns": [
                                {"data": "prod_price_id"},
                                {"data": "image"},
                                {"data": "product_name"},
                                {"data": "attributes"},
                                {"data": "price"},
                                {"data": "tax_rate"},
                                {"data": "selling_price"},
                                {"data": "inventory"},
                                // {"data": "id"}
            									],
            									"processing": true,
            									"serverSide": true,
            									"ajax": {
            										"url": "<?= base_url("inventory/getInventory") ?>",
            										"dataType": "json",
            										"type": "POST",
            									},
            									language: {
            										processing: "<div class='loading'></div>",
            									},
            									"order": [
            										[0, 'asc']
            									],
            									"lengthMenu": [
            										[20, 30, 50, 100, 200],
            										[20, 30, 50, 100, 200]
            									]
            								});

                            $("#myTable").on('change','.inventory_container',function(){
                                var prod_price_id= $(this).attr('data-prod_price_id');
                                var new_inventory=$(this).val();

                                      var url=ADMIN_URL+'inventory/edit';
                                      var param={prod_price_id:prod_price_id,new_inventory:new_inventory};
                                      trigger_ajax(url,param).done(function(res){
                                      var res = JSON.parse(res);
                                      if(res['type'] === "success"){
                                        var myTable = $('#myTable').DataTable();
                                        // If you want totally refresh the datatable use this
                                        // myTable.ajax.reload();
                                        // If you want to refresh but keep the paging you can you this
                                        myTable.ajax.reload( null, false );
                                      }
                                    }).fail(function(){
                                      console.log("falied");
                                    });
                            });
            							});
            						</script>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="myTable">
                            <thead style="background: #1ba774;color:#fff">
                                <tr>
                                    <th>Id</th>
                                    <th id="image">Image</th>
                                    <th>Name</th>
                                    <th>Attributes</th>
                                    <th>Price</th>
                                    <th>Tax</th>
                                    <th>Selling Price</th>
                                    <th width="80px" id="inventory">Inventory</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
