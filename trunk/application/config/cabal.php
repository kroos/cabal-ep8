<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#############################################################################################
//Website
$config['server'] = 'Cabal Online';
$config['website'] = 'http://a3ncabal.dyndns.info';					//http://cabalonline.com/
$config['forum'] = 'http://a3ncabal.dyndns.info/forum';							//http://cabalonline.com/forum
$config['version'] = 'EPISODE 8';						//Game version
$config['exp_rate'] = '5';
$config['alz_rate'] = '5';
$config['craft_rate'] = '5';
$config['skill_rate'] = '5';
$config['drop_rate'] = '3';

#############################################################################################
//Facebook
//optional. if u have a fan page just insert the URL of your fan page otherwise leave it blank.
//more info => https://developers.facebook.com/docs/guides/web/#plugins
//example : 
$config['facebook'] = 'https://www.facebook.com/pages/A3-Revive/279787298733680';

//$config['facebook'] = '';										//if u dont set anything, facebook page will not appear

#############################################################################################
//Paypal
//optional. same as facebook configuration section
$config['payemail'] = 'azaliha@gmail.com';										//if u dont set anything, donation page will not appear
$config['paypickupline'] = 'this should be your donation pick up line. just put in nice word to persuade them make a donation to your server';

#############################################################################################
//Game Server (CentOS)
$config['gameserver_ip'] = '127.0.0.1';							//192.168.1.2
$config['gameserver_port'] = '38101';							//gameserver port

//Channel Status
$config['channels'] = array	
							(
								1	=>	array	(
													'number'	=>	1,
													'type'		=>	0,
													'name'		=>	'Channel 1 (Novice)',
													'port'		=>	38111
												),
								2	=>	array	(
													'number'	=>	2,
													'type'		=>	0,
													'name'		=>	'Channel 2 (Trade)',
													'port'		=>	38112
												),
								3	=>	array	(
													'number'	=>	3,
													'type'		=>	1,
													'name'		=>	'Channel 3 (PK)',
													'port'		=>	38113
												),
								4	=>	array	(
													'number'	=>	4,
													'type'		=>	4,
													'name'		=>	'Channel 4 (Premium)',
													'port'		=>	38114
												),
								5	=>	array	(
													'number'	=>	5,
													'type'		=>	8,
													'name'		=>	'Channel 5 (War)',
													'port'		=>	38115
												),
								6	=>	array	(
													'number'	=>	10,
													'type'		=>	16908368,
													'name'		=>	'Channel 10 (TG)',
													'port'		=>	38116
												)
							);

//maximum player
$config['maxplayers'] = 100;

#############################################################################################
//Mailer Configurations
//pop3 server and port
$config['pop3_server'] = 'pop.gmail.com';
$config['pop3_port'] = 995;

//smtp server
$config['SMTP_auth'] = TRUE;
$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_port'] = 465;
$config['SMTP_Secure'] = 'ssl';

//email account from sender associated to the pop3 n smtp server settings.
$config['username'] = 'a3outlaw@gmail.com';				//gmail username
$config['password'] = '0162172420';						//gmail password
$config['addreplyto_email'] = 'admin@domain.com';		//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = '[GM]Cabal';				//example, [GM]Cabal
$config['from'] = 'admin@domain.com';					//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = '[GM]Cabal';						//example [GM]Cabal

#############################################################################################
//Group & Single Dungeon List
$config['SingleDungeonList'] = array
									(
										'The Lake in Dusk' => 'Lake in Dusk',
										'Ruina Station' => 'Ruina Station',
										'Frozen Tower of Undead(B1F)' => 'Frozen Tower of Undead(B1F)',
										'Frozen Tower of Undead(B2F) Part1' => 'Frozen Tower of Undead(B2F) Part 1',
										'Volcanic Citadel' => 'Volcanic Citadel',
										'Forgotten Temple B1F' => 'Forgotten Temple B1F',
										'Skeleton Mine (Grade: D, Solo)' => 'Skeleton Mine (Grade: D, Solo)',
										'Mummy Grave (Grade: D, Solo)' => 'Mummy Grave (Grade: D, Solo)',
										'Ghost Ship (Grade: D, Solo)' => 'Ghost Ship (Grade: D, Solo)',
										'The Ruins of the Ancient City (Grade: D, Solo)' => 'The Ruins of the Ancient City (Grade: D, Solo)',
										'Lighthouse Maze (Grade: D, Solo)' => 'Lighthouse Maze (Grade: D, Solo)'
									);

$config['GroupDungeonList'] = array
									(
										'The Lake in Dusk' => 'Lake in Dusk',
										'Ruina Station' => 'Ruina Station',
										'Frozen Tower of Undead(B1F)' => 'Frozen Tower of Undead(B1F)',
										'Frozen Tower of Undead(B2F) Part1' => 'Frozen Tower of Undead(B2F) Part 1',
										'Volcanic Citadel' => 'Volcanic Citadel',
										'Forgotten Temple B1F' => 'Forgotten Temple B1F',
										'Skeleton Mine (Grade: D, Group)' => 'Skeleton Mine (Grade: D, Group)',
										'Mummy Grave (Grade: D, Group)' => 'Mummy Grave (Grade: D, Group)',
										'Ghost Ship (Grade: D, Group)' => 'Ghost Ship (Grade: D, Group)',
										'The Ruins of the Ancient City (Grade: D, Group)' => 'The Ruins of the Ancient City (Grade: D, Group)',
										'Zombie Infested Cottage (Grade: D, Group)' => 'Zombie Infested Cottage (Grade: D, Group)'
									);

#############################################################################################
//Rebirth
$config['rebirth_level'] = 150;			//starting level that character can begin a rebirth
$config['rebirth_alz'] = 500000;		//alz needed to perform rebirth

#############################################################################################
//Reset Rebirth
$config['rebirth_count'] = 51;			//starting level that character can begin a reset rebirth
$config['alzresetrebirth'] = 2000000000;		//alz needed to perform reset rebirth
$config['rrebirthcapped'] = 3;		//rebirth will not exceed this value, otherwise the char will flooded with more statistic points due to so many rebirth
$config['resetrank'] = array
							(
								'test'
							);

#############################################################################################
//Shop
//item duration
$config['idur'] = array
						(
							1 => '1 hour',
							2 => '3 hour',
							3 => '5 hour',
							4 => '10 hour',
							5 => '1 day',
							6 => '3 day',
							7 => '5 day',
							8 => '7 day',
							9 => '10 day',
							10 => '15 day',
							11 => '30 day',
							12 => '60 day',
							13 => '90 day',
							14 => '100 day',
							15 => '120 day',
							16 => '345 day',
							31 => 'Permanent',
						);

// ServerIdx MUST match the one in WorldSvr_XX_YY.ini or cash items
// Will not get delivered correctly.
$config['svridx'] = 2;

// Category names for cash shop
$config['cats'] = array
						(
							1 => 'Costumes',
							2 => 'Gear',
							3 => 'Pets',
							4 => 'Consumables',
							5 => 'Items'
						);

#############################################################################################
//Account
//Auth Type as of in the column AuthType of cabal_auth_table table
$config['AuthType'] = array
							(
								1 => 'Normal',
								2 => 'Banned'
							);

//premium type as of in the column Type of cabal_charge_auth table
$config['Type'] = array
						(
							0 => 'Free',
							1 => 'Premium',
							2 => 'Free Time'
						);

//service kinds features as of in the const.scp
$config['ServiceKind'] = array
								(
									0 => '+25% Exp, Skill Exp, Drop, Craft',
									1 => '+25% Craft & Inventory & Warehouse',
									2 => '+25% Exp & Inventory & Warehouse',
									3 => '+25% Drop & Inventory & Warehouse',
									4 => '+25% Skill Exp & Inventory & Warehouse',
									5 => '+25% Exp, Skill Exp, Drop, Craft & Inventory & Warehouse & Training Dummy',
									6 => 'Inventory & Warehouse',
									7 => '+25% Skill Exp & Inventory & Warehouse & Training Dummy',
									8 => '+50% Exp, Skill Exp, Drop, Craft & Inventory & Warehouse'
								);

#############################################################################################
//Map
$config['map'] = array
						(
							1 => 'Bloody Ice',
							2 => 'Desert Scream',
							3 => 'Green Despair',
							4 => 'Port Lux',
							5 => 'Fort Ruina',
							6 => 'Lakeside',
							7 => 'Undead Ground',
							8 => 'Forgotten Ruin',
							9 => 'Mutant Forest',
							10 => 'Pontus Ferrum',
							11 => '',
							12 => '',
							13 => 'Frozen Tower of Undead',
							14 => 'Ruina Station',
							15 => 'Tierra Gloriosa',
							16 => 'Tierra Gloriosa (Lobby)',
							17 => '',
							18 => '',
							19 => 'Jail',
							20 => '',
							21 => '',
							22 => '',
							23 => 'Forgotten Temple',
							24 => 'Volcanic Citadel',
							25 => 'Exilian Volcano',
							26 => 'Lake in Dusk',
							27 => 'Dungeon World 3',
							28 => 'Dungeon World 2',
							29 => 'Dungeon World 1',
							30 => 'Warp Room'
						);

#############################################################################################
//Nation
$config['nation'] = array
					(
						0 => 'Neutral',
						1 => 'Capella',
						2 => 'Procyon',
						3 => 'Game Master'
					);

#############################################################################################
//Map Code & Warp Code
//look at the 'cabal_character_table', column MapsBField and WarpBField
$config['wmcode'] = array
						(
							0 => 'No maps and warp',
							1 => '1 map or warp',
							2 => '2 maps or warp',
							3 => '3 maps or warp',
							4 => '4 maps or warp',
							5 => '5 maps or warp',
							6 => '6 maps or warp',
							7 => '7 maps or warp',
							95 => '95 maps or warp',
							511 => '511 maps or warp',
							1023 => 'All maps and warp'
						);

#############################################################################################
//Style
//look at the 'cabal_character_table', column Style
$config['style'] = array
						(
							0 => 'Rank 1',
							8 => 'Rank 2',
							16 => 'Rank 3',
							24 => 'Rank 4',
							32 => 'Rank 5',
							40 => 'Rank 6',
							48 => 'Rank 7',
							56 => 'Rank 8',
							64 => 'Rank 9',
							72 => 'Rank 10',
							80 => 'Rank 11',
							88 => 'Rank 12',
							96 => 'Rank 13',
							104 => 'Rank 14',
							112 => 'Rank 15',
							120 => 'Rank 16',
							128 => 'Rank 17',
							136 => 'Rank 18',
							144 => 'Rank 19',
							152 => 'Rank 20',
							160 => 'Rank 21'
						);
#############################################################################################
#############################################################################################


/* End of file cabal.php */
/* Location: ./application/config/cabal.php */
