<?php /* Smarty version Smarty-3.1.13, created on 2014-02-13 11:18:57
         compiled from "templates\avatar\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2630252fcc641a459b0-71251189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74123060687a2445783046a51fccc55edeac3cdb' => 
    array (
      0 => 'templates\\avatar\\template.tpl',
      1 => 1375321754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2630252fcc641a459b0-71251189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'template_path' => 0,
    'logged' => 0,
    'path' => 0,
    'head' => 0,
    'menuLeft' => 0,
    'menuCategorias' => 0,
    'menu_array' => 0,
    'menu_sub_array' => 0,
    'menu' => 0,
    'menu_sub_categoria' => 0,
    'menu_subarray' => 0,
    'content' => 0,
    'servers' => 0,
    'id' => 0,
    'servers_status' => 0,
    'renderTime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52fcc641bdbe19_27378128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fcc641bdbe19_27378128')) {function content_52fcc641bdbe19_27378128($_smarty_tpl) {?>﻿<html>
<head>
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/perso/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/perso/favicon.ico" type="image/x-icon">
  <link href="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/styles/basic.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/styles/news.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/javascripts/generic.js"></script>

  <script type='text/javascript'>  <?php if ($_smarty_tpl->tpl_vars['logged']->value){?> var loginStatus=1; <?php }else{ ?> var loginStatus=0; var loginStatus='false';<?php }?> var activeSubmenuItem='latestnews';  var IMAGES=0; IMAGES='<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images';  var LINK_ACCOUNT=0; LINK_ACCOUNT='<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
';  </script>
  <SCRIPT TYPE="text/javascript">
<!-- // Framekiller
setTimeout ("changePage()", 6000);
function changePage()
{
  if (parent.frames.length > 2) {
    if (browserTyp == "ie") {
      parent.location=document.location;
    } else {
      self.top.location=document.location;
    }
  }
}
// -->
</SCRIPT>

  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/javascripts/initialize.js"></script>
  <?php echo $_smarty_tpl->tpl_vars['head']->value;?>

  <script type="text/javascript">
     var RecaptchaOptions = {
        theme : 'white'
     };
 </script>
  <script>

    (function ($) {

  $(function(){

    // fix sub nav on scroll
    var $win = $(window),
        $nav = $('.navbar'),
        navHeight = $('.navbar').first().height(),
        subnavHeight = $('.navbar').first().height(),
        subnavTop = $('.navbar').length && $('.navbar').offset().top - navHeight,
        isFixed = 0;

    processScroll();

    $win.on('scroll', processScroll);

    function processScroll() {
      var i, scrollTop = $win.scrollTop();

      if (scrollTop >= subnavTop && !isFixed) {
        isFixed = 1;
        $nav.addClass('navbar-fixed-top');
        $nav.css('width', '100%');
        $nav.css('margin-left', '0');
      } else if (scrollTop <= subnavTop && isFixed) {
        isFixed = 0;
        $nav.removeClass('navbar-fixed-top');
        $nav.css('max-width', '98%');
        $nav.css('margin-left', '70px');
      }
    }

  });

})(window.jQuery);
    jQuery(document).ready(function($){
  
  $('.meter > span').each(function() {
    
    var totalWidth = $(this).parent().width();
    
    var barWidth = $(this).width();
    
    var percent = barWidth/totalWidth * 100;

    $(this).data('origWidth', $(this).width()).width(0).animate({
      width: $(this).data('origWidth')
    }, 1200, function(){
      $(this).css('width', percent + '%');
    });

    
  });
});
      // Activate Google Prettify in this page
        addEventListener('load', prettyPrint, false);

      $(document).ready(function(){

        // Add prettyprint class to pre elements
          $('pre').addClass('prettyprint linenums');

      });
      $('#example').tooltip(options)
   
    </script>
  <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-22151549-3']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
$(function () {
    
    // FAQs
    var $faqs = $("#faq .faq");
    $faqs.click(function () {
        var $answer = $(this).find(".answer");
        $answer.slideToggle('fast');
    });

    if (!$.support.leadingWhitespace) {
        //IE7 and 8 stuff
        $("body").addClass("old-ie");
    }
});    </script>
</head>
<body onbeforeunload="SaveMenu();" onunload="SaveMenu();">
  <a name="top" ></a>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo modules::run('shop/_popimg'); echo modules::run('rewards_players/_popimg'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

  <div id="ArtworkHelper" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/header/background-artwork.jpg);">
       <div id="Artlog" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/perso/logo.png);"></div>
    <div id="DeactivationContainer" ></div>
    <div id="Bodycontainer" >
      <div id="ContentRow">
        <div id="MenuColumn">
          <div id="LeftArtwork">
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" >
              <img id="TibiaLogoArtworkTop" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/header/tibia-logo-artwork-top.gif" alt="logoartwork" />
            </a>

          </div>
    
          <?php if ($_smarty_tpl->tpl_vars['logged']->value){?>
          <div id="Loginbox">
            <div id="LoginTop" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-top.gif)"></div>
            <div id="BorderLeft" class="LoginBorder" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif)"></div>

            <div class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginstatusText_12" class="LoginstatusText" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-welcome.gif); "></div>
            </div>

            <div id="LoginButtonContainer" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginButton" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton.gif)">
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
account/login">
                  <div onclick="LoginButtonAction();" onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                    <div class="Button" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton_over.gif); visibility: hidden; "></div>
                    <div id="ButtonText2" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/_sbutton_myaccount.gif); "></div>
                  </div>
                </a>
              </div>
            </div>

            <div style="clear:both"></div>

            <div class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginstatusText_2" onclick="LoginstatusTextAction(this);" onmouseover="MouseOverLoginBoxText(this);" onmouseout="MouseOutLoginBoxText(this);" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-logout.gif); ">
                <div id="LoginstatusText_2_1" class="LoginstatusText" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-logout.gif); visibility: visible; "></div>
                <div id="LoginstatusText_2_2" class="LoginstatusText" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-logout-over.gif); visibility: hidden; "></div>
              </div>
            </div>

            <div id="BorderRight" class="LoginBorder" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif)"></div>
            <div id="LoginBottom" class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif)"></div>
          </div>
          <?php }else{ ?>
          <div id="Loginbox" >
            <div id="LoginTop" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-top.gif)" ></div>
            <div id="BorderLeft" class="LoginBorder" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif)" ></div>
            <div class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginstatusText_1" class="LoginstatusText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-you-are-not-logged-in.gif)" ></div>
            </div>
            <div id="LoginButtonContainer" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginButton" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton.gif)" >
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
account/login" >
                  <div onClick="LoginButtonAction();" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);">
                    <div class="Button" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton_over.gif)" ></div>
                    <div id="ButtonText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/_sbutton_login.gif)" ></div>
                  </div>
                </a>
              </div>
            </div>
            <div style="clear:both" ></div>
            <div class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginstatusText_2" onClick="LoginstatusTextAction(this);" onMouseOver="MouseOverLoginBoxText(this);" onMouseOut="MouseOutLoginBoxText(this);" >
                <div id="LoginstatusText_2_1" class="LoginstatusText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-create-account.gif)" ></div>
                <div id="LoginstatusText_2_2" class="LoginstatusText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/loginbox/loginbox-font-create-account-over.gif)" ></div>
              </div>
            </div>
            <div id="BorderRight" class="LoginBorder" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif)" ></div>
            <div id="LoginBottom" class="Loginstatus" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif)" ></div>
          </div>
          <?php }?>
          <div id='Menu'>
            <div id='MenuTop' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-top.gif);'></div>

            
            <!-- INICIO da formação do menu -->
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
            <?php if ($_smarty_tpl->tpl_vars['menu_sub_array']->value['acess']=='0'){?>
              <!--<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
-->
              <div id='<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
' class='menuitem'>
              <span onClick="MenuItemActions('<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
')">
                <div class='MenuButton' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/button-background.gif);'>
                  <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'>
                    <div class='Button' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/button-background-over.gif);'></div>
                    <span id='<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
_Lights' class='Lights'>
                      <div class='light_lu' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/green-light.gif);'></div>
                      <div class='light_ld' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/green-light.gif);'></div>
                      <div class='light_ru' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/green-light.gif);'></div>
                    </span>                   
                    <div id='account_Icon' class='Icon' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['img_icon'];?>
);'></div>
                    <div id='<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
_Label' class='Label_global' style='background-image:url(
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 text_global('<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
); width: 110px; top: 2px;'>
                    </div>
                    
                  </div>
                </div>
              </span>

              <div id='<?php echo $_smarty_tpl->tpl_vars['menu_sub_array']->value['categoria'];?>
_Submenu' class='Submenu'>
                <!-- LINK -->
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
                                <a href='<?php echo $_smarty_tpl->tpl_vars['menu_subarray']->value['link_href'];?>
'>
                                  <div id='submenu_accountmanagement' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
                                     <!-- CORRENT ESQUERDA -->
                                    <div class='LeftChain' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif);'></div>
                                     <!-- END CORRENT ESQUERDA -->
                                    <div id='ActiveSubmenuItemIcon_accountmanagement' class='ActiveSubmenuItemIcon' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/menu/icon-activesubmenu.gif);'></div>
                                    <div id='ActiveSubmenuItemLabel_accountmanagement' class='SubmenuitemLabel'><?php echo $_smarty_tpl->tpl_vars['menu_subarray']->value['link_title'];?>
</div>
                                    <!-- CORRENT DIREITA -->
                                    <div class='RightChain' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/chain.gif);'></div>
                                    <!-- END CORRENT DIREITA -->
                                  </div>
                                </a>
                             <?php } ?>
                        <?php }?>
                      <?php } ?>

                <!-- END LINK -->
              </div>

            </div>
            <?php }?>
            <?php } ?>
          <?php } ?>
        <?php }else{ ?>
          <div class="alert alert-error"><span style="font-weight: bold">Erro to load menu, check your configs.</b></span> </br></div>
        <?php }?>
      <!-- FIM da formação do menu -->
            <div id='MenuBottom' style='background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif);'></div>
          </div>
          <script type='text/javascript'>InitializePage();</script>
        </div>
        <div id="ContentColumn">
          <div id="Content" class="Content">
            <div id="ContentHelper">
              <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/javascripts/newsticker.js"></script>

              <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                //echo modules::run('news/newsticker/_index');
                //echo modules::run('news/featuredarticle/_index');
              <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


              <div id="news" class="Box">
                <div class="Corner-tl" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/corner-tl.gif);"></div>
                <div class="Corner-tr" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/corner-tr.gif);"></div>
                <div class="Border_1" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/border-1.gif);"></div>
                <div class="BorderTitleText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/title-background-green.gif);"></div>
                <!--<img id="ContentBoxHeadline" class="Title" src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 $CI = &get_instance(); if(defined('TITLE_PAGE')) { $title = TITLE_PAGE; } else { $title = $CI->uri->segment('1'); }  text_global(ucfirst($title)); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" alt="Contentbox headline" />-->
                <div class="Border_2">
                  <div class="Border_3">
                    <div class="BoxContent" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/scroll.gif);">          <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    </div>
                  </div>
                </div>
                <div class="Border_1" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/border-1.gif);"></div>
                <div class="CornerWrapper-b">
                  <div class="Corner-bl" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/corner-bl.gif);"></div>
                </div>
                <div class="CornerWrapper-b">
                  <div class="Corner-br" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/content/corner-br.gif);"></div>
                </div>
              </div>

              <div id="ThemeboxesColumn" >
                <div id="DeactivationContainerThemebox" ></div>
                <div id="RightArtwork">
                  <img id="Monster" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/header/monsters/hero.gif" onClick="window.location = '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
';" alt="Monster of the Week" />
                  <img id="PedestalAndOnline" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box" style="margin-left: -25px;"/>
                  <div id="PlayersOnline" onClick="window.location = '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
players/online';">

                  <?php  $_smarty_tpl->tpl_vars['world'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['world']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['world']->key => $_smarty_tpl->tpl_vars['world']->value){
$_smarty_tpl->tpl_vars['world']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['world']->key;
?>
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['servers_status']->value['status'][$_tmp2]['serverStatus_online'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3){?>

                      <b /><font color="#00FF00"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['servers_status']->value['status'][$_tmp4]['serverStatus_players'];?>
</font>/<font color="#e71515"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['servers_status']->value['status'][$_tmp5]['serverStatus_playersMax'];?>
</font><br />
                 
                    <?php }else{ ?>
                      <span style="color: red;font-weight: bold;">Server Offline</span>
                    <?php }?>
                  <?php } ?>
                  </div>
                </div>
                <div id="Themeboxes">
                  <div id="NewcomerBox" class="Themebox" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/themeboxes/newcomer/newcomerbox.gif);">
                    <a class="ThemeboxButton" href="" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/_sbutton_jointibia.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif);"></div>
                  </div>
                  <div id="PremiumBox" class="Themebox" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/themeboxes/premium/premiumbox.gif);">
                    <a class="ThemeboxButton" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/_sbutton_getpremium.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif);"></div>
                  </div>

                  <div class="Themebox" >
                    <a target="blank" href="http://webats.xtibia.com">
                      <img style="position: absolute; z-index: 99999; margin-left: 20px; margin-top: 7px;"src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo text_global('WebATS Manager'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                      <img id="ScreenshotContent" class="ThemeboxContent" src="<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/webats/webats.png" alt="Screenshot of the Day"></a>
                      
                    <div class="Bottom" style="background-image:url(<<?php ?>?php echo base_url().TPLLAYOUTDIR; ?<?php ?>>images/global/general/box-bottom.gif);"></div>
                  </div>

                 <!-- <div id="CurrentPollBox" class="Themebox" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/themeboxes/current-poll/currentpollbox.gif);">
                    <div id="CurrentPollText">Most powerful vocation?</div>
                    <a class="ThemeboxButton" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/buttons/_sbutton_votenow.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['template_path']->value;?>
/images/global/general/box-bottom.gif);"></div>
                  </div>
-->
                </div>
              </div>
            </div>
          </div>
          <div id="Footer">
            Hospedado Por: <p>
            <a href="http://goo.gl/hpO9e">
              <img src="http://www.serversoft.com.br/painel/templates/serversoft3/img/logo_SS.png">
              </a>
            <p>
            Copyright by CipSoft GmbH. All Rights reserved.
            <br>WebATS Manager 1.0 <br>
            Página Gerada em <strong><?php echo $_smarty_tpl->tpl_vars['renderTime']->value;?>
</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" >     // disable all control elements which are not part of the content container element     if (g_Deactivated == true) {       document.getElementById('DeactivationContainer').style.display = "block";       document.getElementById('DeactivationContainer').style.zIndex = "50";       document.getElementById('DeactivationContainerThemebox').style.display = "block";       document.getElementById('Monster').style.cursor = "auto";       document.getElementById('PlayersOnline').style.cursor = "auto";       document.getElementById('ThemeboxesColumn').style.opacity = "0.30";       document.getElementById('ThemeboxesColumn').style.MozOpacity = "0.30";       document.getElementById('ThemeboxesColumn').filters.alpha.opacity = "0.75";       document.getElementById('ThemeboxesColumn').style.filter = "alpha(opacity=50); opacity: 0.30";       document.getElementById('Monster').setAttribute("onclick", "")       document.getElementById('PlayersOnline').setAttribute("onclick", "")     }   </script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1287546-1");
pageTracker._setDomainName("tibia.com");
pageTracker._initData();
pageTracker._trackPageview("/news/latestnews");
</script>
</body>
</html><?php }} ?>