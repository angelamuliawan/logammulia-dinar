<link href="<?php echo base_url()?>asset/slider/css/global.css" rel="stylesheet" type="text/css">
<div id="body">

<div id="container" style="float:left; margin-left:40px;">
		<div id="example">
			<img src="<?php echo base_url()?>asset/slider/img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
			<div id="slides">
				<div class="slides_container">
                <div class="slide">
						<a href="<?php echo base_url()?>asset/slider/img/slide-1.jpg" target="_blank"><img src="<?php echo base_url()?>asset/slider/img/slide-1.jpg" width="570" height="270" alt="Slide 7"></a>
						<div class="caption">
							<p>Gambar 1</p>
						</div>
					</div>
					<div class="slide">
						<a ><img src="<?php echo base_url()?>asset/slider/img/slide-2.jpg" width="570" height="270" alt="Slide 7"></a>
						<div class="caption">
							<p>Gambar 2</p>
						</div>
					</div>
                   
                  
				</div>
				<a href="#" class="prev"><img src="<?php echo base_url()?>asset/slider/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="<?php echo base_url()?>asset/slider/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
		<img src="<?php echo base_url()?>asset/slider/img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
            
		</div>
</div>
<?php $this->load->view('theme/default/template/common/print_sidebar')?>
</div>
<?php $this->load->view('theme/default/template/common/print_footer')?>
<script src="<?php echo base_url()?>asset/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url()?>asset/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
    
<?php $this->load->view('theme/default/template/common/print_loginbox')?>
<?php $this->load->view('theme/default/template/common/print_regisbox')?>
<style>
.tbheader
{
	background-color:#FFF; border-radius:3px; padding-left:5px; padding-right:5px; box-shadow:0px 0px 5px #FF6600;
}

#memberbox
{
	background-image:url(<?php echo base_url()?>asset/images/theme/default/banner.jpg);
	width:100%; height:80px;	margin-bottom:5px;
	float:left; border-top-left-radius:5px; border-top-right-radius:5px;
}

#productbox
{
	width:100%; height:76%;
	background-image:url(<?php echo base_url()?>asset/images/theme/default/banner.jpg);
	float:left; border-bottom-left-radius:5px; border-bottom-right-radius:5px;
}

#loginbox
{
	display:none;
}

#regisbox
{
	display:none;
}

#regisbox_ready
{
		background-image:url(<?php echo base_url()?>asset/images/theme/default/banner.jpg);
	width:600px; height:480px; position:fixed;
	left:30%; top:10%; box-shadow:0px 0px 20px #FF6600;
	border-top-left-radius:10px; border-top-right-radius:10px;
	-webkit-animation: opa 1s; -moz-appearance: opa 1s; animation: opa 1s;
	display:block; overflow:auto; font-family:Segoe UI; font-size:13px; color:#F60;
	
}

#loginbox_ready
{
		background-image:url(<?php echo base_url()?>asset/images/theme/default/banner.jpg);
	width:400px; height:300px; position:fixed;
	left:35%; top:10%; box-shadow:0px 0px 20px #FF6600;
	border-top-left-radius:10px; border-top-right-radius:10px;
	-webkit-animation: opa 1s; -moz-appearance: opa 1s; animation: opa 1s;
	display:block; font-family:Segoe UI; font-size:13px; color:#F60;
}

#outputregis
{
	background-color:#FCC; color:#F00;  display:none;
	border-color:#F00; border-style:solid; border-width:thin; border-radius:5px;	
}

@keyframes opa
{
	0%{
		opacity:0;
		top:5%;
	}
	100%{
		opacity:1;
		top:10%;
		}
}

@-webkit-keyframes opa
{
	0%{
		opacity:0;
		top:5%;
	}
	100%{
		opacity:1;
		top:10%;
		}
}
@-moz-keyframes opa
{
	0%{
		opacity:0;
		top:10%;
	}
	100%{
		opacity:1;
		top:10%;
		}
}


</style>