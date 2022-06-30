@extends('admin.layouts.backend')
@section('title','ادارة المهام والمشاريع')
@section('page_level_plugins_styles')
   <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" /> 

 <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

          <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
      

  
@endsection

@section('page_global_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('page_level_styles')
@endsection


@section('theme_layout_styles')
@endsection
@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">

<link rel="stylesheet" href="{{url('/')}}/admin/assets/apps/css/todo-2.min.css">

<link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5"  media="screen">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" href="{{url('/')}}/css/style.css">



 


<style type="text/css">
    .modal-content{
        width: 608px;

    }
    .todo-username{
        font-size: 14px;
    }
.row{
    background-color: white;
}
span {
    font-weight: bold;
    /* overflow-y: hidden; */
    font-size: smaller;
}

@media (min-width: 768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto;
  }
 
}

@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}


@media (min-width: 768px) {
  .modal-xl {
    width: 500%;
   max-width:800px;
  }
}


    .fancybox-custom .fancybox-skin {
      box-shadow: 0 0 50px #222;
    }

.modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #0480be;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
   
  

  
</style>
@endsection
@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid  page-sidebar-closed')

@section('page_bar')
<li>
        <a href="#">المهام المحفوظة</a>
        <i class="fa fa-angle-left"></i>
    </li>

@endsection


@section('content')
<div class="app-ticket app-ticket-list">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">قائمة المهام</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="btn-group">
                                                                <button id="sample_editable_1_new" class="btn bold green"  onclick="add_new_task()"> اضافة مهام ومشاريع جديدة
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">

                                                <div class="todo-sidebar">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                                                <span class="caption-subject font-green-sharp bold uppercase">المشاريع </span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body todo-project-list-content" style="height: auto;">
                                                            <div class="todo-project-list">
                                                                <ul class="nav nav-stacked">
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-success"> 2 </span> HSBC Promo </a>
                                                                    </li>
                                                                    <li class="active">
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-success"> 3 </span> GlobalEx</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-default"> 14 </span> Empire City </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <span class="badge badge-danger"> 2 </span> Loop Inc Promo </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">


                                                <div class="todo-tasklist">
                                                    
                                                    @foreach($tasks as $task)
                                                    <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                        <img class="todo-userpic pull-left" src="../assets/pages/media/users/avatar4.jpg" width="27px" height="27px">
                                                        <div class="todo-tasklist-item-title"> {{$task->title}} </div>
                                                        <div class="todo-tasklist-item-text"> {{$task->description}} </div>
                                                        <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> {{$task->start_date}} </span>
                                                            <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> {{$task->end_date}} </span>

                                                            <span class="todo-tasklist-badge badge badge-roundless">{{$task->status_name}}</span>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <div class="col-md-6">

                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-share font-red-thunderbird"></i>
                                                            <span class="caption-subject font-red-thunderbird bold uppercase"> تفاصيل المهمة   </span>
                                                            <br>
                                                            <i class="fa fa-info font-red-thunderbird"></i>



                                                        </div>



                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <!-- TASK options -->
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="status"> الحالة</label><br>
                                                                <select class="form-control select2 " tabindex="-1" aria-hidden="true" >
                                                                    <option value="Pending">قيد التنفيذ</option>
                                                                    <option value="Testing">قيد الاختبار</option>
                                                                    <option value="Completed">مكتملة</option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- TASK TAGS -->
                                                    </div>

                                                    <div class="portlet-body form">
                                                        <!-- BEGIN FORM-->

                                                            <div class="form">
                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <div class="todo-taskbody-user">
                                                                            <span class="todo-username pull-left">محمد علي</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- END TASK HEAD -->
                                                                <!-- TASK TITLE -->
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="العنوان..." disabled> </div>
                                                                </div>
                                                                <!-- TASK DESC -->
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="الوصف..." disabled></textarea>
                                                                    </div>
                                                                </div>
                                                                <!-- END TASK DESC -->
                                                                <!-- TASK DUE DATE -->
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-calendar"></i>
                                                                            <input type="text" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="  اخر تاريخ للتسليم " id="date3_in" name="date3_in" data-error=" اخر تاريخ للتسليم   " disabled>                                                                </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="importantce">الأهمية</label><br>

                                                                        <select class="form-control select2ذ" tabindex="-1" aria-hidden="true" disabled>
                                                                            <option value="urgent">مستعجله</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="user">المرسل اليه</label><br>

                                                                        <select class="form-control select2" tabindex="-1" aria-hidden="true" disabled>
                                                                            <option value="Pending">احمد علي</option>
                                                                            <option value="Completed">علي حسام</option>
                                                                            <option value="Testing">حسام محمد</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="user">المرفقات</label><br>

                                                                        <div class="fa fa-file-text-o right">
                                                                            <i class=""></i>
                                                                            <a href="">الملف الاول</a>
                                                                            </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- TASK TAGS -->

                                                        <!-- END FORM-->
                                                        <!-- start comments-->
                                                        <div class="tabbable-line">
                                                            <ul class="nav nav-tabs ">
                                                                <li class="active">
                                                                    <a href="#tab_1" data-toggle="tab"> التعليقات </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="tab_1">
                                                                    <!-- TASK COMMENTS -->
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="../assets/pages/media/users/avatar8.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">محمد حسام</span> &nbsp;
                                                                                            <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> تعديل الصور والالوان داخل الموقع
                                                                                        </p>
                                                                                        <!-- Nested media object -->
                                                                                        <div class="media">
                                                                                            <a class="pull-left" href="javascript:;">
                                                                                                <img class="todo-userpic" src="../assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                            <div class="media-body">
                                                                                                <p class="todo-comment-head">
                                                                                                    <span class="todo-comment-username">Carles Puyol</span> &nbsp;
                                                                                                    <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
                                                                                                </p>
                                                                                                <p class="todo-text-color"> شكرا تم  </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TASK COMMENTS -->
                                                                    <!-- TASK COMMENT FORM -->
                                                                    <form  class="form-horizontal"  method="post"   id="add_purchasing_form" enctype="multipart/form-data" >
                                                                        {{ csrf_field() }}

                                                                        <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="../assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body">
                                                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-3">
                                                                                            <div class="uppy" id="kt_uppy_5">
                                                                                                <div class="uppy-wrapper"><div class="uppy-Root uppy-FileInput-container"><input class="uppy-FileInput-input uppy-input-control" type="file" name="files[]" multiple="" id="kt_uppy_5_input_control" style=""><label class="uppy-input-label btn btn-light-primary btn-sm btn-bold" for="kt_uppy_5_input_control"> ارقاق الملفات</label></div></div>
                                                                                                <div class="uppy-list"></div>
                                                                                                <div class="uppy-status"><div class="uppy-Root uppy-StatusBar is-waiting" aria-hidden="true" dir="ltr"><div class="uppy-StatusBar-progress
                           " role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="width: 0%;"></div><div class="uppy-StatusBar-actions"></div></div></div>
                                                                                                <div class="uppy-informer uppy-informer-min"><div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"> </p></div></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </li>

                                                                            </ul>
                                                                            <button type="button" class="pull-left btn btn-sm btn-circle green"> &nbsp; ارسال&nbsp; </button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                    <!-- END TASK COMMENT FORM -->
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- end comments-->

                                                    </div> </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>





            <!--==============================================-->
            
            <div class="modal fade in" id="add_new_task_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class=" modal-dialog modal-xl">
               <div class="modal-content">
                <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
               ×</span></button>
              <h4 class="modal-title" id="myModalLabel"></h4>
                 </div>
           
           
               <div class="modal-body " style="background:#eee">
           
           
           
           
                   <div class="row" >
                       <div class="col-md-12">
           <div class="portlet light ">
               <div class="portlet-title">
           <div class="caption">
               <i class="icon-share font-red-thunderbird"></i>
               <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة طلب جديد   </span>
               <br>
            <i class="fa fa-info font-red-thunderbird"></i>
           
            
                
           </div>
           
           
                   
               </div>
               <form  class="form-horizontal" data-toggle="validator" role="form"  method="post"    id="add_task_project_form" enctype="multipart/form-data" >
                   {{ csrf_field() }}
                   <div class="alert alert-danger" id="add_task_project_alert" style="display:none" >
                       <ul id="error">
                       </ul>
                   </div>

                   <div class="portlet-body form">
               <div class="form-group">
                   <div class="col-md-12">
                       <label for="status"> نوع الادخال</label><br>
                       <select class="form-control select2"  id="project" name="type1">
                           <option value="1" selected >مهمة</option>
                           <option value="2"  >مشروع</option>
                       </select>
                   </div>
               </div>
                       <div class="form-group" id="project_select">
                           <div class="col-md-12">
                               <label for="status"> اختر المشروع</label><br>
                               <select class="form-control select2 " tabindex="-1" aria-hidden="true" name="p_id" >
                                   <option value="1" >مشروع1</option>
                                   <option value="2">مشروع 2</option>
                               </select>
                           </div>
                       </div>


                       <!-- BEGIN FORM-->
                                                           
                                                           <div class="form">
                                                            <div class="form-group">
                                                                <div class="col-md-10 col-sm-10">
                                                                    <div class="todo-taskbody-user">
                                                                        <span class="todo-username  pull-left"><label for="status">صاحب الطلب:</label>   </span>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <!-- END TASK HEAD -->
                                                            <!-- TASK TITLE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" id="title" name="title" class="form-control todo-taskbody-tasktitle" placeholder="العنوان..."> </div>
                                                            </div>
                                                            <!-- TASK DESC -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="الوصف..." id="description" name="description"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK DESC -->
                                                               <div class="form-group">
                                                                   <div class="col-md-12">
                                                                       <div class="input-icon">
                                                                           <i class="fa fa-calendar"></i>
                                                                           <input type="text" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="  بداية التاريخ  " id="start_date" name="start_date" data-error=" اخر تاريخ للتسليم   ">                                                                </div>
                                                                   </div>
                                                               </div>

                                                               <!-- TASK DUE DATE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <input type="text" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="  اخر تاريخ للتسليم " id="end_date" name="end_date" data-error=" اخر تاريخ للتسليم   ">                                                                </div>
                                                            </div>
</div>
                                                            <!-- TASK options -->
                                                               <div class="form-group">
                                                                   <div class="col-md-12">
                                                                       <label for="status"> الحالة</label><br>
                                                                       <select class="form-control select2 " tabindex="-1" aria-hidden="true" name="status">
                                                                           <option value="2">جديد</option>
                                                                           <option value="3">بانتظار الموافقة</option>
                                                                           <option value="4">قيد التقدم</option>
                                                                           <option value="5">مكتملة</option>
                                                                           <option value="6">ملغية</option>

                                                                       </select>
                                                                   </div>
                                                               </div>

                                                               <!-- TASK TAGS -->
                                                            <!-- TASK TAGS -->
                                                            <div class="form-group" >
                                                                <div class="col-md-12" id="sender">
                                                                    <div class="form-group" id="importantce">
                                                                        <div class="col-md-12">
                                                                            <label for="importantce">الأهمية</label><br>

                                                                            <select name="priority" class="form-control select2" tabindex="-1" aria-hidden="true">
                                                                                <option value="1">مستعجله</option>
                                                                                <option value="2">مهمة</option>
                                                                                <option value="3">عادي</option>
                                                                                <option value="4">قليلة الأهمية</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <label for="user">القسم</label><br>

                                                                    </select>
                                                                    <select name="to_dept"  id="to_dept" class="form-control select2-multiple select2-hidden-accessible users" multiple="" tabindex="-1" aria-hidden="true" >
                                                                        <option  value="1">قسم الحاسوب</option>

                                                                    </select>

                                                                    <label for="user">المرسل اليه</label><br>
                                                                    <select name="update_user"  id="update_user" class="form-control select2-multiple select2-hidden-accessible users" multiple="" tabindex="-1" aria-hidden="true" >
                                                                            <option  value="4">الموظف 1</option>
                                                                    </select>


                                                                </div>
                                                            <!-- TASK TAGS -->
                                                            <div class="form-actions left todo-form-actions">
                                                                <button type="submit" class="btn btn-circle btn-sm green">اضافة</button>
                                                        </div>
                                                        </form>
               <!-- END FORM-->

           </div> </div>
                   </div>


                       <br> <br>
                                  </div>
                                   <div class="modal-footer">
                                  
                                   </div>
                               </div>
                           </div></div></div></div>
             <!--===========================================================-->


            <!--==============================================-->
            
                    </div>             <!--===========================================================-->

@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

<script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>


 <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
              <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>


@endsection


@section('page_level_scripts_js')
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

   <script src="{{url('/')}}/admin/assets/pages/scripts/bootstrap-datepicker.min" type="text/javascript"></script>

  @endsection

@section('theme_layout_scripts_js')
@endsection

 



@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/bootstrap-multiselect.js"></script>
<script src="{{url('/')}}/admin/assets/pages/scripts/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

<script src="{{url('/')}}/admin/assets/pages/scripts/select2.full.min.js" type="text/javascript"></script>

<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


<script type="text/javascript">

    $(document).ready(function (e) {
        $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

        $("#add_task_project_form").on('submit', function(e) {


            if (e.isDefaultPrevented()) {

            } else {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                e.preventDefault();

                var form = $('#add_task_project_form')[0];
                var formData = new FormData(form);
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '{!! URL::asset("task/add_task_project_data")!!}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (e) {

                        if (e['result'] == 'ok') {
                            jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();

                        }

                        else if (e['result'] == 'error')
                        {
                            jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }


                        else
                        {
                            jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                        }


                    },
                    error: function(e)
                    {

                        $('#add_task_project_alert').show();
                        $('#error').empty();
                        var error = e.responseJSON;
                        $.each(error, function (i, member) {
                            for (var i in member) {
                                $('#error').append('<li >'+ member[i] +'</li>' );
                            }
                        });

                        jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                    }
                });

            }

        });
    });


  function add_new_task(){


    $("#add_new_task_modal").modal("toggle");
  }




  </script>


<script>
    $('#project').change(function () {
      //  alert($('#project').val());
        if ($('#project').val() == 2){
            $('#sender').hide();
            $('#project_select').hide();

        }  else if ($('#project').val() == 1){
            $('#sender').show();
            $('#project_select').show();

        }
    });

</script>


@endsection






