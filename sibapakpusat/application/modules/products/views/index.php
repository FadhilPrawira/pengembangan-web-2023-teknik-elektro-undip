
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Aset Persediaan</h6>
                        <div class="dropdown no-arrow">
                          <a class="btn btn-outline-success btn-sm" href="<?=admin_url('products/add');?>" role="button">
                              <i class="fas fa-plus fa-sm"></i> Tambah Aset Persediaan
                          </a>
                          <button class="btn btn-outline-success btn-sm"><?php echo anchor(admin_url('products/insertapi'), 'Insert to monitoring'); ?></button>

                              <i class="fas fa-plus fa-sm"></i> Tambah Aset Persediaan
                          </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="myTable">
                            <thead style="background: #1ba774;color:#fff">
                                <tr>
                                    <th>No. Kuitansi</th>
                                    <th>Uraian</th>
                                    <th>Tanggal</th>
                                    <th>Tahun</th>
                                    <th>Total Harga</th>
                                    <!--<th id="inventory">Inventory & Price</th>-->
                                    <th>Status</th>
                                    <th>Posisi Terakhir</th>
                                    <th id="inventory">Lihat</th>
                                    <th id="action" width="10%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->

        <div class="modal fade" id="InventoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="inventory_modal_body">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
