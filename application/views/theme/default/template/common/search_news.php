<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Search </h2>
          <p>Hasil pencarian dari kata : <em><?php echo $word;?></em></p>
          <p>&nbsp;</p>
          <p id="searchresult">
          <?php
		  if($result===FALSE)
		  {
			echo "No result found";  
		  }else{
			foreach($result as $news)
			{
			 $title = preg_replace('/[^a-z0-9]+/','-',strtolower($news->title_news));
				?><a href="<?php echo base_url('news/read/'.$news->id_news.'/'.$title);?>"><?php echo $news->title_news;?></a><br/><?php
			}
		  }
		  ?>
          </p>
          
    </div>
  </div>
    <div class="clear"></div>
</div>
