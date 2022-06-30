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

@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="{{url('/notification')}}">عرض الاشعارات</a>
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
                                        <span class="caption-subject font-dark sbold uppercase">عرض الاشعارات</span>
                                    </div>
                                  </div>
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">           
                                      <thead>
                                        <tr class="heading">
                                          <th> عنوان الاشعر</th>
                                          <th> تفاصيل الاشعار</th>
                                          <th> الرابط </th>
                                          <th>تعديل</th>
                                        </tr> 
                                        <tr> 
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                        </tr> 
                                      </thead>
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
     "pageLength": 10,
      ajax: '{!! URL::asset("/notification_list") !!}',
      columns: [
           
            {data: 'n_title', name: 'n_title', orderable: false, searchable: true},
            {data: 'n_details', name: 'n_details', orderable: false, searchable: true},
            { data: 'n_url', name: 'n_url', orderable: false, searchable: false },
            { data: 'edit', name: 'edit', orderable: false, searchable: false }
           
        ],initComplete: function () {  
             this.api().columns([0,1,2]).every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).addClass("form-control");
                $(input).addClass("input-small");
                $(input).appendTo($(column.header()).empty())
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            }); 


          }












    });
  }
</script>

@endsection                  

