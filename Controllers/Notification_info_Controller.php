<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Notification_info;
use Yajra\Datatables\Datatables;
use Sentinel;
use Carbon\Carbon;
use DB;

class Notification_info_Controller extends Controller
{
    //



 public function create(){

 	return view('admin.notification.notification_operations');
 }


 public function store(Request $request){

 $this->validate($request, [

            'n_title'=>'required',
            'n_details'=>'required',
            'n_url'=>'required',
            ],[

            'n_title.required'=>'الرجاء ادخال العنوان',
            'n_details.required'=>'الرجاء ادخال التفاصيل',
            'n_url.required'=>'الرجاء ادخال الرابط',
             ]);

 $data = [
    'n_title'    => $request->n_title,
    'n_details' => $request->n_details,
    'n_url' => $request->n_url ];

  $notification_info = new Notification_info();
    if ($notification_info::create($data)){ 
     $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
     return  $return;

     }
     else {

     	$return=["result"=>"error","response"=>"حدث خطأ فى عملية الاضافة"];
     return  $return;

     }



 }

////////////////////////////////////////////////////////////

 public function index(){

 	return view ('admin.notification.notification_list');

 }
 /////////////////////////////////////////////
 public function notification_list(){
    $notifications_infos = Notification_info::select(['id','n_title','n_details','n_url']);
        return Datatables::of($notifications_infos)
        ->addColumn('edit', function ($notifications_info) {
            return '<a class="btn btn-primary btn-sm "  href="notification/'.$notifications_info->id.'" ><i class="fa fa-pencil"></i></a>';
        })
        ->make(true);
    }

 ////////////////////////////////////////////////////
 public function show($id){
 $notification_info=Notification_info::find($id);
 return view ('admin.notification.notification_operations',compact('notification_info'));

 }  

 public function update(Request $request,$id){
$notification_info=Notification_info::find($id);
$notification_info->n_title=$request->n_title;
$notification_info->n_details=$request->n_details; 	
$notification_info->n_url=$request->n_url;

if($notification_info->save()){
 $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
     return  $return;

}else {

	$return=["result"=>"erroe","response"=>"حدث خطأ فى عملية التعديل"];
     return  $return;
}


 }
 ///////////////////////////////////////////////////// 

 public function nuread_notification(){
    $user_id= Sentinel::getUser()->id; 
    $user =\App\User::find($user_id);
    return $user->unreadNotifications()->whereNull('counter_seen')->count();
 }
 ///////////////////////////////////////////////////// 

 public function notify_counters(){
    $user_id= Sentinel::getUser()->id; 
    $user =\App\User::find($user_id);
	
	
	
	
    $counters['unread_notification'] = $user->unreadNotifications()->whereRaw("(TO_DATE(TO_CHAR(SYSDATE,'YYYY-mm-dd'),'YYYY-mm-dd')-TO_DATE(TO_CHAR(CREATED_AT,'YYYY-mm-dd'),'YYYY-mm-dd'))<=1")->where('read_at' , null)->count();
	


    $date_now =  Carbon::now();

    $counters['unread_notification_data'] = DB::connection("stock_con")
                    ->select("select * from notifications where read_at is null and next_alert <= sysdate and notifiable_id = ? " , [$user_id]);

  
	
	return $counters;


 }





/////////////////////////////////////////////////////// 
 public function unread_notification_display(){
    $user_id= Sentinel::getUser()->id; 
    $user =\App\User::find($user_id);
    $noty = DB::connection("stock_con")->select("select * from ( select * from notifications where notifiable_id = ? and (TO_DATE(TO_CHAR(SYSDATE,'YYYY-mm-dd'),'YYYY-mm-dd')-TO_DATE(TO_CHAR(CREATED_AT,'YYYY-mm-dd'),'YYYY-mm-dd'))<=1 order by CREATED_AT desc ) where ROWNUM <= 10" , [$user_id]);
    return $noty;
 }

 /////////////////////////////////////////////
    public function notification_all(){
       return view ('admin.notification.notification_all');
    }

    public function notification_all_post(){
        $user_id= Sentinel::getUser()->id;
        $noty = DB::connection("stock_con")
                ->table('notifications')
                ->where('notifiable_id' , $user_id)
                
                ->orderby('CREATED_AT' , 'desc');

        return Datatables::of($noty)
        ->addColumn('read_or', function ($data) {
            $read = '<a><i class="fa fa-circle-o" aria-hidden="true"></i></a>';
            // dd($data);
            if($data->read_at == null){
                $read = '<a><i class="fa fa-circle" aria-hidden="true"></i></a>';
            }
            return $read;
        })
        ->addColumn('n_title', function ($data) {
            $item = json_decode($data->data);
            // dd($item->title);
            return $item->title;
        })
        ->addColumn('n_details', function ($data) {
            $item = json_decode($data->data);

            return $item->details;
        })
        ->addColumn('n_url', function ($data) {
            $item = json_decode($data->data);
            return $item->url;
        })
        ->addColumn('edit', function ($data) {
            $url = url('/notifications').'/';
            return '<a class="btn btn-primary btn-sm "  href="'.$url.$data->id.'" ><i class="fa fa-link"></i> مشاهدة</a>';
        })
        ->make(true);
    }

}
