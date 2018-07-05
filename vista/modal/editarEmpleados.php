<div id="editarEmpleadoModal2" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editarEmpleado">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Empleado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <br>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos básicos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Datos Laborales</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <br><div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nombre</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtNombre"  id="edit_name" class="form-control" placeholder="Ingrese el nombre del empleado" required>
                                <input type="hidden" name="txtIdUsuario" id="edit_id" >
                                <input type="hidden" id="opcion" name="opcion" value="modificar">
                            </div>
                            <label class="col-sm-1 col-form-label">Apellido</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtApellido"  id="edit_ape" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">CI</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtCi"  id="edit_ci" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Sexo</label>
                            <div class="col-sm-4">
                                <select name="cbSexo" id="edit_sexo" class="custom-select">
                                    <option value="" selected disabled>--Selecciona--</option>
                                    <option value="m">Masculino</option>
                                    <option value="f">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Cumpleanos</label>
                            <div class="col-sm-4">
                                <input type="text" name="fechaNac"  id="edit_fecha" class="form-control">
                            </div>
                            <label class="col-sm-1 col-form-label">Telefono</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtTelefono"  id="edit_telefono" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Direccion</label>
                            <div class="col-sm-9">
                                <textarea name="txtDireccion"  id="edit_direccion" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="txtEmail"  id="edit_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Cuenta bancaria</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtCtaBanco"  id="edit_cta" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Nac.</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtNacionalidad"  id="edit_nacionalidad" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <br><div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Horario</label>
                            <div class="col-sm-9">
                                <select name="cbHorario" id="edit_horario" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarHorarios();
                                    while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                        echo '<option value="'.$fila['idHorario'].'">'.'ENTRADA: '.$fila['horaEntrada'].'/SALIDA: '.$fila['horaSalida'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Estado civil</label>
                            <div class="col-sm-9">
                                <select name="cbCivil" id="edit_civil" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarEstadoCivil();
                                    while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                        echo '<option value="'.$fila['idEstadoCivil'].'">'.$fila['estadoCivil'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Contrato</label>
                            <div class="col-sm-9">
                                <select name="txtContrato" id="edit_contrato" class="custom-select">
                                    <?php
                                    $r = EmpleadoControlador::mostrarContratos();
                                    while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                        echo '<option value="'.$fila['idContrato'].'">'.$fila['tipoContrato'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Fecha ingreso</label>
                            <div class="col-sm-4">
                                <input type="text" name="txtFechaIn"  id="edit_ingreso" class="form-control" required>
                            </div>
                            <label class="col-sm-1 col-form-label">Antiguedad</label>
                            <div class="col-sm-4">
<!--                                <input type="text" name="txtAntiguedad"  id="edit_antiguedad" class="form-control" required>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Departamento</label>
                            <div class="col-sm-9">
                                <select name="cbDepartamento" id="edit_dpto" class="form-control">
                                    <?php
                                    $r = EmpleadoControlador::mostrarDepartamentos();
                                    while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                        echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Cargo</label>
                            <div class="col-sm-9">
                                <select id="edit_cargo" class="form-control">
                                    <?php
                                    $r = EmpleadoControlador::mostrarCargos();
                                    while(($fila = sqlsrv_fetch_array($r)) != NULL) {
                                        echo '<option value="'.$fila['idCargo'].'">'.$fila['nombreCargo'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Guardar datos">
                </div>
            </form>
        </div>
    </div>
</div>