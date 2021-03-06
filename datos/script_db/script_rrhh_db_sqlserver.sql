USE [rrhh_db_dev]
GO
/****** Object:  Schema [rrhh_db]    Script Date: 22/4/2018 20:09:07 ******/
CREATE SCHEMA [rrhh_db]
GO
/****** Object:  Table [rrhh_db].[auditoria]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[auditoria](
	[idAuditoria] [int] IDENTITY(1,1) NOT NULL,
	[usuarioAuditoria] [varchar](20) NULL,
	[fechaHora] [datetime2](0) NOT NULL,
	[accion] [varchar](6) NULL,
	[tabla] [varchar](10) NULL,
	[registroNro] [int] NOT NULL,
 CONSTRAINT [PK_auditoria_idAuditoria] PRIMARY KEY CLUSTERED 
(
	[idAuditoria] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[ausencia]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[ausencia](
	[idAusencia] [int] IDENTITY(1,1) NOT NULL,
	[fechaAusencia] [date] NOT NULL,
	[motivo] [varchar](30) NULL,
	[observacion] [varchar](100) NULL,
	[justificado] [bit] NULL,
	[fechaJustificado] [date] NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_ausencia_idAusencia] PRIMARY KEY CLUSTERED 
(
	[idAusencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[cargo]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[cargo](
	[idCargo] [int] IDENTITY(1,1) NOT NULL,
	[nombreCargo] [varchar](30) NOT NULL,
 CONSTRAINT [PK_cargo_idCargo] PRIMARY KEY CLUSTERED 
(
	[idCargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[contrato]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[contrato](
	[idContrato] [int] IDENTITY(1,1) NOT NULL,
	[tipoContrato] [varchar](45) NOT NULL,
 CONSTRAINT [PK_contrato_idContrato] PRIMARY KEY CLUSTERED 
(
	[idContrato] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[deduccion]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[deduccion](
	[idDeduccion] [int] IDENTITY(1,1) NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
	[TipoDeduccion_idTipoDeduccion] [int] NOT NULL,
	[montoDeduccion] [decimal](10, 0) NOT NULL,
	[fechaDeduccion] [date] NULL,
	[observacion] [varchar](45) NULL,
 CONSTRAINT [PK_deduccion_idDeduccion] PRIMARY KEY CLUSTERED 
(
	[idDeduccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[departamento]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[departamento](
	[idDepartamento] [int] IDENTITY(1,1) NOT NULL,
	[nombreDepartamento] [varchar](30) NULL,
 CONSTRAINT [PK_departamento_idDepartamento] PRIMARY KEY CLUSTERED 
(
	[idDepartamento] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[detalleauditoria]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[detalleauditoria](
	[idDetalleAuditoria] [int] IDENTITY(1,1) NOT NULL,
	[Auditoria_idAuditoria] [int] NOT NULL,
	[nombreColumna] [varchar](30) NOT NULL,
	[antiguaDescripcion] [varchar](100) NULL,
	[nuevaDescripcion] [varchar](100) NOT NULL,
 CONSTRAINT [PK_detalleauditoria_idDetalleAuditoria] PRIMARY KEY CLUSTERED 
(
	[idDetalleAuditoria] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[devengo]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[devengo](
	[idDevengo] [int] IDENTITY(1,1) NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
	[TipoDevengo_idTipoDevengo] [int] NOT NULL,
	[montoDevengo] [decimal](10, 0) NOT NULL,
	[fechaDevengo] [date] NOT NULL,
	[observacion] [varchar](45) NULL,
 CONSTRAINT [PK_devengo_idDevengo] PRIMARY KEY CLUSTERED 
(
	[idDevengo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[empleado]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[empleado](
	[idEmpleado] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[apellido] [varchar](30) NOT NULL,
	[ci] [varchar](15) NOT NULL,
	[fechaNacimiento] [date] NOT NULL,
	[sexo] [char](1) NOT NULL,
	[telefono] [varchar](10) NULL,
	[direccion] [nvarchar](50) NULL,
	[email] [varchar](30) NULL,
	[numCuenta] [int] NULL,
	[nacionalidad] [varchar](14) NULL,
	[nombreConyuge] [varchar](50) NULL,
	[foto] [varbinary](255) NULL,
	[estado] [bit] NOT NULL,
	[Horario_idHorario] [int] NOT NULL,
	[EstadoCivil_idEstadoCivil] [int] NOT NULL,
	[Contrato_idContrato] [int] NOT NULL,
 CONSTRAINT [PK_empleado_idEmpleado] PRIMARY KEY CLUSTERED 
(
	[idEmpleado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[empleadocargo]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[empleadocargo](
	[idEmpleadoCargo] [int] IDENTITY(1,1) NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
	[Cargo_idCargo] [int] NOT NULL,
	[Departamento_idDepartamento] [int] NOT NULL,
	[salarioFijo] [int] NULL,
	[fechaAsume] [date] NOT NULL,
 CONSTRAINT [PK_empleadocargo_idEmpleadoCargo] PRIMARY KEY CLUSTERED 
(
	[idEmpleadoCargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[estadocivil]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[estadocivil](
	[idEstadoCivil] [int] IDENTITY(1,1) NOT NULL,
	[estadoCivil] [varchar](20) NOT NULL,
 CONSTRAINT [PK_estadocivil_idEstadoCivil] PRIMARY KEY CLUSTERED 
(
	[idEstadoCivil] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[hijo]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[hijo](
	[idHijo] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](30) NOT NULL,
	[apellido] [varchar](30) NOT NULL,
	[fechaNacimiento] [date] NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_hijo_idHijo] PRIMARY KEY CLUSTERED 
(
	[idHijo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[horario]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[horario](
	[idHorario] [int] IDENTITY(1,1) NOT NULL,
	[horaEntrada] [time](0) NULL,
	[horaSalida] [time](0) NULL,
 CONSTRAINT [PK_horario_idHorario] PRIMARY KEY CLUSTERED 
(
	[idHorario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[marcacion]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[marcacion](
	[idMarcacion] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [date] NOT NULL,
	[horaEntrada] [time](0) NULL,
	[horaSalida] [time](0) NULL,
	[horaEntrada2] [time](0) NULL,
	[horaSalida2] [time](0) NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_marcacion_idMarcacion] PRIMARY KEY CLUSTERED 
(
	[idMarcacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[nominapago]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[nominapago](
	[idNominaPago] [int] IDENTITY(1,1) NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
	[diasTrabajados] [int] NULL,
	[fechaPago] [date] NOT NULL,
	[periodoPago] [date] NOT NULL,
	[totalDeduccion] [decimal](10,0) not null,
	[totalDevengo] [decimal](10,0) not null,
	[salario] [decimal](10,0) not null,
	[totalPercibido] [decimal](10, 0) NOT NULL,
 CONSTRAINT [PK_nominapago_idNominaPago] PRIMARY KEY CLUSTERED 
(
	[idNominaPago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[permiso]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[permiso](
	[idPermiso] [int] IDENTITY(1,1) NOT NULL,
	[accion] [varchar](10) NOT NULL,
	[modulo] [varchar](10) NULL,
	[descripcion] [varchar](50) NULL,
	[estado] [bit] NOT NULL,
 CONSTRAINT [PK_permiso_idPermiso] PRIMARY KEY CLUSTERED 
(
	[idPermiso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[permisoparcial]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[permisoparcial](
	[idPermiso] [int] IDENTITY(1,1) NOT NULL,
	[fechaPermiso] [date] NOT NULL,
	[motivo] [varchar](45) NOT NULL,
	[horaInicio] [time](0) NULL,
	[horaFin] [time](0) NULL,
	[justificado] [bit] NULL,
	[fechaJustificado] [date] NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_permisoparcial_idPermiso] PRIMARY KEY CLUSTERED 
(
	[idPermiso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[retraso]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[retraso](
	[idRetraso] [int] IDENTITY(1,1) NOT NULL,
	[fechaRetraso] [date] NOT NULL,
	[minutos] [time](0) NULL,
	[observacion] [varchar](100) NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_retraso_idRetraso] PRIMARY KEY CLUSTERED 
(
	[idRetraso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[rol]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[rol](
	[idRol] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](15) NOT NULL,
	[descripcion] [varchar](30) NULL,
 CONSTRAINT [PK_rol_idRol] PRIMARY KEY CLUSTERED 
(
	[idRol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[rolpermiso]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[rolpermiso](
	[Rol_idRol] [int] NOT NULL,
	[Permiso_idPermiso] [int] NOT NULL
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[solicitud]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[solicitud](
	[idSolicitud] [int] IDENTITY(1,1) NOT NULL,
	[motivo] [varchar](45) NOT NULL,
	[fechaDesde] [date] NOT NULL,
	[fechaHasta] [date] NULL,
	[horaDesde] [time](0) NULL,
	[horaHasta] [time](0) NULL,
	[fechaRegistro] [date] NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
 CONSTRAINT [PK_solicitud_idSolicitud] PRIMARY KEY CLUSTERED 
(
	[idSolicitud] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[terminacionlaboral]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[terminacionlaboral](
	[idterminacionLaboral] [int] IDENTITY(1,1) NOT NULL,
	[Empleado_idEmpleado] [int] NOT NULL,
	[motivo] [varchar](45) NOT NULL,
	[fecha] [date] NOT NULL,
	[justificado] [bit] NULL,
 CONSTRAINT [PK_terminacionlaboral_idterminacionLaboral] PRIMARY KEY CLUSTERED 
(
	[idterminacionLaboral] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[tipodeduccion]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[tipodeduccion](
	[idTipoDeduccion] [int] IDENTITY(1,1) NOT NULL,
	[tipoDeduccion] [varchar](45) NOT NULL,
 CONSTRAINT [PK_tipodeduccion_idTipoDeduccion] PRIMARY KEY CLUSTERED 
(
	[idTipoDeduccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[tipodevengo]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[tipodevengo](
	[idTipoDevengo] [int] IDENTITY(1,1) NOT NULL,
	[TipoDevengo] [varchar](45) NOT NULL,
 CONSTRAINT [PK_tipodevengo_idTipoDevengo] PRIMARY KEY CLUSTERED 
(
	[idTipoDevengo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[usuario]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[usuario](
	[idUsuario] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [varchar](20) NOT NULL,
	[password] [varchar](50) NOT NULL,
	[fechaAlta] [date] NOT NULL,
	[estado] [bit] NOT NULL,
 CONSTRAINT [PK_usuario_idUsuario] PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [rrhh_db].[usuariorol]    Script Date: 22/4/2018 20:09:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [rrhh_db].[usuariorol](
	[Usuario_idUsuario] [int] NOT NULL,
	[Rol_idRol] [int] NOT NULL
) ON [PRIMARY]

GO
ALTER TABLE [rrhh_db].[ausencia] ADD  DEFAULT (NULL) FOR [justificado]
GO
ALTER TABLE [rrhh_db].[ausencia] ADD  DEFAULT (NULL) FOR [fechaJustificado]
GO
ALTER TABLE [rrhh_db].[empleadocargo] ADD  DEFAULT (NULL) FOR [salarioFijo]
GO
ALTER TABLE [rrhh_db].[horario] ADD  DEFAULT (NULL) FOR [horaEntrada]
GO
ALTER TABLE [rrhh_db].[horario] ADD  DEFAULT (NULL) FOR [horaSalida]
GO
ALTER TABLE [rrhh_db].[marcacion] ADD  DEFAULT (NULL) FOR [horaEntrada]
GO
ALTER TABLE [rrhh_db].[marcacion] ADD  DEFAULT (NULL) FOR [horaSalida]
GO
ALTER TABLE [rrhh_db].[marcacion] ADD  DEFAULT (NULL) FOR [horaEntrada2]
GO
ALTER TABLE [rrhh_db].[marcacion] ADD  DEFAULT (NULL) FOR [horaSalida2]
GO
ALTER TABLE [rrhh_db].[nominapago] ADD  DEFAULT (NULL) FOR [diasTrabajados]
GO
ALTER TABLE [rrhh_db].[permisoparcial] ADD  DEFAULT (NULL) FOR [justificado]
GO
ALTER TABLE [rrhh_db].[retraso] ADD  DEFAULT (NULL) FOR [minutos]
GO
ALTER TABLE [rrhh_db].[solicitud] ADD  DEFAULT (NULL) FOR [fechaHasta]
GO
ALTER TABLE [rrhh_db].[solicitud] ADD  DEFAULT (NULL) FOR [horaDesde]
GO
ALTER TABLE [rrhh_db].[solicitud] ADD  DEFAULT (NULL) FOR [horaHasta]
GO
ALTER TABLE [rrhh_db].[terminacionlaboral] ADD  DEFAULT (NULL) FOR [justificado]
GO
ALTER TABLE [rrhh_db].[ausencia]  WITH NOCHECK ADD  CONSTRAINT [ausencia$fk_Ausencia_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[ausencia] CHECK CONSTRAINT [ausencia$fk_Ausencia_Empleado1]
GO
ALTER TABLE [rrhh_db].[deduccion]  WITH NOCHECK ADD  CONSTRAINT [deduccion$fk_Deduccion_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[deduccion] CHECK CONSTRAINT [deduccion$fk_Deduccion_Empleado1]
GO
ALTER TABLE [rrhh_db].[deduccion]  WITH NOCHECK ADD  CONSTRAINT [deduccion$fk_Deduccion_TipoDeduccion1] FOREIGN KEY([TipoDeduccion_idTipoDeduccion])
REFERENCES [rrhh_db].[tipodeduccion] ([idTipoDeduccion])
GO
ALTER TABLE [rrhh_db].[deduccion] CHECK CONSTRAINT [deduccion$fk_Deduccion_TipoDeduccion1]
GO
ALTER TABLE [rrhh_db].[detalleauditoria]  WITH NOCHECK ADD  CONSTRAINT [detalleauditoria$fk_DetalleAuditoria_Auditoria1] FOREIGN KEY([Auditoria_idAuditoria])
REFERENCES [rrhh_db].[auditoria] ([idAuditoria])
GO
ALTER TABLE [rrhh_db].[detalleauditoria] CHECK CONSTRAINT [detalleauditoria$fk_DetalleAuditoria_Auditoria1]
GO
ALTER TABLE [rrhh_db].[devengo]  WITH NOCHECK ADD  CONSTRAINT [devengo$fk_Devengo_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[devengo] CHECK CONSTRAINT [devengo$fk_Devengo_Empleado1]
GO
ALTER TABLE [rrhh_db].[devengo]  WITH NOCHECK ADD  CONSTRAINT [devengo$fk_Devengo_TipoDevengo1] FOREIGN KEY([TipoDevengo_idTipoDevengo])
REFERENCES [rrhh_db].[tipodevengo] ([idTipoDevengo])
GO
ALTER TABLE [rrhh_db].[devengo] CHECK CONSTRAINT [devengo$fk_Devengo_TipoDevengo1]
GO
ALTER TABLE [rrhh_db].[empleado]  WITH NOCHECK ADD  CONSTRAINT [empleado$fk_Empleado_Contrato1] FOREIGN KEY([Contrato_idContrato])
REFERENCES [rrhh_db].[contrato] ([idContrato])
GO
ALTER TABLE [rrhh_db].[empleado] CHECK CONSTRAINT [empleado$fk_Empleado_Contrato1]
GO
ALTER TABLE [rrhh_db].[empleado]  WITH NOCHECK ADD  CONSTRAINT [empleado$fk_Empleado_EstadoCivil1] FOREIGN KEY([EstadoCivil_idEstadoCivil])
REFERENCES [rrhh_db].[estadocivil] ([idEstadoCivil])
GO
ALTER TABLE [rrhh_db].[empleado] CHECK CONSTRAINT [empleado$fk_Empleado_EstadoCivil1]
GO
ALTER TABLE [rrhh_db].[empleado]  WITH NOCHECK ADD  CONSTRAINT [empleado$fk_Empleado_Horario1] FOREIGN KEY([Horario_idHorario])
REFERENCES [rrhh_db].[horario] ([idHorario])
GO
ALTER TABLE [rrhh_db].[empleado] CHECK CONSTRAINT [empleado$fk_Empleado_Horario1]
GO
ALTER TABLE [rrhh_db].[empleadocargo]  WITH NOCHECK ADD  CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Cargo1] FOREIGN KEY([Cargo_idCargo])
REFERENCES [rrhh_db].[cargo] ([idCargo])
GO
ALTER TABLE [rrhh_db].[empleadocargo] CHECK CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Cargo1]
GO
ALTER TABLE [rrhh_db].[empleadocargo]  WITH NOCHECK ADD  CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Departamento1] FOREIGN KEY([Departamento_idDepartamento])
REFERENCES [rrhh_db].[departamento] ([idDepartamento])
GO
ALTER TABLE [rrhh_db].[empleadocargo] CHECK CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Departamento1]
GO
ALTER TABLE [rrhh_db].[empleadocargo]  WITH NOCHECK ADD  CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[empleadocargo] CHECK CONSTRAINT [empleadocargo$fk_EmpleadoCargo_Empleado1]
GO
ALTER TABLE [rrhh_db].[hijo]  WITH NOCHECK ADD  CONSTRAINT [hijo$fk_Hijo_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[hijo] CHECK CONSTRAINT [hijo$fk_Hijo_Empleado1]
GO
ALTER TABLE [rrhh_db].[marcacion]  WITH NOCHECK ADD  CONSTRAINT [marcacion$fk_Asistencia_Empleado] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[marcacion] CHECK CONSTRAINT [marcacion$fk_Asistencia_Empleado]
GO
ALTER TABLE [rrhh_db].[nominapago]  WITH NOCHECK ADD  CONSTRAINT [nominapago$fk_Remuneracion_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[nominapago] CHECK CONSTRAINT [nominapago$fk_Remuneracion_Empleado1]
GO
ALTER TABLE [rrhh_db].[permisoparcial]  WITH NOCHECK ADD  CONSTRAINT [permisoparcial$fk_PermisoParcial_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[permisoparcial] CHECK CONSTRAINT [permisoparcial$fk_PermisoParcial_Empleado1]
GO
ALTER TABLE [rrhh_db].[retraso]  WITH NOCHECK ADD  CONSTRAINT [retraso$fk_Retraso_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[retraso] CHECK CONSTRAINT [retraso$fk_Retraso_Empleado1]
GO
ALTER TABLE [rrhh_db].[rolpermiso]  WITH NOCHECK ADD  CONSTRAINT [rolpermiso$fk_RolPermiso_Permiso1] FOREIGN KEY([Permiso_idPermiso])
REFERENCES [rrhh_db].[permiso] ([idPermiso])
GO
ALTER TABLE [rrhh_db].[rolpermiso] CHECK CONSTRAINT [rolpermiso$fk_RolPermiso_Permiso1]
GO
ALTER TABLE [rrhh_db].[rolpermiso]  WITH NOCHECK ADD  CONSTRAINT [rolpermiso$fk_RolPermiso_Rol1] FOREIGN KEY([Rol_idRol])
REFERENCES [rrhh_db].[rol] ([idRol])
GO
ALTER TABLE [rrhh_db].[rolpermiso] CHECK CONSTRAINT [rolpermiso$fk_RolPermiso_Rol1]
GO
ALTER TABLE [rrhh_db].[solicitud]  WITH NOCHECK ADD  CONSTRAINT [solicitud$fk_Solicitud_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[solicitud] CHECK CONSTRAINT [solicitud$fk_Solicitud_Empleado1]
GO
ALTER TABLE [rrhh_db].[terminacionlaboral]  WITH NOCHECK ADD  CONSTRAINT [terminacionlaboral$fk_terminacionLaboral_Empleado1] FOREIGN KEY([Empleado_idEmpleado])
REFERENCES [rrhh_db].[empleado] ([idEmpleado])
GO
ALTER TABLE [rrhh_db].[terminacionlaboral] CHECK CONSTRAINT [terminacionlaboral$fk_terminacionLaboral_Empleado1]
GO
ALTER TABLE [rrhh_db].[usuariorol]  WITH NOCHECK ADD  CONSTRAINT [usuariorol$fk_UsuarioRol_Rol1] FOREIGN KEY([Rol_idRol])
REFERENCES [rrhh_db].[rol] ([idRol])
GO
ALTER TABLE [rrhh_db].[usuariorol] CHECK CONSTRAINT [usuariorol$fk_UsuarioRol_Rol1]
GO
ALTER TABLE [rrhh_db].[usuariorol]  WITH NOCHECK ADD  CONSTRAINT [usuariorol$fk_UsuarioRol_Usuario1] FOREIGN KEY([Usuario_idUsuario])
REFERENCES [rrhh_db].[usuario] ([idUsuario])
GO
ALTER TABLE [rrhh_db].[usuariorol] CHECK CONSTRAINT [usuariorol$fk_UsuarioRol_Usuario1]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.auditoria' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'auditoria'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.ausencia' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'ausencia'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.cargo' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'cargo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.contrato' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'contrato'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.deduccion' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'deduccion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.departamento' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'departamento'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.detalleauditoria' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'detalleauditoria'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.devengo' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'devengo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.empleado' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'empleado'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.empleadocargo' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'empleadocargo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.estadocivil' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'estadocivil'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.hijo' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'hijo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.horario' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'horario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.marcacion' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'marcacion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.nominapago' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'nominapago'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.permiso' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'permiso'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.permisoparcial' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'permisoparcial'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.retraso' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'retraso'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.rol' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'rol'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.rolpermiso' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'rolpermiso'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.solicitud' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'solicitud'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.terminacionlaboral' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'terminacionlaboral'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.tipodeduccion' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'tipodeduccion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.tipodevengo' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'tipodevengo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.usuario' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'rrhh_db.usuariorol' , @level0type=N'SCHEMA',@level0name=N'rrhh_db', @level1type=N'TABLE',@level1name=N'usuariorol'
GO
