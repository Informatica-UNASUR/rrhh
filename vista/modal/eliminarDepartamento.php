<div id="eliminarDepartamentoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="border-radius: 3px;">
            <form id="eliminarDepartamento" action="eliminarDepartamento.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Departamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>¿Esta seguro que desea eliminar este departamento?</label>
                        <input type="text" name="txtNombreDepartamento" id="name" class="form-control" readonly>
                        <input type="hidden" name="txtIdDepartamento" id="id">
                    </div>
                    <br>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Eliminar">
                    </div>
            </form>
        </div>
    </div>
</div>
