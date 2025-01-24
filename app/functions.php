<?php 

/**
 * 
 * create a alert for any validation
 * @param $msg
 * @param $typ
 */
function createAlert($msg, $type = "danger"){
  return "<p class=\"alert alert-{$type} d-flex justify-content-between\"> {$msg} <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" ></button></p>";
}


/**
 * 
 * get old values after submit a form
 */

function old($field_name){
   return $_POST[$field_name] ?? "";
}


/**
 * reset form
 */
function resetForm(){
  return $_POST = []; 
}

/**
 * 
 * file upload function 
 */

function move(array $files, $path="media/"){

      // file manage 
      $tmp_name = $files["tmp_name"];
      $file_name = $files["name"];

    
      // get file extension
      $file_arr = explode(".", $file_name);
      $file_ext = strtolower(end($file_arr));
    
      // file name unique 
       $unique_file_name = time() . "_" . rand(100000, 10000000) . "." . $file_ext;
  
       // upload file
       move_uploaded_file($tmp_name, $path . $unique_file_name);


       // return file name 
       return  $unique_file_name;
}

/**
 * 
 * create unique user id function 
 */

function createId($prefix = 'USER') {
  // Generate a unique identifier using a combination of time and random values
  $uniqueId = uniqid($prefix . '_', true);

  // Replace dots with empty string for cleaner ID
  $cleanedId = str_replace('.', '', $uniqueId);

  // Return the unique user ID
  return strtoupper($cleanedId);
}



?>