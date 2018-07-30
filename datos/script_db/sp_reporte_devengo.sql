create procedure sp_reporte_devengo
@idEmpleado int,
@periodo date
as
begin
	declare @pDiaMes date;
	declare @uDiaMes date;

	set @pDiaMes = (select dateadd([month], datediff([month], '19000101', @periodo), '19000101') as primer_dia_mes);
	set @uDiaMes = (select dateadd([month], datediff([month], '18991231', @periodo), '18991231') as ultimo_dia_mes);
	
	select idDevengo, TipoDevengo, montoDevengo from rrhh_db.devengo d
	left join rrhh_db.tipodevengo td
	on d.TipoDevengo_idTipoDevengo=td.idTipoDevengo
	where Empleado_idEmpleado = @idEmpleado 
	and fechaDevengo between @pDiaMes and @uDiaMes
end


