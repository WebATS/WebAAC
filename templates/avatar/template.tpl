<html>
<head>
  <title>{$title}</title>
  <link rel="shortcut icon" href="{$template_path}/images/perso/favicon.ico" type="image/x-icon">
  <link rel="icon" href="{$template_path}/images/perso/favicon.ico" type="image/x-icon">
  <link href="{$template_path}/styles/basic.css" rel="stylesheet" type="text/css">
  <link href="{$template_path}/styles/news.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="{$template_path}/css/bootstrap.css" rel="stylesheet" />
  <link type="text/css" href="{$template_path}/css/bootstrap-responsive.css" rel="stylesheet" />


  <script type='text/javascript'>  {if $logged} var loginStatus=1; {else} var loginStatus=0; var loginStatus='false';{/if} var activeSubmenuItem='latestnews';  var IMAGES=0; IMAGES='{$template_path}/images';  var LINK_ACCOUNT=0; LINK_ACCOUNT='{$path}';  </script>
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

  <script type="text/javascript" src="{$template_path}/javascripts/initialize.js"></script>
  <script type="text/javascript" src="{$template_path}/js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="{$template_path}/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{$template_path}/js/jquery.validate.js"></script>
  <script type="text/javascript" src="{$template_path}/js/script.js"></script>
  <script type="text/javascript" src="{$template_path}/javascripts/generic.js"></script>

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
  <div id="ArtworkHelper" style="background-image:url({$template_path}/images/global/header/background-artwork.jpg);">
       <div id="Artlog" style="background-image:url({$template_path}/images/perso/logo.png);"></div>
    <div id="DeactivationContainer" ></div>
    <div id="Bodycontainer" >
      <div id="ContentRow">
        <div id="MenuColumn">
          <div id="LeftArtwork">
            <a href="{$path}" >
              <img id="TibiaLogoArtworkTop" src="{$template_path}/images/global/header/tibia-logo-artwork-top.gif" alt="logoartwork" />
            </a>

          </div>
    
          {if $logged}
          <div id="Loginbox">
            <div id="LoginTop" style="background-image:url({$template_path}/images/global/general/box-top.gif)"></div>
            <div id="BorderLeft" class="LoginBorder" style="background-image:url({$template_path}/images/global/general/chain.gif)"></div>

            <div class="Loginstatus" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginstatusText_12" class="LoginstatusText" style="background-image: url({$template_path}/images/global/loginbox/loginbox-font-welcome.gif); "></div>
            </div>

            <div id="LoginButtonContainer" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginButton" style="background-image:url({$template_path}/images/global/buttons/sbutton.gif)">
                <a href="{$path}account/login">
                  <div onclick="LoginButtonAction();" onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                    <div class="Button" style="background-image: url({$template_path}/images/global/buttons/sbutton_over.gif); visibility: hidden; "></div>
                    <div id="ButtonText2" style="background-image: url({$template_path}/images/global/buttons/_sbutton_myaccount.gif); "></div>
                  </div>
                </a>
              </div>
            </div>

            <div style="clear:both"></div>

            <div class="Loginstatus" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)">
              <div id="LoginstatusText_2" onclick="LoginstatusTextAction(this);" onmouseover="MouseOverLoginBoxText(this);" onmouseout="MouseOutLoginBoxText(this);" style="background-image: url({$template_path}/images/global/loginbox/loginbox-font-logout.gif); ">
                <div id="LoginstatusText_2_1" class="LoginstatusText" style="background-image: url({$template_path}/images/global/loginbox/loginbox-font-logout.gif); visibility: visible; "></div>
                <div id="LoginstatusText_2_2" class="LoginstatusText" style="background-image: url({$template_path}/images/global/loginbox/loginbox-font-logout-over.gif); visibility: hidden; "></div>
              </div>
            </div>

            <div id="BorderRight" class="LoginBorder" style="background-image:url({$template_path}/images/global/general/chain.gif)"></div>
            <div id="LoginBottom" class="Loginstatus" style="background-image:url({$template_path}/images/global/general/box-bottom.gif)"></div>
          </div>
          {else}
          <div id="Loginbox" >
            <div id="LoginTop" style="background-image:url({$template_path}/images/global/general/box-top.gif)" ></div>
            <div id="BorderLeft" class="LoginBorder" style="background-image:url({$template_path}/images/global/general/chain.gif)" ></div>
            <div class="Loginstatus" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginstatusText_1" class="LoginstatusText" style="background-image:url({$template_path}/images/global/loginbox/loginbox-font-you-are-not-logged-in.gif)" ></div>
            </div>
            <div id="LoginButtonContainer" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginButton" style="background-image:url({$template_path}/images/global/buttons/sbutton.gif)" >
                <a href="{$path}account/login" >
                  <div onClick="LoginButtonAction();" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);">
                    <div class="Button" style="background-image:url({$template_path}/images/global/buttons/sbutton_over.gif)" ></div>
                    <div id="ButtonText" style="background-image:url({$template_path}/images/global/buttons/_sbutton_login.gif)" ></div>
                  </div>
                </a>
              </div>
            </div>
            <div style="clear:both" ></div>
            <div class="Loginstatus" style="background-image:url({$template_path}/images/global/loginbox/loginbox-textfield-background.gif)" >
              <div id="LoginstatusText_2" onClick="LoginstatusTextAction(this);" onMouseOver="MouseOverLoginBoxText(this);" onMouseOut="MouseOutLoginBoxText(this);" >
                <div id="LoginstatusText_2_1" class="LoginstatusText" style="background-image:url({$template_path}/images/global/loginbox/loginbox-font-create-account.gif)" ></div>
                <div id="LoginstatusText_2_2" class="LoginstatusText" style="background-image:url({$template_path}/images/global/loginbox/loginbox-font-create-account-over.gif)" ></div>
              </div>
            </div>
            <div id="BorderRight" class="LoginBorder" style="background-image:url({$template_path}/images/global/general/chain.gif)" ></div>
            <div id="LoginBottom" class="Loginstatus" style="background-image:url({$template_path}/images/global/general/box-bottom.gif)" ></div>
          </div>
          {/if}
          <div id='Menu'>
            <div id='MenuTop' style='background-image:url({$template_path}/images/global/general/box-top.gif);'></div>

            
            <!-- INICIO da formação do menu -->
        {if $menuLeft and $menuCategorias}
          {foreach from=$menuCategorias key=menu_categoria item=menu_array}
            {foreach from=$menu_array key=menu_sub_categoria item=menu_sub_array}
            {if $menu_sub_array['acess'] == '0'}
              <!--{$menu_sub_array['categoria']}-->
              <div id='{$menu_sub_array['categoria']}' class='menuitem'>
              <span onClick="MenuItemActions('{$menu_sub_array['categoria']}')">
                <div class='MenuButton' style='background-image:url({$template_path}/images/global/menu/button-background.gif);'>
                  <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'>
                    <div class='Button' style='background-image:url({$template_path}/images/global/menu/button-background-over.gif);'></div>
                    <span id='{$menu_sub_array['categoria']}_Lights' class='Lights'>
                      <div class='light_lu' style='background-image:url({$template_path}/images/global/menu/green-light.gif);'></div>
                      <div class='light_ld' style='background-image:url({$template_path}/images/global/menu/green-light.gif);'></div>
                      <div class='light_ru' style='background-image:url({$template_path}/images/global/menu/green-light.gif);'></div>
                    </span>                   
                    <div id='account_Icon' class='Icon' style='background-image:url({$template_path}/images/global/menu/{$menu_sub_array['img_icon']});'></div>
                    <div id='{$menu_sub_array['categoria']}_Label' class='Label_global' style='background-image:url(
                    {php} text_global('{$menu_sub_array['categoria']}'); {/php}); width: 110px; top: 2px;'>
                    </div>
                    
                  </div>
                </div>
              </span>

              <div id='{$menu_sub_array['categoria']}_Submenu' class='Submenu'>
                <!-- LINK -->
                  {foreach from=$menuLeft key=menu item=menu_array}
                        {if $menu == {$menu_sub_categoria}}
                             {foreach from=$menu_array item=menu_subarray}
                                <a href='{$menu_subarray['link_href']}'>
                                  <div id='submenu_accountmanagement' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
                                     <!-- CORRENT ESQUERDA -->
                                    <div class='LeftChain' style='background-image:url({$template_path}/images/global/general/chain.gif);'></div>
                                     <!-- END CORRENT ESQUERDA -->
                                    <div id='ActiveSubmenuItemIcon_accountmanagement' class='ActiveSubmenuItemIcon' style='background-image:url({$template_path}/images/global/menu/icon-activesubmenu.gif);'></div>
                                    <div id='ActiveSubmenuItemLabel_accountmanagement' class='SubmenuitemLabel'>{$menu_subarray['link_title']}</div>
                                    <!-- CORRENT DIREITA -->
                                    <div class='RightChain' style='background-image:url({$template_path}/images/global/general/chain.gif);'></div>
                                    <!-- END CORRENT DIREITA -->
                                  </div>
                                </a>
                             {/foreach}
                        {/if}
                      {/foreach}

                <!-- END LINK -->
              </div>

            </div>
            {/if}
            {/foreach}
          {/foreach}
        {else}
          <div class="alert alert-error"><span style="font-weight: bold">Erro to load menu, check your configs.</b></span> </br></div>
        {/if}
      <!-- FIM da formação do menu -->
            <div id='MenuBottom' style='background-image:url({$template_path}/images/global/general/box-bottom.gif);'></div>
          </div>
          <script type='text/javascript'>InitializePage();</script>
        </div>
        <div id="ContentColumn">
          <div id="Content" class="Content">
            <div id="ContentHelper">
              <script type="text/javascript" src="{$template_path}/javascripts/newsticker.js"></script>

              {php}
                //echo modules::run('news/newsticker/_index');
                //echo modules::run('news/featuredarticle/_index');
              {/php}

              <div id="news" class="Box">
                <div class="Corner-tl" style="background-image:url({$template_path}/images/global/content/corner-tl.gif);"></div>
                <div class="Corner-tr" style="background-image:url({$template_path}/images/global/content/corner-tr.gif);"></div>
                <div class="Border_1" style="background-image:url({$template_path}/images/global/content/border-1.gif);"></div>
                <div class="BorderTitleText" style="background-image:url({$template_path}/images/global/content/title-background-green.gif);"></div>
                <!--<img id="ContentBoxHeadline" class="Title" src="{php} $CI = &get_instance(); if(defined('TITLE_PAGE')) { $title = TITLE_PAGE; } else { $title = $CI->uri->segment('1'); }  text_global(ucfirst($title)); {/php}" alt="Contentbox headline" />-->
                <div class="Border_2">
                  <div class="Border_3">
                    <div class="BoxContent" style="background-image:url({$template_path}/images/global/content/scroll.gif);">          {$content}
                    </div>
                  </div>
                </div>
                <div class="Border_1" style="background-image:url({$template_path}/images/global/content/border-1.gif);"></div>
                <div class="CornerWrapper-b">
                  <div class="Corner-bl" style="background-image:url({$template_path}/images/global/content/corner-bl.gif);"></div>
                </div>
                <div class="CornerWrapper-b">
                  <div class="Corner-br" style="background-image:url({$template_path}/images/global/content/corner-br.gif);"></div>
                </div>
              </div>

              <div id="ThemeboxesColumn" >
                <div id="DeactivationContainerThemebox" ></div>
                <div id="RightArtwork">
                  <img id="Monster" src="{$template_path}/images/global/header/monsters/hero.gif" onClick="window.location = '{$path}';" alt="Monster of the Week" />
                  <img id="PedestalAndOnline" src="{$template_path}/images/global/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box" style="margin-left: -25px;"/>
                  <div id="PlayersOnline" onClick="window.location = '{$path}players/online';">

                  {foreach from=$servers key=id item=world}
                    {if {$servers_status['status'][{$id}]['serverStatus_online']}}

                      <b /><font color="#00FF00">{$servers_status['status'][{$id}]['serverStatus_players']}</font>/<font color="#e71515">{$servers_status['status'][{$id}]['serverStatus_playersMax']}</font><br />
                 
                    {else}
                      <span style="color: red;font-weight: bold;">Server Offline</span>
                    {/if}
                  {/foreach}
                  </div>
                </div>
                <div id="Themeboxes">
                  <div id="NewcomerBox" class="Themebox" style="background-image:url({$template_path}/images/global/themeboxes/newcomer/newcomerbox.gif);">
                    <a class="ThemeboxButton" href="" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url({$template_path}/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url({$template_path}/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url({$template_path}/images/global/buttons/_sbutton_jointibia.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url({$template_path}/images/global/general/box-bottom.gif);"></div>
                  </div>
                  <div id="PremiumBox" class="Themebox" style="background-image:url({$template_path}/images/global/themeboxes/premium/premiumbox.gif);">
                    <a class="ThemeboxButton" href="{$path}" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url({$template_path}/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url({$template_path}/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url({$template_path}/images/global/buttons/_sbutton_getpremium.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url({$template_path}/images/global/general/box-bottom.gif);"></div>
                  </div>

                  <div class="Themebox" >
                    <a target="blank" href="http://webats.xtibia.com">
                      <img style="position: absolute; z-index: 99999; margin-left: 20px; margin-top: 7px;"src="{php} echo text_global('WebATS Manager'); {/php}">
                      <img id="ScreenshotContent" class="ThemeboxContent" src="{$template_path}/images/webats/webats.png" alt="Screenshot of the Day"></a>
                      
                    <div class="Bottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/box-bottom.gif);"></div>
                  </div>

                 <!-- <div id="CurrentPollBox" class="Themebox" style="background-image:url({$template_path}/images/global/themeboxes/current-poll/currentpollbox.gif);">
                    <div id="CurrentPollText">Most powerful vocation?</div>
                    <a class="ThemeboxButton" href="{$path}" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url({$template_path}/images/global/buttons/sbutton.gif);">
                      <div class="BigButtonOver" style="background-image:url({$template_path}/images/global/buttons/sbutton_over.gif);"></div>
                      <div class="ButtonText" style="background-image:url({$template_path}/images/global/buttons/_sbutton_votenow.gif);"></div>
                    </a>
                    <div class="Bottom" style="background-image:url({$template_path}/images/global/general/box-bottom.gif);"></div>
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
            Página Gerada em <strong>{$renderTime}</strong>
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
</html>