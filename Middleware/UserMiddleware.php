<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Request;
use \App\Tracking_user;
use \App\Menu;
use View;
use \App\User;
use DB;
use PDO;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */




public function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');;
}



    public function handle($request, Closure $next,$permission,$tracking='default')

    {



//echo Sentinel::getUser();


$user=Sentinel::getUser();




       
       view()->share('g_perm', $permission); //}

        
       	
		$menuPer=Menu::where('slug','=',"$permission")->get(); 
         
        if(Sentinel::check() && ($user->hasAccess($permission) || $permission == 'index' || $menuPer[0]->ignore_permission==1)) {
			$userData=User::find($user->id);      

	  
        return $next($request);
    }
        else return redirect ('/login');
        
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
}