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


class CustodyController extends Controller{

   public function add_custody_vw(){

 	   $users=DB::connection('stock_con')->select("select * from users");
   	 $stock_item_mains=DB::connection("stock_con")->select("select  item_id_pk, item_name from stock_item_main where custody=1");
     $departments=DB::connection('stock_con')->table('npla_departments') ->select('name','id') ->get();
    return view("admin.stockstore.custody.add_custody_vw",compact('users','stock_item_mains','departments'));


   }

/*********************************************/
public function add_custody_data(Request $request){

//type



	$user_id_in=Sentinel::getUser()->id;

// اضافة   الاصناف  
   $this->validate($request, [

           
          //  'item_id_pk_in'=>'required',
          //  'item_code_in'=>'required',
            'custody_receiving_date_in'=>'required',
           // 'note_in'=>'required',
            'emp_id_in'=>'required',
            'dept_id_in'=>'required'
            

          
            ],[
       //     'item_id_pk_in.required'=>'الرجاء   اختيار  الصنف  ',
           // 'item_code_in.required'=>'الرجاء  كتابة  كود  الصنف  ' ,
            'custody_receiving_date_in.required'=>'الرجلاء   ادخال   تاريخ   الاستلام   ' ,


          //  'note_in.required'=>'الرجاء   ادخال   الملاحظات  ' ,
            'emp_id_in.required'=>'الرجاء   ادخال   مستلم   العهدة  ' ,
            'dept_id_in.required'=>'الرجاء   اختيار   القسم  '
        


            ]); 



if(!empty($request->item_code_in)){





	$item_code_in=$request->item_code_in;
	$item_id_pk_in = $request->item_id_pk_edit;


}else{



 $this->validate($request, [

           
            'item_id_pk_in'=>'required',
          
            ],[
            'item_id_pk_in.required'=>'الرجاء   اختيار  الصنف  ',

            ]); 



$item_id_pk_in = $request->item_id_pk_in;


$data_stock_custody=DB::connection("stock_con")->select("select  max(item_code) item_code  from stock_custody_tb order by item_code desc  ");



		if(is_null($data_stock_custody[0]->item_code) ){
		    $item_code_in=1000;

//echo "hi";
//exit;

		}else{

       $item_code_in= ++$data_stock_custody[0]->item_code;

     // echo "hi1";
//exit;



		}


}





 // $item_code_in=$request->item_code_in;
  $custody_receiving_date_in=$request->custody_receiving_date_in;
  $note_in=$request->note_in;
  $emp_id_in=$request->emp_id_in;
  $dept_id_in=$request->dept_id_in;


   
$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.add_stock_custody (:emp_id_in ,:dept_id_in, :item_id_pk_in  ,:item_code_in  ,:custody_receiving_date_in   ,:note_in   ,:user_id_in ,:out_value  ); end;");
$stmtf->bindParam(':emp_id_in', $emp_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':dept_id_in', $dept_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':item_id_pk_in', $item_id_pk_in, PDO::PARAM_INT) ;
$stmtf->bindParam(':item_code_in', $item_code_in, PDO::PARAM_INT); 
$stmtf->bindParam(':custody_receiving_date_in', $custody_receiving_date_in, PDO::PARAM_STR); 
$stmtf->bindParam(':note_in', $note_in, PDO::PARAM_STR);

$stmtf->bindParam(':user_id_in', $user_id_in, PDO::PARAM_INT);

$stmtf->bindParam(':out_value', $out_value, PDO::PARAM_INT);



try{$stmtf->execute();

/************************/

if(!empty($request->item_code_in)){

	$update_data=DB::connection("stock_con")->update("update stock_custody_tb  set custody_delivery_date=sysdate , user_delivery_id=? where item_code=1 and cust_id !=  $out_value ",[$user_id_in]);



}


/**************************/


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
public function custody_vw_data(Request $request){
  $emp_id =$request->emp_id;
  $item_id_pk=$request->item_id_pk;
  $dept_id=$request->dept_id;
  $item_code=$request->item_code;

  $custody_vw_data=DB::connection("stock_con")->table("custody_vw")->select("user_id","user_name","dept_id","side_name","item_id_pk","item_code","item_name","custody_receiving_date","note","emp_id","full_name","user_delivery_date","custody","cust_id",

    DB::raw('to_char(custody_receiving_date,\'dd/mm/yyyy\') custody_receiving_date1'),DB::raw('to_char(custody_delivery_date,\'dd/mm/yyyy\') custody_delivery_date1'),
DB::raw('to_char(user_delivery_date,\'dd/mm/yyyy\') user_delivery_date1')



)->orderBy('cust_id','desc');

    if (!empty($emp_id) ){
    $custody_vw_data->whereRaw("emp_id = ?", ["$emp_id"]);
  }

    if (!empty($item_id_pk) ){
    $custody_vw_data->whereRaw("item_id_pk = ?", ["$item_id_pk"]);
  }

    if (!empty($dept_id) ){
    $custody_vw_data->whereRaw("dept_id = ?", ["$dept_id"]);
  }



   if (!empty($item_code) ){
    $custody_vw_data->whereRaw("item_code = ?", ["$item_code"]);
  }




 return Datatables::of($custody_vw_data)

 ->addColumn('delivery_data', function ($custody_vw_data) {


  if(is_null($custody_vw_data->custody_delivery_date1)){

 return '<a  class="btn btn-info"  onclick="delivery_data('.$custody_vw_data->cust_id.')"><i class="fa fa-edit"></i></a>';

  }else{

return $custody_vw_data->custody_delivery_date1;

  }



        })


 ->addColumn('transform_custody_data', function ($custody_vw_data) {


  $data=DB::connection("stock_con")->select("select count(*) as count from custody_vw where custody_delivery_date is null  and item_code=?  ",[$custody_vw_data->item_code]);



  if($data[0]->count > 0){

    return "";

}else{

return '<a  class="btn btn-info"  onclick="transform_custody_data('.$custody_vw_data->item_code.','.$custody_vw_data->item_id_pk.')">نقل   عهد  </a>';


}





 })


  ->make(true);
  }





/***************************************************/
public function update_custody_delivery(Request $request){
$cust_id_in=$request->cust_id_in;
$custody_delivery_date_in =$request->custody_delivery_date_in;
$user_delivery_id_in =  Sentinel::getUser()->id;


$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin stock_pkg.update_custody_delivery (:cust_id_in  ,:custody_delivery_date_in , :user_delivery_id_in  ,:out_value  ); end;");
$stmtf->bindParam(':cust_id_in', $cust_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':custody_delivery_date_in', $custody_delivery_date_in, PDO::PARAM_STR);
$stmtf->bindParam(':user_delivery_id_in', $user_delivery_id_in, PDO::PARAM_INT) ;
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
/***********************************/  


}


