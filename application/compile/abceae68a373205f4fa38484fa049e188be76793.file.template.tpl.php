<?php /* Smarty version Smarty-3.1.13, created on 2014-02-13 11:43:31
         compiled from "templates\admin3\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:466552fccc033f19f9-72756862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abceae68a373205f4fa38484fa049e188be76793' => 
    array (
      0 => 'templates\\admin3\\template.tpl',
      1 => 1366347010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '466552fccc033f19f9-72756862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'template_path_admin' => 0,
    'path' => 0,
    'no_visible_elements' => 0,
    'menuLeft' => 0,
    'menuCategorias' => 0,
    'menu_array' => 0,
    'menu_sub_array' => 0,
    'menu' => 0,
    'menu_sub_categoria' => 0,
    'menu_subarray' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52fccc03531f48_51185994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fccc03531f48_51185994')) {function content_52fccc03531f48_51185994($_smarty_tpl) {?>﻿<!DOCTYPE html>
<html lang="en">
<head>
  <!--
    Charisma v1.0.0

    Copyright 2012 Muhammad Usman
    Licensed under the Apache License v2.0
    http://www.apache.org/licenses/LICENSE-2.0

    http://usman.it
    http://twitter.com/halalit_usman
  -->
  <meta charset="utf-8">
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - Painel Administração</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
  <meta name="author" content="Muhammad Usman">

  <!-- The styles -->
  <link id="bs-css" href="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/bootstrap-cerulean.css" rel="stylesheet">
  <style type="text/css">
    body {
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
  </style>

  <link href="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/charisma-app.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/fullcalendar.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/fullcalendar.print.css' rel='stylesheet'  media='print'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/chosen.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/uniform.default.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/colorbox.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/jquery.cleditor.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/jquery.noty.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/noty_theme_default.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/elfinder.min.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/elfinder.theme.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/jquery.iphone.toggle.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/opa-icons.css' rel='stylesheet'>
  <link href='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
css/uploadify.css' rel='stylesheet'>

  <!-- external javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  <!-- jQuery -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery-1.7.2.min.js"></script>
  <!-- jQuery UI -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery-ui-1.8.21.custom.min.js"></script>
  <!-- transition / effect library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-transition.js"></script>
  <!-- alert enhancer library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-alert.js"></script>
  <!-- modal / dialog library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-modal.js"></script>
  <!-- custom dropdown library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-dropdown.js"></script>
  <!-- scrolspy library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-scrollspy.js"></script>
  <!-- library for creating tabs -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-tab.js"></script>
  <!-- library for advanced tooltip -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-tooltip.js"></script>
  <!-- popover effect library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-popover.js"></script>
  <!-- button enhancer library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-button.js"></script>
  <!-- accordion library (optional, not used in demo) -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-collapse.js"></script>
  <!-- carousel slideshow library (optional, not used in demo) -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-carousel.js"></script>
  <!-- autocomplete library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-typeahead.js"></script>
  <!-- tour library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/bootstrap-tour.js"></script>
  <!-- library for cookie management -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.cookie.js"></script>
  <!-- calander plugin -->
  <script src='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/fullcalendar.min.js'></script>
  <!-- data table plugin -->
  <script src='<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.dataTables.min.js'></script>

  <!-- chart libraries start -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/excanvas.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.flot.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.flot.pie.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.flot.stack.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.flot.resize.min.js"></script>
  <!-- chart libraries end -->

  <!-- select or dropdown enhancer -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.chosen.min.js"></script>
  <!-- checkbox, radio, and file input styler -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.uniform.min.js"></script>
  <!-- plugin for gallery image view -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.colorbox.min.js"></script>
  <!-- rich text editor library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.cleditor.min.js"></script>
  <!-- notification plugin -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.noty.js"></script>
  <!-- file manager library -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.elfinder.min.js"></script>
  <!-- star rating plugin -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.raty.min.js"></script>
  <!-- for iOS style toggle switch -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.iphone.toggle.js"></script>
  <!-- autogrowing textarea plugin -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.autogrow-textarea.js"></script>
  <!-- multiple file upload plugin -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.uploadify-3.1.min.js"></script>
  <!-- history.js for cross-browser state change on ajax -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/jquery.history.js"></script>
  <!-- application script for Charisma demo -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
js/charisma.js"></script>  
<script>
  var VARS_AMBIENTE = new Array();
  VARS_AMBIENTE['caminho_template'] = '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo TPLDIR.config_item('layout_admin'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';
</script>

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- The fav icon -->
  <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
img/favicon.ico">
    
</head>

<body>
  <?php if (!isset($_smarty_tpl->tpl_vars['no_visible_elements']->value)||!$_smarty_tpl->tpl_vars['no_visible_elements']->value){?>
  <!-- topbar starts -->
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo site_url('admin/index'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"> 

          <img alt="Charisma Logo" src="<?php echo $_smarty_tpl->tpl_vars['template_path_admin']->value;?>
img/logo20.png" /> <span>WebATS</span></a>
        
        <!-- theme selector starts -->
        <div class="btn-group pull-right theme-container" >
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" id="themes">
            <li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
            <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
            <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
            <li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
            <li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
            <li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
            <li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
            <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
            <li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
          </ul>
        </div>
        <!-- theme selector ends -->
        
        <!-- user dropdown starts -->
        <div class="btn-group pull-right" >
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i><span class="hidden-phone"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo modules::run('account/_needlogin')->realname; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li class="divider"></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div>
        <!-- user dropdown ends -->
        
        <div class="top-nav nav-collapse">
          <ul class="nav">
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo BASE_URL; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">Visit Site</a></li>
            <li>
              <form class="navbar-search pull-left">                
                <input type="text" class="search-query span2 typeahead" id="typeahead" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;, &quot;b&quot;]">
              </form>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <!-- topbar ends -->
  <?php }?>
  <div class="container-fluid">
    <div class="row-fluid">
    <?php if (!isset($_smarty_tpl->tpl_vars['no_visible_elements']->value)||!$_smarty_tpl->tpl_vars['no_visible_elements']->value){?>
    
      <!-- left menu starts -->
      <div class="span2 main-menu-span">
        <div class="well nav-collapse sidebar-nav">
          <ul class="nav nav-tabs nav-stacked main-menu">
            <?php if ($_smarty_tpl->tpl_vars['menuLeft']->value&&$_smarty_tpl->tpl_vars['menuCategorias']->value){?>
          <?php  $_smarty_tpl->tpl_vars['menu_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_array']->_loop = false;
 $_smarty_tpl->tpl_vars['menu_categoria'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menuCategorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_array']->key => $_smarty_tpl->tpl_vars['menu_array']->value){
$_smarty_tpl->tpl_vars['menu_array']->_loop = true;
 $_smarty_tpl->tpl_vars['menu_categoria']->value = $_smarty_tpl->tpl_vars['menu_array']->key;
?>
            <?php  $_smarty_tpl->tpl_vars['menu_sub_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_sub_array']->_loop = false;
 $_smarty_tpl->tpl_vars['menu_sub_categoria'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_sub_array']->key => $_smarty_tpl->tpl_vars['menu_sub_array']->value){
$_smarty_tpl->tpl_vars['menu_sub_array']->_loop = true;
 $_smarty_tpl->tpl_vars['menu_sub_categoria']->value = $_smarty_tpl->tpl_vars['menu_sub_array']->key;
?>
              <?php if ($_smarty_tpl->tpl_vars['menu_sub_array']->value['acess']>'0'){?>
              <li class="nav-header hidden-tablet"><?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
</li>

              <?php  $_smarty_tpl->tpl_vars['menu_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_array']->_loop = false;
 $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menuLeft']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_array']->key => $_smarty_tpl->tpl_vars['menu_array']->value){
$_smarty_tpl->tpl_vars['menu_array']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->value = $_smarty_tpl->tpl_vars['menu_array']->key;
?>
                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['menu_sub_categoria']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['menu']->value==$_tmp1){?>
                  <?php  $_smarty_tpl->tpl_vars['menu_subarray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_subarray']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_subarray']->key => $_smarty_tpl->tpl_vars['menu_subarray']->value){
$_smarty_tpl->tpl_vars['menu_subarray']->_loop = true;
?>
                    <li>
                      <a class="ajax-link" href="<?php echo $_smarty_tpl->tpl_vars['menu_subarray']->value['link_href'];?>
">
                        <i class="icon32 icon-color <?php echo $_smarty_tpl->tpl_vars['menu_subarray']->value['img_icon'];?>
"></i>
                      <span class="hidden-tablet" style="position: absolute; margin-top: 8px; margin-left: 2px;"> <?php echo $_smarty_tpl->tpl_vars['menu_subarray']->value['link_title'];?>
</span>
                      </a>
                  </li>
                  <?php } ?>
                <?php }?>

              <?php } ?>
              <?php }?>
            <?php } ?>
          <?php } ?>
        <?php }else{ ?>
          <div class="alert alert-error"><span style="font-weight: bold">Erro to load menu, check your configs.</b></span> </br></div>
        <?php }?>
          </ul>
          <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
        </div><!--/.well -->
      </div><!--/span-->
      <!-- left menu ends -->
      
      <noscript>
        <div class="alert alert-block span10">
          <h4 class="alert-heading">Warning!</h4>
          <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
      </noscript>
      
      <div id="content" class="span10">
      <!-- content starts -->
      <?php }?>
      <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

          <?php if (!isset($_smarty_tpl->tpl_vars['no_visible_elements']->value)||!$_smarty_tpl->tpl_vars['no_visible_elements']->value){?>
      <!-- content ends -->
      </div><!--/#content.span10-->
    <?php }?>
    </div><!--/fluid-row-->
    <?php if (!isset($_smarty_tpl->tpl_vars['no_visible_elements']->value)||!$_smarty_tpl->tpl_vars['no_visible_elements']->value){?>
    
    <hr>

    <div class="modal hide fade" id="myModal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
      </div>
      <div class="modal-body">
        <p>Here settings can be configured...</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div>

    <footer>
      <p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <<?php ?>?php echo date('Y') ?<?php ?>></p>
      <p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>
    <?php }?>

  </div><!--/.fluid-container-->

</body>
</html>
<?php }} ?>