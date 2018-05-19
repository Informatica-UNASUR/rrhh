<div id="editarUsuarioModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="border-radius: 3px;">
            <form id="editarUsuario" action="editarUsuario.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del Usuario</label>
                        <input type="text" name="txtNombreUsuario"  id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdUsuario" id="edit_id" >
                    </div>
                    <div class="form-group">
                        <label>Fecha de alta</label>
                        <input type="text" name="txtFechaAlta"  id="edit_fecha" class="form-control" required>
                    </div>
                    <label for="estado">Estado</label>
                    <div class="input-group">
                        <select class="custom-select" name="txtEstado" id="edit_estado">
                            <option selected>Selecciona</option>
                            <option value="1">Activado</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
            </form>
        </div>
    </div>
</div>
