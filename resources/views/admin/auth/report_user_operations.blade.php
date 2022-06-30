@extends('admin.layouts.backend')

@section('page_level_plugins_styles')
  <link href="{{url('/')}}/admin/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
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
<style type="text/css">
.form-group .grand{
  height: 260px;
  border: 2px solid #ddd;
  overflow: auto;
  padding: 0px  0px;
  margin: 10px 40px ;
 
}
.form-horizontal .form-group {
    margin-right: 5px;
    margin-left: 0px;
}
</style>
@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')

@section('page_bar')
<li>

 @if( isset($user) ) 
        <a href='{{url("/user_view/$user->id")}}'>تعديل بيانات المستخدم</a>
  @else
        <a href='{{url("/register")}}'>إضافة بيانات المستخدم</a>
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
@if( isset($user) ) 
        تعديل بيانات المستخدم 
@else
إضافة مستخدم جديد
@endif
        </span>
      </div>
        
    </div>

    <div class="portlet-body form">
<!--==================================================================-->

   <div class="portlet-body">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_1_1" data-toggle="tab"> بيانات المستخدمين </a>
        </li>

        <li>
            <a href="#tab_1_2" data-toggle="tab"> الصلاحيات </a>
        </li>

        <li>
            <a href="#tab_1_3" data-toggle="tab"> Role </a>
        </li>
       
   </ul>


 @if( !isset($user) ) 
 <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_user" enctype="multipart/form-data" >
 @endif
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tab_1_1">
      
  @if( isset($user) )     
      <form    data-toggle="validator" method="post"  id="update_user" enctype="multipart/form-data" >
     <div class="alert alert-danger" id="updateuser_alert" style="display:none" >
                        <ul id="error"> 
                        </ul>
                        </div>
       <input name="_method" type="hidden" value="PUT">                
                
    @endif 

  <div class="form-body form-horizontal">

  <div class="form-group">
     <label class="col-md-3 control-label">اسم المستخدم</label>
         <div class="col-md-4">
             <input type="text" class="form-control" placeholder="اسم المستخدم" 
              value="{{ old('username',  isset($user->username) ? $user->username : null) }}"
               id="username" name="username" required=""  data-error="الرجاء ادخال اسم المستخدم">
       <div class="help-block with-errors"></div>
        </div>
         <div class="col-md-5"></div>
  </div>

    <div class="form-group">
        <label class="col-md-3 control-label">الايميل</label>
        <div class="col-md-4">
            <div class="input-group">
                
                <input type="email" class="form-control"  required placeholder="الايميل" 
                data-error="الرجاء ادخال الايميل"  id="email" name="email"

              value="{{ old('email',  isset($user->email) ? $user->email : null) }}"> 
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>

                    </div>
                <div class="help-block with-errors"></div>

        </div>
        <div class="col-md-5"></div>
    </div>



     <div class="form-group">
                <label class="col-md-3 control-label">كلمة المرور</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="كلمة المرور" 
                          @if( isset($user) )
                          @else
                           required
                          @endif
                        id="password" name="password"   data-error="الرجاء ادخال كلمة المرور">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                       
                    </div>
                     <div class="help-block with-errors"></div>
                     
                </div>
            </div>

          <div class="form-group">
                <label class="col-md-3 control-label">الاسم الأول</label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control"  
                        required placeholder="الاسم الأول" id="first_name" 
                          value="{{ old('first_name',  isset($user->first_name) ? $user->first_name : null) }}" name="first_name" data-error="الرجاء ادخال الاسم الاول"> </div>
                       <div class="help-block with-errors"></div> 
                </div>
                <div class="col-md-5"></div>
                
                 
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label"> العائلة</label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control"

                          value="{{ old('last_name',  isset($user->last_name) ? $user->last_name : null) }}"

                           required placeholder="العائلة" data-error="الرجاء ادخال العائلة"  id="last_name" name="last_name"> </div>
                         <div class="help-block with-errors "></div>
                         
                </div>
               
              <div class="col-md-5"></div>  
            </div>

     

       <div class="form-group">
                <label class="col-md-3 control-label">القسم</label>
                <div class="col-md-4">
                    <div class="input-icon right">
                       
                        <select class="form-control" name="dep" id="dep">
                          <option value="">إختر القسم</option>
                          @foreach ($deps as $dep)
                              <option 
                       @if( isset($user) )
                       <?php if($user->dep == $dep->id) { echo "selected" ;} ?> 
                       @endif

                              value="{{$dep->id}}">{{$dep->name}}</option>
                          @endforeach
                        </select>
                         </div>
                         <div class="help-block with-errors "></div>
                         
                </div>
               
              <div class="col-md-5"></div>  
            </div>
      
      


    @if( isset($user) ) 
            <div class="form-group">
              <div class="col-md-3"></div>
              <div class="col-md-4">
            
                <img src='{{url("/admin/user_image/$user->image")}}' alt="userimage"  style="width:100px;height:100px;border:1px #000 solid ;" class="img-responsive" />
              </div>
              <div class="col-md-5"></div>
            </div>

      @endif

             <div class="form-group">
                <label class="col-md-3 control-label">صورة المستخدم</label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa fa-user"></i>
                        <input type="file" class="form-control" placeholder="صورة المستخدم"  id="image" name="image"> </div>
                </div>
                <div class="col-md-5"></div>
            </div>




            <div class="form-group">
                <label class="col-md-3 control-label">رقم الجوال</label>
                <div class="col-md-4">
                <div class="input-icon right">
                 <i class="fa fa-phone"></i>
                    <input type="text" class="form-control spinner" pattern="[0-9]{10}" data-error="الرجاء ادخال ارقام فقط" placeholder="رقم الجوال" id="mobile_no"  name="mobile_no"  value="{{  old('mobile_no',  isset($user->mobile_no) ? $user->mobile_no : null) }}"> 
                    </div>
                     <div class="col-md-5"></div>
            <div class="help-block with-errors "></div>

                    </div>

            </div>


    @if( isset($user) )        

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">تعديل</button>
                    
                </div>
            </div>
      @endif  

        </div>
   @if( isset($user) )       
    </form>
 @endif

   </div>

 <!--=====================================================================-->

  <div class="tab-pane fade" id="tab_1_2">
         @if( isset($user) ) 
    <form  data-toggle="validator" method="post"  id="add_permission" enctype="multipart/form-data" >
       <input name="_method" type="hidden" value="PUT"> 
           <div class="alert alert-danger" id="updatepermission_alert" style="display:none" >
             <ul id="error"> 
             </ul>
          </div>
            @endif
          <div class="form-body form-horizontal">
            <div class="form-group " >
            <!--==================================-->
         @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)    

        <div class="col-md-3 grand"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class="{{ $menues->icon}}"></i>{{ $menues->title}} </div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
             <?php    $user_id=isset($user->id) ? $user->id : null;
                       if($user_id != null) {
                      $userpermission = \Sentinel::findById($user_id); }    ?>  
         

             @foreach ($menues->user_permissions as $submenue)



    
             <div onclick="$(this).find('.s_m').toggle(); $(this).find('.plusminus').removeClass('fa-plus').addClass('fa-minus')">

              <?php  if (count($submenue->user_permissions) > 0 ) { ?>

            <label style="display: inline-block;">
                 <a  class="btn btn-info btn-xs" >
                <i class="fa fa-plus plusminus"></i>
               </a>   {{$submenue['title']}}
            </label>


              <?php } else {?>

              <?php if($submenue->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('{{$submenue['slug']}}')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


            <?php }  ?>


               <label style="display: inline-block;">
                <?php  $sub_permission=isset($submenue->sub_permission) ? $submenue->sub_permission:null; ?>
               <input type="checkbox"  class="icheck permission" 
                <?php 
                  if($user_id != null) {
                if($userpermission->hasAccess($submenue['slug']))
                 echo "checked";
             }
                 ?>
                 value="{{$submenue['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$submenue['title']}} 
               

               </label>
     <?php  } ?>
   <!--===================================================================================================-->
               @foreach ($submenue->user_permissions as $data_menu) 
                 <div  class="s_m">
         <?php  $sub_permission_menue=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>


                  <?php if($data_menu->ignore_permission == 1) { } else { ?>

               
               <a style="display: inline-block;"  onclick="user_have('{{$data_menu['slug']}}')" class="btn btn-xs green"><i class="fa fa-users"></i></a> 


            <?php }  ?>




                <label style="display: inline-block;padding-right:20px;">
                <?php  $sub_permission_data=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>
               <input type="checkbox"  class="icheck permission" 
                <?php 
                  if($user_id != null) {
                if($userpermission->hasAccess($data_menu['slug']))
                 echo "checked";
               }
                 ?>
                 value="{{$data_menu['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$data_menu['title']}} 
               

               </label>

                @if( isset($user) ) 
    <?php if( $sub_permission_data != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction({{$data_menu->id}},{{$user->id}})"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
@endif

               </div>


               @endforeach
  <!--======================================================================================================-->
   @if( isset($user) ) 
    <?php if( $sub_permission != null) { ?>

 <span>
<button type="button"  class="btn btn-info btn-xs" onclick="myfunction({{$submenue->id}},{{$user->id}})"  >
<i class="fa fa-list"></i></button></span>

    <?php } ?>
@endif
  <!--=====================================================================================================-->               </div>
              @endforeach          
                    
                </div>
            </div>
        </div>
               


          </div>
            



  @endforeach 

 
  
          
          
 
</div></div>

   @if( isset($user) ) 
  <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn green btn-block">تعديل</button>
                    
                </div>
            </div>





</form> 
@endif
</div>


<!--==============================================================================================-->

 <div class="tab-pane fade" id="tab_1_3">
   @if( isset($user) ) 
   <form    data-toggle="validator" method="post"  id="update_role" enctype="multipart/form-data" >
      <input name="_method" type="hidden" value="PUT"> 
  @endif

   <div class="form-body form-horizontal">
       <div class="form-group " >

       <div class="col-md-10 grand"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class="fa fa-gift"></i>User Role </div>
    </div></div>


     <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
         <?php  
           $user_role=isset($user->id) ? $user->id : null;
           if($user_role != null ){
           $userole = \Sentinel::findById($user_role); }    ?>  
  
         @foreach ($roles as $role)
                      <label>
               <input type="checkbox"  class="icheck role" 
            <?php 
              if($user_role != null ){
            if($userole->inRole($role['slug']) ) echo "checked"; 
              }
             ?>
                value="{{$role['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$role['name']}} </label>
                  @endforeach          
                    
                </div>
            </div>
        </div>  </div>


</div> </div>
@if( isset($user) )
<div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn green btn-block">تعديل</button>
                    
                </div>
            </div>
</form> 

@else 

<div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">إضافة</button>
                    <button type="button" class="btn default">الغاء</button>
                </div>
            </div>

@endif

  </div>


</div>
@if( !isset($user) )
</form>
@endif
</div></div>
</div></div>




     <!--=====================================================================================-->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
       <form  method="post"  id="prog_num_user" > 
       <input type="hidden" value="0" name="submenue_id" id="submenue_id">
        <div class="modal-body">

      

        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-default" >حفظ</button>
        </div>
        </form> 
      </div>
      
    </div>
  </div>
  
 <!--=====================================================================================--> 
 <!--===========================user have =====================-->

  <div class="modal fade" id="user_can_access" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">المستخدمين الحاصلين على الصلاحية</h4>
        </div>
      
        <div class="modal-body">

            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                       <!-- <th>#</th> -->
                       <th>الغاء الصلاحية</th>
                       <th>المستخدم </th>
                      
             
                    </tr>
                </thead>
                <tbody id="user_have_permision">
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>

      

        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
     
      </div>
      
    </div>
  </div>

 <!--===========================================================--> 
 
      
 

<meta name="_token" content="{!! csrf_token() !!}" />


@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')
  <script src="{{url('/')}}/admin/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
   <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
@endsection

@section('page_level_scripts_js')
 <script src="{{url('/')}}/admin/assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed"); });


  $( document ).ready(function() {
   $('.s_m').hide();
});



$("#add_user").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 
    var permissions = []; 
  
     $(".permission").each(function(i, selected)
        {
            if($(this).is(':checked'))
            {
              permissions[i]= $(this).val();
            }
            else
            {
               
            }

           });                
   

      var roles = []; 
 $(".role").each(function(i, selected)
        {
            if($(this).is(':checked'))
            {
              roles[i]= $(this).val();
            }
            else
            {
                // Checkbox isn't checked
            }

           });                


         var form = $('#add_user')[0]; 
         var formData = new FormData(form);
          formData.append('permissions', JSON.stringify(permissions));
          formData.append('roles', JSON.stringify(roles));
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/register") !!}',
                data: formData,
                 contentType: false, 
                 processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#adduser_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#adduser_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#adduser_alert').show();
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

//////////////////////update_user_data/////////////////
var user_id = '{{isset($user->id) ? $user->id : null}}';

$("#update_user").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault(); 
  var form = $('#update_user')[0]; 

  var formData = new FormData(form);

  
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/user_update/'+user_id+'") !!}',
                data: formData,
                 contentType: false, 
                 processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#updateuser_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#updateuser_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#updateuser_alert').show();
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






///////////////////////////////////////////////////////////

$("#add_permission").on('submit', function(e) {
 
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 
    var permissions = []; 
    var unpermissions=[];
 $(".permission").each(function(i, selected)
        {
            if($(this).is(':checked'))
            {
              permissions[i]= $(this).val();
            }
            else
            {
                 unpermissions[i]= $(this).val();
            }

           });                
   
         var form = $('#add_permission')[0]; 
         var formData = new FormData(form);
         formData.append('permissions', JSON.stringify(permissions));
         formData.append('unpermissions', JSON.stringify(unpermissions));
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/update_permission/'+user_id+'") !!}',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#updatepermission_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#updatepermission_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#updatepermission_alert').show();
              $('#error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ اثناء التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });


            
        }); 

//////////////////////////////////////////////////////////////////////////////////
$("#update_role").on('submit', function(e) {
 
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 
    var roles = []; 
 $(".role").each(function(i, selected)
        {
            if($(this).is(':checked'))
            {
              roles[i]= $(this).val();
            }
            else
            {
                // Checkbox isn't checked
            }

           });                
   
         var form = $('#update_role')[0]; 
         var formData = new FormData(form);
         formData.append('roles', JSON.stringify(roles));
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/update_role/'+user_id+'") !!}',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
            
             jError("حدث خطأ اثناء التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });


            
        }); 
/////////////////////////////////////////////////////////////
function myfunction (id,userid){

$('#myModal').modal('toggle');
$('#submenue_id').val(id);

  var add_url='{!! URL::asset("/display_prog_num/'+id +'/'+userid+'") !!}';

  $.get( add_url ) .done(function( data ) {
 $('.modal-body').html(data);
  
   
    
  });
  
}
/////////////////////////////////////////////////////////  



$("#prog_num_user").on('submit', function(e) {
 

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
                url: '{!! URL::asset("/prog_num_permission/'+user_id+'") !!}',
                data:new FormData($("#prog_num_user")[0]),
                contentType: false, 
                processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                  
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
               jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
             }
           

            
                       
       });

  }
            
        }); 


/////////////////////عرض المستخدمين المالكين للصلاحيات///////////////////

function user_have(slug) {
  $('#user_can_access').modal('toggle');

  disply_user_have_per(slug);
}

function disply_user_have_per(slug) {
  var add_url='{!! URL::asset("/user/user_has_permission/'+slug +'") !!}';

  $.get( add_url ) .done(function( data ) {
 
$("#user_have_permision").empty();
  for (i=0 ; i<data.length ; i++) {
     var user_data = data[i].split("-");
    

   $("#user_have_permision").append('<tr><td> <input type="checkbox" onchange="per_op('+user_data[0]+',\''+slug+'\')"> </td>  <td><a href="{!! URL::asset("user_view/'+user_data[0] +'") !!}" target="_blank">'+user_data[1]+'</a></td> </tr>');
 }
  
    });

}

////////////////////////////////////إزالة الصلاحية من المستخدم ///////////////////////////////////
function per_op (user_id,slug){
  var add_url='{!! URL::asset("/user/remove_permission/'+user_id +'/'+slug+'")  !!}';
  $.get( add_url ) .done(function( data ) {

 disply_user_have_per(slug);
  });
 

}


</script>
@endsection




