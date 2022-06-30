@extends('admin.layouts.backend')

@section('page_level_plugins_styles')
@endsection

@section('page_global_styles')
@endsection

@section('page_level_styles')
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">




@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
 @if( isset($notification_info) )
 <a href='{{url("/notification/$notification_info->id")}}'>تعديل</a>

 @else
   <a href="{{url('/notification/create')}}">إشعار جديد</a>
 @endif
      
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')

<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-dark"></i>
    <span class="caption-subject font-dark bold uppercase">
   @if( isset($notification_info) )
    تعديل الاشعار
    @else
      إشعار جديد
    @endif
  
    </span>
</div>
        
    </div>

<div class="portlet-body form">

@if( isset($notification_info) ) 

<form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_notification" enctype="multipart/form-data" >
      {{ csrf_field() }}
     <div class="alert alert-danger" id="update_notification_alert" style="display:none" >
                        <ul id="error"> 
                        </ul>
                        </div>
      <input name="_method" type="hidden" value="PUT">                    

@else

<form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_notification" enctype="multipart/form-data" >
      {{ csrf_field() }}
     <div class="alert alert-danger" id="add_notification_alert" style="display:none" >
                        <ul id="erroradd"> 
                        </ul>
                        </div>


@endif
                                                <!-- BEGIN FORM-->
    


        
        <div class="form-body">

            <div class="form-group">
                <label class="col-md-3 control-label">العنوان</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="العنوان" id="n_title" name="n_title" required=""  data-error="الرجاء ادخال العنوان"  value="{{ isset($notification_info->n_title) ? $notification_info->n_title : null }}">
                     <div class="help-block with-errors"></div>
                    </div>
                
            </div>



            <div class="form-group">
                <label class="col-md-3 control-label">التفاصيل</label>
                <div class="col-md-4">
                    <div class="input-group">
                        
                        <input type="n_details" class="form-control"  required placeholder="التفاصيل" 
                        data-error="الرجاء ادخال التفاصيل"  id="n_details" name="n_details" value="{{ isset($notification_info->n_details) ? $notification_info->n_details : null }}"> 
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>

                            </div>
                        <div class="help-block with-errors"></div>

                </div>
            </div>




            <div class="form-group">
                <label class="col-md-3 control-label">الرابط</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="الرابط" 
                        required id="n_url" name="n_url"   data-error="الرجاء ادخال الرابط" value="{{ isset($notification_info->n_url) ? $notification_info->n_url : null }}">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                       
                    </div>
                     <div class="help-block with-errors"></div>
                     
                </div>
            </div>


         
            

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">حفظ</button>
                    <button type="button" class="btn default">الغاء</button>
                </div>
            </div>
        

        </div>
    </form>
    <!-- END FORM-->
</div> </div></div>
<meta name="_token" content="{!! csrf_token() !!}" />


@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

@endsection


@section('page_level_scripts_js')
@endsection



@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function (e) {
$("#add_notification").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


   e.preventDefault(); 
                 
         $.ajax({
      url:" {!! URL::asset("/notification") !!}",
      data:new FormData($("#add_notification")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
     success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#add_notification_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_notification_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#add_notification_alert').show();
              $('#erroradd').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#erroradd').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });

  }
            
        }); 
  });
/////////////////////////////////////////////////////////////////////////////////
//var notification_info_id = '{{isset($notification_info->id) ? $notification_info->id : null}}';


 $(document).ready(function (e) {
$("#update_notification").validator().on('submit', function(e) {
 
var notification_info_id = '{{isset($notification_info->id) ? $notification_info->id : null}}';
   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


   e.preventDefault(); 
                 
         $.ajax({
      url:'{!! URL::asset("/notification/'+notification_info_id+'") !!}',
      data:new FormData($("#update_notification")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
     success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#update_notification_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#update_notification_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#update_notification_alert').show();
              $('#error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });

  }
            
        }); 
  });



 

</script>
@endsection




