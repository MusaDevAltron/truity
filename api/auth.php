<?php 
session_start();
if(isset($_POST['IDNumber'])){
    $username = $_POST['IDNumber'];
    $password = $_POST['Password'];
    $company  = $_POST['CompanyName'];
    $data = array('password' => $password, 'CompanyName' => $company); // data u want to post                                                                   
    $data_string = json_encode($data);                                                                                   
                                                                                                                 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/session/login/{$username}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

// if(curl_exec($ch) === false){
//     echo 'Curl error: ' . curl_error($ch);
//     }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    // echo $returnCode;
    // var_dump($errors);
    $results = json_decode($result, true);
    // print_r(json_decode($result, true)); // Testing if I get a result back
    $usersession = $results[SessionID];
}
$_SESSION['SessionID'] = $usersession;
if(isset($_SESSION['SessionID'])) {
$usersession = $_SESSION['SessionID'];
header('Location:../dashboard/');
    exit();
 }
 else {
  //  echo "Unknown user";
header('Location:../index.php'); // Kick you back to login
    exit();
  }
?>