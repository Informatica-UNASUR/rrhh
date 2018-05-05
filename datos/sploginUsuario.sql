create procedure login_usuario
	@usuario varchar(20),
	@password varchar(50)
as
begin
	select idUsuario, usuario, password, fechaAlta, estado 
	from rrhh_db.usuario 
	where usuario = @usuario and password = @password;
end