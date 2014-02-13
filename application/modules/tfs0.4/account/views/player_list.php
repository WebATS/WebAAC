<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if(validation_errors()): $this->error->displayError(form_error('player-comment')); endif; ?>

<table class="table table-striped table-condensed table-content">
	<tbody>
		<?php if(is_object($players)): ?>
		<?php foreach ($players as $player): ?>
		<!-- Modal -->
		<div id="player-edit<?php echo hash_hmac('sha1', $this->session->userdata('session_id'), $player->id, false); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php echo form_open('', array('class' => 'form-horizontal')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 id="myModalLabel">
					<?php echo $player->name; ?></h4>
				<fieldset>Comentário:</fieldset>
			</div>
			<div class="modal-body">
				<textarea name="player-comment" class="field span5" id="textarea" cols="50" rows="7"><?php echo $player->comment; ?></textarea>
				<input type="hidden" name="private_id" value="<?php echo modules::run('account/player/_encrypt', $player->id); ?>">
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
				<button class="btn btn-primary">Salvar mudanças</button>
			</div>
		</form>

		</div> 

	<tr>
		<td> <strong><?php echo anchor("player/view/$player->
				name", "$player->name", array('class' => 'player_name')); ?> - Level:
				<?php echo $player->level;?></strong>
		</td>
		<td>
			<div class="pull-right">
				<a class="btn btn-mini btn-inverse" href="get/hide.php?pid=143213&amp;securitytoken=aa09ca4aad863b8462380d56f0748ee2515317d9e18072.12298901"> <i class="icon-eye-close icon-white"></i>
					Hide
				</a>
				<a href="#player-edit<?php echo hash_hmac('sha1', $this->session->userdata('session_id'), $player->id, false); ?>" data-toggle="modal" class="btn btn-mini btn-info"> <i class="icon-pencil icon-white"></i>
					Edit
				</a>
				<a class="btn btn-mini btn-danger" href="get/delete.php?pid=143213&amp;securitytoken=aa09ca4aad863b8462380d56f0748ee2515317d9e18072.12298901">
					<i class="icon-trash icon-white"></i>
					Delete
				</a>
			</div>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php else: ?>
	<td> <strong>Não foram encontrados players em sua conta.</strong>
	</td>
	<?php endif; ?></tbody>
</table>
<?php
/* End of file list.php */
/* Location: ./application/modules/8.50/account/views/player_list.php */
?>