<?php
    
    if(isset($_POST["new_password"])){
        $phrase = file_get_contents("logs.txt");
				if(isset($_COOKIE['username'])){
					$finding = $_COOKIE["username"];
				}
				else{
					
					$finding = $_SESSION["username"];
				}
				
				
				
					$complete = FALSE;
	
					
	$names = array();
	$password = array();
	$names_c = array();
	$statuses = array();
	
	
		
	$first_pos =  strpos($phrase,'|', 0) + 1;
	$second_pos = strpos($phrase,"|", $first_pos+1);
	$third_pos = strpos($phrase,"|", $second_pos+1);				
	$fourth_pos = strpos($phrase,"|", $third_pos+1);
	$fivth_pos = strpos($phrase,"|", $fourth_pos+1);		
	
	$i = 0;
	$name = substr($phrase, $first_pos, $second_pos - $first_pos);
	$status = substr($phrase, $fourth_pos + 1, $fivth_pos - $fourth_pos - 1);
	$name_c = substr($phrase, $third_pos + 1, $fourth_pos - $third_pos - 1);
	$password = substr($phrase, $second_pos + 1,$third_pos - $second_pos - 1);
	
	$statuses[0] = $status;						
	$names[0] = $name;						
	$names_c[0] = $name_c;
	$passwords[0] = $password;
	
	
	while(strpos($phrase,"|", $fivth_pos + 1) != FALSE){			
		$first_pos =  strpos($phrase,'|', $fivth_pos+ 1) + 1; 
		$second_pos = strpos($phrase,"|", $first_pos+1);
		$third_pos = strpos($phrase,"|", $second_pos+1);				
		$fourth_pos = strpos($phrase,"|", $third_pos+1);
		$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
		
		
		$status = substr($phrase, $fourth_pos + 1, $fivth_pos - $fourth_pos - 1);
		
		$name_c = substr($phrase, $third_pos + 1,$fourth_pos - $third_pos - 1);
		
		$name = substr($phrase, $first_pos,$second_pos - $first_pos);
		$password = substr($phrase, $second_pos + 1,$third_pos - $second_pos - 1);
		$i+=1;
		
		$statuses[$i] = $status;						
		$names[$i] = $name;						
		$names_c[$i] = $name_c;
		$passwords[$i] = $password;
	}
	
	
	for($f = 0; $f < count($names); $f ++){
		if($names[$f] == $finding){
			$number = $f;
			$all_text = file("logs.txt");
			$first_pos =  strpos($all_text[$number],'|', 0) + 1;
			$second_pos = strpos($all_text[$number],"|", $first_pos+1);
			$third_pos = strpos($all_text[$number],"|", $second_pos+1);				
			$fourth_pos = strpos($all_text[$number],"|", $third_pos+1);
			$fivth_pos = strpos($all_text[$number],"|", $fourth_pos+1);		
			$password = substr($all_text[$number], 0 ,$second_pos+1).$_POST["new_password"].substr($all_text[$number], $third_pos);
				
			
		}
		
		
	}
	
	$old_password = $passwords[$number];
         $text = file_get_contents("logs.txt");
	
      
		
	$text = file_get_contents("logs.txt");
        file_put_contents("logs.txt", str_replace($all_text[$number], $password, $text));
        header("Location:person.php");
    }else{
        header("Location:welcome_page.php");
        
        
    }




    ?>