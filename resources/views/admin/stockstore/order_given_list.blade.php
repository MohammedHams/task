@extends('admin.layouts.backend')
@section('title','الطلبات المحفوظة')
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
@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid  page-sidebar-closed')

@section('page_bar')
<li>
        <a href="#">الطلبات المحفوظة</a>
        <i class="fa fa-angle-left"></i>
    </li>

@endsection


@section('content')

<div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">
<form class="form-horizontal" role="form" method="post" data-toggle="validator"   id="search"  enctype="multipart/form-data"
>
 <div class="caption">
          
            <h3 class="caption-subject bold uppercase">  <i class="fa fa-user"></i>الطلبات المحفوظة</h3>
        </div> 
        <hr>



<div class="form-group col-md-12">

      
       <div class=" col-md-4">
       <label class="control-lable col-md-3" for="appType">الأقسام</label>
       <div class="col-md-9">
        <select class="form-control" name="department" id="department">
          <option value="">إختر القسم</option>
       @foreach ($departments as $department)
          <option value="{{$department->id}}" >{{$department->name}}</option>
       @endforeach
       </select>
       
       </div>
</div>

<div class=" col-md-8">
  <label class="control-lable col-md-2" for="#">رقم الطلبية</label>
      
       <div class="col-md-2"> <input type="text" placeholder="السنة" name="years" class="form-control input-xsmall" id="years"></div>
       <div class="col-md-2"><input type="text" name="id" class="form-control input-xsmall" id="id"></div>
       <div class="col-md-2"><input type="text" name="date1" class="form-control  date-picker " id="date1" ></div>


 <div class="col-md-4"></div>
 </div>

  

</div>






<div class="form-group col-md-12">

<button type="submit" class="btn green" style="float:left"> <i class="fa fa-search"></i> بحث </button>
</div>


</form>

 </div></div></div>

 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">

      <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                   
                     <th>رقم الطلبية</th>
                     <th>تاريخ الطلبية</th>
                     <th>تاريخ الصرف</th>
                     <th>طباعة</th>
                       
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
            "url": '{!! URL::asset("/stock_store/given_order_data") !!}',
            "data": function ( d ) {
            d.department=$('#department').val();
            d.years=$('#years').val();
            d.id=$('#id').val();
            d.date1=$('#date1').val();

             }
           },
       columns: [
           
               {data: 'order_num', name: 'order_num'},
               {data: 'date1', name: 'date1',orderable: true, searchable: false},
               {data: 'date2', name: 'date2',orderable: true, searchable: false},
                {data: 'print_order', name: 'print_order'},
             
                 ]


    });
  }



  </script>






@endsection






