@extends('admin.layouts.backend')
@section('title','شاشة   الرئيس  ')
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


.table tbody tr td {
    font-size: 12px;
   }

</style>


@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')
@section('page_bar')
<li>
        <a href="#">شاشة   الرئيس</a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')

<div class="row " >
<div class="portlet light ">

    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
     <span class="caption-subject bold uppercase font-red-thunderbird">معاملات  الاستقبال   </span></div>

 
<div class="actions">
  <i class="fa fa-question-circle fa-2x font-red-thunderbird" style="color:#5e738b" onclick="help(4)"></i>                                  
 </div></div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">


        <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >رقم المعاملة</label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="app_no" id="app_no"  placeholder="رقم المعاملة " >
                   

                    </div>
                  </div> 

         <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >سنة المعاملة</label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="app_year" id="app_year"  placeholder="سنة المعاملة" >
                   

                    </div>
                  </div>  


             <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >الاسم</label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="full_name" id="full_name"  placeholder="الاسم" >
                   

                    </div>
                  </div>         


           <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >رقم الهوية</label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="id_num" id="id_num"  placeholder="رقم الهوية" >
                   

                    </div>
                  </div>  


            <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >الموضوع</label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="subject" id="subject"  placeholder="الموضوع" >
                   

                    </div>
                  </div> 



            <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >سير  المعاملة </label>
                     <div class="col-sm-8">

                    <select id="status_app" name="status_app" class="form-control">
                         <option value="">اختر  سير  المعاملة  </option>
                        @foreach ($status as $statu)
                        <option value="{{$statu->status_id}}">{{$statu->status_name}}</option>

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


<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-red-thunderbird">
                                            <i class="icon-settings font-red-thunderbird"></i>
                                            <span class="caption-subject bold uppercase">المعاملات</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th width="5%">رقم المعاملة </th>
                                                    <th width="5%"> سنه  المعاملة </th>
                                                    <th width="20%">الاسم</th>

                                                    <th width="5%"> رقم الهوية </th>
                                                    <th width="25%"> الموضوع </th>
                                                     <th width="5%">الحالة </th>
                                                     <th width="17%"> سير   المعاملة </th>

                                                    
                                                     <th width="15%">للتحكم</th>
                                                     <th width="5%">ارسال  للأرشيف </th>
                                                     <th width="3%">أضافة مرفقات </th>
                                                     <th width="3%">عرض  المرفقات   </th>
													  <th width="3%">بيانات المعاملة  </th>
                                                      <th width="3%">انجاز  معاملات  </th>
                                                      <th width="3%">طلب  الملف  </th>
                                                     
                                                    
                                                    
                                                </tr>

                                               
                                            </thead>
                                            <tbody>
                                              
                                               
                                             
                                             

                                                   
                                            </tbody>
                                            <tfoot>
                                            
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
</div></div>



 <div class="modal fade" id="attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
      </div>
                        <div class="modal-body">

 <table class="table table-striped table-bordered table-hover" >
        <thead>
               <tr>
                <th>المرفقات</th>
                <th>الاسم</th>
                <th>تحميل</th>
               </tr>

          
        </thead>
         <tbody id="attach">
        </tbody >



 

         <tfoot>
        </tfoot>
</table>

      
                        </div>
                        <div class="modal-footer">


                           
                           
                        </div>
                    </div>
                </div>
            </div>






<div class="modal fade" id="view_excuted_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " >
    <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-info"></i>
                                        <span class="caption-subject font-dark bold uppercase" id="#" >تفاصيل المعاملة </span>
                                    </div>
                                  
                                </div>
                               
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                            
                                                 <tbody>
                                                <tr>
                                                    <td >رقم المعاملة</td>
                                                    <td id="serial_excuted">  </td>
                                                    <td>سنة المعاملة </td>
                                                    <td id="app_year_excuted"> </td>
                                                   
                                                </tr>
                                               
                                                <tr>
                                                    <td>الاسم  </td>
                                                    <td id="full_name_excuted"> </td>
                                                    <td> رقم  الهوية  </td>
                                                    <td id="identity_num_excuted">  </td>
                                                    
                                                </tr>
                                               



                                                
                                            </tbody>
                                        </table>
                                    </div>
   
    
   
 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">
   <div class="caption">
           <h6 class="caption-subject bold uppercase">  <i class="fa fa-info"></i>القطع  والقسائم  </h6>
    </div>

      <table class="table table-striped table-bordered table-hover" >
                <thead>
                   

                     <tr>
                   
                     <th>القطعة </th>
                     <th>القسيمة </th>
                     <th>المربع  </th>
                     <th>المقسم  </th>
                     <th>المساحة </th>
                   
                    
                    </tr>
                </thead>
                <tbody id="application_all_vw2">
                  
                   
                 
                 

                       
                </tbody >
                <tfoot>
                 
                </tfoot>
            </table>

 </div></div></div>

 <div class="portlet light bordered"  >                 
 <div class="row">
 <div class="col-md-12">
   <div class="caption">
           <h6 class="caption-subject bold uppercase">  <i class="fa fa-info"></i> خط سير المعاملة </h6>
    </div>

      <table class="table table-striped table-bordered table-hover" >
                <thead>
                   

                     <tr>
                   
                     <th>اسم الحالة </th>
                     <th>تاريخ الحالة </th>
                     <th>الفترة الزمنية</th>
                     <th>المستخدم</th>
                   
                    
                    </tr>
                </thead>
                <tbody id="app_transaction_vw">
                  
                   
                 
                 

                       
                </tbody >
                <tfoot>
                 
                </tfoot>
            </table>

 </div></div></div>
                                                

                  
                       
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

@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

 <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

 <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>


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
 <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
   <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
@endsection



@section('scripts')  
<script src="{{url('/')}}/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/js/buttons.flash.min.js"></script>
<script src="{{url('/')}}/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/js/buttons.print.min.js"></script>
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css"></script>-->
<script src="{{url('/')}}/js/jszip.min.js"></script>
<script src="{{url('/')}}/js/pdfmake.min.js"></script>
<script src="{{url('/')}}/js/pdfmake.min.js"></script>
<script src="{{url('/')}}/js/vfs_fonts.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>


<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">

       var delete_url = '{!! URL::asset("/gov/gov_main/delete_by_name_gov_main_transaction") !!}'+'/';
  var show_url = '{!! URL::asset("/gov/gov_main/show_image") !!}'+'/';
  var thumbnail_url='{!! URL::asset("/gov/gov_main/show_thumb_app_master_attachment") !!}'+'/';
  var download_url='{!! URL::asset("/gov/gov_main/show_image") !!}'+'/';
  var delete_url_2 ='{!! URL::asset("/gov/gov_main/delete_by_name_gov_main_transaction") !!}'+'/';
  var my_data =30;

    var application_number;
  var application_year;
  var application_id;
  var application_dept_id=1;

   $(document).ready(function () {
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

});  







///////////////////////////////////////////////////////////


   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


show_data();
});
 
function show_data(){
   
    $('#sample_1').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "autoWidth": false,
   //  "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

   $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();

  },
     "ajax": {
            "url": '{!! URL::asset("/gov/reception/transactions/master_list_data") !!}',
            "data": function ( d ) {

           
             d.app_no=$("#app_no").val();
             d.subject=$("#subject").val();

              d.full_name=$("#full_name").val();
             d.id_num=$("#id_num").val();
             d.app_year=$("#app_year").val();
             d.status=$("#status_app").val();
           
             
 
            }
            },
   
     
      columns: [
            {data: 'app_no', name: 'app_no', orderable: true, searchable: false},
            {data: 'app_year', name: 'app_year', orderable: false, searchable: true},
            {data: 'full_name', name: 'full_name', orderable: false, searchable: true},
            {data: 'id_num', name: 'id_num', orderable: false, searchable: true},
            {data: 'subject', name: 'subject', orderable: false, searchable: false},
            {data: 'app_condition', name: 'app_condition', orderable: false, searchable: false},
            { data: 'operation_type', name: 'operation_type', orderable: false, searchable: true },
            { data: 'edit', name: 'edit', orderable: false, searchable: false },
            { data: 'send_arch', name: 'send_arch', orderable: false, searchable: false },
             { data: 'add_attachment', name: 'add_attachment', orderable: false, searchable: false },
              { data: 'view_attache', name: 'view_attache', orderable: false, searchable: false },

             { data: 'genral_info', name: 'genral_info', orderable: false, searchable: false },
              { data: 'app_no_search', name: 'app_no_search', orderable: false, searchable: false },
                { data: 'passfile', name: 'passfile', orderable: false, searchable: false },

            

             

                  

             

                

                    
                  

                
                
                 

                
                
              

       
        ]


    });
  }




  /////////////////////////////////////////////////////

    ///////////////////////////////////////////

  function send_arch(id,user_id){
var url1='{!! URL::asset("/gov/reception/transactions/send_arch/'+id+'/'+user_id+'") !!}';


     $.get(url1, function (e) {
    
   if( e['result'] == "ok"){

    jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
   
   }

    if( e['result'] == "error"){

    jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
   
   }
   
     });

  }









////////////////////////////////////////////////////////
$(document).ready(function(){
 $('.fancybox-buttons').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',

        prevEffect : 'none',
        nextEffect : 'none',

        closeBtn  : false,

        helpers : {
          /*title : {
            type : 'inside'
          },*/
          thumbs : {
              width: 75,
              height: 50
            },
          buttons : {}
        },

        afterLoad : function() {
          this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
      });
 });



function attach_file(app_id,status){
$('#upload_attachment').modal('toggle');

$('#upload_info').html('<table class="table table-bordered table-hover"><tbody> <tr><td >رقم  المعاملة </td><td id="app_no_year1">  </td><td> رقم  الهوية </td><td id="id_num_data1"> </td><td ></td></tr><tr> <td>الاسم  بالكامل </td><td id="full_name_data1"> </td><td> رقم  الجوال  </td><td id="mobile_no_data1">  </td></tr></tbody></table><div id="id_data" style="display:none" >'+app_id+'</div><div id="id_data2" style="display:none" >'+status+'</div>');

display_images(app_id);
  display_application_data (app_id);

 

}


function view_attache(app_id){

  $('#view_attachment').modal('toggle');
  $('#view_attachment_info').html('<table class="table table-bordered table-hover"><tbody> <tr><td >رقم  المعاملة </td><td id="app_no_year">  </td><td> رقم  الهوية </td><td id="id_num_data"> </td><td ></td></tr><tr> <td>الاسم  بالكامل </td><td id="full_name_data"> </td><td> رقم  الجوال  </td><td id="mobile_no_data">  </td></tr></tbody></table><div id="id_data" style="display:none" >'+app_id+'</div><div id="id_data2" style="display:none" >'+status+'</div>');
  
   display_images(app_id);
     display_application_data (app_id);
     //paper_type_tb (1);


}


///////////////////////////////////////////////////////
function display_images(app_id){
    app_type=0;
var url1='{!! URL::asset("/gov/gov_area/gov_main_transaction_attachment_view/'+app_id+'/'+app_type+'") !!}';

$('#attache').empty();
$('#attache1').empty();

     $.get(url1, function (e) {
       displayAttachuser(e);

          displatAttach(e);

  paper_type_tb (1);
    //  alert('5555');
       

//alert('6666');
     });



  
}


function display_application_data (app_id){
  var url='{!! URL::asset("/gov/gov_main/app_one_data/'+app_id+'") !!}'
  $.get(url, function (data) {
       //
       $('#app_no_year').text(data[0]['app_no']+'/'+data[0]['app_year']);
       $('#id_num_data').text(data[0]['id_num']);
       $('#full_name_data').text(data[0]['full_name']);
       $('#mobile_no_data').text(data[0]['mobile_no']);
    

       $('#app_no_year1').text(data[0]['app_no']+'/'+data[0]['app_year']);
       $('#id_num_data1').text(data[0]['id_num']);
       $('#full_name_data1').text(data[0]['full_name']);
       $('#mobile_no_data1').text(data[0]['mobile_no']);
    

    application_number=data[0]['app_no'];
    application_year=data[0]['app_year'];
    application_id=data[0]['id'];
   



      });
}



///////////////////////////////add_images//////////////////////////
$(document).ready(function(){
 $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
var accept = ".pdf,.doc,.docx,.jpg,.png,.doc,.docx,.xls,.xlsx,.tif";
 
  
 $(".dropzone").dropzone({
  url: '{!! URL::asset("/gov/gov_main/add_gov_main_transaction_attachment") !!}',
    uploadMultiple: true,
    method:'post',
    paramName:'file',
    acceptedFiles: accept,
    
    sending : function(file,xhr,formData){
     
      formData.append('_token',"{!! csrf_token() !!}");
      var app_id = $('#id_data').text();

         var app_type = $('#id_data2').text();
      

      formData.append('app_id',app_id);
       formData.append('app_type',app_type);
       
   
     

    },
     success : function (file,response){
      
      this.removeFile(file);
    },
     complete : function (file,response){
     
    },
     queuecomplete : function (file,response){
   
     display_images($('#id_data').text());

    }


});

$('.fancybox-buttons').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',

        prevEffect : 'none',
        nextEffect : 'none',

        closeBtn  : false,

        helpers : {
          /*title : {
            type : 'inside'
          },*/
          thumbs : {
              width: 75,
              height: 50
            },
          buttons : {}
        },

        afterLoad : function() {
          this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
      });
    });
















function app_no_search(app_id) {
 $('#view_excuted_data').modal('toggle');
    display_data_excuted(app_id);


 }

 function display_data_excuted (app_id){
  var url='{!! URL::asset("/gov/reception/transactions/app_all_vw/'+app_id+'") !!}';

    $.get(url, function (data) {
      $('#application_all_vw2').empty();
      $('#app_transaction_vw').empty();
       $('#serial_excuted').text(data['app_all_vw'][0]['app_no']);
       $('#app_year_excuted').text(data['app_all_vw'][0]['app_year']);
       $('#full_name_excuted').text(data['app_all_vw'][0]['full_name']);
       $('#identity_num_excuted').text(data['app_all_vw'][0]['id_num']);
      

         $.each(data['application_all_vw2'], function(k, v) {
      
         $('#application_all_vw2').append('<tr><td>'+v['main_block_id']+'</td><td>'+v['coupon_no']+'</td> <td>'+v['seq']+'</td><td>'+v['divid_num']+'</td><td>'+v['area']+'</td></tr>');


       
       });


       $.each(data['app_transaction_vw'], function(k, v) {

        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date(v['update_date']);
        var secondDate = new Date(data['app_all_vw'][0]['app_date']);
        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
        var day;

        if(diffDays == 0){
           day = "في نفس اليوم";
        }
    else if(diffDays == 1) day="بعد يوم واحد";
  else if(diffDays == 2) day="بعد يومان";
  else if(diffDays >= 3 && diffDays <= 10) day="بعد ("+diffDays+") أيام";
  else if(diffDays > 10) day="بعد ("+diffDays+") يوم";

       // var data ;
        //if(diffDays == 0) {data="في نفس اليوم";}
 

      
         $('#app_transaction_vw').append('<tr><td>'+v['status_name']+'</td> <td>'+v['update_date']+'</td><td>'+day+'</td><td>'+v['full_name']+'</td></tr>');


       
       });

       
    });



 }
// block قطعة
// coupon قسيمة 


/***************************************************/


/////////////////////////////لاظهار الانواع ///////////////////////////////
function paper_type_tb (dept_id){
    //  alert("hi1");
var url2='{!! URL::asset("/copytable/paper_type_tb/'+dept_id+'") !!}'; 
   $.get(url2,{ }, function (ec) {
 //   alert("hi2");
 $(".type_uploded").empty();
 $( ".type_uploded" ).each(function( index ) {
/*************************************************/
 var $type_uploded = $( this );
var value_type_uploded= $($type_uploded).attr("data-id");


         $type_uploded.append($("<option />").val('').text('اختر  النوع  '));
         $.each(ec, function() {
//alert(this.id);
          if(this.id == value_type_uploded){
           // alert("hi");
             $type_uploded.append($("<option />").val(this.id).text(this.ptype).attr("selected","selected"));
           }else{
              $type_uploded.append($("<option />").val(this.id).text(this.ptype));

           }
          //alert(this.id);
        
        }); 

       });

 });

}

//////////////////////////////////////////////////////////
function paper_type (imgname , dept_id){
//alert("#paper_type_"+imgname);
var name_id="#paper_type_"+imgname.replace('.','_')
var img_type =$(name_id).val();

var url2='{!! URL::asset("/copytable/change_the_type_of_paper/'+imgname+'/'+dept_id+'/'+img_type+'") !!}'; 
   $.get(url2,{ }, function (ec) {


   });

}


function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").text(e[0]['description']);




    });




}


</script>

@include('admin.gov.reception.transactions.recip_status');
@include('admin.gov.reception.transactions.adoption_contract');
@include ("admin.upload_img");
@include ("admin.upload_img_user");
@include('admin.archive.passd_file');

@endsection                  

