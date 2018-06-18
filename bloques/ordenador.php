<div id="ordenar">
	Ordenar por:&nbsp;
	<select id="OrdenarPor" name="OrdenarPor">
		<option value="fea"<?=@($_SESSION['OrdenarPor'] == 'fea') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'fea' ? 'selected' : '') : '')?>>Fecha (Nuevos primero)</option>
		<option value="fed"<?=@($_SESSION['OrdenarPor'] == 'fed') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'fed' ? 'selected' : '') : '')?>>Fecha (Antiguos primero)</option>
		<option value="def"<?=@($_SESSION['OrdenarPor'] == 'def') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'def' ? 'selected' : '') : '')?>>Relevancia</option>
		<option value="rel"<?=@($_SESSION['OrdenarPor'] == 'rel') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'rel' ? 'selected' : '') : '')?>>Más visitados</option>
		<option value="noa"<?=@($_SESSION['OrdenarPor'] == 'noa') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'noa' ? 'selected' : '') : '')?>>Nombre (Ascendente)</option>
		<option value="nod"<?=@($_SESSION['OrdenarPor'] == 'nod') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'nod' ? 'selected' : '') : '')?>>Nombre (Descendente)</option>
		<option value="pra"<?=@($_SESSION['OrdenarPor'] == 'pra') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'pra' ? 'selected' : '') : '')?>>Precio (Más barato primero)</option>
		<option value="prd"<?=@($_SESSION['OrdenarPor'] == 'prd') ? ' selected' : ($_SESSION['OrdenarPor'] == '' ? ($Empresa['ordenacion'] == 'prd' ? 'selected' : '') : '')?>>Precio (Más caro primero)</option>
	</select>
</div>