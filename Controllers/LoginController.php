<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use DB;
use PDO;
class LoginController extends Controller
{
    //

    public function login(){


    	return view('admin.auth.login');
    }

    public function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');;
}

    public function get_mac($REMOTE_ADDR){
      $macs = explode(' ', exec('arp -a '.$REMOTE_ADDR));
    //dd($macs);
      $mac = '';
      if(isset($macs)){
        if(isset($macs[12])) if($macs[12]!='') $mac = $macs[12];
        else if(isset($macs[11])) if($macs[11]!='') $mac = $macs[11];
      }
      return $mac;
    }
////////////////////////////////////////////////////////
    public function postLogin(Request $request){
  //    echo $request['redirect'];
   //   exit;


   try 	{

 $data=[
    "login"=>$request['email'],
    "password"=>$request['password']


 ];
    if(Sentinel::authenticate($data)){


/**************************/
$ip_in=\Request::ip();
  $browser_in= $_SERVER['HTTP_USER_AGENT'] . "\n\n";
  $user_id_in=Sentinel::getUser()->id;
  $screen_name=explode('?', $_SERVER['REQUEST_URI'], 2);

 // $query_string_in=$this->utf8_urldecode($query_string);
  $screen_name_in=$this->utf8_urldecode($screen_name[0]);
  $permission_in='';
  $method_data= explode('@', \Request::route()->getActionName());
  $con_name_in=preg_replace('/.*\\\/', '', $method_data[0]);
  $fun_name_in=$method_data[1];
  $permission_id_in='';
  $req_method_in= $_SERVER['REQUEST_METHOD'];
  //$req_data_in=$this->utf8_urldecode($all_request);
 // $req_data_in='';
  $mac_add_in=$this->get_mac($_SERVER['REMOTE_ADDR']);
  $url_id_in=417;

/*

$pdof2=DB::connection('tracking')->getPdo();
  $stmtf2=$pdof2->prepare("begin TRACKING_PKG_NEW.ADD_TRACKING_USERS_PR ( :IP_IN, :BROWSER_IN, :USER_ID_IN, 
  :SCREEN_NAME_IN, :PERMISSION_IN, :FUN_NAME_IN, :CON_NAME_IN, :PERMISSION_ID_IN, :REQ_METHOD_IN, :MAC_ADD_IN, :URL_ID_IN, :P_ID_OUT  ); end;");

  $stmtf2->bindParam(':ip_in', $ip_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':BROWSER_IN', $browser_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':USER_ID_IN', $user_id_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':SCREEN_NAME_IN', $screen_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':PERMISSION_IN', $permission_in , PDO::PARAM_STR,2000);
    $stmtf2->bindParam(':FUN_NAME_IN', $fun_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':CON_NAME_IN', $con_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':PERMISSION_ID_IN', $permission_id_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':REQ_METHOD_IN', $req_method_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':MAC_ADD_IN', $mac_add_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':URL_ID_IN', $url_id_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':P_ID_OUT', $p_id_out2, PDO::PARAM_STR,2000);
    $stmtf2->execute();
*/


/************************/




       $user=Sentinel::getUser();
       setcookie('userid', $user->id, time()+3600*24*30, "/");
      setcookie('useridentitiy', $user->username, time()+3600*24*30, "/");

         setcookie('userfullname', $user->full_name, time()+3600*24*30, "/");



      if(!empty($request['redirect'])){

      return redirect($request['redirect']);

      }

    else {return redirect('/'); }

    } else {
     return redirect()->back()->with(['error'=>'الرجاء التأكد من اسم المستخدم وكلمة المرور']);

    }

} catch (ThrottlingException $e){
	$delay=$e->getDelay();

  return redirect()->back()->with(["error"=>" انت ممنوع من تسجيل الدخول ل $delay ثانية"]);
}
    
    }
////////////////////////////////////////////
    public function logout(){


        setcookie('userid', '', time()+3600*24*30, "/");
        setcookie('useridentitiy','', time()+3600*24*30, "/");
        setcookie('userfullname','', time()+3600*24*30, "/");

  

    /**************************/
$ip_in=\Request::ip();
  $browser_in= $_SERVER['HTTP_USER_AGENT'] . "\n\n";
  $user_id_in=Sentinel::getUser()->id;
  $screen_name=explode('?', $_SERVER['REQUEST_URI'], 2);

 // $query_string_in=$this->utf8_urldecode($query_string);
  $screen_name_in=$this->utf8_urldecode($screen_name[0]);
  $permission_in='';
  $method_data= explode('@', \Request::route()->getActionName());
  $con_name_in=preg_replace('/.*\\\/', '', $method_data[0]);
  $fun_name_in=$method_data[1];
  $permission_id_in='';
  $req_method_in= $_SERVER['REQUEST_METHOD'];
  //$req_data_in=$this->utf8_urldecode($all_request);
 // $req_data_in='';
  $mac_add_in=$this->get_mac($_SERVER['REMOTE_ADDR']);
  $url_id_in=428;

/*

$pdof2=DB::connection('tracking')->getPdo();
  $stmtf2=$pdof2->prepare("begin TRACKING_PKG_NEW.ADD_TRACKING_USERS_PR ( :IP_IN, :BROWSER_IN, :USER_ID_IN, :SCREEN_NAME_IN, :PERMISSION_IN, :FUN_NAME_IN, :CON_NAME_IN, :PERMISSION_ID_IN, :REQ_METHOD_IN, :MAC_ADD_IN, :URL_ID_IN, :P_ID_OUT  ); end;");

  $stmtf2->bindParam(':ip_in', $ip_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':BROWSER_IN', $browser_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':USER_ID_IN', $user_id_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':SCREEN_NAME_IN', $screen_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':PERMISSION_IN', $permission_in , PDO::PARAM_STR,2000);
    $stmtf2->bindParam(':FUN_NAME_IN', $fun_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':CON_NAME_IN', $con_name_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':PERMISSION_ID_IN', $permission_id_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':REQ_METHOD_IN', $req_method_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':MAC_ADD_IN', $mac_add_in, PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':URL_ID_IN', $url_id_in , PDO::PARAM_STR,2000);
  $stmtf2->bindParam(':P_ID_OUT', $p_id_out2, PDO::PARAM_STR,2000);
    $stmtf2->execute();

*/

/************************/





        Sentinel::logout();




     if(isset($_GET['redirect'])){
      return redirect($_GET['redirect']);
        
      }else{
    return redirect('/login');	
    }
  }


///////////////////////////////////////////
function user_img($id_num){


$data=DB::connection("stock_con")->select("select *  from  users where username=?",[$id_num]);

if(count($data)){

return $data;
}else{
 return [];

}




}  

/////////////////////////////////////////////////  
}
