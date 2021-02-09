
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

   
    <div class="container">
        <h4>Edit</h4>
        <hr>
        <form action="<?php echo base_url('guidelines/update/'.$guideline['id']); ?>" method="post">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo $guideline['name']; ?>" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="">File</label>
                <input type="file" name="file" value="<?php echo $guideline['file']; ?>" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
