<div class="row-fluid sortable ui-sortable">
	<div class="box span9">
		<div class="box-header well" data-original-title="">
			<h2> <i class="icon-th"></i>
				Backup Configurações
			</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"> <i class="icon-cog"></i>
				</a>
				<a href="#" class="btn btn-minimize btn-round">
					<i class="icon-chevron-up"></i>
				</a>
				<a href="#" class="btn btn-close btn-round">
					<i class="icon-remove"></i>
				</a>
			</div>
		</div>
		<div class="box-content">
			<div class="page-header">
				<h3>
					Efetuar Backup
				</h3>				
			</div>
			<div class="well">
			  <p class="muted" style="margin-bottom: 0;">
			  	Este sistema efetue o backup do seu banco de dados. Futuras percas de configurações/dados da sua aplica será possível restaurar o banco de dados através de um ponto de restauração.
			  	É possível gerar backups de várias tabelas especificas, ou gerar backup completo.
			  	<br/><br/>
			  	Obs: Após gerar um backup o mesmo será enviado para o seu email, por motivos de segurança.
			  	Esteja ciente que por este motivo é preciso que sua aplicação conte com uma configuração de email verdadeira.
			  </p>
			</div>
			<?php echo form_open('', array('class' => 'form-horizontal')); ?>
				<fieldset>							 
				  <div class="control-group">
								<label class="control-label" for="selectError1">Tabelas</label>
								<div class="controls">
								  <select name="tables[ ]" id="selectError1" multiple data-rel="chosen">
								  	<option value="all">all</option>
								  	<?php foreach ($this->db->list_tables() as $db): ?>
									<option value="<?php echo $db; ?>"><?php echo $db; ?></option>
									<?php endforeach; ?>
								  </select>
								</div>
							  </div>
				  <div class="control-group">
					<label class="control-label">Opções</label>
					<div class="controls">
					  <label class="checkbox inline">
						<div class="checker" id="uniform-inlineCheckbox1">
							<span>
								<input type="checkbox" id="inlineCheckbox1" value="sendToEmail" style="opacity: 0;">
							</span>
						</div> Enviar Para Email
					  </label>					  
					</div>
				  </div>

				  <div class="control-group">
					<label class="control-label">Opções</label>
					<div class="controls">
					  <label class="radio">
						<div class="radio" id="uniform-optionsRadios1">							
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="backup" style="opacity: 0;">		
						</div>
						Efetuar Backup
					  </label>
					  <div style="clear:both"></div>
					  <label class="radio">
						<div class="radio" id="uniform-optionsRadios1">							
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="repair" style="opacity: 0;">							
						</div>
						Efetuar Reparação
					  </label>
					  <div style="clear:both"></div>
					  <label class="radio">
						<div class="radio" id="uniform-optionsRadios1">							
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="optimize" style="opacity: 0;">							
						</div>
						Efetuar Optimização
					  </label>
					</div>
				  </div>

				  <div class="form-actions">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<button class="btn">Cancel</button>
				  </div>
				</fieldset>
			</form>
		</div>
	</div>
	<!--/span-->
	<div class="box span3">
		<div class="box-header well" data-original-title="">
			<h3>Lista Backups do Sistema</h3>
			<div class="box-icon">
				<a href="#" class="btn btn-close btn-round">
					<i class="icon-remove"></i>
				</a>
			</div>
		</div>
		<div class="box-content">
			<ul>
				<?php foreach ($list_backups as $key => $value):?>
				<div id="myModal<?php echo $value->value3; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    <h3 id="myModalLabel">Modal header</h3>
				  </div>
				  <div class="modal-body">
				  	<h3>Lista das tabelas no backup</h3>
				  	<div class="well">
				  		<ul>			
						    <?php foreach (json_decode($value->value4) as $key): ?>
						  		<li>
						  			<?php echo $key; ?>
						  		</li>
						   
							<?php endforeach; ?>
						</ul>
					</div>
				  </div>
				  <div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
				    <button class="btn btn-primary">Salvar mudanças</button>
				  </div>
				</div>
					<li>Backup: <?php echo mdate($datestring, $value->value3); ?>
						<ul>							
							<li>
								<a href="#myModal<?php echo $value->value3; ?>"  data-toggle="modal">Opções</a>
							</li>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>