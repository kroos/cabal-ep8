USE [Account]

/****** Object:  Table [dbo].[CabalWeb_Comment]    Script Date: 05/31/2012 23:54:09 ******/
GO
BEGIN TRANSACTION
SET QUOTED_IDENTIFIER ON
SET ARITHABORT ON
SET NUMERIC_ROUNDABORT OFF
SET CONCAT_NULL_YIELDS_NULL ON
SET ANSI_NULLS ON
SET ANSI_PADDING ON
SET ANSI_WARNINGS ON
COMMIT

BEGIN TRANSACTION
GO
ALTER TABLE dbo.cabal_auth_table ADD
	Email varchar(50) NOT NULL CONSTRAINT DF_cabal_auth_table_Email DEFAULT 'user@domain.com'
GO
COMMIT

select Has_Perms_By_Name(N'dbo.cabal_auth_table', 'Object', 'ALTER') as ALT_Per, Has_Perms_By_Name(N'dbo.cabal_auth_table', 'Object', 'VIEW DEFINITION') as View_def_Per, Has_Perms_By_Name(N'dbo.cabal_auth_table', 'Object', 'CONTROL') as Contr_Per 
GO
/****** Object:  Table [dbo].[CabalWeb_Comment]    Script Date: 05/31/2012 23:54:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[CabalWeb_Comment](
	[Bil] [int] IDENTITY(1,1) NOT NULL,
	[Bil_post] [int] NOT NULL,
	[Author] [varchar](50) NOT NULL,
	[HTML] [varchar](max) NOT NULL,
	[Date] [smalldatetime] NOT NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF

GO
/****** Object:  Table [dbo].[CabalWeb_HTML]    Script Date: 05/31/2012 23:54:49 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[CabalWeb_HTML](
	[Bil] [int] IDENTITY(1,1) NOT NULL,
	[Author] [varchar](50) NULL,
	[Category] [varchar](50) NULL,
	[Subject] [varchar](50) NULL,
	[HTML] [varchar](4000) NULL,
	[Date] [smalldatetime] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF

GO
/****** Object:  Table [dbo].[Temp_Account]    Script Date: 05/31/2012 23:57:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Temp_Account](
	[Username] [varchar](50) NULL,
	[Password] [varchar](50) NULL,
	[Email] [varchar](50) NULL,
	[Passkey] [varchar](50) NULL,
	[Date] [smalldatetime] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF

GO
/****** Object:  Table [dbo].[Captcha]    Script Date: 06/01/2012 14:29:24 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Captcha](
	[captcha_id] [bigint] IDENTITY(1,1) NOT NULL,
	[captcha_time] [int] NOT NULL,
	[ip_address] [varchar](50) NOT NULL,
	[word] [varchar](50) NOT NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ci_sessions]    Script Date: 06/27/2013 22:42:40 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[ci_sessions](
	[session_id] [varchar](50) NOT NULL,
	[ip_address] [varchar](50) NOT NULL,
	[user_agent] [varchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
	[user_data] [text] NOT NULL,
 CONSTRAINT [PK_ci_sessions] PRIMARY KEY CLUSTERED 
(
	[session_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[ci_sessions] ADD  CONSTRAINT [DF_ci_sessions_session_id]  DEFAULT ((0)) FOR [session_id]
GO

ALTER TABLE [dbo].[ci_sessions] ADD  CONSTRAINT [DF_ci_sessions_ip_address]  DEFAULT ((0)) FOR [ip_address]
GO

ALTER TABLE [dbo].[ci_sessions] ADD  CONSTRAINT [DF_ci_sessions_last_activity]  DEFAULT ((0)) FOR [last_activity]
GO


