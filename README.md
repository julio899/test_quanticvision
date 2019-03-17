# Test Skill from Quanticvision 

Autor : Julio Vinachi
	
''' Requerimientos

		- PHP 7.2 o superior
		- Entorno de Desarrollo Usado (LAMP)

		* Server version: Apache/2.4.3
		* MySQL Server version: 5.7.21-1 (Debian)

# Configuracion de conexion a BD
	en el archivo 
	/application/config/database.php
	
	'hostname' => 'localhost',
	'username' => '',
	'password' => '',
	'database' => '',

	dbdriver implementado ->  mysqli
# Configurar la URL donde se estara Ejecutando
	en el archivo /application/config/config.php
	$config['base_url'] = 'http://localhost/quanticvision/';


# Preferiblemente tener activo el mod_rewrite en Apache
	para la deteccion del .htaccess y buentrabajo de las Rutas