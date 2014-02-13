<img class="Title" src="<?php text_global ('Shop Online'); ?>" alt="Contentbox headline">
<div class="BoxContent" style="background-image:url(http://static.tibia.com/images/global/content/scroll.gif);">	

 

<div class="TableContainer" style="">
<div class="CaptionContainer">
        <div class="CaptionInnerContainer">
          <span class="CaptionEdgeLeftTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionBorderTop" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionVerticalLeft" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <div class="Text">Transferir Coins</div>
          <span class="CaptionVerticalRight" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-vertical.gif);"></span>
          <span class="CaptionBorderBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/table-headline-border.gif);"></span>
          <span class="CaptionEdgeLeftBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
          <span class="CaptionEdgeRightBottom" style="background-image:url(http://127.0.0.1/avatar/templates/avatar/images/global/content/box-frame-edge.gif);"></span>
        </div>
      </div>
      <table class="Table3">
		<tbody>			
			<tr style="background-color:#F1E0C6;">
				<td style="width:90%;padding: 10px;">	
					 <?php echo form_open('', array('class' => 'form-horizontal')); ?>

        
            <b>Player Name:</b> 
            <input name="playerName"  class="input-xlarge" autocomplete="off" type="text" class="span3 typeahead" placeholder="Para qual player deseja enviar?" id="typeahead" data-provide="typeahead" data-items="10" data-source='[<?php
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
            <div class="input-append">
            <input class="span2" id="appendedInputButton" type="text" name="coins" placeholder="Quantas Coins?">
            <button class="btn" type="submit">Go!</button>

          </div>   
           <b><small>Saldo: <cite:><?php echo modules::run('account/_needlogin')->coins; ?></cite></small></b>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</div>