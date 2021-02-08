<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> 
</head>
<body style="width: 70%; margin: 0 auto; padding-top: 30px;">
	<div class="row">
        <div class="col-lg-12 margin-tb"></div>
    </div>
    <hr>
    <div class="row">
    	<div class="col-lg-12">
    		 <!-- Success Upload -->
	        <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
	            <div class="alert alert-success">
	                <?php echo session()->getFlashdata('berhasil');?>
	            </div>
	        <?php } ?>
	        
            <form action="/guidelines/store" method="post" enctype="multipart/form-data">

    		<div class="row">
    			<div class="col-md-4">
    				<label>Judul</label>
    				<div class="form-group">
                   		 <input type="text" name="name" class="form-control"> 
                	</div>	
    			</div>
    			<div class="col-md-4">
    				<label>File</label>
    				<div class="form-group">
                   		 <input type="file" name="file_upload" class="form-control"> 
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
    
</body>
</html>
