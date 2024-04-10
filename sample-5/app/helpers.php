<?php
 
use Carbon\Carbon;
use GuzzleHttp\Client;
 
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use Illuminate\Support\Str; 
# GET WEBSITE CLIENT DATA FROM REDIS
 

  
 

 
 





 function uploadFileWithAjax23($path,$file)
 {

                    $timestamp = time().str::random(5);
                    $hash = explode(' ',$file->getClientOriginalName());
                    $OriginalName = implode("",$hash);
                    $hash2 = explode('-',$OriginalName);
                    $OriginalName2 = implode("",$hash2);
                    $name = $timestamp. '' .$OriginalName2;  
                    if($file->move($path, $name)) {
                         return $path.$name;
                        
                    }else{

                        return 0;
                    }
}


function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function pr($var) {
  	echo '<pre>';
	print_r($var);
  	echo '</pre>';
    exit();
}
 

   