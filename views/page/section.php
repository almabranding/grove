<section class="container-margin" style="background:#fff;height: 97%;overflow: hidden;">
    <?php $value=$this->gallery[0];?>
        <div id="sectionImage" style="background: url('<?php echo IMAGES . $this->page['id'] . '/' . $value['img']; ?>') no-repeat scroll 0 0 transparent"></div>
    <?php  ?>
    <div id="sectionText">
        <?php echo $this->page['content_'.LANG]; ?>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</section>