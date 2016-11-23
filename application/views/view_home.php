<?php $this->load->view('includes/header');?>
	
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

   <!-- Site contents start here-->
<script>
$(document).ready(function(){
    
     

});
</script>		
	<div class="warrap innerpage">

		<div class="warp-inner">

			<div class="container-fluid">

				<div class="row">
                   <?=$msg;?>
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
						    
						    <img src="<?=base_url('Template');?>/img/nav-right.png" alt="" class="icon-nav"/>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#loginslider" role="button" data-slide="next">
						    <img src="<?=base_url('Template');?>/img/nav-left.png" alt="" class="icon-nav"/>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
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
            <form method="POST" action="" enctype="multipart/form-data" >
				<img src="<?=base_url('Template');?>/img/dp/<?=$data->Image;?>" alt="" class="img-responsive"/>
			    <input type="file" name="imgdp" id="uploadpic" onchange="form.submit()" style="display:none" />
                <a href="#" onclick="document.getElementById('uploadpic').click();" class="btn-edit"><img src="<?=base_url('Template');?>/img/edit.png" alt=""/>Change Picture</a>
			   </form>
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