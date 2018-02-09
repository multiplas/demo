				<?php require_once('blocks/cabecera.php'); ?>

 <?php if($resultadosfeed) { 
                $file = fopen("feed/blog.xml", "w");
                fwrite($file, '<?xml version="1.0" encoding="utf-8"?>'. PHP_EOL);
                fwrite($file, '<rss version="2.0">'. PHP_EOL);
                fwrite($file, '<channel>'. PHP_EOL);
                fwrite($file, '<title>Blog</title>'. PHP_EOL);
                for($i = 0; $i <= count($resultadosfeed)-1; $i++){
                    fwrite($file, '<item>'. PHP_EOL);
                    fwrite($file, '<title>'.$resultadosfeed[$i]['nombre'].'</title>'. PHP_EOL);
                    fwrite($file, '<description><![CDATA[<img align="left" hspace="8" width="200px" src="http://atrezza.es/'.$basexml.'imagenes/'.$resultadosfeed[$i]['imagen'].'"/>]]>'.$resultadosfeed[$i]['contenido'].'</description>'. PHP_EOL);
                    fwrite($file, '<link>http://atrezza.es/'.$basexml.'es/blog</link>'. PHP_EOL);
                    fwrite($file, '<pubDate>'.date("Y-m-d H:i:s", strtotime($resultadosfeed[$i]['fecha'])).'</pubDate>'. PHP_EOL);
                    fwrite($file, '</item>'. PHP_EOL);
                }
                fwrite($file, '</channel>'. PHP_EOL);
                fwrite($file, '</rss>');
                fclose($file);
                $resultaop = 1;
            }
                
            ?>


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
                    
                    <script>
                        function cambiarpestana(valor){
                            
                            if(valor == '1'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                    }
                                ?>
                                document.getElementById("1").style.display='block';
                                document.getElementById("p1").classList.add('active'); 
                                 
                            }else if(valor == '2'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 2){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '3'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 3){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '4'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 4){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '5'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 5){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '6'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 6){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '7'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 7){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }else if(valor == '8'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 8){
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("p<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("1").style.display='none';
                                document.getElementById("p1").classList.remove('active');  
                            }
                        }
                    </script>
                    
                    <script>
                        function cambiarpestana2(valor){
                            
                            if(valor == '1'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                    }
                                ?>
                                document.getElementById("e1").style.display='block';
                                document.getElementById("pe1").classList.add('active'); 
                                 
                            }else if(valor == '2'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 2){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '3'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 3){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '4'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 4){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '5'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 5){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '6'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 6){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '7'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 7){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }else if(valor == '8'){
                                <?php
                                foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma[id] == 8){
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='block';
                                            document.getElementById("p<?=$idioma[id]?>").classList.add('active'); 
                                        <?php
                                        }else{
                                        ?>
                                            document.getElementById("e<?=$idioma[id]?>").style.display='none';
                                            document.getElementById("pe<?=$idioma[id]?>").classList.remove('active'); 
                                        <?php
                                        }
                                    }
                                ?>
                                document.getElementById("e1").style.display='none';
                                document.getElementById("pe1").classList.remove('active');  
                            }
                        }
                    </script>
                    
                     <div class="row-fluid">
                        <div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Entrada</div>
                            </div>
                            <div class="block-content collapse in">
                                <ul class="nav nav-tabs nav-justified">
                                  <li id="p1" class="active" ><a onclick="javascript:cambiarpestana('1')" href="#">General - Español</a></li>                         
                                    <?php
                                        foreach ($idiomas AS $idioma)
                                        {
                                            ?>
                                                <li id="p<?=$idioma[id]?>" ><a href="#" onclick="javascript:cambiarpestana('<?=$idioma[id]?>')"><?=$idioma['nombre']?></a></li>
                                            <?php
                                        }
                                    ?>
                                    </ul>
                                <div class="span12">
                                    <form action="noticias.php?accion=subirnot" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div id="1">
                                          <fieldset>
                                            <legend>Nueva Entrada</legend>
                                            <div class="control-group">
                                              <label class="control-label" for="ntitulo">Título </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="ntitulo" name="titulo" placeholder="Título de la página" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="TitleS">Title SEO </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="TitleS" name="TitleS" placeholder="Título SEO">
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="DescriptionS">Description SEO </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="DescriptionS" name="DescriptionS" placeholder="Descripción SEO">
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="KeyS">Key SEO </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="KeyS" name="KeyS" placeholder="Key SEO">
                                              </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="nfileInput">Imagen</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="nfileInput" name="imagennoticia" type="file">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="ncategoria1">Categoría</label>
                                              <div class="controls">
                                                <select id="ncategoria1" name="categoria1" class="chzn-select span4" required>
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosCat AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="ncontenido">Contenido</label>
                                            </div>
                                            <div class="control-group">
                                              
                                                <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                              
                                            </div>
                                            <button type="submit" class="btn btn-primary">Publicar</button>
                                            <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                          </fieldset>
                                        </div>
                                        <?php
                                    foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma['id'] == 2){
                                            ?>
                                                <div id="2" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Inglés</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo2" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido2" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 3){
                                            ?>
                                                <div id="3" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Alemán</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo3" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido3" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 4){
                                            ?>
                                                <div id="4">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Francés</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo4" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido4" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 5){
                                            ?>
                                                <div id="5" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Italiano</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo5" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido5" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 6){
                                            ?>
                                                <div id="6" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Portugués</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo6" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido6" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>                                                    
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 7){
                                            ?>
                                                <div id="7" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Catalán</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo7" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido7" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 8){
                                            ?>
                                                <div id="8" style="display:none;">
                                                  <fieldset>
                                                    <legend>Nueva Entrada Ruso</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ntitulo">Título </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="ntitulo" name="titulo8" placeholder="Título de la página" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                    </div>
                                                     <div class="control-group">
                                                        <textarea id="ncontenido" name="contenido8" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                    
                                    }
                                ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
						<?php if (@$elemento != null && $resultaop != 1) { ?>
                     <div class="row-fluid">
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar una Entrada</div>
								</div>
								<div class="block-content collapse in">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li id="pe1" class="active" ><a onclick="javascript:cambiarpestana2('1')" href="#">General - Español</a></li> 
                                        <?php
                                        foreach ($idiomas AS $idioma)
                                        {
                                            ?>
                                                <li id="pe<?=$idioma[id]?>" ><a href="#" onclick="javascript:cambiarpestana2('<?=$idioma[id]?>')"><?=$idioma['nombre']?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
									<div class="span12">
										<form action="noticias.php?editarn=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div id="e1">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
											<div class="control-group">
											  <label class="control-label" for="titulo">Título </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo" name="titulo" placeholder="Título de la página" value="<?=$elemento['nombre']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="TitleS">Title SEO </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="TitleS" name="TitleS" placeholder="Título SEO" value="<?=$elemento['tituloS']?>">
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="control-group">
                                                                                            <label class="control-label" for="DescriptionS">Description SEO </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="DescriptionS" name="DescriptionS" placeholder="Descripción SEO" value="<?=$elemento['descripcionS']?>">
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="control-group">
                                                                                            <label class="control-label" for="KeyS">Key SEO </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="KeyS" name="KeyS" placeholder="Key SEO" value="<?=$elemento['keyS']?>">
                                                                                            </div>
                                                                                          </div>
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Imagen</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" name="imagennoticia" type="file">
                                                    <?php
                                                    if ($elemento['imagen'] != null)
                                                    {
                                                       ?>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../imagenes/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                       <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Imagen Portada</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" name="imagennoticia" type="file">
                                                    <?php
                                                    if ($elemento['imagen'] != null)
                                                    {
                                                       ?>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../imagenes/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                       <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria1">Categoría</label>
                                              <div class="controls">
                                                <select id="categoria1" name="categoria1" class="chzn-select span4" required>
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosCat AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat'] ? ' selected' : ''?>><?=$listado['nombre']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
											<div class="control-group">
											  <label class="control-label" for="contenido">Contenido</label>
                                                                                        </div>
                                                                                        <div class="control-group">
												<textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido']?></textarea>
											  </div>
											
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
										  </fieldset>
                                        </div>
                                            
                                            <?php
                                                        //echo "hola";
                                            foreach ($idiomas AS $idioma)
                                            {
                                                $cont = 0;
                                                   foreach ($idiomasprod AS $idiomam)
                                                    {
                                                       
                                                       if($idioma['iniciales'] == $idiomam['idioma']){
                                                           $cont = 1;
                                            ?>  
                                                        <div id="e<?=$idioma['id']?>" style="display:none;">
                                                          <fieldset>
                                                            <legend>Editar <?=$elemento['nombre']?> en <?=$idioma['nombre']?></legend>
                                                            <div class="control-group">
                                                              <label class="control-label" for="nnombre">Nombre </label>
                                                              <div class="controls">
                                                                <input type="text" class="span6" id="nnombre" name="titulo<?=$idioma['id']?>" placeholder="Titulo del post" value="<?=$idiomam['nombre']?>">
                                                                <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                                              </div>
                                                            </div>
                                                            <div class="control-group">
                                                              <label class="control-label" for="ncontenido">Contenido</label>
                                                            </div>
                                                               <div class="control-group">
                                                                <textarea id="ncontenido" name="contenido<?=$idioma['id']?>" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$idiomam['descripcion']?></textarea>
                                                              </div>
                                                            
                                                          </fieldset>
                                                        </div>
                                            <?php
                                                       }
                                                    }
                                                    if($cont == 0){
                                                    ?>
                                                        <div id="e<?=$idioma['id']?>" style="display:none;">
                                                          <fieldset>
                                                            <legend>Editar <?=$elemento['nombre']?> en <?=$idioma['nombre']?></legend>
                                                            <div class="control-group">
                                                              <label class="control-label" for="nnombre">Nombre </label>
                                                              <div class="controls">
                                                                <input type="text" class="span6" id="nnombre" name="titulo<?=$idioma['id']?>" placeholder="Titulo del post" value="">
                                                                <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                                              </div>
                                                            </div>
                                                            <div class="control-group">
                                                              <label class="control-label" for="ncontenido">Contenido</label>
                                                            </div>
                                                            <div class="control-group">
                                                                <textarea id="ncontenido" name="contenido<?=$idioma['id']?>" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                              </div>
                                                            
                                                          </fieldset>
                                                        </div>
                                            <?php
                                                    }
                                            }
                                            ?>
                                            
										</form>
									</div>
								</div>
							</div>
                        </div>
						<?php } ?>
                     <div class="row-fluid">
                        <!-- block -->
                         
                         <script>
                            $(document).ready(function () {
                                var data_id = '';
                                var data_name = '';
                                
                                $('.open-Modal').click(function () {
                                    
                                    //alert('error 00');
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id = $(this).data('id');
                                        data_name = $(this).data('name');
                                        //alert('valor: ' + $(this).data('id'));
                                    }
                                    //$('#id-elemento').text(data_id);
                                    $('#elemento').text(data_name);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminarn=" + data_id;
                                    location.href = url;
                                })
                                
                            });
                        </script>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR POST</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el post "<strong><span id="elemento"></span></strong>"?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                         
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Entradas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Crear Entrada <i class="icon-plus icon-white"></i></button></a>
                                      </div><br><br>
                                      
                                      <div class="btn-group">
                                         <a href="noticias.php?accion=feedB"><button class="btn btn-success">Feed Blog<i class="icon-plus icon-white"></i></button></a>
                                       </div><br><br>
                                      
                                      <form action="noticias.php?accion=actnblog" method="post" class="form-horizontal">
                                          <div>
                                              Nombre: <input id="nblog" name="nblog" value="<?=$nombre['nblog']?>"> <input type="submit" value="Guardar" class="btn btn-success">
                                            <br>
                                          </div>
                                       </form>
                                       <?php foreach ($actblog AS $blog) { ?>
                                       
                                       <form action="noticias.php?accion=actblog" method="post" class="form-horizontal">
                                          <div>
                                            <select id="blog" name="blog" onchange="this.form.submit();">
                                                <option value="1" <?=($blog['blog'] == 1 ? ' selected' : '')?>>Blog activado en menú</option>
                                                <option value="0" <?=($blog['blog'] == 0 ? ' selected' : '')?>>Blog desactivado en menú</option>
                                            </select><br>
                                          </div>
                                       </form>
                                       <?php
                                        if($blog['blog'] == 1){ 
                                            foreach ($actblogin AS $blogin) {
                                       ?>
                                       <form action="noticias.php?accion=actblogin" method="post" class="form-horizontal">
                                          <div>
                                            <select id="blog" name="blogin" onchange="this.form.submit();">
                                                <option value="1" <?=($blogin['blogin'] == 1 ? ' selected' : '')?>>Publicaciones inicio activado</option>
                                                <option value="0" <?=($blogin['blogin'] == 0 ? ' selected' : '')?>>Publicaciones inicio desactivado</option>
                                            </select><br>
                                          </div>
                                       </form>
                                       
                                       <?php } ?>
                                        <form action="noticias.php?accion=tipomegablog" method="post" class="form-horizontal">
                                           <div>
                                             <select id="MM_blog" name="MM_blog" onchange="this.form.submit();">
                                                 <option value="0" <?=($configuracionP['MM_blog'] == 0 ? ' selected' : '')?>>Blog -> 4-columns</option>
                                                 <option value="1" <?=($configuracionP['MM_blog'] == 1 ? ' selected' : '')?>>Blog -> 3-columns</option>
                                                 <option value="2" <?=($configuracionP['MM_blog'] == 2 ? ' selected' : '')?>>Blog -> 2-columns</option>
                                                 <option value="3" <?=($configuracionP['MM_blog'] == 3 ? ' selected' : '')?>>Blog -> Article-list</option>
                                             </select><br>
                                           </div>
                                        </form>
                                        <?php } } ?>
                                      <!--<div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>-->
                                   </div>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Título</th>
													<th>Publicado</th>
													<th>Fecha</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['nombre']?></td>
															<td><?=$listado['visible'] == 1 ? 'publicada' : 'oculto'?></td>
															<td><?=date_format(date_create($listado['fecha']), 'd/m/Y H:i')?></td>
															<td style="text-align: center;">
																<a href="?estadon=<?=$listado['id']?>"><?=$listado['visible'] == 1 ? '<i style="color: gren;" class="fa fa-eye fa-lg"></i>' : '<i style="color: gray;" class="fa fa-eye-slash fa-lg"></i>'?></a>
																<a href="?editarn=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                                                                                <a href="imagenes_blog.php?imagenesblog=<?=$listado['id']?>"><i style="color: orange;" class="fa fa-picture-o fa-lg"></i></a>
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['nombre']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarn=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la noticia \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay páginas!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>