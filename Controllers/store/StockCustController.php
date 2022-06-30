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


class StockCustController extends Controller{

   public function add_stock_custody_vw(){

 	   $users=DB::connection('stock_con')->select("select * from users ");
 	   $inv_types=DB::connection("stock_con")->select("select *  from status where p_id=964");
 	   $trans_types=DB::connection("stock_con")->select("select *  from status where p_id=967");

   	 $stock_item_mains=DB::connection("stock_con")->select("select  item_id_pk, item_name from stock_item_main where custody=1");
     $departments=DB::connection('stock_con')->table('npla_departments') ->select('name','id') ->get();
    return view("admin.stockstore.stockcust.add_stock_custody_vw",compact('users','stock_item_mains','departments','inv_types','trans_types'));


   }

/*********************************************/
public function add_stock_cust(Request $request){

//type

// نوع  الطلبية   
//966 طلبية  قديمة  
//965  طلبية  ادخال	
//inv_type
 $trans_types_in=$request->trans_types_in; 
 $user_id_in=Sentinel::getUser()->id;
 // لانها  مش من طلبية ادخال  
 $inv_id_pk_in=0;
 $note_in=$request->note_in;

 $this->validate($request, [

             'trans_types_in'=>'required',  
            ],[
            'trans_types_in.required'=>'الرجاء   ادخال   نوع   الحركة  ',
            ]); 




 



 if($trans_types_in ==969){


 	 $this->validate($request, [

           
          'item_id_pk_in'=>'required',
          'item_code_in'=>'required',
          'custody_receiving_date_in'=>'required',
          'emp_id_in'=>'required',
          'dept_id_in'=>'required'
            ],[
            'item_id_pk_in.required'=>'الرجاء   اختيار  الصنف  ',
            'item_code_in.required'=>'الرجاء  كتابة  كود  الصنف  ' ,
            'custody_receiving_date_in.required'=>'الرجلاء   ادخال   تاريخ   الاستلام   ' ,
            'emp_id_in.required'=>'الرجاء   ادخال   مستلم   العهدة  ' ,
            'dept_id_in.required'=>'الرجاء   اختيار   القسم  '
        


            ]); 

$item_id_pk_in=$request->item_id_pk_in;
$item_code_in=$request->item_code_in;
$custody_receiving_date_in=$request->custody_receiving_date_in;
$emp_id_in=$request->emp_id_in;
$dept_id_in=$request->dept_id_in;
 $inv_type_in=971;



 }else if($trans_types_in ==968){

$item_id_pk_in=$request->item_id_pk_in;
$custody_receiving_date_in=$request->custody_receiving_date_in;
$emp_id_in=0;
$dept_id_in=1;
$inv_type_in=971;


$data_stock_custody=DB::connection("stock_con")->select("select  max(item_code) item_code  from stock_cust_tb order by item_code desc  ");



		if(is_null($data_stock_custody[0]->item_code) ){
		    $item_code_in=1000;

		}else{

       $item_code_in= ++$data_stock_custody[0]->item_code;
		}


 $this->validate($request, [

           
          'item_id_pk_in'=>'required',
          'custody_receiving_date_in'=>'required',
         
            ],[
            'item_id_pk_in.required'=>'الرجاء   اختيار  الصنف  ',
            'custody_receiving_date_in.required'=>'الرجلاء   ادخال   تاريخ   الاستلام   ' ,
        
            ]); 




 }else if($trans_types_in ==970){

 	 $inv_type_in=966;
 	 $emp_id_in=0;
     $dept_id_in=1;
     $item_id_pk_in=$request->item_id_pk_in;
$item_code_in=$request->item_code_in;
$custody_receiving_date_in=$request->custody_receiving_date_in;



      $this->validate($request, [

           
          'item_id_pk_in'=>'required',
          'item_code_in'=>'required',
          'custody_receiving_date_in'=>'required',
         
            ],[
            'item_id_pk_in.required'=>'الرجاء   اختيار  الصنف  ',
            'item_code_in.required'=>'الرجاء  كتابة  كود  الصنف  ' ,
            'custody_receiving_date_in.required'=>'الرجلاء   ادخال   تاريخ   الاستلام   ' ,
          
        


            ]); 




 }



   
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_cust (:inv_id_pk_in  ,:item_id_pk_in , :item_code_in   ,:custody_date_in   ,:inv_type_in    ,:trans_type_in    ,:note_in  ,:emp_id_in  ,:dept_id_in ,:user_id_in  ,:out_value   ); end;");

$stmtf->bindParam(':inv_id_pk_in', $inv_id_pk_in, PDO::PARAM_INT);

$stmtf->bindParam(':item_id_pk_in', $item_id_pk_in, PDO::PARAM_INT);

$stmtf->bindParam(':item_code_in', $item_code_in, PDO::PARAM_INT);

$stmtf->bindParam(':custody_date_in', $custody_receiving_date_in, PDO::PARAM_STR); 

$stmtf->bindParam(':inv_type_in', $inv_type_in, PDO::PARAM_INT);

$stmtf->bindParam(':trans_type_in', $trans_types_in, PDO::PARAM_INT);

$stmtf->bindParam(':note_in', $note_in, PDO::PARAM_STR);
$stmtf->bindParam(':emp_id_in', $emp_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':dept_id_in', $dept_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);
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


  

/**************************************************************/


   public function cust_for_user_vw(){

     $users=DB::connection('stock_con')->select("select * from users  where emp_no=1");
     $inv_types=DB::connection("stock_con")->select("select *  from status where p_id=964");
     $trans_types=DB::connection("stock_con")->select("select *  from status where p_id=967");

     $stock_item_mains=DB::connection("stock_con")->select("select  item_id_pk, item_name from stock_item_main where custody=1");
     $departments=DB::connection('stock_con')->table('npla_departments') ->select('name','id') ->get();
    return view("admin.stockstore.stockcust.cust_for_user_vw",compact('users','stock_item_mains','departments','inv_types','trans_types'));


   }


public function cust_for_user_data(Request $request){

   $user_id_in=Sentinel::getUser()->id;

     $item_code=$request->item_code;
       $item_id_pk=$request->item_id_pk;

$custody_vw_data=DB::connection("stock_con")->table("stock_cust_vw")->select("item_id_pk","item_name","inv_id_pk",
    "item_code",DB::raw('to_char(custody_date,\'dd/mm/yyyy\') custody_date'),"inv_type","inv_name","trans_type","trans_name","note","emp_id","emp_name","dept_id","side_name","user_id","user_name","user_date","flag","cust_id","order_no")
  ->where("flag","!=",9)->where("emp_id","=",$user_id_in)->where("trans_type","=",969)->orderBy('cust_id','desc');

    if (!empty($item_id_pk) ){
    $custody_vw_data->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
  }

  if (!empty($item_code) ){
    $custody_vw_data->whereRaw("item_code = ?", ["$item_code"]);
  }

   return Datatables::of($custody_vw_data)


  ->make(true);

}








/*********************************************************/
public function cust_vw_data(Request $request,$inv_id_pk=0){

  //flag=9  محذوف  

  $emp_id =$request->emp_id;

  $item_id_pk=$request->item_id_pk;

  $dept_id=$request->dept_id;

  $item_code=$request->item_code;

  $inv_type=$request->inv_type;

  $trans_type=$request->trans_type;

  $order_no=$request->order_no;


  $custody_vw_data=DB::connection("stock_con")->table("stock_cust_vw")->select("item_id_pk","item_name","inv_id_pk",
  	"item_code",DB::raw('to_char(custody_date,\'dd/mm/yyyy\') custody_date'),"inv_type","inv_name","trans_type","trans_name","note","emp_id","emp_name","dept_id","side_name","user_id","user_name","user_date","flag","cust_id","order_no")
  ->where("flag","!=",9)->orderBy('cust_id','desc');

if($inv_id_pk){
$custody_vw_data->where("inv_id_pk","=",$inv_id_pk);

}

  

    if (!empty($emp_id) ){
    $custody_vw_data->whereRaw("emp_id = ?", ["$emp_id"]);
  }


     if (!empty($order_no) ){
    $custody_vw_data->whereRaw("order_no = ?", ["$order_no"]);
  }

    if (!empty($item_id_pk) ){
    $custody_vw_data->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
  }

    if (!empty($dept_id) ){
    $custody_vw_data->whereRaw("dept_id = ?", ["$dept_id"]);
  }


   if (!empty($inv_type) ){
    $custody_vw_data->whereRaw("inv_type = ?", ["$inv_type"]);
  }

    if (!empty($trans_type) ){
    $custody_vw_data->whereRaw("trans_type = ?", ["$trans_type"]);
  }

 if (!empty($item_code) ){
    $custody_vw_data->whereRaw("item_code = ?", ["$item_code"]);
  }


 return Datatables::of($custody_vw_data)



 ->addColumn('update_stock_cust', function ($custody_vw_data) {


return '<a  class="btn btn-info"  onclick="update_stock_cust('.$custody_vw_data->cust_id.','.$custody_vw_data->inv_id_pk.','.$custody_vw_data->item_id_pk.')"><i class="fa fa-edit"></i></a>';


        })


  ->addColumn('delete_stock_cust', function ($custody_vw_data) {


return '<a  class="btn btn-danger"  onclick="delete_stock_cust('.$custody_vw_data->cust_id.')"><i class="fa fa-trash"></i></a>';


        })



  ->make(true);
  }





/***************************************************/
public function update_stock_cust(Request $request){
$cust_id_in=$request->cust_id_in_update;
$note_in  =$request->note_in_update ;
$user_id_in=Sentinel::getUser()->id;

$inv_id_pk_update=$request->inv_id_pk_update;

    $this->validate($request, [

           
          'note_in_update'=>'required',
       
         
            ],[
            'note_in_update.required'=>'الرجاء   ادخال   الملاحظات  ',
         
          
        


            ]); 



$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.update_stock_cust (:cust_id_in  ,:note_in ,:user_id_in  ,:out_value  ); end;");
$stmtf->bindParam(':cust_id_in', $cust_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':note_in', $note_in, PDO::PARAM_STR);
$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT); 
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 



try{$stmtf->execute();
$return=["result"=>"ok","response"=>" تم  التعديل   بنجاح   ","inv_id_pk_update"=>$inv_id_pk_update];
    return  $return; 
  }catch(\Exception $e ){
                             $error=$e->getMessage();
                             $errormes=explode(PHP_EOL,$error);
                             $errormes1=preg_split('/\r\n|\r|\n/',$errormes[1]);
                              $errormes2=explode(':',$errormes1[0]);
                             
                             
                              $return['result']="error";
                               $return['response']= $errormes2[2];
                               $return["inv_id_pk_update"]=$inv_id_pk_update;
                                return $return;

                              }



}
/***********************************/  
public function delete_stock_cust($cust_id){
$cust_id_in=$cust_id;
//$note_in  =$request->note_in_delete ;
//$user_delivery_id_in =  Sentinel::getUser()->id;
$user_id_in=Sentinel::getUser()->id;

$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.delete_stock_cust (:cust_id_in   ,:user_id_in ,:out_value  ); end;");
$stmtf->bindParam(':cust_id_in', $cust_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT); 



try{$stmtf->execute();
$return=["result"=>"ok","response"=>" تم   الحذف   بنجاح   "];
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
public function select_item_note($item_code){

  $select_item_note=DB::connection("stock_con")->select("select ITEM_ID_PK,ITEM_CODE ,note  from  STOCK_CUST_TB  where ITEM_CODE=? and note is not null ",[$item_code]);
  return $select_item_note;


}

/**************************************/

}


