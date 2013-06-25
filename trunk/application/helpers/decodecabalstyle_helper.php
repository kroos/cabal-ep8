<?php
function decode_style($r)
	{
		//get gender
		$gender_array = array
							(
								'Male',
								'Female',
								'Male 2',
								'Female 2',
								'Male 3',
								'Female 3'
							);
		$style['Gender'] = $gender_array[round($r / hexdec(4000000))];

		//GET AURA
		$style['Aura'] = round(($r % hexdec(4000000)) / hexdec(200000));

		// hair 
		$style['Hair'] = round(($r % hexdec(4000000) % hexdec(200000) ) / hexdec(20000));

		//hair color
		$style['Hair_Color'] = round((($r % hexdec(4000000)) % hexdec(20000)) / hexdec(2000));

		// get face 
		$style['Face'] = round(((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) / hexdec(100));

		// get rank
		$style['Class_Rank'] = round((((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) / 8 );

		// get class
		$class_array = array
							(
								4=>'Force Archer',
								5=>'Force Shielder',
								6=>'Force Blader',
								9=>'Warrior',
								10=>'Blader',
								11=>'Wizard',
								12=>'Force Archer',
								13=>'Force Shielder',
								14=>'Force Blader'
							);
		
		$style['Class'] = (((($r % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) -  (($style['Class_Rank'] -1) * 8) ;
		
		$style['Class_Name'] = $class_array[$style['Class']] ;
		return $style;
	}
?>