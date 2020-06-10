<?php

session_start();
require_once('../../connection/connection.php');

 $asunto= mysqli_real_escape_string($connApp,$_POST['asunto']);
 $id_usuario= mysqli_real_escape_string($connApp,$_POST['id_usuario']);
 $id_admin=mysqli_real_escape_string($connApp,$_SESSION['id_user']);




$uploadDir = '../../assets/img/';

// if (file_exists($uploadDir)) {
//     echo "The file $uploadDir exists";
// } else {
//     echo "The file $uploadDir does not exist";
// }
$random=rand(5, 15);
if(!empty($_FILES["file"]["name"])){
   // File path config
                 $fileName = basename($_FILES["file"]["name"]);
                 $targetFilePath = $uploadDir . $fileName;
                 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                 // Allow certain file formats
                                $allowTypes = array('jpg','jpeg','png');
                                if(in_array($fileType, $allowTypes)){
                                    // Upload file to the server

                                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                        $uploadedFile = $fileName;
                                        $mensaje="correcto";
                                    }else{
                                      $mensaje="fallo";
                                        $uploadStatus = 0;
                                        $response['message'] = 'Sorry, there was an error uploading your file.';
                                    }
                                }else{
                                  $mensaje="fallo";
                                    $uploadStatus = 0;
                                    $response['message'] = 'Solo tipos de imagenes JPG, JPEG se pueden subir.';
                                }

}
$insert="INSERT INTO `quejas`( `id_usuario`, `id_administrador`, `queja`,`imagen`) VALUES ('$id_usuario','$id_admin','$asunto','$fileName')";
if(!$result = $connApp->query($insert)){
die('There was an error running the query1 [' . $connApp->error . ']');
}

$arrayName = array('mensaje' =>$mensaje );
echo json_encode($arrayName);
 ?>
