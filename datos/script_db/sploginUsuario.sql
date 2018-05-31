create procedure [dbo].[login_usuario]
	@usuario varchar(20),
	@password varchar(255)
as
begin
	SELECT * FROM rrhh_db.usuario u
	inner join rrhh_db.usuariorol ur
	on u.idUsuario=ur.Usuario_idUsuario
	where usuario = @usuario and password = @password;
end
GO