<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\Menu;
use DB;
use \App\User;
use Sentinel;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view ('admin.menu.menu_list');
    }
	
	
	/**********************/
	public function  user_has_permission ($slug){

		$users = User::
                    leftjoin('activations' , 'activations.user_id' , 'users.id')
                    ->select('users.id','activations.completed','users.username','users.first_name' ,
					'users.last_name', 'users.full_name')->where('activations.completed', '1')->get();
	
		$user_have_permissions=array();
	
		 foreach ($users as $user){
			   $user_data=\Sentinel::findById($user->id);
			   if($user_data->hasAccess($slug)){
					 array_push($user_have_permissions,$user->id.'-'.$user->full_name);
				}
		 }
		return $user_have_permissions;
	
	}
	
	public function getSubMenuUsers($id){
		
		$submenu=DB::table('menus')
            ->select('id', 'title','slug')
			->where('p_id',$id)
            ->get();
		if(count($submenu)>0) 
			foreach($submenu as $menu) {
				$menu->users=$this->user_has_permission ($menu->slug);
				$menu->submenu=$this->getSubMenuUsers ($menu->id);	
			}
			
		return $submenu;
			
	}
	
	public function print_permission($id){
		ini_set('max_execution_time', 1000);
		$menu=DB::table('menus')
            ->select('id', 'title','slug')
			->where('id',$id)
            ->first();
		$menu->users=$this->user_has_permission ($menu->slug);
		$menu->submenu=$this->getSubMenuUsers ($menu->id);	
     	
		//dd($menu);
    	return view('admin.menu.print_permission',compact('menu'));

    }/****************/

  public function menu_list(){

    
    $menus=DB::table('menus')
            ->leftjoin('menus as father ', 'menus.p_id', '=', 'father.id')
            ->select('menus.id as menu_id ', 'menus.title', 'father.title as father_menu')
            ->get();

          return Datatables::of($menus)->filterColumn('menu_id', function($query, $keyword) {
                $query->whereRaw("CONCAT(menus.id,'-',menus.id) like ?", ["%{$keyword}%"]);
            })->addColumn('edit', function ($menu) {
        return '<a class="btn btn-primary btn-sm "  href="menus/'.$menu->menu_id.'" >
        <i class="fa fa-pencil"></i></a><a class="btn btn-warning btn-sm " target="_blank"  href="menus/print_permission/'.$menu->menu_id.'" >
        <i class="fa fa-print"></i></a>';
            }) ->make(true);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $menus=Menu::get();

     return view ('admin.menu.menu_operations',compact('menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();
        if(Menu::create($data)){

             $return=["result"=>"ok","response"=>"تمت الاضافة بنجاح"];
            return  $return;
        }else {
             $return=["result"=>"error","response"=>"حدث خطأ ما"];
            return  $return;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $menu=Menu::find($id);
        $menus=Menu::get();
        return view('admin.menu.menu_operations',compact('menu','menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $menu=Menu::find($id);
            $menu->slug=$request->slug;
            $menu->title=$request->title;
            $menu->url=$request->url;
            $menu->icon=$request->icon;
            $menu->visible=$request->visible;
            $menu->p_id=$request->p_id;
            $menu->functions =$request->functions;
            $menu->sub_permission=$request->sub_permission;
            $menu->tracking=$request->tracking;
            $menu->ignore_permission=$request->ignore_permission;
            $menu->typeoflink=$request->typeoflink;
            $menu->color=$request->color;

            

            if($menu->save()){

             $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

            
                
                    
                        
                            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
////////////////////////////////////////////////////////
   public function display_prog_num ($id,$userid){

  //  echo $id;
 //   echo "<br>";
  //  echo $userid;
  $result='';
  $data=Menu::find($id);
  //dd($data);
  $sub_permission=$data['sub_permission'];
 // return $sub_permission;
  $json=json_decode($sub_permission);
////////////////////////////////////////////////////////////////////////
  $user_sub_permission=User::find($userid);

  //return $user_sub_permission;

     $prog_nums=$user_sub_permission->sub_permissions; 

   // return $prog_nums;
     $list=array();
     if ($prog_nums == '')  {

     }else {
    $jsondata=json_decode($prog_nums);
// dd ($jsondata);
    //laila

     foreach ($jsondata as $key => $value) {  
 //  var_dump($value);
   //  exit;
     //  exit;
       if ($key == $id) {  
       if(isset($value->prog_num)){        
       $list=$value->prog_num;
   }}
     

  }
  }





/***************************************/

    // return $list;
      
//////////////////////////////////////////////////////////////////////  
foreach ($json as $key => $value) {

     switch ($key ) {
     case 'checkbox':
        // echo $value->table.'-'.$value->id.'-'.$value->title;
         $datas=DB::select("select ".$value->id." id,".$value->title." title from ".$value->table." order by ".$value->title);
         $main_title=$value->main_title;
         $mkey=$value->key;
         $result.=view('admin.menu.grand',compact('datas','main_title','mkey','list','id'));
		 
         
     break;

     
     default:
         # code...
         break;
 }

    # code...
}

 //  var_dump($json);
return $result;

   }







  /*************************************************/
public function user_have_subpermission($prog_num , $subpermissionnumber){

$user_have_subpermission=DB::connection("stock_con")->select("select *  from users, json_table(sub_permissions, '$.\"".$prog_num."\".prog_num[*]' columns (prog_num integer path '$')) t where t.prog_num=?",[ $subpermissionnumber]);

return $user_have_subpermission;



}

   
//////////////////////////////////////////////////
   public function prog_num_permission($id,Request $request){
$submenue_id=$request->submenue_id;

$result='{"'.$submenue_id.'":{';
$menu=Menu::find($submenue_id);


$sub_permission=$menu['sub_permission'];

//echo $menu['sub_permission'];
//exit;
  $json=json_decode($sub_permission);

  //dd($json);
  //exit;
  foreach ($json as $key => $value) {

     switch ($key ) {
         case 'checkbox':     
             $mkey=$value->key;
             $list='';
             foreach ($request[$mkey] as $value) {
                 $list.='"'.$value.'",';
             }
            $list=trim($list,',');


             
             $result.='"'.$mkey.'":['.$list.'],';
         break;

  
         default:
             # code...
             break;
     }

    # code...
    }

$result=trim($result,',');
$result.="}}";
$new_value=null;
$json_new=json_decode($result);

foreach ($json_new as $key => $value) {
        if($key==$submenue_id)
        {
            $new_value=$value;

        }
    }

$user=User::find($id);
//var_dump($new_value);
//exit;
$isUpdate=false;
$sub_permissions_old=$user->sub_permissions;
if($sub_permissions_old != '')
{
    $json_old=json_decode($sub_permissions_old,true);
    foreach ($json_old as $key => $value) {
        if($key==$submenue_id)
        {
            $key= $new_value;
            $isUpdate=true;
          //  echo "hiiii";
        }
    }

    if (true ){ 
 //echo "hi";
       
        $json_old[$submenue_id]= $new_value;
        $isUpdate=true;

    }
}

//var_dump($json_old);
//exit;

if($isUpdate)
$user->sub_permissions=json_encode($json_old);
else
$user->sub_permissions=$result;

 if($user->save()){

             $return=["result"=>"ok","response"=>"تم التعديل بنجاح"];
       return  $return;

         }else{

            $return=["result"=>"error","response"=>"حدث خطأ ما "];
            return  $return;


         }

 }
/////////////////////////////////////////////////////
}
