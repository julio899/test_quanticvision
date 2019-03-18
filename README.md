# Test Skill from QuanticVision 

Autor : Julio Vinachi

![alt text](https://previews.dropbox.com/p/thumb/AAXlQYZHoS5WZqwa43cNF6btTwrRL8XlJ5pQ7Q4wP635WCu7iSV3JRwVSeVGTjSGmPPj3DwyNOUU_Ny9cHMeKj75MFEw38eCjOPY7DSu9ZiKzzITBEmdAUr_Uf8Ly2K3ZI9BdL2l7pyy3kzR6OK9AUDocGuUQSaLOpAmf7sIXlQF8EY88u-wjNU-EfsbawHn2FYnBMEO2K2_J8IilIKcX-6hTEh4-va6z_Bw4Xfyo1wCN54EDjVH0vycONZOhzVA5X0nKACH_VLxeQS6ftcPcru11p7qmgGmfp5gklJ0hKn33w/p.png?size=1280x960&size_mode=3 "ScreenShop")
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
# Configurar la URL donde se estara Ejecutando
	en el archivo /application/config/config.php
	$config['base_url'] = 'http://localhost/quanticvision/';


# Preferiblemente tener activo el mod_rewrite en Apache
	para la deteccion del .htaccess y buen trabajo de las Rutas