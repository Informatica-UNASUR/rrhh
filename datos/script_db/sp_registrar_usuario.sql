-- Agregar usuario
CREATE procedure [dbo].[sp_registrar_usuario]
@usuario varchar(20),
@contrasenha varchar(255),
@estado bit,
@idRol int
as
begin
	declare @idUsuario int;
	declare @fechaAlta varchar(10);
	set @fechaAlta = (select convert(varchar(10), getdate(), 103));
	insert	rrhh_db.usuario (usuario, password, fechaAlta, estado)
	values (@usuario, @contrasenha, @fechaAlta, @estado)

	set @idUsuario = (select top 1 idUsuario from rrhh_db.usuario order by idUsuario desc)
	insert rrhh_db.usuariorol (Usuario_idUsuario, Rol_idRol)
	values (@idUsuario, @idRol)
end
