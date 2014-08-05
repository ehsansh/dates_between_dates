<?php


function  give_num_of_days($month,$year){
	$num = 30;
	if( $month<7 ) $num = 31;

	if( $month == 12  ){
		$kab=($year%33%4-1==(int)($year%33*.05))?1:0;
		$num = 29;
		if( $kab ) $num = 30;
	}
	return $num;
}

function give_days_between($start,$finish){

	$date = array();

	$start_month = substr($start,4,2);
	$start_day = substr($start,6,2);
	$start_year = substr($start,0,4);

	$end_month = substr($finish,4,2);	
	$finish_day = substr($finish,6,2);
	$finish_year = substr($finish,0,4);

	while ( $start_year <= $finish_year ){

		$finish_month = 13;
		if( $start_year == $finish_year ) $finish_month = $end_month;	

		while ( $start_month <= $finish_month ){	

			$num = give_num_of_days($start_month,$start_year);

			if( $start_month != $finish_month ){				
				for( $i=$start_day; $i<=$num; $i++ ){
					$day = $i;
					if( strlen($day) == 1 ) $day = '0'.$day;
					if( strlen($start_month) == 1 ) $start_month = '0'.$start_month;				
					$date[] = $start_year.$start_month.$day;
				}
			}else{
				for( $i=0; $i<$num; $i++ ){
					
					$day = $start_day + $i;				
					if( strlen($day) == 1 ) $day = '0'.$day;
					if( strlen($start_month) == 1 ) $start_month = '0'.$start_month;				
					if( $day > $finish_day ) break;					
					$date[] = $start_year.$start_month.$day;
				}
			}
			$start_month++;
			$start_day = 1;
			if( $start_month == 13 ){
				$start_month =1;
				break;
			}
		}

		$start_year++;

	}

	return $date;

}



?>
