
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Edit Guidelines</h1>
 </div>

<div class="row">

    	<div class="col-lg-12">
    		 <!-- Success Upload -->
	        <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
	            <div class="alert alert-success">
	                <?php echo session()->getFlashdata('berhasil');?>
	            </div>
	        <?php } ?>

   
    <div class="container">
        <h4>Edit</h4>
        <hr>
        <form action="<?php echo base_url('guidelines/update/'.$guideline['guidelines_id']); ?>" method="post">
        <div class="row">

        <div class="col-md-4">
            <label for="">guidelines name</label>
                <div class="form-group">
                    <input type="text" name="guidelines_name" value="<?php echo $guideline['guidelines_name']; ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4">
            <label for="">guidelines description</label>
                <div class="form-group">
                    <input type="text" name="guidelines_description" value="<?php echo $guideline['guidelines_description']; ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4">
            <label for="">guidelines type</label>
                <div class="form-group">
                    <input type="text" name="guidelines_type" value="<?php echo $guideline['guidelines_type']; ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4">
            <label for="">guidelines link</label>
                <div class="form-group">
                    <input type="text" name="guidelines_link" value="<?php echo $guideline['guidelines_link']; ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4">
                <label for="">File</label>
                <div class="form-group">
                <input type="file" name="file" value="<?php echo $guideline['file']; ?>" class="form-control" placeholder="Name">
            </div>
            </div>
            <div class="col-md-4">
    				<div class="form-group">
					<input type="hidden" class="form-control" name="updated_by" value="<?= $user->get('admin_username')?>" readonly>
					  </div>	
    			</div>
				</div>
                <div class="col-md-4">
    				<div class="form-group">
					<input type="hidden" class="form-control" name="created_by" value="<?= $user->get('admin_username')?>" readonly>
					  </div>	
    			</div>
				</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </div>
        </form>
    </div>
    </div>
    
    </div>
    </div>
    </div>
