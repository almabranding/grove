
<div class="white_box hide" id="newImage" style="width:auto;left:30%;position:absolute;">
    <?php $this->viewUploadFile($this->id);?>
</div>
<div>
    <?php $this->form->render(); ?>
</div>
<div>
    <ul id="sortable" class="ui-sortable sortable" rel="cosa">
    <?php foreach ($this->Gallery as $key=>$value){?>
    <li id="foo_<?php echo $value['id'];?>" class="ui-state-default" onclick="">
    <a target="_blank" href="<?php echo URL.UPLOAD.$this->id.'/'.$value['img'];?>"><img caption="<?php echo $value['caption_'.LANG];?>" src="<?php echo URL.UPLOAD.$this->id.'/'.$value['thumb'];?>"></a>
    <?php
    // project_model::editImage(1);
    ?>
    <input id="h1096" class="btn editImg" type="button" value="Edit" onclick="location.href='<?php echo URL.LANG;?>/image/view/<?php echo $value['id'];?>' " style="margin:0;">
    <input id="save" class="btn" type="submit" value="Delete"onclick="location.href='<?php echo URL.LANG;?>/image/delete/<?php echo $this->id.'/'.$value['id'];?>' " style="background: #bb0000;margin:0;">
    </li>
    <?php }?>
</div>
<div>
    <ul rel="cosa">
    <?php foreach ($this->Files as $key=>$value){?>
    <li style="display:inline-block;">
        <a target="_blank" href="<?php echo URL.UPLOAD.$this->id.'/'.$value['name'];?>"><img width="80" caption="<?php echo $value['caption_'.LANG];?>" src="<?php echo URL.UPLOAD.'../'.$value['thumb'];?>"></a>
        <p><?php echo $value['name'];?></p>
        <input id="save" class="btn" type="submit" value="Delete"onclick="location.href='<?php echo URL.LANG;?>/file/delete/<?php echo $this->id.'/'.$value['id'];?>' " style="background: #bb0000;margin:0;">
    </li>
    <?php }?>
</div>
<div style="text-align: right;">
   <input type="button" id="save" value="Upload" onclick="showPop('newImage');" class="btn" />
</div>