<section class="container-margin" id="map-container">
    <div id="map">
        <?php foreach ($this->gallery as $value) { ?>
            <?php foreach ($this->files as $file) { ?>
                <a href="<?php echo IMAGES . $this->page['id'] . '/' . $file['name']; ?>" target="_blank" id="download"></a>
            <?php } ?>
            <img class="map" style="width: 100%" src="<?php echo IMAGES . $this->page['id'] . '/' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>">
            
        <?php } ?>
    </div>
</section>
<div id="xpandInfo"><?php echo $this->lang['moreInfo2'];?></div>
<section id="descInfoRight">
    <?php echo $this->page['content_'.LANG]; ?>  
    <div class="clr"></div>
</section>