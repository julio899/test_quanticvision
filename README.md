# Test Skill from QuanticVision 

Autor : Julio Vinachi

![alt text](https://julio899.github.io/perfil/img/screenshot.png "ScreenShop")
## Requerimientos

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

	'''Cuenta de Prueba'''
	* user: julio899
	* pass: vinachi89

# Configurar la URL donde se estara Ejecutando
	en el archivo /application/config/config.php
	$config['base_url'] = 'http://localhost/quanticvision/';


# Preferiblemente tener activo el mod_rewrite en Apache
	para la deteccion del .htaccess y buen trabajo de las Rutas
