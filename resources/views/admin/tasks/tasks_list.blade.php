@extends('admin.layouts.backend')
@section('title','ادارة المهام والمشاريع')
@section('page_level_plugins_styles')
    <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>

    <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css"/>

    <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css"/>


@endsection

@section('page_global_styles')
    <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/')}}/admin/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css"/>

@endsection

@section('page_level_styles')
    <link href="{{url('/')}}/admin/assets/apps/css/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/apps/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/apps/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/admin/assets/apps/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css"/>


@endsection


@section('theme_layout_styles')
@endsection
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
    <link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">

    <link rel="stylesheet" href="{{url('/')}}/admin/assets/apps/css/todo-2.min.css">

    <link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen">
    <link rel="stylesheet" type="text/css"
          href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5"/>
    <link rel="stylesheet" type="text/css"
          href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"/>
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">






    <style type="text/css">

        .todo-tasklist-item-text {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }


        .progress {
            height: 15px;
            background-color: transparent;

        }

        .todo-username-btn {
            color: #290c56;
            border-color: #290c56;
        }

        #content_style {
            height: 2000px;
        }

        .btn.btn-outline.grey-salsa {

            color: #000000;


        }

        .select2-container--bootstrap[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            font-size: 15px;
        }

        .edit_project_user {
            margin-right: 0px !important;
            margin-left: 50px !important;
            font-size: 13px !important;
        }

        .irs-bar-edge {

            position: fixed;
        }


        .page-content-wrapper .page-content {
            margin-top: -20px;
        }

        .todo-projects-config {
            padding: 6px 10px 4px 13px !important;
        }

        .project_info {
            text-align: center !important;
        }

        .media {
            overflow: visible !important;
        }

        .reply_view {
            margin-right: 40px !important;
        }

        .modal-body {
            padding: 0px !important;
        }

        .project_title {
            font-size: 15px !important;
        }

        /*.modal-content{
            width: 608px !important;

        }*/
        .todo-username {
            font-size: 14px !important;
        }

        span {
            font-weight: bold !important;
            /* overflow-y: hidden; */
            font-size: smaller !important;
        }

        .select2-results {
            font-size: small !important;
        }

        @media (min-width: 768px !important) {
            .modal-dialog {
                width: 600px !important;
                margin: 30px auto !important;

            }

        }

        @media (min-width: 992px !important) {
            .modal-lg {
                width: 900px !important;
            }
        }


        @media (min-width: 768px) {
            .modal-xl {
                width: 100% !important;
                max-width: 650px;
            }
        }

        /*
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
            width: 60%;
           max-width:1200px;
          }
        }
      */
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222 !important;
        }

        .modal-header {
            padding: 9px 15px !important;
            border-bottom: 1px solid #eee !important;
            background-color: white !important;
            -webkit-border-top-left-radius: 5px !important;
            -webkit-border-top-right-radius: 5px !important;
            -moz-border-radius-topleft: 5px !important;
            -moz-border-radius-topright: 5px !important;
            border-top-left-radius: 5px !important;
            border-top-right-radius: 5px !important;
        }

        .todo-task-modal-bg {
            background-color: #f7f9fa !important;
            padding: 20px !important;
        }

        h3 {
            margin: 15px 0 !important;
            font-size: 20px !important;
            color: #4e5a64 !important;
            font-weight: 600 !important;
        }

        .btn.green:not(.btn-outline) {
            margin: 10px !important;
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
    <?php   $user_test = Sentinel::getUser();

    if($user_test->hasAccess('task.confirm_status')){  ?>
    <input type="hidden" id="user_id" value="<?php echo $user_test->id ?>"/>
    <input type="hidden" id="user_access" value="1"/>

    <?php  }  ?>
    <?php

    if(!($user_test->hasAccess('task.confirm_status'))){  ?>
    <input type="hidden" id="user_id" value="<?php echo $user_test->id ?>"/>
    <input type="hidden" id="user_access" value="2"/>

    <?php  }  ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN TODO SIDEBAR -->
            <div class="todo-ui">
                <div class="todo-sidebar pull-left">
                    <div class="portlet light ">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="JAVASCRIPT:getProjectTasks({{0}})">
                                    <span class="badge badge-info pull-right public_task"> {{count($public_task)}} </span>
                                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading0">
                                    المهام العامة </a>

                            </li>
                        </ul>
                    </div>
                    <div class="portlet light ">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="JAVASCRIPT:getProjectTasks(-1)">
                                    <span class="badge badge-info pull-right external_in_task"> {{count($external_in_task)}} </span>
                                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading-1">

                                    المهام الواردة </a>

                            </li>
                            <li>
                                <a href="JAVASCRIPT:getProjectTasks(-2)">
                                    <span class="badge badge-info pull-right external_out_task"> {{count($external_out_task)}} </span>
                                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading-2">
                                    المهام الصادرة </a>

                            </li>
                        </ul>
                    </div>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                <span class="caption-subject font-green-sharp bold uppercase">المشاريع </span>
                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">انقر لرؤية المشاريع</span>
                            </div>

                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn green btn-circle btn-outline btn-sm todo-projects-config"
                                       href="javascript:;" data-toggle="dropdown" data-hover="dropdown"
                                       data-close-others="true">
                                        <i class="icon-settings"></i> &nbsp;
                                        <i class="fa fa-angle-down"></i>
                                    </a>


                                    <ul class="dropdown-menu pull-right">
                                        <?php   $user_test = Sentinel::getUser();

                                        if($user_test->hasAccess('task.confirm_status')){  ?>
                                        <li>
                                            <a href="javascript:;add_new_project()" id="project_button"> مشروع جديد </a>
                                        </li>
                                        <?php  }  ?>
                                        <?php

                                        if (!($user_test->hasAccess('task.confirm_status'))) { ?>

                                        <?php }  ?>

                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;filterProjectByStatus()"> جديد
                                                <span class="badge badge-danger"> {{$new_Status}} </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterProjectByStatusPending()"> قيد الانتظار
                                                <span class="badge badge-danger"> {{$pending_Status}} </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterProjectByStatusInprogress()"> قيد العمل
                                                <span class="badge badge-danger"> {{$inProgress_Status}} </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterProjectByStatusCompleted()"> منجز
                                                <span class="badge badge-success"> {{$inProgress_Status}} </span>
                                            </a>
                                        </li>
                                        {{--   <li>
                                               <a href="javascript:;filterProjectByStatusCanceled()"> الملغية
                                                   <span class="badge badge-warning canceled_status"> 9 </span>
                                               </a>
                                           </li>--}}
                                        <li class="divider"></li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="portlet-body todo-project-list-content project_view" style="height: auto;">

                            <div class="todo-project-list">

                                <ul class="nav nav-stacked">


                                    @foreach($projects as $project)
                                        <li class="projects_status_{{$project->status}}">
                                            <input type="hidden" id="projects_status{{$project->status}}"
                                                   value="{{$project->status}}">
                                            <a href="JAVASCRIPT:getProjectTasks({{$project->id_pk}})">

                                                <span class="badge badge-info pull-right"> {{$project->task_count}} </span><img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading{{$project->id_pk}}"> {{$project->title}}
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                                <span class="caption-subject font-red bold uppercase">أعضاء المشروع </span>
                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">انقر لرؤية أعضاء المشروع</span>
                            </div>
                            <div class="actions">
                                <div class="actions">
                                    <?php   $user_test = Sentinel::getUser();

                                    if($user_test->hasAccess('task.confirm_status')){  ?>
                                    <a class="btn btn-circle grey-salsa btn-outline btn-sm edit_project_button" style="display: none" href="javascript:;edit_project_user_modal()">

                                        <i class="fa fa-plus"></i> اضافة </a>

                                    <?php  }  ?>

                                </div>

                            </div>
                        </div>


                        <div class="portlet-body todo-project-list-content todo-project-list-content-tags team_member"
                             style="height: auto;">
                            <div class="todo-project-list">
                                <ul class="nav nav-pills nav-stacked">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                                <span class="caption-subject font-red bold uppercase">الوصول السريع </span>
                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
                            </div>

                        </div>
                        <div class="portlet-body todo-project-list-content todo-project-list-content-tags"
                             style="height: auto;">
                            <div class="todo-project-list">
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="javascript:;filterTaskByStatus()">
                                            <span class="badge badge-danger new_status"> 0 </span> جديد </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;filterTaskByStatusPending()">
                                            <span class="badge badge-danger pending_status"> 0 </span> قيد الانتظار </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;filterTaskByStatusInprogress()">
                                            <span class="badge badge-info inProgress_status"> 0 </span> قيد العمل </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;filterTaskByStatusCompleted()">
                                            <span class="badge badge-success completed_status"> 0 </span> منجز </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TODO SIDEBAR -->
                <!-- BEGIN TODO CONTENT -->
                <div class="todo-content " style="display: none">
                    <div class="portlet light " id="content_style">
                        <!-- PROJECT HEAD -->
                        <div class="portlet-title">
                            <div class="caption project_title" style="display: none">
                                <i class="icon-bar-chart font-green-sharp hide"></i>
                                <span class="caption-helper ">مهام مشروع 2020:</span> &nbsp;
                                <span class="caption-subject font-green-sharp bold uppercase">مهام المشروع</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-display" style="display: none">
                                    <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown"
                                       data-hover="dropdown" data-close-others="true"> اضافة مهمة
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li class="internal_task">
                                            <a href="javascript:;add_new_task()"> مهمة داخلية </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;add_external_task()"> مهمة خارجية </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;filterTaskByStatus()"> جديد
                                                <span class="badge badge-danger new_status"> 4 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterTaskByStatusPending()"> قيد الانتظار
                                                <span class="badge badge-danger pending_status"> 4 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterTaskByStatusInprogress()"> قيد العمل
                                                <span class="badge badge-danger inProgress_status"> 4 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterTaskByStatusCompleted()"> منجز
                                                <span class="badge badge-success completed_status"> 12 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;filterTaskByStatusDue()"> المتأخرة
                                                <span class="badge badge-warning canceled_status"> 9 </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end PROJECT HEAD -->
                        <div class="portlet-body">
                            <div class="row display_task_info">
                                <div class="col-md-5 col-sm-4">
                                    <div class="todo-tasklist">
                                        <div class="todo-tasklist-item todo-tasklist-item-border-green show_task"
                                             style="display: none">
                                        </div>

                                    </div>
                                </div>
                                <div class="todo-tasklist-devider"></div>
                                <div class="col-md-7 col-sm-8">

                                    <!-- TASK HEAD -->
                                    <div class="form task_info_show" style="display: none">
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12"
                                                 style="margin-bottom: 30px;margin-top: -30px;">
                                                <div class="todo-taskbody-user task_full_name create_user">
                                                </div>


                                            </div>
                                            <!-- END TASK HEAD -->
                                            <!-- TASK TITLE -->
                                            <div class="form-group">
                                                <div class="col-md-12 task_title">
                                                </div>
                                            </div>
                                            <!-- TASK DESC -->
                                            <div class="form-group">
                                                <div class="col-md-12 task_desc">
                                                </div>
                                            </div>
                                            <!-- END TASK DESC -->
                                            <!-- TASK DUE DATE -->
                                            <div class="form-group task_end_date">

                                            </div>


                                        </div>
                                        <div class="tabbable-line comment_display" style="display: none">
                                            <ul class="nav nav-tabs ">
                                                <li class="active">
                                                    <a href="#tab_1" data-toggle="tab"> التعليقات </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_2" data-toggle="tab"> تاريخ التعديل</a>
                                                </li>
                                                <li>
                                                    <a href="#tab_3" data-toggle="tab"> المرفقات </a>

                                                </li>
                                            </ul>
                                            <div class="tab-content" style="margin-right: 30px;">
                                                <div class="tab-pane active" id="tab_1">
                                                    <!-- TASK COMMENTS -->
                                                    <div class="view_comments">

                                                    </div>
                                                    <!-- END TASK COMMENTS -->
                                                    <!-- TASK COMMENT FORM -->
                                                    <form class="form-horizontal" data-toggle="validator" role="form"
                                                          method="post" id="add_comment_form"
                                                          enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="alert alert-danger" id="add_task_project_alert"
                                                             style="display:none">
                                                            <ul id="error">
                                                            </ul>
                                                        </div>
                                                        <div class="form-group comment_form">
                                                        </div>
                                                    </form>
                                                    <!-- END TASK COMMENT FORM -->
                                                </div>
                                                <div class="tab-pane" id="tab_2">
                                                    <ul class="todo-task-history task_history">
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab_3">
                                                    <ul class="todo-task-history task_attach">
                                                        <li>
                                                            <div class="col-md-12">
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TODO CONTENT -->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!--==============================================-->

        <div class="modal fade in" id="add_new_task_modal" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class=" modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">
               ×</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>


                    <div class="modal-body " style="background:#eee">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-red-thunderbird"></i>
                                            <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة مهمة داخلية   </span>
                                            <br>
                                            <i class="fa fa-info font-red-thunderbird"></i>


                                        </div>


                                    </div>
                                    <form class="form-horizontal" data-toggle="validator" role="form" method="post"
                                          id="add_task_form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="alert alert-danger" id="add_task_project_alert"
                                             style="display:none">
                                            <ul id="error">
                                            </ul>
                                        </div>

                                        <div class="portlet-body form">
                                            <div class="form-group">
                                                <input type="hidden" name="type1" value="1">
                                                <input type="hidden" id="p_id" name="p_id" value="">
                                            </div>


                                            <!-- BEGIN FORM-->

                                            <div class="form">
                                                <!-- END TASK HEAD -->
                                                <!-- TASK TITLE -->
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="text" id="title" name="title"
                                                               class="form-control todo-taskbody-tasktitle"
                                                               placeholder="العنوان..." required></div>
                                                </div>
                                                <!-- TASK DESC -->
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="8"
                                                                  placeholder="الوصف..." id="description"
                                                                  name="description" required></textarea>
                                                    </div>
                                                </div>
                                                <!-- END TASK DESC -->
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <div class="input-icon">
                                                            <i class="fa fa-calendar"></i>
                                                            <input type="text" class="form-control date-picker"
                                                                   data-date-format="dd/mm/yyyy"
                                                                   data-date-start-date="+0d"
                                                                   placeholder="  بداية التاريخ  " id="start_date"
                                                                   name="start_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-icon">
                                                            <i class="fa fa-calendar"></i>
                                                            <input type="text" class="form-control date-picker"
                                                                   data-date-format="dd/mm/yyyy"
                                                                   data-date-start-date="+0d"
                                                                   placeholder="  اخر تاريخ للتسليم " id="end_date"
                                                                   name="end_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required>
                                                        </div>
                                                    </div>

                                                </div>


                                                <!-- TASK options -->
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label for="status"> الحالة</label><br>
                                                        <select class="form-control  " tabindex="-1" aria-hidden="true"
                                                                name="status">
                                                            <option value="2">جديد</option>
                                                            <option value="3">قيد الانتظار</option>
                                                            <option value="4">قيد العمل</option>
                                                            <option value="5">مكتمل</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="importantce">
                                                            <div class="col-md-12">
                                                                <label for="importantce">الأهمية</label><br>

                                                                <select name="priority" class="form-control"
                                                                        tabindex="-1" aria-hidden="true">
                                                                    <option value="1">مستعجله</option>
                                                                    <option value="2">مهمة</option>
                                                                    <option value="3">عادي</option>
                                                                    <option value="4">قليلة الأهمية</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- TASK TAGS -->
                                                <!-- TASK TAGS -->
                                                <div class="form-group col-md-12">
                                                    <label for="user">الموكل اليه</label><br>
                                                    <input type="hidden" name="dep_id"
                                                           value="{{Sentinel::getUser()->dep}}">
                                                    <select name="assign_to" id="assign_to" class="form-control"
                                                            tabindex="-1" aria-hidden="true">
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- TASK TAGS -->
                                                <div class="form-actions left todo-form-actions">
                                                    <button type="submit" class="btn btn-circle btn-sm green"
                                                            onclick="add_task_form()">اضافة
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            </form>
                            <!-- END FORM-->


                        </div>
                    </div>
                </div>


                <br> <br>
            </div>
        </div>
    </div></div>
    <!--===========================================================-->

    <!--==============================================-->

    <div class="modal fade in" id="add_external_task_modal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">
               ×</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>


                <div class="modal-body " style="background:#eee">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-thunderbird"></i>
                                        <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة مهمة خارجية   </span>
                                        <br>
                                        <i class="fa fa-info font-red-thunderbird"></i>


                                    </div>


                                </div>
                                <form class="form-horizontal" data-toggle="validator" role="form" method="post"
                                      id="add_external_task_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="alert alert-danger" id="add_task_project_alert" style="display:none">
                                        <ul id="error">
                                        </ul>
                                    </div>

                                    <div class="portlet-body form">
                                        <div class="form-group">
                                            <input type="hidden" name="type1" value="1">
                                            <input type="hidden" name="p_id" value="-1">
                                        </div>


                                        <!-- BEGIN FORM-->

                                        <div class="form">
                                            <!-- END TASK HEAD -->
                                            <!-- TASK TITLE -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" id="title" name="title"
                                                           class="form-control todo-taskbody-tasktitle"
                                                           placeholder="العنوان..." required></div>
                                            </div>
                                            <!-- TASK DESC -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8"
                                                              placeholder="الوصف..." id="description"
                                                              name="description" required></textarea>
                                                </div>
                                            </div>
                                            <!-- END TASK DESC -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control date-picker"
                                                               data-date-format="dd/mm/yyyy" data-date-start-date="+0d"
                                                               placeholder="  بداية التاريخ  " id="start_date"
                                                               name="start_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control date-picker"
                                                               data-date-format="dd/mm/yyyy" data-date-start-date="+0d"
                                                               placeholder="  اخر تاريخ للتسليم " id="end_date"
                                                               name="end_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required></div>
                                                </div>

                                            </div>


                                            <!-- TASK options -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label for="status"> الحالة</label><br>
                                                    <select class="form-control  " tabindex="-1" aria-hidden="true"
                                                            name="status">
                                                        <option value="2">جديد</option>
                                                        <option value="3">قيد الانتظار</option>
                                                        <option value="4">قيد العمل</option>
                                                        <option value="5">مكتمل</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" id="importantce">
                                                        <div class="col-md-12">
                                                            <label for="importantce">الأهمية</label><br>

                                                            <select name="priority" class="form-control" tabindex="-1"
                                                                    aria-hidden="true">
                                                                <option value="1">مستعجله</option>
                                                                <option value="2">مهمة</option>
                                                                <option value="3">عادي</option>
                                                                <option value="4">قليلة الأهمية</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TASK TAGS -->
                                            <!-- TASK TAGS -->
                                            <div class="form-group col-md-12">
                                                <label for="user">الموكل اليه</label><br>
                                                <select name="to_dept" id="to_dept" class="form-control" tabindex="-1"
                                                        aria-hidden="true">
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- TASK TAGS -->
                                            <div class="form-actions left todo-form-actions">
                                                <button type="submit" class="btn btn-circle btn-sm green"
                                                        onclick="add_external_task_form()">اضافة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        </form>
                        <!-- END FORM-->


                    </div>
                </div>
            </div>


            <br> <br>
        </div>
    </div>
    </div></div>
    <!--===========================================================-->

    <!--==============================================-->

    <div class="modal fade in" id="add_new_project_modal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">
               ×</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>


                <div class="modal-body " style="background:#eee">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-thunderbird"></i>
                                        <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة مشروع جديد   </span>
                                        <br>
                                        <i class="fa fa-info font-red-thunderbird"></i>


                                    </div>


                                </div>
                                <form class="form-horizontal" data-toggle="validator" role="form" method="post"
                                      id="add_task_project_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="alert alert-danger" id="add_task_project_alert" style="display:none">
                                        <ul id="error">
                                        </ul>
                                    </div>

                                    <div class="portlet-body form">
                                        <div class="form-group">
                                            <input type="hidden" name="type1" value="2" id="type1" required>
                                        </div>


                                        <!-- BEGIN FORM-->

                                        <div class="form">

                                            <!-- END TASK HEAD -->
                                            <!-- TASK TITLE -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" id="title" name="title"
                                                           class="form-control todo-taskbody-tasktitle"
                                                           placeholder="العنوان..." required></div>
                                            </div>
                                            <!-- TASK DESC -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8"
                                                              placeholder="الوصف..." id="description"
                                                              name="description" required></textarea>
                                                </div>
                                            </div>
                                            <!-- END TASK DESC -->
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control date-picker"
                                                               data-date-format="dd/mm/yyyy" data-date-start-date="+0d"
                                                               placeholder="  بداية التاريخ  " id="start_date"
                                                               name="start_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input type="text" class="form-control date-picker"
                                                               data-date-format="dd/mm/yyyy" data-date-start-date="+0d"
                                                               placeholder="  اخر تاريخ للتسليم " id="end_date"
                                                               name="end_date" data-error=" اخر تاريخ للتسليم   " autocomplete="off" required></div>
                                                </div>


                                            </div>

                                            <!-- TASK DUE DATE -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="user">أعضاء المشروع</label><br>
                                                    <input type="hidden" name="dep_id"
                                                           value="{{Sentinel::getUser()->dep}}">
                                                    <select name="assign_to[]" id="update_user"
                                                            class="form-control select2-multiple select2-hidden-accessible"
                                                            multiple="multiple" tabindex="-1" aria-hidden="true">
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- TASK options -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="status"> الحالة</label><br>
                                                    <select class="form-control  " tabindex="-1" aria-hidden="true"
                                                            name="status">
                                                        <option value="2">جديد</option>
                                                        <option value="3">قيد الانتظار</option>
                                                        <option value="4">قيد العمل</option>
                                                        <option value="5">مكتمل</option>
                                                        <option value="6">ملغي</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <!-- TASK TAGS -->
                                            <!-- TASK TAGS -->
                                            <div class="form-group">
                                                <!-- TASK TAGS -->
                                                <div class="form-actions left todo-form-actions">
                                                    <button type="submit" class="btn btn-circle btn-sm green"
                                                            onclick="add_task_project_form()">اضافة
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <!-- END FORM-->

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--===========================================================-->
    <!--==============================================-->

    <div class="modal fade in" id="view_project_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-body " style="background:#eeeeee">


                    <div class="modal-content scroller" style="height: 100%; overflow: hidden; width: auto;"
                         data-always-visible="1" data-rail-visible="0" data-initialized="1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">
               ×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"></h4>

                            <div class="form-group edit_project_done">

                            </div>
                            <div class="row">
                                <div class="form-group">


                                    <div class="col-md-6">
                                        <p class="todo-task-modal-title todo-inline project_end_date">موعد التسليم:
                                            <input class="form-control input-inline input-medium date-picker todo-task-due todo-inline "
                                                   size="16" type="text" value="">
                                        </p>
                                    </div>
                                    <div class="col-md-6 project_status" style="margin: 20px 0;">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-body todo-task-modal-body project_info">
                                <h3 class="todo-task-modal-bg "></h3>
                                <p class="todo-task-modal-bg "></p>
                                <h4>Attach File
                                    <a class="todo-add-button" href="javascript:;">+</a>
                                </h4>
                                <p class="todo-task-file">
                                    <i class="fa fa-file-o todo-grey"></i>
                                    <i class="fa fa-times todo-remove-file"></i>
                                </p>
                                <p class="todo-task-file">
                                    <i class="fa fa-file-o todo-grey"></i>
                                    <i class="fa fa-times todo-remove-file"></i>
                                </p>
                            </div>

                            <p class="todo-task-modal-title todo-inline ">أعضاء المشروع:
                                <a class="todo-inline todo-task-assign project_team" href="#todo-members-modal"
                                   data-toggle="modal">Luke</a>
                            </p>
                        </div>
                        <!-- BEGIN PORTLET-->
                        <!-- END PORTLET-->
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--===========================================================-->
    <!--==============================================-->

    <div class="modal fade in" id="edit_project_user_modal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Select a Member</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" data-toggle="validator" role="form" method="post"
                          id="edit_project_user_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="project_id" name="project_id" value="">
                        <div class="form-group edit_project_user">
                            <label class="control-label col-md-4">اختر الموظفين</label>
                            <div class="col-md-8">
                                <select name="assign_to[]" id="assign_to" class="form-control select2 select-height"
                                        multiple="">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn default " data-dismiss="modal" aria-hidden="true">الغاء</button>
                    <button type="submit" class="btn green " onclick="edit_project_user()">اضافة</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--===========================================================-->
    <!--==============================================-->

    <div class="modal fade in" id="edit_task_user_modal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Select a Member</h4>
                </div>
                <div class="modal-body" style="padding: 0px 30px 83px 15px!important;">
                    <form class="form-horizontal" data-toggle="validator" role="form" method="post"
                          id="edit_task_user_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="task_id" id="task_id" value="">
                        <div class="col-md-12 form-group">
                            <label for="user">الموكل اليه</label><br>
                            <input type="hidden" name="done_status" value="">

                            <input type="hidden" name="dep_id" value="{{Sentinel::getUser()->dep}}">
                            <select name="assign_to" id="assign_to" class="form-control" tabindex="-1"
                                    aria-hidden="true">
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn default" data-dismiss="modal" aria-hidden="true">اغلاق</button>
                    <button type="submit" class="btn green" onclick="edit_task_user()">تعديل</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!--===========================================================-->

@endsection

@section('body')
    @include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

    <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>


    <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/ion.rangeSlider.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/components-ion-sliders.min.js" type="text/javascript"></script>
@endsection


@section('page_level_scripts_js')
    <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js"
            type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/jquery.bootpag.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/holder.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/ui-general.min.js" type="text/javascript"></script>

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
    <script src="{{url('/')}}/admin/assets/apps/css/todo.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
    <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
    <script type="text/javascript"
            src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript"
            src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript"
            src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script type="text/javascript"
            src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <script>
        var delete_url = '{{url("/")}}/task/items/delete_task_attachment' + '/';
        var show_url = '{{url("/")}}/task/items/show_image' + '/';
        var thumbnail_url = '{{url("/")}}/task/items/show_thumb_stockinvw' + '/';
        var download_url = '{{url("/")}}/task/items/show_image' + '/' ;
        var delete_url_2 = '{{url("/")}}/task/items/delete_selected_attach_task' + '/';


        function add_new_task() {


            $("#add_new_task_modal").modal("toggle");
        }

        function add_external_task() {


            $("#add_external_task_modal").modal("toggle");
        }

        function add_new_project() {


            $("#add_new_project_modal").modal("toggle");
        }

        function view_project_details() {
            $("#view_project_modal").modal("toggle");
        }

        function edit_task_user_modal() {
            $("#edit_task_user_modal").modal("toggle");
        }

        function edit_project_user_modal() {
            $("#edit_project_user_modal").modal("toggle");
        }

    </script>
    <script type="text/javascript">

        $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

        function add_task_project_form() {

            $("#add_task_project_form").on('submit', function (e) {
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
                            form.reset();
                            if (e['result'] == 'ok') {
                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $("#add_new_project_modal").modal("hide");
                                $("#add_new_task_modal").modal("hide");
                                $('#add_task_project_alert').hide();


                                $.ajax({
                                    type: 'GET',
                                    dataType: "json",
                                    url: '{!! URL::asset("/task/projects_view")!!}',
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        $('.project_view').html('');
                                        $('.p_id').html('');
                                        $.each(data.projects, function (index, element) {
                                            $('.project_view').append('<div class="todo-project-list">' +
                                                ' <ul class="nav nav-stacked">' +
                                                '<li>' +
                                                '<a href="JAVASCRIPT:getProjectTasks(' + element.id_pk + ')">' +
                                                '<span class="badge badge-info pull-right">' + element.task_count + '</span>' + element.title + '<img src="http://10.12.161.8:82/task/public_html/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading'+element.id_pk+'"></a>' +
                                                '</li>' +
                                                '</ul>' +
                                                '</div>'
                                            );


                                            $('.p_id').append(' <option value="' + element.id_pk + '" >' + element.title + '</option>');


                                        });


                                    }

                                });

                            } else if (e['result'] == 'error') {
                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                                $("#add_new_project_modal").modal("show");
                            } else {
                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                $("#add_new_project_modal").modal("show");
                            }


                        },
                        error: function (e) {
                            $("#add_new_task_modal").modal("show");
                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                            $("#add_new_task_modal").modal("show");
                        }
                    });

                }

            });
        }

        function add_task_form() {
            $("#add_task_form").on('submit', function (e) {


                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#add_task_form')[0];
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
                                form.reset();
                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $("#add_new_project_modal").modal("hide");
                                $("#add_new_task_modal").modal("hide");
                                $('#add_task_project_alert').hide();
                                getProjectTasks($('#id_pk_p_id').val());

                                $.ajax({
                                    type: 'GET',
                                    dataType: "json",
                                    url: '{!! URL::asset("/task/projects_view")!!}',
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        $('.project_view').html('');
                                        $(".public_task").html('');
                                        $(".external_in_task").html('')
                                        $(".external_out_task").html('');
                                        $('.p_id').html('');
                                        $(".external_in_task").append('' + data.external_in_task + '');
                                        $(".external_out_task").append('' + data.external_out_task + '');
                                        $(".public_task").append('' + data.public_task + '');

                $.each(data.projects, function (index, element) {

                    $('.project_view').append('<div class="todo-project-list">' +
                        ' <ul class="nav nav-stacked">' +
                        '<li>' +
                        '<a href="JAVASCRIPT:getProjectTasks(' + element.id_pk + ')">' +
                        '<span class="badge badge-info pull-right">' + element.task_count + '</span>' + element.title + '<img src="http://10.12.161.8:82/task/public_html/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading'+element.id_pk+'"></a>' +
                        '</li>' +
                        '</ul>' +
                        '</div>'
                    );


        $('.p_id').append(' <option value="' + element.id_pk + '" >' + element.title + '</option>');

    });




                                    }

                                });

                            } else if (e['result'] == 'error') {
                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                                $("#add_new_task_modal").modal("show");
                            } else {
                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                $("#add_new_task_modal").modal("show");
                            }


                        },
                        error: function (e) {
                            $("#add_new_task_modal").modal("show");
                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }

            });
        }

        function add_external_task_form() {
            $("#add_external_task_form").on('submit', function (e) {

                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#add_external_task_form')[0];
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
                                form.reset();
                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $("#add_external_task_modal").modal("hide");
                                $("#add_new_project_modal").modal("hide");
                                $("#add_new_task_modal").modal("hide");
                                $('#add_task_project_alert').hide();
                                getProjectTasks($('#id_pk_p_id').val());

                                $.ajax({
                                    type: 'GET',
                                    dataType: "json",
                                    url: '{!! URL::asset("/task/projects_view")!!}',
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        $('.project_view').html('');
                                        $(".external_in_task").html('');
                                        $(".external_out_task").html('');
                                        $(".public_task").html('');
                                        $('.p_id').html('');
                                        $(".external_in_task").append('' + data.external_in_task + '');
                                        $(".external_out_task").append('' + data.external_out_task + '');
                                        $(".public_task").append('' + data.public_task + '');

                                $.each(data.projects, function (index, element) {

                                    $('.project_view').append('<div class="todo-project-list">' +

                                        ' <ul class="nav nav-stacked">' +

                                        '<li>' +
                                        '<a href="JAVASCRIPT:getProjectTasks(' + element.id_pk + ')">' +
                                        '<span class="badge badge-info pull-right">' + element.task_count + '</span>' + element.title + '<img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="width: 20px; height: 20px; display: none;" id="loading'+element.id_pk+'"></a>' +
                                        '</li>' +

                                        ' </ul>' +
                                        '</div>'
                                    );


                                    $('.p_id').append(' <option value="' + element.id_pk + '" >' + element.title + '</option>');

                                });




                                    }

                                });

                            } else if (e['result'] == 'error') {
                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                            } else {
                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                            }


                        },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }

            });
        }


    </script>


    <script>
        function edit_status() {


            $('#status_select').change(function (e) {

                var status_id = $("#edit_status").val();

                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $("#edit_status")[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/edit_status")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:
                            function (e) {
                                form.reset();
                                if (e['result'] == 'ok') {
                                    jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    show_task_info($('#task_id').val());
                                    $('#add_task_project_alert').hide();


                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                }


                            },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }
            });
        }

        function edit_project_status() {


            $('#project_status_select').change(function (e) {


                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $("#edit_project_status")[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/edit_status")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:
                            function (e) {

                                var status_id = $("#project_status_id").val();

                                if (e['result'] == 'ok') {
                                    jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();


                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                }


                            },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }
            });
        }

    </script>

    <script type="text/javascript">

        function getProjectTasks(id, assign_to) {

            var new_status = "0";
            var pending_status = "0"
            var inProgress_status = "0";
            var completed_status = "0";
            var canceled_status = "0";
            $('#loading'+id+'').show();
            $('.internal_task').show();

            if (id > -1) {

                $.ajax({
                    type: 'GET',
                    dataType: "json",
                    url: (assign_to == null) ? '{!! URL::asset("task/view_project_info")!!}/' + id : '{!! URL::asset("task/view_project_info")!!}/' + id + '/' + assign_to,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(id == 0){
                            $('.edit_project_button').hide();
                        }else {
                            $('.edit_project_button').show();
                        }
                        $('.edit_project_done').html('');

                        $('.project_status').html('');
                            if(id>0){

                                $('.project_status').append('<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_project_status" enctype="multipart/form-data" >' +
                                    '{{ csrf_field() }}' +
                                    '<label for="status"> الحالة</label><br>' +
                                    '<input type="hidden" name="project_id" id="project_status_id" value="' + data[0].id_pk + '">' +
                                    '<select name="project_status_id" id="project_status_select"  class="form-control" tabindex="-1" aria-hidden="true" onclick="edit_project_status()">' +
                                    '<option value=""  disabled >نغيير الحالة</option>' +
                                    '<option value="2" >جديد</option>' +
                                    '<option value="3">قيد الانتظار</option>' +
                                    '<option value="4" >قيد العمل</option>' +
                                    '<option value="5" >منجز</option>' +
                                    '<option value="6">ملغي</option>' +
                                    '</select>' +
                                    '</div>' +
                                    '</form>');
                                $('.edit_project_done').append('<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_project_done_form" enctype="multipart/form-data" >' +
                                    '{{ csrf_field() }}' +
                                    '<input type="hidden" name="project_id" id="project_id" value="' + id + '">' +
                                    '<div class="form-group" style="direction:ltr"><div class="col-md-12" id="done_bar"><h3 style ="text-align: center;">نسبة الانجاز</h3><input id="range_2" name = "done"  type="text" value="' + data[0].done + '" /></div></div>' +
                                    '</form>'
                                );
                            }

                        $('#loading'+id+'').hide();
                        $('#loading'+id+'').hide();

                        $('.project_status').find('#project_id').empty();
                        $('#edit_project_user_form').find('#project_id').empty();
                        $('.edit_project_done').find('#project_id').empty();
                        $('#external_task').empty();
                        $('#p_id').val(id);
                        $('#p_id').empty();
                        $('#id_pk_p_id').empty();
                        $('.todo-tasklist').html('');
                        $('#edit_project_user').val('');
                        $('.comment_form').html('');
                        $('.task_info_show').hide();
                        $('.comment_display').hide();
                        $('.new_status').html('');
                        $('.pending_status').html('');
                        $('.inProgress_status').html('');
                        $('.completed_status').html('');
                        $('.canceled_status').html('');
                        $('.show_task').hide();
                        $('.status_type').html('');
                        $('.btn-display').show();
                        $('.todo-content').show();
                        var user_access = $('#user_access').val();
                        var user_id = $('#user_id').val();

                        $('#add_task_form').append('<input type="hidden" id="id_pk_p_id"  value="' + data[0].p_id + '">');

                        $('#id_pk_p_id').val(id);


                        $('#add_task_form').find("#assign_to").empty();
                        $('#edit_task_user_form').find("#assign_to").empty();
                        $('#edit_task_user_form').find("#assign_task_to").append('<option  value=""></option>');
                        $.each(data[0].team, function (index, element) {
                            $('#add_task_form').find("#assign_to").append('<option  value="' + element.assign_to + '">' + element.full_name + '</option>');

                            $('#edit_task_user_form').find("#assign_to").append('<option  value="' + element.assign_to + '">' + element.full_name + '</option>');

                        });


                        //============================================================================

                        $.each(data[0].tasks, function (index, element) {

                            if (element.status == "2") {
                                new_status++;
                            }
                            if (element.status == '3') {
                                pending_status++;

                            }
                            if (element.status == '4') {
                                inProgress_status++;

                            }
                            if (element.status == '5') {
                                completed_status++;

                            }
                            if (element.status == '6') {
                                canceled_status++;

                            }
                            var task_id = element.id_pk;
                            var task_status_id = element.status;
                            var task_priority = element.priority;
                            var priority_name = "";
                            var priority_color = "";
                            var task_color = "";
                            var done_width = element.done;
                            switch (task_status_id) {
                                case '2':
                                    task_color = 'green';
                                    break;
                                case '3':
                                    task_color = 'yellow';
                                    break;
                                case '4':
                                    task_color = 'purple';
                                    break;
                                case '5':
                                    task_color = 'green';
                                    break;
                                case '6':
                                    task_color = 'red';
                                    break;
                                case '7':
                                    task_color = 'green';
                                    break;

                            }
                            switch (task_priority) {
                                case '1':
                                    priority_color = 'red';
                                    priority_name = 'مستعجلة';
                                    break;
                                case '2':
                                    priority_color = '#ff4f1d';
                                    priority_name = 'مهمة';
                                    break;
                                case '3':
                                    priority_color = '#06aa7f';
                                    priority_name = 'عادية';
                                    break;
                                case '4':
                                    priority_color = 'green';
                                    priority_name = 'لاحقا';
                                    break;
                            }
                            var task_done = element.done;
                            var task_done_color = "";
                            var task_overdue = "";

                            switch (task_done) {
                                case '100':
                                    task_done_color = "success";
                                    break;
                                default:
                                    task_done_color = "danger";
                                    break;
                            }
                            if (done_width == '0') {
                                done_width = '1';
                            }
                            if (element.due_date == 'true') {
                                task_overdue = "pulse";
                            }
                            var image = element.image;
                            if(image == 'not_found'|| image ==null){
                                image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                            }else {
                                image =   "user_image/"+element.image;

                            }

                            $('.status_type').append('<label for="status"> الحالة :' + element.status_name + '</label><br>');

                            $('.todo-tasklist').append('<div class="todo-tasklist-item todo-tasklist-item-border-' + task_color + ' task_item' + element.status + ' task_item_id_pk' + element.id_pk + '" onclick="show_task_info(' + task_id + ')">' +
                                '<img class="todo-userpic pull-left" src="{{url("../..")}}/public_html/admin/'+image+'" width="40px" height="40px">' +
                                '<input id="id_pk"  name="id_pk " type="hidden" value="' + task_id + '">' +
                                '<img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading'+element.id_pk+'">'+
                                '<div class="todo-tasklist-item-title"> ' + '<input id="task_title" type="hidden" value="' + element.title + '">' + element.title +


                                ' </div>' +

                                '<div class="todo-tasklist-item-text"> ' + '<input id="task_desc" type="hidden" value="' + element.full_name + '">' + element.full_name + '  </div>' +
                                '<div class="todo-tasklist-controls pull-left">' +
                                '<span class="todo-tasklist-date">' +
                                '<i class="fa fa-calendar"></i> ' + '<input id="start_date" type="hidden" value="' + element.start_date + '">' + element.sdate + ' </span>' +
                                '<span class="todo-tasklist-date ' + task_overdue + '"  style="padding:5px;">' +
                                '<i class="fa fa-calendar" ></i> ' + '<input id="end_date" type="hidden" value="' + element.end_date + '">' + element.edate + ' </span>' +

                                '<span class="todo-tasklist-badge badge badge-roundless" style="margin-left: 10px; background-color: ' + task_color + '">' + '<input id="task_status' + element.status + '" type="hidden" value="' + element.status + '" >' + element.status_name + '</span>' +
                                '<span class="todo-tasklist-badge badge badge-roundless" style = "background-color: ' + priority_color + '">' + '<input id="priority" type="hidden" value="' + element.priority + '" >' + priority_name + '</span>' +
                                '</div>' +

                                '<br>' +
                                '<br>' +
                                '<div class="progress progress-striped col-md-12">' +
                                '<div class="progress-bar progress-bar-' + task_done_color + '" role="progressbar" aria-valuenow="' + element.done + '" aria-valuemin="0" aria-valuemax="100" style="width:  ' + done_width + '%">' +
                                '<span class="sr-only"> ' + element.done + '% Complete (success) </span>' +
                                '</div>' +
                                '</div>' +
                                '<div class="todo-tasklist-controls pull-left">' +
                                '<span class="todo-tasklist-date">' +
                                '<i class="fa fa-paperclip"></i> ' + '<input id="start_date" type="hidden" value="' + element.attachments_count + '">' + element.attachments_count + ' </span>' +
                                '<span class="todo-tasklist-date "  >' +
                                '<i class="fa fa-comment" ></i> ' + '<input id="end_date" type="hidden" value="' + element.comments_count + '">' + element.comments_count + ' </span>' +
                                '</div>' +
                                '</div>' +
                                '</div>');

                            if (element.status == '7') {

                                $('.tasklist' + element.id + '').hide();

                            }
                            if (user_access == 2) {

                                $('.tasklist' + element.id + '').hide();

                                if (user_id == element.id) {
                                    $('#done_bar').show();
                                    $('#add_task').show();

                                }
                                if (user_id != element.id) {
                                    $('.tasklist-attach' + element.id + '').hide();

                                }
                            } else if (user_access == 1 && element.status != 7) {
                                $('#done_bar').show();
                                $('#add_task').show();
                            }
                        });

                        $(".pulse").pulsate();


                        $('.new_status').append('' + new_status + '');
                        $('.pending_status').append('' + pending_status + '');
                        $('.inProgress_status').append('' + inProgress_status + '');
                        $('.completed_status').append('' + completed_status + '');
                        $('.canceled_status').append('' + canceled_status + '');

                        if (assign_to == null) {
                            $('.team_member').html('');
                            $('.project_team').html('');
                            $('.project_title').html('');
                            $('.project_info').html('');
                            $('.project_end_date').html('');

                            $.each(data[0].team, function (index, element) {
                                if (user_access == 1) {
                                    if(id == 0){
                                        $('.team_member').append(' <div class="todo-project-list">' +
                                            ' <ul class="nav nav-pills nav-stacked">' +
                                            '<li>' +
                                            '<a href="javascript:;onclick(getProjectTasks(' + id + ',' + element.assign_to + '));">' +
                                            '  ' + element.full_name + ' </a>' +
                                            '</li>' +
                                            '</ul>' +
                                            '</div>'
                                        );


                                    }else{
                                        $('.team_member').append(' <div class="todo-project-list">' +
                                            ' <ul class="nav nav-pills nav-stacked">' +
                                            '<li>' +

                                            '<div class="row">' +
                                            '<div class="col-md-9">' +
                                            '<a href="javascript:;onclick(getProjectTasks(' + id + ',' + element.assign_to + '));">' +
                                            '  ' + element.full_name + ' </a>' +
                                            '</div>' +
                                            '<div class="col-md-3">' +
                                            '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "delete_project_user_form_' + element.assign_to + '" enctype="multipart/form-data" >' +
                                            '{{ csrf_field() }}' +
                                            '<span onclick="deleteProjectUser(' + id + ',' + element.assign_to + ')"><i class="fa fa-trash-o " style="font-size:24px; color:red" onclick="deleteProjectUser(' + id + ',' + element.assign_to + ');"></i>' +
                                            '</form>' +
                                            '</div>' +
                                            '</li>' +
                                            '</div>' +
                                            '</ul>' +
                                            '</div>'
                                        );
                                    }

                                } else {
                                    $('.project_status').html('');

                                    $('.team_member').append(' <div class="todo-project-list">' +
                                        ' <ul class="nav nav-pills nav-stacked">' +
                                        '<li>' +
                                        '<a href="javascript:;onclick(getProjectTasks(' + id + ',' + element.assign_to + '));">' +
                                        '  ' + element.full_name + ' </a>' +
                                        '</li>' +
                                        '</ul>' +
                                        '</div>'
                                    );

                                }
                                var count = Object.keys(element).length;
                                $('.todo-tasklist').append('<input id="task_member' + element.assign_to + '" type="hidden" value="' + element.assign_to + '">');

                                $('.project_team').append('<button class="btn btn-square btn-sm green todo-bold todo-inline">' + element.full_name + '<span>&nbsp;</span></button>');


                            });
                            $('#edit_project_user_form').find('#project_id').val(id);
                            $('.project_title').prop('style', 'contents');

                            $('.project_title').append(
                                '<i class="icon-bar-chart font-green-sharp hide"></i>' +
                                '<span class="caption-helper project_title" style="padding-left: 20px;font-size: 15px;">  ' + data[0].title + ' </span>' +
                                '<a type="button"  href="javascript:;view_project_details()"  class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;تفاصيل المشروع&nbsp;</a>'
                            );
                            $('.project_info').append(' <h3 class="todo-task-modal-bg ">' + data[0].title + '</h3>' +
                                ' <p class="todo-task-modal-bg "> ' + data[0].description + ' </p>');
                            $('.project_end_date').append(' <p class="todo-task-modal-title todo-inline ">موعد التسليم:' +
                                ' <input class="form-control input-inline input-medium date-picker todo-task-due todo-inline " size="16" type="text" value=" ' + data[0].edate + '" readonly>' +
                                '</p>');
                        }


                        $("#range_2").ionRangeSlider({
                            grid: true,
                            min: 0,
                            max: 100,
                            step: 10,
                            onStart: function (data) {
                                // fired then range slider is ready
                            },
                            onChange: function (data) {
                                // fired on every range slider update
                            },
                            onFinish: function (data) {
                                // fired on pointer release
                                rangeProjectChangeSave();
                            },
                            onUpdate: function (data) {
                                // fired on changing slider with Update method
                            }
                        });

                        function rangeProjectChangeSave() {
                            //alert($("#range_1").val());
                            //var range=$("#range_1").val();
                            //console.log(parseInt(range)%10);
                            if (false) {

                            } else {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                })
                                //e.preventDefault();

                                var form = $("#edit_project_done_form")[0];

                                var formData = new FormData(form);

                                $.ajax({
                                    type: 'POST',
                                    dataType: "json",
                                    url: '{!! URL::asset("task/edit_done")!!}',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success:
                                        function (e) {
                                            form.reset();


                                            /*if (e['result'] == 'ok') {
                                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();


                                            } else if (e['result'] == 'error') {
                                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();
                                            } else {
                                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                            }*/


                                        },
                                    error: function (e) {

                                        $('#add_task_project_alert').show();
                                        $('#error').empty();
                                        var error = e.responseJSON;
                                        $.each(error, function (i, member) {
                                            for (var i in member) {
                                                $('#error').append('<li >' + member[i] + '</li>');
                                            }
                                        });

                                        jError("حدث خطأ فى عملية الاضافة", {
                                            TimeShown: 2000,
                                            HorizontalPosition: 'left'
                                        });
                                        $('#add_task_project_alert').hide();

                                    }
                                });

                            }

                        }

                        $('#project_status_select').attr('selected', 'selected').val(data[0].status);


                        @if(isset($_GET['calid']) && isset($_GET['calpid']))
                        show_task_info({{$_GET['calid']}});
                        @else
                        show_task_info($('#id_pk').val());
                        @endif

                    }
                });
            } else {
                $('.project_status').html('');
                $('.internal_task').hide();
                $('#loading'+id+'').show();
                $('.edit_project_button').hide();

                $.ajax({
                    type: 'GET',
                    dataType: "json",

                    url: (id == -1) ? '{!! URL::asset("task/view_external_project")!!}/' + id : '{!! URL::asset("task/view_external_project")!!}/' + id ,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#loading'+id+'').hide();

                        $('#p_id').val(id);
                        $('#p_id').empty();
                        $('#id_pk_p_id').empty();
                        $('.todo-tasklist').html('');
                        $('#edit_project_user').val('');
                        $('.comment_form').html('');
                        $('.task_info_show').hide();
                        $('.comment_display').hide();                        $('.new_status').html('');
                        $('.pending_status').html('');
                        $('.inProgress_status').html('');
                        $('.completed_status').html('');
                        $('.canceled_status').html('');
                        $('.show_task').hide();
                        $('.status_type').html('');
                        $('.btn-display').show();
                        $('.todo-content').show();
                        $('.edit_project_done').html('');
                        var user_access = $('#user_access').val();
                        var user_id = $('#user_id').val();
                        $('#add_task_form').append('<input type="hidden" id="id_pk_p_id"  value="' + data[0].p_id + '">');

                        $('#id_pk_p_id').val(id);


                        $('#add_task_form').find("#assign_to").empty();
                        $('#edit_task_user_form').find("#assign_to").empty();
                        if(id==-2){
                            $('#add_task_form').find("#assign_to").empty();
                            $('#edit_task_user_form').find("#assign_to").empty();
                            $('#add_task_form').find("#assign_to").html('');
                            $('#edit_task_user_form').find("#assign_to").html('');
                        }else{
                            $('#edit_task_user_form').find("#assign_task_to").append('<option  value=""></option>');
                            $.each(data[0].team, function (index, element) {
                                $('#add_task_form').find("#assign_to").append('<option  value="' + element.assign_to + '">' + element.full_name + '</option>');

                                $('#edit_task_user_form').find("#assign_to").append('<option  value="' + element.assign_to + '">' + element.full_name + '</option>');

                            });

                        }



                        //============================================================================
                        //alert(first_task_in_list);
                        $.each(data[0].tasks, function (index, element) {

                            if (element.status == "2") {
                                new_status++;
                            }
                            if (element.status == '3') {
                                pending_status++;

                            }
                            if (element.status == '4') {
                                inProgress_status++;
                            }
                            if (element.status == '5') {
                                completed_status++;

                            }
                            if (element.status == '6') {
                                canceled_status++;

                            }
                            var task_id = element.id_pk;
                            var task_status_id = element.status;
                            var task_priority = element.priority;
                            var priority_name = "";
                            var priority_color = "";
                            var task_color = "";
                            var done_width = element.done;
                            switch (task_status_id) {
                                case '2':
                                    task_color = 'green';
                                    break;
                                case '3':
                                    task_color = 'yellow';
                                    break;
                                case '4':
                                    task_color = 'purple';
                                    break;
                                case '5':
                                    task_color = 'green';
                                    break;
                                case '6':
                                    task_color = 'red';
                                    break;
                                case '7':
                                    task_color = 'green';
                                    break;

                            }
                            switch (task_priority) {
                                case '1':
                                    priority_color = 'red';
                                    priority_name = 'مستعجلة';
                                    break;
                                case '2':
                                    priority_color = '#ff4f1d';
                                    priority_name = 'مهمة';
                                    break;
                                case '3':
                                    priority_color = '#06aa7f';
                                    priority_name = 'عادية';
                                    break;
                                case '4':
                                    priority_color = 'green';
                                    priority_name = 'لاحقا';
                                    break;
                            }
                            var task_done = element.done;
                            var task_done_color = "";
                            var task_overdue = "";

                            switch (task_done) {
                                case '100':
                                    task_done_color = "success";
                                    break;
                                default:
                                    task_done_color = "danger";
                                    break;
                            }
                            if (done_width == '0') {
                                done_width = '1';
                            }
                            if (element.due_date == 'true') {
                                task_overdue = "pulse";
                            }

                            $('.status_type').append('<label for="status"> الحالة :' + element.status_name + '</label><br>');
                            if (element.status == 7) {

                                $('#confirm_status_form' + element.id_pk).hide();
                            }
                            if (user_access == 2 && user_id == element.id) {
                                $('#task_attach' + element.id + '').show();

                                $('#done_bar').show();
                                $('#add_task').show();


                            }
                            if (user_access == 2 && user_id == data[0].team[0].assign_to) {
                                $('#task_attach' + element.id + '').show();

                                $('.tasklist' + element.id + '').show();
                                $('#add_task').show();


                            } else if ($('#p_id').val() == 0) {
                                $('#task_attach' + element.id + '').show();

                                $('#add_task').show();

                            } else {
                                $('#done_bar').hide();

                            }
                            var image = element.image;
                            if(image == null){
                                image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                            }else {
                                image =   "user_image/"+element.image;

                            }
                            var dep = element.create_dept;
                            if(id ==-2){
                                dep = element.to_dept

                            }
                            $('.todo-tasklist').append('<div class="todo-tasklist-item todo-tasklist-item-border-' + task_color + ' task_item' + element.status + ' task_item_id_pk' + element.id_pk + '" onclick="show_task_info(' + task_id + ')">' +
                                '<img class="todo-userpic pull-left" src="{{url("../../")}}/public_html/admin/'+image+'" width="40px" height="40px">' +
                                '<input id="id_pk"  name="id_pk " type="hidden" value="' + task_id + '">' +
                                '<img src="{{url('/')}}/admin/assets/global/img/loading5.gif" class="pull-right" style="display:none;width:20px;height:20px;" id="loading'+element.id_pk+'">'+
                                '<div class="todo-tasklist-item-title"> ' + '<input id="task_title" type="hidden" value="' + element.title + '">' + element.title +
                                ' </div>' +
                                '<div class="todo-tasklist-item-text"> ' + '<input id="task_desc" type="hidden" value="' + dep + '">' + element.name + '  </div>' +
                                '<div class="todo-tasklist-controls pull-left">' +
                                '<span class="todo-tasklist-date">' +
                                '<i class="fa fa-calendar"></i> ' + '<input id="start_date" type="hidden" value="' + element.start_date + '">' + element.sdate + ' </span>' +
                                '<span class="todo-tasklist-date ' + task_overdue + '"  style="padding:5px;">' +
                                '<i class="fa fa-calendar" ></i> ' + '<input id="end_date" type="hidden" value="' + element.end_date + '">' + element.edate + ' </span>' +

                                '<span class="todo-tasklist-badge badge badge-roundless" style="margin-left: 10px; background-color: ' + task_color + '">' + '<input id="task_status' + element.status + '" type="hidden" value="' + element.status + '" >' + element.status_name + '</span>' +
                                '<span class="todo-tasklist-badge badge badge-roundless" style = "background-color: ' + priority_color + '">' + '<input id="priority" type="hidden" value="' + element.priority + '" >' + priority_name + '</span>' +
                                '</div>' +

                                '<br>' +
                                '<br>' +
                                '<div class="progress progress-striped col-md-12">' +
                                '<div class="progress-bar progress-bar-' + task_done_color + '" role="progressbar" aria-valuenow="' + element.done + '" aria-valuemin="0" aria-valuemax="100" style="width:  ' + done_width + '%">' +
                                '<span class="sr-only"> ' + element.done + '% Complete (success) </span>' +
                                '</div>' +
                                '</div>' +
                                '<div class="todo-tasklist-controls pull-left">' +
                                '<span class="todo-tasklist-date">' +
                                '<i class="fa fa-paperclip"></i> ' + '<input id="start_date" type="hidden" value="' + element.attachments_count + '">' + element.attachments_count + ' </span>' +
                                '<span class="todo-tasklist-date "  >' +
                                '<i class="fa fa-comment" ></i> ' + '<input id="end_date" type="hidden" value="' + element.comments_count + '">' + element.comments_count + ' </span>' +
                                '</div>' +
                                '</div>' +
                                '</div>');


                            if (user_access == 1) {
                                $('.tasklist' + element.id + '').show();
                                $('#done_bar').show();
                                $('#add_task').show();
                                $('#task_attach' + element.id + '').show();


                            }
                        });

                        $(".pulse").pulsate();


                        $('.new_status').append('' + new_status + '');
                        $('.pending_status').append('' + pending_status + '');
                        $('.inProgress_status').append('' + inProgress_status + '');
                        $('.completed_status').append('' + completed_status + '');
                        $('.canceled_status').append('' + canceled_status + '');

                        if (assign_to == null) {
                            $('.team_member').html('');
                            $('.project_team').html('');
                            $('.project_title').html('');
                            $('.project_info').html('');
                            $('.project_end_date').html('');

                            $.each(data[0].team, function (index, element) {
                                if ($('#user_access').val() == 1 || id > -1) {

                                    $('.team_member').append(' <div class="todo-project-list">' +
                                        ' <ul class="nav nav-pills nav-stacked">' +
                                        '<li>' +
                                        '<a href="javascript:;onclick(getProjectTasks(' + id + ',' + element.assign_to + '));">' +
                                        '  ' + element.full_name + ' </a>' +
                                        '</li>' +
                                        '</ul>' +
                                        '</div>'
                                    );
                                } else {
                                    $('.project_status').hide();

                                    $('.team_member').append(' <div class="todo-project-list">' +
                                        ' <ul class="nav nav-pills nav-stacked">' +
                                        '<li>' +
                                        '<a href="javascript:;onclick(getProjectTasks(' + id + ',' + element.assign_to + '));">' +
                                        '  ' + element.full_name + ' </a>' +
                                        '</li>' +
                                        '</ul>' +
                                        '</div>'
                                    );

                                }
                                var count = Object.keys(element).length;
                                $('.todo-tasklist').append('<input id="task_member' + element.assign_to + '" type="hidden" value="' + element.assign_to + '">');

                                $('.project_team').append('<button class="btn btn-square btn-sm green todo-bold todo-inline">' + element.full_name + '<span>&nbsp;</span></button>');


                            });
                            $('.edit_project_user').append('<input type="hidden" name="project_id" id="project_id" value="' + data[0].id_pk + '">');
                            $('.project_title').prop('style', 'contents');
                            $('.project_title').append(
                                '<i class="icon-bar-chart font-green-sharp hide"></i>' +
                                '<span class="caption-helper project_title" style="padding-left: 20px;font-size: 15px;">  ' + data[0].title + ' </span>' +
                                '<a type="button"  href="javascript:;view_project_details()"  class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;تفاصيل المشروع&nbsp;</a>'
                            );
                            $('.project_info').append(' <h3 class="todo-task-modal-bg ">' + data[0].title + '</h3>' +
                                ' <p class="todo-task-modal-bg "> ' + data[0].description + ' </p>');
                            $('.project_end_date').append(' <p class="todo-task-modal-title todo-inline ">موعد التسليم:' +
                                ' <input class="form-control input-inline input-medium date-picker todo-task-due todo-inline " size="16" type="text" value=" ' + data[0].edate + ' " readonly>' +
                                '</p>');
                        }


                        $("#range_2").ionRangeSlider({
                            grid: true,
                            min: 0,
                            max: 100,
                            step: 10,
                            onStart: function (data) {
                                // fired then range slider is ready
                            },
                            onChange: function (data) {
                                // fired on every range slider update
                            },
                            onFinish: function (data) {
                                // fired on pointer release
                                rangeProjectChangeSave();
                            },
                            onUpdate: function (data) {
                                // fired on changing slider with Update method
                            }
                        });



                        $('#project_status_select').attr('selected', 'selected').val(data[0].status);


                        @if(isset($_GET['calid']) && isset($_GET['calpid']))
                        show_task_info({{$_GET['calid']}});
                        @else
                        if(first_task_in_list>0) show_task_info(first_task_in_list);//$('#id_pk').val()
                        @endif

                    }
                });
            }


        }

        function rangeProjectChangeSave() {
                            //alert($("#range_1").val());
                            //var range=$("#range_1").val();
                            //console.log(parseInt(range)%10);
                            if (false) {

                            } else {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                })
                                //e.preventDefault();

                                var form = $("#edit_project_done_form")[0];

                                var formData = new FormData(form);

                                $.ajax({
                                    type: 'POST',
                                    dataType: "json",
                                    url: '{!! URL::asset("task/edit_done")!!}',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success:
                                        function (e) {
                                            form.reset();


                                            /*if (e['result'] == 'ok') {
                                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();


                                            } else if (e['result'] == 'error') {
                                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();
                                            } else {
                                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                            }*/


                                        },
                                    error: function (e) {

                                        $('#add_task_project_alert').show();
                                        $('#error').empty();

                                        var error = e.responseJSON;
                                        $.each(error, function (i, member) {
                                            for (var i in member) {
                                                $('#error').append('<li >' + member[i] + '</li>');
                                            }
                                        });

                                        jError("حدث خطأ فى عملية الاضافة", {
                                            TimeShown: 2000,
                                            HorizontalPosition: 'left'
                                        });
                                        $('#add_task_project_alert').hide();

                                    }
                                });

                            }

                        }

        function deleteProjectUser(id, assign_to) {


            $("#delete_project_user_form_" + assign_to).click(function (e) {


                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#delete_project_user_form')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/delete_project_user")!!}/' + id + '/' + assign_to,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (e) {

                            if (e['result'] == 'ok') {
                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                getProjectTasks(id);
                                $('#add_task_project_alert').hide();


                            } else if (e['result'] == 'error') {
                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                            } else {
                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                            }


                        },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }


            });

        }


    </script>


    <script type="text/javascript">

        function show_task_info(id) {
            $('#loading'+id).show();
            //alert(id);
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: '{!! URL::asset("task/view_task_info")!!}/' + id,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#loading'+id).hide();
                    $("#edit_task_user_form").find('#task_id').empty();
                    var user_access = $('#user_access').val();
                    var user_id = $('#user_id').val();
                    $('.task_title').html('');
                    $('.task_desc').html('');
                    $('.task_end_date').html('');
                    $('.create_user').html('');
                    $('.user_comment').html('');
                    $('.view_comments').html('');
                    $('.comment_form').html('');
                    $('.task_attach').html('');
                    $('.task_history').html('');
                    $('.comment_display').show();
                    $('.task_info_show').hide();
                    $('.nav nav-tabs').hide();

                    $('.task_info_show').show();
                    var editUser = "";
                    var createUser = "";
                    $(".task_info").show();
                    $("#edit_task_user_form").find('#task_id').val(id);

                    $.each(data, function (index, element) {

                        $('.task_title').append(

                            '<input type="text" value="' + element.title + '" class="form-control todo-taskbody-tasktitle " placeholder="Task Title..." readonly>' +
                            '</div>'
                        );
                        $('.task_desc').append(
                            ' <textarea  class="form-control todo-taskbody-taskdesc " rows="8" placeholder="Task Description..." readonly>' + element.description + '</textarea>');
                        $('.task_end_date').append(
                            ' <div class="col-md-12">' +
                            '  <div class="input-icon">' +
                            '<i class="fa fa-calendar"></i>' +
                            '<input value="' + element.edate + '" type="text" class="form-control todo-taskbody-due" placeholder="Due Date..." readonly>' +
                            '</div>');


                        $('#task_id').val(element.id_pk);
                        $.each(data[0].team, function (index, element) {
                            var status = data[0].status;
                            var priority = data[0].priority;
                            var color_status = "";
                            var color_priority = "";
                            switch (status) {
                                case '2':
                                    status = "جديد";
                                    color_status = "green";
                                    break;
                                case '3':
                                    status = "قيد الانتظار";
                                    color_status = "yellow";
                                    break;
                                case '4':
                                    status = "قيد العمل";
                                    color_status = "purple";
                                    break;
                                case '5':
                                    status = "منجز";
                                    color_status = "#008000";
                                    break;
                                case '6':
                                    status = "ملغي";
                                    color_status = "#FF0000";
                                    break;
                                case '7':
                                    status = "معتمد";
                                    color_status = "#008000";
                                    break;

                                default:
                                    status = "ايه يعني ايه";
                            }
                            var user_dep = "<?php echo Sentinel::getUser()->dep ?>";
                            var image = element.image;
                            if(image == 'not_found'|| image ==null){
                                image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                            }else {
                                image =   "user_image/"+element.image;

                            }
                if(data[0].create_dept == user_dep && data[0].p_id == -1){
                    $('.create_user').append(
                        '<a class="btn btn-circle grey-salsa btn-outline btn-sm  tasklist-attach ' + id + '"  href="javascript:;attach_file(' + id + ')" style="margin-right: 20px;background-color: aquamarine;">' +
                        '<i class="fa fa-file"></i> اضافة ملفات </a>' +
                        '<div class="col-md-8 col-sm-8">' +
                        '<img class="todo-userpic pull-left" src="{{url("/../../")}}/public_html/admin/'+image+'" width="50px" height="50px">' +
                        '<span class="todo-username pull-left">' + element.full_name + '</span>' +
                        '</div>' +
                        '</div>'

                    );

                }  else if (user_access == 2 && user_id != element.assign_to) {
                    $('.create_user').append(
                        '<a class="btn btn-circle grey-salsa btn-outline btn-sm  tasklist-attach ' + id + '"  href="javascript:;attach_file(' + id + ')" style="margin-right: 20px;background-color: aquamarine;">' +
                        '<i class="fa fa-file"></i> اضافة ملفات </a>' +
                        '<div class="col-md-8 col-sm-8">' +
                        '<img class="todo-userpic pull-left" src="{{url("/../../")}}/public_html/admin/'+image+'" width="50px" height="50px">' +
                        '<span class="todo-username pull-left">' + element.full_name + '</span>' +
                        '</div>' +
                        '</div>'
                    );
                        }else if(user_access == 2 && user_id == element.assign_to){
                    var image = element.image;
                    if(image == 'not_found' || image ==null){
                        image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                    }else {
                        image =   "user_image/"+element.image;

                    }
                    $('.create_user').append(
                        '<a class="btn btn-circle grey-salsa btn-outline btn-sm  tasklist-attach ' + id + '"  href="javascript:;attach_file(' + id + ')" style="margin-right: 20px; background-color: aquamarine;">' +
                        '<i class="fa fa-file"></i> اضافة ملفات </a>' +
                        '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_done_form" enctype="multipart/form-data" >' +
                        '{{ csrf_field() }}' +
                        '<input type="hidden" name="task_id" id="task_id" value="' + id + '">' +
                        '<div class="form-group" style="direction:ltr"><div class="col-md-12" id="done_bar"><h3 style ="text-align: center;">نسبة الانجاز</h3><input id="range_1" name = "done"  type="text" value="' + data[0].done + '" /></div></div>' +
                        '</form>' +
                        '<div class="col-md-8 col-sm-8">' +
                        '<img class="todo-userpic pull-left" src="{{url("/../../")}}/public_html/admin/'+image+'" width="50px" height="50px">' +
                        '<span class="todo-username pull-left">' + element.full_name + '</span>' +
                        '<button type="submit" class="todo-username-btn btn btn-circle btn-default btn-sm"  id="task_button" onclick="edit_task_user_modal()">&nbsp;تعديل&nbsp;</button>' +
                        '</div>' +
                        '</div>' +

                        '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_status" enctype="multipart/form-data" >' +
                        '{{ csrf_field() }}' +
                        '<div class="col-md-4 col-sm-4 pull-right">' +
                        '<div class="status_type">' +
                        '<label for="user" style="font-size: 15px" class="status_label"> الحالة:<span style="color: ' + color_status + ' ">' + status + '</span></label><br>' +
                        '</div">' +
                        '<input type="hidden" name="task_id" id="task_id" value="' + id + '">' +

                        '<select name="status_id" id="status_select"   class="form-control" tabindex="-1" aria-hidden="true" onclick="edit_status()">' +
                        '<option value=""  disabled >نغيير الحالة</option>' +
                        '<option value="2" >جديد</option>' +
                        '<option value="3">قيد الانتظار</option>' +
                        '<option value="4" >قيد العمل</option>' +
                        '<option value="5" >منجز</option>' +
                        '<option value="6">ملغي</option>' +
                        '</select>' +
                        '</div>' +
                        '</form>'
                    );
                }else if(user_access == 1){
                    var image = element.image;
                    if(image == 'not_found' || image ==null){
                        image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                    }else {
                        image =   "user_image/"+element.image;

                    }
                    $('.create_user').append(
                        '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "confirm_status_form' + element.id_pk + '" enctype="multipart/form-data" >' +
                        '{{ csrf_field() }}' +
                        '<input type="hidden" id = "task_id" name="task_id" value="'+ element.id_pk +'" >' +
                        '<button class="btn btn-circle grey-salsa btn-outline btn-sm tasklist' + id + '"  style="margin-right: 20px;float: left;background-color: chartreuse;">' +
                        ' <i class="fa fa-check" onclick = "confirm_status('+id+');">اكتمال</i> </button>' +
                        '</form>' +
                        '<a class="btn btn-circle grey-salsa btn-outline btn-sm  tasklist-attach ' + id + '"  href="javascript:;attach_file(' + id + ')" style="margin-right: 20px;background-color: aquamarine;">' +
                        '<i class="fa fa-file"></i> اضافة ملفات </a>' +
                        '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_done_form" enctype="multipart/form-data" >' +
                        '{{ csrf_field() }}' +
                        '<input type="hidden" name="task_id" id="task_id" value="' + id + '">' +
                        '<div class="form-group" style="direction:ltr"><div class="col-md-12" id="done_bar"><h3 style ="text-align: center;">نسبة الانجاز</h3><input id="range_1" name = "done"  type="text" value="' + data[0].done + '" /></div></div>' +
                        '</form>' +
                        '<div class="col-md-8 col-sm-8">' +
                        '<img class="todo-userpic pull-left" src="{{url("/../../")}}/public_html/admin/'+image+'" width="50px" height="50px">' +
                        '<span class="todo-username pull-left">' + element.full_name + '</span>' +
                        '<button type="submit" class="todo-username-btn btn btn-circle btn-default btn-sm"  id="task_button" onclick="edit_task_user_modal()">&nbsp;تعديل&nbsp;</button>' +
                        '</div>' +
                        '</div>' +

                        '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"  id = "edit_status" enctype="multipart/form-data" >' +
                        '{{ csrf_field() }}' +
                        '<div class="col-md-4 col-sm-4 pull-right">' +
                        '<div class="status_type">' +
                        '<label for="user" style="font-size: 15px" class="status_label"> الحالة:<span style="color: ' + color_status + ' ">' + status + '</span></label><br>' +
                        '</div">' +
                        '<input type="hidden" name="task_id" id="task_id" value="' + id + '">' +

                        '<select name="status_id" id="status_select"   class="form-control" tabindex="-1" aria-hidden="true" onclick="edit_status()">' +
                        '<option value=""  disabled >نغيير الحالة</option>' +
                        '<option value="2" >جديد</option>' +
                        '<option value="3">قيد الانتظار</option>' +
                        '<option value="4" >قيد العمل</option>' +
                        '<option value="5" >منجز</option>' +
                        '<option value="6">ملغي</option>' +
                        '</select>' +
                        '</div>' +
                        '</form>'
                    );
                }

                        });

                        $('#status_select').attr('selected', 'selected').val(data[0].status);

                        $("#range_1").ionRangeSlider({
                            grid: true,
                            min: 0,
                            max: 100,
                            step: 10,
                            onStart: function (data) {
                                // fired then range slider is ready
                            },
                            onChange: function (data) {
                                // fired on every range slider update
                            },
                            onFinish: function (data) {
                                // fired on pointer release
                                rangeChangeSave();
                            },
                            onUpdate: function (data) {
                                // fired on changing slider with Update method
                            }
                        });

                        function rangeChangeSave() {
                            //alert($("#range_1").val());
                            //var range=$("#range_1").val();
                            //console.log(parseInt(range)%10);
                            if (false) {

                            } else {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                })
                                //e.preventDefault();

                                var form = $("#edit_done_form")[0];

                                var formData = new FormData(form);

                                $.ajax({
                                    type: 'POST',
                                    dataType: "json",
                                    url: '{!! URL::asset("task/edit_done")!!}',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success:
                                        function (e) {
                                            form.reset();

                                            //show_task_info($('#task_id').val());

                                            /*if (e['result'] == 'ok') {
                                                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();


                                            } else if (e['result'] == 'error') {
                                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                                $('#add_task_project_alert').hide();
                                            } else {
                                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                            }*/


                                        },
                                    error: function (e) {
                                        $('#loading'+id).hide();
                                        $('#add_task_project_alert').show();
                                        $('#error').empty();
                                        var error = e.responseJSON;
                                        $.each(error, function (i, member) {
                                            for (var i in member) {
                                                $('#error').append('<li >' + member[i] + '</li>');
                                            }
                                        });

                                        jError("حدث خطأ فى عملية الاضافة", {
                                            TimeShown: 2000,
                                            HorizontalPosition: 'left'
                                        });
                                        $('#loading'+id).hide();
                                        $('#add_task_project_alert').hide();
                                    }
                                });

                            }

                        }

                        $.each(data[0].teamHistory, function (index, element) {
                            $('.task_history').append('<li>' +
                                '<div class="todo-task-history-date">' + element.create_date + '</div>' +
                                '<div class="todo-task-history-desc"> <span>تم اضافة</span> ' + element.full_name + ' <span>للمهمة</span> <span>بواسطة -></span><span>' + element.edit_user + '</span></div>' +
                                '</li>');

                        });
                        $.each(data[0].attachments, function (index, element) {
                            var filleAttach = element.imgname;

                            var extension = filleAttach.substr((filleAttach.lastIndexOf('.') + 1));
                            var attachClass = "";
                            switch (extension) {
                                case 'jpg':
                                case 'png':
                                case 'gif':
                                    attachClass = "fa fa-file-image-o";
                                    break;
                                case 'zip':
                                case 'rar':
                                    attachClass = "fa fa-file-archive-o";
                                    break;
                                case 'pdf':
                                    attachClass = "fa fa-file-pdf-o";
                                    break;
                            }


                            $('.task_attach').append(
                                ' <div class="col-md-12 pull-left" style="font-size: 20px;;">' +
                                '<i class=" ' + attachClass + ' "><span> </span></i>' +
                                '<a style="margin-right: 10px; " href="{{url("")}}/task/items/show_image/'+element.arch_year+'/'+element.arch_month+'/'+element.imgname+'"  >' + element.title + '</a>' +

                                '</div>');
                        });

                        $.each(data[0].comments, function (index, comment_element) {

                            var replies = '';
                            $.each(comment_element.replies, function (reply_index, reply_element) {
                                var image = reply_element.image;
                                if(image == 'not_found'|| image ==null){
                                    image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                                }else {
                                    image =   "user_image/"+reply_element.image;

                                }
                                replies += '<div class="media reply_view">' +
                                    '<a class="pull-left" href="javascript:;">' +
                                    '   <img class="todo-userpic" src="{{url("../../")}}/public_html/admin/'+image+'" width="27px" height="27px"> </a>' +
                                    '<div class="media-body">' +
                                    ' <p class="todo-comment-head">' +
                                    '<span class="todo-comment-username">' + reply_element.full_name + '</span> &nbsp;&nbsp;' +
                                    ' <span class="todo-comment-date">' + reply_element.create_date + '</span>' +
                                    ' </p>' +
                                    ' <p class="todo-text-color">' + reply_element.comment_txt + ' </p>' +
                                    ' </div>' +
                                    '  </div>'
                            });
                            var image = comment_element.image;
                            if(image == 'not_found'|| image ==null){
                                image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                            }else {
                                image =   "user_image/"+comment_element.image;

                            }

                            $('.view_comments').append(
                                '<div class="form-group">' +
                                '<div class="col-md-12">' +
                                '<ul class="media-list">' +
                                '<li class="media">' +
                                '<a class="pull-left" href="javascript:;">' +
                                '<img class="todo-userpic" src="{{url("/../../")}}/public_html//admin/'+image+'" width="27px" height="27px"> </a>' +
                                '<div class="media-body todo-comment">' +
                                '<button  class="todo-comment-btn btn btn-circle btn-default btn-sm" id="add_reply" onclick="add_reply(' + comment_element.id_pk + ',' + comment_element.task_id + ')">' + '&nbsp; رد على التعليق &nbsp;</button>' +
                                '<p class="todo-comment-head">' +
                                '<span class="todo-comment-username">' + comment_element.full_name + '</span>' +
                                '<span class="todo-comment-date">&nbsp;' + comment_element.create_date + '</span>' +
                                '</p>' +
                                ' <p class="todo-text-color">' + comment_element.comment_txt + '</p>' +
                                '<form  class="form-horizontal" data-toggle="validator" role="form"  method="post"    id="add_reply_form_' + comment_element.id_pk + '" enctype="multipart/form-data" >' +
                                '{{ csrf_field() }}' +
                                '<div class="form-group " id="comment_' + comment_element.id_pk + '"> ' + replies + '  </div>' +
                                '</li>' +
                                ' </ul>' +
                                '</div>' +
                                '</form>'
                            );
                        });

                    });
                    var image = "<?php echo Sentinel::getUser()->image ?>";
                    if(image == 'not_found'|| image ==null){
                        image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                    }else {
                        image =   "user_image/"+image;

                    }
                    $('.comment_form').append(
                        '<input type="hidden" name="task_id" id="task_id" value="' + id + '">' +
                        ' <div class="col-md-12">' +
                        '<ul class="media-list">' +
                        '<li class="media">' +
                        '<a class="pull-left" href="javascript:;">' +
                        '<img class="todo-userpic" src="{{url("/../../")}}/public_html/admin/'+image+'" width="27px" height="27px"> </a>' +
                        '<div class="media-body">' +
                        '<textarea class="form-control todo-taskbody-taskdesc" name="comment_txt" rows="4" placeholder="اكتب تعليق ..."></textarea>' +
                        '</div>' +
                        '</li>' +
                        '</ul>' +
                        ' <button type="submit" class="pull-right btn btn-sm btn-circle green pull-left"> &nbsp; اضافة تعليق &nbsp; </button>' +
                        '</div>' +
                        '</form>'
                    );
                }
            });
        }


    </script>
    <script>
        $('#p_id').change(function () {


            var pid = $("#p_id").val();

            $.ajax({
                type: 'GET',
                dataType: "json",
                url: '{!! URL::asset("task/view_project_info")!!}/' + pid,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('.users').html('');

                    $.each(data[0].team, function (index, element) {
                        var task_id = element.id_pk;


                        $('.users').append('<option  value="' + element.assign_to + '">' + element.full_name + '</option>');


                    });


                }
            });

        });
    </script>
    <script type="text/javascript">
        function add_reply(id, task_id) {
            var image = "<?php echo Sentinel::getUser()->image ?>";
            if(image == 'not_found'|| image ==null){
                    image =  "assets/layouts/layout2/img/avatar3_small.jpg";
                }else {
                    image =   "user_image/"+image;

}
            $('#comment_' + id + '').append(
                ' <div class="col-md-12">' +
                '<input type="hidden"  name="p_id" value="' + id + '">' +
                '<input type="hidden"  name="task_id" id="task_id" value="' + task_id + '">' +

                '<ul class="media-list">' +
                '<li class="media">' +
                '<a class="pull-left" href="javascript:;">' +
                '<img class="todo-userpic" src="{{url("/../../")}}/public_html/admin/'+image+'" width="27px" height="27px"> </a>' +
                '<div class="media-body">' +
                '<textarea class="form-control todo-taskbody-taskdesc"  name="comment_txt" rows="4" placeholder="اكتب رد ..."></textarea>' +
                '</div>' +
                '</li>' +
                '</ul>' +
                ' <button type="submit" class="pull-right btn btn-sm btn-circle green" onclick="add_new_reply(' + id + ')"> &nbsp; اضافة رد  &nbsp; </button>' +
                '</div>' +
                '</div');


            $("#add_reply_form_" + id).on('submit', function (e) {
                $("#add_reply_form_" + id).hide();
                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $("#add_reply_form_" + id)[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/add_reply_data")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:
                            function (e) {

                                if (e['result'] == 'ok') {
                                    //alert('11');
                                    show_task_info($('#task_id').val());
                                    jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                    form.reset();


                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();

                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();

                                }


                            },
                        error: function (e) {
                            form.reset();

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();

                        }
                    });

                }

            });
        }

    </script>
    <script type="text/javascript">
        $("#add_comment_form").on('submit', function (e) {
            $('.comment_form').hide();
            if (e.isDefaultPrevented()) {

            } else {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                e.preventDefault();

                var form = $('#add_comment_form')[0];
                var formData = new FormData(form);

                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '{!! URL::asset("task/add_comment_data")!!}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:

                        function (e) {

                            if (e['result'] == 'ok') {

                                jSuccess(e['response'], {TimeShown: 1000, HorizontalPosition: 'left'});
                                form.reset();
//alert('22');
                                show_task_info($('#task_id').val());
                                $('#add_task_project_alert').hide();

                                $('.comment_form').show();

                            } else if (e['result'] == 'error') {
                                jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                                $('.comment_form').show();
                            } else {
                                jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                $('#add_task_project_alert').hide();
                                $('.comment_form').show();
                            }


                        },
                    error: function (e) {

                        $('#add_task_project_alert').show();
                        $('#error').empty();
                        var error = e.responseJSON;
                        $.each(error, function (i, member) {
                            for (var i in member) {
                                $('#error').append('<li >' + member[i] + '</li>');
                            }
                        });

                        jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                        $('#add_task_project_alert').hide();
                        $('.comment_form').show();
                    }
                });

            }

        });

    </script>
    <script>

        function edit_project_user() {

            $("#edit_project_user_form").on('submit', function (e) {
                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#edit_project_user_form')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/edit_project_user")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:
                            function (e) {

                                if (e['result'] == 'ok') {
                                    form.reset();

                                    getProjectTasks($('#id_pk_p_id').val());
                                    jSuccess(e['response'], {TimeShown: 500, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                    $('#edit_project_user_modal').modal('toggle');


                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                }


                            },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }


            });
        }

    </script>
    <script>

        function edit_task_user() {

            $("#edit_task_user_form").on('submit', function (e) {
                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#edit_task_user_form')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/edit_project_user")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:
                            function (e) {
                                if (e['result'] == 'ok') {
                                    form.reset();
//alert('33');
                                    show_task_info($('#task_id').val());
                                    jSuccess(e['response'], {TimeShown: 1000, HorizontalPosition: 'left'});
                                    edit_task_user_modal().hide();
                                    $('#add_task_project_alert').hide();


                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();

                                }


                            },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();

                        }
                    });

                }


            });
        }

    </script>
    <script>


        /*********************start attachment************************/
        function attach_file(id_pk) {
            $('#upload_attachment').modal('toggle');
            $('#upload_info').html('<div id="id_pk_attach" style="display:none" >' + id_pk + '</div>');
            display_images(id_pk);


        }


        function view_attache(id_pk) {

            $('#view_attachment').modal('toggle');
            $('#view_attachment_info').html('<div id="id_pk_attach1" style="display:none" >' + id_pk + '</div>');

            display_images(id_pk);

        }


        /////////////////////// ////////////////////////////////
        function display_images(id_pk) {
            var url1 = '{!! URL::asset("/task/items/display_task_images/'+id_pk+'") !!}';
            $('#id_pk_attach').text(id_pk);
            $('#id_pk_attach1').text(id_pk);

            $('#attache').empty();
            $('#attache1').empty();

            $.get(url1, function (e) {
                displayAttachuser(e);

                displatAttach(e);


                //  alert('5555');


//alert('6666');
            });


        }

        ///////////////////////////////add_images//////////////////////////
        $(document).ready(function () {
            @if(isset($_GET['calid']) && isset($_GET['calpid']))
            getProjectTasks({{$_GET['calpid']}});
            @endif
            $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
            var accept = ".pdf,.doc,.docx,.jpg,.png,.doc,.docx,.xls,xlsx";


            $(".dropzone").dropzone({
                url: '{!! URL::asset("/task/items/task_attachment") !!}',
                uploadMultiple: true,
                method: 'post',
                paramName: 'file',
                acceptedFiles: accept,

                sending: function (file, xhr, formData) {

                    formData.append('_token', "{!! csrf_token() !!}");
                    var id_pk = $('#id_pk_attach').text();


                    formData.append('id_pk', id_pk);


                },
                success: function (file, response) {

                    this.removeFile(file);
                },
                complete: function (file, response) {

                },
                queuecomplete: function (file, response) {

                    display_images($('#id_pk_attach').text());

                }


            });

            $('.fancybox-buttons').fancybox({
                openEffect: 'none',
                closeEffect: 'none',

                prevEffect: 'none',
                nextEffect: 'none',

                closeBtn: false,

                helpers: {
                    /*title : {
                      type : 'inside'
                    },*/
                    thumbs: {
                        width: 75,
                        height: 50
                    },
                    buttons: {}
                },

                afterLoad: function () {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });

        /****************end attachment********************** */
    </script>
    <script>


        function filterTaskByStatus() {
            var status_type_id = $('#task_status2').val();

            if (status_type_id == 2) {
                $('.task_item3').hide();
                $('.task_item4').hide();
                $('.task_item5').hide();
                $('.task_item6').hide();
                $('.task_item2').show();
                $('.task_item7').hide();

            } else {
                $('.task_item3').hide();
                $('.task_item4').hide();
                $('.task_item5').hide();
                $('.task_item6').hide();
                $('.task_item2').hide();
                $('.task_item7').hide();

            }
        }

        function filterTaskByStatusPending() {
            var status_type_id = $('#task_status3').val();

            if (status_type_id == 3) {
                $('.task_item3').show();
                $('.task_item4').hide();
                $('.task_item5').hide();
                $('.task_item6').hide();
                $('.task_item2').hide();
                $('.task_item7').hide();

            }
        }

        function filterTaskByStatusInprogress() {
            var status_type_id = $('#task_status4').val();

            if (status_type_id == 4) {
                $('.task_item3').hide();
                $('.task_item4').show();
                $('.task_item5').hide();
                $('.task_item6').hide();
                $('.task_item2').hide();
                $('.task_item7').hide();

            }
        }

        function filterTaskByStatusCompleted() {
            var status_type_id = $('#task_status5').val();

            if (status_type_id == 5) {
                $('.task_item3').hide();
                $('.task_item4').hide();
                $('.task_item5').show();
                $('.task_item6').hide();
                $('.task_item2').hide();
                $('.task_item7').hide();

            }
        }

        function filterTaskByStatusDue() {
            var status_type_id = $('#task_duetrue').val();
            if (status_type_id == 'true') {


                $('.task_item3').hide();
                $('.task_item4').hide();
                $('.task_item5').hide();
                $('.task_itemfalse').hide();
                $('.task_itemtrue').show();
                $('.task_item2').hide();
                $('.task_item7').hide();

            } else {

                $('.task_item3').show();
                $('.task_item4').show();
                $('.task_item5').show();
                $('.task_itemtrue').show();
                $('.task_item2').show();

            }

        }

        function filterProjectByStatus() {
            var status_type_id = $('#projects_status2').val();

            if (status_type_id == 2) {
                $('.projects_status_3').hide();
                $('.projects_status_4').hide();
                $('.projects_status_5').hide();
                $('.projects_status_6').hide();
                $('.projects_status_2').show();

            } else {
                $('.projects_status_3').show();
                $('.projects_status_4').show();
                $('.projects_status_5').show();
                $('.projects_status_6').show();
                $('.projects_status_2').show();
            }
        }

        function filterProjectByStatusPending() {
            var status_type_id = $('#projects_status3').val();

            if (status_type_id == 3) {
                $('.projects_status_3').show();
                $('.projects_status_4').hide();
                $('.projects_status_5').hide();
                $('.projects_status_6').hide();
                $('.projects_status_2').hide();

            } else {

                $('.projects_status_3').show();
                $('.projects_status_4').show();
                $('.projects_status_5').show();
                $('.projects_status_6').show();
                $('.projects_status_2').show();


            }
        }

        function filterProjectByStatusInprogress() {
            var status_type_id = $('#projects_status4').val();

            if (status_type_id == 4) {
                $('.projects_status_3').hide();
                $('.projects_status_4').show();
                $('.projects_status_5').hide();
                $('.projects_status_6').hide();
                $('.projects_status_2').hide();

            } else {

                $('.projects_status_3').show();
                $('.projects_status_4').show();
                $('.projects_status_5').show();
                $('.projects_status_6').show();
                $('.projects_status_2').show();


            }
        }

        function filterProjectByStatusCompleted() {
            var status_type_id = $('#projects_status5').val();

            if (status_type_id == 5) {
                $('.projects_status_3').hide();
                $('.projects_status_4').hide();
                $('.projects_status_5').show();
                $('.projects_status_6').hide();
                $('.projects_status_2').hide();

            } else {

                $('.projects_status_3').show();
                $('.projects_status_4').show();
                $('.projects_status_5').show();
                $('.projects_status_6').show();
                $('.projects_status_2').show();


            }
        }

        function filterProjectByStatusCanceled() {
            var status_type_id = $('#projects_status6').val();


            if (status_type_id == 6) {
                $('.projects_status_3').hide();
                $('.projects_status_4').hide();
                $('.projects_status_5').hide();
                $('.projects_status_6').show();
                $('.projects_status_2').hide();

            } else {
                $('.projects_status_3').show();
                $('.projects_status_4').show();
                $('.projects_status_5').show();
                $('.projects_status_6').show();
                $('.projects_status_2').show();


            }

        }

        function confirm_status(id) {

            $("#confirm_status_form" + id).on('click', function (e) {
                if (e.isDefaultPrevented()) {

                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    })
                    e.preventDefault();

                    var form = $('#confirm_status_form' + id)[0];
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{!! URL::asset("task/confirm_status")!!}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:

                            function (e) {
                                if (e['result'] == 'ok') {
                                    show_task_info(id);
                                    jSuccess(e['response'], {TimeShown: 1000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();

                                } else if (e['result'] == 'error') {
                                    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                } else {
                                    jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                                    $('#add_task_project_alert').hide();
                                }


                            },
                        error: function (e) {

                            $('#add_task_project_alert').show();
                            $('#error').empty();
                            var error = e.responseJSON;
                            $.each(error, function (i, member) {
                                for (var i in member) {
                                    $('#error').append('<li >' + member[i] + '</li>');
                                }
                            });

                            jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
                            $('#add_task_project_alert').hide();
                        }
                    });

                }


            });


        }


    </script>
    @include ("admin.upload_img");
    @include ("admin.upload_img_user");
    @include ("admin.upload_img");
    @include ("admin.upload_img_user");

    @include ("admin.upload_img");
    @include ("admin.upload_img_user");
@endsection
