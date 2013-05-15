<section class="container-margin">
    <div id="page">
        <?php foreach ($this->gallery as $value) { ?>
            <img class="map" style="width: 100%" src="<?php echo IMAGES . $this->page['id'] . '/' . $value['img']; ?>" alt="<?php echo $value['caption']; ?>">
        <?php } ?>
    </div>
</section>
<section id="descInfoFull">
    <?php echo $this->page['content']; ?>  
</section>