create trigger tr_up_cargo
on rrhh_db.cargo
after update
as
begin
declare @user varchar(20)
declare @idD int, @idA int

set @user = (select SUSER_SNAME())
set @idD = (select top 1 idCargo from rrhh_db.cargo order by idCargo desc)

if(select count(*) from inserted i) > 0
	begin
		insert into rrhh_db.auditoria (usuarioAuditoria, fechaHora, accion, tabla, registroNro)
		 select @user, GETDATE(), 'UPDATE', 'cargo', @idD
		 from inserted

		 set @idA = (select top 1 idAuditoria from rrhh_db.auditoria order by idAuditoria desc)
		
		insert into rrhh_db.detalleauditoria (Auditoria_idAuditoria, nombreColumna, antiguaDescripcion, nuevaDescripcion)
		select @idA, 'nombreCargo', d.nombreCargo, i.nombreCargo from inserted i, deleted d
	end
end
