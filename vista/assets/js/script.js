		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {
								"action":"ajax",
								"page":page,
								'query':query,
								'per_page':per_page
							};
			/*$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listarEmpleados.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})*/
		}
		$('#editarDepartamentoModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal

		  var nombreDepartamento = button.data('name');
		  $('#edit_name').val(nombreDepartamento);
            //alert(nombreDepartamento);

          var id = button.data('id');
		  $('#edit_id').val(id)
		  //alert('El ID es: '+id);
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

          var id = button.data('id');
		  $('#edit_id').val(id);
		  //alert('El ID es: '+id);
		});

        $('#eliminarUsuarioModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var nombreUsuario = button.data('name');
            $('#name').val(nombreUsuario);

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