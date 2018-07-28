create procedure sp_agregar_deduccion
@idEmpleado int,
@idTipoDeduccion int,
@montoDeduccion decimal,
@fecha varchar(10),
@obsDeduccion varchar(45)
as
begin
	set @fecha = (select convert(varchar(10), @fecha, 103));
	insert	rrhh_db.deduccion(Empleado_idEmpleado, TipoDeduccion_idTipoDeduccion, montoDeduccion, fechaDeduccion, observacion)
	values (@idEmpleado, @idTipoDeduccion, @montoDeduccion, @fecha, @obsDeduccion)
end
