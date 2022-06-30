@extends('admin.layouts.backend')
@section('title','الطلبيات   المصروفة   للدوائر')
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
    width: 90%;
   max-width:1200px;
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
@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')

@section('page_bar')
<li>
        <a href="#">طلبات قيد التدقيق</a>
        <i class="fa fa-angle-left"></i>
    </li>

@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('content')




<div class="row hide_on_print" >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> الطلبات   المصروفة   للدوائر   </span>
    
</div>


 <div class="actions">



 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick="help(49)"></i>

<?php  }  ?>
                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
     id="search">
   
   

       <div class="form-body ">
        <div  class="row">

             
  <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >رقم  الطلبية  </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="serial_num" id="serial_num"  placeholder=" رقم  الطلبية  " >
                   

                    </div>
                  </div> 

                 




        <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >سنه  الطلبية  </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="years" id="years"  placeholder="سنة  الطلبية  " >
                   

                    </div>
                  </div> 

         <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >الجهة  الطالبة  </label>
                     <div class="col-sm-8">

                      <select class="form-control select2" id="dept" name="dept">
                        <option value="">اختر   الجهة  الطالبة  </option>

                        @foreach($departments  as $department)

                    <option value="{{$department->id}}">{{$department->name}} </option>
                        @endforeach()


                        

                      </select>

                    
                   

                    </div>
                  </div>  


      
 <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >الصنف   </label>
                     <div class="col-sm-8">

                      <select class="form-control select2" id="item_id_pk_data" name="item_id_pk_data">
                        <option value=""> اختر   الصنف   </option>

                        @foreach($stock_item_mains  as $stock_item_main)

                    <option value="{{$stock_item_main->item_id_pk}}">{{$stock_item_main->item_name}} </option>
                        @endforeach()


                        

                      </select>

                    
                   

                    </div>
                  </div>  

      



                     <div class=" col-md-6 form-group">
       <label class="control-lable col-md-4 color-view bg-blue-dark bg-font-blue-dark
"         for="id_num" style="font-weight:bold;" >تاريخ   الطلب  </label>
       
       

        <div class="col-md-4">
           
                <input type="text"  class="form-control  date-picker " id="date1_from" name="date1_from" placeholder="من"  data-date-format="yyyy-mm-dd">
               
            </div>
       


       <div class="col-md-4">
       
       <input type="text"  class="form-control  date-picker " id="date1_to" name="date1_to" placeholder="الى"  data-date-format="yyyy-mm-dd">

            
       </div>


       
       </div>   



                      <div class=" col-md-6 form-group">
       <label class="control-lable col-md-4 color-view bg-blue-dark bg-font-blue-dark
"         for="id_num" style="font-weight:bold;" > تاريخ  الصرف   </label>
       
       

        <div class="col-md-4">
           
                <input type="text"  class="form-control  date-picker " id="date2_from" name="date2_from" placeholder="من"  data-date-format="yyyy-mm-dd">
               
            </div>
       


       <div class="col-md-4">
       
       <input type="text"  class="form-control  date-picker " id="date2_to" name="date2_to" placeholder="الى"  data-date-format="yyyy-mm-dd">

            
       </div>


       
       </div> 
  
        

<div class="col-md-offset-9 col-md-3">
                  
                    <button type="submit" id="save" class="btn green">بحث <i class="fa fa-search"></i></button>
                     <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style="display:none;width:30px;height:30px;" id="loading5">
                      <button type="button" class="btn  btn-info" id="print"><i class="fa fa-print"></i>طباعة  </button>

                 
                    
                </div>

        

        





        </div>
         
        </div>





        </form>

        </div>                               
                                   
                                 
                                   
</div> </div>


 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">

      <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                   
                     <th>رقم الطلبية</th>
                     <th>سنة   الطلبية  </th>
                     <th> القسم   </th>
                     <th>تاريخ   الطلب  </th>
                    <th>تاريخ   الصرف  </th>


                   
                     <th>اسم   الصنف   </th>
                      <th>نوع  الصنف  </th>
                      
                       <th> الوحدة    </th>
                        <th> تم  طلب   </th>
                          <th> تم  صرف   </th>
                      
                       
                    </tr>
                </thead>
                <tbody>        
                </tbody>
                <tfoot>
                 
                </tfoot>
            </table>

 </div></div></div>


 

<!--==============================================================================-->




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

@endsection


@section('page_level_scripts_js')
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
      <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
  @endsection

@section('theme_layout_scripts_js')
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
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

});
     $("#search").on('submit', function(e) {
        e.preventDefault();

show_data();



});

$( document ).ready(function() {
   show_data();

});
     


  
 
  function show_data(){
    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/stock_store/items/all_order_approved_vw_data") !!}',
            "data": function ( d ) {

               d.serial_num=$("#serial_num").val();
              d.years=$("#years").val();
              d.dept=$("#dept").val();
             
               d.date1_to=$("#date1_to").val();
               d.date1_from=$("#date1_from").val();

               d.date2_to=$("#date2_to").val();
               d.date2_from=$("#date2_from").val();
               d.item_id_pk=$("#item_id_pk_data").val();
              
          

             }
           },
       columns: [
           
               {data: 'serial_num', name: 'serial_num'},
               {data: 'years', name: 'years'},
               {data: 'name', name: 'name'},
               {data: 'date1_data', name: 'date1_data'},
               {data: 'date2_data', name: 'date2_data'},
               {data: 'item_name', name: 'item_name'},
               {data: 'class_name', name: 'class_name'},
               {data: 'unit_name', name: 'unit_name'},
               {data: 'need1', name: 'need1'},
               {data: 'given1', name: 'given1'},
                  

                 
                 
             
             
                 ]


    });
  }





function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}



$("#print").click(function(){



var url1='{!! URL::asset("/stock_store/items/departments_report") !!}';

var ser=$('#search').serialize();

   window.location.href = url1+"?"+ser;








});



  </script>

@endsection






