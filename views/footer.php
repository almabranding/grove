
<div class="clr"></div></div><div class="clr"></div>
<div id="selectMenu">
<nav id="menuprimary" class="navBox">
    <?php echo Menu::getMenu(); ?>
</nav>
<footer>
    <div class="mapSubBar clr">
    <nav class="barLeft">
        <ul>
            <li>
                <div class="menuBtn"></div>
            </li>
        </ul>
    </nav>
    <nav class="barRight">
        
        <ul>
            <li class="footerScreen">
<!--               <a href='http://www.lemonyellow.com/' target="_blank"><span id="lemon" class="yellow"><?php //echo $this->lang['siteCredits'];?>: LY</span></a>-->
                <div id="lemonCredits" style="position:relative; width: 90px;height: 13px;">
                    <div style="position:absolute;opacity: 0;text-align: right;width: 100%;" id="lemon">LEMON YELLOW</div>
                    <div id="credits" style="position:absolute;text-align: right;width: 100%;"><?php echo $this->lang['siteCredits'];?></div>
                </div>
            </li>
            <li id="langChage">
                <ul class="langMenu">
                    <li class="menuLink"><a href="<?php echo URL.'EN'.RUTE;?>">ENGLISH</a></li>
                    <li class="menuLink"><a href="<?php echo URL.'ES'.RUTE;?>">SPANISH</a></li>
                    <li class="menuLink"><a href="<?php echo URL.'PT'.RUTE;?>">PORTUGUESE</a></li>
                </ul>
                <span class="menu"><?php echo $this->lang['actLang'];?></span><div class="langArrow"></div>
                
            </li>
            <li class="footerMobil">
                <a href='http://www.terragroup.com/about' target='_blank'><span class="menu">&copy;TERRA GROUP 2013</span></a>
            </li>
            <li>
                <a href='<?php echo URL.LANG.'/page/section/contact';?>'><span class="menu"><?php echo $this->lang['contact'];?></span></a>
            </li>
            <li>
                <a href='<?php echo URL.LANG.'/page/section/press';?>'><span class="menu"><?php echo $this->lang['press'];?></span></a>
            </li>
            <li  style="display:none">
                <div class="fbIco"></div>
            </li>
            <li  style="display:none">
                <div class="twitterIco"></div>
            </li>
            <li>
                <a href='<?php echo URL.LANG.'/page/section/disclaimer';?>'><span class="menu"><?php echo $this->lang['disclaimer'];?></span></a>
            </li>
            <li class="footerMobil">
<!--               <a href='http://www.lemonyellow.com/' target="_blank"><span id="lemon" class="yellow"><?php //echo $this->lang['siteCredits'];?>: LY</span></a>-->
                <div id="lemonCredits" style="position:relative; width: 90px;height: 13px;">
                    <div style="position:absolute;opacity: 0;text-align: right;width: 100%;" id="lemon">LEMON YELLOW</div>
                    <div id="credits" style="position:absolute;text-align: right;width: 100%;"><?php echo $this->lang['siteCredits'];?></div>
                </div>
            </li>
            <li  class="footerScreen">
                <a href='http://www.terragroup.com/about' target='_blank'><span class="menu">&copy;TERRA GROUP 2013</span></a>
            </li>
            <li>
                <img id="terraLogo" alt="Terra Group" src="<?php echo URL;?>/public/images/terraLogo.png" />
            </li>
        </ul>
    </nav>
    </div>
</footer>
</div>
</div>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
    <script src="<?php echo URL;?>public/js/mobile.js"></script>
    <script src="<?php echo URL;?>public/js/cufon-yui.js"></script>
    <script src="<?php echo URL;?>public/js/DIN_500-DIN_400.font.js"></script>
<?php
    if (isset($this->js)) 
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
?>
</body>
</html>