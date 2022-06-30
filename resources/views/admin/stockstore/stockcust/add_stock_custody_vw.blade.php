@extends('admin.layouts.backend')
@section('title','اضافة   العهد  ')
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

</style>


@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')
<li>
        <a href="#">اضافة  الاصناف   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


 







<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> العهد   </span>
   
</div>


 <div class="actions">


 
<a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" onclick="add_custody_data()"><i class="fa fa-plus"></i> اضافة  العهد     </a>




 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick="help(50)"></i>

<?php  }  ?>
                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">

            

          


        <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >اختر الصنف  </label>
                     <div class="col-sm-8">

                      <select id="item_id_pk"  name="item_id_pk" class="form-control select2 " >
                      <option value="">اختر الصنف   الاساسى  </option>

                        @foreach($stock_item_mains as $stock_item_main)
                      <option value="{{$stock_item_main->item_id_pk}}">{{$stock_item_main->item_name}}</option>

                      @endforeach

                   

                   
                    </select>
                   

                    </div>
                  </div> 


   <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم   الموظف   </label>
                <div class="col-md-8">
                    <select id="emp_id"  name="emp_id" class="form-control select2 " >
                      <option value="">اسم   الموظف  </option>

                        @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->full_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>




                      <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم   الدائرة   </label>
                <div class="col-md-8">
                    <select id="dept_id"  name="dept_id" class="form-control select2 " >
                      <option value="">اسم   الدائرة  </option>

                        @foreach($departments as $department)
                      <option value="{{$department->id}}">{{$department->name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>


                <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> رقم   الكود  </label>
                <div class="col-md-8">
                    <input id="item_code"  name="item_code" class="form-control" >
                    
                    </div>
                
            </div>



                  <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> رقم  الفاتورة  </label>
                <div class="col-md-8">
                    <input id="order_no"  name="order_no" class="form-control" >
                    
                    </div>
                
            </div>

             


       <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">حركة   </label>
                <div class="col-md-8">
                    <select id="trans_types"  name="trans_types" class="form-control  " >
                      <option value="">نوع   الحركة  </option>

                        @foreach($trans_types as $trans_type)
                      <option value="{{$trans_type->status_id}}">{{$trans_type->status_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>
      




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


</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">





          <table class="table table-striped table-bordered table-hover" id="cust_vw_data">
                <thead>
                  <tr>
                      <th>رقم  الفاتورة  </th>
                        <th> الصنف   </th>
                        <th>كود  العنصر  </th>
                        <th>نوع  الحركة </th>
                        <th>تاريخ   الحركة  </th>
                        <th>الموظف</th>
                        <th>القسم  </th>
                        <th> الملاحظات   </th>
                         <th> تعديل   الملاحظات   </th>
                         <!-- <th> حذف    العهدة   </th>-->




                  
                   
                    
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 









 <div class="modal fade" id="add_custody_data_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> اضافة   عهد   </span>

</div>
 
</div>
<div class="portlet-body borderd">


<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="add_custody_data_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_custody_data_alert" style="display:none" >
                        <ul id="add_custody_data_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">



        <div class="form-group col-sm-6 type">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">حركة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="trans_types_in"  name="trans_types_in" class="form-control  " >
                      <option value="">نوع   الحركة  </option>

                        @foreach($trans_types as $trans_type)
                      <option value="{{$trans_type->status_id}}">{{$trans_type->status_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>
        



           <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> اختر   الصنف   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                     <select id="item_id_pk_in"  name="item_id_pk_in" class="form-control select2 " >
                      <option value="">اختر الصنف   الاساسى  </option>

                        @foreach($stock_item_mains as $stock_item_main)
                      <option value="{{$stock_item_main->item_id_pk}}">{{$stock_item_main->item_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    
                    </div>
                
            </div>



            <div class="form-group col-sm-6 emp_id_in">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم   الموظف   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="emp_id_in"  name="emp_id_in" class="form-control select2 " >
                      <option value="">اسم   الموظف  </option>

                        @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->full_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>


                <div class="form-group col-sm-6 dept_id_in">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم   الدائرة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="dept_id_in"  name="dept_id_in" class="form-control select2 " >
                      <option value="">اسم   الدائرة  </option>

                        @foreach($departments as $department)
                      <option value="{{$department->id}}">{{$department->name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>



       




         

      

            

              



                <div class="form-group col-sm-6  item_code_in ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">كود  الصنف    <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="كود  الصنف   " id="item_code_in" name="item_code_in"   >
                    </div>
                
            </div>



              <div class="form-group col-sm-6  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> تاريخ   الحركة    <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control  date-picker" placeholder="تاريخ  الحركة   " id="custody_receiving_date_in" name="custody_receiving_date_in"  data-date-format="dd/mm/yyyy" >
                    </div>
                
            </div>



         
            
             <div class="form-group col-sm-6 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الملاحظات   </label>
                <div class="col-md-8">
                 <input type="text" class="form-control" placeholder="الملاحظات  " id="note_in" name="note_in" >
                    
                    </div>
                
            </div>


    

					
		<!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button><img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >
                <!--   <a href='{!! URL::asset("/")!!}' class="btn red"> <i class="fa fa-close"></i> اغلاق  </a>-->
                    
                 
                </div>
                 <div class=" col-md-6">  </div>
            </div>
        

        </div></div></div>
    </form>
    <!-- END FORM-->
</div>


</div></div></div> 


  
  
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>






<!--========================================================================-->



<!--=====================================================================-->



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

    cust_vw_data(0);
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


cust_vw_data(0);
});


});  






$("#add_custody_data_form").on('submit', function(e) {
 
 
   // $('#loading1').show();
    //$('#add').hide();
   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/custody/add_stock_cust") !!}',
      data:new FormData($("#add_custody_data_form")[0]),
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
                 $('#add_custody_data_alert').hide();
                  $('#add_custody_data_form')[0].reset();
                  $("#add_custody_data_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#add_custody_data_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
                  $( ".select2" ).val('').trigger('change');

               //   $(".select2").select2("val", "");

                     $("#add_custody_data_modal").modal("toggle");
                  cust_vw_data(0);
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_custody_data_alert').hide();
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
              $('#add_custody_data_alert').show();
              $('#add_custody_data_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#add_custody_data_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 






function cust_vw_data(inv_id_pk){
 
    $('#cust_vw_data').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 25,
     "autoWidth": false,
     "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

   $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();

  },
      "ajax": {
            "url": '{!! URL::asset("/stock_store/custody/cust_vw_data") !!}',
            "data": function ( d ) {
   
               d.item_id_pk=$("#item_id_pk").val();
               d.emp_id=$("#emp_id").val();
               d.dept_id=$("#dept_id").val();
               d.item_code=$("#item_code").val();
               d.inv_type=$("#inv_type").val();
               d.trans_type=$("#trans_type").val();
               d.order_no=$("#order_no").val();
          
            }
            },
   
     
      columns: [
                {data: 'order_no', name: 'order_no'},
                {data: 'item_name', name: 'item_name'},
                {data: 'item_code', name: 'item_code'},
                {data: 'trans_name', name: 'trans_name'},
                {data: 'custody_date', name: 'custody_date'},
                {data: 'emp_name', name: 'emp_name'},
                {data: 'side_name', name: 'side_name'},
                {data: 'note', name: 'note'},
                {data: 'update_stock_cust', name: 'update_stock_cust'},
            //    {data: 'delete_stock_cust', name: 'delete_stock_cust'},
                  
         
        ]


    });
  }






 
function add_custody_data(){

$("#add_custody_data_modal").modal("toggle");
trans_types_in_change();
 //$('#add_custody_data_form')[0].reset();
 $("#item_code_in").val('');
 $("#item_id_pk_edit").val('');

$( "#item_id_pk_in" ).val('').trigger('change');
 //$('#item_id_pk_in').select2('destroy');
//$(".select2").val("");

}









function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}




function trans_types_in_change(){

    if($("#trans_types_in").val()==968){

      $(".emp_id_in").hide();
      $(".dept_id_in").hide();
      $(".item_code_in").hide();
   
    

  }else if($("#trans_types_in").val()==969){
     $(".emp_id_in").show();
      $(".dept_id_in").show();
      $(".item_code_in").show();


  }

  else if($("#trans_types_in").val()==970){
     $(".emp_id_in").hide();
      $(".dept_id_in").hide();
      $(".item_code_in").show();


  }else{
   $(".emp_id_in").hide();
      $(".dept_id_in").hide();
      $(".item_code_in").hide();

  }





}


$("#trans_types_in").change(function(){

trans_types_in_change();

})







function delete_stock_cust(cust_id){
  var url2='{!! URL::asset("/stock_store/custody/delete_stock_cust/'+cust_id+'") !!}';

   $.get(url2,{ }, function (ec) {
  cust_vw_data();

   })


}



 $('#item_code_in').keyup(function(e) {
   var item_code_in =$('#item_code_in').val();

   var url1='{!! URL::asset("/stock_store/custody/select_item_note/'+item_code_in+'") !!}';


$.get(url1, function (e) {

  $("#note_in").val(e[0]['note']);

 
  $('#item_id_pk_in').val(e[0]['item_id_pk']).trigger('change');



})



   })


</script>

@include("admin.stockstore.stockcust.update_stock_cust");

@endsection                  

