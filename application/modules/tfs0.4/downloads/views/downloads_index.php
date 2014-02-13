<img class="Title" src="<?php text_global ('Downloads'); ?>" alt="Contentbox headline">
<div class="newsTitle">
	<img style="margin-left: -12px; margin-top: -10px;" src="http://avatarats.com/templates/tibia/images/global/menu/icon-account.gif">
	Downloads
</div>
<table bgcolor="#D4C0A1" border="0" cellpadding="4" cellspacing="1" width="100%" align="center">
	<tbody>
		<tr bgcolor="#505050">
			<td align="center" class="white" colspan="1"> 
				<b>Lista </b>					
			</td>
		</tr>
	</tbody>
</table>
<table bgcolor="#D4C0A1" border="0" cellpadding="4" cellspacing="1" align="center" width="100%">
	<tbody>
		<?php if($list->id): foreach ($list as $key): ?>	
				<tr bgcolor="#F1E0C6">	
			<td>
				<center> <b>Download: <?php echo $key->file_name; ?></b>
					<p>
					<!--<small>md5 sun: <?php echo $key->md5_hash; ?></small>-->				
					<small>Tamanho: <?php echo $key->size; ?> / Baixado: <?php echo $key->count; ?> vezes</small>
				</center>
			</td>
			<td>
				<center>
					<?php if(!$list->link_href):?>
						<a href="<?php echo site_url('downloads/get/'.$key->id); ?>" target="_blank" class="style2"> <u>Download</u>
						</a>
					<?php else: ?>
						<a href="<?php echo site_url('downloads/get/'.$key->id); ?>" target="_blank" class="style2"> <u>Download</u>
						</a>
					<?php endif; ?>
				</center>
			</td>
		<?php endforeach; else: ?>
		<td>
				<center> 
					Não foram encontrados aplicativos para download.					
				</center>
			</td>
				</tr>
		<?php endif; ?>
	</tbody>
</table>