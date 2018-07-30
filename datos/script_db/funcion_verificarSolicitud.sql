create function verificarSolicitud(@fecha date, @idEmpleado int)
returns bit
as
begin
	declare @result bit
	if(select count(*) from rrhh_db.solicitud 
	where Empleado_idEmpleado = @idEmpleado and	
	@fecha between fechaDesde and fechaHasta) > 0
		set @result	= 1
	else
		set @result	= 0
	return @result
end

select dbo.verificarSolicitud()