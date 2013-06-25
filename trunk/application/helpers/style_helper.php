<?php
// Class decoding shamelessly stolen from john_d's cabaltoolz
function decode_style($r)
	{
		$gender_array = array
							(
								'Male',
								'Female',
								'Male 2',
								'Female 2',
								'Male 3',
								'Female 3'
							);

		$aura_array = array
							(
								'No aura',
								'Land',
								'Aqua',
								'Wind',
								'Flame',
								'Freezing',
								'Lightning'
							);

		$classrank_array = array
								(
									1=>'Novice',
									'Apprentice',
									'Regular',
									'Expert',
									'A. Expert',
									'Master',
									'A. Master',
									'G. Master',
									'Completer',
									'Transcender'
								);

		$class_array = array
							(
								4 => 'Force Archer',
								5 => 'Force Shielder',
								6 => 'Force Blader',
								9 => 'Warrior',
								10 => 'Blader',
								11 => 'Wizard',
								12 => 'Force Archer',
								13 => 'Force Shielder',
								14 => 'Force Blader'
							);
		
		$style['Gender'] = $gender_array[round($r / hexdec(4000000))];	
		$style['Aura'] = round(($r % hexdec(4000000)) / hexdec(200000))/2;
		$style['Aura_Name'] = $aura_array[$style['Aura']];
		$style['Hair'] = round(($r % hexdec(4000000) % hexdec(200000) ) / hexdec(20000));
		$style['Hair_Color'] = round((($r % hexdec(4000000)) % hexdec(20000)) / hexdec(2000));
		$style['Face'] = round(((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) / hexdec(100));
		$style['Class_Rank'] = round((((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) / 8 );
		//$style['Class_RankName']=$classrank_array[$style['Class_Rank']];
		$style['Class'] = (((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) -  (($style['Class_Rank'] -1) * 8) ;
		$style['Class_Name'] = $class_array[$style['Class']] ;
		return $style;  
	}
?>