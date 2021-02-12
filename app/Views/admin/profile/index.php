
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Profile</h1>
 </div>

<div class="row">

    	<div class="col-lg-12">
    		 <!-- Success Upload -->
	        <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
	            <div class="alert alert-success">
	                <?php echo session()->getFlashdata('berhasil');?>
	            </div>
	        <?php } ?>
	        
			<form action="<?php echo base_url('guidelines/store') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    		<div class="row">
			
    			<div class="col-md-4">
    				<label>name</label>
					<div class="col-sm-9">
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user['nama'] ?>">
  </div>	
    			</div>
			
    			<div class="col-md-4">
    				<label>Aksi</label>
    				<div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                	</div>	
    			</div>
    		</div>
    	</div>
	</div>
</div>
</div>
    </div>
		</div>
