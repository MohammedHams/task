@extends('admin.layouts.backend')

@section('page_level_plugins_styles')
@endsection

@section('page_global_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
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
 @if( !isset($menu) ) 
<li>
        <a href="#">قائمة جديدة</a>
        <i class="fa fa-angle-left"></i>
    </li>
  @else
  <li>
        <a href='#'>تعديل بيانات القائمة</a>
        <i class="fa fa-angle-left"></i>
    </li>
  
  @endif  
@endsection




@section('content')

<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-dark"></i>
    <span class="caption-subject font-dark bold uppercase">
@if( !isset($menu) ) 
    إضافة قائمة جديد
    @else
    تعديل القائمة
    @endif
    </span>
</div>
        
    </div>

<div class="portlet-body form">
   @if( !isset($menu) )                                              <!-- BEGIN FORM-->
    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_menu" enctype="multipart/form-data" >
     <div class="alert alert-danger" id="addmenu_alert" style="display:none" >
                        <ul id="error"> 
                        </ul>
                        </div>


@else
        <form  class="form-horizontal"  data-toggle="validator" method="post"  id="update_menu" enctype="multipart/form-data" >
     <div class="alert alert-danger" id="updatemenu_alert" style="display:none" >
                        <ul id="error"> 
                        </ul>
                        </div>
                 <input name="_method" type="hidden" value="PUT">                   
@endif   
        <div class="form-body">

    
            <div class="form-group">
                <label class="col-md-3 control-label">اسم الصلاحية / القائمة</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" 
                    placeholder="اسم الصلاحية" id="slug" name="slug"
                     required  data-error="الرجاء ادخال اسم الصلاحية" value="{{ old('slug',  isset($menu->slug) ? $menu->slug : null) }}">
                    <div class="help-block with-errors"></div>
                    
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label">عنوان الصلاحية</label>
                <div class="col-md-4">
                <input type="text" class="form-control" required 
                 placeholder="الاسم اللطيف" data-error="عنوان الصلاحية" 
                  id="title" name="title" value="{{ old('title',  isset($menu->title) ? $menu->title : null) }}" >  
                  <div class="help-block with-errors"></div>

                </div>
            </div>


             <div class="form-group">
                <label class="col-md-3 control-label">لون الصلاحية</label>
                <div class="col-md-4">
                <input type="text" class="form-control" required 
                 placeholder="لون الصلاحية" data-error="لون الصلاحية" 
                  id="color" name="color" value="{{ old('color',  isset($menu->color) ? $menu->color : null) }}" >  
                  <div class="help-block with-errors"></div>

                </div>
            </div>



             <div class="form-group">
                <label class="col-md-3 control-label">الايقونات</label>
                <div class="col-md-4">
                <input type="text" class="form-control" required 
                 placeholder="الايقونات" data-error="أدخل الايقونه"  id="icon" name="icon" 
                 value="{{ old('icon',  isset($menu->icon) ? $menu->icon : null) }}" >  
                  <div class="help-block with-errors"></div>

                </div>
            </div>


               <div class="form-group">
                <label class="col-md-3 control-label">الرابط</label>
                <div class="col-md-4">
                <input type="text" class="form-control" required 
                 placeholder="الرابط" data-error="أدخل الايقونه"  id="url" name="url" 
                 value="{{ old('url',  isset($menu->url) ? $menu->url : null) }}">  
                  <div class="help-block with-errors"></div>

                </div>
            </div>


           
            
          

           <div class="form-group">
            <label class="control-label col-md-3">العمليات</label>
            <div class="col-md-6">
                <input type="text" class="form-control input-large" name="functions" data-role="tagsinput" value="{{ old('functions',  isset($menu->functions) ? $menu->functions : null) }}"> </div>
        </div>

         <div class="form-group">
            <label class="control-label col-md-3">مهمات</label>
            <div class="col-md-6">
               <textarea name="sub_permission" id="sub_permission" class="form-control"  rows="10" style="direction: ltr; text-align: left">{{ old('sub_permission',  isset($menu->sub_permission) ? $menu->sub_permission : null)}}</textarea>  </div>
        </div>



            <div class="form-group">
            <label class="col-md-3 control-label">معروضة </label>
            <div class="col-md-9">
                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input type="radio" name="visible" id="optionsRadios25"  required value="1" 
                         @if( isset($menu) ) 
                       {{ $menu->visible ? "checked" : "" }} 
                       @endif
                        > ظاهرة
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input type="radio" name="visible" id="optionsRadios26" value="0" 
                     @if( isset($menu) ) 
                        {{ $menu->visible ? "" : "checked" }}
                        @endif > مخفية
                        <span></span>
                    </label>
                    
                </div>
            </div>
        </div>


           <div class="form-group">
            <label class="col-md-3 control-label">تسجيل حركات</label>
            <div class="col-md-9">
                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input type="radio" name="tracking" id="optionsRadios27"  required value="1" 
                         @if( isset($menu) ) 
                       {{ $menu->tracking ? "checked" : "" }} 
                       @endif
                        > تسجيل 
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input type="radio" name="tracking" id="optionsRadios28" value="0" 
                     @if( isset($menu) ) 
                        {{ $menu->tracking ? "" : "checked" }}
                        @endif > عدم تسجيل 
                        <span></span>
                    </label>
                    
                </div>
            </div>
        </div>


         <div class="form-group">
            <label class="col-md-3 control-label">نوع الرابط</label>
            <div class="col-md-9">
                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input type="radio" name="typeoflink" id="optionsRadios27"  required value="1" 
                         @if( isset($menu) ) 
                         

                       {{ $menu->typeoflink ? "checked" : "" }} 
                       @endif
                        >خارجى 
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input type="radio" name="typeoflink" id="optionsRadios28" value="0" 
                     @if( isset($menu) ) 
                        {{ $menu->typeoflink ? "" : "checked" }}
                        @endif > داخلى 
                        <span></span>
                    </label>
                    
                </div>
            </div>
        </div>


         <div class="form-group">
            <label class="col-md-3 control-label"> الصلاحيات</label>
            <div class="col-md-9">
                <div class="mt-radio-inline">
                    <label class="mt-radio">
                        <input type="radio" name="ignore_permission" id="optionsRadios27"  required value="0" 
                         @if( isset($menu) ) 
                         

                       {{ $menu->ignore_permission ? "" : "checked" }} 
                       @endif
                        >تفعيل 
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        <input type="radio" name="ignore_permission" id="optionsRadios28" value="1" 
                     @if( isset($menu) ) 
                        {{ $menu->ignore_permission ? "checked" : "" }}
                        @endif > إهمال 
                        <span></span>
                    </label>
                    
                </div>
            </div>
        </div>





            <div class="form-group">
                <label class="col-md-3 control-label">فرع من</label>
                <div class="col-md-4">
               <select class="form-control select2" id="p_id" name="p_id"> 
               <option value="0">الرجاء اختيار القائمة  الرئيسية</option>    
               @foreach($menus as $one_menu) 
               <option 
               @if( isset($menu) ) 
                <?php if($one_menu->id == $menu->p_id) { echo "selected" ;} ?>
                 @endif
             value="{{$one_menu->id}}">{{$one_menu->title}}</option>
               @endforeach
               </select>
                </div>
            </div>




            


            


             

          
            

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">إضافة</button>
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
<script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
   <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
@endsection


@section('page_level_scripts_js')
<script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
@endsection



@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function (e) {
$("#add_menu").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault(); 
    $.ajax({
      url:"{!! URL::asset("/menus") !!}",
      data:new FormData($("#add_menu")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#addmenu_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#addmenu_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#addmenu_alert').show();
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

///////////////////////////////////////////////
var menu_id ='{{isset($menu->id) ? $menu->id : null}}';
$("#update_menu").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault(); 
  var form = $('#update_menu')[0]; 

  var formData = new FormData(form);

  
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/menus/'+menu_id+'") !!}',
                data: formData,
                 contentType: false, 
                 processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#updatemenu_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#updatemenu_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#updatemenu_alert').show();
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







 

</script>
@endsection




