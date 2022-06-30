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
        <a href="{{url('/update_mobile')}}">تغير   رقم   الجوال  </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')

<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-dark"></i>
    <span class="caption-subject font-dark bold uppercase">تغير   رقم   الجوال   </span>
</div>
        
    </div>

<div class="portlet-body form">
@if($user->change_mobile==0)
<div class="note note-danger">
<p> الرجاء   تحديث  رقم  الجوال   الخاص  بكم   </p>
</div>
@endif
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="updateMobile" enctype="multipart/form-data" >
      {{ csrf_field() }}
     <div class="alert alert-danger" id="update_password_alert" style="display:none" >
                        <ul id="error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

            <div class="form-group">
                <label class="col-md-3 control-label">رقم  الجوال   </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="رقم  الجوال  الخاص  بك  " id="mobile_no" name="mobile_no" required=""  data-error="الرجاء   ادخال   رقم   الجوال  " required="">
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
$("#updateMobile").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 
    
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/updateMobile") !!}',
                data: new FormData($("#updateMobile")[0]),
                 contentType: false, 
                 processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#update_password_alert').hide();
                // var url3={!! URL::asset("/") !!}
                 //window.location.replace(url3);
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#update_password_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#update_password_alert').show();
              $('#error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error').append('<li >'+ member[i] +'</li>' );
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




