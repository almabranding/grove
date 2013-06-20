<body>
    <div id="wrapper">
        <?php Session::init(); ?>
        <div class="mobileHeader">
            <a href="<?php echo URL; ?>">
                <div class="logo">
                    <div class="mobileLogo"></div> 
                </div>
            </a>
            <nav id="menu">
                <?php echo Menu::getMovil($this->url); ?>
            </nav>
            <div class="clr"></div>
        </div>
        <div id="container">
            <div class="logoBox"></div>

