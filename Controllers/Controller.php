<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Sentinel;
use App\Classes\easyphpthumbnail;
use View;
use \Carbon\Carbon ;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use DB;
use PDO;
use Yajra\Pdo\Oci8;
use Response;
use App\Http\Controllers\BondsController;
use Notification;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

 protected $notNegotiate = "img/logo-10.png";





   public  $stockinarchivepath;
   public  $stockinarchivethumbpath;
   public  $stockinarchiveRecyclepath;
   public  $stockinarchiveRecyclepaththumb;

  
  
   public function __construct()
    {
		
		$this->connection_main="stock_con";


		
	

  
         $this->stockinarchivepath=config('global.qnap').config('global.stockinarchivepath');
         $this->stockinarchivethumbpath=config('global.qnap').config('global.stockinarchivethumbpath');
         $this->stockinarchiveRecyclepath=config('global.qnap').config('global.stockinarchiveRecyclepath');
         $this->stockinarchiveRecyclepaththumb=config('global.qnap').config('global.stockinarchiveRecyclepaththumb');


    }


	
	
	


    /////////////////////////////////////////////////////////////////////////////////////

    public function database_date(){

    $data = DB::connection('stock_oracle')->table('dual')->select(DB::raw("to_char (sysdate ,'yyyy-mm-dd') d")
     , DB::raw("to_char (sysdate ,'yyyy') y "),DB::raw(" to_char (sysdate ,'mm') m"))->get();

    $return['month_data'] = $data[0]->m;
    $return['year_data']= $data[0]->y;

    return $return;


    }




    ///////////////////////////////////////////////////////////////////////////////////


     public function checkAccess($per,$url,$icon,$onclick,$title="",$target="_self")
     {  
      if( Sentinel::getUser()->hasAccess($per) )
      {
         if($icon === 'fa fa-users') {
        return '<a class="btn btn-info " onclick="'.$onclick.'"  href="'.$url.'"  ><i class="'.$icon.'"></i></a>';
         }
         if($icon === 'fa fa-edit') {
        return '<a class="btn btn-warning " onclick="'.$onclick.'"  href="'.$url.'" target="'.$target.'" ><i class="'.$icon.'"></i></a>';
         }
         else if($icon === 'fa fa-eye') {
        return '<a class="btn btn-success " onclick="'.$onclick.'"  href="'.$url.'"  ><i class="'.$icon.'"></i></a>';      
         }
         else if($icon === 'fa fa-print') {
        return '<a class="btn btn-info " onclick="'.$onclick.'"  href="'.$url.'" target="_blank" ><i class="'.$icon.'"></i></a>';     
         }

         else if($icon === 'fa fa-line-chart') {
          return '<a class="btn btn-warning " onclick="'.$onclick.'"  href="'.$url.'" target="_blank" ><i class="'.$icon.'"></i></a>';     
           }

           
		 else if($icon === 'icon-printer') {
        return '<a class="btn btn-warning " onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';     
         }
         else if($icon === 'add-new') {
         return '<button type="button" class="btn btn-circle btn-outline red dropdown-toggle" data-toggle="dropdown" onclick="'.$onclick.'"><i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs">'.$title.'&nbsp;</span>&nbsp;</button>';
         }
         else  if($icon === 'edit-current') {
         return '<button type="button" class="btn blue" data-dismiss="modal"  aria-hidden="true" onclick="'.$onclick.'">تعديل</button>';
         }
		 else  if($icon === 'add_check_right_pr') {
         return '<button id="add_check_right_pr" type="button" class="btn red" data-dismiss="modal"  aria-hidden="true" onclick="'.$onclick.'">اعتماد ووضع اشارة</button>';
         }
         else  if($icon === 'fa fa-trash') {
         return '<a class="btn btn-danger" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }

           else  if($icon === 'fa fa-camera') {
         return '<a class="btn btn-info" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }

           else  if($icon === 'fa fa-picture-o') {
         return '<a class="btn green" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }



           else  if($icon === 'fa fa-info') {
         return '<a class="btn btn-warning" onclick="'.$onclick.'"  href="'.$url.'"  target="'.$target.'" ><i class="'.$icon.'"></i></a>';
         }



else  if($icon === 'fa fa-unlock') {

         return '<a class="btn btn-warning" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }

else  if($icon === 'fa fa-lock') {

         return '<a class="btn btn-warning" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
         }

         else  if($icon === 'fa fa-stop') {

          return '<a class="btn btn-danger" onclick="'.$onclick.'"  href="'.$url.'"  target="'.$target.'"><i class="'.$icon.'"></i></a>';
          }

            



         return '<a class="btn btn-info" onclick="'.$onclick.'"  href="'.$url.'" ><i class="'.$icon.'"></i></a>';
      }
      return '';
     }

     public function filterText($text,$allow_space=false){

    $string=str_replace( 'أ', 'ا',str_replace( 'إ', 'ا',str_replace( 'آ', 'ا',str_replace( 'ة', 'ه',str_replace( 'ى','ي',$text)))));
    
    if(!$allow_space) $string=str_replace(  ' ', '%',$string);

    return $string;
     
}


 public function filterTextDB($colname,$allow_space=false){

      $string= " REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( $colname, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ة', 'ه'), 'ى', 'ي')";

    if(!$allow_space) $string=" REPLACE( ".$string.", ' ', '') ";

    return $string;
     
}


public function downloadLink($link){
return ' <a class="btn btn-primary btn-sm " href="'.$link.'" target="_blank"><i class="fa  fa-download"> </a>';

}


public function watermarkImage($path,$watermark='notNegotiate',$seen=true){
       //dd($_SERVER['REMOTE_ADDR']);
	  // if($_SERVER['REMOTE_ADDR']!='10.12.162.11') exit;
  
	   $checkServer=explode(">",$path);
	   $serverInfo=explode("_",$checkServer[0]);
	   
	   if($serverInfo[0]=='server')
	   {
     // echo "hi1";
		   $path=$checkServer[1];
		if(!is_dir($path) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));		   		   
	   }else if(!is_dir($path) &&  $_SERVER['SERVER_NAME']==config('global.win_server_ip'))
       {
 //echo "hi2";
        system( config('global.winqnapcmd'));
  
        }

//echo $path;
//exit;
   $username=Sentinel::getUser()->username;

  $easyThumb = new easyphpthumbnail;
  if(isset($_GET['print'])=='true')
  {
	  $easyThumb -> Thumbsize = 800;
      $easyThumb -> Quality = 80;
  }else
  {
    $easyThumb -> Thumbsize = 0;
    $easyThumb -> Quality = 100;
  }
    //$easyThumb -> Inflate = true; 
    if($watermark!='' && $watermark!='none' && $seen)
	 {
		// echo "hi2";
		// echo "hi";
	 	if($watermark=='notNegotiate') $watermark=$this->notNegotiate; 
		$easyThumb -> Addtext = array(
		  array(1,'pla.gov.ps - '.$username.' - ','50% 50%','',100,'#000000')
		);
		//$easyThumb -> Thumblocation = "";
		$easyThumb->Watermarkpng = $watermark;
		
		  $easyThumb->Watermarkposition = '50% 50%';
		  $easyThumb->Watermarktransparency = 40;
	 }else {
		// echo "hi1";
		// exit;
		if($watermark=='notNegotiate') $watermark=$this->notNegotiate; 
		$easyThumb -> Addtext = array(
		  array(1,'','50% 50%','',100,'#000000')
		);
		 
	 }
     //echo $path;
    $creatThumb=false;
    if($serverInfo[0]=='server')
     {
		 //echo "hi123654";
       /*$mainPath=$checkServer[1];
       
       $mainPath=str_replace('server_'.$serverInfo[1].'>','',$path);
       
       $storageDisk=Storage::disk();*/
       if (file_exists($path)) $creatThumb=true;
     }else 
     {
		 //echo "hi999999";
       $path=str_replace(config('global.qnap'),config('global.localqnap'),$path);
	   $path=str_replace(config('global.qnap_root'),config('global.localqnaproot'),$path);
       $easyThumb -> islocal = true;
		
       $storageDisk=Storage::disk('local');
       if($storageDisk -> exists($path)) {$creatThumb=true;}
       $data= $storageDisk->get($path);
	   //dd('101010');
       $path = 'data://application/octet-stream;base64,'  . base64_encode($data);
     }
	//echo $path; 
	//exit;
    if ($creatThumb) $easyThumb -> Createthumb($path,'screen');
	else echo "File Not found";
    exit;

 }
  
  public function uniqIdGenerator()
  {
    return str_replace('.','_',uniqid(mt_rand().'_',true));
  }

  public function uploadeImage($mainPath,$thumbPath,$files,$external_upload=false)
  {


    //echo $mainPath;
    //exit;
    //if($_SERVER['REMOTE_ADDR']!='10.12.162.11') exit;

  //  exit;
  //  echo $mainPath;
  //  exit;
      ini_set('memory_limit','256M');
      $dt = Carbon::now();

      $current = Carbon::now();
  
      $newformat = $current->format('d/m/y');
  
      $user_id=Sentinel::getUser()->id;
      /////////////////////////////
      $data_date= $this->database_date();
     
      $month=intval($data_date['month_data']);
      $arch_year=intval($data_date['year_data']);
/////////////////////////////////////////////////
     // $arch_year=Carbon::createFromFormat('Y-m-d H:i:s', $current)->year;
     // $month=Carbon::createFromFormat('Y-m-d H:i:s', $current)->month;
      $ipaddress=$_SERVER['REMOTE_ADDR'];
       
	   $checkServer=explode(">",$mainPath);
	   $serverInfo=explode("_",$checkServer[0]);
	   
	   if($serverInfo[0]=='server')
	   {
		   $mainPath=$checkServer[1];
		   if(!is_dir($mainPath) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));		   
		   $thumbPath=str_replace('server_'.$serverInfo[1].'>','',$thumbPath);
		   $storageDisk=Storage::disk();
		   $storageDisk1=Storage::disk('local');
	   }else
	   {

          if($external_upload){
            $mainPath1=str_replace(config('global.qnap'),config('global.localqnapexternal'),$mainPath);
		    $thumbPath1=str_replace(config('global.qnap'),config('global.localqnapexternal'),$thumbPath);
			$storageDisk1=Storage::disk('local');

          }

            $mainPath=str_replace(config('global.qnap'),config('global.localqnap'),$mainPath);
		    $thumbPath=str_replace(config('global.qnap'),config('global.localqnap'),$thumbPath);
			$storageDisk=Storage::disk('local');
		
	   }
	   
      foreach($files as $file) {

      	if($external_upload){
              $destinationPath1 = $mainPath1."$arch_year/$month/";
              $destienationThumb1= $thumbPath1."$arch_year/$month/";

      	}

          $destinationPath = $mainPath."$arch_year/$month/";
          $destienationThumb= $thumbPath."$arch_year/$month/";

          	if($external_upload){

          	 if(!$storageDisk1 -> exists($destinationPath1)) $storageDisk1 -> makeDirectory($destinationPath1);

    
      
      if(!$storageDisk1 -> exists($destienationThumb1)) $storageDisk1 -> makeDirectory($destienationThumb1);	


          	}
      
      if(!$storageDisk -> exists($destinationPath)) $storageDisk -> makeDirectory($destinationPath);

    
      
      if(!$storageDisk -> exists($destienationThumb)) $storageDisk -> makeDirectory($destienationThumb);
      // echo $file->getExtension();exit;
      
          $fileName = $file->getClientOriginalName();
          $sourceFilePath = $file->getPathname()."/";
          // exit;
          $file_exe = $file->getClientOriginalExtension();
          $type=$file->getClientMimeType();
          $size=$file->getClientSize();
          $new_name = $this->uniqIdGenerator().'.'.$file_exe;
         // $file->move($destinationPath, $new_name);
   $storageDisk -> put( $destinationPath.$new_name, file_get_contents($file -> getRealPath()));
   if($external_upload){
    $storageDisk1 -> put( $destinationPath1.$new_name, file_get_contents($file -> getRealPath()));}
          
      if( ($file_exe=='JPG' || $file_exe=='PNG'  || $file_exe=='GIF' || $file_exe=='jpg' || $file_exe=='png' || $file_exe=='gif' ) )
          {  
             $thumb=Image::make($file -> getRealPath())->resize(150,150);
        $storageDisk -> put( $destienationThumb.$new_name, $thumb->encode());
  if($external_upload){
        $storageDisk1 -> put( $destienationThumb1.$new_name, $thumb->encode());
      }

          }
          $info[]=array('fileName'=>$fileName,'type'=>$type,'file_exe'=>$file_exe,'size'=>$size,'new_name'=>$new_name,'user_id'=>$user_id,'arch_year'=>$arch_year,'month'=>$month,'ipaddress'=>$ipaddress,'destinationPath'=>$destinationPath);
        }
        return $info;
  }




  
 
  public function readFolderDirectory($dir  , $type) { 
     $checkServer=explode(">",$dir);
     $serverInfo=explode("_",$checkServer[0]);
     
	 if($serverInfo[0]=='server'){
       $dir=str_replace('server_'.$serverInfo[1].'>',config('global.localqnap'),$dir);
     }else{
      	$dir=str_replace(config('global.qnap'),config('global.localqnap'),$dir);
	    $dir=str_replace(config('global.qnap_root'),config('global.localqnaproot'),$dir);
     }
//dd($dir);

     if(!Storage::disk('local')->exists($dir)){
     	echo "Sorry. There is no photo copy for this contract222266999";
      	exit;
      	return false;
     }
    
     if($type == "file"){
        $files =Storage::disk('local')->files($dir);
        return $files; 
     }else{ 
	 	$directories =Storage::disk('local')->directories($dir);
        return $directories; 
	}
  } 

  public function deleteImage($mainPath,$thumbPath,$recpinMainPath,$recpinThumbPath,$imgname,$imgext)
  { 
  	return;
		$checkServer=explode(">",$mainPath);
	   $serverInfo=explode("_",$checkServer[0]);
		if($serverInfo[0]=='server')
	   {
		   $mainPath=$checkServer[1];
		   if(!is_dir($mainPath) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));
		   
		   $thumbPath=str_replace('server_'.$serverInfo[1].'>','',$thumbPath);
		   $recpinMainPath=str_replace('server_'.$serverInfo[1].'>','',$recpinMainPath);
		   $recpinThumbPath=str_replace('server_'.$serverInfo[1].'>','',$recpinThumbPath);
		   $storageDisk=Storage::disk();
	   }else 
	   {
		   $mainPath=str_replace(config('global.qnap'),config('global.localqnap'),$mainPath);
		   $thumbPath=str_replace(config('global.qnap'),config('global.localqnap'),$thumbPath);
		   $recpinMainPath=str_replace(config('global.qnap'),config('global.localqnap'),$recpinMainPath);
		   $recpinThumbPath=str_replace(config('global.qnap'),config('global.localqnap'),$recpinThumbPath);
		   $storageDisk=Storage::disk('local');
	   }
  
    
   if(!$storageDisk -> exists($recpinMainPath)) $storageDisk -> makeDirectory($recpinMainPath);

   $storageDisk -> move($mainPath.$imgname, $recpinMainPath.$imgname);
    
   if( ($imgext=='JPG' || $imgext=='PNG'  || $imgext=='GIF' || $imgext=='jpg' || $imgext=='png' || $imgext=='gif' ) )  {
   // echo str_replace(config('global.qnap'),config('global.localqnap'),$recpinThumbPath);
   // exit;
          if(!$storageDisk -> exists($recpinThumbPath)) $storageDisk -> makeDirectory($recpinThumbPath);
          
      $storageDisk -> move($thumbPath.$imgname, $recpinThumbPath.$imgname);
     }
  }


  public function downloadFile($path,$filename,$ext,$status=false){
	  
	  if($status ==true){
		  
		     $path=str_replace(config('global.qnap'),config('global.localqnapexternal'),$path);
    $checkServer=explode(">",$path);
     $serverInfo=explode("_",$checkServer[0]);
    if($serverInfo[0]=='server')
     {
       $path=$checkServer[1];
       if(!Storage::disk('local')-> exists($path) && config('global.server'.$serverInfo[1].'type')=='remote') 
		   system(config('global.server'.$serverInfo[1].'cmd'));           
     
     }else if(!Storage::disk('local')-> exists($path) &&  $_SERVER['SERVER_NAME']==config('global.win_server_ip'))
       {

        system( config('global.winqnapcmd'));
  
        }
    if (Storage::disk('local')-> exists($path)) {
    
    	  $filecontent= Storage::disk('local')->get($path);
           return Response::make($filecontent, '200', array(
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"'
            ));
     
      
    //--------------------------------------
  }else return "File Not found";
		  

	  }else{
	   $path=str_replace(config('global.qnap'),config('global.localqnap'),$path);
    $checkServer=explode(">",$path);
     $serverInfo=explode("_",$checkServer[0]);
    if($serverInfo[0]=='server')
     {
       $path=$checkServer[1];
       if(!Storage::disk('local')-> exists($path) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));           
     
     }else if(!Storage::disk('local')-> exists($path) &&  $_SERVER['SERVER_NAME']==config('global.win_server_ip'))
       {

        system( config('global.winqnapcmd'));
  
        }
    if (Storage::disk('local')-> exists($path)) {
    
    	  $filecontent= Storage::disk('local')->get($path);
           return Response::make($filecontent, '200', array(
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"'
            ));
     
      
    //--------------------------------------
  }else return "File Not found";
  
  
  
	  }

  }






  public function get_content_file($path,$filename,$ext){
     $path=str_replace(config('global.qnap'),config('global.localqnap'),$path);
    
    $checkServer=explode(">",$path);
     $serverInfo=explode("_",$checkServer[0]);
    if($serverInfo[0]=='server')
     {
       $path=$checkServer[1];
       if(!Storage::disk('local')-> exists($path) && config('global.server'.$serverInfo[1].'type')=='remote') system(config('global.server'.$serverInfo[1].'cmd'));           
     
     }else if(!Storage::disk('local')-> exists($path) &&  $_SERVER['SERVER_NAME']==config('global.win_server_ip'))
       {

        system( config('global.winqnapcmd'));
  
        }
           // echo $path;
    if (Storage::disk('local')-> exists($path)) {

 
      return  $filecontent= Storage::disk('local')->get($path);
          
      
    //--------------------------------------
  }else return "File Not found";

  }
  //-----------------------------------------
  public function curlGetData($url) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  //curl_setopt($ch, CURLOPT_PROXY, '10.12.0.32');
  //curl_setopt($ch, CURLOPT_PROXYPORT, '80');
  $html = curl_exec($ch);
  $redirectURL = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
  curl_close($ch);
  return $html;
}





public static function word_cut($text,$from,$to,&$str)
{
	//echo "(".$str.")";
	//echo $text;
	$text=trim($text);
	$text=$str.$text;
	$text=strip_tags($text);
	$oldtext=$text;
	//echo '('.mb_strlen($text).'-'.$from.')';
	$totalLength=mb_strlen($text);
	if($totalLength<=$to) return $text;
	$text=mb_substr($text,$from,$to);
	$afterLength=mb_strlen(mb_substr($oldtext,$from+$to,$to));
	//echo '('.($from+$to).'-'.$afterLength.')';
	if($afterLength<=0) return $text;
	$stop=0;	
	//echo '('.mb_substr($text, -1).')';
	$str='';
	while(mb_substr($text, -1)!=' ')
	{
		$str=mb_substr($text, -1).$str;
		$text=mb_substr($text, 0, -1);	
		//echo 
	}
	//echo "(".$str.")";
	return $text;
}

public static function word_cut2($text,$from,$to)
{
  //echo "(".$str.")";
  //echo $text;
  $text=trim($text);
  $text=$text;
  $text=strip_tags($text);
  $oldtext=$text;
  //echo '('.mb_strlen($text).'-'.$from.')';
  $totalLength=mb_strlen($text);
  if($totalLength<=$to) return $text;
  $text=mb_substr($text,$from,$to);
  $afterLength=mb_strlen(mb_substr($oldtext,$from+$to,$to));
  //echo '('.($from+$to).'-'.$afterLength.')';
  if($afterLength<=0) return $text;
  $stop=0;  
  //echo '('.mb_substr($text, -1).')';
  while(mb_substr($text, -1)!=' ')
  {
    $text=mb_substr($text, 0, -1);  
    //echo 
  }
  //echo "(".$str.")";
  return $text;
}



}
