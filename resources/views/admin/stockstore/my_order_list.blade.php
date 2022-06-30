@extends('admin.layouts.backend')
@section('title','أرشيف الطلبات')
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
        <a href="#">أرشيف الطلبات</a>
        <i class="fa fa-angle-left"></i>
    </li>

@endsection


@section('content')





<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> طلباتى   </span>
   
</div>


 <div class="actions">

                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">

            

          


        <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >رقم   الطلبية   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="serial_num" id="serial_num"   >
                   

                    </div>
                  </div> 



     <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > السنه   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="years" id="years"  placeholder=" السنه   " >
                   

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
                     <th>تاريخ الطلبية</th>
                     <th>الحالة</th>
               
                       
                    </tr>
                </thead>
                <tbody>        
                </tbody>
                <tfoot>
                 
                </tfoot>
            </table>

 </div></div></div>



 

<!--==============================================================================-->
<div class="modal fade in" id="item_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee">



      <div class="portlet light bordered">
<div class="row">
<div class="col-md-12">
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">بيانات الطلبية</span>
        </div>
        <hr>
        <div class="tools"> </div>
    <!--==========================================================-->  
       <div class="table-scrollable">
        

  <table class="table table-hover">
        <thead>
               <tr>
               <th>رقم الصنف</th>
               <th>تفاصيل الصنف</th>
                <th>التصنيف</th>
                <th>الوحدة</th>
                <th>المطلوب</th>
                <th>المصروف</th>
             
              
                
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

  show_data();
  function show_data(){
    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/stock_store/my_order_data") !!}',
            "data": function ( d ) {
            d.serial_num=$('#serial_num').val();
            d.years=$('#years').val();
          

             }
           },
       columns: [
           
               {data: 'order_num', name: 'order_num'},
               {data: 'date2', name: 'date2'},
               {data: 'order_status', name: 'order_status'},
              
             
                 ]


    });
  }

//////////////////////////////////////////////
$( document ).ready(function() {
   show_data();
    var id="{{  Route::current()->getParameter('order_id') }}";
   if(id != ''){
    my_item (id);
   // alert("hi");

   } else {

   }
});

//////////////////////////////////////////////
function my_item(order_num){

$('#item_order').modal('toggle');
display_item(order_num);
}


function display_item(ungiven_list_id){
 
var url1='{!! URL::asset("/stock_store/ungiven_order_item/'+ungiven_list_id+'") !!}';


$.get(url1, function (e) {
$('#item_data').empty();
 $.each(e, function(k, v) { 




 ////////////////////////////////////////////////////
 $('#item_data').append('<tr> <td>'+v['item_id_pk']+'</td> <td>'+v['item_name']+'</td> <td>'+v['class_name']+' </td> <td>'+v['item_unit']+'</td> <td>'+v['need1']+'</td> <td>'+v['given1']+'</td> </tr>');
 


 /////////////////////////////////////////////////  

 
     }); });

}

  </script>






@endsection






