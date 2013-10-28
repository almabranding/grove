<section class="container-margin" id="map-container">
    <div id="map">
        <?php foreach ($this->gallery as $value) { ?>
            <?php foreach ($this->files as $file) { ?>
                <a href="<?php echo IMAGES . $this->page['id'] . '/' . $file['name']; ?>" target="_blank" id="download_<?=LANG?>"></a>
            <?php } ?>
            <img class="map" style="width:100%;" src="<?php echo IMAGES . $this->page['id'] . '/' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>">
            
        <?php } ?>
    </div>
</section>
<!--<div id="xpandInfo"><?php //echo $this->lang['moreInfo2'];?></div>-->
<section id="descInfoMap">
    <div>
    <?php echo $this->page['content_'.LANG]; ?>  
    </div>
    <div class="clr"></div>
</section>
<?php if($this->page['name_EN']=='Area'){?>
<div id="areaBox"><a id="" href="<?php echo IMAGES . $this->page['id'] . '/' . $file['name']; ?>" target="_blank"><img src="<?php echo IMAGES . $this->page['id'] . '/' . $value['img']; ?>" alt="" /></a></div> 
<?php } ?>
