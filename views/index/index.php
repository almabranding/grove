
    <?php foreach ($this->gallery as $value) { ?>
    <div class="backgroundContainer" style="height:98% !important;background-image: url('<?php echo IMAGES . $this->page['id'].'/'.$value['img']; ?>');"></div>
    <?php }?>
