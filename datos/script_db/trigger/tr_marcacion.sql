create trigger trg_asistencia
	on rrhh_db.marcacion
	for insert
	as
	begin
		if(select count(*) from inserted i) > 0
		begin
			-- declaramos variables a utilizar de inserted
			declare @fecha date
			declare @idEmpleado int
			declare @horaEntrada time(0)
			declare @horaSalida time(0)
			declare @horaEntrada2 time(0)

			set @fecha = (select fecha from inserted)
			set @idEmpleado = (select Empleado_idEmpleado from inserted)
			set @horaEntrada = (select horaEntrada from inserted)
			set @horaSalida = (select horaSalida from inserted)
			set @horaEntrada2 = (select horaEntrada2 from inserted)

			-- Si no marco en todo el dia se registra en ausencia
			if(select count(*) from inserted i 
			where horaEntrada = '00:00' and horaEntrada2 = '00:00') > 0
			begin
				-- Verificar si hay solicitud
				if(select dbo.verificarSolicitud(@fecha,@idEmpleado)) > 0
				begin
					insert into rrhh_db.ausencia(
						fechaAusencia,
						motivo,							
						justificado,
						fechaJustificado,
						Empleado_idEmpleado
					)
					select
						@fecha,
						motivo,
						1,
						fechaRegistro,
						Empleado_idEmpleado
					from rrhh_db.solicitud
					where Empleado_idEmpleado = @idEmpleado and 
					@fecha between fechaDesde and fechaHasta
				end
				else -- si no hay solicitud
				begin
					insert into rrhh_db.ausencia(fechaAusencia, justificado, Empleado_idEmpleado)
					values (@fecha, 0, @idEmpleado)
				end
			end
			-- Si llego 15min tarde se registra en retraso
			else if(select count(*) from inserted i 
			where horaEntrada > '08:00' and horaEntrada < '08:16') > 0
			begin
				insert into rrhh_db.retraso(fechaRetraso, horaLlegada, Empleado_idEmpleado)
				values (@fecha,@horaEntrada,@idEmpleado)
			end
			-- Si llego pasada las 08:15 se registra en permiso (llegada tardia sin tolerancia)
			else if(select count(*) from inserted i 
			where horaEntrada > '08:15') > 0
			begin
				-- Verificar si hay solicitud
				if(select dbo.verificarSolicitud(@fecha,@idEmpleado)) > 0
				begin
					insert into rrhh_db.permisoparcial( 
						fechaPermiso,
						motivo,
						horaInicio,
						horaFin,
						justificado,
						fechaJustificado,
						Empleado_idEmpleado
					)
					select
						@fecha,
						motivo,
						'08:00',
						@horaEntrada,
						1,
						fechaRegistro,
						@idEmpleado
					from rrhh_db.solicitud
					where Empleado_idEmpleado = @idEmpleado and 
					@fecha between fechaDesde and fechaHasta 
				end
				else -- si no hay solicitud
				begin
					insert into rrhh_db.permisoparcial(fechaPermiso, horaInicio, horaFin, justificado, Empleado_idEmpleado)
					values (@fecha, '08:00', @horaEntrada, 0, @idEmpleado)
				end
			end
			-- Si salio antes de las 17:00 se registra en permiso (retiro antes de horario)
			else if(select count(*) from inserted i 
			where horaSalida < '17:00' and horaEntrada2 = '00:00') > 0
			begin
				-- Verificar si hay solicitud
				if(select dbo.verificarSolicitud(@fecha,@idEmpleado)) > 0
				begin
					insert into rrhh_db.permisoparcial( 
						fechaPermiso,
						motivo,
						horaInicio,
						horaFin,
						justificado,
						fechaJustificado,
						Empleado_idEmpleado
					)
					select
						@fecha,
						motivo,
						@horaSalida,
						'17:00',
						1,
						fechaRegistro,
						@idEmpleado
					from rrhh_db.solicitud
					where Empleado_idEmpleado = @idEmpleado and 
					@fecha between fechaDesde and fechaHasta 
				end
				else -- si no hay solicitud
				begin
					insert into rrhh_db.permisoparcial(fechaPermiso, horaInicio, horaFin, justificado, Empleado_idEmpleado)
					values (@fecha, @horaSalida, '17:00', 0, @idEmpleado)
				end
			end
			-- Si marco horaEntrada2 se registra en permiso (permiso dentro de horario laboral)
			else if(select count(*) from inserted i 
			where horaEntrada2 != '00:00') > 0
			begin
				-- Verificar si hay solicitud
				if(select dbo.verificarSolicitud(@fecha,@idEmpleado)) > 0
				begin
					insert into rrhh_db.permisoparcial( 
						fechaPermiso,
						motivo,
						horaInicio,
						horaFin,
						justificado,
						fechaJustificado,
						Empleado_idEmpleado
					)
					select
						@fecha,
						motivo,
						@horaSalida,
						@horaEntrada2,
						1,
						fechaRegistro,
						@idEmpleado
					from rrhh_db.solicitud
					where Empleado_idEmpleado = @idEmpleado and 
					@fecha between fechaDesde and fechaHasta 
				end
				else -- si no hay solicitud
				begin
					insert into rrhh_db.permisoparcial(fechaPermiso, horaInicio, horaFin, justificado, Empleado_idEmpleado)
					values (@fecha, @horaSalida, @horaEntrada2, 0, @idEmpleado)
				end
			end
		end
	end