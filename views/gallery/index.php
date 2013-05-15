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
                <div class="backgroundContainer" style="background-image: url('<?php echo IMAGES . $this->page['id'].'/'.$value['img']; ?>');"></div>
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
<div id="descMenu" class="navBox">
    <div id="descInfo" class="  " style="">
        <?php echo $this->page['content'];?>  
   </div>
    <div id="descNav">
        <div id="descDown"></div>
        <div id="descPrev" class="bgControl"></div>
        <div id="descNext" class="bgControl"></div>
    </div>
</div>
<div ></div>

