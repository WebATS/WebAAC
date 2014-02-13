<!DOCTYPE html>
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
  <title>{$title} - Painel Administração</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
  <meta name="author" content="Muhammad Usman">

  <!-- The styles -->
  <link id="bs-css" href="{$template_path_admin}css/bootstrap-cerulean.css" rel="stylesheet">
  <style type="text/css">
    body {
    padding-bottom: 40px;
    }
    .sidebar-nav {
    padding: 9px 0;
    }
  </style>

  <link href="{$template_path_admin}css/bootstrap-responsive.css" rel="stylesheet">
  <link href="{$template_path_admin}css/charisma-app.css" rel="stylesheet">
  <link href="{$template_path_admin}css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
  <link href='{$template_path_admin}css/fullcalendar.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/fullcalendar.print.css' rel='stylesheet'  media='print'>
  <link href='{$template_path_admin}css/chosen.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/uniform.default.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/colorbox.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/jquery.cleditor.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/jquery.noty.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/noty_theme_default.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/elfinder.min.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/elfinder.theme.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/jquery.iphone.toggle.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/opa-icons.css' rel='stylesheet'>
  <link href='{$template_path_admin}css/uploadify.css' rel='stylesheet'>

  <!-- external javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  <!-- jQuery -->
  <script src="{$template_path_admin}js/jquery-1.7.2.min.js"></script>
  <!-- jQuery UI -->
  <script src="{$template_path_admin}js/jquery-ui-1.8.21.custom.min.js"></script>
  <!-- transition / effect library -->
  <script src="{$template_path_admin}js/bootstrap-transition.js"></script>
  <!-- alert enhancer library -->
  <script src="{$template_path_admin}js/bootstrap-alert.js"></script>
  <!-- modal / dialog library -->
  <script src="{$template_path_admin}js/bootstrap-modal.js"></script>
  <!-- custom dropdown library -->
  <script src="{$template_path_admin}js/bootstrap-dropdown.js"></script>
  <!-- scrolspy library -->
  <script src="{$template_path_admin}js/bootstrap-scrollspy.js"></script>
  <!-- library for creating tabs -->
  <script src="{$template_path_admin}js/bootstrap-tab.js"></script>
  <!-- library for advanced tooltip -->
  <script src="{$template_path_admin}js/bootstrap-tooltip.js"></script>
  <!-- popover effect library -->
  <script src="{$template_path_admin}js/bootstrap-popover.js"></script>
  <!-- button enhancer library -->
  <script src="{$template_path_admin}js/bootstrap-button.js"></script>
  <!-- accordion library (optional, not used in demo) -->
  <script src="{$template_path_admin}js/bootstrap-collapse.js"></script>
  <!-- carousel slideshow library (optional, not used in demo) -->
  <script src="{$template_path_admin}js/bootstrap-carousel.js"></script>
  <!-- autocomplete library -->
  <script src="{$template_path_admin}js/bootstrap-typeahead.js"></script>
  <!-- tour library -->
  <script src="{$template_path_admin}js/bootstrap-tour.js"></script>
  <!-- library for cookie management -->
  <script src="{$template_path_admin}js/jquery.cookie.js"></script>
  <!-- calander plugin -->
  <script src='{$template_path_admin}js/fullcalendar.min.js'></script>
  <!-- data table plugin -->
  <script src='{$template_path_admin}js/jquery.dataTables.min.js'></script>

  <!-- chart libraries start -->
  <script src="{$template_path_admin}js/excanvas.js"></script>
  <script src="{$template_path_admin}js/jquery.flot.min.js"></script>
  <script src="{$template_path_admin}js/jquery.flot.pie.min.js"></script>
  <script src="{$template_path_admin}js/jquery.flot.stack.js"></script>
  <script src="{$template_path_admin}js/jquery.flot.resize.min.js"></script>
  <!-- chart libraries end -->

  <!-- select or dropdown enhancer -->
  <script src="{$template_path_admin}js/jquery.chosen.min.js"></script>
  <!-- checkbox, radio, and file input styler -->
  <script src="{$template_path_admin}js/jquery.uniform.min.js"></script>
  <!-- plugin for gallery image view -->
  <script src="{$template_path_admin}js/jquery.colorbox.min.js"></script>
  <!-- rich text editor library -->
  <script src="{$template_path_admin}js/jquery.cleditor.min.js"></script>
  <!-- notification plugin -->
  <script src="{$template_path_admin}js/jquery.noty.js"></script>
  <!-- file manager library -->
  <script src="{$template_path_admin}js/jquery.elfinder.min.js"></script>
  <!-- star rating plugin -->
  <script src="{$template_path_admin}js/jquery.raty.min.js"></script>
  <!-- for iOS style toggle switch -->
  <script src="{$template_path_admin}js/jquery.iphone.toggle.js"></script>
  <!-- autogrowing textarea plugin -->
  <script src="{$template_path_admin}js/jquery.autogrow-textarea.js"></script>
  <!-- multiple file upload plugin -->
  <script src="{$template_path_admin}js/jquery.uploadify-3.1.min.js"></script>
  <!-- history.js for cross-browser state change on ajax -->
  <script src="{$template_path_admin}js/jquery.history.js"></script>
  <!-- application script for Charisma demo -->
  <script src="{$template_path_admin}js/charisma.js"></script>  
<script>
  var VARS_AMBIENTE = new Array();
  VARS_AMBIENTE['caminho_template'] = '{$path}{php} echo TPLDIR.config_item('layout_admin'); {/php}';
</script>

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- The fav icon -->
  <link rel="shortcut icon" href="{$template_path_admin}img/favicon.ico">
    
</head>

<body>
  {if !isset($no_visible_elements) || !$no_visible_elements}
  <!-- topbar starts -->
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="{php} echo site_url('admin/index'); {/php}"> 

          <img alt="Charisma Logo" src="{$template_path_admin}img/logo20.png" /> <span>WebATS</span></a>
        
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
            <i class="icon-user"></i><span class="hidden-phone">{php} echo modules::run('account/_needlogin')->realname; {/php}</span>
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
            <li><a href="{php} echo BASE_URL; {/php}">Visit Site</a></li>
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
  {/if}
  <div class="container-fluid">
    <div class="row-fluid">
    {if !isset($no_visible_elements) || !$no_visible_elements }
    
      <!-- left menu starts -->
      <div class="span2 main-menu-span">
        <div class="well nav-collapse sidebar-nav">
          <ul class="nav nav-tabs nav-stacked main-menu">
            {if $menuLeft and $menuCategorias}
          {foreach from=$menuCategorias key=menu_categoria item=menu_array}
            {foreach from=$menu_array key=menu_sub_categoria item=menu_sub_array}
              {if $menu_sub_array['acess'] > '0'}
              <li class="nav-header hidden-tablet">{$menu_sub_array['categoria']}</li>

              {foreach from=$menuLeft key=menu item=menu_array}
                {if $menu == {$menu_sub_categoria}}
                  {foreach from=$menu_array item=menu_subarray}
                    <li>
                      <a class="ajax-link" href="{$menu_subarray['link_href']}">
                        <i class="icon32 icon-color {$menu_subarray['img_icon']}"></i>
                      <span class="hidden-tablet" style="position: absolute; margin-top: 8px; margin-left: 2px;"> {$menu_subarray['link_title']}</span>
                      </a>
                  </li>
                  {/foreach}
                {/if}

              {/foreach}
              {/if}
            {/foreach}
          {/foreach}
        {else}
          <div class="alert alert-error"><span style="font-weight: bold">Erro to load menu, check your configs.</b></span> </br></div>
        {/if}
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
      {/if}
      {$content}
          {if !isset($no_visible_elements) || !$no_visible_elements}
      <!-- content ends -->
      </div><!--/#content.span10-->
    {/if}
    </div><!--/fluid-row-->
    {if !isset($no_visible_elements) || !$no_visible_elements}
    
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
      <p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <?php echo date('Y') ?></p>
      <p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>
    {/if}

  </div><!--/.fluid-container-->

</body>
</html>
