USE [CashShop]
GO
/****** Object:  Table [dbo].[Bank]    Script Date: 06/29/2012 03:34:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Bank](
	[UserNum] [int] NOT NULL,
	[Alz] [bigint] NOT NULL CONSTRAINT [DF_Bank_Alz]  DEFAULT ((0))
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ShopItems]    Script Date: 06/29/2012 03:34:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ShopItems](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](50) NOT NULL,
	[Description] [varchar](200) NOT NULL,
	[ItemIdx] [int] NOT NULL,
	[DurationIdx] [int] NOT NULL,
	[ItemOpt] [int] NOT NULL,
	[Image] [varchar](200) NOT NULL,
	[Honour] [int] NULL,
	[Alz] [int] NULL,
	[Category] [int] NOT NULL,
	[Available] [int] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Category]    Script Date: 06/27/2013 22:06:03 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Category](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[category] [varchar](max) NOT NULL,
 CONSTRAINT [PK_Category] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO
/****** Object:  StoredProcedure [dbo].[SetBankAlz]    Script Date: 06/29/2012 03:34:29 ******/
SET ANSI_NULLS OFF
GO
SET QUOTED_IDENTIFIER OFF
GO
CREATE PROCEDURE [dbo].[SetBankAlz]( @UserNum int, @Alz bigint) 
AS
BEGIN
BEGIN TRAN
	IF NOT EXISTS( SELECT UserNum
		FROM Bank
		WHERE UserNum = @UserNum )
	BEGIN
		INSERT Bank	(UserNum, Alz)
		VALUES ( @UserNum, 0)
	END
	ELSE
	BEGIN
		UPDATE Bank
		SET Alz = @Alz
		WHERE UserNum = @UserNum
	END
COMMIT TRAN	
END
GO
/****** Object:  StoredProcedure [dbo].[GetBankAlz]    Script Date: 06/29/2012 03:34:29 ******/
SET ANSI_NULLS OFF
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[GetBankAlz]( @UserNum int ) AS
BEGIN
	if ( SELECT UserNum FROM Bank WHERE UserNum = @UserNum ) is Null 
	BEGIN
		INSERT Bank ( UserNum, Alz)
		VALUES( @UserNum, 0)
	END
	SELECT UserNum, Alz
	FROM Bank
	WHERE UserNum = @UserNum
END
GO
