
    <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

	<div class="col-lg-7">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">							
							<img class="img-profile rounded-circle" src="img/sadhelX.png" height="200" width="500">
<?=form_open('admin/login');?>
	
        <div class="form-group">
        	<input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-user btn-block">Sign in</button>
        </div>
		<div class="bottom-action clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center small">Don't have an account? <a href="<?php echo base_url('admin/registration') ?>">Sign up here!</a></p>
</div>
