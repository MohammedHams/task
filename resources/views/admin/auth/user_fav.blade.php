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


        <a href=#>المفضلة  </a>
 

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
          المفضلة  
        </span>
      </div>
        
    </div>

    <div class="portlet-body form">
<!--==================================================================-->

   <div class="portlet-body">

   	        
    <form  data-toggle="validator" method="post"  id="add_fav" enctype="multipart/form-data" >
     
           <div class="alert alert-danger" id="add_fav_alert" style="display:none" >
             <ul id="error"> 
             </ul>
          </div>
         
          <div class="form-body form-horizontal">
            <div class="form-group " >
            <!--==================================-->

            <?php $user_fav=Sentinel::getUser()->user_fav;  
            $json_array = json_decode($user_fav,true);
            $menu_for_user=Sentinel::getUser();
        

            ?>
         @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)    
   


         @if($menu_for_user->hasAccess($menues->slug.'.*') || $menues->ignore_permission==1)

        

        <div class="col-md-3 grand"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class="{{ $menues->icon}}"></i>{{ $menues->title}} </div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
             <?php    $user_id=Sentinel::getUser()->id;



                       if($user_id != null) {
                      $userpermission = \Sentinel::findById($user_id); }    ?>  
         

             @foreach ($menues->user_permissions as $submenue)

          @if($submenue->visible) 
    
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
               if(isset($json_array[$submenue['id']])) 
                 echo "checked";
             }
                 ?>
                 value="{{$submenue['id']}}" data-checkbox="icheckbox_square-grey"> 
                {{$submenue['title']}} 
               

               </label>
     <?php  } ?>
   <!--===================================================================================================-->
               @foreach ($submenue->user_permissions as $data_menu) 
                @if($menu_for_user->hasAccess($data_menu->slug)  || $data_menu->ignore_permission==1  ) 
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
                if(isset($json_array[$data_menu['id']])) 
                 echo "checked";
               }
                 ?>
                 value="{{$data_menu['id']}}" data-checkbox="icheckbox_square-grey"> 
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

@endif
               @endforeach

  <!--=====================================================================================================-->      
           </div>

           @endif
              @endforeach          
                    
                </div>
            </div>
        </div>
               


          </div>
            
  @endif

  @endforeach 

 
  
          
          
 
</div></div>

 
  <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn green btn-block">اضافة  </button>
                    
                </div>
            </div>





</form> 

   


</div></div></div></div>
 
      
 

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



$("#add_fav").on('submit', function(e) {
 

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
   

                


         var form = $('#add_fav')[0]; 
         var formData = new FormData(form);
          formData.append('permissions', JSON.stringify(permissions));
          
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("/user/user_add_fav") !!}',
                data: formData,
                 contentType: false, 
                 processData: false,
                success: function (e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#add_fav_alert').hide();
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_fav_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#add_fav_alert').show();
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





</script>
@endsection




