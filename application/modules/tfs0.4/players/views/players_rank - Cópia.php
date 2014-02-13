<img class="Title" src="<?php text_global ('Players Profile'); ?>" alt="Contentbox headline">
<?php $this->error->displayError('Nosso rank ainda esta em construção. Em fator disso falta algumas áreas, pedimos paciência. Logo estaremos finalizando.', 'info'); ?>
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
   <div class="TableContainer">
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
            $vocations_names = config_item('vocations_names'); foreach ($vocations_names[$multworlds->setDefatulWorld()] as $key => $value): ?>
            <label class="checkbox inline">
              <input type="checkbox" name="vocation[]" value="<?php echo $key; ?>" 
              <?php 
              if ($filter_vocations) 
              {
                if(in_array($key, $filter_vocations)) 
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
          <?php endforeach; ?>
          </td>       
        </tr>

        <!--<tr bgcolor="#F1E0C6">
          <td width="1%">Rank:</td>
          <td width="55%">
            <?php $type_ranks = $config['type']; 
            if(isset($type_ranks[$multworlds->setDefatulWorld()])):
            $array = array_merge($type_ranks[$multworlds->setDefatulWorld()]['players'], $type_ranks[$multworlds->setDefatulWorld()]['players_skills']);
            foreach ($array as $key => $value): 
            ?>
            <label class="radio inline">
              <input type="radio" name="skill" value="<?php  echo $key; ?>"> <?php  echo $value['name']; ?>
            </label>
          <?php endforeach; else: echo "Sem Configuração de rank para World[".$multworlds->setDefatulWorld()."]"; endif;?>
          </td>       
        </tr>-->

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
      <br>  
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
      <?php if($list->paged->has_previous)
{
    ?>
<a href="<?php echo site_url('players/rank/1'); ?>">&lt;&lt; First</a>
<a href="<?php echo site_url('players/rank/'.$list->paged->previous_page); ?>">&lt; Prev</a>
    <?php
}
if($list->paged->has_next)
{
    ?>
<a href="<?php echo site_url('players/rank/'.$list->paged->next_page); ?>">Next &gt;</a>
<a href="<?php echo site_url('players/rank/'.$list->paged->total_pages); ?>">Last &gt; &gt;</a>
    <?php
  }
  ?></center></td></tr>
    </tbody>
  </table>
  <br>
  <div class="TableContainer">
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Highscores</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
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
          <?php if($skill_rank): ?>
          <b>
          <?php 
          foreach ($array as $key => $value) 
          {

            if($key == $this->input->post('skill'))
            {
              echo $value['name'];
              break;
            }
          }
          ?>
          <?php else: ?>
            Level
          <?php endif; ?>
          </b>
        </td>

        <?php if(!$skill_rank): ?>
        <td width="20%" class="white">
          <b>Experience</b>
        </td>
        <?php endif; ?>

         <td width="20%" class="white">
          <b>Status</b>
        </td>

      </tr>
      <tr></tr>
    <?php $i = 0; $pos = 1; foreach ($list as $key): ?>
    <?php if($i % 2 == 0) { $style = 'class="Odd"'; } else { $style = 'class="Even"'; } ?> 
      <tr <?php echo $style; ?>>
        <td width="7%"><?php echo $pos; ?></td>
        <td width="7%"><?php $vocations = config_item('vocations_names'); echo $vocations[$key->world_id][$key->vocation]; ?></td>
        <td width="55%">
          <a href="<?php echo site_url('players/search/'.str_replace(' ', '+', $key->name)); ?>"><?php echo $key->name; ?></a>
        </td>
        <?php if(!$skill_rank): ?>

          <td width="15%"><?php echo $key->level; ?></td>

        <?php else: ?> 

        <?php 
        $continue = FALSE;
        $type_ranks = $config['type'];       

          if(isset($type_ranks[$multworlds->setDefatulWorld()]['players'][$this->input->post('skill')]))
          {
          ?>
          <td width="15%"><?php $post = $this->input->post('skill'); echo $key->$post; ?></td>
          <?php 
          }
          elseif(isset($type_ranks[$multworlds->setDefatulWorld()]['players_skills'][$this->input->post('skill')]))
          {
            $query = $this->db->get_where('player_skills', array('player_id' => $key->id, 'skillid' => $this->input->post('skill')))->result_array();
            echo '<td width="15%">'.$query[0]['value'].'</td>';                  
          }
          endif; 
          ?>

        <?php if(!$skill_rank): ?>
        <td width="20%"><?php echo $key->experience; ?></td>
        <?php endif; ?>
        <td width="20%"><?php if($key->online) echo '<font size="2" color="green"><b>Online</b></font>'; else echo '<font size="2" color="red">Offline</font>'; ?></td>
      </tr>
    <?php $i++; $pos++; endforeach; ?>


    </tbody>
  </table> 
</div>
