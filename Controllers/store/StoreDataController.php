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


class StoreDataController extends Controller{



   private $main_path;
   private $thumbnail_path;
   private $recycle_main_path;
   private $recycle_thumbnail_path;
   private $user_name;
   private $user_id;
   private $connection;

    public function __construct()
    {
          parent::__construct();
        $this->main_path = $this->stockinarchivepath;
        $this->thumbnail_path=$this->stockinarchivethumbpath;
        $this->recycle_main_path=$this->stockinarchiveRecyclepath;
        $this->recycle_thumbnail_path=$this->stockinarchiveRecyclepaththumb;
        $this->connection="stock_con";
    //$this->user_name=Sentinel::getUser()->username;
    //$this->user_id=Sentinel::getUser()->id;

    }





   public function add_items_vw(){
   	$item_units=DB::connection('stock_con')->select("select * from status where p_id=738");

   	$item_classes=DB::connection('stock_con')->select("select * from stock_item_class order by class_name desc");

    $currencys=DB::connection("stock_con")->select("select *  from status where p_id=321");

     $stock_item_main = DB::connection('stock_con')->table('stock_item_main')->pluck('item_name');
   //  return  $stock_item_main;
    return view("admin.stockstore.items.add_items_vw",compact('item_units','item_classes','currencys','stock_item_main'));

   }

/*********************************************/
public function add_items_data(Request $request){

// اضافة   الاصناف  
   $this->validate($request, [

           
            'item_name'=>'required',
            'item_class'=>'required',
            'item_unit'=>'required',
            'min_qnt'=>'required',
            'buy_price'=>'required',
            'currency'=>'required',
             'note1'=>'required',
             'custody'=>'required',
             'enabled'=>'required',
             'favorite'=>'required',

          
            ],[
            'item_name.required'=>'الرجاء  ادخال اسم  الصنف  ',
            'item_class.required'=>'الرجاء   اختيار الصنف   الاساسى  ' ,
            'item_unit.required'=>'الرجاء   اختيار الوخدة  ' ,


            'min_qnt.required'=>'الرجاء ادخال اعادة الطلب  ' ,
            'buy_price.required'=>'الرجاء   اختيار سعر المنتج  ' ,
            'currency.required'=>'الرجاء اختيار العملة  ' ,
            'note1.required'=>'الرجاء اختيار الملاحظات  ' ,
            'custody.required'=>'الرجاء   اختيار  عهدة أم لا  ',
            'enabled.required'=>'الرجاء  اختيار  فعال ام لا  ',
             'favorite.required'=>'الرجاء اختيار مفضلة ام لا ',


            ]); 




  $item_name = $request->item_name;
  $item_class=$request->item_class;
  $item_unit=$request->item_unit;
 $min_qnt=$request->min_qnt;
  $buy_price=$request->buy_price;
  $currency=$request->currency;
  $note1=$request->note1;
  $favorite_in=$request->favorite;
  $custody_in=$request->custody;
  $enabled_in=$request->enabled;
   
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_item (:item_name_in, :item_class_in ,:item_unit_in ,:min_qnt_in  ,:buy_price_in  ,:currency_in,:note1_in ,:favorite_in,:custody_in,:enabled_in,:out_value ); end;");
$stmtf->bindParam(':item_name_in', $item_name, PDO::PARAM_STR);
$stmtf->bindParam(':item_class_in', $item_class, PDO::PARAM_INT) ;
$stmtf->bindParam(':item_unit_in', $item_unit, PDO::PARAM_INT); 

$stmtf->bindParam(':min_qnt_in', $min_qnt, PDO::PARAM_INT);
$stmtf->bindParam(':buy_price_in', $buy_price, PDO::PARAM_INT);
$stmtf->bindParam(':currency_in', $currency, PDO::PARAM_INT);
$stmtf->bindParam(':note1_in', $note1, PDO::PARAM_STR);
$stmtf->bindParam(':favorite_in', $favorite_in, PDO::PARAM_INT);
$stmtf->bindParam(':custody_in', $custody_in, PDO::PARAM_INT);
$stmtf->bindParam(':enabled_in', $enabled_in, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT);


try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  الاضافة  بنجاح  ","inv_id_pk"=>$out_value];
    return  $return; 
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
  ////////////////////////////////////

public function stock_item_main_vw_shared(Request $request){
  //  $item_id=$request->item_id;
    $item_name=$this->filterText($request->item_name);
        $item_name_data=$this->filterText($request->item_name_data);

    $item_class_data=$request->item_class_data;

    $unit=$this->filterText($request->unit);
     $unit_data=$this->filterText($request->unit_data);

    $item_id_pk=$request->item_id_pk;
    $item_id_pk_data=$request->item_id_pk_data;


    $type_of_class=$request->type_of_class;
     $favorite=$request->favorite;

    

$stock_item_main_vw=DB::connection("stock_con")->table("STOCK_ITEM_MAIN_VW")->select("item_id","item_name","class_name","item_unit","item_count","min_qnt","buy_price","item_id_pk","note1","item_class","favorite","custody",'enabled')->orderBy("item_count","desc");
//->orderBy('favorite',"desc");

  if (!empty($item_name) ) { 
             $stock_item_main_vw->whereRaw($this->filterTextDB('item_name')." like ?", ["%{$item_name}%"]);
               }  

    if (!empty($item_name_data) ) { 
             $stock_item_main_vw->whereRaw($this->filterTextDB('item_name')." like ?", ["%{$item_name_data}%"]);
               }             

 if (!empty($item_class_data) ) { 

              $stock_item_main_vw->whereRaw("item_class = ?", ["$item_class_data"]);
        
               } 

  if (!empty($unit) ) { 
             $stock_item_main_vw->whereRaw($this->filterTextDB('item_unit')." like ?", ["%{$unit}%"]);
               } 


   if (!empty($unit_data) ) { 
             $stock_item_main_vw->whereRaw($this->filterTextDB('item_unit')." like ?", ["%{$unit_data}%"]);
               }                   
                               

            if (!empty($item_id_pk) ) {
               $stock_item_main_vw->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
            }


              if (!empty($item_id_pk_data) ) {
               $stock_item_main_vw->whereRaw("item_id_pk = ?", ["$item_id_pk_data"]);
            }

             if (!empty($favorite) ) {
               $stock_item_main_vw->whereRaw("favorite = ?", ["$favorite"]);
            }

             if (!empty($type_of_class) ) {

              if($type_of_class ==1) {
               $stock_item_main_vw->whereRaw("item_count > 0 ");
              }else if($type_of_class ==2){
               $stock_item_main_vw->whereRaw("item_count = 0 ");
              }


            }

            return $stock_item_main_vw;


}



public function stock_item_main_vw(Request $request){

$stock_item_main_vw=$this->stock_item_main_vw_shared($request);

 return Datatables::of($stock_item_main_vw)


     ->addColumn('stock_card_vw', function ($stock_order_data) {

       $route=  url('/'); 
        return $this->checkAccess('store.storekeeper.add_items_vw',$route.'/stock_store/items/stock_card_vw_report/'.$stock_order_data->item_id_pk,'fa fa-print','#');


    

        })


  ->addColumn('fav_item', function ($stock_order_data) {

    return '<input  type="checkbox"   class="checkboxfav" value="'.$stock_order_data->item_id_pk.'"  onclick="fav_item('.$stock_order_data->item_id_pk.')">' ;



  })


   ->addColumn('custody_item', function ($stock_order_data) {

    if($stock_order_data->custody ==1){

    return '<input  type="checkbox"   class="checkboxcustody" value="'.$stock_order_data->item_id_pk.'"  onclick="custody_item('.$stock_order_data->item_id_pk.')"> <i class="fa fa-2x fa-check" style="color:green"></i>' ;

    }else{


    return '<input  type="checkbox"   class="checkboxcustody" value="'.$stock_order_data->item_id_pk.'"  onclick="custody_item('.$stock_order_data->item_id_pk.')">' ;
    }




  })


      ->addColumn('enabled_item', function ($stock_order_data) {
 if($stock_order_data->enabled ==1){
    return '<input  type="checkbox"   class="checkboxenabled" value="'.$stock_order_data->item_id_pk.'"  onclick="enabled_item('.$stock_order_data->item_id_pk.')"><i class="fa fa-2x fa-check" style="color:green"></i>' ;

  }else{
  return '<input  type="checkbox"   class="checkboxenabled" value="'.$stock_order_data->item_id_pk.'"  onclick="enabled_item('.$stock_order_data->item_id_pk.')"> ' ;


  }



  })



  ->addColumn('is_fav', function ($stock_order_data) {

    if($stock_order_data->favorite == 1){
      return '<i class="fa fa-2x fa-star" style="color:yellow"></i>';

    }else{
     return "";

    }

   



  })


  ->make(true);

}




/***************************************************/
public function stock_item_main_vw_report(Request $request){
$stock_item_main_vw=$this->stock_item_main_vw_shared($request);
$stock_item_main_vw_datas=$stock_item_main_vw->get();
return view('admin.stockstore.report.stock_item_main_vw_report',compact('stock_item_main_vw_datas'));

}

/***************************************************/
public function add_stock_invoice_out_vw(){
$stock_in_out_sides=DB::connection("stock_con")->table("stock_in_out_sides")->select("side_id","side_name")->orderBy("side_id")->get();
$stock_item_mains=DB::connection("stock_con")->table("stock_item_main")->select("item_id","item_name")->get();
return view("admin.stockstore.items.add_stock_invoice_out_vw",compact('stock_in_out_sides','stock_item_mains'));

}


public function stock_emp_name($side_id){
  $stock_emp_name=DB::connection("stock_con")->select("select * from stock_emp_name where side_id=?",[$side_id]);
  return $stock_emp_name;
}


public function stock_item_mains(){
  $stock_item_mains=DB::connection("stock_con")->select("select * from stock_item_main ");
  return $stock_item_mains;
}
/////////////////////////////////////////////////////////////////
public function stock_invoice_vw(Request $request){
 $user_id_in=  Sentinel::getUser()->id;
$stock_invoice_vw=DB::connection("stock_con")->table("STOCK_INVOICE_OUT_VW")->select("inv_id_pk","inv_type","name","full_name",

DB::raw('to_char(date1,\'dd/mm/yyyy\') date1'),
DB::raw('to_char(date2,\'dd/mm/yyyy\') date2')

,"user_id","user_date")->where("user_id","=",$user_id_in);

 return Datatables::of($stock_invoice_vw)
  ->addColumn('stock_out_invoice_item_data', function ($item) {
     $route=  url('/'); 
     $user_test=Sentinel::getUser(); 
         return '<a class="btn btn-warning btn-sm  "  onclick="stock_out_invoice_item_data('.$item->inv_id_pk.')" ><i class="fa fa-users"></i></a>';


        })
  ->make(true);


}

  



/*********************/
public function stock_invoice_out_item_vw($inv_id_pk){

$stock_invoice_out_item_vw=DB::connection("stock_con")->table("stock_invoice_out_item_vw")
                                            ->select("item_id_pk","item_name","count1","count2","note2","inv_id_pk")
                                             ->where("inv_id_pk","=",$inv_id_pk);
return Datatables::of($stock_invoice_out_item_vw)
  ->make(true);

}

/***************************/
public function stock_order_vw($manager_flag=0){

  $departments=DB::connection('stock_oracle')->table('npla_departments')
                                     ->select('name','id')
                                    
                                     ->get();

$users=DB::connection("stock_oracle")->table("users")->select("id","full_name")->get();


return view('admin.stockstore.items.stock_order_vw',compact('departments','users'));

}
/****************************/





public function stock_order_data(Request $request,$status_flag=0){

//  return $status_flag;

  $serial_num=$request->serial_num;
  $years=$request->years;
$inv_serial=$request->inv_serial;
$inv_year=$request->inv_year;



  $dept=$request->dept;
  $order_user_id=$request->order_user_id;
  //$date1=$request->date1;



$date1_to=$request->date1_to;
$date1_from=$request->date1_from;
$date2_to=$request->date2_to;
$date2_from=$request->date2_from;

   $stock_order_datas=DB::connection('stock_con')->table('stock_order_vw')
                                          ->select('ID','DEPT',DB::raw('to_char(date1,\'DD/MM/YYYY\')date1_data')
                                          ,DB::raw('to_char(date2,\'DD/MM/YYYY\')date2_data'),'ACTIVE','M_ACTIVE',
                                          'years','doc_num','serial_num','inv_id_pk','inv_user_id','order_user_id',
                                          'date1','date2','cancel1','inv_serial','inv_year','status_flag')
                                        
                                         ->orderBy("cancel1","asc")
                                          ->orderBy("m_active","asc")
                                         
                                          ->orderBy("id","desc");


    if($status_flag !=0) {
      $stock_order_datas->where('status_flag',$status_flag);

    }                                    

             if (!empty($serial_num) ){
              $stock_order_datas->whereRaw("serial_num = ?", ["$serial_num"]);
            }


 if (!empty($inv_serial) ){
              $stock_order_datas->whereRaw("inv_serial = ?", ["$inv_serial"]);
            }


        
 if (!empty($inv_year) ){
              $stock_order_datas->whereRaw("inv_year = ?", ["$inv_year"]);
            }    


      if (!empty($years) ){
              $stock_order_datas->whereRaw("years = ?", ["$years"]);
            }

            if (!empty($dept) ){
              $stock_order_datas->whereRaw("dept = ?", ["$dept"]);
            }

             if (!empty($order_user_id) ){
              $stock_order_datas->whereRaw("order_user_id = ?", ["$order_user_id"]);
            }


 if(!empty($date1_from) && !empty($date1_to) ){
        $stock_order_datas->whereBetween('date1', array($date1_from , $date1_to));
       }
       if(!empty($date2_from) &&  !empty($date2_to)){

         $stock_order_datas->whereBetween('date2', array($date2_from , $date2_to));
       }


 return  Datatables::of($stock_order_datas)



      ->addColumn('department', function ($stock_order_data) {

        if($stock_order_data->dept != ""){
         $department=DB::connection('stock_oracle')->table('npla_departments')
                                     ->select('name')
                                     ->where('id','=',$stock_order_data->dept)
                                     ->get();


            if(count($department)){
              return $department[0]->name;  
            }else{

              return "";
            }                       

                                  
        }
        else {
           return "";
        }
        })


// طلبية  غير  معطاه  
       ->addColumn('edit', function ($stock_order_data) {

        if($stock_order_data->cancel1 ==1) {

          return "تم  الغاء   الطلبية ";


        }else{


               if( $stock_order_data->m_active == 0 )
          { 

            $user_test=Sentinel::getUser();
            if($user_test->hasAccess('store.storekeeper.update_order')){
            
             return  '<a class="btn btn-warning " onclick="edit_orders('.$stock_order_data->id.')"><i class="fa fa-edit"></i></a>';
            }else{

              return  '<a class="btn btn-warning " onclick="manager_show_orders('.$stock_order_data->id.')"><i class="fa fa-eye"></i></a>';
             }


          }

          if($stock_order_data->m_active == 1){

            return  '<span class="label label-sm label-success">تم   اعتماد   الطلبية  و تحويلها   لفاتورة  </span>';


          }


        }
       

        })


        /***********************اعتماد انه موافق على الصرف***************************** */
        
        ->addColumn('update_order_status', function ($stock_order_data) {
          
          if($stock_order_data->status_flag ==1  ){

            $user_test=Sentinel::getUser();
            if($user_test->hasAccess('store.storekeeper.update_order_status')){

           
              return  '<a class="btn btn-warning " onclick="update_order_status('.$stock_order_data->id.')"><i class="fa fa-check"></i></a>';
        
          
          }
            else{

              return "بانتظار موافقة المدير على الصرف";
            }

            
          }else if($stock_order_data->status_flag ==2){
          return "تم الموافقة على الصرف";

          }else{

            return "";
          }


        })



        /*************************************** */


// طلبية  

         ->addColumn('print_report', function ($stock_order_data) {

            if($stock_order_data->cancel1 ==1) {

          return "تم  الغاء   الطلبية ";

     //   $route=  url('/'); 
     //   return $this->checkAccess('store.storekeeper.stock_order_vw',$route.'/stock_store/order_report/'.$stock_order_data->id,'fa fa-stop','#','','_blank');


        }else{


          if($stock_order_data->m_active == 1){


      $route=  url('/'); 
        return $this->checkAccess('store.storekeeper.stock_order_vw',$route.'/stock_store/order_report/'.$stock_order_data->id,'fa fa-print','#');}
        else{
                  return "لم يتم الصرف بعد";
        }
        }


        })


          ->addColumn('invoice_report', function ($stock_order_data) {

  if($stock_order_data->cancel1 ==1) {

          return "تم  الغاء   الطلبية ";


        }else{
      $route=  url('/'); 

      if(is_null($stock_order_data->inv_id_pk)){
      return "";}else{
           return $this->checkAccess('store.storekeeper.stock_order_vw',$route.'/stock_store/invoice_report/'.$stock_order_data->inv_id_pk,'fa fa-print','#');
      }
}
    

     
        })


// رقم  الطلبيية  
      ->addColumn('order_num', function ($stock_order_data) {
         return  $stock_order_data->serial_num."/".$stock_order_data->years  ;
        })



// طالب   الطلبية  
      ->addColumn('users_added', function ($stock_order_data) {
         $user=DB::connection('stock_oracle')->table('users')
                                ->select('first_name','last_name')
                                ->where('id','=',$stock_order_data->order_user_id)
                                ->get();   
              if(!$user->isEmpty()) {                
              return $user[0]->first_name." ".$user[0]->last_name;
              }else {
                return "";
              }                  
        })


       ->addColumn('users_admit', function ($stock_order_data) {
         $user=DB::connection('stock_oracle')->table('users')
                                ->select('first_name','last_name')
                                ->where('id','=',$stock_order_data->inv_user_id)
                                ->get();   
              if(!$user->isEmpty()) {                
              return $user[0]->first_name." ".$user[0]->last_name;
              }else {
                return "";
              }                  
        })


       ->addColumn('stock_out_invoice_item_data', function ($stock_order_data) {


    if($stock_order_data->cancel1 ==1) {

          return "تم  الغاء   الطلبية ";


        }else{

     $route=  url('/'); 
     $user_test=Sentinel::getUser(); 

     if(is_null($stock_order_data->inv_id_pk)){
      return "";

     }else{

       return '<a class="btn btn-warning btn-sm  "  onclick="stock_out_invoice_item_data('.$stock_order_data->inv_id_pk.')" ><i class="fa fa-file-text"></i></a>'; 
     }
       
   }

        })






                 ->addColumn('cancel_order', function ($stock_order_data) {



  if($stock_order_data->cancel1 ==1) {

          return " تم  الغاء   الطلبية  ";


        }else{

            if($stock_order_data->m_active == 1){

               return  '<span class="label label-sm label-danger"> تم اعتماد  الطلبية  </span>';


            }else{

              $user_test=Sentinel::getUser();
              if($user_test->hasAccess('store.storekeeper.cancel_order')){

              return '<a class="btn btn-danger btn-sm  "  onclick="cancel_order('.$stock_order_data->id.')" ><i class="fa fa-trash"></i></a>';  


            }else{

              return "";
            }

          


     
          }
    

     
        }
      
      })



      ->make(true);



 }



/*********************************/
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
  $items=DB::connection('stock_con')->table('stock_order_item_vw')
                                 
                                 ->select('item_id_pk','item_name','class_name','unit_name','need1','given1','note1')
                                 ->where('order_num','=',$order_id)
                                 ->get();



  return view ('admin.stockstore.report.order_report',compact('order','department','user','items'));

 } 

/*****************************/

 public function invoice_report($inv_id_pk){
  $invoice=DB::connection('stock_con')->table('stock_invoice_out_vw')
                                  ->select('inv_id_pk','inv_type',DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),'name','full_name',DB::raw('to_char(date2,\'DD/MM/YYYY\')date2'),'serial','inv_year','name')
                                  ->where('inv_id_pk','=',$inv_id_pk)
                               
                                  ->get();



                  
  $items=DB::connection("stock_con")->table("stock_invoice_out_item_vw")
                                            ->select("item_id_pk","item_name","count1","count2","note2","inv_id_pk")
                                             ->where("inv_id_pk","=",$inv_id_pk)->get();



  return view ('admin.stockstore.report.invoice_report',compact('invoice','items'));

 } 




/***************************/
public function add_stock_invoice_in_vw(){

$stock_in_out_sides=DB::connection("stock_con")->select("select *  from stock_in_out_sides  where side_type=2");
$stock_item_mains=DB::connection("stock_con")->select("select *  from stock_item_main ");
$cur_ins=DB::connection("stock_con")->select("select *  from status where p_id=321");

return view('admin.stockstore.items.add_stock_invoice_in_vw',compact('stock_in_out_sides','stock_item_mains','cur_ins'));

}

/********************************/
public function add_stock_invoice_in_data(Request $request){

 $user_id_in=  Sentinel::getUser()->id;

   $this->validate($request, [

           
            'side_id_in'=>'required',
      //      'date1_in'=>'required',
            'date3_in'=>'required',
          //  'order_no_in'=>'required',
            'tottal_price_in'=>'required',
            'cur_in_data'=>'required',
	     		'recieved_in'=>'required',
          'usd_nis'=>'required|min:1',
          'jd_nis'=>'required|min:1',
         
           
            ],[
            'side_id_in.required'=>'الرجاء  اختيار   الجهة  الموردة  ',
         //   'date1_in.required'=>'الرجاء  ادخال  التاريخ  ' ,
            'date3_in.required'=>'الرجاء  ادخال  تاريخ  الشراء  ' ,
            'recieved_in.required'=>' الرجاء اختيار تم الاستلام أم  لا    ' ,
           
            'tottal_price_in.required'=>'الرجاء  ادخال  اجمالي   الفاتورة  ' ,
             'cur_in_data.required'=>' الرجاء  ادخال  العملة   ' ,
             'usd_nis.required'=>' الرجاء ادخال سعر الصرف بالدولار  ' ,
             'usd_nis.min'=>' الرجاء ادخال قيمة الصرف أكبر من صفر ' ,
             'jd_nis.min'=>' الرجاء ادخال قيمة الصرف أكبر من صفر ' ,
             'jd_nis.required'=>' الرجاء ادخال سعر الصرف بالدينار  ' ,

            ]); 


  $side_id_in = $request->side_id_in;
 // $date1_in=$request->date1_in;
  $date3_in=$request->date3_in;
  $order_no_in=$request->order_no_in;
  $tottal_price_in=$request->tottal_price_in;
  $cur_in =$request->cur_in_data;
  $recieved_in=$request->recieved_in;

// لا  يتكرر  رقم    الفاتورة   مع   الجهة الموردة 
$data=DB::connection("stock_con")->select("select count(inv_id_pk)  count1 from stock_invoice where order_no=? and side_id=?",[$order_no_in,$side_id_in]);


if($data[0]->count1){

  $return=["result"=>"error","response"=>"تم عمل فاتورة ادخال مسبقا  !!"];
return $return;

}else{


}

$usd_nis=$request->usd_nis;
$jd_nis=$request->jd_nis;
$inv_id_pk=0;

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_invoice_in (:side_id_in, :note1_in  , :date3_in ,:order_no_in  ,:tottal_price_in,:user_id_in ,:cur_in ,:recieved_in ,:out_value ); end;");
$stmtf->bindParam(':side_id_in', $side_id_in, PDO::PARAM_INT);
//$stmtf->bindParam(':date1_in', $date1_in, PDO::PARAM_STR) ;
$stmtf->bindParam(':note1_in', $note1_in, PDO::PARAM_STR); 

$stmtf->bindParam(':date3_in', $date3_in, PDO::PARAM_STR);
$stmtf->bindParam(':order_no_in', $order_no_in, PDO::PARAM_INT);

$stmtf->bindParam(':tottal_price_in', $tottal_price_in, PDO::PARAM_STR);

$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':cur_in', $cur_in, PDO::PARAM_INT);
$stmtf->bindParam(':recieved_in', $recieved_in, PDO::PARAM_INT);
 
$stmtf->bindParam(':out_value', $out_value1, PDO::PARAM_INT);


try{$stmtf->execute();

  $inv_id_pk=$out_value1;
//  return  $inv_id_pk;
/*************************اضافة العملات ***************** */
$this->add_stock_currency($usd_nis,$jd_nis, $inv_id_pk , $user_id_in);

/***************************************** */
$return=["result"=>"ok","response"=>"تم  الاضافة  بنجاح  ","inv_id_pk"=>$out_value1];

    return  $return; 
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

/***************************** */
public function add_stock_currency($usd_nis,$jd_nis, $out_value1, $user_id_in){

  $pdof1=DB::connection('stock_con')->getPdo();
  $stmtf1=$pdof1->prepare("begin stock_pkg.ADD_STOCK_CURRENCY (:USD_NIS_IN, :JD_NIS_IN  , :INV_ID_PK_IN , :CREATE_USER_IN, :out_value ); end;");
  $stmtf1->bindParam(':USD_NIS_IN', $usd_nis, PDO::PARAM_STR);
  $stmtf1->bindParam(':JD_NIS_IN', $jd_nis, PDO::PARAM_STR); 
  $stmtf1->bindParam(':INV_ID_PK_IN', $out_value1, PDO::PARAM_INT);
  $stmtf1->bindParam(':CREATE_USER_IN', $user_id_in, PDO::PARAM_INT);
  $stmtf1->bindParam(':out_value', $out_value, PDO::PARAM_INT);
  $stmtf1->execute();


}

   

/*********************************/
public function stock_invoice_in_vw_one_data($inv_id_pk){


$stock_invoice_in_vw=DB::connection("stock_con")->table('stock_invoice_in_vw')->select('inv_id_pk','inv_type','side_name',DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('to_char(date3,\'DD/MM/YYYY\')date3'),'order_no','tottal_price','user_id','serial','year1','side_id')
->where('inv_id_pk','=',$inv_id_pk)->get();

return $stock_invoice_in_vw;


}

/*******************************/
public function stock_invoice_in_vw(Request $request){

$order_no=$request->order_no;

$serial=$request->serial;
$year1=$request->year1;
$side_id=$request->side_id;

$stock_invoice_in_vw=DB::connection("stock_con")->table('stock_invoice_all_vw')->select('inv_id_pk','inv_type','side_name',
DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('to_char(date3,\'DD/MM/YYYY\')date3'),'order_no','tottal_price',
'user_id','serial','year1','side_id','status1','recieved','cancel1','according_flag','manager_flag');

if (!empty($order_no) ){
              $stock_invoice_in_vw->whereRaw("order_no = ?", ["$order_no"]);
            }

      

            if (!empty($serial) ){
              $stock_invoice_in_vw->whereRaw("serial = ?", ["$serial"]);
            }

             if (!empty($year1) ){
              $stock_invoice_in_vw->whereRaw("year1 = ?", ["$year1"]);
            }

              if (!empty($side_id) ){
              $stock_invoice_in_vw->whereRaw("side_id = ?", ["$side_id"]);
            }

  

 return  Datatables::of($stock_invoice_in_vw)

  ->addColumn('serial_year_data', function ($stock_invoice_in_vw) {
         return  $stock_invoice_in_vw->serial."/".$stock_invoice_in_vw->year1  ;
        })

   ->addColumn('add_item_data', function ($stock_invoice_in_vw) {

    if($stock_invoice_in_vw->cancel1 ==1) {
      return '<span  class="label label-danger" > تم الالغاء </span>';
    }else{


/********************* */
      if($stock_invoice_in_vw->inv_type == 2){
        return  '<a class="btn btn-info" onclick="add_item_data('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-plus"></i></a>'  ;

      }else{
        return  '<a class="btn btn-info" onclick="stock_beginning_item_vw('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-plus"></i></a>'  ;

      }

       
/********************** */

    }
        })


   ->addColumn('add_to_store', function ($stock_invoice_in_vw) {

    if($stock_invoice_in_vw->status1 ==1){
      $route=  url('/'); 
      return $this->checkAccess('store.storekeeper.add_stock_invoice_in_vw',$route.'/stock_store/items/add_to_store/'.$stock_invoice_in_vw->inv_id_pk,'fa fa-print','#');


    }else{

     return "قيد التدقيق";
    }

     

        })

      ->addColumn('add_to_store_sanad', function ($stock_invoice_in_vw) {

        if($stock_invoice_in_vw->status1 ==1){

       $route=  url('/'); 
        return $this->checkAccess('store.storekeeper.add_stock_invoice_in_vw',$route.'/stock_store/items/add_to_store_sanad/'.$stock_invoice_in_vw->inv_id_pk,'fa fa-print','#');
      
      }else{

        return "قيد التدقيق";

      }

        })


      ->addColumn('stock_receipt_vw', function ($stock_invoice_in_vw) {

        if($stock_invoice_in_vw->status1 ==1){

       $route=  url('/'); 
        return $this->checkAccess('store.storekeeper.add_stock_invoice_in_vw',
        $route.'/stock_store/items/stock_receipt_vw/'.$stock_invoice_in_vw->inv_id_pk,'fa fa-print','#');
      }else{
        return "قيد التدقيق";

        }

        })


    ->addColumn('approve_stock_invoice', function ($stock_invoice_in_vw) {
    /********1********** */
      if($stock_invoice_in_vw->cancel1 ==1){

        return '<span  class="label label-danger" > تم الالغاء </span>';


      }
         /**********2***************** */
      
      else if($stock_invoice_in_vw->according_flag ==0){

        $user_test=Sentinel::getUser();

        if($user_test->hasAccess('store.storekeeper.according_approve')){
       

          return  '<span class="label label-sm label-warning tbc_get_status_fn_msg" >
          <a class="btn btn-warning tbc_get_status_fn_msg" onclick="according_approve('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-check"></i> تدقيق مبدئى</a></span>'  ;}
   else{
    return "بانتظار التدقيق المبدئى";
 
         }  }

       /*********3****** */

      else if($stock_invoice_in_vw->manager_flag ==0){

        $invoice_in_signatures_vw=DB::connection("stock_con")->select("select PLA_PKG.CHECK_MANAGER_SIGNED(?,1) as check_man from dual ",[$stock_invoice_in_vw->inv_id_pk]);

        if( intval($invoice_in_signatures_vw[0]->check_man) != 0){
         // return  intval($invoice_in_signatures_vw[0]->check_man);
         return  '<span class="label label-sm label-warning tbc_get_status_fn_msg" >
         <a class="btn btn-info tbc_get_status_fn_msg" ><i class="fa fa-check"></i>بانتظار تدقيق مدير اللجنه</a></span>'  ;}

       
       

        $user_test=Sentinel::getUser();

        if($user_test->hasAccess('store.storekeeper.manager_flag')){
       
        
          return  '<span class="label label-sm label-warning tbc_get_status_fn_msg" ><a class="btn btn-warning"
           onclick="manager_approve('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-check"></i> بانتظار موافقة المدير</a></span>'  ;}
        else{
   return "بانتظار موافقة المدير";

        }


     
           }

         /************4******* */  

       else if($stock_invoice_in_vw->status1 ==1){

        return '<span  class="label label-success" >تم   الاعتماد  </span>';


       }else{

        $user_test=Sentinel::getUser();
        if($user_test->hasAccess('store.storekeeper.approve_stock_invoice')){


         return  '<span class="label label-sm label-warning tbc_get_status_fn_msg" >
         <a class="btn btn-warning " onclick="approve_stock_invoice('.$stock_invoice_in_vw->inv_id_pk.','.$stock_invoice_in_vw->inv_type.')">بانتظار اعتماد أمين مخزن
         <i class="fa fa-check"></i></a></span>'  ; 


       }else{
         return "ليس لديك صلاحية";
       }

      }


        })



        ->addColumn('add_order_no', function ($stock_invoice_in_vw) {

          if($stock_invoice_in_vw->cancel1 ==1) {
            return '<span  class="label label-danger" > تم الالغاء </span>';
          }else{

       if($stock_invoice_in_vw->recieved ==1){

        return '<span  class="label label-success" >  تم  استلام  فاتورة الشراء    </span>';


       }else{

         return  '<a class="btn btn-info" onclick="add_order_no('.$stock_invoice_in_vw->inv_id_pk.')"><i class=" fa fa-shopping-cart"></i></a>'  ; 
       }

      }


       


       


        })

// العهد  

          ->addColumn('custody_data', function ($stock_invoice_in_vw) {

 $user_test=Sentinel::getUser();

 if($user_test->hasAccess('store.custody.add_custody_vw')){

             return  '<a class="btn btn-info" onclick="custody_data('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-list"></i></a>'  ; 

           }else{


            return "";
           }





          })



          ->addColumn('attachment', function ($stock_invoice_in_vw) {

            if($stock_invoice_in_vw->cancel1 ==1) {
              return '<span  class="label label-danger" > تم الالغاء </span>';
            }else{
           $route=  url('/'); 
         return $this->checkAccess('store.storekeeper.add_stockin_archive','#','fa fa-camera','attach_file('.$stock_invoice_in_vw->inv_id_pk.')');
            }
        
        
        })  


     ->addColumn('attachment_display', function ($stock_invoice_in_vw) {
           $route=  url('/'); 
           $count_attachment=DB::connection("stock_con")->select("select *  from stock_in_archive where inv_id_pk=? and status=1 ",[$stock_invoice_in_vw->inv_id_pk]);

           if(count( $count_attachment)){

             return $this->checkAccess('store.storekeeper.stockin_viewimg','#','fa fa-picture-o','application_dept_id=0;view_attache('.$stock_invoice_in_vw->inv_id_pk.')');

           }else{

            return "";
           }
         
          })


           ->addColumn('cancel_invoice_in', function ($stock_invoice_in_vw) {

            if($stock_invoice_in_vw->status1 ==1){
              return '<span  class="label label-success" >تم   الاعتماد  </span>';

            }else{

              if($stock_invoice_in_vw->cancel1 ==1){
                return '<span  class="label label-danger" > تم الالغاء </span>';
              }else{
                return  '<a class="btn btn-danger" onclick="cancel_invoice_in('.$stock_invoice_in_vw->inv_id_pk.')"><i class="fa fa-trash"></i></a>'  ;

              }

             

            }
        
        
        
        })  

      
         
      




->make(true);

}

/******************************/
public function stock_invoice_in_item_vw($inv_id_pk){

$stock_invoice_in_item_vw=DB::connection("stock_con")->table('stock_invoice_in_item_vw')->select('item_id_pk','item_name','count1','count2','price','cur_name','status1','inv_id_pk')->where('inv_id_pk','=',$inv_id_pk);

 return  Datatables::of($stock_invoice_in_item_vw)



   ->addColumn('delete_item_invoice_in', function ($stock_invoice_in_item_vw) {

       if($stock_invoice_in_item_vw->status1 ==1){

        return '<span  class="label label-success" >  تم  الاعتماد     </span>';


       }else{

         return  '<a class="btn btn-danger" onclick="delete_item_invoice_in('.$stock_invoice_in_item_vw->item_id_pk.','.$stock_invoice_in_item_vw->inv_id_pk.')"><i class=" fa fa-trash"></i></a>'  ; 
       }



        })


->make(true);

}



public function delete_item_invoice_in($item_id_pk,$inv_id_pk){

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.delete_stock_in_item (:item_id_pk_in , :inv_id_pk_in   , :out_value   ); end;");

$stmtf->bindParam(':item_id_pk_in', $item_id_pk, PDO::PARAM_INT);
$stmtf->bindParam(':inv_id_pk_in', $inv_id_pk, PDO::PARAM_INT); 
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_STR);




 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم   الحذف  بنجاح  "];
    return  $return; 
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

/*************************************/
public function add_stock_in_item(Request $request){

 $user_id_in=  Sentinel::getUser()->id;

   $this->validate($request, [

           
            'item_id_pk_in'=>'required',
            'count1_in'=>'required',
            'count2_in'=>'required',
            'price_in'=>'required',
            'cur_in'=>'required',
           // note2_in
           
            ],[
            'item_id_pk_in.required'=>'الرجاء  ادخال   الصنف   ',
            'count1_in.required'=>' الرجاء   اختيار   المطلوب   ' ,
            'count2_in.required'=>'الرجاء  اختيار   المدخل   ' ,
            'price_in.required'=>' الرجاء  ادخال  السعر   ' ,
           
            'cur_in.required'=>' الرجاء  اختيار  العملة   ' ,

            ]); 


  $item_id_pk_in = $request->item_id_pk_in;
  $count1_in=$request->count1_in;
  $count2_in=$request->count2_in;
  $price_in=$request->price_in;
  $cur_in=$request->cur_in;
  $note2_in=$request->note2_in;
  $inv_id_pk_in=$request->inv_id_pk_in;

/*********************************************/
$admit_or_not=DB::connection("stock_con")->select(" select nvl(STATUS1,0)  stat1 from stock_invoice where INV_ID_PK=?",[ $inv_id_pk_in]);

if($admit_or_not[0]->stat1 ==1){

$return=["result"=>"error","response"=>" تم اعتماد  فاتورة   لادخال ولا تستطيع اضافة عناصر جديدة    !!"];
    return  $return; 

}

/******************************************/

  $pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_in_item (:item_id_pk_in, :count1_in ,:count2_in  , :price_in ,:cur_in  ,:note2_in,:inv_id_pk_in ,:out_value ); end;");
$stmtf->bindParam(':item_id_pk_in', $item_id_pk_in, PDO::PARAM_INT);
$stmtf->bindParam(':count1_in', $count1_in, PDO::PARAM_STR) ;
$stmtf->bindParam(':count2_in', $count2_in, PDO::PARAM_STR); 

$stmtf->bindParam(':price_in', $price_in, PDO::PARAM_STR);
$stmtf->bindParam(':cur_in', $cur_in, PDO::PARAM_INT);
$stmtf->bindParam(':note2_in', $note2_in, PDO::PARAM_STR);
$stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT);




  try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  الاضافة  بنجاح  "];
    return  $return; 
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




/*****************************************/
public function approve_stock_invoice($inv_id_pk_in,$inv_type){


 $approv_user_id_in=  Sentinel::getUser()->id;

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.approve_stock_invoice (:inv_id_pk_in ,:inv_type_in , :approv_user_id_in   ,:out_value  ); end;");


$stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
$stmtf->bindParam(':inv_type_in', $inv_type, PDO::PARAM_INT);
$stmtf->bindParam(':approv_user_id_in', $approv_user_id_in, PDO::PARAM_INT) ;
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 


  try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  الاعتماد  بنجاح  "];
    return  $return; 
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

/************************ */
public function according_approve($inv_id_pk_in){


  $approv_user_id_in=  Sentinel::getUser()->id;
 
 $pdof=DB::connection('stock_con')->getPdo();
 $stmtf=$pdof->prepare("begin stock_pkg.ACCORDING_APPROVE (:inv_id_pk_in , :ACCORDING_USER_IN   ,:out_value  ); end;");
 $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
 $stmtf->bindParam(':ACCORDING_USER_IN', $approv_user_id_in, PDO::PARAM_INT) ;
 $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
 
 
   try{$stmtf->execute();
 $return=["result"=>"ok","response"=>"تم  الاعتماد  بنجاح  "];
     return  $return; 
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

 /************************* */
 public function manager_approve($inv_id_pk_in){


  $approv_user_id_in=  Sentinel::getUser()->id;
 
 $pdof=DB::connection('stock_con')->getPdo();
 $stmtf=$pdof->prepare("begin stock_pkg.MANAGER_APPROVE (:inv_id_pk_in , :MANAGER_USER_IN    ,:out_value  ); end;");
 $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
 $stmtf->bindParam(':MANAGER_USER_IN', $approv_user_id_in, PDO::PARAM_INT) ;
 $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
 
 
   try{$stmtf->execute();
 $return=["result"=>"ok","response"=>"تم  الاعتماد  بنجاح  "];
     return  $return; 
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


/***************************/
public function add_stock_side_in_vw (){


   $side_name = DB::connection('stock_con')->table('stock_side_in_vw')->pluck('side_name');



return view("admin.stockstore.items.add_stock_side_in_vw",compact('side_name'));

}


public function add_stock_side_in_data(Request $request){


$this->validate($request, [

           
            'side_name_in'=>'required',

         
           
            ],[
            'side_name_in.required'=>'الرجاء   ادخال  اسم  المورد  ',
           

            ]); 


$side_name_in =$request->side_name_in;
$note_in=$request->note_in;
$address_in=$request->address_in;
$operator_no_in=$request->operator_no_in;
$tel_in=$request->tel_in;

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_side_in (:side_name_in  , :note_in ,:address_in,:operator_no_in,:tel_in  ,:out_value  ); end;");
$stmtf->bindParam(':side_name_in', $side_name_in, PDO::PARAM_STR);
$stmtf->bindParam(':note_in', $note_in, PDO::PARAM_STR) ;
$stmtf->bindParam(':address_in', $address_in, PDO::PARAM_STR) ;
$stmtf->bindParam(':operator_no_in', $operator_no_in, PDO::PARAM_INT) ;
$stmtf->bindParam(':tel_in', $tel_in, PDO::PARAM_INT) ;
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 


  try{$stmtf->execute();
$return=["result"=>"ok","response"=>" تم  الاضافة  بنجاح   "];
    return  $return; 
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
/********************************************/
public function stock_side_in_vw(Request $request){

     $side_name=$this->filterText($request->side_name);
     $address=$this->filterText($request->address);

  $stock_side_in_vw=DB::connection("stock_con")->table('stock_side_in_vw')->select('side_id','side_name','address','operator_no','tel','note1');

 if (!empty($side_name) ) { 
             $stock_side_in_vw->whereRaw($this->filterTextDB('side_name')." like ?", ["%{$side_name}%"]);
               }

if (!empty($address) ) { 
             $stock_side_in_vw->whereRaw($this->filterTextDB('address')." like ?", ["%{$address}%"]);
               }
               
 return  Datatables::of($stock_side_in_vw)
 ->make(true);

}

/***************************/

public function stock_card_vw_report($item_id_pk){
  $stock_item_main=DB::connection("stock_con")->select("select *  from stock_item_main_vw where item_id_pk=?",[$item_id_pk]);
  $stock_card_vws=DB::connection("stock_con")->table('stock_item_card1_vw')->select(DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('date1 as date2'),'inv_id_pk','side_name','input','output','price','inv_type_sub','inv_id',"status1" )
  ->where('item_id_pk','=',$item_id_pk)->where("status1","!=",0)->orderBy('date2','desc')->get();

  return view('admin.stockstore.report.stock_card_vw_report',compact('stock_item_main','stock_card_vws'));


}
///////////////////////////////////////////
public  function fav_item($item_id_pk){
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.set_favorite (:item_id_pk_in , :out_value  ); end;");
$stmtf->bindParam(':item_id_pk_in', $item_id_pk, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_STR); 



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  التعديل   بنجاح  "];
    return  $return; 
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


public  function custody_item($item_id_pk){
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.SET_CUSTODY (:item_id_pk_in , :out_value  ); end;");
$stmtf->bindParam(':item_id_pk_in', $item_id_pk, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_STR); 



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  التعديل   بنجاح  "];
    return  $return; 
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

/**************************/
public  function enabled_item($item_id_pk){
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.SET_ENABLED (:item_id_pk_in , :out_value  ); end;");
$stmtf->bindParam(':item_id_pk_in', $item_id_pk, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_STR); 



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  التعديل   بنجاح  "];
    return  $return; 
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


/***********************/
public function add_to_store($inv_id_pk){

$stock_invoice_in_vw=DB::connection("stock_con")->select("select stock_invoice_in_vw.*,to_char(date1,'dd/mm/yyyy') date1 from stock_invoice_in_vw  where inv_id_pk =?",[$inv_id_pk]);	
$stock_invoice_in_item_vws=DB::connection("stock_con")->select("select *  from stock_invoice_in_item_vw  where inv_id_pk=? ",[$inv_id_pk]);
$stock_invoice_sum_counts=DB::connection("stock_con")->select("select count(*) count , sum(price) sum from stock_invoice_in_item_vw  where inv_id_pk=? ",[$inv_id_pk]);


return view('admin.stockstore.report.add_to_store',compact('stock_invoice_in_vw','stock_invoice_in_item_vws','stock_invoice_sum_counts'));


}

/******************************/

public function add_to_store_sanad($inv_id_pk){

$stock_invoice_in_vw=DB::connection("stock_con")->select("select stock_invoice_in_vw.*,to_char(date1,'dd/mm/yyyy') date1 ,to_char(date3,'dd/mm/yyyy') date3 from stock_invoice_in_vw  where inv_id_pk =?",[$inv_id_pk]); 
$stock_invoice_in_item_vws=DB::connection("stock_con")->select("select *  from stock_invoice_in_item_vw  where inv_id_pk=? ",[$inv_id_pk]);
$stock_invoice_sum_counts=DB::connection("stock_con")->select("select count(*) count , sum(price) sum from stock_invoice_in_item_vw  where inv_id_pk=? ",[$inv_id_pk]);


return view('admin.stockstore.report.add_to_store_sanad',compact('stock_invoice_in_vw','stock_invoice_in_item_vws','stock_invoice_sum_counts'));


}


public function stock_receipt_vw($inv_id_pk){
  $stock_receipt_vws=DB::connection("stock_con")->select("select stock_receipt_vw.*,to_char(input_date,'dd/mm/yyyy') input_date   from stock_receipt_vw  where inv_id_pk=? ",[$inv_id_pk]);

return view('admin.stockstore.report.stock_receipt_vw',compact('stock_receipt_vws'));

}


/****************************************/
public function add_order_no (Request $request){


	$this->validate($request, [

           
            'date3_in_data'=>'required',
            'order_no_in_data'=>'required',

         
           
            ],[
            'date3_in_data.required'=>'الرجاء ادخال تاريخ الاستلام   ',
             'order_no_in_data.required'=>'الرجاء ادخال رقم  الفاتورة  ',
           

            ]); 




	$inv_id_pk_in=$request->inv_id_pk_in_data;
	$date3_in=$request->date3_in_data;
	$order_no_in=$request->order_no_in_data;

/******************************************/
$recireve_or_not=DB::connection("stock_con")->select(" select RECIEVED  recived1   from STOCK_INVOICE  where INV_ID_PK = ?",[$inv_id_pk_in]);
//echo "hi";
//exit;
if($recireve_or_not[0]->recived1 ==1){
//echo "hi";
//exit;
$return=["result"=>"error","response"=>" تم استلام الفاتورة وادخالها مسبقا   !!"];
return $return;

}else{


}



/*********************************************/

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_order_no (:inv_id_pk_in ,:date3_in ,:order_no_in , :out_value   ); end;");


$stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
$stmtf->bindParam(':date3_in', $date3_in, PDO::PARAM_STR);
$stmtf->bindParam(':order_no_in', $order_no_in, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  التعديل   بنجاح  "];
    return  $return; 
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


/**************************************/
 public function add_store_storekeeper(){
    $orders=DB::connection('stock_con')->select("select * from stock_ITEM_CLASS ORDER BY CLASS_NAME ASC");
    $items=DB::connection('stock_con')->select("select * from stock_item_vw order by ITEM_NAME ASC");
    $npla_departments=DB::connection("stock_con")->select("select *  from  npla_departments");
    $users=DB::connection("stock_con")->select("select *  from users");   
    return view("admin.stockstore.items.add_store_storekeeper",compact('orders','items','npla_departments','users'));

   }


/**************************************/
public function cancel_order($id_in){

$added_before=DB::connection("stock_con")->select("select count(INV_ID_PK)  count1 from STOCK_INVOICE where ORD_ID=?",[$id_in]);

if($added_before[0]->count1 >0){
 $return=["result"=>"error","response"=>" الطلبية  تم  اعتمادها   وتحويلها  الى  فاتورة   "];
       return  $return; 
}


  $pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.cancel_order (:id_in , :out_value   ); end;");


$stmtf->bindParam(':id_in', $id_in, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_STR);




 try{$stmtf->execute();
$return=["result"=>"ok","response"=>" تم  الغاء   الطلبية  بنجاح   "];
    return  $return; 
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

/******************************/
public function stock_min_qnt_vw(){

return view('admin.stockstore.items.stock_min_qnt_vw');

}

/************************************/

public function stock_min_qnt_data(Request $request){
	   $item_name=$this->filterText($request->item_name);


$stock_min_qnt_data=DB::connection("stock_con")->table('stock_min_qnt')
                                             ->select('item_name','item_count','min_qnt','favorite')
                                              ->orderBy('item_count','desc')
                                             ->orderBy('favorite','desc');

 if (!empty($item_name) ) { 
             $stock_min_qnt_data->whereRaw($this->filterTextDB('item_name')." like ?", ["%{$item_name}%"]);
               } 

 return  Datatables::of($stock_min_qnt_data)

 ->addColumn('is_fav', function ($stock_min_qnt_data) {

    if($stock_min_qnt_data->favorite == 1){
      return '<i class="fa fa-2x fa-star" style="color:yellow"></i>';

    }else{
     return "";

    }


})

    ->addColumn('item_count_data', function ($stock_min_qnt_data) {

   
      return '<span  class="label label-danger">'.$stock_min_qnt_data->item_count.'</span>';

   

})

 ->make(true);


}


/****************************************/
public function all_order_approved_vw(){

  $orders=DB::connection('stock_con')->select("select * from stock_ITEM_CLASS ORDER BY CLASS_NAME ASC");
    $items=DB::connection('stock_con')->select("select * from stock_item_vw order by ITEM_NAME ASC");
    $departments=DB::connection("stock_con")->select("select *  from  npla_departments");
    $stock_item_mains=DB::connection("stock_con")->select("select *  from stock_item_main ");

return view('admin.stockstore.items.all_order_approved_vw',compact('orders','items','departments','stock_item_mains'));
}



/***********************************************/
public function all_order_approved_vw_data_shared(Request $request){
  $serial_num=$request->serial_num;
  $years=$request->years;
  $dept=$request->dept;
  $date1_from =$request->date1_from;
  $date1_to=$request->date1_to;
  $date2_from=$request->date2_from;
  $date2_to=$request->date2_to;
  $item_id_pk=$request->item_id_pk;
  $item_id_pk_data=$request->item_id_pk_data;


$all_order_approved_vws=DB::connection("stock_con")->table("STOCK_ALL_ORDER_APPROVED_VW")->select('serial_num','years','full_name','dept','name','date1','date2','need1','given1','unit_name','class_name','item_name','item_id_pk',DB::raw('to_char(date1,\'MM/DD/YYYY\')date1_data'),DB::raw('to_char(date2,\'MM/DD/YYYY\')date2_data'))->orderBy("date2_data","desc");

 if (!empty($serial_num) ){
              $all_order_approved_vws->whereRaw("serial_num = ?", ["$serial_num"]);
            }

      if (!empty($years) ){
              $all_order_approved_vws->whereRaw("years = ?", ["$years"]);
            }

            if (!empty($dept) ){
              $all_order_approved_vws->whereRaw("dept = ?", ["$dept"]);
            }

       if (!empty($item_id_pk)  ){
              $all_order_approved_vws->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
            }  

   if (!empty($item_id_pk_data)  ){
              $all_order_approved_vws->whereRaw("item_id_pk = ?", ["$item_id_pk_data"]);
            }  
              

 if(!empty($date1_from) && !empty($date1_to) ){
        $all_order_approved_vws->whereBetween('date1', array($date1_from."00:00:00" , $date1_to."23:59:59"));
       }
       if(!empty($date2_from) &&  !empty($date2_to)){

         $all_order_approved_vws->whereBetween('date2', array($date2_from."00:00:00" , $date2_to."23:59:59"));
       }
return $all_order_approved_vws;

}

/**********************************************/
public function all_order_approved_vw_data (Request $request){


$all_order_approved_vws=$this->all_order_approved_vw_data_shared($request);

return  Datatables::of($all_order_approved_vws)
 ->make(true);





}
/********************************************/
public function departments_report(Request $request){

 // var_dump($request->item_id_pk_data);

$all_order_approved_vws=$this->all_order_approved_vw_data_shared($request);
$all_datas=$all_order_approved_vws->get();

return view('admin.stockstore.report.departments_report',compact('all_datas'));


}



/*******************************************************************/

  /////////////////////////////attachment///////////////////////////////////////////
    public function display_stockin_images($inv_id_pk){
  
  $data=DB::connection($this->connection)->select(" select * from stock_in_archive  where inv_id_pk=?   and status=1  ",[$inv_id_pk]);
  return $data;

}
////////////////////////رفع الصور/////////////////

public function stockin_attachment(Request $request){
 // return config('global.qnap');

 
  $uploadedInfo=$this->uploadeImage($this->main_path,$this->thumbnail_path,$request->file);
  $inv_id_pk = $request->inv_id_pk; 

  $files = $request->file;
 

 foreach($uploadedInfo as $info) {
    
      
      DB::connection($this->connection)->


      insert("insert into stock_in_archive (imgname,imgpath, imgtype,imgsize,imgext ,ipaddress,adddate,userid,status,inv_id_pk,arch_month,arch_year,arch_status) values (?,?,?,?,?,?,sysdate,?,1 ,? ,to_char(sysdate,'MM'),to_char(sysdate,'YYYY'),1)",
        [  $info['new_name'],
           $info['destinationPath'],
          $info['type'] ,
            $info['size'] ,
           $info['file_exe'] ,
           $info['ipaddress'],
           $info['user_id'],
           $inv_id_pk
          ]
    
);
    }

   

} 

//////////////////////////////////////////////////////////

public function delete_stockin_attachment($year,$month,$imgname){



  $table="GOV.stock_in_archive";
  $data=DB::connection($this->connection)->select("select imgname , arch_month ,imgext, arch_year , inv_id_pk   from  stock_in_archive   where arch_year=$year  and arch_month=$month  and imgname='$imgname'  ");
  $inv_id_pk=$data[0]->inv_id_pk;

   $imgext=$data[0]->imgext;

  

  $sourcePath =  $this->main_path."$year/$month/";
   $destPath=$this->recycle_main_path."$year/$month/ ";
  
   $s_thumb=$this->thumbnail_path."$year/$month/";
   $d_thumb=$this->recycle_thumbnail_path."$year/$month/";


$query =DB::connection($this->connection)->table('GOV.stock_in_archive')
            ->where('arch_year',$year )
            ->where('arch_month',$month)
            ->where('imgname',$imgname)
            ->update(['status' => 9]);

   if($query) {        

   if (!file_exists($this->recycle_main_path."$year/$month/")) {
    mkdir($this->recycle_main_path."$year/$month/", 0777, true);
}   

 if (!file_exists($this->recycle_thumbnail_path."$year/$month/")) {
    mkdir($this->recycle_thumbnail_path."$year/$month/", 0777, true);
}    



if( ($imgext=='JPG' || $imgext=='PNG'  || $imgext=='GIF' || $imgext=='jpg' || $imgext=='png' || $imgext=='gif' ) )  {
File::move($sourcePath.$imgname, $destPath.$imgname);

File::move($s_thumb.$imgname, $d_thumb.$imgname);}
else {
File::move($sourcePath.$imgname, $destPath.$imgname);

  
} 

$return['result']="ok";
$return['inv_id_pk']=$inv_id_pk;



return $return;


}

 }


////////////////////////////////////////////////////////////////
 public  function delete_selected_attach_stockin($imgname){

  $table="GOV.stock_in_archive";
  $data=DB::connection($this->connection)->select("select imgname , inv_id_pk , imgext, arch_month , arch_year   from  stock_in_archive  where imgname='$imgname'  and status=1  ");
   $inv_id_pk=$data[0]->inv_id_pk;
 
  $imgext=$data[0]->imgext;

  $month=$data[0]->arch_month;
  $year=$data[0]->arch_year;
  

   $sourcePath =  $this->main_path."$year/$month/";
   $destPath=$this->recycle_main_path."$year/$month/";
  
   $s_thumb=$this->thumbnail_path."$year/$month/";
   $d_thumb=$this->recycle_thumbnail_path."$year/$month/";

 $query =DB::connection($this->connection)->table('GOV.stock_in_archive')
            ->where('arch_year',$data[0]->arch_year )
            ->where('arch_month',$data[0]->arch_month)
            ->where('imgname',$data[0]->imgname)
            ->update(['status' => 9]);


          if($query) {        

  $this->deleteImage($sourcePath,$s_thumb,$destPath,$d_thumb,$imgname,$imgext);





$return['result']="ok";
$return['inv_id_pk']=$inv_id_pk;

return $return;




}

 
  

 }

//////////////////////////////////////////////////////////////

 public function show_thumb_stockinvw($arch_year,$arch_month,$imgname){
 

  $this->watermarkImage( $this->thumbnail_path.$arch_year."/".$arch_month."/".$imgname);

 }
////////////////////////////////////
public function show_image($arch_year,$arch_month,$imgname){
 $table="GOV.stock_in_archive";
  $data=DB::connection($this->connection)->select("select imgname , arch_month , arch_year , title , imgext  from  stock_in_archive  where imgname= ? and status=1 ",[$imgname]);

  if ($data[0]->imgext=="jpg" || $data[0]->imgext=="jpeg" || $data[0]->imgext=="png" || $data[0]->imgext=="gif" ){
   
  $this->watermarkImage($this->main_path.$arch_year."/".$arch_month."/".$imgname);

  }else {
    return $this->downloadFile($this->main_path.$arch_year."/".$arch_month."/".$imgname,$data[0]->title,$data[0]->imgext);
  }

 }


 /////////////////////////////////الغاء طلبية غير معتمدة 

public function cancel_stock_in_invoice($inv_id_pk){

 $cancel_user_id_in=Sentinel::getUser()->id;

  $pdof=DB::connection('stock_con')->getPdo();

  $stmtf=$pdof->prepare("begin stock_pkg.cancel_stock_in_invoice (:inv_id_pk_in , :cancel_user_id_in ,:out_value   ); end;");
  
  
  $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk, PDO::PARAM_INT);
  $stmtf->bindParam(':cancel_user_id_in', $cancel_user_id_in, PDO::PARAM_INT);
  $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
  
  
  
   try{$stmtf->execute();
  $return=["result"=>"ok","response"=>"تم  الالغاء    بنجاح  "];
      return  $return; 
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

/***************************موالفقة المدير على الصرف*** */
public function update_order_status($order_num){


  $status_flag_in=2;
  $status_user_in=Sentinel::getUser()->id;

  $pdof=DB::connection('stock_con')->getPdo();

  $stmtf=$pdof->prepare("begin stock_pkg.UPDATE_ORDER_STATUS (:id_in , :status_flag_in ,:status_user_in ,:out_value   ); end;");
  
  
  $stmtf->bindParam(':id_in', $order_num, PDO::PARAM_INT);
  $stmtf->bindParam(':status_flag_in', $status_flag_in, PDO::PARAM_INT);
  $stmtf->bindParam(':status_user_in', $status_user_in, PDO::PARAM_INT);
  $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
  
  
  
   try{$stmtf->execute();
  $return=["result"=>"ok","response"=>"تم الموافقة على الصرف    بنجاح  "];
      return  $return; 
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

/*******************************سعر صرف  الدولار حسب التاريخ*********************** */
public function pla_usd_cur(Request $request){
  $date3_in=$request->date3_in;


  $pla_usd_cur=DB::connection("stock_con")->select("SELECT PLA_PKG.PLA_USD_CUR(?) as usd from dual",[$date3_in]);

return $pla_usd_cur[0]->usd;

}



/******************************سعر صرف الدينار حسب التاريخ******************* */
public function pla_jd_cur(Request $request){
  $date3_in=$request->date3_in;


  $pla_jd_cur=DB::connection("stock_con")->select("SELECT PLA_PKG.PLA_jd_CUR(?) as usd from dual",[$date3_in]);

return $pla_jd_cur[0]->usd;

}

/********************************** */
public function  stock_invoice_out_all_vw(Request $request){
  $stock_item_mains=DB::connection("stock_con")->table("stock_item_main")->select("item_id","item_name")->get();

  return view("admin.stockstore.items.stock_invoice_out_all_vw",compact('stock_item_mains'));

}

/*********************** */
public function stock_invoice_out_all_vw_data(Request $request){
$inv_num=$request->inv_num;
$inv_year=$request->inv_year;
$order_num=$request->order_num;
$order_year=$request->order_year;
$item_id_pk=$request->item_id_pk;

$stock_invoice_out_all_vw_data=DB::connection("stock_con")->table("stock_invoice_out_all_vw")->select("inv_num","inv_year","side_name","user_id",
"full_name","order_num","order_year","item_id_pk","item_name","count1","count2","full_name");

if (!empty($inv_num) ){
  $stock_invoice_out_all_vw_data->whereRaw("inv_num = ?", ["$inv_num"]);
}


if (!empty($inv_year) ){
  $stock_invoice_out_all_vw_data->whereRaw("inv_year = ?", ["$inv_year"]);
}

if (!empty($order_num) ){
  $stock_invoice_out_all_vw_data->whereRaw("order_num = ?", ["$order_num"]);
}

if (!empty($order_year) ){
  $stock_invoice_out_all_vw_data->whereRaw("order_year = ?", ["$order_year"]);
}

if (!empty($item_id_pk) ){
  $stock_invoice_out_all_vw_data->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
}


return Datatables::of($stock_invoice_out_all_vw_data)


     ->addColumn('inv_data', function ($stock_invoice_out_all_vw_data) {

     return $stock_invoice_out_all_vw_data->inv_num."/".$stock_invoice_out_all_vw_data->inv_year;


        })

        ->addColumn('order_data', function ($stock_order_data) {

          return $stock_invoice_out_all_vw_data->order_num."/".$stock_invoice_out_all_vw_data->order_num;
     
     
             })

             ->make(true);


}


/****************************************** */

public function stock_beginning_item_vw(){

  return view('admin.stockstore.items.stock_beginning_item_vw');

}

/***************************************** */
public function stock_beginning_item_vw_data(Request $request){

  $stock_beginning_item_vw_data=DB::connection("stock_con")->table("stock_beginning_item_vw")->select("beg_id","count1","count2","item_id_pk","item_name","inv_id_pk");
  return Datatables::of($stock_beginning_item_vw_data)
  ->make(true);
}


/******************************** */

public function stock_beginning_item_vw_for_one_req($inv_id_pk , Request $request){

  $item_id_pk_ser1=$request->item_id_pk_ser1;

  $stock_beginning_item_vw=DB::connection("stock_con")->table("stock_beginning_item_vw")
  ->select("beg_id","count1","count2","item_id_pk","item_name","inv_id_pk","status1")
  ->where("inv_id_pk",$inv_id_pk)->orderBy("count1","desc");


  if (!empty($item_id_pk_ser1) ){
    $stock_beginning_item_vw->whereRaw("item_id_pk = ?", ["$item_id_pk_ser1"]);
  }

  return Datatables::of($stock_beginning_item_vw)

  ->addColumn('add_begining_inv_item', function ($stock_beginning_item_vw) {

  if($stock_beginning_item_vw->status1 ==1){

    return '<span  class="label label-success" >  تم  الاعتماد     </span>';

    
   }else{

     return  '<a class="btn btn-warning" onclick="add_begining_inv_item('.$stock_beginning_item_vw->beg_id.','.$stock_beginning_item_vw->inv_id_pk.')"><i class=" fa fa-edit"></i></a>'  ; 
   }

  })

  ->make(true);
}

/*****************************تعديل عناصر طلبية الجرد************ */
public function stock_beginning_item_vw_only_one_data($beg_id){
  $stock_beginning_item_vw=DB::connection("stock_con")->table("stock_beginning_item_vw")
  ->select("beg_id","count1","count2","item_id_pk","item_name","inv_id_pk","status1")->where("beg_id",$beg_id)->get();

  return $stock_beginning_item_vw;


}



/********************************************************* */
public function add_begining_inv_item(Request $request){

	$this->validate($request, [

           
    'beg_id_in'=>'required',
    'beg_count1_in'=>'required',
    'beg_count2_in'=>'required',

 
   
    ],[
    'beg_id_in.required'=>'الرجاء اختيار الصنف',
     'beg_count1_in.required'=>' الرجاء اضافة الصنف قبل الجرد  ',
     'beg_count2_in.required'=>' الرجاء اضافة الصنف بعد الجرد  ',
   

    ]); 
     

  $user_id_in=Sentinel::getUser()->id;
  $beg_id_in=$request->beg_id_in;

 // echo $beg_id_in;
 // exit;
  $count1_in=$request->beg_count1_in;
  $count2_in=$request->beg_count2_in;
  $note_in=$request->beg_note_in;
  $item_id_pk_in=$request->beg_item_id_pk_in;
  $inv_id_pk_in=$request->beg_inv_id_pk_in;






  $pdof=DB::connection('stock_con')->getPdo();

  $stmtf=$pdof->prepare("begin stock_pkg.ADD_BEGINNING_INV_ITEM (:BEG_ID_IN  , :COUNT1_IN  ,:COUNT2_IN  ,:NOTE_IN  ,:ITEM_ID_PK_IN ,:INV_ID_PK_IN ,:USER_ID_IN ,:OUT_VALUE    ); end;");
  
  
  $stmtf->bindParam(':BEG_ID_IN', $beg_id_in, PDO::PARAM_INT);
  $stmtf->bindParam(':COUNT1_IN', $count1_in, PDO::PARAM_INT);
  $stmtf->bindParam(':COUNT2_IN', $count2_in, PDO::PARAM_INT);
  $stmtf->bindParam(':NOTE_IN', $note_in, PDO::PARAM_STR); 
  $stmtf->bindParam(':ITEM_ID_PK_IN', $item_id_pk_in, PDO::PARAM_INT); 
  $stmtf->bindParam(':INV_ID_PK_IN', $inv_id_pk_in, PDO::PARAM_INT); 
  $stmtf->bindParam(':USER_ID_IN', $user_id_in, PDO::PARAM_INT); 

  
  $stmtf->bindParam(':OUT_VALUE', $out_value, PDO::PARAM_INT); 
  
  
  
   try{$stmtf->execute();
  $return=["result"=>"ok","response"=>"تم الحفظ بنجاح  "];
      return  $return; 
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

/****************************** */


}


