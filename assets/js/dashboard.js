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

if( document.getElementById('btn_update_account') != null ) 
{
	document.getElementById('btn_update_account').addEventListener('click',update_account);
}

// Activacion Funcionalidad de la Tabla de Usuarios
if( document.getElementById('users_table') != null ) 
{
	$('#users_table').DataTable({
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
}


function click_editar_cuenta (e) {
	
	e.path.map(function(revisado){
		if(revisado.className=='btn btn-primary btn-link btn-sm custom_edit')
		{			
			document.getElementById("edit_id").value=revisado.getAttribute('data-id');
			document.getElementById("edit_name").value=revisado.getAttribute('data-name');
			document.getElementById("edit_last_name").value=revisado.getAttribute('data-last-name');
			document.getElementById("edit_email").value=revisado.getAttribute('data-email');
			document.getElementById("edit_phone").value=revisado.getAttribute('data-telefono');
		}
	});

	$('#loginModal').modal();
}

function confirm_delete_account(){
	Swal.fire({
	  title: '<strong>Quieres ELIMINAR esta cuenta?</strong>',
	  type: 'info',
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
	});
}

function update_account(e){
	console.log(document.getElementById("edit_id").value);
	console.log(document.getElementById("edit_name").value);
	console.log(document.getElementById("edit_last_name").value);
	console.log(document.getElementById("edit_email").value);
	console.log(document.getElementById("edit_phone").value);
	console.log('update_account');
	var btn = e.target;
	
	btn.style.display = "none";
	
	document.getElementById("progress_update_edit").style.display="";

	setTimeout(function (){ 
		btn.style.display = "";
		document.getElementById("progress_update_edit").style.display="none";
		sweetAlert('Excelente','Los datos fueros actualizados correctamente...','success');

	 },3000);

	//$('#loginModal').modal('hide');
}