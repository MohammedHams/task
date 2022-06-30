<?php

namespace App\Http\Controllers\Tasks;

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
class TaskController extends Controller
{

    /** $add=DB::connection("stock_con")->insert("insert  into  table1(c1 , c2 , c3 )   values(?,?,?)",[$c1,$c2,$c3]);
 */
    public function task_view()
    {
       // $tasks=DB::connection('stock_con')->select("select * from TM_PROJECT_TASK_TB ORDER BY CREATE_DATE ASC");
        $tasks = DB::table('tm_project_task_tb')->select()
            ->join('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
            ->get();
        return view('admin.tasks.tasks_list',compact('tasks'));
    }
    public function add_task_project_data (Request $request){

        $this->validate($request, [


            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required|integer',
            'type1'=>'required|integer'



        ],[
            'title.required'=>'برجاء ادخال العنوان  ',



        ]);

        $title = $request->title ;
        $desc = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $done = 0 ;
        $status = $request->status;
        $type1 = $request->type1;
        $p_id = $request->p_id ;
        $create_user = Sentinel::getUser()->id;
        $priority = $request->priority;
        $update_user = Sentinel::getUser()->id;
        $create_dept =  Sentinel::getUser()->dep;
        $to_dept = Sentinel::getUser()->dep;

        DB::connection("stock_con")->insert("insert  into  TM_PROJECT_TASK_TB(title,description,start_date,end_date,done,status,type1,p_id,create_user,create_date,update_user,update_date,priority,create_dept,to_dept )   values(?,?,to_date(?,'dd/mm/yyyy'),to_date(?,'dd/mm/yyyy'),?,?,?,?,?,sysdate,?,sysdate,?,?,?)",[$title,$desc,$start_date,$end_date,$done,$status,$type1,$p_id,$create_user,$update_user,$priority,$create_dept,$to_dept]);
        $return=["result"=>"ok","response"=>"تم  الاضافة  بنجاح  "];
        return  $return;
    }

}



