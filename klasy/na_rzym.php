<?php
function convertToRoman($int_num) { // 1111 // 228
	$result = '';
	$arr_num = array();
	$arr_num[0] = intval($int_num);
	$arr_index = array();
	$arr_arab = array(2000,1000,900,800,700,600,500,400,300,200,100,90,80,70,60,50,40,30,20,10,9,8,7,6,5,4,3,2,1);
	$asoc_roman = array(2000=>'MM', 1000=>'M', 900=>'CM', 800=>'DCC', 700=>'DCC', 600=>'DC', 500=>'D', 400=>'CD', 300=>'CCC', 200=>'CC', 100=>'C', 90=>'XC', 80=>'LXXX', 70=>'LXX', 60=>'LX', 50=>'L', 40=>'XL', 30=>'XXX', 20=>'XX', 10=>'X', 9=>'IX', 8=>'VIII', 7=>'VII', 6=>'VI', 5=>'V', 4=>'IV', 3=>'III', 2=>'II', 1=>'I');

	for ($i=1; $i<=3; $i++) {
		if ($arr_num[$i-1] > 0 && $arr_num[$i-1] < 3000) {
			foreach ($arr_arab as $v) {
				if (isset($arr_num[$i-1]) && intval($arr_num[$i-1]/$v)) {//228/200=1   228-200=28   28-20=8 8-8=0
						$arr_num[$i] = $arr_num[$i-1]-$v;                           //1111-1000=111; 111-100=11; 11-10=1; 1-1=0
						$arr_index[$i-1] = $v;                                                //1000 100 10 1
					continue 2;
				}
			}
		}
	}

	if ($arr_num[0] === 0 || $arr_num[1] === 0 || $arr_num[2] === 0 || $arr_num[3] === 0) {
		array_pop($arr_num);
	} else {
		$arr_index[] = $arr_num[3];
	}

	$asoc_num = array_combine($arr_index, $arr_num);

	$asoc_common_rom = array_intersect_key($asoc_roman, $asoc_num);

	foreach ($asoc_common_rom as $v) {
		$result .= $v;
	}
	return $result;
}
?>

