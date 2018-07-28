create procedure sp_registrar_empleado
@nombre varchar(30),
@apellido varchar(30),
@ci varchar(15),
@fechaNac date,
@sexo char(1),
@tel varchar(10),
@dir nvarchar(50),
@email varchar(30),
@cuenta int,
@nac varchar(14),
@horario int,
@estadoCivil int,
@contrato int,
@salario int,
@fechaInicio date,
@cargo int,
@dpto int
as
begin
	declare @idEmpleado int
	insert	rrhh_db.empleado(nombre, apellido, ci, fechaNacimiento, sexo, telefono, direccion, email, 
							 numCuenta, nacionalidad, estado, Horario_idHorario, EstadoCivil_idEstadoCivil, Contrato_idContrato)
	values (@nombre, @apellido, @ci, @fechaNac, @sexo, @tel, @dir, @email, @cuenta, @nac, 1, @horario, @estadoCivil, @contrato)

	set @idEmpleado = (select top 1 idEmpleado from rrhh_db.empleado order by idEmpleado desc)

	insert rrhh_db.empleadocargo(Empleado_idEmpleado, Cargo_idCargo, Departamento_idDepartamento, salarioFijo, fechaAsume)
	values (@idEmpleado, @cargo, @dpto, @salario, @fechaInicio)
end
