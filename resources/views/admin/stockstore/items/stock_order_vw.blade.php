@extends('admin.layouts.backend')
@section('title','الطلبات  ')
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


@section('content')




<div class="row hide_on_print" >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> الطلبات   </span>
    
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
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > الموظف   طالب الطلبية   </label>
                     <div class="col-sm-8">

                      <select class="form-control select2" id="order_user_id" name="order_user_id">
                        <option value="">اختر   الجهة  الطالبة  </option>

                        @foreach($users  as $user)

                    <option value="{{$user->id}}">{{$user->full_name}} </option>
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



         <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > رقم  الفاتورة  </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="inv_serial" id="inv_serial"  placeholder=" رقم  الفاتورة  " >
                   

                    </div>
                  </div> 

                 




        <div class="col-sm-6 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >سنة  الفاتورة   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="inv_year" id="inv_year"  placeholder=" سنة  الفاتورة   " >
                   

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


 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">

      <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                   
                     <th>رقم الطلبية</th>
                     <th>الجهة الطالبة</th>
                     <th>بواسطة  </th>
                     <th>تاريخ   الطلب  </th>
                    <th>تاريخ   الصرف  </th>


                   
                     <th> حفظ اصناف وادخال للمخزن</th>
                     <th>موافقة على الصرف</th>
                      <th>طباعة   الطلبية </th>
                       <th>الفاتورة  </th>
                       <th>طباعة  فاتورة    </th>
                        <th> الغاء طلبية   </th>
                      
                       
                    </tr>
                </thead>
                <tbody>        
                </tbody>
                <tfoot>
                 
                </tfoot>
            </table>

 </div></div></div>

<!--============================================================================-->
<div class="modal fade in" id="to_check_ungiven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee">


<form id="accepted_item" role="form" method="post" data-toggle="validator">
  <div class="alert alert-danger" id="alert_add" style="display:none">
                        <ul id="error_add"> 
                        </ul>
                        </div>
  <!--==========================================================-->
      <div class="portlet light bordered">
<div class="row">
<div class="col-md-12">
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">تفاصيل الطلبية </span>
        </div>
        <hr>
        <div class="tools"> </div>
    <!--==========================================================-->  
       <div class="table-scrollable">
        
<input type="hidden" id="ordernum" >
  <table class="table table-hover">
        <thead>
               <tr>
               <th>رقم الصنف</th>
               <th>تفاصيل الصنف</th>
                <th>التصنيف</th>
                <th>الوحدة</th>
               
                <th>المطلوب</th>

                <th>المراد صرفه</th>
              
                <th>المتوفر  </th>
              
                
               </tr>

          
        </thead>
         <tbody id="item_data"></tbody>
     <tfoot >
    
        </tfoot>
</table>

</div>  

    <!--===========================================================-->
      </div></div></div></div> 
<div class="col-md-offset-6 col-md-6">
      <span id="print_report_data"></span>

    <!--==================صلاحية اعتماد طلبية الصرف============-->
<?php  

$user_test=Sentinel::getUser();
if($user_test->hasAccess('store.storekeeper.update_order') ){

?>

      <button type="submit" class="btn btn-info">حفظ     </button>

   <?php }  ?>   

<!--==================================-->

    </div>

    </form>
  <!--===========================================================-->
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>
 

<!--==============================================================================-->


 <div class="modal fade" id="stock_out_invoice_item_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird">العناصر   </span>

</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="stock_invoice_out_item_vw">
                <thead>
                  <tr>
                    <th>رقم  الصنف   </th>
                    <th>اسم  الصنف  </th>
                    <th>مطلوب   </th>
                    <th>مصروف  </th>
                   
                  
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 


  
  
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
    var id="{{  Route::current()->getParameter('id') }}";
   if(id != ''){
    edit_orders (id);
   // alert("hi");

   } else {

   }
});
     
//alert(id);

  
 
  function show_data(){
 

    var id = {{ request()->status_flag }}

    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/stock_store/items/stock_order_data/'+id+'") !!}',
            "data": function ( d ) {

               d.serial_num=$("#serial_num").val();
              d.years=$("#years").val();
              d.dept=$("#dept").val();
              d.order_user_id=$("#order_user_id").val();
               d.date1_to=$("#date1_to").val();
               d.date1_from=$("#date1_from").val();

               d.date2_to=$("#date2_to").val();
               d.date2_from=$("#date2_from").val();

               d.inv_serial=$("#inv_serial").val();

                d.inv_year=$("#inv_year").val();
              
              
          

             }
           },
       columns: [
           
               {data: 'order_num', name: 'order_num'},
               {data: 'department', name: 'department'},
               {data: 'users_added', name: 'users_added'},
               {data: 'date1_data', name: 'date1_data'},
               {data: 'date2_data', name: 'date2_data'},
                
              
                {data: 'edit', name: 'edit'},
                {data: 'update_order_status', name: 'update_order_status'},
                
                  {data: 'print_report', name: 'print_report'},
                 {data: 'stock_out_invoice_item_data', name: 'stock_out_invoice_item_data'},
                   {data: 'invoice_report', name: 'invoice_report'},
                     {data: 'cancel_order', name: 'cancel_order'},

                 
                 
             
             
                 ]


    });
  }


//////////////////////////////////////////////////////
function edit_orders (ungiven_list_id){
  $('#to_check_ungiven').modal('toggle');
   $('#ordernum').val(ungiven_list_id);
   display_item(ungiven_list_id);


  //alert(ungiven_list_id);
}

function manager_show_orders(ungiven_list_id){
  $('#to_check_ungiven').modal('toggle');
   $('#ordernum').val(ungiven_list_id);


   var url1='{!! URL::asset("/stock_store/ungiven_order_item_data/'+ungiven_list_id+'") !!}';


$.get(url1, function (e) {
$('#item_data').empty();
$('#print_report_data').empty();
 $.each(e, function(k, v) { 
 
 ////////////////////////////////////////////////////
 if(v['status_flag']==2){
 $('#item_data').append('<tr> <input type="hidden" name="itemId[]" class="itemId" value="'+v['id1']+'"><td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td><td>'+v['need1']+'</td> <td><input type="text" class="form-control input-xsmall num" name="num[]" value="'+v['given1']+'" ></td>  <td style="color:red">'+v['item_count']+'</td></tr>');
 
 }else{
  $('#item_data').append('<tr> <input type="hidden" name="itemId[]" class="itemId" value="'+v['id1']+'"><td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td><td>'+v['need1']+'</td> <td><input type="text" class="form-control input-xsmall num" name="num[]" value="'+v['need1']+'" ></td>  <td style="color:red">'+v['item_count']+'</td></tr>');


 }

 /////////////////////////////////////////////////  

 
     }); 


});



}

/////////////////////////////
function display_item(ungiven_list_id){
 
var url1='{!! URL::asset("/stock_store/ungiven_order_item_data/'+ungiven_list_id+'") !!}';


$.get(url1, function (e) {
$('#item_data').empty();
$('#print_report_data').empty();
 $.each(e, function(k, v) { 

 // alert(e['status_flag']);
 
 ////////////////////////////////////////////////////
 if(v['status_flag']==2){
  $('#item_data').append('<tr> <input type="hidden" name="itemId[]" class="itemId" value="'+v['id1']+'"><td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td><td>'+v['need1']+'</td> <td><input type="text" class="form-control input-xsmall num" name="num[]" value="'+v['given1']+'" ></td>  <td style="color:red">'+v['item_count']+'</td></tr>');

 }else{
  $('#item_data').append('<tr> <input type="hidden" name="itemId[]" class="itemId" value="'+v['id1']+'"><td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td><td>'+v['need1']+'</td> <td><input type="text" class="form-control input-xsmall num" name="num[]" value="'+v['need1']+'" ></td>  <td style="color:red">'+v['item_count']+'</td></tr>');


 }
 


 /////////////////////////////////////////////////  

 
     }); 
$("#print_report_data").append("<a href='{!! URL::asset('/stock_store/order_report/"+ungiven_list_id+"') !!}'  target='_blank' class='btn btn-danger'><i class='fa fa-print'></i> طباعة  طلبية  </a>")

});

}

///////////////////////////////////////////////////

$(document).ready(function (e) {
   
   // alert(ordernum);
$("#accepted_item").validator().on('submit', function(e) {
   var ordernum = $("#ordernum").val();
//alert(ordernum);
   if (e.isDefaultPrevented()) {
       
    } else {
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  var url2='{!! URL::asset("/stock_store/update_order/'+ordernum+'") !!}';
  e.preventDefault(); 
    $.ajax({
     url: url2,
      data:new FormData($("#accepted_item")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
               //  $('#to_check_ungiven').modal('toggle');

              var ungiven_list_id=e['inv_id_pk'];

                show_data();
                 $('#alert_add').hide();
                 if (ungiven_list_id == null){
                   
                 }else
                
                 {
   $("#print_report_data").append("<a href='{!! URL::asset('/stock_store/invoice_report/"+ungiven_list_id+"') !!}'  target='_blank' class='btn btn-warning'><i class='fa fa-print'></i> طباعة  فاتورة   </a>");

                 }
               // 
                
                  
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#alert_add').hide();

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
                
              $('#alert_add').show();
              $('#error_add').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error_add').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });
            }
        }); 
  });







function stock_invoice_out_item_vw(inv_id_pk){
 
    $('#stock_invoice_out_item_vw').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
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
            "url": '{!! URL::asset("/stock_store/items/stock_invoice_out_item_vw/'+inv_id_pk+'") !!}',
            "data": function ( d ) {

           
          
            }
            },
   
     
      columns: [
                 {data: 'item_id_pk', name: 'item_id_pk',width:"10%"},
                {data: 'item_name', name: 'item_name',width:"15%"},
                {data: 'count1', name: 'count1',width:"15%"},
                {data: 'count2', name: 'count2',width:"5%"},
                 
              
                 
          
                
                
                 

                
                
              

       
        ]


    });
  }




  function stock_out_invoice_item_data(inv_id_pk){

$("#stock_out_invoice_item_modal").modal("toggle");

$("#inv_id_pk_in").val(inv_id_pk);
stock_invoice_out_item_vw(inv_id_pk);

}




function cancel_order(id_in){



 if(confirm(" هل  انت  متأكد   من الغاء الطلبية  ?"))
    {


      
   var url2='{!! URL::asset("/stock_store/items/cancel_order/'+id_in+'") !!}'; 
   $.get(url2,{ }, function (ec) {


if(ec["result"] =="ok"){

  show_data();

   swal(
        'تنبية',
           ec['response'],
            'success',);


}else{

      swal(
        'تنبية',
           ec['response'],
            'error',);
}
   
    

  })



    }
    else
    {
       // e.preventDefault();
    }





}




function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}




/********************* */
function update_order_status(order_num){



if(confirm("هل انت متأكد من الموافقة على صرف ال الاصناف   ?"))
   {


     
  var url2='{!! URL::asset("/stock_store/items/update_order_status/'+order_num+'") !!}'; 
  $.get(url2,{ }, function (ec) {


if(ec["result"] =="ok"){

  show_data();

  swal(
       'تنبية',
          ec['response'],
           'success',);


}else{

     swal(
       'تنبية',
          ec['response'],
           'error',);
}
  
   

 })



   }
   else
   {
      // e.preventDefault();
   }





}

  </script>

@endsection






