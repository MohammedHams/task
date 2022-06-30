@extends('admin.layouts.backend')

@section('page_level_plugins_styles')
 <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_global_styles')
@endsection

@section('page_level_styles')
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<style type="text/css">
  
  div#sample_1_length.dataTables_length{
  float: right;
}
table td:last-child{
  text-align: center;
}
table td:last-child span{
  display: inline-block;
  width: 100%;
  text-align: center;
}
table td:last-child img{
  display: inline-block;
  width: 85px;
  height: 85px;
  border-radius: 50% !important;
  margin-bottom: 5px;
}
            .loading>i {
                display: none !important;
            }
            .loading.active>span {
                display: none !important;
            }
            .loading.active>i {
                display: inline-block !important;
            }
</style>

@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="">حركات  تسجيل  الدخول   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                             <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">حركات  الدخول  </span>
                                    </div>
                                </div>
                                    <div class="portlet-body">

                         <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">           
                                       
                                            <thead>
                                                <tr class="heading">
                                                  
                                                   
                                                    <th width="30%">  رقم  الجهاز  </th>
                                                     <th width="20%">التاريخ  </th>
                                                       <th width="20%">نشط منذ   </th>
                                                    <th width="10%">النوع</th>
                                                     <th width="10%">مدة   الجلسة  </th>
                                                 
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                               
                                            
                                            </tbody>
                                         
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
</div></div>



@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

 <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

@endsection


@section('page_level_scripts_js')
 
  <script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>

@endsection



@section('scripts')  
<script type="text/javascript">
$(document).ready( function() {
 show_data();

});
  function show_data(){
    $('#sample_1').DataTable({
      
        destroy: true,
        processing: true,
      serverSide: true,
      //stateSave: true,
     "pageLength": 10,
      ajax: '{{ url("/user/tracking_user_login") }}',
      columns: [
           
            {data: 'ip', name: 'ip', orderable: false, searchable: true},
            {data: 'created_at', name: 'created_at', orderable: false, searchable: false},
             {data: 'last_response', name: 'last_response', orderable: false, searchable: false},
            
            {data: 'login_or_logout', name: 'login_or_logout', orderable: false, searchable: false},
            {data: 'period', name: 'period', orderable: false, searchable: false},



       
           
        ]
  });

  }













  
</script>

@endsection                  

