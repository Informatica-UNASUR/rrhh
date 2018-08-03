create procedure sp_reporte_salario
@idEmpleado int,
@periodo date
as
begin
	declare @pDiaMes date;
	declare @uDiaMes date;

	set @pDiaMes = (select dateadd([month], datediff([month], '19000101', @periodo), '19000101') as primer_dia_mes);
	set @uDiaMes = (select dateadd([month], datediff([month], '18991231', @periodo), '18991231') as ultimo_dia_mes);
	
	select idEmpleado, nombre +' '+ apellido as empleado, periodoPago, tipo = 'Salario' , salario 
	from rrhh_db.nominapago n
	inner join rrhh_db.empleado e
	on n.Empleado_idEmpleado=e.idEmpleado
	where Empleado_idEmpleado = @idEmpleado 
	and periodoPago between @pDiaMes and @uDiaMes
end


