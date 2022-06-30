<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use \App\User;
use DB;
class NotificationController extends Controller
{
    //

    public function mark_as_read($id){
    	$user_id=Sentinel::getUser()->id;
    	$user=User::find($user_id);
    	$notification = $user->notifications()->where('id',$id)->first();
        // dd($notification);
    	if ($notification){
            $noty = DB::connection("stock_con")
                    ->update("update notifications set counter_seen = 1 , read_at=sysdate where id = ? " , [$id]);
    	   $url=$notification->data['url'];
    	   return redirect("$url");}
    	else {
    		return back();
    	}
    }
    public function mark_as_read_all(){
        $user_id=Sentinel::getUser()->id;
        $user=User::find($user_id);
        $notification = $user->notifications;

        // $date = date('Y/m/d');
        foreach ($notification as $i => $notification_row) {
            $noty = DB::connection("stock_con")
                    ->update("update notifications set counter_seen = 1 , read_at=sysdate where id = ? " , [$notification_row->id]);
        }
        return 'done';
    }

    public function counter_seen(){
      $notifiable_id = Sentinel::getUser()->id;
        $noty = DB::connection("stock_con")
                ->update("update notifications set counter_seen = 1 where notifiable_id = ? " , [$notifiable_id]);
        
    }
}
