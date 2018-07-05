<div id="eliminarEmpleadoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="border-radius: 3px;">
            <form id="eliminarDepartamento">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Empleado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <span>Estás a punto de eliminar a
                            <span id="d-msg" class="badge badge-danger" style="font-size: 80%"></span>
                            de forma permanente de la lista de empleados.
                            <br>Estás seguro de continuar?
                        </span>
                        <input type="hidden" name="txtNombreEmpleado" id="name">
                        <input type="hidden" name="txtIdEmpleado" id="id">
                        <input type="hidden" id="opcion" name="opcion" value="eliminar">
                    </div>
<!--                    <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>-->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No, Cancelar">
                        <input id="eliminar-dpto" type="submit" class="btn btn-danger" value="Si, Eliminar">
                    </div>
            </form>
        </div>
    </div>
</div>
