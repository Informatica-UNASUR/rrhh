-- Actualiza usuario
CREATE procedure [dbo].[sp_actualizar_usuario]
@idUsuario int,
@usuario varchar(20),
@estado bit,
@idRol int
as
begin
	UPDATE rrhh_db.usuario SET usuario = @usuario, estado = @estado WHERE idUsuario = @idUsuario
	UPDATE rrhh_db.usuariorol SET Rol_idRol = @idRol WHERE Usuario_idUsuario = @idUsuario
end
