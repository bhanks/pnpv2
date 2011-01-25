<?php

require_once( '../../../../wp-load.php' );
$uploads_dir=wp_upload_dir();
$uploads_dir=$uploads_dir[subdir];
 
$uploaddir = '../../../uploads'.$uploads_dir.'/';
$uploadname=basename($_FILES['pexetofile']['name']);

 if(file_exists($uploaddir.$uploadname)){
  	$uploadname=time().$uploadname;
 }

$uploadfile = $uploaddir.$uploadname;
 
 
if (move_uploaded_file($_FILES['pexetofile']['tmp_name'], $uploadfile)) {
  echo $uploadname;
} else {
  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
  // Otherwise onSubmit event will not be fired
  echo "error";
}
