<img class="Title" src="<?php text_global ('Players Profile'); ?>" alt="Contentbox headline">

<?php if(!$profile): ?>

<?php if($profile === FALSE): ?>
<?php $this->error->displayError('Player Não Encontrado!'); ?>
<?php endif; ?>
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
  <div class="TableContainer">
     <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Search Character</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
    <?php echo form_open('players/search', array('class', 'form-horizontal')); ?>
      <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#D4C0A1">
              <table border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <td>Name:</td>
                    <td>
                      <input name="playerName" autocomplete="off" type="text" class="span3 typeahead" placeholder="Digite nome do player..." id="typeahead" data-provide="typeahead" data-items="10" data-source='[<?php
                      $i = 0;
                      $len = count($list_all_players);
                      foreach ($list_all_players as $key) 
                      {                               
                        $key->name = str_replace("'", "&#39;", $key->name);
                        $e = "\"".$key->name."\"";                            
                        if ($i != $len - 1) 
                        {
                          $e .= ',';
                        }                   
                         echo $e;
                         $i++;
                      }
                      ?>]'>  
                    </td>
                    <td>
                      <input type="image" name="Submit" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_submit.gif" border="0" width="120" height="18"></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
<?php if($list_profiles_visited): ?>
    <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Últimos Profiles Visitados - <a href="?clean=list_visited">Limpar</a></div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
      <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#D4C0A1">
              <table border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <?php foreach ($list_profiles_visited as $key): ?>
                      <a href="<?php echo site_url('players/search/'.str_replace(' ', '+', $key)); ?>"><?php echo $key; ?></a>,
                    <?php endforeach; ?>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
<?php endif; ?>

  </div>
</div>

<?php else: ?>
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">
  <div class="TableContainer">
      <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Player Profile</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
  
    <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
    <tbody>
      <tr bgcolor="#505050">
      </tr>
      <tr bgcolor="#F1E0C6">
        <td width="20%">Name:</td>
        <td>
         <?php echo $profile->name; ?>
          <div style="float: right"></div>
        </td>
      </tr>
      <tr bgcolor="#D4C0A1">
        <td>Sex:</td>
        <td><?php $sex = config_item('newPlayerSex'); echo $sex[$profile->world_id][$profile->sex]; ?></td>
      </tr>
      <tr bgcolor="#F1E0C6">
        <td>Vocation:</td>
        <td><?php $vocations = config_item('vocations_names'); echo $vocations[$profile->world_id][$profile->vocation]; ?></td>
      </tr>
      <tr bgcolor="#D4C0A1">
        <td>Level:</td>
        <td><?php echo $profile->level; ?></td>
      </tr>
      <tr bgcolor="#F1E0C6">
        <td>World:</td>
        <td><?php $worlds = config_item('worlds'); echo $worlds[$profile->world_id]; ?></td>
      </tr>
      <!--<tr bgcolor="#F1E0C6">
        <td>Residence:</td>
        <td>Carlin</td>
      </tr>-->
      <tr bgcolor="#D4C0A1">
        <td>Guild&nbsp;membership:</td>
        <td>
         don't have guild
        </td>
      </tr>
      <tr bgcolor="#F1E0C6">
        <td>Last login:</td>
        <td> <?php echo mdate($datestring, $profile->lastlogin); ?></td>
      </tr>
      <tr bgcolor="#D4C0A1">
        <td valign="top">Comment:</td>
        <td>
         <?php echo $profile->comment; ?>
        </td>
      </tr>
      <tr bgcolor="#F1E0C6">
        <?php
        $this->db->select('premdays');
        $this->db->where('id', $profile->account_id);
        $result = $this->db->get('accounts');
        $result = $result->result_array() ;
        ?>
        <td>Account&nbsp;Status:</td>
        <?php if ($result[0]['premdays']): ?>
        <td>Premium Account</td>
      <?php else: ?>
      <td>Free Accounts</td>
    <?php endif; ?>
      </tr>
    </tbody>
  </table>
  <br>
  <?php if($profile->showoptios): ?>
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Skills</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
  <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
    <tbody>     
      <tr bgcolor="#F1E0C6">
        <td >
          <table style="border: 0px;" class="Table1" cellpadding="5" cellspacing="4" width="100%">
            
            <tbody>             
              <tr bgcolor="#D4C0A1">                
                <td style="text-align: center;"> <strong>ML</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Fist</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Club</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Sword</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Axe</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Dist</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Def</strong>
                </td>
                <td style="text-align: center;">
                  <strong>Fish</strong>
                </td>
              </tr>
              <tr></tr>
              <tr bgcolor="#F1E0C6">
                <td style="text-align: center;"><?php echo $profile->maglevel; ?></td>
                <td style="text-align: center;">
                  <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '0'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '1'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '2'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '3'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '4'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '5'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
                <td style="text-align: center;">
                   <?php
                    $query = $this->db->get_where('player_skills', array('player_id' => $profile->id, 'skillid' => '6'))->result_array();
                    echo $query[0]['value'];
                  ?>
                </td>
              </tr>
    </tbody> 
</table></td>
      </tr>
  
    </tbody>
  </table>
<?php endif; ?>


  <!--<br>
  <br>
   <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Character Deaths</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
  <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
    <tbody>     
      <tr bgcolor="#D4C0A1">
        <td width="25%" valign="top">Apr&nbsp;21&nbsp;2013,&nbsp;17:43:03&nbsp;CEST</td>
        <td>Died at Level 230 by a serpent spawn.</td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Search Character</div>
          <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
    <?php echo form_open('players/search', array('class', 'form-horizontal')); ?>
      <table class="Table1" cellpadding="5" cellspacing="4" width="100%">
        <tbody>
          <tr>
            <td bgcolor="#D4C0A1">
              <table border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <td>Name:</td>
                    <td>
                      <input name="playerName" size="29" maxlength="29">
                    </td>
                    <td>
                      <input type="image" name="Submit" src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/buttons/sbutton_submit.gif" border="0" width="120" height="18"></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
</div>-->
</div>
<?php endif; ?>