<?php if(!$recoverkey): ?>
<?php $this->error->displayError('NOT_DEFINED_RECOVERKEY', 'alert'); ?>
<?php endif; ?>



<table class="table table-striped table-condensed table-content">
	<tbody>
		<tr>
			<td style="width: 25%; vertical-align: top">Conta Criada:</td>
			<td><?php echo $create_date; ?></td>
		</tr>

		<tr>
			<td style="width: 25%; vertical-align: top">Status:</td>
			<td>
			<?php if($premdays): ?>
			Premmy Account - <?php echo $premdays; ?> dias restantes.
			<?php else: ?>
			Free Account
			<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td style="width: 25%; vertical-align: top">Email:</td>
			<td><?php echo $email; ?></td>
		</tr>

		<tr>
			<td style="width: 25%; vertical-align: top">Recovery Key:</td>
			<td>
			<?php if(!$recoverkey): ?>
			Não foi gerada.
			<?php else: ?>
			<?php echo $recoverkey; ?>
			<?php endif; ?>
			</td>
		</tr>

		<tr>
			<tr>
				<td style="width: 25%; vertical-align: top">Coins:</td>
				<td><?php echo $coins; ?></td>
			</tr>
			<td>Seu Perfil:</td>
				<td>
					<div class="progress progress-warning"><div class="bar" style="width: 5%">12%</div> Completo</div>
				</td>
		</tr>

	</tbody>
</table>
