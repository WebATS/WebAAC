 <script type="text/JavaScript">
function toggle(id) {
            if (document.getElementById(id).style.display == 'none') {
                document.getElementById(id).style.display = 'block';
            } else {
                document.getElementById(id).style.display = 'none';
            }
        }
</script>
<?php if(form_error('ConfirmPassword')): ?>

<script type="text/javascript">
  VARS_AMBIENTE['lang_id'] = '<?php echo set_value('lang_id'); ?>';
   $(document).ready(function() {
    $('#confirmDelete' + VARS_AMBIENTE['lang_id']).modal('show')
});

</script>

<?php endif; ?>
<?php if(form_error('NewLangIdioma') or form_error('NewtLangPrefix')): ?>
<script type="text/javascript">
   $(document).ready(function() {

    $('#newLang').modal('show')
});
</script>
<?php endif; ?>
<div class="row-fluid sortable">
	<div class="box span12">
					<div class="box-header well" data-original-title="">
						<h2><i class="icon icon-color icon-add"></i> Adicionar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btvar VARS_AMBIENTE = new Array();
  VARS_AMBIENTE['caminho_template'] = '{php} echo BASE_URL.TPLLAYOUTDIR.'alters/admin/'; {/php}';n-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
	                  	<div class="row-fluid">
		                   	<div class="box-content">
		                   		<?php echo form_open('admin/system/traducoes'); ?>
							      <fieldset>
							        <div class="control-group">
							          <label class="control-label">Variavel</label>
							          <div class="controls">  
							            <div class="input-append">                  
							             <input name="newTraduVariavel" type="text" class="field span3"  placeholder="Variavel" value="">
							              <a href="https://code.google.com/p/webats/wiki/Functions#Lang" target="blank" class="btn" rel="popover" data-placement="top" data-content="Informe a váriavel a ser usada. <br/><br/> Exemplo:<br/><code> $this->lang->line('VARIAVEL'); </code>" data-original-title="Informações">Informações</a>                                    
							            </div>
							          </div>
							        </div>

							        <div class="control-group">
							          <label class="control-label" >Sistema</label>
							          <div class="controls">                    
							            <div class="input-append">							              
							              <input name="newTraduSistema" type="text" class="span3 typeahead" placeholder="Digite nome do sistema" id="typeahead" data-provide="typeahead" data-items="10" data-source='[<?php
							              $i = 0;
							              $len = count($all_sistemas);
							              foreach ($all_sistemas as $key) 
							              { 
							              	 $e = '"'.$key->sistema.'"';
							              	 if ($i != $len - 1) 
							              	 {
											    $e .= ',';
											 }									 
											 echo $e;
											 $i++;
							              }
							              ?>]'>   
							              <a href="#" class="btn" rel="popover" data-placement="top" data-content="Este campo é para controle, informe qual sistema utiliza essa configuração." data-original-title="Informações">Informações</a>
							            </div>
							          </div>
							        </div>
							  		<?php $i = '0'; foreach ($list as $value): $i++; ?>							        
								        <div class="control-group">							          
								          <input type="checkbox" onclick="toggle('<?php echo $value->nome; ?>')">
								          <?php echo $value->nome; ?>
								          <p>
								          <div id="<?php echo $value->nome; ?>" class="controls" style="display:none;">
								            <textarea name="newTraduTradu<?php echo $value->lang_prefix; ?>" class="field span6" cols="50" rows="4"></textarea>
								          </div>
								        </div>
							    	<?php endforeach; ?>
							      </fieldset> 
					      			<div class="modal-footer">
		      							<a href="#" class="btn" data-dismiss="modal">Fechar</a>
		      							<button name="submitNewTradu" value="true" id="submitEditConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
		    						</div>
		    					</form>
				  			</div>
				    	</div>
           			</div>   
           			</div>  
          </div>  
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon icon-color icon-globe"></i> Idiomas</h2>
			<a style="margin-left: 10px;" class="btn btn-success" href="#newLang" data-toggle="modal">
				           <i class="icon-plus-sign icon-white"></i> 
				            <?php echo $this->lang->line('PAINEL_ADM_TITLE_BUTTON_ADD_NEW_IDIOMA'); ?>
				        </a>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">


			  <thead>
				  <tr>
					  <th>Idioma</th>
					  <th>Prefix</th>
					  <th>Total</th>
					  <th>Ativado</th>
					  <th>Cache</th>
					  <th>Opções</th>
				  </tr>
			  </thead>   


			  <tbody>
			<!-- COMEÇO DO MODAL EDITAR LANG -->
			<div class="modal hide fade" id="newLang">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">×</button>
		      <h3>Adicionar Novo Idioma</h3>
		    </div>
		  <?php echo form_open('admin/system/traducoes', array('class' => 'form-horizontal')); ?>
		    <div class="modal-body">
		    <div class="box-content">
		    	 <?php if(validation_errors()) $this->error->displayError('<p>'.validation_errors()); ?>
		      <fieldset>

		      	<div class="control-group">
		          <label class="control-label" >Idioma</label>
		          <div class="controls">                    
		            <div class="input-append">
		              <input name="NewLangIdioma" type="text" class="field span8"  placeholder="Nome do Idioma" value="<?php echo set_value('NewLangIdioma'); ?>">			              
		            </div>
		          </div>
		        </div>

		        <div class="control-group">
		          <label class="control-label" >Prefix</label>
		          <div class="controls">                    
		            <div class="input-append">
		              <input name="NewLangPrefix" type="text" class="field span8"  placeholder="Prefix" value="<?php echo set_value('NewLangPrefix'); ?>">			              
		            </div>
		          </div>
		        </div>			       
		      </fieldset> 
		    </div>
		    </div>
		   <div class="modal-footer">
		      <a href="#" class="btn" data-dismiss="modal">Fechar</a>
		      <button name="submitNewLang" value="true" id="submitEditConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
		    </div>
		  </form> 
		 </div>
		 <!-- FIM DO MODAL -->

			<?php $i = '0'; foreach ($list as $value): $i++; ?>
			<tr>
			<!-- COMEÇO DO MODAL EDITAR LANG -->
				<div class="modal hide fade" id="editLang<?php echo $value->id; ?>">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">×</button>
			      <h3>Nova Tradução</h3>
			    </div>
			  <?php echo form_open('admin/system/traducoes', array('class' => 'form-horizontal')); ?>
			    <div class="modal-body">
			    <div class="box-content">
			      <fieldset>

			      	<div class="control-group">
			          <label class="control-label" >Idioma</label>
			          <div class="controls">                    
			            <div class="input-append">
			              <input name="editLangIdioma" type="text" class="field span8"  placeholder="Nome do Idioma" value="<?php echo $value->nome; ?>">			              
			            </div>
			          </div>
			        </div>

			        <div class="control-group">
			          <label class="control-label" >Prefix</label>
			          <div class="controls">                    
			            <div class="input-append">
			              <input name="editLangPrefix" type="text" class="field span8"  placeholder="Prefix" value="<?php echo $value->lang_prefix; ?>">			              
			            </div>
			          </div>
			        </div>			       
			      </fieldset> 
			    </div>
			    </div>
			   <div class="modal-footer">
			      <a href="#" class="btn" data-dismiss="modal">Fechar</a>
			      <?php echo form_hidden('lang_id', $value->id); ?>
			      <button name="submitEditLang" value="true" id="submitEditConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
			    </div>
			  </form> 
			 </div>
			 <!-- FIM DO MODAL -->


					<td class="center">
						<img src="<?php echo base_url().'templates/public/img/flags/'.$value->lang_prefix.'.png'; ?>">
						<?php echo $value->nome; ?>
					</td>
					<td class="center">
						<span class="label label-important"><?php echo $value->lang_prefix; ?></span>
					</td>
					<td class="center">
						<span class="label label-success">
							<?php echo $count[$value->lang_prefix]; ?>
						</span>
					</td>
					<?php if($value->ativado): ?>
						<td class="center">
							<span class="label label-info">Ativado</span>
						</td>
					<?php else: ?>
						<td class="center">
							<span class="label label-important">Desativato</span>
						</td>
					<?php endif; ?>
					<td class="center"><?php echo mdate($datestring, $value->cache_time-config_item('cache_language')).'<p>'.mdate($datestring, $value->cache_time); ?></td>

					<td class="center">
						<a class="btn btn-success" href="?list_lang=<?php echo $value->lang_prefix; ?>">
							<i class="icon-zoom-in icon-white"></i>  
							Listar                                           
						</a>						
						<a class="btn btn-info" href="#editLang<?php echo $value->id; ?>" data-toggle="modal">
				           <i class="icon-plus-sign icon-white"></i> 
				            Editar
				        </a>
						<a class="btn btn-info" href="?reload_id=<?php echo $value->id; ?>">
							<i class="icon-edit icon-white"></i>  
							Reload                                            
						</a>
						<?php if ($value->ativado): ?>
						<a class="btn btn-danger" href="?desative_id=<?php echo $value->id; ?>">
							<i class="icon-trash icon-white"></i> 
							Desativar
						</a>
						<?php else: ?>
						<a class="btn btn-success" href="?ative_id=<?php echo $value->id; ?>">
							<i class="icon-trash icon-white"></i> 
							Ativar
						</a>
						<?php endif; ?>
						<div class="modal hide fade" id="confirmDelete<?php echo $value->id; ?>">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">×</button>
					        <h3>Confirmar Deletação - <?php echo $value->nome; ?></h3>
					      </div>
					     <?php echo form_open('admin/system/traducoes'); ?> 
					      <div class="modal-body">
					      	<?php if(validation_errors()) $this->error->displayError('<p>'.validation_errors()); ?>
					        <p>Para efetuar essa requesição é preciso informar novamente sua senha.</p>
					        <div class="controls">
     						 <input name="ConfirmPassword" type="password" placeholder="Confirme sua Senha">
    						</div>
					      </div>
					      <div class="modal-footer">
					        <a href="#" class="btn" data-dismiss="modal">Close</a>
					        <?php echo form_hidden('lang_id', $value->id); ?>
					        <button name="submitDeleteLang" value="true" id="submitEditConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
					      </div>
					     </form>
					    </div>
						<a class="btn btn-danger" href="#confirmDelete<?php echo $value->id; ?>" data-toggle="modal">
				           <i class="icon-plus-sign icon-white"></i> 
				            Deletar
				        </a>
					</td>
				</tr>
								<?php endforeach; ?>
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->
<div class="row-fluid sortable ui-sortable">
			                
  
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon icon-color icon-page"></i> Adicionar</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Idioma - Prefix</th>
					  <th>Variavel</th>
					  <th>Tradução</th>
					  <th>Sistema</th>
					  <th>Opções</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	<?php $i = '0'; foreach ($list_traducoes as $value): $i++; ?>			 
			  <div class="modal hide fade" id="ConfirmDelTradu<?php echo $value->id; ?>">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">×</button>
			        <h3>Confirmar Deletação - <?php echo $value->variavel; ?></h3>
			      </div>
			     <?php echo form_open('admin/system/traducoes'); ?> 
			      <div class="modal-body">
			      	<?php if(validation_errors()) $this->error->displayError('<p>'.validation_errors()); ?>
			        <p>Para efetuar essa requesição é preciso informar novamente sua senha.</p>
			        <div class="controls">
						 <input name="ConfirmPassword" type="password" placeholder="Confirme sua Senha">
					</div>
					<p>Abaixo informe quais idiomas você deseja deletar essa tradução.</p>
					<select name="selectd_lang[]" multiple="multiple">
					<option value="all">Todos Idiomas</option>
					<?php $i = '0'; foreach ($list as $value2): $i++; ?>							        
			        <div class="control-group">							          
			          <option value="<?php echo $value2->lang_prefix; ?>"> <?php echo $value2->nome; ?>	</option>		         								          
			        </div>
					<?php endforeach; ?>
					</select>
			      </div>
			      <div class="modal-footer">
			        <a href="#" class="btn" data-dismiss="modal">Close</a>
			        <?php echo form_hidden('lang_variavel', $value->variavel); ?>
			        <button name="submitDeleteTradu" value="true" type="submit" class="btn btn-primary">Salvar Alterações</button>
			      </div>
			     </form>
			    </div>
				<tr>
					<td class="center">
						<span class="label label-important"><?php echo $value->lang; ?></span>
					</td>

					<td class="center">
						<span class="label label-success"><?php echo $value->variavel; ?></span>
					</td>

					<td><?php echo  character_limiter($value->tradu, 20); ?></td>

					<td class="center">
						<span class="label label-success"><?php echo $value->sistema; ?></span>
					</td>
					
					<td class="center">
						<a class="btn btn-info" href="#">
							<i class="icon-edit icon-white"></i>  
							Editar                                          
						</a>
						<a class="btn btn-danger" href="#ConfirmDelTradu<?php echo $value->id; ?>	" data-toggle="modal">
				           <i class="icon-plus-sign icon-white"></i> 
				            Deletar
				        </a>
					</td>
				</tr>
				<?php endforeach; ?>
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->