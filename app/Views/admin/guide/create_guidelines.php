<!DOCTYPE html>
<html lang="en">

<head>

<?php echo view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php echo view("admin/_partials/navbar.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Guidelines</h1>
                    </div>

                    <div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       Create Guidelines</div>
                        <form class="form-horizontal" id="form_transaksi" role="form">
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Guidelines</label>
                                <div class="col-md-9">
                                  <input class="form-control reset" id="Guidelines"  name="nama" type="text" placeholder="Guidelines" >
                                </div>
                            </div>
                        </form>
                    <button type="button" class="btn btn-md btn-primary" id="tambah" disabled="disabled" onclick="add()"><i class="fa fa-shopping-cart"></i> input</button>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php echo view("admin/_partials/footer.php")?>
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
    <?php echo view ("admin/_partials/modal.php")?>

    <!-- Bootstrap core JavaScript-->
    <?php echo view("admin/_partials/js.php")?>


  </body>

</html>