
      <div class="mb-4">
        <?=$this->breadcrumbs->show();?>
      </div>
      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                </div>
              </div>
              <div class="mg-top-20">
                <a href="<?=admin_url('reports/products')?>" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="text">Download</span><span class="icon text-white-50"><i class="fas fa-download"></i></span>
                </a>

            </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Categories</div>

                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
              <div class="mg-top-20">
                <a href="<?=admin_url('reports/category')?>" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="text">Download</span><span class="icon text-white-50"><i class="fas fa-download"></i></span>
                </a>

            </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Brands</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-tags fa-2x text-gray-300"></i>
                </div>
              </div>
              <div class="mg-top-20">
                <a href="<?=admin_url('reports/brands')?>" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="text">Download</span><span class="icon text-white-50"><i class="fas fa-download"></i></span>
                </a>
            </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sales</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
              <div class="mg-top-20">
                <button id="btn_generate_sales_report" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="text">Generate Report</span><span class="icon text-white-50"><i class="fas fa-download"></i></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="sales_date_range" style="display:none;">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
          <form action="<?=base_url("reports/sales")?>" method="post">
          <div class="row">

            <div class="col-sm-12 form-group">
              <label>From Date<span class="text-danger">*</span></label>
              <input class="form-control form-control-sm" type="date" id="from_date" name="from_date"/>
            </div>
            <div class="col-sm-12 form-group">
              <label>To Date<span class="text-danger">*</span></label>
              <input type="date" class="form-control form-control-sm" id="to_date" name="to_date"/>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <button id="btn_download_sales_reports" type="submit" class="btn btn-danger btn-sm btn-icon-split">
                <span class="text">Download Report</span><span class="icon text-white-50"><i class="fas fa-download"></i></span>
              </button>
            </div>
          </div>
        </form>
        </div>
      </div>
      <script>
      $("#btn_generate_sales_report").on('click',function(){
          $("#sales_date_range").show();
      });
      // $("#btn_download_sales_reports").on('click',function(){
      //   var from_date=$("#from_date").val();
      //   var to_date=$("#to_date").val();
      //
      //
      //   $.ajax({
      //       type: "post",
      //       url: ADMIN_URL+"reports/sales",
      //       data: {
      //           from_date: from_date,
      //           to_date: to_date
      //       },
      //       success: function(data) {
      //
      //       }
      //   });
      //
      // });
      </script>
