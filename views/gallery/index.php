<script>
    var BGImageArray=new Array('<?php echo URL . 'public/images/home.jpg'; ?>');
</script>

<div class="scrollbar">
<div class="handle">
<div class="mousearea"></div>
</div>
</div>
<div id="centered" class="frame" style="overflow: hidden;">
<ul  class="bgList" style="height: 100%;width: 10000px">
<?php for($i=0;$i<20;$i++){?>
<li class="bgContainer">
    <div class="body-background" class="">
        <img class="imgBG" src="<?php echo URL . 'public/images/home.jpg'; ?>" alt="Bg">
    </div>
    <div class="bgDesc">
        Descripcion
    </div>
</li>
<?php }?>
</ul>
</div>
