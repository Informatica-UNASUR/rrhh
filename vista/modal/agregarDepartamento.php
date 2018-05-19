<div id="agregarDepartamentoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="nuevoDepartamento" action="registroDepartamento.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Departamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del departamento</label>
                        <input type="text" name="txtNombreDepartamento"  id="nombreDepartamento" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
        </div>
    </div>
</div>
