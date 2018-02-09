<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/functions.module');
require_once('system/herramientas/functions-confirmar-tabla.php');	
	
$System = new MySystem("BD_CLIENTE");
$SystemTableCMSBase = new MyTableCMSBase(NULL);
$SystemTableCliente = new MyTableCliente("BD_CLIENTE");
$System->ControlDeSesiones();

//Llamado personalizado

	//Buscar actualizaciones en todas las tablas de la base de datos
	if(isset($_POST['comprobarsql'])){
	$cont_actualizar=0;
	$alert_actualizar = ver_tablas_comparar($SystemTableCMSBase,$SystemTableCliente);
		foreach ($alert_actualizar as $alertTabla ) {
			if($alertTabla['actualizada']==TRUE) 
			$cont_actualizar++;
		}
		if($cont_actualizar>0){
		enviar_mail_actualizar($System,$alert_actualizar);
		}
		else{
		$alert_actualizar=FALSE;
		}
	}
	//S�lo buscar actualizaciones en la tabla de usuarios
	else if(basename($_SERVER['PHP_SELF'])=='usuarios.php'){
	$ntabla='bd_users';
	$tipo_consulta='';
	$alert_actualizar[$ntabla]['actualizada'] = ver_tabla_idividual('bd_users',$SystemTableCMSBase,$SystemTableCliente,$tipo_consulta);
	
		if($alert_actualizar[$ntabla]['actualizada']['status']==TRUE){
			$alert_actualizar[$ntabla]['mensaje']="$ntabla";
			enviar_mail_actualizar($System,$alert_actualizar);
		}
	}

			function ver_tablas_comparar($SystemTableCMSBase,$SystemTableCliente){
                $max_fechas = $SystemTableCliente->getMaxFechas();
				$tablas_ejemplo = $SystemTableCliente->ListarTablasCliente();
                $tablas_locales = $SystemTableCMSBase->ListarTablasCMSBase($max_fechas);
				$logitud_tabla_local=count($tablas_locales);
				$logitud_tabla_ejemplo=count($tablas_ejemplo);
                $tipo_consulta='cms_base';
					foreach ($tablas_locales as $ntabla ) {
						$alert_act=FALSE;
                        $alert_actualizar_prov=FALSE;
						$i++;
						$alert_actualizar_prov = ver_tabla_idividual($ntabla,$SystemTableCMSBase,$SystemTableCliente,$tipo_consulta);

						if($alert_actualizar_prov) {
                            $alert_actualizar[$ntabla]['actualizada']= $alert_actualizar_prov;
                            if ($alert_actualizar[$ntabla]['actualizada'] == TRUE)
                                $alert_actualizar[$ntabla]['mensaje'] = "$ntabla";
                            else
                                $alert_actualizar[$ntabla]['mensaje'] = "";
                        }
					}
                    $tipo_consulta='cms_cliente';
					foreach ($tablas_ejemplo as $ntabla ) {
						$alert_act=FALSE;
                        $alert_actualizar_prov=FALSE;
						$i++;
                        $alert_actualizar_prov = ver_tabla_idividual($ntabla,$SystemTableCMSBase,$SystemTableCliente,$tipo_consulta);
                        if($alert_actualizar_prov) {
                            $alert_actualizar[$ntabla]['actualizada']= $alert_actualizar_prov;
                            if ($alert_actualizar[$ntabla]['actualizada'] == TRUE)
                                $alert_actualizar[$ntabla]['mensaje'] = "$ntabla";
                            else
                                $alert_actualizar[$ntabla]['mensaje'] = "";
                        }
					}
			return $alert_actualizar;
			}
            //Función para revisar cada tabla de la base de datos de forma indicidual
			function ver_tabla_idividual($tabla,$SystemTableCMSBase,$SystemTableCliente,$tipo_consulta){
                $i=0;
                $moment_tabla_a_recorrer=array();
                $moment_tabla_run=array();
				//Comprobando estructura de cada tabla
				$estructura_tabla = $SystemTableCMSBase->ComprobarEstructuraTabla($tabla);
				//Creando array de ejemplo de tablas bd cliente para comparar
				$array_tabla_ejemplo = $SystemTableCliente->ArrayTablaUsuario($tabla);
                //Obteniendo longitud de tablas
                $logitud_tabla_local=count($estructura_tabla);
                $logitud_tabla_ejemplo=count($array_tabla_ejemplo);

                //Si se hace una consulta a una tabla perteneciente a la base de datos del CMS base
                if($tipo_consulta=='cms_base'){
                    $estructura_tabla_run = $estructura_tabla;
                    $tabla_a_recorrer = $array_tabla_ejemplo;
                }
                //Si se hace una consulta a una tabla perteneciente a la base de datos del CMS del cliente
                else{
                    $estructura_tabla_run = $array_tabla_ejemplo;
                    $tabla_a_recorrer = $estructura_tabla;
                }
                //Recorriendo la tabla seleccionada
				foreach ($estructura_tabla_run as $item ) {
    					if(!in_array($item, $tabla_a_recorrer)) {
                            $alert_actualizar['status'] = TRUE;
                            $existe=FALSE;
                            $it2=0;
                            $pos=false;
                            if($tipo_consulta=='cms_base'){
                                $alert_actualizar['tabla_cms_base'][] = $item;
                                foreach($tabla_a_recorrer as $t2){
                                    if(strcmp($item['Field'],$t2['Field'])==0){
                                        $existe=TRUE;
                                        $pos=$it2;
                                    }
                                    $it2++;
                                }
                                if($existe == TRUE){
                                    $alert_actualizar['tabla_cms_cli'][] = $tabla_a_recorrer[$pos];
                                    $tabla_a_recorrer[$pos]{'status'}='encontrado';
                                    $estructura_tabla_run[$i]{'status'}='encontrado';
                                }
                                else {
                                    $alert_actualizar['tabla_cms_cli'][] = array('status_campo' => 'agregado', 'Field' => 'El campo <b>"' . $item['Field'] . '"</b> ha sido agregado (aparecerá entre los campos "nuevos")', 'Type' => '', 'Null' => '', 'Key' => '', 'Default' => '', 'Extra' => '');
                                    $tabla_a_recorrer[$pos]{'status'}='encontrado';
                                }
                            }
                            else{
                                $alert_actualizar['tabla_cms_cli'][] = $item;
                                foreach($tabla_a_recorrer as $t2){
                                    if(strcmp($item['Field'],$t2['Field'])==0){
                                        $existe=TRUE;
                                        $pos=$it2;
                                    }
                                    $it2++;
                                }
                                if($existe == TRUE){
                                    $alert_actualizar['tabla_cms_base'][] = $tabla_a_recorrer[$pos];
                                        $tabla_a_recorrer[$pos]{'status'}='encontrado';
                                        $estructura_tabla_run[$i]{'status'}='encontrado';
                                }
                                else {
                                        $alert_actualizar['tabla_cms_base'][] = array('status_campo' => 'eliminado', 'Field' => 'El campo <b>"' . $item['Field'] . '"</b> ha sido eliminado o su nombre fué modificado (puede que aparezca entre los campos "nuevos")', 'Type' => '', 'Null' => '', 'Key' => '', 'Default' => '', 'Extra' => '');
                                        $tabla_a_recorrer[$pos]{'status'}='encontrado';
                                }
                            }
    					}
                    $i++;
				}

                //filtrando arrays (CMS cliente y CMS base) para descartar elementos "existentes" o "modificados" en las tablas de la base de datos
                foreach ($estructura_tabla_run as $item2) {
                    if($item2['status']!='encontrado')
                        $moment_tabla_run[]=$item2;
                }
                foreach ($tabla_a_recorrer as $item) {
                    if($item['status']!='encontrado')
                        $moment_tabla_a_recorrer[]=$item;
                }
                //Mostrando el resto de los elementos (los eliminados o agregados) de las tablas de las bases de datos
                foreach ($moment_tabla_a_recorrer as $item ) {
                    if(!in_array($item, $moment_tabla_run)) {
                        if($tipo_consulta=='cms_base'){
                            $alert_actualizar['tabla_cms_cli'][] = $item;
                            $alert_actualizar['tabla_cms_base'][] = array('status_campo' => 'eliminado','Field' => ' eliminado', 'Type' => '', 'Null' => '', 'Key' => '', 'Default' => '', 'Extra' => '');
                        }
                        else{
                            $alert_actualizar['tabla_cms_base'][] = $item;
                            $alert_actualizar['tabla_cms_cli'][] = array('status_campo' => 'agregado', 'Field' => 'El campo <b>"' . $item['Field'] . '"</b> ha sido agregado o existía y su nombre fué modificado',  'Type' => '', 'Null' => '', 'Key' => '', 'Default' => '', 'Extra' => '');
                        }
                    }
                }

			    //Comparando longitud de las tablas de las bases de datos
				if($logitud_tabla_local > $logitud_tabla_ejemplo || $logitud_tabla_local < $logitud_tabla_ejemplo)
				$alert_actualizar{'status'}=TRUE;
				return $alert_actualizar;
			}
			//Función para enviar email con la información de los cambios realizados en la base de datos del CMS base, cob respecto al CMS del cliente
			function enviar_mail_actualizar($System,$alert_actualizar){
			//Enviando email de notficaci�n a soporte
				$para="soporte@camaltec.es";
				
				$asunto="Notificacion de actualizacion de tablas"; 
				$mensajeE="<h3>Las siguientes tablas necesitan ser actualizadas:</h3><br><br>";

				foreach ($alert_actualizar as $alertTabla ) {
					if($alertTabla['actualizada']==TRUE){
					$mensajeE.="- ".$alertTabla['mensaje']."<br>";
					}
				}

				$mensajeE.="<br><br><br>Por favor ponerse en contacto con la web <b>".$_SERVER['SERVER_NAME']."</b> para coordinar dicha actualizacion.";
				$envio_mail= $System->EnviarEmail($para, $asunto, $mensajeE);
			}
?>