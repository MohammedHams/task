<?php

namespace App\Http\Controllers\store;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use \Carbon\Carbon ;
use Sentinel;
use Image;
use File;
use App\Classes\easyphpthumbnail;
use Notification;
use PDO;

class StockStoreController extends Controller{

   public function view_new_order(){
   	$orders=DB::connection('stock_con')->select("select * from stock_ITEM_CLASS ORDER BY CLASS_NAME ASC");
   	$items=DB::connection('stock_con')->select("select * from stock_item_vw order by ITEM_NAME ASC");
    $npla_departments=DB::connection("stock_con")->select("select *  from  npla_departments");
   
    return view("admin.stockstore.add_store",compact('orders','items','npla_departments'));

   }




public function order_data(Request $request){

	$class_name = $request->class_name;
	$item_name=$this->filterText($request->item_name);
    $items = DB::table('stock_item_vw')
    ->join('stock_item_class', 'stock_item_vw.ITEM_CLASS', '=', 'stock_item_class.class_id')
    ->select('stock_item_vw.item_id_pk','stock_item_vw.item_name','stock_item_class.class_name');
	if (!empty($class_name) ){
		$items->whereRaw("ITEM_CLASS = ?", ["$class_name"]);
	}

	if (!empty($item_name) ){
		$items->whereRaw($this->filterTextDB('stock_item_vw.item_name')." like ?", ["%{$item_name}%"]);
	}

	 return  Datatables::of($items->get()) 
       ->addColumn('choose', function ($item) {
        // $(\'.item_id_pk\').index(this) index of checkbox
         return  '<input type="checkbox" value="'.$item->item_id_pk.','.$item->item_name.'" class="item_id_pk" name="item_id_pk[]" onclick="add_order($(\'.item_id_pk\').index(this) ,this )" >'  ;
        })
     ->addColumn('order_num', function ($item) {
         return  '<input type="number"   name="num[]" class="form-control input-xsmall num" value="1">  '  ;
        })

         ->make(true);

}




  //////////////////// تأكيد اننى كموظف اريد الطلبية ///////////////////
   public function confirm_order_data (Request $request){


if($request->store_keeper ==1){

$this->validate($request, [

           
            'dep'=>'required',
          
         
           
            ],[
            'dep.required'=>'الرجاء   اختيار   القسم   المصروف   له  الطلبية  ',
           
           

            ]); 


}

    $current = Carbon::now();
   $year=Carbon::createFromFormat('Y-m-d H:i:s', $current)->year;
    // عدد العناصر التى يحتاجون لها 
    $number_needed = $request->number_needed;
    //العناصر التى يحتاجونها
    $item_needed=$request->item_needed;
    $note_needed=$request->note_needed;
   
    // الشخص المدخل
    $user_id=Sentinel::getUser()->id;
    // القسم 

if($request->store_keeper ==1){

  $dep=$request->dep;

 }else{

    $dep=Sentinel::getUser()->dep;
 }   


    $user_name=Sentinel::getUser()->username;
    if( empty($item_needed[0])  ||  empty($number_needed[0]) ) {

       $return=["result"=>"error","response"=>"الرجاء ادخال الطلبية بشكل صحيح"];
       return  $return;

    }

     $last_serial_num=DB::connection('stock_con')->table('STOCK_ORDER_TB')
                                          ->where("years","=",$year)
                                           ->max('serial_num');


     
$last_serial_num =$last_serial_num+1;

   $number_of_order = DB::connection('stock_con')->insert(
  "insert into STOCK_ORDER_TB(USER_ID,DEPT,doc_num,serial_num,years,date1) values(?,?,?,?,?,sysdate)",
    [$user_id,$dep,$user_name,$last_serial_num,$year]
);

if($number_of_order){
    $lastInsertid=DB::connection('stock_con')->table('STOCK_ORDER_TB')
                                          ->where("doc_num","=",$user_name)
                                          ->where("dept","=",$dep)
                                          ->where("years","=",$year)
                                           ->max('id');

//echo $lastInsertid;
//exit;
  
            foreach ($item_needed as $key => $value) {

              if( empty($item_needed[$key])  ||  empty($number_needed[$key]) ) {


              }
              else {
                $save_order=DB::connection('stock_con')->insert("insert into stock_ITEM_ORDER(item_id_pk,NEED1,ORDER_NUM,order_year,note1) values(?,?,?,?,?)",[$item_needed[$key],$number_needed[$key],$lastInsertid,$year, $note_needed[$key]]); 

              }

            }//end foreach

///////////////////////////notifications////////////////////////////////
 $role = Sentinel::findRoleBySlug('storekeeper');
       $users = $role->users()->with('roles')->get();
       
       foreach($users as $user)
       {
        $user_id=$user->id;
        $data=\App\User::find($user_id);
        Notification::send($data , new \App\Notifications\General_notification(21,$lastInsertid));

       }

//////////////////////////////////////////////////////////////            
       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح","id"=>"$lastInsertid"];
       return  $return;
 } // end number_of_order

  } // end function

 ////////////////////////////الطلبيات المصروفة//////////////////////  
  public function given_order(){
    $departments=DB::connection("stock_oracle")->select("select id,name from npla_departments");
    return view('admin.stockstore.order_given_list',compact('departments'));

  }
/*طلبيات غير */
  /////////////////////////////////////بينات الطلبات المصروفة////////////////////////
  public function given_order_data(Request  $request){

    $department=$request->department;
    $years=$request->years;
    $id=$request->id;
    $date1=$request->date1;
    $given_orders=DB::connection('stock_con')->table('STOCK_ORDER_TB')->select(DB::raw('to_char(date1,\'MM/DD/YYYY\')date1') ,'ID', DB::raw('to_char(date2,\'MM/DD/YYYY\')date2'),'active' , 'M_active'  , 'YEARS','serial_num' )->where('m_active','=',1);


    if (!empty($department) ){
    $given_orders->whereRaw("DEPT = ?", ["$department"]);
  }

  if (!empty($years) ){
    $given_orders->whereRaw("years = ?", ["$years"]);
  }

  if (!empty($id) ){
    $given_orders->whereRaw("serial_num = ?", ["$id"]);
  }

   if (!empty($date1) ){
     $given_orders->whereRaw("to_char(date1,'MM/DD/YYYY')"." like ?", ["%{$date1}%"]);
    
  }
    return  Datatables::of($given_orders->get())
    ->addColumn('order_num', function ($given_order) {
         return  $given_order->years."/".$given_order->serial_num  ;
        })
// هنا فى شوية تغيير 
     ->addColumn('print_order', function ($given_order) {
      $route=  url('/'); 
        return $this->checkAccess('store.given_order',$route.'/stock_store/order_report/'.$given_order->id,'fa fa-print','#');
        })

    ->make(true); 
  }
 ///////////////////////order_report///////////////////////////////////////// 
 public function order_report($order_id){
  $order=DB::connection('stock_con')->table('STOCK_ORDER_TB')
                                  ->select('id','years',DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),'user_id','dept','doc_num','serial_num')
                                  ->where('id','=',$order_id)
                                //  ->where('m_active','=',1)
                                  ->get();
  $dept=$order[0]->dept;
  $user_id=$order[0]->user_id;
  $user_name=$order[0]->doc_num;

  $department=DB::connection('stock_oracle')->table('npla_departments')
                                     ->select('name')
                                     ->where('id','=',$dept)
                                     ->get();
  $user=DB::connection('stock_oracle')->table('users')
                                ->select('first_name','last_name')
                                ->where('username','=',$user_name)
                                ->get();     
          // left or inner 19902  //20441 بجرب عليها                     
  $items=DB::connection('stock_con')->table('stock_item_order')
                                 ->leftjoin('stock_item_vw',
                                  'stock_item_order.item_id_pk',
                                  'stock_item_vw.item_id_pk')
                                 ->select('stock_item_order.id1',
                                  'stock_item_order.item_id_pk',
                                  'stock_item_order.need1',
                                  'stock_item_order.given1',
                                  'stock_item_order.order_num',
                                  'stock_item_order.order_year',
                                  'stock_item_vw.item_name',
                                  'stock_item_order.need1',
                                   'stock_item_order.note1',
                                  'stock_item_vw.class_name',
                                  'stock_item_vw.item_unit')
                                 ->where('order_num','=',$order_id)
                                 ->get();



  return view ('admin.stockstore.report.order_report',compact('order','department','user','items'));

 } 

////////////////////ungiven order//////////////////////
public function ungiven_order(){
  return view('admin.stockstore.order_ungiven_list');
}
////////////////////////////////////////// 
 public function ungiven_order_data(){
  $ungiven_lists=DB::connection('stock_con')->table('STOCK_ORDER_TB')
                                          ->select('ID','USER_ID','DEPT',DB::raw('to_char(date1,\'MM/DD/YYYY\')date1'),DB::raw('to_char(date1,\'MM/DD/YYYY\')date2'),'ACTIVE','M_ACTIVE','years','doc_num','serial_num')
                                          ->where('M_ACTIVE','=',0);


      // return $ungiven_lists->toSql();                                  


     return  Datatables::of($ungiven_lists->get())
      ->addColumn('department', function ($ungiven_list) {

        if($ungiven_list->dept != ""){
         $department=DB::connection('stock_oracle')->table('npla_departments')
                                     ->select('name')
                                     ->where('id','=',$ungiven_list->dept)
                                     ->get();
                    return $department[0]->name;                
        }
        else {
           return "";
        }
        })



       ->addColumn('edit', function ($ungiven_list) {
        if($ungiven_list->active == 1)
          { 
            //return '<span class="label label-sm label-danger">طلبية معدلة</span>';
             return  '<a class="btn btn-warning " onclick="edit_orders('.$ungiven_list->id.')"><i class="fa fa-edit"></i></a>';
          }
        else {
         return  '<a class="btn btn-warning " onclick="edit_orders('.$ungiven_list->id.')"><i class="fa fa-edit"></i></a>';
         }

        })

        ->addColumn('print_report', function ($ungiven_list) {
      $route=  url('/'); 
        return $this->checkAccess('store.given_order',$route.'/stock_store/order_report/'.$ungiven_list->id,'fa fa-print','#');
        })

      ->addColumn('order_num', function ($ungiven_list) {
         return  $ungiven_list->years."/".$ungiven_list->serial_num  ;
        })
      ->addColumn('users', function ($ungiven_list) {
         $user=DB::connection('stock_oracle')->table('users')
                                ->select('first_name','last_name')
                                ->where('username','=',$ungiven_list->doc_num)
                                ->get();   
              if(!$user->isEmpty()) {                
              return $user[0]->first_name." ".$user[0]->last_name;
              }else {
                return "";
              }                  
        })->make(true);

 }
 //////////////////////لمراجعة الطلبية/////////////////
 public function ungiven_order_item($order_id){
  $orders=DB::connection('stock_con')->select("select ID ,item_id_pk,CLASS_NAME,ITEM_NAME,NEED1,GIVEN1,
   DATE1,YEARS,DATE2, M_ACTIVE,ITEM_UNIT,ACTIVE,item_count,id1,status_flag
  from STOCK_UN_GIVEN_VW 
  WHERE   ID=$order_id");
  return $orders;

 }
 /////////////////////حفظ الكميات فقط////////////////////
 public function update_order(Request $request,$order_num){


  /****************** */

$added_before=DB::connection("stock_con")->select("select count(INV_ID_PK)  count1 from STOCK_INVOICE where ORD_ID=? and ord_id!=536",[$order_num]);

  if($added_before[0]->count1 >0){
   $return=["result"=>"error","response"=>"الطلبية  تم عمل  فاتورة مسبقة لها  "];
         return  $return; 
  }
  
  /************************** */
  
  
  /************************ */
    $itemId=$request->itemId;
    $num=$request->num;
  
                 
  if (count($itemId) == 0 ){
  
   $return=["result"=>"error","response"=>"لا يوجد طلبات "];
         return  $return;
  }
  
  /***************************** */
 $stock_order_vw=DB::connection("stock_con")->table('stock_order_vw')->select("status_flag")->where("id","=",$order_num)->get();



//echo $stock_order_vw[0]->status_flag;
//exit;
    /*****************بس حفظ************************** */
    if($stock_order_vw[0]->status_flag ==0){

    foreach ($itemId as $key => $value) {

      if( empty($itemId[$key]) ) { }
      else {


    $data=DB::connection("stock_con")->select("select item_count,item_name from STOCK_ORDER_ITEM_COUNT_VW where id1=?",[$itemId[$key]]);

    if(count($data)){

      if($data[0]->item_count >= $num[$key]){


  if($num[$key]==''   ){
   $return=["result"=>"error","response"=>" الرجاء   ادخال   المصروف من   ".$data[0]->item_name."  عدد  العناصر  الموجودة ".$data[0]->item_count];
       return  $return;

  }else{


      $query =DB::connection('stock_con')->table('stock_ITEM_ORDER')
            ->where('ID1',$itemId[$key] )
            ->update(['given1' => $num[$key] ]);


}

      }else{

 //echo "by";

    $return=["result"=>"error","response"=>"لا  يوجد  عناصر  تكفي  من   ".$data[0]->item_name."  عدد  العناصر  الموجودة ".$data[0]->item_count];
       return  $return;

      }



    }else{


    }


         


      }  }//end foreach

   //  echo  $stock_order_vw[0]->status_flag;
  //   exit;

         return     $this->udpate_order_status(1,$order_num);
  
  
                                    }

    /**************************نهلية بس حفظ************ */

  
    /***************بداية نحتج اعتماد*************** */
else if($stock_order_vw[0]->status_flag ==1){

  $return=["result"=>"error","response"=>" الرجاء موافقة المدير على الصرف "];
            return  $return;

}

/******************نهاية نحتاج اعتماد******************* */


/******************بداية الاعتماد**************** */
else if($stock_order_vw[0]->status_flag ==2){
//  echo "hi";
  //  exit;


  foreach ($itemId as $key => $value) {

    if( empty($itemId[$key]) ) { }
    else {


  $data=DB::connection("stock_con")->select("select item_count,item_name from STOCK_ORDER_ITEM_COUNT_VW where id1=?",[$itemId[$key]]);

  if(count($data)){

    if($data[0]->item_count >= $num[$key]){


if($num[$key]==''   ){
 $return=["result"=>"error","response"=>" الرجاء   ادخال   المصروف من   ".$data[0]->item_name."  عدد  العناصر  الموجودة ".$data[0]->item_count];
     return  $return;

}else{


 


}

    }else{

  
      /********************لازم ترجع 0******  توافق عليها لكن العناصر لاتكفى ***************** */
      $this->udpate_order_status(0,$order_num);
      /*****************توافق عليها لكن العناصر لا تكفي ********لازم ترجع 0 ***************** */
   
   //echo "by";
   
   $return=["result"=>"error","response"=>"لا  يوجد  عناصر  تكفي  من   ".$data[0]->item_name."  عدد  العناصر  الموجودة ".$data[0]->item_count];
     return  $return;


    }



  }else{

  


  }


       


    }  }// نهاية  foreach 

    /*******************هنا الصرف****************** */

    return $this->add_stock_invoice_out($order_num);

    /***************************** */

}

/*********************نهاية الاعتماد**************** */


 }






/************************************************* */

public function udpate_order_status($status_flag_in,$order_num){



  $status_user_in=Sentinel::getUser()->id;

  $pdof=DB::connection('stock_con')->getPdo();
  
  $stmtf=$pdof->prepare("begin stock_pkg.UPDATE_ORDER_STATUS (:id_in , :status_flag_in ,:status_user_in ,:out_value   ); end;");
  
  
  $stmtf->bindParam(':id_in', $order_num, PDO::PARAM_INT);
  $stmtf->bindParam(':status_flag_in', $status_flag_in, PDO::PARAM_INT);
  $stmtf->bindParam(':status_user_in', $status_user_in, PDO::PARAM_INT);
  $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
  
  
  
   try{$stmtf->execute();
  $return=["result"=>"ok","response"=>"تم  حفظ العناصر المراد صرفها     بنجاح  ","ungiven_list_id"=>"0"];
      return  $return; 
    //  echo "hi";
   //   exit;
    }catch(\Exception $e ){
                               $error=$e->getMessage();
                               $errormes=explode(PHP_EOL,$error);
                               $errormes1=preg_split('/\r\n|\r|\n/',$errormes[1]);
                                $errormes2=explode(':',$errormes1[0]);
                               
                               
                                $return['result']="error";
                                 $return['response']= $errormes2[2];
                                  return $return;
  
                                }

}






/******************************************* */

 public function add_stock_invoice_out ($order_num){


  $dt = Carbon::now();    
  // echo '%\/store\/ungiven_order\/'.$order_num.'%';   
$noty=DB::table('notifications')->where('data','like','%\/stock_store\/items\/stock_order_vw\/'.$order_num.'%')->update(['read_at'=> $dt]);   
 $stock_order_tb=DB::connection('stock_con')->update(" update  STOCK_ORDER_TB  set M_ACTIVE=1, DATE2=SYSDATE WHERE ID=? ", [$order_num]);


 $user_id=Sentinel::getUser()->id;

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.ADD_STOCK_INVOICE_OUT (:id_in , :user_in  ,:out_value  ); end;");
$stmtf->bindParam(':id_in', $order_num, PDO::PARAM_INT);
$stmtf->bindParam(':user_in', $user_id, PDO::PARAM_INT) ;
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
$stmtf->execute();

   $return=["result"=>"ok","response"=>"تم الحفظ بنجاح ","inv_id_pk"=>$out_value];
       return  $return;


 }

//////////////////////////////////طلبات المستخدم حسب ال session /////////////////// 
 // أعدل طلبى فى حالة لم يتم اعتماده
 public function edit_order($order_num){
  $orders=DB::connection('stock_con')->select("select * from Stock_ITEM_CLASS ORDER BY CLASS_NAME ASC");
    $items=DB::connection('stock_con')->select("select * from stock_item_vw order by ITEM_NAME ASC");
  $item_orders=DB::connection('stock_con')->table('Stock_ITEM_ORDER')->select('item_id_pk','need1','order_num')
                                                             ->where('order_num','=',$order_num)
                                                             ->get();
                                                             
  return view('admin.stockstore.add_store',compact('item_orders','orders','items','order_num'));

 }

//////////////////////////////////////////////////////
public function update_myorder_data(Request $request){
  $order_num= $request->order_num;
   $user_name=Sentinel::getUser()->username;
    $number_needed = $request->number_needed;
    //العناصر التى يحتاجونها
    $item_needed=$request->item_needed;
  $STOCK_ORDER_TB=DB::connection('stock_con')->table('STOCK_ORDER_TB')->select('m_active','doc_num')
                                           ->where('id','=',$order_num)
                                           ->where('doc_num','like',$user_name)
                                           ->get();
   if($STOCK_ORDER_TB[0]->m_active==0){
    DB::connection('stock_con')->table('STOCK_ITEM_ORDER')->where('order_num', '=', $order_num)->delete();



            foreach ($item_needed as $key => $value) {

              if( empty($item_needed[$key])  ||  empty($number_needed[$key]) ) {


              }
              else {
                $save_order=DB::connection('stock_con')->insert("insert into STOCK_ITEM_ORDER(item_id_pk,NEED1,ORDER_NUM) values(?,?,?)",[$item_needed[$key],$number_needed[$key],$order_num]); 

                 $update_stock_ordertb=DB::connection('stock_con')->update(" update  STOCK_ORDER_TB  set active=1  WHERE ID=? ", [$order_num]);



              }

            }//end foreach
       $return=["result"=>"ok","response"=>"تمت التعديل بنجاح"];
       return  $return;



   }else{
       $return=["result"=>"error","response"=>"تم اعتماد الطلبية"];
       return  $return;

   }                                           



} 

////////////////////////////////////////////////طلباتى ///////////////////////////////////////// 
public function my_order_list(){
  return view('admin.stockstore.my_order_list');

}
///////////////////////////////////////////////عرض الطلبات الخاصة بى//////////////////////////////////////////
public function my_order_data(Request $request){

$serial_num=$request->serial_num;
$years=$request->years;


  $user_name=Sentinel::getUser()->username;
 $orders=DB::connection('stock_con')->table("STOCK_ORDER_TB")->select('id','dept','years','serial_num',
                                                   DB::raw('to_char(date1,\'MM/DD/YYYY\')date2'),'doc_num','M_ACTIVE','date1')
                                                   ->orderBy('id','desc')
                                                  ->where('doc_num','like',$user_name)  ;

 //echo $orders->toSql();
 //exit;

 if (!empty($serial_num) ) {
               $orders->whereRaw("serial_num = ?", ["$serial_num"]);
            }    
           
  if (!empty($years) ) {
               $orders->whereRaw("years = ?", ["$years"]);
            }           



//dd($user_name);
      return  Datatables::of($orders) 

        ->addColumn('order_num', function ($order) {
         return  '<a onclick="my_item('.$order->id.')">'.$order->years."/".$order->serial_num.'</a>' ;
        })

        ->addColumn('order_status', function ($order) {
          if($order->m_active ==0){
         return  '<span class="label label-sm label-danger">قيد التدقيق</span>';
          }else {
           return  '<span class="label label-sm label-info">تم تأكيد الطلب</span>'; 
          }
        })
   /*    ->addColumn('my_order', function ($order) {
        if($order->m_active ==0){
        $route=  url('/');
         return $this->checkAccess('store.my_order',$route.'/stock_store/edit_order/'.$order->id,'fa fa-edit','#'); 
         }else {

         }
          }) */

       ->make(true);                                             

                                                

}




}


