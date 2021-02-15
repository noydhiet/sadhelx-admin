
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Guidelines Active</h1>
                    </div>

                    <div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="table-responsive">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    
                <a href="<?php echo base_url('guidelines'); ?>" class="btn btn-success float-left mb-3">Guidelines</a>
                </div>
                </div>
                </div>

                       <table id="dataTable" class="table table-bordered">
                <thead>

                    <th>No</th>
                    <th>active id</th>
                    <th>active date</th>
                    <th>active by</th>
                    <th>fk guide id</th>
                     <th>Action</th>


                </thead>
                <tbody>
                    <?php $no=0; foreach($guidelinestatusshow as $data) { $no++ ?>

                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['active_id']; ?></td>
                        <td><?php echo $data['active_date']; ?></td>
                        <td><?php echo $data['activated_by']; ?></td>
                        <td><?php echo $data['fk_guidelines_id']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo base_url('guidelines/delete_active/'.$data['active_id']); ?>" class="btn btn-danger float-right mb-3" onclick="return confirm('Apakah Anda yakin ingin menghapus guide <?php echo $data['active_id']; ?> ini?')"><i class="fas fa-trash-alt"></i>del</a>
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
