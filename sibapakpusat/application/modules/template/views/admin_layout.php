<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php if (!empty($title)) echo $title . ' | ' . PROJECT_TITLE; ?></title>
  <?php if(!empty($meta_description)) { ?>
    <meta name = "description" content = " <?php echo $meta_description;?>" />
  <?php } ?>

  <?php $admin_user = $this->session->userdata();
  ?>
  <!-- Icons-->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/admin/img/favicon.ico">
  <link href="<?=base_url("assets/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!--
  Custom styles for this template-->
  <link href="<?=base_url("assets/css/sb-admin-2.css");?>" rel="stylesheet">
  <link href="<?=base_url("assets/css/animate.css");?>" rel="stylesheet">
  <script src="<?= base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap-notify.min.js"); ?>"></script>
  <script src="<?= base_url("assets/js/app.js"); ?>"></script>
  <!-- <link href="<?= base_url("assets/summernote/summernote.css"); ?>" rel="stylesheet">
  <script src="<?= base_url("assets/summernote/summernote-lite.js"); ?>"></script> -->
  <!-- <link href="<?=base_url("assets/css/style.css");?>" rel="stylesheet"> -->

  <?php echo $css; ?>
  <script>
      var BASE_URL = '<?php echo base_url(''); ?>';
      var ADMIN_URL = '<?php echo base_url('').ADMIN_URL_PREFIX.'/'; ?>';
      var SITE_URL = '<?php echo base_url(); ?>';
  </script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=admin_url("dashboard")?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> add your logo-->
        </div>
        <div class="sidebar-brand-text mx-3">Sales & Inventory</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=admin_url("dashboard");?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Heading -->
      <div class="sidebar-heading">
        Inventory Mangament
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list"></i>
          <span>Category</span>
        </a>
        <div id="collapseCategory" <?php if($this->router->class=="category"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('category')?>">Category List</a>
            <a <?php if($this->router->method=="add"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('category/add')?>">Add Category</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-tags"></i>
          <span>Brands</span>
        </a>
        <div id="collapseBrands" <?php if($this->router->class=="brands"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('brands')?>">Brand List</a>
            <a <?php if($this->router->method=="add"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('brands/add')?>">Add Brand</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttributes" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-ellipsis-h"></i>
          <span>Attributes</span>
        </a>
        <div id="collapseAttributes" <?php if($this->router->class=="attributes"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('attributes')?>">Attribute List</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fab fa-product-hunt"></i>
          <span>Products</span>
        </a>
        <div id="collapseProducts" <?php if($this->router->class=="products"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('products')?>">Product List</a>

          </div>
        </div>
      </li>

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-dollar-sign"></i>
          <span>Sales</span>
        </a>
        <div id="collapseSales" <?php if($this->router->class=="sales"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="add"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('sales')?>">Sales List</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-warehouse"></i>
          <span>Inventory</span>
        </a>
        <div id="collapseInventory" <?php if($this->router->class=="inventory"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('inventory')?>">Inventory</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        Reports
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-server"></i>
          <span>Reports</span>
        </a>
        <div id="collapseReports" <?php if($this->router->class=="reports"){ echo 'class="collapse show"';}else{ echo 'class="collapse"';} ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a <?php if($this->router->method=="index" OR $this->router->method=="edit"){ echo 'class="collapse-item active"';}else{ echo 'class="collapse-item"';}?>  href="<?=admin_url('reports')?>">Reports</a>
          </div>
        </div>
      </li>



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <?php $msg=$this->session->flashdata();
          if ($msg) { ?>

          <script>
            $.notify({
              // options
              message: '<?= $msg["message"]; ?>'

            }, {
              // settings
              type: '<?= $msg["type"]; ?>',
              animate: {
                  enter: 'animated bounceIn',
		              exit: 'animated bounceOut'
              },
              animate: {
              enter: 'animated slideInRight',
              exit: 'animated slideOutRight'
            },
            placement: {
              from: "top",
              align: "right"
                }
            });
          </script>
      <?php  } ?>
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" disabled class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button disabled class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin_user['username']; ?></span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="<?=base_url('activity');?>">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=admin_url('admin/login/logout')?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <main class="main">

              <?php echo $content; ?>
          </main>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> &copy; Sales & Inventory System in PHP CodeIgniter - <?php echo date("Y"); ?></span><br/> <br/>
            <span>Developed by Sahebul</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="<?=admin_url('admin/login/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="<?=base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js");?>"></script>
  <script src="<?=base_url("assets/vendor/jquery-easing/jquery.easing.min.js");?>"></script>
  <script src="<?=base_url("assets/js/sb-admin-2.min.js");?>"></script>
  <script src="<?=base_url("assets/vendor/chart.js/Chart.min.js");?>"></script>
  <?php echo $js; ?>

</body>

</html>
