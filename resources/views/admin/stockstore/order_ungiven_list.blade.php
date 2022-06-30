@extends('admin.layouts.backend')
@section('title','طلبات قيد التدقيق')
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


 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">

      <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                   
                     <th>رقم الطلبية</th>
                     <th>الجهة الطالبة</th>
                     <th>بواسطة</th>
                     <th>تاريخ الطلبية</th>
                    <th>العمليات</th>
                    <th>طباعة</th>
                       
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
                <th>المتوفر  </th>
                <th>المطلوب</th>
                <th>المصروف</th>
             
              
                
               </tr>

          
        </thead>
         <tbody id="item_data"></tbody>
     <tfoot id="print_report_data">
    
        </tfoot>
</table>

</div>  

    <!--===========================================================-->
      </div></div></div></div> <input type="submit" value="حفظ" class="btn btn_info"></form>
  <!--===========================================================-->
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>
 

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
 

@endsection


@section('page_level_scripts_js')
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
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
    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/stock_store/ungiven_order_data") !!}',
            "data": function ( d ) {
          

             }
           },
       columns: [
           
               {data: 'order_num', name: 'order_num'},
               {data: 'department', name: 'department'},
               {data: 'users', name: 'users'},
                {data: 'date1', name: 'date1'},
                {data: 'edit', name: 'edit'},
                {data: 'print_report', name: 'print_report'},
             
             
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

/////////////////////////////
function display_item(ungiven_list_id){
 
var url1='{!! URL::asset("/stock_store/ungiven_order_item/'+ungiven_list_id+'") !!}';


$.get(url1, function (e) {
$('#item_data').empty();
$('#print_report_data').empty();
 $.each(e, function(k, v) { 
 
 ////////////////////////////////////////////////////
 $('#item_data').append('<tr> <input type="hidden" name="itemId[]" class="itemId" value="'+v['id1']+'"><td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td><td style="color:red">'+v['item_count']+'</td> <td>'+v['need1']+'</td> <td><input type="text" class="form-control input-xsmall num" name="num[]" value="'+v['need1']+'" ></td> </tr>');
 


 /////////////////////////////////////////////////  

 
     }); 
$("#print_report_data").append("<a href='{!! URL::asset('/stock_store/order_report/"+ungiven_list_id+"') !!}'  targe='_balnk' class='btn btn_info'><i class='fa fa-print'></i></a>")

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
                 $('#to_check_ungiven').modal('toggle');
                show_data();
                 $('#alert_add').hide();
                
                  
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





  </script>

@endsection






