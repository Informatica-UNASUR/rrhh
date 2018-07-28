create procedure sp_mostrar_nomina
@idEmpleado int,
@periodo date
as
begin
	declare @pDiaMes date;
	declare @uDiaMes date;
	declare @salario decimal(10,0);
	declare @totalDeduccion decimal(10,0);
	declare @totalDevengo decimal(10,0);
	declare @totalPercibido decimal(10,0);

	set @pDiaMes = (select dateadd([month], datediff([month], '19000101', @periodo), '19000101') as primer_dia_mes);
	set @uDiaMes = (select dateadd([month], datediff([month], '18991231', @periodo), '18991231') as ultimo_dia_mes);

	set @totalDeduccion = (select sum(montoDeduccion) as [Total deduccion] from rrhh_db.deduccion
						   where fechaDeduccion between @pDiaMes and @uDiaMes
					       and Empleado_idEmpleado = @idEmpleado)
	set @totalDevengo = (select sum(montoDevengo) as [Total devengo] from rrhh_db.devengo
						where fechaDevengo between @pDiaMes and @uDiaMes
						and Empleado_idEmpleado = @idEmpleado)

	set @salario = (select top 1 salarioFijo from rrhh_db.empleadocargo where Empleado_idEmpleado = @idEmpleado)

	if (@totalDeduccion is null) set @totalDeduccion = 0;
	if (@totalDevengo is null) set @totalDevengo = 0;

	set @totalPercibido = @salario+ISNULL(@totalDevengo, 0) - isnull(@totalDeduccion, 0);

	select @idEmpleado as idEmpleado ,@salario as Salario ,@totalDeduccion as Deduccion, @totalDevengo as Devengo, @totalPercibido as TotalPercibido
end


