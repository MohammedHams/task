<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use \Carbon\Carbon;
use Sentinel;
use Image;
use File;
use App\Classes\easyphpthumbnail;
use Notification;
use PDO;

class TaskController extends Controller
{

    private $task_id = 2;
    private $notification_id;
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
        $this->thumbnail_path = $this->stockinarchivethumbpath;
        $this->recycle_main_path = $this->stockinarchiveRecyclepath;
        $this->recycle_thumbnail_path = $this->stockinarchiveRecyclepaththumb;
        $this->connection = "tasks";
        //$this->user_name=Sentinel::getUser()->username;
        //$this->user_id=Sentinel::getUser()->id;

    }

    /** $add=DB::connection("tasks")->insert("insert  into  table1(c1 , c2 , c3 )   values(?,?,?)",[$c1,$c2,$c3]);
     */

    public function checkAccessData($process, $p_id = null, $task_id = null, $id_pk = null)
    {
        switch ($process) {
            case 'viewExternalData' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'tm_team_tb.id_pk', 'tm_team_tb.assign_to')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->join('tm_project_task_tb', 'tm_team_tb.id_pk', '=', 'tm_project_task_tb.id_pk')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.p_id', $id_pk)
                    ->get();
                break;
            case 'addTaskData' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'assign_to', 'users.id')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.id_pk', '=', $p_id)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->get();

                break;
            case 'editTaskUser' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'assign_to')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.id_pk', '=', $task_id)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->get();
                break;
            case 'editTaskStatus' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'assign_to')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('tm_team_tb.id_pk', '=', $task_id)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->get();
                break;

            case 'editTaskDone' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'assign_to')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.id_pk', '=', $task_id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->get();
                break;
            case 'checkUploadFile' :
                $team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'assign_to')
                    ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_team_tb.id_pk', '=', $id_pk)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->get();

                break;
        }
        return $team;

    }

    public function task_view()
    {
        $departments = DB::table('npla_departments')->select()
            ->where('id', '!=', Sentinel::getUser()->dep)
            ->get();
        $user_prem = Sentinel::getUser();
        $new_Status = 0;
        $pending_Status = 0;
        $inProgress_Status = 0;
        $completed_Status = 0;
        $public_task = DB::table('tm_project_task_tb')
            ->where('tm_project_task_tb.type1', '=', 1)
            ->where('tm_project_task_tb.status', '<', 6)
            ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
            ->where('tm_project_task_tb.p_id', '=', 0)
            ->get();

        // $tasks=DB::connection('tasks')->select("select * from TM_PROJECT_TASK_TB ORDER BY CREATE_DATE ASC");
        if ($user_prem->hasAccess('task.confirm_status')) {
            $projects = DB::table('tm_project_task_tb ')
                ->where('tm_project_task_tb.type1', '=', 2)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->orderBy('tm_project_task_tb.create_date', 'DESC')
                ->get();
            $external_in_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->get();
            $external_out_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.create_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.to_dept', '!=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->get();

            foreach ($projects as $project) {
                $project->task_count = DB::table('tm_project_task_tb')->select()
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.p_id', '=', $project->id_pk)
                    ->count();
                if ($project->status == 2) {
                    $new_Status++;
                }
                if ($project->status == 3) {
                    $pending_Status++;
                }
                if ($project->status == 4) {
                    $inProgress_Status++;
                }

                if ($project->status == 5) {
                    $completed_Status++;
                }
            }
            //dd($projects);
            /*foreach($projects as $project ){
                $project->task_count1=DB::table('tm_project_task_tb')->select()
                            ->where('type1','=',1)
                            ->where('p_id','=',$project->id_pk)
                            ->count();
            }*/
            /*$tasks_num = DB::table('tm_project_task_tb')->select()
                ->where('type1','=',1)
                ->where('p_id','=',$projects[0]->id_pk)
                ->count();*/
            $users = DB::table('users')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->where('activations.completed', '=', 1)
                ->select('activations.user_id', 'activations.completed', 'users.id', 'users.full_name', DB::raw('users.id assign_to'), DB::raw('-1 id_pk'))
                ->get();


        }
        if (!($user_prem->hasAccess('task.confirm_status'))) {

            $projects = DB::table('tm_project_task_tb')
                ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                ->where('tm_project_task_tb.type1', '=', 2)
                ->where('tm_team_tb.flag', '=', 0)
                ->where('tm_team_tb.assign_to', $user_prem->id)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->orderBy('tm_project_task_tb.create_date', 'DESC')
                ->get();
            $external_in_task = DB::table('tm_project_task_tb')
                ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_team_tb.flag', '=', 0)
                ->where('tm_team_tb.assign_flag', '=', 0)
                ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->get();
            $external_out_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.create_user', '=', Sentinel::getUser()->id)
                ->where('tm_project_task_tb.to_dept', '!=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->get();
            foreach ($projects as $project) {
                $project->task_count = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.p_id', '=', $project->id_pk)
                    ->count();

                if ($project->status == 2) {
                    $new_Status++;
                }
                if ($project->status == 3) {
                    $pending_Status++;
                }
                if ($project->status == 4) {
                    $inProgress_Status++;
                }

                if ($project->status == 5) {
                    $completed_Status++;
                }

            }
            //dd($projects);
            /*foreach($projects as $project ){
                $project->task_count1=DB::table('tm_project_task_tb')->select()
                            ->where('type1','=',1)
                            ->where('p_id','=',$project->id_pk)
                            ->count();
            }*/
            /*$tasks_num = DB::table('tm_project_task_tb')->select()
                ->where('type1','=',1)
                ->where('p_id','=',$projects[0]->id_pk)
                ->count();*/
            $users = DB::table('users')->select()
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->where('activations.completed', '=', 1)
                ->select('activations.user_id', 'activations.completed', 'users.id', 'users.full_name', DB::raw('users.id assign_to'), DB::raw('-1 id_pk'))
                ->get();


        }
        return view('admin.tasks.tasks_list', compact('users', 'projects', 'new_Status', 'inProgress_Status', 'completed_Status', 'pending_Status', 'public_task', 'external_in_task', 'departments', 'external_out_task'));
    }

    public function projects_view()
    {
        $user_prem = Sentinel::getUser();
        $public_task = DB::table('tm_project_task_tb')
            ->where('tm_project_task_tb.type1', '=', 1)
            ->where('tm_project_task_tb.status', '<', 6)
            ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
            ->where('tm_project_task_tb.p_id', '=', 0)
            ->count();

        if ($user_prem->hasAccess('task.confirm_status')) {

            $projects = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 2)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->orderBy('tm_project_task_tb.create_date', 'DESC')
                ->get();


            $external_in_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->count();
            $external_out_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.create_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.to_dept', '!=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->count();
            foreach ($projects as $project) {
                $project->task_count = DB::table('tm_project_task_tb')
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.p_id', '=', $project->id_pk)
                    ->count();
            }


        } elseif (!$user_prem->hasAccess('task.confirm_status')) {

            $projects = DB::table('tm_project_task_tb ')
                ->where('tm_project_task_tb.type1', '=', 2)
                ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                ->where('tm_team_tb.assign_to', $user_prem->id)
                ->where('tm_team_tb.flag', '=', 0)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->orderBy('tm_project_task_tb.create_date', 'DESC')
                ->get();


            $external_in_task = DB::table('tm_project_task_tb')
                ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_team_tb.flag', '=', 0)
                ->where('tm_team_tb.assign_flag', '=', 0)
                ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->count();
            $external_out_task = DB::table('tm_project_task_tb')
                ->where('tm_project_task_tb.type1', '=', 1)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.create_user', '=', Sentinel::getUser()->id)
                ->where('tm_project_task_tb.to_dept', '!=', Sentinel::getUser()->dep)
                ->where('tm_project_task_tb.p_id', '=', -1)
                ->count();

            foreach ($projects as $project) {
                $project->task_count = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.p_id', '=', $project->id_pk)
                    ->count();
            }

        }

        return ['projects' => $projects, 'public_task' => $public_task, 'external_in_task' => $external_in_task, 'external_out_task' => $external_out_task];
    }

    public function add_task_project_data(Request $request)
    {
        $data1 = \App\User::find(Sentinel::getUser()->id);
        $user_prem = Sentinel::getUser();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|integer',
            'type1' => 'required|integer'
        ], [
            'title.required' => 'برجاء ادخال العنوان  ',
        ]);

        $title = $request->title;
        $desc = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $done = 0;
        $status = $request->status;
        $type1 = $request->type1;
        $p_id = $request->p_id;
        $create_user = Sentinel::getUser()->id;
        $priority = $request->priority;
        $update_user = Sentinel::getUser()->id;
        $create_dept = Sentinel::getUser()->dep;
        $to_dept = Sentinel::getUser()->dep;
        $assign_to = $request->assign_to;

        if ($type1 == 2) {
            if ($user_prem->hasAccess('task.confirm_status')) {


                $notify_id = $this->notification_id = 25;
                DB::connection("tasks")->insert("insert  into  TM_PROJECT_TASK_TB(title,description,start_date,end_date,done,status,type1,p_id,create_user,create_date,update_user,update_date,priority,create_dept,to_dept )   values(?,?,to_date(?,'dd/mm/yyyy'),to_date(?,'dd/mm/yyyy'),?,?,?,?,?,sysdate,?,sysdate,?,?,?)", [$title, $desc, $start_date, $end_date, $done, $status, $type1, $p_id, $create_user, $update_user, $priority, $create_dept, $to_dept]);
                $data = DB::select("select id_pk from tm_project_task_tb  ORDER BY create_date desc");

                foreach ($assign_to as $assign_to) {
                    DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag )   values(?,?,?,sysdate,?,0)", [$status, $assign_to, $create_user, $data[0]->id_pk]);

                    DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status, $create_user, $data[0]->id_pk]);
                    Notification::send($data1, new \App\Notifications\General_notification($notify_id, $this->task_id));

                    $return = ["result" => "ok", "response" => "تم  اضافة المشروع  بنجاح  "];

                }
            }
        }
        if ($type1 == 1) {


            $notify_id = $this->notification_id = 23;
            $teamAccess = $this->checkAccessData('addTaskData', $p_id, '', '');


            if ($p_id == -1) {
                $to_dept = $request->to_dept;
                $assign_to = -1;

                DB::connection("tasks")->insert("insert  into  TM_PROJECT_TASK_TB(title,description,start_date,end_date,done,status,type1,p_id,create_user,create_date,update_user,update_date,priority,create_dept,to_dept )   values(?,?,to_date(?,'dd/mm/yyyy'),to_date(?,'dd/mm/yyyy'),?,?,?,?,?,sysdate,?,sysdate,?,?,?)", [$title, $desc, $start_date, $end_date, $done, $status, $type1, $p_id, $create_user, $update_user, $priority, $create_dept, $to_dept]);
                $data = DB::select("select id_pk from tm_project_task_tb  ORDER BY create_date desc");


                DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag )   values(?,?,?,sysdate,?,0)", [$status, $assign_to, $create_user, $data[0]->id_pk]);
                DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status, $create_user, $data[0]->id_pk]);

                $return = ["result" => "ok", "response" => "تم  الاضافة  المهمة بنجاح  "];
                Notification::send($data1, new \App\Notifications\General_notification($notify_id, $this->task_id));


            } elseif ($p_id == 0) {
                DB::connection("tasks")->insert("insert  into  TM_PROJECT_TASK_TB(title,description,start_date,end_date,done,status,type1,p_id,create_user,create_date,update_user,update_date,priority,create_dept,to_dept )   values(?,?,to_date(?,'dd/mm/yyyy'),to_date(?,'dd/mm/yyyy'),?,?,?,?,?,sysdate,?,sysdate,?,?,?)", [$title, $desc, $start_date, $end_date, $done, $status, $type1, $p_id, $create_user, $update_user, $priority, $create_dept, $to_dept]);
                $data = DB::select("select id_pk from tm_project_task_tb  ORDER BY create_date desc");


                DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag )   values(?,?,?,sysdate,?,0)", [$status, $assign_to, $create_user, $data[0]->id_pk]);
                DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status, $create_user, $data[0]->id_pk]);

                $return = ["result" => "ok", "response" => "تم  الاضافة  المهمة بنجاح  "];
                Notification::send($data1, new \App\Notifications\General_notification($notify_id, $this->task_id));

            } elseif (((!($user_prem->hasAccess('task.confirm_status')) && Sentinel::getUser()->id == $teamAccess[0]->assign_to)) || $user_prem->hasAccess('task.confirm_status')) {

                DB::connection("tasks")->insert("insert  into  TM_PROJECT_TASK_TB(title,description,start_date,end_date,done,status,type1,p_id,create_user,create_date,update_user,update_date,priority,create_dept,to_dept )   values(?,?,to_date(?,'dd/mm/yyyy'),to_date(?,'dd/mm/yyyy'),?,?,?,?,?,sysdate,?,sysdate,?,?,?)", [$title, $desc, $start_date, $end_date, $done, $status, $type1, $p_id, $create_user, $update_user, $priority, $create_dept, $to_dept]);
                $data = DB::select("select id_pk from tm_project_task_tb  ORDER BY create_date desc");


                DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag )   values(?,?,?,sysdate,?,0)", [$status, $assign_to, $create_user, $data[0]->id_pk]);
                DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status, $create_user, $data[0]->id_pk]);

                $return = ["result" => "ok", "response" => "تم  الاضافة  المهمة بنجاح  "];
                Notification::send($data1, new \App\Notifications\General_notification($notify_id, $this->task_id));


            }

        }
        return $return;
    }

    public function view_project_info($id_pk, $assign_to = null)
    {
        $user_prem = Sentinel::getUser();

        if ($id_pk == 0) {
            $pro = '[{"id_pk":0,"title":"مهام عامة","description":"مهام عامة","create_date":"0000-00-00","create_dept":"1","create_user": "1","edate":"0000-00-00","sdate":"0000-00-00"}]';
            $projects_info = json_decode($pro);
        } else {
            if($user_prem->hasAccess('task.confirm_status')){
                $projects_info = DB::table('tm_project_task_tb')->select(DB::raw("tm_project_task_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.type1', '=', 2)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.id_pk', '=', $id_pk)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->get();
            }elseif (!$user_prem->hasAccess('task.confirm_status')){
                $projects_info = DB::table('tm_project_task_tb')->select(DB::raw("tm_project_task_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->where('tm_project_task_tb.type1', '=', 2)
                    ->where('tm_project_task_tb.id_pk', '=', $id_pk)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->where('tm_team_tb.assign_to', $user_prem->id)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->get();

            }

        }
        if ($assign_to == null) {
            if ($id_pk == 0 || $user_prem->hasAccess('task.confirm_status')) {

                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('activations.completed', '=', 1)
                    ->where('tm_project_task_tb.p_id', $id_pk)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->select('activations.user_id', 'activations.completed', DB::raw("users.full_name,users.image,users.id,tm_project_task_tb.*,tm_status_tb.*, (CASE WHEN end_date<sysdate and tm_project_task_tb.status < 5   THEN 'true' ELSE 'false' END) due_date, to_char(start_date,'yyyy-mm-dd') sdate, to_char(end_date,'yyyy-mm-dd') edate"))
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->get();

                // dd($projects_info[0]->tasks);
            } elseif (!$user_prem->hasAccess('task.confirm_status') && $id_pk > 0) {
                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('users', 'tm_team_tb.assign_to', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('tm_project_task_tb.type1', '=', 1)
                    ->where('activations.completed', '=', 1)
                    ->where('tm_project_task_tb.p_id', $id_pk)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->select('activations.user_id', 'activations.completed', DB::raw("users.full_name,users.id,users.image,tm_project_task_tb.*,tm_status_tb.*, (CASE WHEN end_date<sysdate and tm_project_task_tb.status < 5   THEN 'true' ELSE 'false' END) due_date, to_char(start_date,'yyyy-mm-dd') sdate, to_char(end_date,'yyyy-mm-dd') edate"))
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->get();
            }
        } elseif ($assign_to != null) {
            $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                ->leftjoin('users', 'tm_team_tb.assign_to', '=', 'users.id')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('activations.completed', '=', 1)
                ->where('tm_project_task_tb.p_id', $id_pk)
                ->where('tm_project_task_tb.status', '<', 6)
                ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                ->where('tm_team_tb.assign_to', $assign_to)
                ->where('assign_flag', '=', 0)
                ->select('activations.user_id', 'activations.completed', DB::raw("users.image,users.full_name,users.id,tm_project_task_tb.*,tm_status_tb.*, (CASE WHEN end_date<sysdate and tm_project_task_tb.status<5 THEN 'true' ELSE 'false' END) due_date, to_char(start_date,'yyyy-mm-dd') sdate, to_char(end_date,'yyyy-mm-dd') edate"))
                ->orderBy('tm_project_task_tb.create_date', 'DESC')
                ->get();
        }


        if ($id_pk == 0) {
            $projects_info[0]->team = DB::table('users')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->where('activations.completed', '=', 1)
                ->select('activations.user_id', 'activations.completed', 'users.id', 'users.full_name', DB::raw('users.id assign_to'), DB::raw('0 id_pk'))
                ->get();
        } else {
            $projects_info[0]->team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'full_name', 'assign_to', 'id_pk', 'flag', 'assign_flag')
                ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('tm_team_tb.id_pk', '=', $id_pk)
                ->where('tm_team_tb.assign_flag', '=', 0)
                ->where('tm_team_tb.flag', '=', 0)
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->get();
        }
        foreach ($projects_info[0]->tasks as $comment) {
            $comment->comments_count = DB::table('tm_comment_tb')
                ->where('tm_comment_tb.task_id', '=', $comment->id_pk)
                ->whereRaw('tm_comment_tb.p_id is Null', [])
                ->count();
        }
        foreach ($projects_info[0]->tasks as $attachment) {
            $attachment->attachments_count = DB::table('tm_attachment_tb')
                ->where('id_pk', '=', $attachment->id_pk)
                ->where('status', '=', 1)
                ->count();
        }


        return $projects_info;

    }

    //view External Tasks
    public function view_external_project($id_pk)
    {
        if ($id_pk == -1) {
            $teamAccess = $this->checkAccessData('viewExternalData', '', '', $id_pk);
            $pro = '[{"id_pk":-1,"title":"مهام الواردة","description":"المهام الواردة من المهام الخارجية","create_date":"0000-00-00","create_dept":"1","create_user": "1","edate":"0000-00-00","sdate":"0000-00-00"}]';
            $projects_info = json_decode($pro);
            $user_prem = Sentinel::getUser();

            if ($user_prem->hasAccess('task.confirm_status')) {

                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('NPLA_DEPARTMENTS', 'tm_project_task_tb.create_dept', '=', 'NPLA_DEPARTMENTS.id')
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.p_id', '=', $id_pk)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->select(DB::raw("NPLA_DEPARTMENTS.name,tm_project_task_tb.*,tm_status_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->get();

            } elseif ((!$user_prem->hasAccess('task.confirm_status')) && count($teamAccess) > 0) {

                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('NPLA_DEPARTMENTS', 'tm_project_task_tb.create_dept', '=', 'NPLA_DEPARTMENTS.id')
                    ->where('tm_project_task_tb.to_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.p_id', '=', $id_pk)
                    ->where('tm_team_tb.assign_to', '=', $teamAccess[0]->assign_to)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->select(DB::raw("tm_team_tb.assign_to,NPLA_DEPARTMENTS.name,tm_project_task_tb.*,tm_status_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->get();

            }
            $projects_info[0]->team = DB::table('users')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->where('activations.completed', '=', 1)
                ->select('activations.user_id', 'activations.completed', 'users.id', 'users.full_name', DB::raw('users.id assign_to'), DB::raw('-1 id_pk'))
                ->get();
            if (isset($projects_info[0]->tasks) && count($projects_info[0]->tasks) > 0) foreach ($projects_info[0]->tasks as $comment) {
                $comment->comments_count = DB::table('tm_comment_tb')
                    ->where('tm_comment_tb.task_id', '=', $comment->id_pk)
                    ->whereRaw('tm_comment_tb.p_id is Null', [])
                    ->count();
            }
            if (isset($projects_info[0]->tasks) && count($projects_info[0]->tasks) > 0) foreach ($projects_info[0]->tasks as $attachment) {
                $attachment->attachments_count = DB::table('tm_attachment_tb')
                    ->where('id_pk', '=', $attachment->id_pk)
                    ->where('status', '=', 1)
                    ->count();
            }
        } elseif ($id_pk == -2) {
            $teamAccess = $this->checkAccessData('viewExternalData', '', '', -1);
            $pro = '[{"id_pk":-2,"title":"مهام الصادرة","description":"المهام الصادرة من المهام الخارجية","create_date":"0000-00-00","create_dept":"1","create_user": "1","edate":"0000-00-00","sdate":"0000-00-00"}]';
            $projects_info = json_decode($pro);
            $user_prem = Sentinel::getUser();

            if ($user_prem->hasAccess('task.confirm_status')) {
                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('NPLA_DEPARTMENTS', 'tm_project_task_tb.to_dept', '=', 'NPLA_DEPARTMENTS.id')
                    ->where('tm_project_task_tb.create_dept', '=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.to_dept', '!=', Sentinel::getUser()->dep)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.p_id', '=', -1)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->select(DB::raw("NPLA_DEPARTMENTS.name,tm_project_task_tb.*,tm_status_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->get();

            } elseif ((!$user_prem->hasAccess('task.confirm_status')) && count($teamAccess) > 0) {

                $projects_info[0]->tasks = DB::table('tm_project_task_tb')
                    ->leftjoin('tm_team_tb', 'tm_project_task_tb.id_pk', '=', 'tm_team_tb.id_pk')
                    ->leftjoin('tm_status_tb', 'tm_project_task_tb.status', '=', 'tm_status_tb.status_id')
                    ->leftjoin('NPLA_DEPARTMENTS', 'tm_project_task_tb.create_dept', '=', 'NPLA_DEPARTMENTS.id')
                    ->where('tm_project_task_tb.create_user', '=', Sentinel::getUser()->id)
                    ->where('tm_project_task_tb.status', '<', 6)
                    ->where('tm_project_task_tb.p_id', '=', -1)
                    ->where('tm_team_tb.assign_to', '=', Sentinel::getUser()->id)
                    ->where('tm_team_tb.assign_flag', '=', 0)
                    ->where('tm_team_tb.flag', '=', 0)
                    ->orderBy('tm_project_task_tb.create_date', 'DESC')
                    ->select(DB::raw("tm_team_tb.assign_to,NPLA_DEPARTMENTS.name,tm_project_task_tb.*,tm_status_tb.*,to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
                    ->get();
            }
            $projects_info[0]->team = DB::table('users')
                ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                ->where('users.dep', '=', Sentinel::getUser()->dep)
                ->where('activations.completed', '=', 1)
                ->select('activations.user_id', 'activations.completed', 'users.id', 'users.full_name', DB::raw('users.id assign_to'), DB::raw('-1 id_pk'))
                ->get();
            if (isset($projects_info[0]->tasks) && count($projects_info[0]->tasks) > 0) foreach ($projects_info[0]->tasks as $comment) {
                $comment->comments_count = DB::table('tm_comment_tb')
                    ->where('tm_comment_tb.task_id', '=', $comment->id_pk)
                    ->whereRaw('tm_comment_tb.p_id is Null', [])
                    ->count();
            }
            if (isset($projects_info[0]->tasks) && count($projects_info[0]->tasks) > 0) foreach ($projects_info[0]->tasks as $attachment) {
                $attachment->attachments_count = DB::table('tm_attachment_tb')
                    ->where('id_pk', '=', $attachment->id_pk)
                    ->where('status', '=', 1)
                    ->count();
            }

        }


        return $projects_info;
    }


    public function view_task_info($id_pk)
    {
        $task_id = $id_pk;
        if ($id_pk == -2) {
            $task_id = -1;
        }
        $task_info = DB::table('tm_project_task_tb')->select('tm_project_task_tb.create_dept', 'tm_project_task_tb.status', 'tm_project_task_tb.done', 'tm_project_task_tb.description', 'tm_project_task_tb.p_id', 'tm_project_task_tb.title', 'tm_project_task_tb.id_pk', DB::raw("to_char(tm_project_task_tb.start_date,'yyyy-mm-dd') sdate, to_char(tm_project_task_tb.end_date,'yyyy-mm-dd') edate"))
            ->where('id_pk', '=', $task_id)
            ->orderBy('UPDATE_USER', 'DESC')
            ->get();

        $task_team = $task_info[0]->team = DB::table('tm_team_tb')->select('activations.user_id', 'activations.completed', 'users.full_name', 'assign_to', 'id_pk', 'done', 'image')
            ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
            ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
            ->where('activations.completed', '=', 1)
            ->where('tm_team_tb.id_pk', '=', $task_id)
            ->where('assign_flag', '=', 0)
            ->where('tm_team_tb.flag', '=', 0)
            ->get();
        if (count($task_team) == 0) {
            $team_task = '[{"full_name":"الرجاء ادخال صاحب المهمة","assign_to":"-1","id_pk":"-1","done":"0"}]';
            $task_info[0]->team = json_decode($team_task);

        }


        $task_info[0]->teamHistory = DB::table('tm_team_tb')->select('full_name', 'assign_to', 'tm_team_tb.create_date', 'tm_team_tb.assign_to', 'tm_team_tb.create_user', DB::raw('(select full_name from users where tm_team_tb.create_user=users.id) edit_user'))
            ->join('users', 'tm_team_tb.assign_to', '=', 'users.id')
            ->where('tm_team_tb.id_pk', '=', $task_id)
            ->orderBy('tm_team_tb.create_date')
            ->get();
        //===============================
        $task_info[0]->comments = DB::table('tm_comment_tb')
            ->join('users', 'tm_comment_tb.create_user', '=', 'users.id')
            ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
            ->where('activations.completed', '=', 1)
            ->where('tm_comment_tb.task_id', '=', $task_id)
            ->where('users.dep', '=', Sentinel::getUser()->dep)
            ->whereRaw('tm_comment_tb.p_id is Null', [])
            ->select('activations.user_id', 'activations.completed', 'tm_comment_tb.task_id', 'tm_comment_tb.create_date', 'tm_comment_tb.comment_txt', 'users.full_name', 'tm_comment_tb.p_id', 'tm_comment_tb.id_pk', 'image')
            ->orderBy('tm_comment_tb.create_date')
            ->get();
        $task_info[0]->attachments = DB::connection($this->connection)->select(" select * from tm_attachment_tb  where id_pk=?   and status=1  ", [$id_pk]);
        if (isset($task_info[0]->comments) && count($task_info[0]->comments) > 0)
            foreach ($task_info[0]->comments as $comment) {
                $comment->replies = DB::table('tm_comment_tb')
                    ->join('users', 'tm_comment_tb.create_user', '=', 'users.id')
                    ->leftjoin('activations', 'users.id', '=', 'activations.user_id')
                    ->where('activations.completed', '=', 1)
                    ->where('tm_comment_tb.task_id', '=', $task_id)
                    ->where('users.dep', '=', Sentinel::getUser()->dep)
                    ->where('tm_comment_tb.p_id', '=', $comment->id_pk)
                    ->select('activations.user_id', 'activations.completed', 'tm_comment_tb.task_id', 'tm_comment_tb.create_date', 'tm_comment_tb.comment_txt', 'users.full_name', 'tm_comment_tb.p_id', 'tm_comment_tb.id_pk', 'image')
                    ->get();
            }


        //==============================

        return $task_info;

    }

    public function add_comment_data(Request $request)
    {
        $comment_txt = $request->comment_txt;
        $task_id = $request->task_id;
        $create_user = Sentinel::getUser()->id;
        $data = \App\User::find(Sentinel::getUser()->id);

        DB::connection("tasks")->insert("insert  into  tm_comment_tb(task_id,comment_txt,create_user,create_date )   values(?,?,?,sysdate)", [$task_id, $comment_txt, $create_user]);
        $notify_id = $this->notification_id = 22;
        Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));


        $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  ", "id" => "$task_id"];
        return $return;

    }

    public function add_reply_data(Request $request)
    {
        $data = \App\User::find(Sentinel::getUser()->id);
        $notify_id = $this->notification_id = 22;
        $p_id = $request->p_id;
        $comment_txt = $request->comment_txt;
        $task_id = $request->task_id;
        $create_user = Sentinel::getUser()->id;
        DB::connection("tasks")->insert("insert  into  tm_comment_tb(task_id,comment_txt,p_id,create_user,create_date )   values(?,?,?,?,sysdate)", [$task_id, $comment_txt, $p_id, $create_user]);
        $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  "];
        Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
        return $return;
    }

    public function edit_project_user(Request $request)
    {
        $user_prem = Sentinel::getUser();
        $data = \App\User::find(Sentinel::getUser()->id);
        $notify_id = $this->notification_id = 24;
        $return = "";
        $project_id = $request->project_id;
        $create_user = Sentinel::getUser()->id;
        $status = 0;
        $assign_to = $request->assign_to;
        $task_id = $request->task_id;
        $done_status = $request->done_status;
        if ($task_id == null && $project_id != null) {
            if ($user_prem->hasAccess('task.confirm_status')) {
                foreach ($assign_to as $assign_to) {
                    DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag )   values(?,?,?,sysdate,?,0)", [$status, $assign_to, $create_user, $project_id]);
                    //DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?,?)", [$status,  $create_user, $project_id]);
                    $return = ["result" => "ok", "response" => "تم  اضافة  بنجاح  "];
                }
            }
        } elseif ($project_id == null && $task_id != null) {
            $teamAccess = $this->checkAccessData('editTaskUser', '', $task_id, '');

            if ((!($user_prem->hasAccess('task.confirm_status')) && Sentinel::getUser()->id == $teamAccess[0]->assign_to)) {
                DB::table('tm_team_tb')
                    ->where('id_pk', $task_id)
                    ->where('assign_flag', 0)
                    ->where('flag', '=', 0)
                    ->limit(1)
                    ->update(['assign_flag' => 1, 'done' => $done_status]);
                DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag,done )   values(?,?,?,sysdate,?,0,?)", [$status, $assign_to, $create_user, $task_id, $done_status]);
                $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  "];
                Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
            } elseif ($user_prem->hasAccess('task.confirm_status')) {
                DB::table('tm_team_tb')
                    ->where('id_pk', $task_id)
                    ->where('assign_flag', 0)
                    ->where('flag', '=', 0)
                    ->limit(1)
                    ->update(['assign_flag' => 1, 'done' => $done_status]);
                DB::connection("tasks")->insert("insert  into  tm_team_tb(status,assign_to,create_user,create_date,id_pk,assign_flag,done )   values(?,?,?,sysdate,?,0,?)", [$status, $assign_to, $create_user, $task_id, $done_status]);
                $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  "];
                Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
            }
            //DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status,  $create_user, $task_id]);
        }
        return $return;
    }
    /////////////////////////////attachment///////////////////////////////////////////
////////////////////////رفع الصور/////////////////

    public function task_attachment(Request $request)
    {
        $notify_id = $this->notification_id = 26;

        // return config('global.qnap');
        $id_pk = $request->id_pk;
        $data = \App\User::find(Sentinel::getUser()->id);

        $uploadedInfo = $this->uploadeImage($this->main_path, $this->thumbnail_path, $request->file);

        //dd($uploadedInfo);
        $user_prem = Sentinel::getUser();
        if ($user_prem->hasAccess('task.confirm_status')) {

            $files = $request->file;
            foreach ($uploadedInfo as $info) {

                //$fileOriginalName = $request->file[0]->getClientOriginalName();

                DB::connection($this->connection)->insert("insert into tm_attachment_tb (imgname,imgpath, imgtype,imgsize,imgext ,ipaddress,adddate,userid,status,id_pk,arch_month,arch_year,arch_status,title) values (?,?,?,?,?,?,sysdate,?,1 ,? ,to_char(sysdate,'MM'),to_char(sysdate,'YYYY'),1,?)",
                    [
                        $info['new_name'],
                        $info['destinationPath'],
                        $info['type'],
                        $info['size'],
                        $info['file_exe'],
                        $info['ipaddress'],
                        $info['user_id'],
                        $id_pk,
                        $info['fileName']
                    ]

                );
            }

            Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
            $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  "];
        }
        if (!($user_prem->hasAccess('task.confirm_status'))) {
            $teamAccess = $this->checkAccessData('checkUploadFile', '', '', $id_pk);

            if ($teamAccess[0]->assign_to == Sentinel::getUser()->id) {
                $files = $request->file;
                foreach ($uploadedInfo as $info) {
                    DB::connection($this->connection)->insert("insert into tm_attachment_tb (imgname,imgpath, imgtype,imgsize,imgext ,ipaddress,adddate,userid,status,id_pk,arch_month,arch_year,arch_status) values (?,?,?,?,?,?,sysdate,?,1 ,? ,to_char(sysdate,'MM'),to_char(sysdate,'YYYY'),1)",
                        [
                            $info['new_name'],
                            $info['destinationPath'],
                            $info['type'],
                            $info['size'],
                            $info['file_exe'],
                            $info['ipaddress'],
                            $info['user_id'],
                            $id_pk
                        ]

                    );
                }

                Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));

                $return = ["result" => "ok", "response" => "تم  الاضافة  بنجاح  "];

            }
        }
        return $return;
    }

//////////////////////////////////////////////////////////
    public function display_task_images($id_pk)
    {

        $data = DB::connection($this->connection)->select(" select * from tm_attachment_tb  where id_pk=?   and status=1  ", [$id_pk]);
        return $data;

    }

    public function delete_task_attachment($year, $month, $imgname)
    {

        $table = "TM_ATTACHMENT_TB";
        $data = DB::connection($this->connection)->select("select imgname , arch_month ,imgext, arch_year , id_pk   from  tm_attachment_tb   where arch_year=$year  and arch_month=$month  and imgname='$imgname'  ");
        $id_pk = $data[0]->id_pk;
        $imgext = $data[0]->imgext;
        $sourcePath = $this->main_path . "$year/$month/";
        $destPath = $this->recycle_main_path . "$year/$month/ ";
        $s_thumb = $this->thumbnail_path . "$year/$month/";
        $d_thumb = $this->recycle_thumbnail_path . "$year/$month/";
        $query = DB::connection($this->connection)->table('tm_attachment_tb')
            ->where('arch_year', $year)
            ->where('arch_month', $month)
            ->where('imgname', $imgname)
            ->update(['status' => 9]);
        if ($query) {
            if (!file_exists($this->recycle_main_path . "$year/$month/")) {
                mkdir($this->recycle_main_path . "$year/$month/", 0777, true);
            }
            if (!file_exists($this->recycle_thumbnail_path . "$year/$month/")) {
                mkdir($this->recycle_thumbnail_path . "$year/$month/", 0777, true);
            }


            if (($imgext == 'JPG' || $imgext == 'PNG' || $imgext == 'GIF' || $imgext == 'jpg' || $imgext == 'png' || $imgext == 'gif')) {
                File::move($sourcePath . $imgname, $destPath . $imgname);

                File::move($s_thumb . $imgname, $d_thumb . $imgname);
            } else {
                File::move($sourcePath . $imgname, $destPath . $imgname);

            }

            $return['result'] = "ok";
            $return['id_pk'] = $id_pk;

            return $return;
        }
    }


////////////////////////////////////////////////////////////////
    public function delete_selected_attach_task($imgname)
    {
        $table = "TM_ATTACHMENT_TB";
        $data = DB::connection($this->connection)->select("select imgname , id_pk , imgext, arch_month , arch_year   from  tm_attachment_tb  where imgname='$imgname'  and status=1  ");
        $id_pk = $data[0]->id_pk;
        $imgext = $data[0]->imgext;
        $month = $data[0]->arch_month;
        $year = $data[0]->arch_year;
        $sourcePath = $this->main_path . "$year/$month/";
        $destPath = $this->recycle_main_path . "$year/$month/";
        $s_thumb = $this->thumbnail_path . "$year/$month/";
        $d_thumb = $this->recycle_thumbnail_path . "$year/$month/";

        $query = DB::connection($this->connection)->table('TM_ATTACHMENT_TB')
            ->where('arch_year', $data[0]->arch_year)
            ->where('arch_month', $data[0]->arch_month)
            ->where('imgname', $data[0]->imgname)
            ->update(['status' => 9]);
        if ($query) {
            $this->deleteImage($sourcePath, $s_thumb, $destPath, $d_thumb, $imgname, $imgext);
            $return['result'] = "ok";
            $return['id_pk'] = $id_pk;
            return $return;
        }

    }

//////////////////////////////////////////////////////////////

    public function show_thumb_task($arch_year, $arch_month, $imgname)
    {
        $this->watermarkImage($this->thumbnail_path . $arch_year . "/" . $arch_month . "/" . $imgname);
    }

//////////////////////////////////////
    public function show_image($arch_year, $arch_month, $imgname)
    {
        $table = "TM_ATTACHMENT_TB";
        $data = DB::connection($this->connection)->select("select imgname , arch_month , arch_year , title , imgext  from  tm_attachment_tb  where imgname= ? and status=1 ", [$imgname]);

        if ($data[0]->imgext == "jpg" || $data[0]->imgext == "jpeg" || $data[0]->imgext == "png" || $data[0]->imgext == "gif") {

            $this->watermarkImage($this->main_path . $arch_year . "/" . $arch_month . "/" . $imgname);

        } else {
            return $this->downloadFile($this->main_path . $arch_year . "/" . $arch_month . "/" . $imgname, $data[0]->title, $data[0]->imgext);
        }
    }

    public function edit_status(Request $request)
    {
        $notify_id = $this->notification_id = 27;
        $data = \App\User::find(Sentinel::getUser()->id);
        $user_prem = Sentinel::getUser();
        $project_id = $request->project_id;
        $task_id = $request->task_id;
        $status_id = $request->status_id;
        $project_status_id = $request->project_status_id;
        $create_user = Sentinel::getUser()->id;
        $done = "";
        $teamAccess = $this->checkAccessData('editTaskStatus', '', $task_id, '');
        if ($status_id == 5) {
            $done = 100;
        }
        if ($status_id == 6 || $status_id == 3 || $status_id == 2) {
            $done = 0;
        }
        if ($project_id == null && $status_id !== null) {
            $notify_id = $this->notification_id = 27;
            if ((!($user_prem->hasAccess('task.confirm_status')) && Sentinel::getUser()->id == $teamAccess[0]->assign_to) || ($user_prem->hasAccess('task.confirm_status'))) {
                /*    DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)",[$status_id,$create_user,$task_id]);*/

                if ($done != null) {
                    DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                        ->where('id_pk', $task_id)
                        ->update(['done' => $done]);
                }

                DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                    ->where('id_pk', $task_id)
                    ->update(['status' => $status_id]);
                $return = ["result" => "ok", "response" => "تم  التعديل  بنجاح  "];
            }

            if ($done != null) {
                DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                    ->where('id_pk', $task_id)
                    ->update(['done' => $done]);
            }
            DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status_id, $create_user, $task_id]);


            Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
            $return = ["result" => "ok", "response" => "تم  التعديل  بنجاح  "];


        }

        if ($user_prem->hasAccess('task.confirm_status') && $project_id !== null) {

            DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                ->where('id_pk', $project_id)
                ->update(['status' => $project_status_id]);

            DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$project_status_id, $create_user, $project_id]);
            $notify_id = $this->notification_id = 28;

            Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));
            $return = ["result" => "ok", "response" => "تم  التعديل  بنجاح  "];
        }


        return $return;

    }

    public function edit_done(Request $request)
    {
        $user_prem = Sentinel::getUser();
        $done = $request->done;
        $task_id = $request->task_id;
        $project_id = $request->project_id;
        $create_user = Sentinel::getUser()->id;
        $status_id = "";
        if ($project_id == null && $task_id !== null) {
            $notify_id = $this->notification_id = 28;
            $teamAccess = $this->checkAccessData('editTaskDone', '', $task_id, '');
            if ((!($user_prem->hasAccess('task.confirm_status')) && $teamAccess[0]->assign_to == Sentinel::getUser()->id && $project_id == null) || ($user_prem->hasAccess('task.confirm_status'))) {

                if ($done == 100) {
                    $status_id = 5;
                } elseif ($done > 0 && $done < 100) {
                    $status_id = 4;
                }

                DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                    ->where('id_pk', $task_id)
                    ->update(['done' => $done, 'status' => $status_id]);
                DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status_id, $create_user, $task_id]);


                $return = ["result" => "ok", "response" => "تم  تعديل المهمة  بنجاح  "];


            } elseif ($user_prem->hasAccess('task.confirm_status')) {
                if ($done == 100) {
                    $status_id = 5;
                } elseif ($done > 0 && $done < 100) {
                    $status_id = 4;
                }

                DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                    ->where('id_pk', $task_id)
                    ->update(['done' => $done, 'status' => $status_id]);
                DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status_id, $create_user, $task_id]);


                $return = ["result" => "ok", "response" => "تم  تعديل المهمة  بنجاح  "];

            }


        } elseif ($user_prem->hasAccess('task.confirm_status') && $project_id != null) {
            if ($done == 100) {
                $status_id = 5;
            } elseif ($done > 0 && $done < 100) {
                $status_id = 4;
            }
            DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
                ->where('id_pk', $project_id)
                ->update(['done' => $done, 'status' => $status_id]);
            DB::connection("tasks")->insert("insert  into  tm_status_history_tb(status,create_user,create_date,id_pk )   values(?,?,sysdate,?)", [$status_id, $create_user, $project_id]);
            $return = ["result" => "ok", "response" => "تم  تعديل المشروع  بنجاح  "];


        }
        return $return;

    }

    public function delete_project_user($id, $assign_to)
    {
        DB::table('tm_team_tb')
            ->where('id_pk', $id)
            ->where('assign_to', $assign_to)
            ->update(['flag' => '1', 'assign_flag' => '1']);
        $return = ["result" => "ok", "response" => "تم  الحذف  بنجاح  "];

        return $return;
    }

    public function confirm_status(Request $request)
    {
        $data = \App\User::find(Sentinel::getUser()->id);
        $notify_id = $this->notification_id = 27;
        $task_id = $request->task_id;
        $status_id = 7;
        DB::connection($this->connection)->table('TM_PROJECT_TASK_TB')
            ->where('id_pk', $task_id)
            ->update(['status' => $status_id, 'done' => '100']);
        Notification::send($data, new \App\Notifications\General_notification($notify_id, $this->task_id));

        $return = ["result" => "ok", "response" => "تم  التعديل  بنجاح  "];
        return $return;
    }


}
