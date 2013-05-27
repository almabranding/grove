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
                <span class="menu">Building</span>
            </li>
            <li>
                <span class="menu">Neighborhood</span>
            </li>
        </ul>
    </nav>
    <nav class="barRight">
        <ul>
            <li is="langChage">
                <span class="menu">English</span><div class="langArrow"></div>
            </li>
            <li>
                <a href='<?php echo URL.LANG.'/page/section/contact';?>'><span class="menu">Contact</span></a>
            </li>
            <li>
                <span class="menu">Connect</span>
            </li>
            <li>
                <a href='<?php echo URL.LANG.'/page/section/disclaimer';?>'><span class="menu">Disclaimer</span></a>
            </li>
            
            <li>
               <a href='http://www.lemonyellow.com/' target="_blank" onmouseover="changeFoot('LEMON YELLOW');" onmouseout="changeFoot('SITE CREDITS');"><span id="lemon" class="menu">SITE CREDITS</span></a>
            </li>
            <li>
                <a href='http://www.terragroup.com/about' target='_blank'><span class="menu">&copy;TERRA GROUP 2013</span></a>
            </li>
            <li>
                <img alt="Terra Group" src="<?php echo URL;?>/public/images/terraLogo.png" />
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
    <script src="<?php echo URL;?>public/js/custom.js"></script>
    <script src="<?php echo URL;?>public/js/cufon-yui.js"></script>
    <script src="<?php echo URL;?>public/js/DIN_500-DIN_400.font.js"></script>
<?php
    if (isset($this->js)) 
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
?>
</body>
</html>