<img class="Title" src="<?php text_global ('Recover Account'); ?>" alt="Contentbox headline">
        <div class="BoxContent" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/scroll.gif);"> 
          <b><?php echo $this->lang->line('LOST_ACC_TITLE'); ?></b>
          <br>
          <br>
          <?php echo $this->lang->line('LOST_ACC_DESCRIPTION'); ?>
          <br>
          <br>
          <?php echo $this->lang->line('LOST_ACC_OPTIONS'); ?>
          <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <tbody>
              <tr>
                <td>
                  <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/blank.gif" width="10" height="1" border="0">
                </td>
                <td>
                  <table cellspacing="1" cellpadding="0" border="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="2">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/blank.gif" width="1" height="1" border="0">
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/bullet.gif" width="12" height="15" border="0">
                        </td>
                        <td><?php echo $this->lang->line('LOST_ACC_OP1'); ?></td>
                      </tr>
                      <tr>
                        <td valign="top">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/bullet.gif" width="12" height="15" border="0">
                        </td>
                        <td><?php echo $this->lang->line('LOST_ACC_OP2'); ?></td>
                      </tr>
                      <tr>
                        <td valign="top">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/bullet.gif" width="12" height="15" border="0">
                        </td>
                        <td><?php echo $this->lang->line('LOST_ACC_OP3'); ?></td>
                      </tr>
                      <tr>
                        <td valign="top">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/bullet.gif" width="12" height="15" border="0">
                        </td>
                        <td>
                          <?php echo $this->lang->line('LOST_ACC_OP4'); ?>
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">
                          <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/bullet.gif" width="12" height="15" border="0">
                        </td>
                        <td>
                          <?php echo $this->lang->line('LOST_ACC_OP5'); ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td>
                  <img src="<?php echo base_url().TPLLAYOUTDIR; ?>images/global/general/blank.gif" width="10" height="1" border="0">
                </td>
              </tr>
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
              <div class="Text"><?php echo $this->lang->line('LOST_ACC'); ?></div>
              <span class="CaptionVerticalRight" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-vertical.gif);"></span>
              <span class="CaptionBorderBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-headline-border.gif);"></span>
              <span class="CaptionEdgeLeftBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
              <span class="CaptionEdgeRightBottom" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/box-frame-edge.gif);"></span>
            </div>
          </div>
          <table class="Table4" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>
                  <div class="InnerTableContainer">
                    <table style="width:100%;">
                      <tbody>
                        <tr>
                          <td>
                            <div class="TableShadowContainerRightTop">
                              <div class="TableShadowRightTop" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rt.gif);"></div>
                            </div>
                            <div class="TableContentAndRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-rm.gif);">
                              <div class="TableContentContainer">
                                <table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
                                  <tbody>
                                    <tr>
                                      <td>
                                          <?php if($lost === NULL): ?>
                                          <legend><?php echo $this->lang->line('LOST_ACC'); ?></legend>
                                            <p>
                                              <?php echo anchor('account/lost/password', $this->lang->line('LOST_ACC_LINK_PASS')); ?>
                                            <p>
                                              <?php echo anchor('account/lost/acc', $this->lang->line('LOST_ACC_LINK_ACC')); ?>
                                            </div>
                                            <?php elseif($lost == 'acc' or $lost == 'password'): ?>
                                            <?php echo form_open('', array('class' => 'form-horizontal')); ?>
                                              <fieldset>
                                                <legend>Recuperar <?php if($lost == 'acc'): ?> Account <?php elseif($lost == 'acc' or $lost == 'password'): ?> Password <?php endif; ?></legend>
                                            <p class="text-info">
                                            <?php if($lost == 'acc'): ?>
                                              <?php echo $this->lang->line('LOST_TEXT_ACC'); ?>
                                            <?php elseif($lost == 'acc' or $lost == 'password'): ?>
                                              <?php echo $this->lang->line('LOST_TEXT_PASS'); ?>
                                            <?php endif; ?>
                                            </p>
                                                <div class="input-prepend input-append">
                                                  <input name="recoverykey" type="text" placeholder="Seu email ou recovery key...">
                                                  <div class="btn-group">
                                                      <button class="btn" tabindex="-1">Enviar</button>
                                                  </div>
                                                 </div>
                                                  <span class="help-inline"><?php echo form_error('recoverykey'); ?></span>
                                                <!--<span class="help-inline">Este campo é case-sensitive, cuidado. <b>A</b> é diferente de <b>a</b>.</span>-->
                                              </fieldset>
                                            </form>
                                            <?php elseif($lost == 'form_pass'): ?>
                                              <?php echo form_open('', array('class' => 'form-horizontal')); ?>
                                                <fieldset>
                                                  <legend><?php echo $this->lang->line('TEXT_CHANGER_PASSWORD'); ?></legend>
                                                  <div class="input-prepend input-append">
                                                     <label class="" for="inputEmail">Password</label>
                                                     <input name="new_pass" type="password" placeholder="<?php echo $this->lang->line('TEXT_CHANGER_PASSWORD'); ?>">
                                                      <label class="" ><?php echo form_error('new_pass'); ?></label>
                                                     <p><p>
                                                     <label class="" for="inputEmail">Confirm</label>
                                                     <input name="conf_new_pass" type="password" placeholder="Confirm your password.">
                                                    <div class="btn-group">
                                                      <button class="btn" tabindex="-1">Enviar</button>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                              </form>
                                            </div>
                                            <?php elseif($lost == 'show_acc'): ?>
                                              <fieldset>
                                                <legend>Account</legend>
                                                  <?php echo $this->lang->line('TEXT_SHOW_ACCOUNT', array($account, $this->config->item('server_name'))); ?>
                                              </fieldset>
                                            <?php endif; ?>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="TableShadowContainer">
                              <div class="TableBottomShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bm.gif);">
                                <div class="TableBottomLeftShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-bl.gif);"></div>
                                <div class="TableBottomRightShadow" style="background-image:url(<?php echo base_url().TPLLAYOUTDIR; ?>images/global/content/table-shadow-br.gif);"></div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>