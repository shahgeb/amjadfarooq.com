<?php $this->load->view('includes/header');?>
	
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

   <!-- Site contents start here-->
	<script>
$(document).ready(function(){
    $("input:file").change(function (){
       
       $.post("<?=base_url('profile/picture')?>",{imag: $('#uploadpic').val()}, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
    });
     });
     

});
</script>	
	<div class="warrap innerpage">

		<div class="warp-inner">

			<div class="container-fluid">

			

				<div class="row">
					
<div class="col-md-3"></div>
<div class="col-md-6">
<?=$this->session->flashdata('error');?>
				<form action="" method="POST" class="login-form" style="margin-top: 20%;">
					
					<div class="form-group">
						<input type="text" style="<?=(form_error('first') ? 'border-color: red;' : '') ?>" name="first" value="<?=$data->FirstName;?>" class="form-control" placeholder="First Name"/>
					</div>
                   
					<div class="form-group">
						<input type="text" style="<?=(form_error('last') ? 'border-color: red;' : '') ?>" name="last" value="<?=$data->LastName;?>" class="form-control" placeholder="Last name"/>
					</div>
				
					<div class="form-group">
                        <select name="gender"  class="form-control" style="width: 100%;text-align-last:center;">
                            <option value="Male" <?=($data->Gender=='Male')?'selected':'';?>>Male</option>
                            <option value="Female" <?=($data->Gender=='Female')?'selected':'';?>>Female</option>
                        </select>
					</div>
					
					<div class="form-group">
						<input type="text" style="<?=(form_error('age') ? 'border-color: red;' : '') ?>" name="age" value="<?=$data->Age;?>" class="form-control" placeholder="Age"/>
					</div>
					
					
					<div class="form-group">
						<input type="text" readonly="" style="<?=(form_error('email') ? 'border-color: red;' : 'black') ?>" name="email" value="<?=$data->Email;?>" class="form-control" placeholder="Mail"/>
					</div>
					
					
                    <div class="form-group">
						<input type="password" style="<?=(form_error('password') ? 'border-color: red;' : '') ?>" name="password" value="<?=set_value('password');?>" class="form-control" placeholder="Password"/>
					</div>
                    

					<button type="submit" class="btn btn-sign">&nbsp; &nbsp; &nbsp; Update Profile &nbsp; &nbsp; &nbsp;</button>

				
				</form>

</div>
<div class="col-md-3"></div>			
				</div>

			</div>

		</div>

		<div class="sidebar-left">

			<div class="user-name">
				<h3><?=$data->FirstName.' '.$data->LastName ;?></h3>
				<div class="btn-menu">
					
				<a href="#" class="btn btn-img menu-toggle"> <img src="<?=base_url('Template');?>/img/times.png" alt="Close Menu"/> </a>

				<a href="#" class="btn btn-img btn-bar menu-toggle"> <img src="<?=base_url('Template');?>/img/bar.png" alt="Open Menu"/> </a>
				</div>
			</div>

			<div class="user-profile">
				<img src="<?=base_url('Template');?>/img/dp/<?=$data->Image;?>" alt="" class="img-responsive"/>
			    <input type="file" id="uploadpic" style="display:none" />
                <a href="#" onclick="document.getElementById('uploadpic').click();" class="btn-edit"><img src="<?=base_url('Template');?>/img/edit.png" alt=""/>Change Picture</a>
			</div>

			<div class="edit-profile">
				<a href="<?=base_url('profile');?>" class="btn-edit"><img src="<?=base_url('Template');?>/img/edit.png" alt=""/>Edit profile</a>
				<a href="<?=base_url('logout');?>" class="btn-edit"><img src="<?=base_url('Template');?>/img/logout.png" alt=""/>Logout</a>
				
                <span class="btn-edit"><img src="<?=base_url('Template');?>/img/counts.png" alt="Love"/><?=$data->Likes;?></span>
			</div>



			
		</div>

	</div>


	<!-- Site contents End here-->
 
<?php $this->load->view('includes/footer');?>