create trigger tr_in_departamento
on rrhh_db.departamento
after insert
as
begin
declare @user varchar(20)
declare @idD int, @idA int

set @user = (select SUSER_SNAME())
set @idD = (select top 1 idDepartamento from rrhh_db.departamento order by idDepartamento desc)

if(select count(*) from inserted i) > 0
	begin
		insert into rrhh_db.auditoria (usuarioAuditoria, fechaHora, accion, tabla, registroNro)
		 select @user, GETDATE(), 'INSERT', 'departamento', @idD
		 from inserted

		 set @idA = (select top 1 idAuditoria from rrhh_db.auditoria order by idAuditoria desc)
		
		insert into rrhh_db.detalleauditoria (Auditoria_idAuditoria, nombreColumna, antiguaDescripcion, nuevaDescripcion)
		select @idA, 'nombreDepartamento', '', i.nombreDepartamento from inserted i
	end
end
