<style>
    @media only screen and (max-width : 620px) {
        #container{
            height: 100% !important;
        }
    }
</style>
    <?php foreach ($this->gallery as $value) { ?>
    <div class="backgroundHome" style="height:98%;background-image: url('<?php echo IMAGES . $this->page['id'].'/'.$value['img']; ?>');"></div>
    <?php }?>
