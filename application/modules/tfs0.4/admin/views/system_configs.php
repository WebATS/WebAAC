<?php if(form_error('newConfigName') or form_error('newConfigValue') or form_error('newConfigSistema')): ?>
<script type="text/javascript">
   $(document).ready(function() {

    $('#newConfig').modal('show')
});
</script>
<?php endif; ?>
<div class="row-fluid sortable">
        <div class="box span12 tour">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-globe"></i> Tutorial</h2>
            <div class="box-icon">
              <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
              <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
              <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
          </div>
          <div class="box-content">
            Confuso como funciona esse sistema? aprenda a utilizá-lo com um pequeno tutorial, basta pressionar o botão.
            <br/><br/>
            <a href="#" class="btn-primary btn-large btn startprivatekeytutorial">&#9658; Iniciar</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->
<div class="box-content">
<div class="modal hide fade" id="newConfig">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <h3>Configurações</h3>
    </div>
  <?php echo form_open('admin/system/configs', array('class' => 'form-horizontal')); ?>
    <div class="modal-body">
    <div class="box-content">
      <?php if(validation_errors()) $this->error->displayError('<p>'.validation_errors()); ?>
      <fieldset>
        <div class="control-group">
          <label class="control-label">Nova Configuração</label>
          <div class="controls">  
            <div class="input-append">                  
              <input name="newConfigName" type="text" class="field span8" placeholder="Valor da configuração" value="<?php echo set_value('newConfigName'); ?>">    
              <a href="https://code.google.com/p/webats/wiki/Functions#Configs" target="blank" class="btn" rel="popover" data-placement="top" data-content="Informe o nome da configuração. <p> Exemplo: <br/><br/><code> $this->ConfigsValue->getConfig('newConfig'); </code>" data-original-title="Informações">Informações</a>                                    
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" >Valor <span class="label label-important">Atenção!</span></label>
          <div class="controls">  
            <div class="input-append">                  
              <input name="newConfigValue" type="text" class="field span8" placeholder="Valor da configuração" value="<?php echo set_value('newConfigValue'); ?>">    
              <a href="#" class="btn" rel="popover" data-placement="top" data-content="Informe o valor dessa configuração.<br/> Algumas configurações se baseiam apenas em ativada/desativada o valor dessas configurações precisam ser <b>0</b> para desativada e <b>1</b> para ativada." data-original-title="Informações">Informações</a>                                    
            </div>
          </div>
        </div>


        <div class="control-group">
          <label class="control-label" >Sistema</label>
          <div class="controls">                    
            <div class="input-append">
              <input name="newConfigSistema" type="text" class="field span8"  placeholder="Nome do sistema" value="<?php echo set_value('newConfigSistema'); ?>">
              <a href="#" class="btn" rel="popover" data-placement="top" data-content="Este campo é para controle, informe qual sistema utiliza essa configuração." data-original-title="Informações">Informações</a>
            </div>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputEmail">Comentário</label>
          <div class="controls">
            <textarea name="newConfigComent" class="field span12" id="textarea" cols="50" rows="4"><?php echo set_value('newConfigComent'); ?></textarea>
          </div>
        </div>
      </fieldset> 
    </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn" data-dismiss="modal">Fechar</a>
      <button name="submitNewConfig" value="true" id="submitNewConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
  </form> 
</div>
</div>
</table>


<div class="row-fluid sortable">
    <div class="box span12">
      <div class="box-header well" data-original-title>
        <h2><i class="icon-edit"></i> Opções</h2>
        <div class="box-icon">
          <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
          <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
          <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
        </div>
      </div>
      <div class="box-content">          
        <div class="form-actions">
         <a class="btn btn-success" href="#newConfig" data-toggle="modal">
            <i class="icon-plus-sign icon-white"></i> 
            Nova Configuração
          </a>
          <a class="btn btn-success" href="<?php echo site_url('admin/system/configs/backup'); ?>" >
            <i class="icon-folder-close icon-white"></i> 
            Backup das Configurações
          </a>
          <a class="btn btn-success" href="#newConfig" data-toggle="modal">
            <i class="icon-folder-open icon-white"></i> 
            Restaurar Configurações
          </a>
        </div>
      </div>
    </div><!--/span-->
</div><!--/row-->
    
<div id="tableKeys" class="row-fluid sortable">    
        <div class="box span12">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Configurações</h2>
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
                  <th class="rowID">id</th>
                  <th class="rowDate">Config</th>
                  <th class="rowAction">Última Alteração</th>                                 
                  <th class="rowAction">Sistema</th>
                  <th class="rowAction">Comentário</th>
                  <th class="rowAction">Opções</th>
                </tr>
              </thead>   
              <tbody>
            <?php $i = '0'; foreach ($list as $value): $i++; ?>
            <div class="modal hide fade" id="config<?php echo $value->id; ?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>Configurações</h3>
            </div>
          <?php echo form_open('admin/system/configs', array('class' => 'form-horizontal')); ?>
            <div class="modal-body">
            <div class="box-content">
              <div class="alert">
                <h4>Advertência!</h4> Cuidado ao modificar uma configuração, ela pode desestabilizar toda sua aplicação!
              </div>
              <fieldset>
                <div class="control-group">
                  <label class="control-label">Configuração</label>
                  <div class="controls">  
                    <div class="input-append">                  
                      <input name="configName" type="text" class="field span8" placeholder="Valor da configuração" value="<?php echo $value->config; ?>">    
                      <a href="https://code.google.com/p/webats/wiki/Functions#Configs" target="blank" class="btn" rel="popover" data-placement="top" data-content="Informe o nome da configuração. <p> Exemplo: <br/><br/><code> $this->ConfigsValue->getConfig('<?php echo $value->config; ?>'); </code>" data-original-title="Informações">Informações</a>                                    
                    </div>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" >Valor <span class="label label-important">Atenção!</span></label>
                  <div class="controls">  
                    <div class="input-append">                  
                      <input name="configValue" type="text" class="field span8" placeholder="Valor da configuração" value="<?php echo $value->value; ?>">    
                      <a href="#" class="btn" rel="popover" data-placement="top" data-content="Informe o valor dessa configuração.<br/> Algumas configurações se baseiam apenas em ativada/desativada o valor dessas configurações precisam ser <b>0</b> para desativada e <b>1</b> para ativada." data-original-title="Informações">Informações</a>                                    
                    </div>
                  </div>
                </div>


                <div class="control-group">
                  <label class="control-label" >Sistema</label>
                  <div class="controls">                    
                    <div class="input-append">
                      <?php echo form_hidden('config_id', $value->id); ?>
                      <input name="configSistema" type="text" class="field span8"  placeholder="Nome do sistema" value="<?php echo $value->sistema; ?>">
                      <a href="#" class="btn" rel="popover" data-placement="top" data-content="Este campo é para controle, informe qual sistema utiliza essa configuração." data-original-title="Informações">Informações</a>
                    </div>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="inputEmail">Comentário</label>
                  <div class="controls">
                    <textarea name="configComent" class="field span12" id="textarea" cols="50" rows="4"><?php echo $value->coment; ?></textarea>
                  </div>
                </div>
              </fieldset> 
            </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn" data-dismiss="modal">Fechar</a>
              <button name="submitEditConfig" value="true" id="submitEditConfig" type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
          </form> 
          </div>
              <tr>
                <td><?php echo $value->id; ?></td>
                <td class="center"><?php echo $value->config; ?></td>
                <td class="center"><?php if($value->time) { echo mdate($datestring, $value->time); }else{echo 'Não Registrado.'; } ?></td>
                <td class="center"><?php echo $value->sistema; ?></td>
                <td class="center"><?php echo  character_limiter($value->coment, 35); ?></td>
                <td class="center">                                
                <a class="btn btn-success" href="#config<?php echo $value->id; ?>" data-toggle="modal">
                  <i class="icon-remove-sign icon-white"></i> 
                  Editar
                </a>
                </td>
              </tr>
           <?php endforeach; ?>
          
              </tbody>
            </table>            
          </div>
        </div><!--/span-->
      
      </div><!--/row-->