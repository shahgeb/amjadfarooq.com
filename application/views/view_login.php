<?php $this->load->view('includes/header');?>

	<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

   <!-- Site contents start here-->
		
	<div class="warrap loginpage">

		<div class="warp-inner">

			<div class="container-fluid">

				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="people-button">
							<a href="#" class="btn btn-default"> &nbsp;&nbsp;&nbsp; All &nbsp;&nbsp;&nbsp; </a>
							<a href="#" class="btn btn-default"> &nbsp; Nearby &nbsp; </a>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
						<div id="loginslider" class="carousel slide profile-slider" data-ride="carousel">
						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
						  	<?php $i=0; foreach($users as $row) { ?>
						    <div class="item <?=($i<=0)?'active':'';?>">
						      <img src="<?=base_url('Template/img/dp/'.$row->Image);?>"alt="slider"/>
						      <div class="carousel-caption">
						      	<a href="#"><?=$row->FirstName.' '.$LastName;?></a>
						      	<a href="#" id="LikePro" onclick="$('pid').val('<?=$row->ID;?>');likee('<?=$row->ID;?>');">
                                <input type="hidden" id="pid" name="pid" />
                                <input type="hidden" id="inc" value="<?=$row->Likes+1;?>" name="inc" />
                                  
                                  <div class="love-count">
						      		<span id="lke" style="color: white;"><?=$row->Likes;?></span>
						      	</div>
                                </a>
						      </div>
						    </div>

						    <?php $i++;} ?>
                            
                            <script>
                            function likee(id)
{
   $.post("<?=base_url('profile/like');?>/"+id,{suggest:'hii'}, function(data, status){
        //alert(data);
        if(data=='false')
        {
            alert('You can\'t Like more than one from same IP');
            
        }
        else
        {
            var llk = $('#inc').val();
            $('#lke').html(llk);
        }
    }); 
} 
                            </script>

						  </div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#loginslider" role="button" data-slide="prev">
						    
						    <img src="<?=base_url('Template');?>/img/nav-right.png" alt="" class="icon-nav">
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#loginslider" role="button" data-slide="next">
						    <img src="<?=base_url('Template');?>/img/nav-left.png" alt="" class="icon-nav">
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="sidebar-right">

			<div class="sidebar">

				<div class="logo"><img src="<?=base_url('Template');?>/img/logoX.png" alt="" class="img-responsive"/> </div>

				<form action="" method="POST" class="login-form">
					<?=$this->session->flashdata('error');?>
                    <?=$error;?>
					<div class="form-group">
						<input type="text" style="<?=(form_error('email') ? 'border-color: red;' : '') ?>" name="email" value="<?=set_value('email');?>" class="form-control" placeholder="Email"/>
                        
					</div>
					
					<div class="form-group">
						<input type="password" style="<?=(form_error('password') ? 'border-color: red;' : '') ?>" name="password" value="<?=set_value('password');?>" class="form-control" placeholder="Password"/>
                       
					</div>

					<button type="submit" class="btn btn-sign">&nbsp; &nbsp; &nbsp; Sign In &nbsp; &nbsp; &nbsp;</button>
					<span class="help-block">Don’t have an account? <a href="<?=base_url('register');?>">Sign Up</a></span>
				</form>

			</div>

		</div>

	</div>


	<!-- Site contents End here-->
 
<?php $this->load->view('includes/footer');?>