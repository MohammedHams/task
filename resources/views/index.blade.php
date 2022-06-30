@extends('admin.layouts.backend')

@section('page_level_plugins_styles')

 <link href="{{url('/')}}/admin/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />

@endsection

@section('page_global_styles')

@endsection

@section('page_level_styles')
 <link href="{{url('/')}}/admin/assets/apps/css/inbox.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
<style type="text/css">
.page-sidebar .page-sidebar-menu>li>a>.title, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a>.title {
    display: block;
    text-align: center;
    margin-top: 5px;
    font-size: 15px !important;
}

</style>
@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')

@endsection




@section('content')

 

                 
<!--==============================================-->

 <div class="row ">
 <?php  

$user_fav=Sentinel::getUser()->id;
$menu_for_user=Sentinel::getUser();




   $data=DB::connection("stock_con")->select("select USER_FAV from users where id=?",[$user_fav]);

//return $data[0]->user_fav;
$menues=DB::connection('stock_con')->select("select id from menus");
$json_array = json_decode($data[0]->user_fav,true);

foreach ($menues as $menue) {
	if(isset($json_array["$menue->id"])) {





      $menues_data=DB::connection("stock_con")->table('menus')->select('title','url','icon','slug','visible','p_id','typeoflink','color')->where('id', '=', $menue->id)->where('visible','=',1)->where('p_id','<>',0)->get();


  //***********************************//
      ?>

        

   @foreach($menues_data   as  $menues_data_g )

        @if($menu_for_user->hasAccess($menues_data_g->slug))
       
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

              	  @if($menues_data_g->typeoflink)
                            <a class="dashboard-stat dashboard-stat-v2 {{$menues_data_g->color}}" href="{{$menues_data_g->url}}" target="_blank">

                         @else  
                           <a class="dashboard-stat dashboard-stat-v2 {{$menues_data_g->color}}" href="{{url('/')}}{{$menues_data_g->url}}" >

                          @endif       	
                                <div class="visual">
                                    <i class="{{$menues_data_g->icon}}"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                     
                                    </div>
                                    <div class="desc">    {{$menues_data_g->title}}</div>
                                </div>
                            </a>
                        </div>

                          @endif


      
                     @endforeach


                 

                   
                       
              


                        
                
  

<!--========================--> 



		
<?php 		
	 }

}  ?>



  </div>

 
   

    <!--=======================================================-->    

@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')
  <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
  
   <script src="{{url('/')}}/admin/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>

@endsection


@section('page_level_scripts_js')

 <script src="{{url('/')}}/assets/apps/scripts/inbox.min.js" type="text/javascript"></script>

@endsection



@section('scripts')

@endsection




