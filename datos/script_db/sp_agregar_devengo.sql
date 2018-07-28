alter procedure sp_agregar_devengo
@idEmpleado int,
@idTipoDevengo int,
@montoDevengo decimal,
@fecha varchar(10),
@obsDevengo varchar(45)
as
begin
	set @fecha = (select convert(varchar(10), @fecha, 103));
	insert	rrhh_db.devengo(Empleado_idEmpleado, TipoDevengo_idTipoDevengo, montoDevengo, fechaDevengo, observacion)
	values (@idEmpleado, @idTipoDevengo, @montoDevengo, @fecha, @obsDevengo)
end
