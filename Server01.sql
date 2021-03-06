USE [Server01]
/*
   Jumaat 29 Jun 20123:37:21 AM
   User: sa
   Server: ADMIN-PC\SQLEXPRESS
   Database: Server01
   Application: 
*/
GO
/* To prevent any potential data loss issues, you should review this script in detail before running it outside the context of the database designer.*/
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
ALTER TABLE dbo.cabal_character_table ADD
	Rebirth int NULL,
	Reset int NULL
GO
ALTER TABLE dbo.cabal_character_table ADD CONSTRAINT
	DF_cabal_character_table_Rebirth DEFAULT 0 FOR Rebirth
GO
ALTER TABLE dbo.cabal_character_table ADD CONSTRAINT
	DF_cabal_character_table_Reset DEFAULT 0 FOR Reset
GO
COMMIT
select Has_Perms_By_Name(N'dbo.cabal_character_table', 'Object', 'ALTER') as ALT_Per, Has_Perms_By_Name(N'dbo.cabal_character_table', 'Object', 'VIEW DEFINITION') as View_def_Per, Has_Perms_By_Name(N'dbo.cabal_character_table', 'Object', 'CONTROL') as Contr_Per 