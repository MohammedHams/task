@extends('admin.layouts.backend')
@section('title',' اللجان   ')
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
       <link href="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_global_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_level_styles')
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
<link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5"  media="screen">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" href="{{url('/')}}/css/style.css">
<style type="text/css">
.page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {
    min-height: 78px;
    display: block;
    position: relative;
    margin: 0;
    border: 0;
    padding: 17px 15px 15px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 300;
    text-align: center;
}
    
     div#sample_1_length.dataTables_length{
  float: right;
}


.color-view {
    padding: 7px;
    text-align: center !important;
}

.bg-blue-dark {
    background: #442850!important;
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
    width: 90%;
   max-width:1200px;
  }
}

table.table-bordered.dataTable td {
    border-left-width: 0;
    font-size: 11px;
}

.table .btn {
    margin-top: 0;
    margin-right: 0;
    margin-left: 3px;
    font-size: 10px;
}

.label {
    text-shadow: none!important;
    font-size: 12px;
    font-weight: 300;
    padding: 3px 6px;
    color: #fff;
}
</style>


@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="#">اضافة لجنه   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


 
  <div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة لجنه   </span>
  
</div>


        
    </div>
 </div></div>







<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> اللجان   </span>
   
</div>


 <div class="actions">

  <a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" onclick="add_pla_committees()"><i class="fa fa-plus"></i>  اضافة اللجنه      </a>


 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick=""></i>

<?php  }  ?>
             

                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">

            

          

      




<div class="col-md-offset-9 col-md-3">
                  
                    <button type="submit" id="save" class="btn btn-lg green">بحث <i class="fa fa-search"></i></button>
                     <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style="display:none;width:30px;height:30px;" id="loading5">
                    
                </div>


        </div>
         
        </div>

        </form>

        </div>                               
                                   
</div> </div>





   <div class="row " >
<div class="portlet light borderd">
    <div class="portlet-title">
<div class="caption">
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> اللجان     </span>

</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="pla_committees_vw">
                <thead>
                  <tr>
                    <th>اسم اللجنه </th>
                 
                    <th>اضافة الاعضاء </th>
                    <th> تعديل اللجنه </th>
                   
                  
                         
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 





<div class="modal fade in" id="add_pla_committees_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee">




        <div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase">  اللجان  </span>
    <br>
 <i class="fa fa-info font-red-thunderbird"></i>

 
     
</div>


        
    </div>

<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                
    <form  class="form-horizontal"  method="post"   id="add_pla_committees_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_pla_committees_alert" style="display:none" >
                        <ul id="add_pla_committees_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


           <div class="form-group col-sm-6  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> اسم اللجنه  <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">

                    <input type="hidden" name="commit_id_in" id="commit_id_in">

                  



                    <input id="commit_name_in"  name="commit_name_in" class="form-control  " >
                    

                   
                  </div>
                    
                    </div>
                
            </div>



         

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">

              
                   

                   <span id="add_pla_committees_button"><button  type="submit" class="btn green" id="add_item"><i class="fa fa-plus"></i> اضافة  </button> </span>
                

    
                    
                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >

                    <button type="button" class=" btn red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                    <i class="fa fa-close"></i> اغلاق</span></button>

                  
                    
                 
                </div>
                 <div class=" col-md-6">  </div>
            </div></div>
        

        </div></div></div>
    </form>
    <!-- END FORM-->
</div> </div></div>




  <!--===========================================================-->
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                       
                        </div>
                    </div>
                </div>
         




 <!--======================================================-->
  <div class="modal fade" id="add_pla_committees_members_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee" >



         <div class="row " >
<div class="portlet light borderd">
    <div class="portlet-title">
<div class="caption">
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird">  أعضاء اللجنه   </span>

</div>
 
</div>
<div class="portlet-body borderd">



<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="add_pla_committees_members_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_pla_committees_members_alert" style="display:none" >
                        <ul id="add_pla_committees_members_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">

      <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> العضو  <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">


  <select id="user_id_in"  name="user_id_in" class="form-control select2 " >
                      <option value=""> العضو    </option>

                        @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->full_name}}</option>

                      @endforeach

                   

                   
                    </select>

                   
                  </div>
                    
                    </div>
                
            </div>








           <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> نوع العضو <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">




                  


  <select id="member_type_in"  name="member_type_in" class="form-control select2 " >
                      <option value=""> نوع العضو   </option>

                        @foreach($member_types as $member_type)
                      <option value="{{$member_type->status_id}}">{{$member_type->status_name}}</option>

                      @endforeach

                   

                   
                    </select>

                   
                  </div>
                    
                    </div>
                
            </div>
            
            

            <input type="hidden" class="form-control "   id="add_pla_committees_members_com_id_in" name="add_pla_committees_members_com_id_in"  >
            <input type="hidden" class="form-control "   id="add_pla_committees_members_commit_id_in" name="add_pla_committees_members_commit_id_in"  >
         

              



           
            <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> نوع العضو <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">


  <select id="member_status_in"  name="member_status_in" class="form-control select2 " >
                      <option value=""> حالة العضو   </option>

                        @foreach($member_status as $member_statu)
                      <option value="{{$member_statu->status_id}}">{{$member_statu->status_name}}</option>

                      @endforeach

                   

                   
                    </select>

                   
                  </div>
                    
                    </div>
                
            </div>




           



             

         
			
		

    

          
    <!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
               

                  <span id="add_pla_committees_members_button">
                   

                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة   </button> </span> 


                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >

                    <button type="button" class=" btn red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                    <i class="fa fa-close"></i> اغلاق</span></button>
                    
                 
               
                 <div class=" col-md-6">  </div>
            </div>
        

        </div></div></div></div>
    </form>
    <!-- END FORM-->
</div>


</div></div></div> 

<!--==============================================================-->
<div class="portlet light bordered">
<div class="row">
<div class="col-md-12">
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">بينات    الطلبية  </span>
        </div>
        <hr>
        <div class="tools"> </div>
    <!--==========================================================-->  
       <div class="table-scrollable">
        


          <table class="table table-striped table-bordered table-hover" id="pla_committees_members_vw">
        <thead>
               <tr>
               <th> اللجنه </th>
               <th>  الموظف      </th>
                <th>نوع الموظف  </th>
                <th> حالة الموظف  </th>
                <th>تعديل البيانات  </th>
            
             
              
                
               </tr>

          
        </thead>
         <tbody id="item_data"></tbody>
     <tfoot>
       

        </tfoot>
</table>

</div>  

    <!--===========================================================-->
      </div></div></div></div> 


<!--=====================================================-->



  
  
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>








 





<div class="modal fade " id="help_modal" role="dialog" >
    <div class="modal-dialog" style="width:1100px">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تعليمات  </h4>
        </div>
      
        <div class="modal-body">
 
 
   
        
      
 <div class="col-sm-12">

  <div class="portlet light borderd">

 
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

<div class="mt-comment">
                                                        <div class="mt-comment-img">
                                                           <i class="fa fa-question-circle fa-2x"></i> </div>
                                                        <div class="mt-comment-body">
                                                            <div class="mt-comment-info">
                                                                <span class="mt-comment-author" id="screen_name"></span>
                                                             
                                                            </div>
                                                            <div class="mt-comment-text" id="description"> </div>
                                                           
                                                        </div>
                                                    </div>
   
 



</div></div></div></div></div></div>
        <div class="modal-footer">
        
          
        </div>
     
      </div>
      
    </div>
  </div>








 


<meta name="_token" content="{!! csrf_token() !!}" />


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
             <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

               <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
@endsection


@section('page_level_scripts_js')
 
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
      <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

    <script src="{{url('/')}}/admin/assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
     <script src="{{url('/')}}/admin/assets/pages/scripts/components-typeahead.min.js" type="text/javascript"></script>
@endsection



@section('scripts')  


<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>


<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">



   $(document).ready(function () {
		
    pla_committees_vw();
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


       pla_committees_vw();
});


});  


/******************************** */

function add_pla_committees(){

$("#add_pla_committees_modal").modal("toggle");

$('#add_pla_committees_form')[0].reset();
$("#add_pla_committees_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
 $("#add_pla_committees_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
$("#add_pla_committees_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button>');


}
/************************** */





$("#add_pla_committees_form").on('submit', function(e) {


   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/committees/add_pla_committees") !!}',
      data:new FormData($("#add_pla_committees_form")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
             $('#loading1').hide();
               $('#add').show();
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#add_pla_committees_alert').hide();
                  $('#add_pla_committees_form')[0].reset();

                  $("#add_pla_committees_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#add_pla_committees_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
                  
             
                 
					
                   $('#add_pla_committees_modal').modal("toggle");

                   $("#add_pla_committees_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button>');

                 


                   pla_committees_vw();
			
               
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_pla_committees_alert').hide();
                    swal(
                          'تنبية',
                             e['response'],
                              'error',);
                   
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                  
            }
       
        
            },
            error: function(e) 
            {
                 $('#loading1').hide();
               $('#add').show();
              $('#add_pla_committees_alert').show();
              $('#add_pla_committees_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#add_pla_committees_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 


/******************************************* */
function pla_committees_vw(){
 
 $('#pla_committees_vw').DataTable({
   destroy: true,
   processing: true,
   serverSide: true,
  "pageLength": 10,
  "autoWidth": false,
  "info": false,
 "searching": false,
 "ordering": false,
"fnDrawCallback": function(settings, json) {

// $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
$("#save").attr("disabled",false);
$("#loading5").hide();

// if(temp_inv_id_pk>0)	$('#add_purchasing_item_'+temp_inv_id_pk).trigger('click');

//	temp_inv_id_pk  =0;  

},
   "ajax": {
         "url": '{!! URL::asset("/stock_store/committees/pla_committees_vw_data") !!}',
         "data": function ( d ) {


        
         

        
       
         }
         },

  
   columns: [

   

   {data: 'commit_name', name: 'commit_name',width:"10%"},

   {data: 'add_pla_committees_members', name: 'add_pla_committees_members',width:"15%"},
         
   {data: 'edit_pla_committees', name: 'edit_pla_committees',width:"5%"},
           

 
               
              
               ]


 });
}



/****************************************************************** */

function add_pla_committees_members(commit_id){


$("#add_pla_committees_members_modal").modal("toggle");
 $('#add_pla_committees_members_form')[0].reset();
 $("#add_pla_committees_members_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
 $("#add_pla_committees_members_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
 $("#member_type_in").val('').trigger('change');
$('#member_status_in').val('').trigger('change');
$('#user_id_in').val('').trigger('change');


$("#add_pla_committees_members_button").html('<button  type="submit" class="btn green" ><i class="fa fa-plus"></i> اضافة  </button>');

$("#add_pla_committees_members_commit_id_in").val(commit_id);

pla_committees_members_vw(commit_id);

//stock_invoice_in_vw_one_data(inv_id_pk);

}



/************************************** */
$("#add_pla_committees_members_form").on('submit', function(e) {


if (e.isDefaultPrevented()) {

    
 } else {

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     })




e.preventDefault(); 

 $.ajax({
   url:'{!! URL::asset("/stock_store/committees/add_pla_committees_members") !!}',
   data:new FormData($("#add_pla_committees_members_form")[0]),
   dataType:'json',
   async:false,
   type:'POST',
   processData: false,
   contentType: false,
   success:function(e) {
         
          $('#loading1').hide();
            $('#add').show();
      
            
         if (e['result'] == 'ok') {
             jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
              $('#add_pla_committees_members_alert').hide();

              $("#add_pla_committees_members_button").html('<button  type="submit" class="btn green" ><i class="fa fa-plus"></i> اضافة  </button>');

              $('#add_pla_committees_members_form')[0].reset();
              $("#add_pla_committees_members_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
              $("#add_pla_committees_members_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
              $("#member_type_in").val('').trigger('change');
              $('#member_status_in').val('').trigger('change');
              $('#user_id_in').val('').trigger('change');


              pla_committees_members_vw(e['commit_id_in']);
              $("#add_pla_committees_members_commit_id_in").val(e['commit_id_in']);

           
                
         }

        else if (e['result'] == 'error')
         {
               jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                $('#add_pla_committees_members_alert').hide();
                swal(
                       'تنبية',
                          e['response'],
                           'error',);
                
         }


         else
         {
               jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
               
         }
    
     
         },
         error: function(e) 
         {
              $('#loading1').hide();
            $('#add').show();
           $('#add_pla_committees_members_alert').show();
           $('#add_pla_committees_members_error').empty();
           var error = e.responseJSON;
           $.each(error, function (i, member) {
           for (var i in member) {
           $('#add_pla_committees_members_error').append('<li >'+ member[i] +'</li>' );
          }
        });

          jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
         }           
  });

}
         
     }); 




/****************************************** */






function pla_committees_members_vw(commit_id){
 
    $('#pla_committees_members_vw').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "autoWidth": false,
     "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

  // $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();

  },
      "ajax": {
            "url": '{!! URL::asset("/stock_store/committees/pla_committees_members_vw/'+commit_id+'") !!}',
            "data": function ( d ) {

            }
            },
   
     
      columns: [

  


                 {data: 'commit_name', name: 'commit_name',width:"10%"},

                 {data: 'member_name', name: 'member_name',width:"10%"},
                
                {data: 'member_type_name', name: 'member_type_name',width:"15%"},
                {data: 'member_status_name', name: 'member_status_name',width:"15%"},
                {data: 'edit_committees_member', name: 'edit_committees_member',width:"5%"},
                
              

              
               
                  ]


    });
  }










function pla_committees_vw_data_one_data(commit_id){

   var url2='{!! URL::asset("/stock_store/committees/pla_committees_vw_data_one_data/'+commit_id+'") !!}'; 
   $.get(url2,{ }, function (ec) {


    $("#pla_committees_vw_data_one_data").html(ec[0]['commit_name']+")");
    

  })



}





/****************************************/

function edit_pla_committees(commit_id){
  
$("#add_pla_committees_modal").modal("toggle");

$("#commit_id_in").val(commit_id);

$("#add_pla_committees_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-edit"></i> تعديل  </button>');

var url2='{!! URL::asset("/stock_store/committees/pla_committees_vw_data_one_data/'+commit_id+'") !!}'; 

$.get(url2,{ }, function (ec) {

$("#commit_name_in").val(ec[0]['commit_name']);



})




}




/************************************** */
function edit_committees_member(com_id,commit_id){
 // $("#add_purchasing_item_modal").modal("toggle");
  $("#add_pla_committees_members_commit_id_in").val(commit_id);
  $("#add_pla_committees_members_com_id_in").val(com_id);

$("#add_pla_committees_members_button").html('<button  type="submit" class="btn green" ><i class="fa fa-edit"></i> تعديل  </button>');

var url2='{!! URL::asset("/stock_store/committees/pla_committees_members_vw_one_date/'+com_id+'") !!}'; 
$.get(url2,{ }, function (ec) {


$("#member_type_in").val(ec[0]['member_type']).trigger('change');
$("#member_status_in").val(ec[0]['member_status']).trigger('change');
$("#user_id_in").val(ec[0]['user_id']).trigger('change');




})


}


/************************************* */


/**************************************** */

function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}





</script>

@include ("admin.upload_img");
@include ("admin.upload_img_user");


@endsection                  

