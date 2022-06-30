<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Sentinel;
use \App\User;
use \App\Role;
use \App\Role_user;
use DB;
use Hash;
use PDO;
use Yajra\Pdo\Oci8;

class RegistartionController extends Controller
{
    public $list_status;
    

    public function register(){
    $roles = Role::all();
    $deps=DB::select("select *  from npla_departments");

    return view('admin.auth.user_operations',compact('roles','deps'));

    }


/*******************************************/

      public function print_permission($id){
     $user=User::find($id);
	 $dep=DB::select("select *  from npla_departments where id=?",[$user->dep]);
		//dd($dep);
    return view('admin.auth.print_permission',compact('user','dep'));

    }

/*********************************************/

    public function postRegister(Request $request){

    	$this->validate($request, [

            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',


            ],[

            'username.required'=>'الرجاء ادخال اسم المستخدم',
            'username.unique'=>'اسم المستخدم موجود مسبقا',
            'email.required'=>'الرجاء ادخال البريد الالكترونى',
            'email.unique'=>'تم ادخال الايميل مسبقا',
            'first_name.required'=>'الرجاء ادخال الاسم الاول',
            'last_name.required'=>'الرجاء ادخال اسم العائلة',

            ]);

    	if (!empty($request->file('image') ) ) {
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $file_exe = $image->getClientOriginalExtension();
        $new_name = uniqid().'.'.$file_exe;
        $destienation =  public_path().'/admin/user_image/';
        $image->move($destienation , $new_name);

     }else{

     	 $new_name='not_found';
     }

////////////////////////////////////////////////////////////
        $data1 = array();
         if($request->permissions  != '') {
         foreach (json_decode($request->permissions) as $permission){
         $data1[$permission] =true;
        }
        $permissions= $data1;  

      } else {

        $permissions= null ; 
     }
   

    $data = [
    'email'    => $request->email,
    'password' => $request->password,
    'first_name' => $request->first_name,
    'last_name' => $request->last_name, 
    'mobile_no' => $request->mobile_no,
    'permissions' =>  $permissions,
    'username' => $request->username,
    'image' => $new_name,
    'sub_permissions'=>'',
    'dep' =>$request->dep,
    'full_name' =>$request->first_name." ".$request->last_name,
];
       

    
    	$user=Sentinel::registerAndActivate($data);
       if($request->roles  != '') {
        foreach (json_decode($request->roles) as $role) {
        $role=Sentinel::findRoleBySlug($role);
         $role->users()->attach($user);
     }
     }

       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;
       
}




//////////////////////////////////////display all user/////////////////////////////
    public function  users_list(){
        $list_url = 'user_list';
        $list_data_url = 'users_list';
        $list_title = 'قائمة المستخدمين';
        $this->list_status = '1';
        return view('admin.auth.user_list' ,compact('list_url','list_data_url' , 'list_title'));
    }

    public function  users_remove_list(){
        $list_url = 'user_remove_list';
        $list_data_url = 'users_remove_list';
        $list_title = 'قائمة  المحذوفين';
        $this->list_status = '0';
        return view('admin.auth.user_list',compact('list_url','list_data_url' , 'list_title'));
    }
////////////////////////////////////////////////////////////
     public function  users_remove_list_data(Request $request){
        $this->list_status = '0';
        return $this->users_data($request);
     }
     public function  users_list_data(Request $request){
        $this->list_status = '1';
        return $this->users_data($request);
     }
     public function  users_data($request){
            // dd($this->list_status);
            $users = User::
                    leftjoin('activations' , 'activations.user_id' , 'users.id')
                    // ->leftjoin('role_users' , 'role_users.user_id' , 'users.id')
                    // ->leftjoin('roles' , 'roles.id' , 'role_users.role_id')
                    // ->orderby('role_users.role_id')
                    // ->select('users.id','activations.completed','roles.name as role_name' , 'roles.id as role_id',  'users.username','users.first_name' , 'users.last_name', 'users.full_name');
                    ->select('users.id','activations.completed','users.username','users.first_name' , 'users.last_name', 'users.full_name','users.image');
                    // dd($users);
            if($this->list_status == 0){
                $users->where('activations.completed' , '0');
                $users->orwhere('activations.completed' , null);
            }else{
                $users->where('activations.completed', '1');
            }
            // dd($users->toSql());
        return Datatables::of($users)

         ->filter(function ($query) use ($request) {
           
             if (!empty($request->columns[1]['search']['value']) ) {
                $username=$this->filterText($request->columns[1]['search']['value']);
                
                $query->whereRaw($this->filterTextDB("users.first_name||' '||users.last_name ")." like ?", ["%{$username}%"]);
            }

            
        })






         ->addColumn('statuss', function($query){
            // dd($query->id);
         	// $user = Sentinel::findById(62);
         	// // dd($user);

          //   // $remove = \Activation::remove($user);
          //   $create = \Activation::create($user);
          //   // dd($remove);

          //   $complete = \Activation::complete($user , );
          //   $completed = \Activation::completed($user);
          //   dd($completed);
         	// $activation = \Activation::exists($user);
         	// dd($activation);
            // dd($query->completed);
            $checked = ' ';
            if($query->completed == 1){
              $checked = 'checked';
            }
            
            $p = '<input type="checkbox" '.$checked.' data-id='.$query->id.' class="make-switch" id="test" >';
            
            return $p;
        })


        ->addColumn('edit', function ($query) {
            return '<a class="btn btn-primary btn-sm "  href="user_view/'.$query->id.'" >
                <i class="fa fa-pencil"></i></a> ';
            })

        ->addColumn('personal_photos', function($query){
            $url=url('/admin/user_image');
            $image = \DB::table('users')->where('username' , $query->username)->first();
            // dd($image);
            if($image){

                $FolderPath = public_path().'/admin/user_image/'.$query->image;
                if(file_exists($FolderPath)){
                    $img = '<img src="'.$url.'/'.$query->image.'"/>';
                }else{
                    $img = '';
                }
            
            }else{
              $img = '';
            }
            
            return '<span id="'.$query->username.'">'.$img.'</span>';
        })




        ->make(true);

    }        
///////////////////////////view user data to delete update/////////////////////////////  
 public function user_view($id){

    $user=User::find($id);
    $roles=Role::all();
     $deps=DB::select("select *  from npla_departments");
    return view ('admin.auth.user_operations',compact('user','roles','deps'));


 }  
/////////////////////////////////////////////////// 


  public function user_update(Request $request, $id){

    $user=User::find($id);
    $oldimage = $user->image;

    $this->validate($request, [

            'username'=>'required',
            'email'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',


            ],[

            'username.required'=>'الرجاء ادخال اسم المستخدم',
            'email.required'=>'الرجاء ادخال البريد الالكترونى',
            'first_name.required'=>'الرجاء ادخال الاسم الاول',
            'last_name.required'=>'الرجاء ادخال اسم العائلة',

            ]);


    if (!empty($request->file('image') ) ) {
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $file_exe = $image->getClientOriginalExtension();
        $new_name = uniqid().'.'.$file_exe;
        $destienation = public_path().'/admin/user_image/';
     //   echo $destienation;
       /// exit;
        $image->move($destienation , $new_name);
        

     }else{

         $new_name=$oldimage;
     }
/////////////////////////////////////////////////////////////////
     if($request->password === ''){
        $password = $user->password;
     }
     else{
        $password = bcrypt($request->password);
     }
        
        
        $user->username=$request->username;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->mobile_no=$request->mobile_no;
        $user->email=$request->email;
        $user->image=$new_name;
        $user->password = $password;
        $user->dep = $request->dep;
        $user->full_name = $request->first_name."  ".$request->last_name;


         if($user->save()){
      $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }
    


 }  

////////////////////////////////////////////////////////////////////

 public  function update_permission(Request $request,$id){

    $data1 = array();
        foreach (json_decode($request->permissions) as $permission){
            $data1[$permission] =true;

          }
    $data2=array();
    foreach (json_decode($request->unpermissions) as $unpermission){
            $data1[$unpermission] =false;

          }
      $result = array_merge($data1, $data2);    
          

       $user=User::find($id);
     
       $user->permissions= json_encode($result);   
    
           if($user->save()){
      $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

}


//////////////////////////////////////////////////////
public function update_role(Request $request,$id){

    $user=User::find($id);
    Role_user::where('user_id','=',$id)->delete();

    if($request->roles  != '' ) {
        foreach (json_decode($request->roles) as $role) {
        if($role  != ''  || $role != null){   
        $role=Sentinel::findRoleBySlug($role);
         $role->users()->attach($user);
     }
 }
 
     }

       $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
       return  $return;



}

///////////////////////experment////////////////////////////////////
public function download()
     {
        //display all types of reports from database name downloads
        
        $reports = DB::table('users')->get();  
       return view('admin.gov.exp1',compact('reports'));
     }

//////////////////////////update_password////////////////////////////////////////// 

public function update_password(){
	$user_id=Sentinel::getUser()->id;
 $user=User::find($user_id);
return view('admin.auth.update_password',compact('user'));

}  

/******************************************/
public function update_mobile(){
    $user_id=Sentinel::getUser()->id;
 $user=User::find($user_id);
return view('admin.auth.update_mobile',compact('user'));

} 



public function updateMobile(Request $request){


    $this->validate($request, [

            'mobile_no'=>'required|digits:10',
          
            


            ],[

            'mobile_no.required'=>'الرجاء   ادخال   رقم  الجوال  ',
       //     'mobile_no.unique'=>'تم  ادخال   هذا الرقم   مسبقا  ',
            'mobile_no.digits'=>' الرجاء  ادخال   عشر  أرقام   ',
           
            

            ]);   
 $user_id=Sentinel::getUser()->id;
 $user=User::find($user_id);





    $user->mobile_no = $request->mobile_no;
    $user->change_mobile=1;
    //$user->change_pass_date=Carbon::now();
    if($user->save()){
        DB::connection('stock_con')->update('update users set change_mob_date=SYSDATE where id='.$user_id);
         $return=["result"=>"ok","response"=>"تم  تغير   رقم   الجوال  "];
       return  $return; 


    }

         
 

}




////////////////////////////////////////  
public function updatePassword(Request $request){


    $this->validate($request, [

            'old_password'=>'required',
            'password'=>'required',
            're_password'=>'required',
            


            ],[

            'old_password.required'=>'الرجاء ادخال كلمة المرور القديمة',
            'password.required'=>'الرجاء ادخال كلمة المرور الجديدة',
            're_password.required'=>'الرجاء ادخال تأكيد كلمة المرور',
            

            ]);   
 $user_id=Sentinel::getUser()->id;
 $user=User::find($user_id);
 if(Hash::check($user->password, $request->password)){
 $return=["result"=>"error","response"=>"كلمة المرور القديمة غير صحيحة"];
       return  $return;

 }

 elseif($request->password !== $request->re_password){
  $return=["result"=>"error","response"=>"كلمة المرور وتأكيدها غير متطابقتين "];
       return  $return;  
 }

 else {
    $user->password = bcrypt($request->password);
	$user->change_pass=1;
	//$user->change_pass_date=Carbon::now();
    if($user->save()){
		DB::connection('stock_con')->update('update users set change_pass_date=SYSDATE where id='.$user_id);
         $return=["result"=>"ok","response"=>"تم تغير كلمة المرور بنجاح"];
       return  $return; 


    }

         
 }

}
///////////////////////////////مش مستخدمة //////////
public function migrate_data(){

     ini_set('max_execution_time','300');
///////////////////insert not found////
     $data=DB::connection('stock_oracle')->select("select * from users  ");

      foreach($data as $row)
  {  

    //echo $row->id;

    $user=DB::connection('laila')->select('select count(*) counter from users where id= ?',[$row->id]);
    if($user[0]->counter == 0)  {

        //echo "hi";

        

        DB::connection('laila')->insert(
     "insert into users(id, email, username , mobile_no , password , image , permissions , sub_permissions  , first_name , last_name , fullname) values(?,?,?,?,?,?,?,?,?,?,?)",
    [$row->id,$row->email, $row->username , $row->mobile_no , $row->password , $row->image , $row->permissions , $row->sub_permissions  , $row->first_name , $row->last_name , $row->first_name." ".$row->last_name]);


    }
    else {

            DB::connection('laila')->update(
     "update  users set email=?, username=? , mobile_no=? , password=? , image=? , permissions=? , sub_permissions=?    , first_name=? , last_name=? , fullname=? where id=?",
    [$row->email, $row->username , $row->mobile_no , $row->password , $row->image , $row->permissions , $row->sub_permissions   , $row->first_name , $row->last_name , $row->first_name." ".$row->last_name,$row->id]);
    }


  }


 
}


///////////////////////////////مين المستخدمين المالكين للصلاحية ///////////
public function  user_has_permission ($slug){

    $users=DB::connection("stock_oracle")->select("select id , full_name from users where permissions is not null ");

    $user_have_permissions=array();

     foreach ($users as $user) {

       $user_data=\Sentinel::findById($user->id);
      // echo $user_data;
       if($user_data->hasAccess($slug)){
             array_push($user_have_permissions,$user->id.'-'.$user->full_name);
        }
        
     }
    return $user_have_permissions;

}



//////////////////////////////////إزالة الصلاحية من مستخدم ///////
public function remove_permission($user_id,$slug)
{
    $user = Sentinel::findById($user_id);

    $user->removePermission($slug)->save();
}


/////////////////////////////////////////////////////////
public function  add_fav(Request $request){
 $data1 = array();
        foreach (json_decode($request->permissions) as $permission){
            $data1[$permission] =true;

          }
   
       
          

       $user=User::find(Sentinel::getUser()->id);

      
     
       $user->user_fav= json_encode($data1);   
    
           if($user->save()){
      $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }








}

/*************************/


 public function user_image ($id){
        if(true){
            $PERSONAL_PHOTO_LOAD = $this->id_photo($id , true);
        }else{

            try{
                ini_set('max_execution_time', 15);
                $pdof = \DB::connection('photo')->getPdo();
            }catch (\Exception $e){
                return 'DB Error';
            }

            $stmtf=$pdof->prepare("BEGIN  MOI_PERSONALPHOTO_PKG.PERSONAL_PHOTO(:ID, :PERSONAL_PHOTO, :LAST_UPDATE_DT );END;");


            $stmtf->bindParam(':ID', $id , PDO::PARAM_INT);
            $stmtf->bindParam(':PERSONAL_PHOTO', $PERSONAL_PHOTO , PDO::PARAM_LOB , -1);
            $stmtf->bindParam(':LAST_UPDATE_DT', $LAST_UPDATE_DT , PDO::PARAM_STR, 2000);

            $stmtf->execute();
             //dd("hi");
            // dd($LAST_UPDATE_DT);
             $PERSONAL_PHOTO_LOAD = $PERSONAL_PHOTO->load();

        }

        $data = \DB::table('users')->where('username' , $id)->first();

          $new_name = $id.'.jpg';
          $FolderPath = public_path().'/admin/user_image/';

              if(!file_exists($FolderPath)){
                  $result = File::makeDirectory( $FolderPath , 0775, true, true);
              }
              if(file_exists($FolderPath.$new_name)){
                unlink($FolderPath.$new_name);
              }
             \Image::make($PERSONAL_PHOTO_LOAD)->save($FolderPath.$new_name);
          // $image->move($FolderPath , $new_name);

       
          $data = \DB::table('users')->where('id' , $id)->update([
        //    'id'=> $id,
            'image'=>$new_name,
          //  'last_update_dt'=> $LAST_UPDATE_DT
          ]);
            
            $url=url('/admin/user_image');
            // ini_set('max_execution_time', 180);
        return '<img src="'.$url.'/'.$id.'.jpg"/>';
    }


 /***********************************/
 public function user_name ($username,$id){

 $pdo=DB::connection('stock_oracle')->getPdo();
$stmt=$pdo->prepare("begin GET_CITZN_NAME_PR(:ID_NO, :FNAME,:SNAME,:TNAME,:LNAME); end;");
$stmt->bindParam(':ID_NO', $username, PDO::PARAM_INT);
$stmt->bindParam(':FNAME', $fname, PDO::PARAM_STR,2000);
$stmt->bindParam(':SNAME', $sname, PDO::PARAM_STR,2000);
$stmt->bindParam(':TNAME', $tname, PDO::PARAM_STR,2000);
$stmt->bindParam(':LNAME', $lname, PDO::PARAM_STR,2000);
$stmt->execute();

$user =User::find($id);
$user->first_name=$fname;
$user->s_name=$sname;
$user->th_name=$tname;
$user->last_name=$lname;
$user->full_name=$fname." ".$sname." ".$tname." ".$lname;
$user->save();


}

 /*********************************/   

    public function changestatus($id , $state){
        $data = \DB::table('activations')->where('user_id',$id)->first();
        if(!$data){
            $user = Sentinel::findById($id);
            $create = \Activation::create($user);
        }
        if(!\DB::table('activations')->where('user_id',$id)->update(['completed' => $state])){
            return response()->json('error' , 500);
        }
        return response()->json('success' , 200);
    }



/*****************************/

public function tracking_user_vw(){

 return view ('admin.auth.tracking_user_vw');   
}


public function tracking_user_login(){
     $user_id =Sentinel::getUser()->id;

$tracking_users_tr=DB::connection("stock_con")->table('tracking_users_tr')->select("ip","browser","user_id", DB::raw("TO_CHAR(created_at,'dd/mm/yyyy') as created_at1"),"url_id","fun_name","con_name","req_method","mac_add","created_at","screen_name",DB::raw("ROUND((LAST_RESPONSE-created_at) * 24 * 60)  as period"),"last_response")->where('user_id','=',$user_id)->whereIn("url_id",[417,428])->orderBy("id","desc");


  return  Datatables::of($tracking_users_tr)


           ->addColumn('login_or_logout', function ($data) {

           	if($data->url_id ==417){
         return  '<span  class="label label-success" >تسجيل   دخول  </span>';

           	}else{

          return  '<span  class="label label-danger" >تسجيل   خروج   </span>';

           	}
   

     })




     ->make(true); 


}


/********************************************/

public function forget_password_vw(){
      return view('admin.auth.forget_password_vw');
}

public function forget_password(Request $request){






     $this->validate($request, [

            'username'=>'required',
            'mobile_no'=>'required',
          
            


            ],[

            'username.required'=>'الرجاء   ادخال  اسم  المستخدم  ',
            'mobile_no.required'=>'الرجاء  ادخال   رقم  الجوال  ',
         
            

            ]);   


$username=$request->username;
$mobile_no=$request->mobile_no;;
$mobile_no_edit= ltrim($mobile_no, "0");
//$true_code=uniqid();
$digits = 5;
$true_code= rand(pow(10, $digits-1), pow(10, $digits)-1);
$status="كود   تغير   كلمة   المرور  ";
$user_or_not=DB::connection("stock_con")->select("select * from users where username=? and mobile_no=?",[$username,$mobile_no]);
if(count($user_or_not)){

 

  $count_of_insert=DB::connection("stock_con")->select("select USERS_TRUE_CODE_FN(?) as count from dual",[$user_or_not[0]->id]);

  if ($count_of_insert[0]->count >3){

    $return=["result"=>"error","response"=>"لقد  تجاوزت  الحد  المطلوب  من تغير  كلمات  المرور "];
            return  $return; 

  }



$users_true_code_tb=DB::connection("stock_con")->insert("insert into USERS_TRUE_CODE_TB (true_code,user_name,user_id,mobile_num,create_date) values(?,?,?,?,sysdate)",[$true_code,$username,$user_or_not[0]->id,$mobile_no]);
if($users_true_code_tb){

DB::connection("stock_con")->update("update USERS_TRUE_CODE_TB set used=1 where user_id=? and true_code !=?",[$user_or_not[0]->id,$true_code]);

}


  $insert_data=DB::connection('stock_con')->insert(
        "insert into sms_gov(phone_number,msg,status,create_user,
        create_date) values(?,?,?,?,sysdate)",[$mobile_no_edit,$true_code, $status, $user_or_not[0]->id ]);

  if( $insert_data){

  $return=["result"=>"ok","response"=>" تم  ارسال   كود  التحقق  "];
            return  $return;

  }else{

    $return=["result"=>"error","response"=>"حدث  خطأ  ما "];
            return  $return; 
  }




}else{
   $return=["result"=>"error","response"=>"اسم   المستخدم  أو  رقم   الجوال  خاطئ"];
            return  $return;

}



}

/**************************************************************/

public function reset_password_vw(){
      return view('admin.auth.reset_password_vw');
}


/***********************************************/

public function reset_password(Request $request){

     $this->validate($request, [

            'username'=>'required',
            'true_code'=>'required',
            'password' =>'required'
          
            


            ],[

            'username.required'=>'الرجاء   ادخال  اسم  المستخدم  ',
            'true_code.required'=>'الرجاء  ادخال  كود  التفعيل   ',
            'password.required'=>'الرجاء  ادخال  كلمة  السر  الجديدة '
         
            

            ]); 

     $username=$request->username;
     $true_code=$request->true_code;
    // $password= bcrypt($request->password);



$data=DB::connection("stock_con")->select("select *  from  USERS_TRUE_CODE_TB where user_name=? and true_code=?  
    and used=0",[$username, $true_code]);

if(count($data)){

    $user=User::find($data[0]->user_id);
    $user->password = bcrypt($request->password);

//$update_user=DB::connection("stock_con")->update("update users  set password=?  where id=? ",[$password,]);

if($user->save()){


/**********************/
 $lastLoginPersistences=DB::connection("stock_con")->select("select max(id) lastlogin from persistences where user_id=? ",[ $data[0]->user_id]);
 $lastLoginID=$lastLoginPersistences[0]->lastlogin;
 $reomveOtherLoginPersistences=DB::connection("stock_con")->update("delete from persistences where user_id=? and id <>? ",[$data[0]->user_id,$lastLoginID]);


/**********************/

    $update_users_true_code_tb=DB::connection("stock_con")->update("update USERS_TRUE_CODE_TB set used=1 where id=? ",[$data[0]->id]);

    $return=["result"=>"ok","response"=>"تم  التعديل   بنجاح  "];
            return  $return;

}else{
 $return=["result"=>"error","response"=>"حدث  خطا  ما   "];
            return  $return;

}




}else{

 $return=["result"=>"error","response"=>"خطأ  فى  كود  التفعيل  "];
            return  $return;

}






}



}


