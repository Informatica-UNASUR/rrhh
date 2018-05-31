		$('#editarDepartamentoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal

		  var nombreDepartamento = button.data('name');
		  $('#edit_name').val(nombreDepartamento);
            //alert(nombreDepartamento);

          var id = button.data('id');
		  $('#edit_id').val(id)
		  //alert('El ID es: '+id);
		});

        $('#eliminarDepartamentoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var nombreDepartamento = button.data('name');
            $('#name').val(nombreDepartamento);

            var id = button.data('id');
            $('#id').val(id);
        });

		$('#editarRolModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal

		  var nombreRol = button.data('name');
		  $('#edit_name').val(nombreRol);
            //alert(nombreDepartamento);

          var descripcion = button.data('desc');
          $('#edit_desc').val(descripcion);

          var id = button.data('id');
		  $('#edit_id').val(id)
		  //alert('El ID es: '+id);
		});

		$('#editarUsuarioModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal

		  var nombreUsuario = button.data('name');
		  $('#edit_name').val(nombreUsuario);
            //alert(nombreDepartamento);

          var fecha = button.data('fecha');
          $('#edit_fecha').val(fecha);

          var estado = button.data('estado');
          $('#edit_estado').val(estado);

          var rol = button.data('rol');
          $('#edit_rol').val(rol);

          var id = button.data('id');
		  $('#edit_id').val(id);
		  //alert('El rol es: '+rol);
		});

        $('#eliminarUsuarioModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var nombreUsuario = button.data('name');
            $('#name').val(nombreUsuario);

            var id = button.data('id');
            $('#id').val(id);
        });

        $('#editarCargoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var nombreCargo = button.data('name');
            $('#edit_name').val(nombreCargo);
            //alert(nombreCargo);

            var id = button.data('id');
            $('#edit_id').val(id)
            //alert('El ID es: '+id);
        });

        $('#eliminarCargoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var nombreCargo = button.data('name');
            $('#name').val(nombreCargo);

            var id = button.data('id');
            $('#id').val(id);
        });


        //
		// $('#deleteProductModal').on('show.bs.modal', function (event) {
		//   var button = $(event.relatedTarget) // Button that triggered the modal
		//   var id = button.data('id')
		//   $('#delete_id').val(id)
		// })
		//
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});


        $('#nuevoUsuario').validate({
            rules: {
                txtUsuario: 'required',
                txtPassword: 'required',
                txtRol: 'required'
            },

            messages: {
                'txtUsuario': '<span class="text-danger">Falta completar el nombre del usuario \n<span>',
                'txtPassword': '<span class="text-danger">Falta completar la contrasena del usuario \n<span>',
                'txtRol': '<span class="text-danger">Falta completar el rol para el usuario \n<span>'
            }
        });//end validate
