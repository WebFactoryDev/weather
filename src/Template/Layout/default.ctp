<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'SX Clima';
?>
<!DOCTYPE html>
<html>
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    <?= $this->Html->charset() ?>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- <?= $this->Html->meta('icon') ?> --> 

    <?= $this->Html->css([
        'assets/helpers/animate.css',
        'assets/helpers/boilerplate.css',
        'assets/helpers/grid.css',
        'assets/helpers/utils.css',
        'assets/helpers/colors.css',
        'assets/helpers/backgrounds.css',
        'assets/helpers/border-radius.css',
        'assets/helpers/page-transitions.css',
        'assets/helpers/spacing.css',
        'assets/helpers/typography.css',
        'assets/elements/buttons.css',
        'assets/elements/content-box.css',
        'assets/elements/forms.css',
        'assets/elements/badges.css',
        'assets/elements/images.css',
        'assets/elements/info-box.css',
        'assets/elements/invoice.css',
        'assets/elements/loading-indicators.css',
        'assets/elements/menus.css',
        'assets/elements/panel-box.css',
        'assets/elements/response-messages.css',
        'assets/elements/responsive-tables.css',
        'assets/elements/ribbon.css',
        'assets/elements/social-box.css',
        'assets/elements/tables.css',
        'assets/elements/tile-box.css',
        'assets/elements/timeline.css',
        'assets/icons/fontawesome/fontawesome.css',
        'assets/icons/linecons/linecons.css',
        'assets/icons/spinnericon/spinnericon.css',
        'assets/widgets/datatable/datatable.css',
        'assets/widgets/dropdown/dropdown.css',
        'assets/widgets/dropzone/dropzone.css',
        'assets/widgets/tooltip/tooltip.css',
        'assets/snippets/login-box.css',
        'assets/snippets/notification-box.css',
        'assets/snippets/todo.css',
        'assets/snippets/user-profile.css',
        'assets/snippets/mobile-navigation.css',
        'assets/themes/admin/layout.css',
        'assets/themes/admin/color-schemes/default.css',
        'assets/themes/components/default.css',
        'assets/themes/components/border-radius.css',
        'assets/helpers/responsive-elements.css',
        'assets/helpers/admin-responsive.css',
        // 'bootstrap/bootstrap.min'
        ]) ?>
   

    <?= $this->Html->script([
        'jquery-3.1.1.min',
        'js-core/jquery-core.js',
        'js-core/jquery-ui-core.js',
        'js-core/jquery-ui-widget.js',
        'js-core/jquery-ui-mouse.js',
        'js-core/jquery-ui-position.js',
        'js-core/modernizr.js',
        'js-core/jquery-cookie.js',
        'widgets/wow/wow.js',
        'bootbox.min'


        ]) ?>    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>
</head>
<body>
    
    <?php 

        if ($this->request->session()->read('Auth.User')){
            echo $this->element('menu');
        }
            
        
     ?>
    <?= $this->Flash->render() ?>
    <!-- <div class="container clearfix"> -->
        <?= $this->fetch('content') ?>
    <!-- </div> -->
    <footer>
    </footer>

     <?= $this->Html->script([
        'bootstrap/js/bootstrap.js',
        'widgets/superclick/superclick.js',
        'widgets/input-switch/inputswitch-alt.js',
        'slimscroll/slimscroll.js',
        'slidebars/slidebars.js',
        'slidebars/slidebars-demo.js',
        'content-box/contentbox.js',
        'overlay/overlay.js',
        'js-init/widgets-init.js',
        'themes/admin/layout.js'
        ]) ?> 
</body>
</html>
