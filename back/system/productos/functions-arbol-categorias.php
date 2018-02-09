<?php
class Tree extends Conexion
{
private $_elements = array();

        public function __construct($cnst_dbn){
            parent::__construct($cnst_dbn);
        }

		function get()
		{	
			//Funci�n para obtener categorias
			$sql = "SELECT id as idcat, categoria,idpadre, (SELECT COUNT(id) FROM bd_categorias WHERE idpadre=idcat) as have_childrens FROM bd_categorias";
			$query = mysqli_query($this->conexion, $sql);

			$this->_elements["masters"] = $this->_elements["childrens"] = array();
			
			if(mysqli_num_rows($query) > 0)
			{
				while ($element = mysqli_fetch_assoc($query))
				{
					if(is_null($element["idpadre"])) //si la categor�a no posee "idpadre" es porque es una categoria principal
					{
					array_push($this->_elements["masters"],$element);
					}
					else //si la categor�a posee "idpadre" es porque es una sub-categor�a
					{
					array_push($this->_elements["childrens"],$element);
					}
				}
			}

			return $this->_elements;
		}

		public static function nested($rows = array(), $parent_id = NULL, $elemento = array())
		{ 
				
			//funci�n recursiva para mostrar sub-categor�as
			$html = "";
			if(!empty($rows))
			{
				$html.="<ul style='display:none;'>";
				foreach($rows as $row)
				{
					if($row["have_childrens"]>0) //evaluando si la sub-categor�a posee alg�n hijo
					{
						$have_childrens=1;
					}
					else
					{
						$have_childrens=0;
					}
					if($row["idpadre"] == $parent_id) //si la sub-categoria es hija de la categor�a actual, se muestra
					{
						$html.="<li style='margin: 5px 0px'>";
						if($row["idcat"] == $elemento['idcat'] || $row["idcat"] == $elemento['idcat2'] || $row["idcat"] == $elemento['idcat3'] || $row["idcat"] == $elemento['idcat4'] || $row["idcat"] == $elemento['idcat5'])
							$html.="<input class='form-check-input checkbox-cat' type='checkbox' name='categoria[]' value='".$row["idcat"]."' checked>";
						else
							$html.="<input class='form-check-input checkbox-cat' type='checkbox' name='categoria[]' value='".$row["idcat"]."'>";
						$html.="<a href='#' data-status='$have_childrens' style='margin: 5px 6px' class='btn btn-default btn-xs btn-folder'><i id='carpeta-hijo".$icathijo."' class='fa fa-folder'></i> ";
						if($have_childrens == 1) //si la sub-categoria tiene alg�n hijo se muestra el �cono de (+) para indicar que hay mas elementos por desplegar
							$html.="<span class='fa fa-plus-circle'></span>";
						$html.="".$row["categoria"]."</a>";
						$html.=self::nested($rows, $row["idcat"],$elemento);
						$html.="</li>";
					}
					
				}
				$html.="</ul>";
			}
			return $html;
		}

}