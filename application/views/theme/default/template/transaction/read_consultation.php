<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Konsultasi</h2>
			<div class ="triangle-border left">
				<h3><?php echo $result['subject'];?></h3>
				<p class="details"><?php echo date("D, d-m-Y h:i",strtotime($result['date_konsultasi']));?></p>
					<p style="margin-bottom:3px"><?php echo $result['konsultasi'];?></p>
				<?php
					if($result['status_konsultasi'] == 1) echo "<p class=\"details\"><b>Unread</b></p>";
					else if($result['status_konsultasi'] == 2) echo "<p class=\"details\"><b>Read</b></p>";
					else if($result['status_konsultasi'] == 3) echo "<p class=\"details\"><b>Replied</b></p>";
				?>
			</div>
			<?php
				if($result2 != FALSE){
			?>
			<div class ="triangle-border right">
				<h3>Re: <?php echo $result['subject'];?></h3>
				<p class="details" style="margin-top:5px"><?php echo date("D, d-m-Y h:i",strtotime($result2['date_jawaban']))." - Answered by ".$result2['name'];?></p>
				<p style="margin-bottom:3px"><?php echo $result2['jawaban'];?></p>
			</div>
			<?php
				}
			?>
			<a href="<?php echo base_url('memberarea/consultation/view_all/')?>"><= Back to Consultation</a>
      </div>
    </div>
    <div class="clear"></div>
</div>