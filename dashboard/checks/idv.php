<?php
if($_POST['checktype'] =='IDV'){
    $idnumber = $_POST["idvidnumber"];
    $countrycode  = 'ZAF';
    $reference = $_POST["reference"];

    // Params
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $idvdata = array('Parameters' => array(['Name' => $idname,'Value' => $idnumber],
    ['Name' => $country, 'Value' => $countrycode]),
    'ExternalReference' => $reference); // data u want to post                                                                   
    $idvdata_string = json_encode($idvdata);                                                                                   
                                                                                          
    $ch1 = curl_init(); 
    curl_setopt($ch1, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/IDV?sessionid={$usersession}");    
    curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch1, CURLOPT_POST, true);                                                                   
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $idvdata_string);                                                                 
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                       
    );             
                                                                                                                                                                                                              
    $resultidv = curl_exec($ch1);
    $returnidv = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
    curl_close($ch1);
    $idvresults = json_decode($resultidv, true);
    $idvtracking = $idvresults[TrackingID];
    // echo $returnCode;
    // var_dump($errors);  
    //  print_r(json_decode($resultidv, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
       
    // header('Location:../dashboard/idv.php');
    // echo $usersession;
    // Go to sleep and wait for data to be ready 
    // sleep(6);

    $IDVResultType = 'Both';
    $idvgetresult = array('ResultType' => $IDVResultType);
    $idvgetresult_string = json_encode($idvgetresult);                                                                                  
                                                                                          
    $ch2 = curl_init(); 
    curl_setopt($ch2, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$idvtracking}?sessionid={$usersession}");    
    curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch2, CURLOPT_POST, true);                                                                   
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $idvgetresult_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch2, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             
    
    // $idvmaxTries = 200;
    
    $idvresult_out = curl_exec($ch2);
    $returnidvresult = (int)curl_getinfo($ch2, CURLINFO_HTTP_CODE);
    // curl_close($ch1);
    $idvreport = json_decode($idvresult_out, true);
    while($idvreport[State]['Request'][2] == 'Requested check is not completed yet!') {
        $idvresult_out = curl_exec($ch2);
        $returnidvresult = (int)curl_getinfo($ch2, CURLINFO_HTTP_CODE);
        // curl_close($ch1);
        $idvreport = json_decode($idvresult_out, true);
        if($idvreport[Check][Result] == 'Completed')break;
            // echo 'working';
            // curl_close($ch1);
    }


        // for ($idvtry=0; $idvtry<=$idvmaxTries; $idvtry++) {    
        //     if( $idvreport[State][Request][2] = 'Requested check is not completed yet!') {
        //     sleep(2);
        //     $idvresult_out = curl_exec($ch2);
        //     $returnidvresult = (int)curl_getinfo($ch2, CURLINFO_HTTP_CODE);
        //     $idvreport = json_decode($idvresult_out, true); 
        //     $idvtry++;
        //     if($idvreport[Check][Result] = 'Completed') {
        //         $idvreport = json_decode($idvresult_out, true); 
        //         curl_close($ch2);
        //         break;
        //         }
        //     }
        //     elseif($idvreport[Check][Result] = 'Completed') {
        //         $idvreport = json_decode($idvresult_out, true); 
        //         curl_close($ch2);
        //         break;
        //         // exit();
        //         // echo 'working';
        //      }   
            
        // }
        
        // curl_close($ch2);
        //  print_r(json_decode($idvresult_out, false));

     
    // echo $returnCode;
    // var_dump($errors);
    
    //  print_r(json_decode($result_out, false)); // Testing if I get a result back

    $ResultDate = $idvreport[Check]['ResultDate'];
    $CheckGender = $idvreport[DataFields][7]['Value'];
    $CheckIDNumber = $idvreport[DataFields][0]['Value'];
    $Title = $idvreport[DataFields][1]['Value'];
    $Name = $idvreport[DataFields][2]['Value'];
    $CheckSurname = $idvreport[DataFields][3]['Value'];
    $Birthdate = $idvreport[DataFields][6]['Value'];
    $LivingStatus = $idvreport[DataFields][5]['Value'];
    $Report = $idvreport[Report];
    $pdfReport = base64_decode($Report);
    file_put_contents('reports/IDV-report.pdf', $pdfReport);
}
?>
<!-- END IDV Check -->

