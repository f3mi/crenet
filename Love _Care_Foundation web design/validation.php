<?php

    $errors =[];     
    function validate_presense_on($required_fields){
     global $errors;
     foreach($required_fields as $fields){
     	if (!has_presense($_POST[$field])) {

     		$errors[$field]="'".$field."' can't be blank";
     	}
     }
    }
//white listing things from the form
    function allowed_get_params($allowed_params=[]){
	    $allowed_array=[];
	    foreach ($allowed_params as $param) {
	        if (isset($_POST[$param])) {
	            $allowed_array[$param]=$_POST[$param];
	        }
	        else {
	            $allowed_array[$param]=NULL;
	        }
	    }
	    return $allowed_array;
	    
	  }
	  $post_params=allowed_post_params(['name','email','phone','subject','message', 'gender','age', 'contact']);

    function has_format_matching($value, $regex='^[a-zA-Z ]*$'){
    	return preg_match($regex, $value);
    }
      
?>