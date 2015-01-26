<html>
<head>
	
</head>
	<body>
		<form action="test1.php" method="post">
		Nombre: <input type="text" name="nombre" />
		Apellido: <input type="text" name="apellido" />
		<input type="submit" name="enviar" value="Enviar" />
		</form>

		<form action="test2.php" enctype="multipart/form-data" method="post">
		<label for="file">Fichero:</label> <input id="file" type="file" name="file" />
		<input type="submit" name="submit" value="Enviar" />
		</form>
	</body>
</html>