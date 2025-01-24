<?php

/**
 * devs data create function
 * 
 */

function create(string $path, array $newData) {
  // send devs data to json db
  $data = json_decode(file_get_contents($path), true);
  array_push($data, $newData);

  file_put_contents($path, json_encode( $data));
}


/**
 * get all devs data function
 * 
 */

 function all($path) {
   return json_decode(file_get_contents($path), false);
}


/**
 * get sinle devs data function
 * 
 */

 function find($path, $id) {
    $data = json_decode(file_get_contents($path), false);
  
    foreach($data as $item){
      if ($item -> id == $id) {
        return $item;
      }
    }
 
}



?>