<div class="post" id="<?php echo $this->id; ?>">
	<?php if(!empty($albums)): ?>
		<h2 class="title"><?php echo $name; ?></h2>
		<div id="photos_albums" class="clearfix">
	       <div id="photos_albums_container" class="clearfix">
            	<?php
            	$i=1;
            	foreach($albums as $album): ?>
            		<div class="photo_row">
            			<div class="cont">
            				<a href="<?php echo $this->controller->createUrl($this->controller->action->id,array('dir'=>$album['name'])); ?>" class="img_link">
                                <img src="<?php echo $album['thumb']; ?>"/>
            					<div class="photo_album_title">
            						<div class="clearfix" style="margin: 0px">
            							<div class="ge_photos_album" style="float:left" title="<?php echo $album['title']; ?>"><?php echo $album['title']; ?></div>
            							<div class="camera" style="float:right"><?php if($displayNumImages){ echo $album['count'];/*printf(ngettext("%d фото", "%d фото", $album['count']), $album['count']); */} ?></div>
            						</div>
            						<div class="description"></div>
            					</div>
            				</a>
            			</div>
            		</div>
            	<?php
		$i++;
	endforeach; ?>
<br/>
	<?php $this->widget('CLinkPager',array(
        'pages'=>$pages,
        'cssFile'=>'/css/pager.css',
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<span>Попередня</span>',
        'nextPageLabel'=>'<span>Наступна</span>',
        'lastPageLabel'=>'>>',
        'nextPageCssClass'=>'_next',
        'previousPageCssClass'=>'_prev',
        'maxButtonCount'=>'10',  )); 
    ?>
    <br/>
</div>
	<?php elseif(!empty($images)): ?>
	<h2 class="title"><?php echo CHtml::link($name,
		$this->controller->createUrl($this->controller->action->id)); ?> &raquo; <?php echo $details['name']; ?>
	</h2>	
    	
 <div id="photos_albums" class="clearfix">
	<div id="photos_albums_container" class="clearfix">
    <?php if(!empty($details['description'])): ?>
			<p class="gallery_description"><?php echo $details['description']; ?>
		<?php endif; ?>
	<ul class="egallery">
	<?php
	$i=1;
	foreach($images as $image): ?>
		<li>
            <a href="<?php echo $image['url']; ?>" class="fancybox" title="" target="_blank" data-fancybox-group="<?php echo $_GET['dir']; ?>">
                <img src="<?php echo $image['thumb']; ?>"/>
            </a>
        </li>
	<?php
		$i++;
	endforeach; ?>
	</ul>
    <br/>
	<?php $this->widget('CLinkPager',array(
        'pages'=>$pages,
        'cssFile'=>'/css/pager.css',
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<span>Попередня</span>',
        'nextPageLabel'=>'<span>Наступна</span>',
        'lastPageLabel'=>'>>',
        'nextPageCssClass'=>'_next',
        'previousPageCssClass'=>'_prev',
        'maxButtonCount'=>'10',  )); 
    ?>
    <br/>
	<?php endif; ?>
    </div>
</div>

		
	</div>