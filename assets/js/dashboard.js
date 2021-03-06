

addEventToEdit();
var keyClickBtnUpdate=null;


if( document.getElementById('btn_update_account') != null ) 
{
	document.getElementById('btn_update_account').addEventListener('click',update_account);
}

if( document.getElementById('contenedor_adduser') != null ) 
{
	document.getElementById('contenedor_adduser').addEventListener('click',create_new_account);
}

if( document.getElementById('btn_register_account') != null ) 
{
	document.getElementById('btn_register_account').addEventListener('click',register_new_account);
}

// Activacion Funcionalidad de la Tabla de Usuarios
if( document.getElementById('users_table') != null ) 
{
	var table = $('#users_table').DataTable({
		"order": [0,'desc'],
		"columnDefs": [
		    { "orderable": false, "targets": 6 }
		  ],
		"language": {
		    "decimal":        "",
    		"emptyTable":     "No hay datos disponibles en tabla",
		    "info": 		  "Mostrando pagina _PAGE_ de _PAGES_",
		    "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
		    "infoFiltered":   "(filtrado de _MAX_ entradas totales)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "Mostrando _MENU_ entradas",
		    "loadingRecords": "Cargando...",
		    "processing":     "Procesando...",
		    "search":         "Buscar:",
		    "zeroRecords":    "No se encontraron coincidencias",
		    "paginate": {
		        "first":      "Frimero",
		        "last":       "Último",
		        "next":       "Próximo",
		        "previous":   "Previo"
		    },
		    "aria": {
		        "sortAscending":  ": acrivar a orden de columna ascendente",
		        "sortDescending": ": acrivar a orden de columna descendente"
		    }
		  }
	});

	// Sort by column 0 and then re-draw
	table.order( [ 0, 'desc' ] ).draw();

	table.on( 'draw.dt', function () {
    	console.log( 'Table redrawn' );
    	addEventToEdit();
	} );
}

function register_new_account(){
	
	var cant_roles =document.getElementsByClassName('check_role').length;
	var ctr=0;
	var existe_check=false;
	var rol=null;
	for(var ctr=0;cant_roles>ctr;ctr++){
		console.log(document.getElementsByClassName('check_role').item(ctr));
		console.log(document.getElementsByClassName('check_role').item(ctr).checked);
		console.log(document.getElementsByClassName('check_role').item(ctr).getAttribute("id"));
		if(document.getElementsByClassName('check_role').item(ctr).checked==true ){ 
			existe_check=true;
			rol=document.getElementsByClassName('check_role').item(ctr).value;
			console.log('R:'+document.getElementsByClassName('check_role').item(ctr).value);
		 }
	}
	console.log('register_new_account');
	var some_invalid = false;
	if(!existe_check){
		some_invalid = true;
		sweetAlert('Oops','Lo Sentimos pero ... <br>Usted debe seleccionar un Rol para poder registrar.','error');
		return -1;
	}
	if(document.getElementById("register_name").value.trim() == ""){
		some_invalid = true;
		sweetAlert('Oops. [nombre] esta VACIO','Lo Sentimos pero ... <br>Usted no puede dejar en campo de nombre VACIO.','error');
		return -1;
	}
	if(document.getElementById("register_last_name").value.trim() == ""){
		some_invalid = true;
		sweetAlert('Oops. [apellido] esta VACIO','Lo Sentimos pero ... <br>Usted no puede dejar en campo de apellido VACIO.','error');
		return -1;
	}
	if(document.getElementById("register_email").value.trim() == ""){
		some_invalid = true;
		sweetAlert('Oops. [email] esta VACIO','Lo Sentimos pero ... <br>Usted no puede dejar en campo de email VACIO.','error');
		return -1;
	}
	if(document.getElementById("register_username").value.trim() == ""){
		some_invalid = true;
		sweetAlert('Oops. [username] esta VACIO','Lo Sentimos pero ... <br>Usted no puede dejar en campo de nombre de usuario VACIO.','error');
		return -1;
	}
	if(document.getElementById("register_password").value.trim() == ""){
		some_invalid = true;
		sweetAlert('Oops. [password] esta VACIO','Lo Sentimos pero ... <br>Usted no puede dejar en campo de password VACIO.','error');
		return -1;
	}
	//si no hay nada invalido ahora si registro
	if(!some_invalid){
		var current_date=new Date(); 
		if(current_date.getMonth()<10){ var mm="0"+current_date.getMonth(); }else{ var mm=current_date.getMonth(); }
		if(current_date.getDate()<10){ var dd="0"+current_date.getDate(); }else{ var dd=current_date.getDate(); }
		
		current_date=current_date.getFullYear()+'-'+mm+'-'+dd;
		
		var acc={
					name: document.getElementById("register_name").value.trim(),
	               	last_name:document.getElementById("register_last_name").value.trim() ,
	               	email: document.getElementById("register_email").value.trim(),
	               	phone: document.getElementById("register_phone").value.trim(),
	               	username: document.getElementById("register_username").value.trim(),
	               	date: current_date,
           			password: document.getElementById("register_password").value.trim(),
           			rolid: rol,
           			avatar: ""
           		};

		$.ajax({
				           type: "POST",
				           url: base_url+"users/add",
				           dataType: "json",
				           success: function (msg){
				           	console.log(msg);

				           	$('#registerModal').modal('hide');
							sweetAlert('Excelente','La cuenta ha sido REGISTRADA corectamente','success').then((o)=>{
								window.location=base_url+'welcome';
								return 1;
							});

				           },
				           data:acc
				       });
	}
}

function create_new_account(){
	console.log('create_new_account');
	$('#registerModal').modal();
}

function addEventToEdit(){

	if( document.getElementsByClassName('custom_edit') != null ) 
	{
		var elementos = document.getElementsByClassName('custom_edit');
		var cantidad_items = elementos.length;
		var control = 0;
		while( control<cantidad_items )
		{
			elementos.item(control).addEventListener('click',click_editar_cuenta);
			control++;
		}
	}
}

function click_editar_cuenta (e) {
	
	e.path.map(function(revisado){
		if(revisado.className=='btn btn-primary btn-link btn-sm custom_edit')
		{			
			console.log(revisado.parentNode.parentNode);
			console.log( 'Key:'+revisado.getAttribute('data-key') );
			keyClickBtnUpdate=revisado.getAttribute('data-key');
			
			document.getElementById("avatar_edit").setAttribute('src',revisado.getAttribute('data-avatar'));
			document.getElementById("edit_id").value=revisado.getAttribute('data-id');
			document.getElementById("edit_name").value=revisado.getAttribute('data-name');
			document.getElementById("edit_last_name").value=revisado.getAttribute('data-last-name');
			document.getElementById("edit_email").value=revisado.getAttribute('data-email');
			document.getElementById("edit_phone").value=revisado.getAttribute('data-telefono');
		}
	});

	$('#loginModal').modal();
}

function confirm_delete_account(evt){

				           	console.log(evt);
	Swal.fire({
	  title: '<strong>Quieres ELIMINAR esta cuenta?</strong>',
	  type: 'warning',
	  html:
	    'Si <b>confirma</b>, ' +
	    'se eliminara de forma permanente',
	  showCloseButton: true,
	  showCancelButton: true,
	  focusConfirm: false,
	  confirmButtonText:
	    '<i class="fa fa-trash"></i> Confirmar',
	  confirmButtonAriaLabel: 'Thumbs up, great!',
	  cancelButtonText:
	    '<i class="fa fa-times"></i> Cancelar',
	  cancelButtonAriaLabel: 'Thumbs down',
	}).then(function(resp){

		if(resp!=undefined && resp.value)
		{
			console.log(evt.getAttribute('data-id'));
	           	// BORRAR CUENTA
	           	 $.ajax({
				           type: "POST",
				           url: base_url+"users/remove",
				           dataType: "json",
				           success: function (msg){
				           	console.log(msg);
				           },
				           data:{id:evt.getAttribute('data-id')}
				       });
	           	 //CIERRE DE BORRAR CUENTA
			console.log('confirmado para eliminar');
			evt.parentNode.parentNode.remove();
		}

	});
}

function send_data_up_acc(acc)
{
	var url = base_url + 'users/update';
	var data = acc;

	return fetch(url, {
	  method: 'POST',
	  body: JSON.stringify(data), // data can be `string` or {object}!
	  headers:{
	    'Content-Type': 'application/json'
	  }
	});
}

function update_account(e){
	console.log(document.getElementById("edit_id").value);
	console.log(document.getElementById("edit_name").value);
	console.log(document.getElementById("edit_last_name").value);
	console.log(document.getElementById("edit_email").value);
	console.log(document.getElementById("edit_phone").value);
	
	var account = {
					'id': 		document.getElementById("edit_id").value,
					'name': 	document.getElementById("edit_name").value,
	               	'last_name':document.getElementById("edit_last_name").value,
	               	'email': 	document.getElementById("edit_email").value ,
	               	'phone': 	document.getElementById("edit_phone").value 
	};

	console.log('update_account');
	var btn = e.target;
	
	btn.style.display = "none";
	
	document.getElementById("progress_update_edit").style.display="";

  $.ajax({
           type: "POST",
           url: base_url+"users/update",
           dataType: "json",
           success: function (msg) {
               if (msg) {
               	document.getElementById("cr_name_" + keyClickBtnUpdate ).innerHTML=account.name+' '+account.last_name;
               	btn.style.display = "";
				document.getElementById("progress_update_edit").style.display="none";
				sweetAlert('Excelente','Los datos fueros actualizados correctamente...','success');
               } else {
                   alert("Lo sentimos Ocurrio un error al insertar !");
               }
           },

           data: account
       });
/* 
var cuentas = [];
  $.ajax({
           type: "GET",
           url: "https://randomuser.me/api/?results=5&?password=special,1-16",
           dataType: "json",
           success: function (msg) {
           	msg.results.map(function(u){

           		console.log('name ' + u.name.first);
           		console.log('apellido ' + u.name.last);
           		console.log('email ' + u.email);
           		console.log('usuario ' + u.login.username);
           		console.log('telefono ' + u.phone);
           		console.log('fecha reg. ' + u.registered.date.substr(0,10));
           		console.log('password ' + u.login.password);
           		console.log('Rol id ' + getRandomArbitrary(1,3));
           		
           		var account={
					name: u.name.first,
	               	last_name:u.name.last,
	               	email: u.email,
	               	phone: u.phone,
	               	username: u.login.username,
	               	date: u.registered.date.substr(0,10) ,
           			password: u.login.password,
           			rolid: getRandomArbitrary(1,3),
           			avatar: u.picture.large
           		};
           		cuentas.push(account);


           		console.log(u);
           		console.log('----------------------');

           	});     
           	console.log(cuentas);

           	cuentas.map(function(acc){
	           	// REGISTRAR CUENTA
	           	 $.ajax({
				           type: "POST",
				           url: base_url+"users/add",
				           dataType: "json",
				           success: function (msg){
				           	console.log(msg);
				           },
				           data:acc
				       });
	           	 //CIERRE DE REGISTRAR CUENTA
           	});
          }
       });
*/
	////////////////////


	
	/*
	send_data_up_acc(account)
	.then(res => res.json())
	.catch(error => console.error('Error:', error))
	.then((response) => {
	
		console.log('Success:', response)	
		btn.style.display = "";
		document.getElementById("progress_update_edit").style.display="none";
		sweetAlert('Excelente','Los datos fueros actualizados correctamente...','success');
	
	});
	setTimeout(function (){ 

	 },2000);*/

}
	// Pendiente para el llenado de Usuarios de Pruebas
	// https://randomuser.me/api/?results=200&?password=special,1-16

	/* 
		$.ajax({
		  url: 'https://randomuser.me/api/?results=200&?password=special,1-16',
		  dataType: 'json',
		  success: function(data) {
		    console.log(data);
		  }
		});
	*/
// Retorna un número aleatorio entre min (incluido) y max (excluido)
function getRandomArbitrary(min, max) {
  return parseInt(Math.random() * (max - min) + min);
}