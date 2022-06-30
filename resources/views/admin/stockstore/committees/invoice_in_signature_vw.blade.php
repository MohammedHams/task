@extends('admin.layouts.backend')
@section('title',' مرسل الى اللجنه   ')
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
    <span class="caption-subject font-red-thunderbird bold uppercase"> مرسل الى اللجنه   </span>
  
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

  <!--<a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" ><i class="fa fa-plus"></i>  مرسل الى اللجنه  </a>-->


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
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> مرسل الى اللجنه     </span>

</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="invoice_in_signature_vw">
                <thead>
                  <tr>
                    <th>رقم الطلبية</th>
                    <th> الفاتورة </th>
                    <th> اسم المورد </th>
                    <th> العناصر </th>
                 
                    <th>السعر الكلى </th>
                    <th>العملة </th>
                    <th>الموافقة على الطلبية </th>
                    <th>رفض الطلبية </th>
                   
                  
                         
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 



<!--===========================================================-->




<div class="modal fade in" id="add_item_data"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
    <span class="caption-subject font-red-thunderbird bold uppercase">  بيانات طلبية الادخال   </span>
    <br>
 <i class="fa fa-info font-red-thunderbird"></i>
      <span class="caption-subject font-red-thunderbird bold uppercase" id="stock_invoice_in_vw_one_data"></span>
</div>


        
    </div>

<div class="portlet-body form">
                                                <!-- BEGIN FORM-->

    <!-- END FORM-->
</div> </div></div>



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
        


          <table class="table table-striped table-bordered table-hover" id="stock_invoice_in_item_vw">
        <thead>
               <tr>
               <th>رقم  الصنف  </th>
               <th>اسم   الصنف   </th>
                <th>مطلوب  </th>
                <th>مدخل  </th>
                <th>السعر  </th>
                <th>العملة  </th>
             
             
              
                
               </tr>

          
        </thead>
         <tbody id="item_data"></tbody>
     <tfoot>
       

        </tfoot>
</table>

</div>  

    <!--===========================================================-->
      </div></div></div></div> 
  <!--===========================================================-->
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                           <button type="button" class="btn btn-default" data-dismiss="modal">
                   تم
                </button>
                        </div>
                    </div>
                </div>
            </div>










 


<!--==========================================================-->


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
		
    invoice_in_signature_vw();
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


       invoice_in_signature_vw();
});


});  



/******************************************* */
function invoice_in_signature_vw(){
 
 $('#invoice_in_signature_vw').DataTable({
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
         "url": '{!! URL::asset("/stock_store/committees/invoice_in_signature_vw_data") !!}',
         "data": function ( d ) {
           d.serial=$("#serial").val();
           d.year1=$("#year1").val();

      }
         },

  
   columns: [

   

   {data: 'serial_year1', name: 'serial_year1',width:"10%"},

   {data: 'order_no', name: 'order_no',width:"15%"},
         
   {data: 'side_name', name: 'side_name',width:"5%"},
   {data: 'add_item_data', name: 'add_item_data',width:"5%"},  
   {data: 'tottal_price', name: 'tottal_price',width:"5%"},  
   {data: 'cur_name', name: 'cur_name',width:"5%"},      
   {data: 'add_member_sign_approve', name: 'add_member_sign_approve',width:"5%"},  
   {data: 'add_member_sign_reject', name: 'add_member_sign_reject',width:"5%"},  

 
   
              
               ]


 });
}


/******************************** */
function add_member_sign_reject(sign_id,sign_flag){


if(confirm(" هل  انت متأكد   من  رفض مواصفات الطلبية ?"))
   {

  var url2='{!! URL::asset("/stock_store/committees/add_member_sign/'+sign_id+'/'+sign_flag+'") !!}'; 
  $.get(url2,{ }, function (ec) {

if(ec['result'] =='ok') {

   swal( 'تنبية', ec['response'], 'success',);

   invoice_in_signature_vw( );

   

}else{

swal( 'تنبية', ec['response'], 'error',);

}
                           


   

 })



}else{



}


}


/********************************* */
function add_member_sign_approve(sign_id,sign_flag){


if(confirm(" هل  انت متأكد   من  مواصفات الطلبية ?"))
   {

  var url2='{!! URL::asset("/stock_store/committees/add_member_sign/'+sign_id+'/'+sign_flag+'") !!}'; 
  $.get(url2,{ }, function (ec) {

if(ec['result'] =='ok') {

   swal( 'تنبية', ec['response'], 'success',);

   invoice_in_signature_vw( );

   

}else{

swal( 'تنبية', ec['response'], 'error',);

}
                           


   

 })



}else{



}


}



/******************************** */
function stock_invoice_in_item_vw(inv_id_pk){
 
 $('#stock_invoice_in_item_vw').DataTable({
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
         "url": '{!! URL::asset("/stock_store/committees/stock_invoice_in_item_vw/'+inv_id_pk+'") !!}',
         "data": function ( d ) {

         }
         },

  
   columns: [

   

              {data: 'item_id_pk', name: 'item_id_pk',width:"10%"},

              {data: 'item_name', name: 'item_name',width:"10%"},
             
             {data: 'count1', name: 'count1',width:"15%"},
             {data: 'count2', name: 'count2',width:"15%"},
             {data: 'price', name: 'price',width:"5%"},
             
              {data: 'cur_name', name: 'cur_name',width:"5%"},
            
            
               ]


 });
}




/**************************************** */

function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}

/********************************** */

function add_item_data(inv_id_pk){


$("#add_item_data").modal("toggle");



stock_invoice_in_item_vw(inv_id_pk);



}




</script>

@include ("admin.upload_img");
@include ("admin.upload_img_user");


@endsection                  

