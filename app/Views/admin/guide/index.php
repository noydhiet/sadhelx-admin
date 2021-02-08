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
<div class="col-xl-9 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       Create Guidelines</div>
                       <a href="<?php echo base_url('guidelines/create'); ?>" class="btn btn-success float-right mb-3">+</a>
                       <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    foreach($guideline as $key => $data) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['file']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo base_url('guidelines/edit/'.$data['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('guidelines/delete/'.$data['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?php echo $data['name']; ?> ini?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

      </div>
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