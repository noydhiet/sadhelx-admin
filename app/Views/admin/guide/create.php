
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Guidelines</h1>
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
    				<label>guidelines name</label>
    				<div class="form-group">
                   		 <input type="text" name="guidelines_name" class="form-control"> 
                	</div>	
    			</div>
				<div class="col-md-4">
    				<label>guidelines description</label>
    				<div class="form-group">
                   		 <input type="text" name="guidelines_description" class="form-control"> 
                	</div>	
    			</div>
				<div class="col-md-4">
    				<label>guidelines type</label>
    				<div class="form-group">
                   		 <input type="text" name="guidelines_type" class="form-control"> 
                	</div>	
    			</div>
				<div class="col-md-4">
    				<label>guidelines link</label>
    				<div class="form-group">
                   		 <input type="text" name="guidelines_link" class="form-control"> 
                	</div>	
    			</div>					
    			<div class="col-md-4">
    				<label>File</label>
    				<div class="form-group">
                   		 <input type="file" name="file_upload" class="form-control"> 
                	</div>	
    			</div>
						
			<div class="col-md-4">
    				<div class="form-group">
					<input type="hidden" class="form-control" name="created_by" value="<?= $user->get('admin_username')?>" readonly>
					  </div>	
    			</div>
				</div>
    			<div class="col-md-4">
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
