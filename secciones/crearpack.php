<div id="contenido">
	<div id="articulo">
		<h2>Crea tu pack</h2>
		<p>Elije tus productos, dale un nombre y una descripción y guarda este pack para poder comprarlo</p><br />
		<form action="<?=$draizp?>/acc/crearpack" method="post">
			<input type="text" id="nombre" name="nombre" class="dobleF" placeholder="Nombre pack" value="" required><br />
			<textarea type="text" id="descripcion" class="dobleF" name="descripcion" placeholder="descripcion del pack" value="" required></textarea><br />
			<label>Selecciona hasta 10 productos diferentes para el pack</label><br />
			<label>Producto 1: </label>
			<select name="art[]" class="dobleF" required>
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 2: </label>
			<select name="art[]" class="dobleF" required>
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 3: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 4 </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 5: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 6: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 7: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 8: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 9: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select>
			<label>Producto 10: </label>
			<select name="art[]" class="dobleF">
				<option value="" selected>Selecciona el articulo</option>
				<?php
					foreach($productos as $producto)
						echo "<option value=".$producto['id'].">".$producto['nombre']."</option>";
				?>
			</select><br>
			<input type="submit" class="button" value="Crear pack" />
		</form>
	</div>
</div>