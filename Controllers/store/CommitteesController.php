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




class  CommitteesController extends Controller{

   public function  pla_committees_vw(){  
 
    $member_types=DB::connection("stock_con")->select("select *  from status where p_id=?",[1192]);
    $member_status=DB::connection("stock_con")->select("select *  from status where p_id=?",[1195]);
    $users=DB::connection("stock_con")->select("select *  from users ");
     
    return view("admin.stockstore.committees.pla_committees_vw",compact('member_types','member_status','users'));


   }

/*********************************************/


public function add_pla_committees(Request $request){

  $user_id_in=  Sentinel::getUser()->id;

   $this->validate($request, [

     
            'commit_name_in'=>'required',
        
           
            ],[
            'commit_name_in.required'=>'الرجاء ادخال اسم اللجنه ',
         

            ]); 


  $commit_name_in = $request->commit_name_in;

  if(!empty($request->commit_id_in)){
    $commit_id_in=$request->commit_id_in;

  }else{
    $commit_id_in=0;

  }
 


$pdof=DB::connection('stock_con')->getPdo();
$stmtf=$pdof->prepare("begin PLA_PKG.ADD_PLA_COMMITTEES (:COMMIT_ID_IN  , :COMMIT_NAME_IN  , :CREATE_USER_IN    , :OUT_VALUE ); end;");

$stmtf->bindParam(':COMMIT_ID_IN', $commit_id_in, PDO::PARAM_INT);
$stmtf->bindParam(':COMMIT_NAME_IN', $commit_name_in, PDO::PARAM_STR);
$stmtf->bindParam(':CREATE_USER_IN', $user_user_in, PDO::PARAM_INT); 
$stmtf->bindParam(':OUT_VALUE', $out_value, PDO::PARAM_INT);



 try{$stmtf->execute();
$return=["result"=>"ok","response"=>"تم  الحفظ  بنجاح  ","commit_id_in"=>$out_value];
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



  /************************************************** */  
  public  function  pla_committees_vw_data(Request $request){

  
    $pla_committees_vw=DB::connection("stock_con")->table('pla_committees_vw')->select('commit_id','commit_name');
    
    
     return  Datatables::of($pla_committees_vw)
    
      
       ->addColumn('add_pla_committees_members', function ($pla_committees_vw) {
    
    
             return  '<a id="add_pla_committees_members'.$pla_committees_vw->commit_id.'" class="btn btn-info" onclick="add_pla_committees_members('.$pla_committees_vw->commit_id.')"><i class="fa fa-plus"></i></a>'  ;
        
            })


            ->addColumn('edit_pla_committees', function ($pla_committees_vw) {
    
    
              return  '<a id="edit_pla_committees'.$pla_committees_vw->commit_id.'" class="btn btn-info" onclick="edit_pla_committees('.$pla_committees_vw->commit_id.')"><i class="fa fa-plus"></i></a>'  ;
         
             })  
  
            
  
    
    ->make(true);
    
    }


/********************************************* */
public function pla_committees_vw_data_one_data(Request $request , $commit_id){
  $pla_committees_vw=DB::connection("stock_con")->table('pla_committees_vw')->select('commit_id','commit_name')->where('commit_id',$commit_id)->get();
  return $pla_committees_vw;

}
    

  /*****************************أعضاء اللجنه********************** */
  public function add_pla_committees_members(Request $request){
       
    $create_user_in=  Sentinel::getUser()->id;
   
      $this->validate($request, [

              
               'member_type_in'=>'required',
            //   'add_pla_committees_members_commit_id_in'=>'required',
               'member_status_in'=>'required',
               'user_id_in'=>'required',
             
              // note2_in
              
               ],[
               'member_type_in.required'=>' الرجاء اختيار نوع الضو   ',
               'member_status_in.required'=>'  الرجاء اختيار حالة العضو  ' ,
               'user_id_in.required'=>'  الرجاء اختيار العضو  ' ,
            
   
               ]); 
             
     $member_type_in = $request->member_type_in;

     $commit_id_in=$request->add_pla_committees_members_commit_id_in;
     $member_status_in=$request->member_status_in;

   
    if(!empty($request->add_pla_committees_members_com_id_in)){
      $com_id_in=$request->add_pla_committees_members_com_id_in;
    }else{
      $com_id_in=0;

    }
   /***********************أعضاء اللجنه**********************/
  $user_id_in=$request->user_id_in;

    
     $pdof=DB::connection('stock_con')->getPdo();
   $stmtf=$pdof->prepare("begin PLA_PKG.ADD_PLA_COMMITTEES_MEMBERS (:COM_ID_IN  , :USER_ID_IN , :MEMBER_TYPE_IN  ,:COMMIT_ID_IN  
     , :MEMBER_STATUS_IN  ,:CREATE_USER_IN    ,:OUT_VALUE  ); end;");

   $stmtf->bindParam(':COM_ID_IN', $com_id_in, PDO::PARAM_INT);
   $stmtf->bindParam(':USER_ID_IN', $user_id_in, PDO::PARAM_INT);
   $stmtf->bindParam(':MEMBER_TYPE_IN', $member_type_in, PDO::PARAM_INT) ;

   $stmtf->bindParam(':COMMIT_ID_IN', $commit_id_in, PDO::PARAM_INT); 
   
   $stmtf->bindParam(':MEMBER_STATUS_IN', $member_status_in, PDO::PARAM_INT);

   $stmtf->bindParam(':CREATE_USER_IN', $create_user_in, PDO::PARAM_INT);

   $stmtf->bindParam(':OUT_VALUE', $out_value, PDO::PARAM_INT);
  
   
   
   
   
     try{$stmtf->execute();
   $return=["result"=>"ok","response"=>"تم  الحفظ  بنجاح  ","commit_id_in"=>$commit_id_in];
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
   
/********************************ttttt************** */

public function pla_committees_members_vw_one_date(Request $request,$com_id){

  $pla_committees_members_vw_one_date=DB::connection("stock_con")->table('pla_committees_members_vw')->select('com_id','member_name','user_id','member_type',
  'member_type_name','commit_id','commit_name','member_status','member_status_name')->where('com_id','=',$com_id)->get();

  return $pla_committees_members_vw_one_date;


}
/*************************************************************/ 

public function pla_committees_members_vw(Request $request,$commit_id){
  

  $pla_committees_members_vw=DB::connection("stock_con")->table("pla_committees_members_vw")->select('com_id','member_name','user_id','member_type',
  'member_type_name','commit_id','commit_name','member_status','member_status_name')->where("commit_id","=",$commit_id)->orderBy("com_id","asc");

  return  Datatables::of($pla_committees_members_vw)

  ->addColumn('edit_committees_member', function ($pla_committees_members_vw) {

    return  '<a class="btn btn-warning" onclick="edit_committees_member('.$pla_committees_members_vw->com_id.','.$pla_committees_members_vw->commit_id.')">
    <i class="fa fa-edit"></i></a>'  ;

   })

  ->make(true);

}



/*************************************************** */
/**********************المرسلة الى اللجنه*************** */
public function invoice_in_signature_vw(){

  return view("admin.stockstore.committees.invoice_in_signature_vw");

}


public function invoice_in_signature_vw_data(Request $request){
  $serial =$request->serial;
  $year1=$request->year1;
  $user_id=Sentinel::getUser()->id;
  $invoice_in_signature_vw=DB::connection("stock_con")->table('INVOICE_IN_SIGNATURES_VW')
                                                    ->select("inv_id_pk","side_name","tottal_price","cur_name","serial","year1","user_id","order_no","sign_id")
                                                    ->where("user_id","=",$user_id)
                                                    ->where("sign_flag","=",1200);


  if (!empty($serial) ) { 
    $invoice_in_signature_vw->whereRaw("serial = ?", ["$serial"]);
      }

      if (!empty($year1) ) { 
        $invoice_in_signature_vw->whereRaw("year1 = ?", ["$year1"]);
          }     
                                         
                                       
     return  Datatables::of($invoice_in_signature_vw)

     ->addColumn('serial_year1', function ($invoice_in_signature_vw) {

     return $invoice_in_signature_vw->serial."/".$invoice_in_signature_vw->year1;



       })

       
       
       ->addColumn('add_member_sign_approve', function ($invoice_in_signature_vw) {

        return  '<a id="add_member_sign_approve'.$invoice_in_signature_vw->inv_id_pk.'" class="btn btn-info" onclick="add_member_sign_approve('.$invoice_in_signature_vw->sign_id.',1199)"><i class="fa fa-check"></i></a>'  ;
   
   
   
          })

          ->addColumn('add_member_sign_reject', function ($invoice_in_signature_vw) {

            return  '<a id="add_member_sign_reject'.$invoice_in_signature_vw->inv_id_pk.'" class="btn btn-danger" onclick="add_member_sign_reject('.$invoice_in_signature_vw->inv_id_pk.',1201)"><i class="fa fa-check"></i></a>'  ;
       
       
       
              })


              ->addColumn('add_item_data', function ($invoice_in_signature_vw) {

             
            
                     return  '<a class="btn btn-info" onclick="add_item_data('.$invoice_in_signature_vw->inv_id_pk.')"><i class="fa fa-eye"></i></a>'  ;
                
                    })



      ->make(true);                                                  

}


/************************************** */
public function  add_member_sign($sign_id,$sign_flag){


  $pdof=DB::connection('stock_con')->getPdo();
  $stmtf=$pdof->prepare("begin PLA_PKG.ADD_MEMBER_SIGN (:SIGN_ID_IN   , :SIGN_FLAG_IN    ,:OUT_VALUE  ); end;");

  $stmtf->bindParam(':SIGN_ID_IN', $sign_id, PDO::PARAM_INT);
  $stmtf->bindParam(':SIGN_FLAG_IN', $sign_flag, PDO::PARAM_INT);
  $stmtf->bindParam(':OUT_VALUE', $out_value, PDO::PARAM_INT);
 
  
  
  
  
    try{$stmtf->execute();
  $return=["result"=>"ok","response"=>"تم  الحفظ  بنجاح  "];
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


