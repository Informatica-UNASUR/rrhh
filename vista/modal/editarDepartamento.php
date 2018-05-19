<div id="editarDepartamentoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
<!--            <form name="edit_product" id="edit_product">-->
            <form id="editarDepartamento" action="editarDepartamento.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Departamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del departamento</label>
                        <input type="text" name="txtNombreDepartamento"  id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdDepartamento" id="edit_id" >
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
            </form>
        </div>
    </div>
</div>
