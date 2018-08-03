create procedure sp_reporte_deduccion
@idEmpleado int,
@periodo date
as
begin
	declare @pDiaMes date;
	declare @uDiaMes date;

	set @pDiaMes = (select dateadd([month], datediff([month], '19000101', @periodo), '19000101') as primer_dia_mes);
	set @uDiaMes = (select dateadd([month], datediff([month], '18991231', @periodo), '18991231') as ultimo_dia_mes);
	
	select idDeduccion, tipoDeduccion, montoDeduccion from rrhh_db.deduccion d
	inner join rrhh_db.tipodeduccion tp
	on d.TipoDeduccion_idTipoDeduccion=tp.idTipoDeduccion
	where Empleado_idEmpleado = @idEmpleado 
	and fechaDeduccion between @pDiaMes and @uDiaMes
end


