<?php
	$i = 0;
    $number_of_right = 0;
	$number_of_wrong = 0;
	$text = file("results/".$_COOKIE["username"].".txt");
	
	while(strpos($text[$i],"Нет") == FALSE){
                $result_text.= $text[$i];
                $i+=1;
                }
                while(strpos($result_text,"Неверно",$last_pos) != False){
                    $last_pos = strpos($result_text,"Неверно",$last_pos)+1;
                    $number_of_wrong +=1;
                }
                
                $last_pos = 0;
                while(strpos($result_text,"Верно",$last_pos) != False){
                    $last_pos = strpos($result_text,"Верно",$last_pos)+1;
                    $number_of_right +=1;
                }
	if($number_of_right + $number_of_wrong != 0){		
		echo round($number_of_right/($number_of_right + $number_of_wrong)*100 , 0);		
		}
	



	?>