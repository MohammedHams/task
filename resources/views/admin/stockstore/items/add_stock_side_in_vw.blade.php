@extends('admin.layouts.backend')
@section('title','اضافة   المورد  ')
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
<style type="text/css">
.cd-horizontal-timeline .events {
    position: absolute;
    z-index: 1;
    right: 0;
    top: 49px;
    height: 2px;
    background: #fdfdfd;
    -webkit-transition: -webkit-transform .4s;
    -moz-transition: -moz-transform .4s;
    transition: transform .4s;
}




/******************/

.mt-element-step .step-line .mt-step-col {
    padding: 10px 0;
    text-align: center;
}

.mt-element-step .step-line .active .mt-step-number {
    color: #dbdb37!important;
    border-color: #dbdb37!important;
}
.mt-element-step .step-line .active .mt-step-content, .mt-element-step .step-line .active .mt-step-title {
    color: #dbdb37!important;
}



.mt-element-step .step-line .last .mt-step-number {
     color: #ee6d75 !important;
    border-color: #ee6d75 !important;

}

.mt-element-step .step-line .mt-step-title {
    font-size: 10px;
    font-weight: 400;
    position: static;
  
}

.font-grey-cascade {
    color: #ee6d75!important;
}


.mt-element-step .step-line .active .mt-step-title:after, .mt-element-step .step-line .active .mt-step-title:before {
    background-color: #dbdb37;
}
/**************/

.mt-element-step .step-line  .last .mt-step-title:after, .mt-element-step .step-line .mt-step-title:before {
    content: '';
    height: 3px;
    width: 50%;
  /*  position:static;*/
    background-color: #ee6d75;
    top: 34px;
    z-index: 4;
    transform: translateY(-100%);
}


.mt-element-step .step-line .mt-step-number {
    font-size: 20px;
    border-radius: 50%!important;
    display: inline-block;
    margin: auto auto 5px;
    padding: 5px;
    border: 3px solid #e5e5e5;
    position: relative;
    z-index: 5;
    height: 40px;
    width: 40px;
    text-align: center;
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

</style>



@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="#"> اضافة   المورد   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


 
  <div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase"> الموردين   </span>
</div>


        
    </div>
 </div></div>







<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo">  الموردين   </span>
   
</div>


 <div class="actions">


 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick="help(47)"></i>

<?php  }  ?>
             
 
<a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" onclick="add_stock_side_in_data()"><i class="fa fa-plus"></i>  اضافة   الموردين     </a>


                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">

            

          


        <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >اسم   المورد  </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="side_name" id="side_name"  placeholder="اسم   المورد  " >
                    

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
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> الموردين   </span>

</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="stock_side_in_vw">
                <thead>
                  <tr>
                    <th>رقم   المورد  </th>
                    <th>اسم   المورد  </th>
                     <th>العنوان  </th>
                     <th>رقم المشغل </th>
                      <th>رقم   التلفون   </th>
                      <th>ملاحظات   </th>
                  
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 









 <div class="modal fade" id="add_stock_side_in_data_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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


<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="add_stock_side_in_data_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_stock_side_in_data_alert" style="display:none" >
                        <ul id="add_stock_side_in_data_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


           <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم   المورد  </label>
                <div class="col-md-8">
                  <div id="the-basics">
                    <input type="text" class="form-control typeahead" placeholder="اسم  المورد  " id="side_name_in" name="side_name_in"  style="direction: rtl"  >
                  </div>
                    
                    </div>
                
            </div>


   <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> العنوان </label>
                <div class="col-md-8">
                  <div id="the-basics">
                    <input type="text" class="form-control " placeholder="العنوان  " id="address_in" name="address_in"  style="direction: rtl"  >
                  </div>
                    
                    </div>
                
            </div>

             <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">رقم  المشغل  </label>
                <div class="col-md-8">
                  <div id="the-basics">
                    <input type="text" class="form-control " placeholder="رقم   المشغل  " id="operator_no_in" name="operator_no_in"  style="direction: rtl"  >
                  </div>
                    
                    </div>
                
            </div>

               <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">رقم   التلفون </label>
                <div class="col-md-8">
                  <div id="the-basics">
                    <input type="text" class="form-control " placeholder="رقم  التلفون  " id="tel_in" name="tel_in"  style="direction: rtl"  >
                  </div>
                    
                    </div>
                
            </div>



           
            
             <div class="form-group col-sm-6 note1">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الملاحظات   </label>
                <div class="col-md-8">
                 <input type="text" class="form-control" placeholder="الملاحظات  " id="note_in" name="note_in" >
                    
                    </div>
                
            </div>


    

					
		<!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button><img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >
                   <a href='{!! URL::asset("/")!!}' class="btn red"> <i class="fa fa-close"></i> اغلاق  </a>
                    
                 
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

    stock_side_in_vw();
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


stock_side_in_vw();
});


});  






$("#add_stock_side_in_data_form").on('submit', function(e) {
   
   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/items/add_stock_side_in_data") !!}',
      data:new FormData($("#add_stock_side_in_data_form")[0]),
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
                 $('#add_stock_side_in_data_alert').hide();
                  $('#add_stock_side_in_data_form')[0].reset();
                  $("#add_stock_side_in_data_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#add_stock_side_in_data_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');

                     $("#add_stock_side_in_data_modal").modal("toggle");
                  stock_side_in_vw();
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_stock_side_in_data_alert').hide();
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
              $('#add_stock_side_in_data_alert').show();
              $('#add_stock_side_in_data_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#add_stock_side_in_data_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 






function stock_side_in_vw(){
 
    $('#stock_side_in_vw').DataTable({
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
            "url": '{!! URL::asset("/stock_store/items/stock_side_in_vw") !!}',
            "data": function ( d ) {

          
           d.side_name=$("#side_name").val();

           
          
            }
            },
   
     
      columns: [
                 {data: 'side_id', name: 'side_id',width:"10%"},
                {data: 'side_name', name: 'side_name',width:"15%"},
                 {data: 'address', name: 'address',width:"20%"},
                 {data: 'operator_no', name: 'operator_no',width:"15%"},
                    {data: 'tel', name: 'tel',width:"15%"},
                      {data: 'note1', name: 'note1',width:"15%"},
          
          
          
                
                
                 

                
                
              

       
        ]


    });
  }







var substringMatcher = function(strs) {
  //alert(strs);
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
    //    alert(str);
      }
    });

    cb(matches);
  };
};



var states = '{!!$side_name!!}';
var st1=states.split(",")
for (var i = 0; i < st1.length; i++) {
    st1[i] = st1[i].replace(/"/g, "");
}

//alert(states);


$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'side_name_in',
  source: substringMatcher(st1)
});


 
function add_stock_side_in_data(){

$("#add_stock_side_in_data_modal").modal("toggle");

}




function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}


</script>



@endsection                  

