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
<?php for($i=0;$i<5;$i++){?>
<li class="bgContainer">
    <div class="body-background" class="">
        <img class="imgBG" src="<?php echo URL . 'public/images/ej'.$i.'.jpg'; ?>" alt="Bg">
        
    </div>
    <div class="bgDesc">
        <h2>Descripcion</h2>  
    </div>
</li>
<?php }?>
<?php for($i=0;$i<5;$i++){?>
<li class="bgContainer">
    <div class="body-background" class="">
        <img class="imgBG" src="<?php echo URL . 'public/images/ej'.$i.'.jpg'; ?>" alt="Bg">
    </div>
    <div class="bgDesc">
        <h2>Descripcion</h2>  
    </div>
</li>
<?php }?>
<?php for($i=0;$i<5;$i++){?>
<li class="bgContainer">
    <div class="body-background" class="">
        <img class="imgBG" src="<?php echo URL . 'public/images/ej'.$i.'.jpg'; ?>" alt="Bg">
    </div>
    <div class="bgDesc">
        <h2>Descripcion</h2>  
    </div>
</li>
<?php }?>
</ul>
</div>
<div id="descNav">
<div id="descDown"></div>
<div id="descPrev"></div>
<div id="descNext"></div>
</div>

