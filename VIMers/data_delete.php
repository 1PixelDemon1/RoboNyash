<?php
	$del = FALSE;
	$names = array();
	
	$files = scandir("results",1);
	
	$phrase = file_get_contents("logs.txt");
		
	$first_pos =  strpos($phrase,'|', 0) + 1;
	$second_pos = strpos($phrase,"|", $first_pos+1);
	$third_pos = strpos($phrase,"|", $second_pos+1);				
	$fourth_pos = strpos($phrase,"|", $third_pos+1);
	$fivth_pos = strpos($phrase,"|", $fourth_pos+1);		
	
	$i = 0;
	$name = substr($phrase, $first_pos, $second_pos - $first_pos);
	$names[0] = $name.".txt";						
	$status = array();
	$status[0] = substr($phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1);
	while(strpos($phrase,"|", $fivth_pos + 1) != FALSE){	
		
		$first_pos =  strpos($phrase,'|', $fivth_pos+ 1) + 1; 
		$second_pos = strpos($phrase,"|", $first_pos+1);
		$third_pos = strpos($phrase,"|", $second_pos+1);				
		$fourth_pos = strpos($phrase,"|", $third_pos+1);
		$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
		
		$name = substr($phrase, $first_pos, $second_pos - $first_pos);
		$i+=1;
		$names[$i] = $name.".txt";						
		$status[$i] = substr($phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1);						
		
	}
	for( $j = 0; $j < count($files) - 2; $j ++){
		$del = TRUE;
		for($l = 0; $l < count($names) ; $l ++){			
			if($files[$j] == $names[$l] && $status[$l] == "Пользователь"){
				$del = False;			
			}					
		}
		if($del == TRUE){
			unlink("results/".$files[$j]);						
		}		
	}
	header("Location:welcome_page.php");
	?>
