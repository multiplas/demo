				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                    
                    
                     <div class="row-fluid">
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Personalizar iconos Redes Sociales</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
                                                                    <form action="iconosRedes.php?IconosR=true" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
                                        <div>
										<legend>Iconos Redes</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="facebook">Facebook
                                             <?php
                                                    if ($elemento['facebookIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['facebookIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['facebookIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=facebook">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="facebook" name="facebook" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="twitter">Twitter
                                            <?php
                                                    if ($elemento['twitterIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['twitterIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['twitterIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=twitter">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="twitter" name="twitter" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <div class="control-group">
                                            <label class="control-label" for="gplus">Google Plus
                                            <?php
                                                    if ($elemento['gplusIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['gplusIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['gplusIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=gplus">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="gplus" name="gplus" type="file">
                                                    
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <div class="control-group">
                                            <label class="control-label" for="pinterest">Pinterest
                                            <?php
                                                    if ($elemento['pinterestIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['pinterestIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['pinterestIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=pinterest">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?></label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="pinterest" name="pinterest" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <div class="control-group">
                                            <label class="control-label" for="instagram">Instagram
                                            <?php
                                                    if ($elemento['instagramIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['instagramIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['instagramIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=instagram">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="instagram" name="instagram" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <div class="control-group">
                                            <label class="control-label" for="youtube">Youtube
                                            <?php
                                                    if ($elemento['youtubeIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['youtubeIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['youtubeIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=youtube">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="youtube" name="youtube" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <div class="control-group">
                                            <label class="control-label" for="linkedin">LinkedIn
                                            <?php
                                                    if ($elemento['linkedinIcon'] != null)
                                                    {
                                                       ?>
                                                        <br>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../iconosRedes/<?=$elemento['linkedinIcon']?>" target="_blank">
                                                            <img style="max-width: 40px; max-height: 40px;" src="../iconosRedes/<?=$elemento['linkedinIcon']?>">
                                                        </a>
                                                        <br>
                                                        <a style="color: red; font-size: 0.70rem;" href="iconosRedes.php?EIR=linkedin">Eliminar</a>
                                                       <?php
                                                    }
                                                    ?>
                                            </label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="linkedin" name="linkedin" type="file">
                                            <br><br>
                                            </div>
                                        </div>
                                                                                
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        
                                        </div>
                                        
                                        
                                        
                                                                             
                                        
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                        <script type="text/javascript">
	
                            
	
		               </script>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>