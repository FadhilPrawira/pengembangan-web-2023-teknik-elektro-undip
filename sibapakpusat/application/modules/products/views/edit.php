<style>
.modal.left .modal-dialog,
.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		-ms-transform: translate3d(0%, 0, 0);
		-o-transform: translate3d(0%, 0, 0);
		transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}

	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: 2px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}

	.modal.left.fade.in .modal-dialog{
		left: 0;
	}

/*Right*/
	.modal.right.fade .modal-dialog {
		right: 2px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}

	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

    </style>
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?=$button;?> Proses Aset Persediaan</h6>
                    </div>
										<div>
											<table class="table" id="tbl_attributes">
												<tr>
													<th>Kode Usulan Belanja</th>
													<th>Deskripsi</th>
													<th>Jumlah</th>
													<th>Harga Satuan</th>
													<th>Subtotal</th>
												</tr>
												<?php foreach ($edit_persediaan_data as $key => $value) {?>
													<tr>

														<td><input type="text" class="form-control" readonly name="kode_usulan_belanja[]" value="<?=$value->kode_usulan_belanja; ?>" style="width: 150px;"></td>
														<td><input type="text" class="form-control"  readonly name="deskripsi[]" value="<?=$value->deskripsi; ?>" style="width: 530px;"></td>
														<td><input type="text" class="form-control" readonly name="jumlah[]" value="<?=$value->jumlah; ?>" style="width: 80px;"></td>
														<td><input type="text" class="form-control" readonly name="harga_satuan[]" value="<?=$value->harga_satuan; ?>"></td>
														<td><input type="text" class="form-control" readonly name="subtotal[]" value="<?=$value->subtotal; ?>" ></td>
														<td><a href="#!" class="btn-danger btn-circle btn-sm text-white btn_remove_row" onclick="removepersediaanROW(this);" ><i class="fas fa-trash-alt"></i></a></td>
													</tr>
												<?php }?>


											</table>
										</div>
                    <!-- Card Body -->
                    <form action="<?= $action;?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="status">Status:</label>
                              <input type="text" class="form-control" id="status" name="status" value="<?php echo $edit_data[0]->status;?>">
                              <?php echo form_error('status');?>
                            </div>
                        </div>
											</div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="no_kuitansi">No. Kuintansi:</label>
														<input type="text" class="form-control" id="no_kuitansi" readonly name="no_kuitansi" value="<?php echo $edit_data[0]->no_kuitansi;?>">
														<?php echo form_error('no_kuitansi');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="unit_kuitansi">Unit Kuitansi:</label>
														<input type="text" class="form-control" id="unit_kuitansi" name="unit_kuitansi" value="<?php echo $edit_data[0]->unit_kuitansi;?>">
														<?php echo form_error('unit_kuitansi');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="uraian">Uraian:</label>
														<input type="text" class="form-control" id="uraian" name="uraian" value="<?php echo $edit_data[0]->uraian;?>">
														<?php echo form_error('uraian');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="tahun">Tahun:</label>
														<input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $edit_data[0]->tahun;?>">
														<?php echo form_error('tahun');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="tanggal">Tanggal:</label>
														<input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $edit_data[0]->tanggal;?>">
														<?php echo form_error('tanggal');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="tanggal_proses">Tanggal Proses:</label>
														<input type="text" class="form-control" id="tanggal_proses" name="tanggal_proses" value="<?php echo $edit_data[0]->tanggal_proses;?>">
														<?php echo form_error('tanggal_proses');?>
													</div>
                        </div>
                      </div>
											<div class="row">
                        <div class="col-sm-12">
													<div class="form-group">
                            <label for="posisi_terakhir">Posisi Terakhir:</label>
														<input type="text" class="form-control" id="posisi_terakhir" name="posisi_terakhir" value="<?php echo $edit_data[0]->posisi_terakhir;?>">
														<?php echo form_error('posisi_terakhir');?>
													</div>
                        </div>
                      </div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label for="unit">Unit:</label>
														<input type="text" class="form-control" id="unit" name="unit" value="<?php echo $edit_data[0]->unit;?>">
														<?php echo form_error('unit');?>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<label for="subunit">Subunit:</label>
														<input type="text" class="form-control" id="subunit" name="subunit" value="<?php echo $edit_data[0]->subunit;?>">
														<?php echo form_error('subunit');?>
													</div>
												</div>
											</div>

                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="subsubunit">Subsubunit:</label>
															<input type="text" class="form-control" id="sub_subunit" name="sub_subunit" value="<?php echo $edit_data[0]->sub_subunit;?>">
															<?php echo form_error('subsubunit');?>
                            </div>
                        </div>
                      </div>
											<div class="row">
												<div class="col-sm-12">
														<div class="form-group">
															<label for="total_harga">Total Harga:</label>
															<input type="text" class="form-control" id="total_harga" name="total_harga" value="<?php echo $edit_data[0]->total_harga;?>">
															<?php echo form_error('total_harga');?>
														</div>
												</div>
											</div>
											<div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="file_bast">File BAST:</label>
															<input type="text" class="form-control" id="file_bast" name="file_bast" value="<?php echo $edit_data[0]->file_bast;?>">
															<?php echo form_error('file_bast');?>
                            </div>
                        </div>
                      </div>

                      <!-- attributes block -->
                      <div>
                        <table class="table" id="tbl_attributes">
                          <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                          </tr>
													<?php foreach ($edit_data as $key => $value) {?>
														<tr >

															<td><input type="text" class="form-control"  name="no[]" value="<?=$value->no; ?>" style="width: 50px;"></td>
												      <td><input type="text" class="form-control"   name="barang[]" value="<?=$value->barang; ?>" style="width: 530px;"></td>
												      <td><input type="text" class="form-control"  name="jumlah[]" value="<?=$value->jumlah; ?>"></td>
												      <td><input type="text" class="form-control"  name="satuan[]" value="<?=$value->satuan; ?>"></td>
												      <td><input type="text" class="form-control"  name="harga[]" value="<?=$value->harga; ?>" ></td>
												      <td><input type="text" class="form-control"  name="subtotalline[]" value="<?=$value->subtotal; ?>"></td>
												      <td><a href="#!" class="btn-danger btn-circle btn-sm text-white btn_remove_row" onclick="removepersediaanlineROW(this);" ><i class="fas fa-trash-alt"></i></a></td>
												    </tr>
													<?php }?>


                        </table>
                      </div>
                      <!-- end of attributes block -->


                      <br/>
                      <div class="row" >
                        <div class="col-sm-12" align="center">
                        <button id="tambahbarang" type="button" class="btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target="#myModal2">
                          <span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Barang</span>
                        </button>
												<?php echo form_error('barang[]');?>
                      </div>

                      </div>


                      <input type="hidden" name="no_kuitansi" value="<?php echo $no_kuitansi;?>"/>

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

        <!-- Modal -->
        	<div class="modal left fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        		<div class="modal-dialog" role="document">
        			<div class="modal-content">

        				<div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel2">Tambah Barang</h4>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				</div>

        				<div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
												<div class="form-group">
													<label>No:</label>
													<input type="text" class="form-control" id="no" name="no">
												</div>
                        </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Barang:</label>
												<input type="text" class="form-control" id="barang" name="barang">
                        </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Jumlah:</label>
												<input type="text" class="form-control" id="jumlah" name="jumlah">
												</div>
                    </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label >Satuan:</label>
                        <input type="text" class="form-control" id="satuan" name="satuan">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label >Harga:</label>
                        <input type="text" class="form-control"  name="harga" id="harga">
                      </div>
                  </div>
									<div class="col-sm-12">
											<div class="form-group">
												<label>Subtotal:</label>
												<input type="text" class="form-control"  name="subtotal" id="subtotal">
											</div>
									</div>
                  <div class="col-sm-12 text-center">
                    <button type="button" id="btnAddNewAttributes" class="btn btn-success btn-sm btn-icon-split">
                      <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text">Tambah</span>
                    </button>
                  </div>
                </div>
        				</div>

        			</div><!-- modal-content -->
        		</div><!-- modal-dialog -->
        	</div><!-- modal -->
