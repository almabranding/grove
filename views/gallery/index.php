<script>
    var BGImageArray = new Array('<?php echo URL . 'public/images/home.jpg'; ?>');
</script>
<div class="preload preloadW"></div>
<div class="scrollbar">
    <div class="handle">
        <div class="mousearea"></div>
    </div>
</div>
<div id="fadeWhite"></div>
<div id="centered" class="frame" style="overflow: hidden;">
    <ul  class="bgList" style="height: 100%;width: 10000px">
        <?php foreach ($this->gallery as $value) { ?>
            <li class="bgContainer">
                <div class="backgroundContainer">
                    <div class="body-background" class="">
                        <img class="imgBG" src="<?php echo IMAGES . $this->page['id'].'/'.$value['img']; ?>" alt="<?php echo $value['caption']; ?>">
                    </div>
                </div>
                <div class="galleryThumb" class="">
                    <img class="imgBG" src="<?php echo IMAGES . $this->page['id'].'/'.$value['img']; ?>" alt="<?php echo $value['caption']; ?>">
                </div>
                <div class="bgDesc">
                    <h2><?php echo $value['description'];?></h2>  
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
<div id="replace">
    <div id="descInfo" class="  " style="">
        <h2>Title</h2>
        <p class="colsView">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
    </div>
    <div id="descNav">
        <div id="descDown"></div>
        <div id="descPrev" class="bgControl"></div>
        <div id="descNext" class="bgControl"></div>
    </div>
</div>

