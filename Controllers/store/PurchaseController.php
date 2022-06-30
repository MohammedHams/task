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


class  PurchaseController extends Controller{

   public function  stock_purchasing_vw(){  

 	 $stock_in_out_sides=DB::connection("stock_con")->select("select *  from stock_in_out_sides where side_type=2");
   $stock_item_mains=DB::connection("stock_con")->select("select *  from stock_item_main ");
   $cur_ins=DB::connection("stock_con")->select("select *  from status where p_id=321");

    return view("admin.stockstore.purchasing.stock_purchasing_vw",compact('stock_in_out_sides','stock_item_mains','cur_ins'));


   }

/*********************************************/
public function add_purchasing_data(Request $request){

  $user_id_in=  Sentinel::getUser()->id;

   $this->validate($request, [

           
            'side_id_in'=>'required',
           'serial_in'=>'required',
            'date3_in'=>'required',
           'year_in'=>'required',
          
            'cur_in'=>'required',
	    		'recieved_in'=>'required',
           
            ],[
            'side_id_in.required'=>'الرجاء  اختيار   الجهة  الموردة  ',
            'serial_in.required'=>' الرجاء ادخال رقم الطلبية  ' ,
            'year_in.required'=>' الرجاء ادخال سنة الطلبية  ' ,

            'date3_in.required'=>'الرجاء  ادخال  تاريخ  الشراء  ' ,
            'recieved_in.required'=>' الرجاء اختيار تم الاستلام أم  لا    ' ,
           
          
             'cur_in.required'=>' الرجاء  ادخال  العملة   ' ,

            ]); 


  $side_id_in = $request->side_id_in;
 // $date1_in=$request->date1_in;
  $date3_in=$request->date3_in;
  $serial_in=$request->serial_in;
  $year_in=$request->year_in;
  $cur_in =$request->cur_in;
  $recieved_in=$request->recieved_in;
  $note1_in=$request->note1_in;

  if(!empty($request->add_purchasing_inv_id_pk_in)){
    $inv_id_pk_in=$request->add_purchasing_inv_id_pk_in;

  }else{
    $inv_id_pk_in=0;

  }
 
//echo $inv_id_pk_in;



$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.ADD_PURCHASING (:inv_id_pk_in , :side_id_in , :note1_in   , :date3_in
  ,:serial_in   ,:year_in ,:user_id_in ,:cur_in ,:recieved_in ,:out_value ); end;");
  $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
$stmtf->bindParam(':side_id_in', $side_id_in, PDO::PARAM_INT);
//$stmtf->bindParam(':date1_in', $date1_in, PDO::PARAM_STR) ;
$stmtf->bindParam(':note1_in', $note1_in, PDO::PARAM_STR); 

$stmtf->bindParam(':date3_in', $date3_in, PDO::PARAM_STR);
$stmtf->bindParam(':serial_in', $serial_in, PDO::PARAM_INT);

$stmtf->bindParam(':year_in', $year_in, PDO::PARAM_STR);

$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':cur_in', $cur_in, PDO::PARAM_INT);
$stmtf->bindParam(':recieved_in', $recieved_in, PDO::PARAM_INT);
 
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT);



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  الحفظ  بنجاح  ","inv_id_pk"=>$out_value];
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


  /*************************************************** */
  public function add_purchasing_item(Request $request){
    
    $user_id_in=  Sentinel::getUser()->id;
   
      $this->validate($request, [
   
              
               'item_id_pk_in'=>'required',
               'count1_in'=>'required',
               'unit_price_in'=>'required',
               'price_in'=>'required',
               'cur_in_item'=>'required',
              // note2_in
              
               ],[
               'item_id_pk_in.required'=>'الرجاء  ادخال   الصنف   ',
               'count1_in.required'=>' الرجاء   اختيار   المطلوب   ' ,
               'unit_price_in.required'=>' الرجاء ادخال سعر الوحدة   ' ,
               'price_in.required'=>' الرجاء  ادخال  السعر   ' ,
              
               'cur_in_item.required'=>' الرجاء  اختيار  العملة   ' ,
   
               ]); 
   
   
     $item_id_pk_in = $request->item_id_pk_in;
     $count1_in=$request->count1_in;
     $unit_price_in=$request->unit_price_in;
     $price_in=$request->price_in;
     $cur_in=$request->cur_in_item;
     $note2_in=$request->note2_in;
     $inv_id_pk_in=$request->inv_id_pk_in;
     $catalog_no_in=$request->catalog_no_in;
     $id1_in=$request->id1_in;
    if(!empty($request->pur_id_in)){
      $pur_id_in=$request->pur_id_in;
    }else{
      $pur_id_in=0;

    }
   /*********************************************/
  

    
     $pdof=DB::connection('stock_con')->getPdo();
   $stmtf=$pdof->prepare("begin stock_pkg.ADD_PURCHASING_ITEM (:pur_id_in , :item_id_pk_in, :count1_in ,:unit_price_in 
     , :price_in ,:cur_in  ,:note2_in,:inv_id_pk_in 
    ,:catalog_no_in ,:id1_in , :user_id_in   ,:out_value ); end;");

   $stmtf->bindParam(':pur_id_in', $pur_id_in, PDO::PARAM_INT);
   $stmtf->bindParam(':item_id_pk_in', $item_id_pk_in, PDO::PARAM_INT);
   $stmtf->bindParam(':count1_in', $count1_in, PDO::PARAM_STR) ;
   $stmtf->bindParam(':unit_price_in', $unit_price_in, PDO::PARAM_STR); 
   
   $stmtf->bindParam(':price_in', $price_in, PDO::PARAM_STR);
   $stmtf->bindParam(':cur_in', $cur_in, PDO::PARAM_INT);
   $stmtf->bindParam(':note2_in', $note2_in, PDO::PARAM_STR);
   $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
   $stmtf->bindParam(':catalog_no_in', $catalog_no_in, PDO::PARAM_INT);
   $stmtf->bindParam(':id1_in', $id1_in, PDO::PARAM_INT); 
   $stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);
   $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT);
   
   
   
   
     try{$stmtf->execute();
   $return=["result"=>"ok","response"=>"تم  الحفظ  بنجاح  ","inv_id_pk"=>$inv_id_pk_in];
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
   
/********************************************** */
public function stock_purchasing_vw_one_data(Request $request,$inv_id_pk){

  $stock_purchasing_vw_one_data=DB::connection("stock_con")->table('stock_purchasing_vw')->select('inv_id_pk','inv_type','side_name',
  DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('to_char(date3,\'DD/MM/YYYY\')date3'),
  'user_id','serial','year1','side_id','recieved','cancel1','status1','cur_id','note1')->where('inv_id_pk','=',$inv_id_pk)->get();

  return $stock_purchasing_vw_one_data;


}
/*************************************************************/ 
public function stock_purchasing_vw_data(Request $request){
// status1=1 تم الاعتماد


  
  $serial=$request->serial;
  $year1=$request->year1;
  $side_id=$request->side_id;
  
  $stock_purchasing_vw=DB::connection("stock_con")->table('stock_purchasing_vw')->select('inv_id_pk','inv_type','side_name',
  DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('to_char(date3,\'DD/MM/YYYY\')date3'),
  'user_id','serial','year1','side_id','recieved','cancel1','status1');
  
  
  
        
  
              if (!empty($serial) ){
                $stock_purchasing_vw->whereRaw("serial = ?", ["$serial"]);
              }
  
               if (!empty($year1) ){
                $stock_purchasing_vw->whereRaw("year1 = ?", ["$year1"]);
              }
  
                if (!empty($side_id) ){
                $stock_purchasing_vw->whereRaw("side_id = ?", ["$side_id"]);
              }
  
    
  
   return  Datatables::of($stock_purchasing_vw)
  
    ->addColumn('serial_year_data', function ($stock_purchasing_vw) {
           return  $stock_purchasing_vw->serial."/".$stock_purchasing_vw->year1  ;
          })
  
     ->addColumn('add_purchasing_item', function ($stock_purchasing_vw) {
  
      if($stock_purchasing_vw->cancel1 ==1) {
        return '<span  class="label label-danger" > تم الالغاء </span>';
      }else{
  
           return  '<a id="add_purchasing_item_'.$stock_purchasing_vw->inv_id_pk.'" class="btn btn-info" onclick="add_purchasing_item('.$stock_purchasing_vw->inv_id_pk.')"><i class="fa fa-plus"></i></a>'  ;
      }
          })

        
          ->addColumn('approve_purchasing', function ($stock_purchasing_vw) {
  
            if($stock_purchasing_vw->cancel1 ==1) {
              return '<span  class="label label-danger" > تم الالغاء </span>';
            }else if($stock_purchasing_vw->status1==1){

              return '<span  class="label label-success" > تم الاعتماد </span>';
      
            }else{
        
                 return  '<a class="btn btn-warning" onclick="approve_purchasing('.$stock_purchasing_vw->inv_id_pk.')"><i class="fa fa-check"></i></a>'  ;
            }
                })     


                
                ->addColumn('cancel_purchasing', function ($stock_purchasing_vw) {
  
                  if($stock_purchasing_vw->cancel1 ==1) {
                    return '<span  class="label label-danger" > تم الالغاء </span>';
                   } else if($stock_purchasing_vw->status1==1){

                      return '<span  class="label label-success" > تم الاعتماد </span>';
              
                    }else{
              
                       return  '<a class="btn btn-danger" onclick="cancel_purchasing('.$stock_purchasing_vw->inv_id_pk.')"><i class="fa fa-trash"></i></a>'  ;
                  }
                      })        






      ->addColumn('edit_purchasing_data', function ($stock_purchasing_vw) {
  
                  if($stock_purchasing_vw->cancel1 ==1) {
                    return '<span  class="label label-danger" > تم الالغاء </span>';
                   } else if($stock_purchasing_vw->status1==1){

                    return '<span  class="label label-success" > تم الاعتماد </span>';
                //  return  '<a class="btn btn-warning" onclick="edit_purchasing_data('.$stock_purchasing_vw->inv_id_pk.')"><i class="fa fa-edit"></i></a>'  ;
              
                    }else{
              
                      return  '<a id="edit_purchasing_data_'.$stock_purchasing_vw->inv_id_pk.'" class="btn btn-warning" onclick="edit_purchasing_data('.$stock_purchasing_vw->inv_id_pk.')"><i class="fa fa-edit"></i></a>'  ;
                  }
                      })        
  
  

                      ->addColumn('purchasing_report', function ($stock_purchasing_vw) {

                        // بدو تغير الصلاحية 

                        $route=  url('/'); 
                        return $this->checkAccess('store.purchasing.stock_purchasing_vw',$route.'/stock_store/purchasing/purchasing_report/'.$stock_purchasing_vw->inv_id_pk,'fa fa-print','#');



                      })




          ->addColumn('attachment', function ($stock_purchasing_vw) {

            if($stock_purchasing_vw->cancel1 ==1) {
              return '<span  class="label label-danger" > تم الالغاء </span>';
            }else{
            $route=  url('/'); 
          return $this->checkAccess('store.purchasing.stockin_attachment','#','fa fa-camera','attach_file('.$stock_purchasing_vw->inv_id_pk.')');
            }
        
        
        })  
            
            
          ->addColumn('attachment_display', function ($stock_purchasing_vw) {
                $route=  url('/'); 
                $count_attachment=DB::connection("stock_con")->select("select *  from stock_in_archive where inv_id_pk=? and status=1 ",[$stock_purchasing_vw->inv_id_pk]);
    
                if(count( $count_attachment)){
    
                  return $this->checkAccess('store.purchasing.display_stockin_images','#','fa fa-picture-o','application_dept_id=0;view_attache('.$stock_purchasing_vw->inv_id_pk.')');
    
                }else{
    
                return "";
                }
              
              })




  
  ->make(true);
  
  }




/**********************تأكيد طلبية الشراء************************* */  
public function approve_purchasing($inv_id_pk_in){
  $approv_user_id_in=  Sentinel::getUser()->id;

  $pdof=DB::connection('stock_con')->getPdo();
  $stmtf=$pdof->prepare("begin stock_pkg.approve_purchasing (:inv_id_pk_in, :approv_user_id_in , :out_value ); end;");
  $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
  $stmtf->bindParam(':approv_user_id_in', $approv_user_id_in, PDO::PARAM_INT) ;
  $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
  
  
  try{$stmtf->execute();
    $return=["result"=>"ok","response"=>"تم  التأكيد  بنجاح  "];
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

/************************الغاء طلبية الشراء****************** */
public function cancel_purchasing($inv_id_pk_in){
  $cancel_user_id_in=  Sentinel::getUser()->id;


  $pdof=DB::connection('stock_con')->getPdo();
  $stmtf=$pdof->prepare("begin stock_pkg.cancel_purchasing (:inv_id_pk_in, :cancel_user_id_in , :out_value ); end;");
  $stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);
  $stmtf->bindParam(':cancel_user_id_in', $cancel_user_id_in, PDO::PARAM_INT) ;
  $stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 
  
  
  try{$stmtf->execute();
    $return=["result"=>"ok","response"=>"تم  الحذف  بنجاح  "];
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
/************************************************ */
public function stock_purchasing_item_vw(Request $request,$inv_id_pk_in){
  

  $stock_purchasing_item_vw=DB::connection("stock_con")->table("stock_purchasing_item_vw")->select("pur_id","inv_type","count1","note2","unit_price","price"
  ,"cur_name","item_name","class_name","catalog_no","id1","unit_name","item_id_pk","inv_id_pk","user_date")->where("inv_id_pk","=",$inv_id_pk_in)->orderBy("user_date","asc");

  return  Datatables::of($stock_purchasing_item_vw)

  ->addColumn('edit_purchasing_item', function ($stock_purchasing_item_vw) {

    return  '<a class="btn btn-warning" onclick="edit_purchasing_item('.$stock_purchasing_item_vw->pur_id.','.$stock_purchasing_item_vw->inv_id_pk.')"><i class="fa fa-edit"></i></a>'  ;

   })

  ->make(true);

}



/////////////////////////////////////////////////////////
public function stock_purchasing_item_data(Request $request,$pur_id){

  $stock_purchasing_item_data=DB::connection("stock_con")->table("stock_purchasing_item_vw")->select("pur_id","inv_type","count1","note2","unit_price","price"
  ,"cur_name","item_name","class_name","catalog_no","id1","unit_name","item_id_pk","inv_id_pk","cur_id")->where("pur_id","=",$pur_id)->get();

 return $stock_purchasing_item_data;

}

/////////////////////////////////////////////////////
public function purchasing_report($inv_id_pk){
  $stock_purchasing_vw=DB::connection("stock_con")->table('stock_purchasing_vw')->select('inv_id_pk','inv_type','side_name',
  DB::raw('to_char(date1,\'DD/MM/YYYY\')date1'),DB::raw('to_char(date3,\'DD/MM/YYYY\')date3'),
  'user_id','serial','year1','side_id','recieved','cancel1','status1','cur_name')->where("inv_id_pk","=",$inv_id_pk)->get();

//return  $stock_purchasing_vw;
  $stock_purchasing_item_datas=DB::connection("stock_con")->table("stock_purchasing_item_vw")->select("pur_id","inv_type","count1","note2","unit_price","price"
  ,"cur_name","item_name","class_name","catalog_no","id1","unit_name","item_id_pk","inv_id_pk","cur_id","user_date")->where("inv_id_pk","=",$inv_id_pk)
  ->orderBY("user_date","asc")->get();

  if(count($stock_purchasing_vw)){
    $stock_side_in_vw=DB::connection("stock_con")->table('stock_side_in_vw')->
    select('side_id','side_name','address','operator_no','tel','note1')->where("side_id","=",$stock_purchasing_vw[0]->side_id)->get();

  }else{

    $stock_side_in_vw=[];
  }

//return  $stock_side_in_vw;
return view('admin.stockstore.report.purchasing_report',compact('stock_purchasing_vw','stock_purchasing_item_datas','stock_side_in_vw'));

}


/****************************************** */


}


