<img class="Title" src="<?php text_global ('Rank Online'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
   <div class="TableContainer">
    <table class="Table1" cellpadding="5">
   
    <tbody>
      <tr bgcolor="#505050">
        <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Páginação</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>

      </tr>
      <tr><td><center>
      <?php if($all_players->paged->has_previous)
{
    ?>
<a href="<?php echo site_url('players/rank/1'); ?>">&lt;&lt; First</a>
<a href="<?php echo site_url('players/rank/'.$all_players->paged->previous_page); ?>">&lt; Prev</a>
    <?php
}
if($all_players->paged->has_next)
{
    ?>
<a href="<?php echo site_url('players/rank/'.$all_players->paged->next_page); ?>">Next &gt;</a>
<a href="<?php echo site_url('players/rank/'.$all_players->paged->total_pages); ?>">Last &gt; &gt;</a>
    <?php
  }
  ?></center></td></tr>
    </tbody>
  </table>
  <br>
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Filtro</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
      <?php echo form_open(''); ?>
      <input type="hidden" name="list" value="experience">
         <table class="Table1" cellpadding="5">
   
      <tbody>     
        <tr bgcolor="#F1E0C6">
          <td width="1%">Vocações:</td>
          <td width="55%">
            <?php 
            $filter_vocations = $this->session->userdata('filter_rank_vocations');
            $vocations_names = config_item('vocations_names'); foreach ($vocations_names[$multworlds->setDefatulWorld()] as $key => $value): if(!in_array($key, $this->configs_rank['ocultvoc'])): ?>
            <label class="checkbox inline">
              <input type="checkbox" name="vocation[]" value="<?php echo $key; ?>" 
              <?php 
              if ($filter_vocations) 
              {
                if(array_key_exists($key, $filter_vocations))
                {
                  echo 'checked';
                }
              }
              else
              {
                 echo 'checked';
              }
              
              ?>> <?php echo $value; ?>
            </label>
          <?php endif; endforeach; ?>
          
          </td>

        </tr>

        <tr bgcolor="#F1E0C6">
           <td>Skills</td>
          <td>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="maglevel" checked>
               Magic Level
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="flevel" checked>
               First
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="clevel" checked>
               Club
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="slevel" checked>
               Sword
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="alevel" checked>
               Axe
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="dlevel" checked>
               Dist
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="deflevel" checked>
               Def
            </label>
            <label class="radio inline">
              <input type="radio" name="filterskill" id="optionsRadios1" value="flevel" checked>
               Fish
            </label>
          </td>  
        </tr>

      </tbody>
    </table> 
    <p>
    <center>      
    <div class="BigButton" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton.gif)">
            <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
              <div class="BigButtonOver" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_over.gif);"></div>
              <input class="ButtonText" type="image" name="Submit" alt="Submit" src="<?php text_global('Filtrar'); ?>">
            </div>
            </div>
            </center>
        </form>

        <div class="TableContainer">
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Highscores</div>
          <span class="CaptionVerticalRight" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(http://avatarats.com/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
  <table class="Table1" cellpadding="5">
   
    <tbody>
      <tr bgcolor="#505050">
        <td width="7%" class="white"> 
          <b>Rank</b>
        </td>

        <td width="20%" class="white"> 
          <b>Vocação</b>
        </td>

        <td width="55%" class="white"> 
          <b>Name</b>
        </td>

        <td width="5%" class="white">
                      Level
                    
        </td>

                <td width="20%" class="white">
          <b>Experience</b>
        </td>
        
         <td width="20%" class="white">
          <b>Status</b>
        </td>

      </tr>
      <tr></tr>
      <?php foreach ($all_players as $key): ?>     
      <tr class="Odd">
        <td width="7%">1</td>
        <td width="7%"><?php $vocations = config_item('vocations_names'); echo $vocations[$key->player_world_id][$key->player_vocation]; ?></td>
        <td width="55%">
          <a href="<?php echo site_url('players/search/'.str_replace(' ', '+', $key->player_name)); ?>"><?php echo $key->player_name; ?></a>
        </td>
        <td width="15%"><?php echo $key->player_level; ?></td>        
          <td width="20%"><?php echo $key->player_experience; ?></td>
          <td width="20%">
            <?php if($key->player_online): ?>
            <font size="2" color="green">
              <b>Online</b>
            </font>
          <?php else: ?>
          <font size="2" color="red">
              <b>Offline</b>
            </font>
        <?php endif; ?>
          </td>
      </tr>  
      <?php endforeach; ?>
    </tbody>
  </table> 
</div>
      
</div>
