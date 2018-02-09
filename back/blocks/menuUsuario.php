<ul class="nav pull-right">
    <li>
    <a href="#tutorial" role="button" data-toggle="modal"><i class="icon-question-sign"></i></a>
    </li>
	<li class="dropdown">
		<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?=$System->Usuario('nombre')?> <?=$System->Usuario('apellidos')?><i class="caret"></i>

		</a>
		<ul class="dropdown-menu">
			<li>
				<a tabindex="100" href="usuarios.php?editaru=<?=$System->Usuario('id')?>">Configuración</a>
			</li>
			<li class="divider"></li>
			<li>
				<a tabindex="100" href="?accionad=salir">Desconectarse</a>
			</li>
		</ul>
	</li>
</ul>
