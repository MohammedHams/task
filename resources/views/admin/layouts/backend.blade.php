
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->




        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

      <!--  <meta http-equiv="refresh" content="600;url={{url('/')}}/logout" />-->
        <meta content="Preview page of Metronic Admin RTL Theme #2 for blank page layout" name="description" />
        <meta content="" name="author" />

        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
       <!--<link href="{{url('/')}}/admin/assets/fonts_googleapis.css" rel="stylesheet" type="text/css" />-->
        <link href="{{url('/')}}/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

         <!-- BEGIN PAGE LEVEL PLUGINS -->
            @yield('page_level_plugins_styles')

         <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('/')}}/admin/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/lightGallery-master/dist/css/lightgallery.css" rel="stylesheet">
        <link href="{{url('/')}}/admin/assets/global/plugins/Print.js-1.0.30/dist/print.min.css" rel="stylesheet">
         @yield('page_global_styles')
        <!-- END THEME GLOBAL STYLES -->

         <!-- BEGIN PAGE LEVEL STYLES -->        
        @yield('page_level_styles')
        <!-- END PAGE LEVEL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('/')}}/admin/assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('/')}}/admin/assets/layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
        	.swal2-modal .swal2-content , .swal2-modal .swal2-styled{
        	    font-family: 'DroidArabicKufiRegular', sans-serif;
        	}
        	.swal2-modal.swal2-show {
			    border-radius: 5px !important;
			    box-shadow: 0 0px 10px 5px #747474;
			}
.page-container-bg-solid .page-content {
    background-image: url("{{url('/')}}/img/back.jpg");

}

.page-header.navbar .page-logo {
background: #42c8d4;
}
.swal2-buttonswrapper {
    direction: initial;
}
        </style>

        <script type="text/javascript">
		 var hidedeterminprint = false;
		 var application_dept_id=0;
 /*   window.onload = function(){
        var timer = null,
            time=1000*60*15, // 15 minutes
            checker_logout = function(){
                if(timer){clearTimeout(timer);} // cancels the countdown.
                timer=setTimeout(function() { 
                    document.location="{{url('/')}}/logout";
                },time); // reinitiates the countdown.
            };
        checker_logout(); // initiates the countdown.
        // requires jQuery... (you could roll your own jQueryless version pretty easily though)
        if(window.jQuery){
            // bind the checker function to user events.
            jQuery(document).bind("mousemove keypress click", checker_logout);
        }
    };

    */
</script>
         @yield('theme_layout_styles')
        <!-- END THEME LAYOUT STYLES -->
        @yield('style')

        <link rel="shortcut icon" href="{{url('/')}}/admin/assets/layouts/layout2/img/favicon.ico" /> </head>
    <!-- END HEAD -->
    	

    <body         class="@yield('body_class')" >
<audio id="notifyAudio">
  <source src="{{url('/')}}/sound/eventually.ogg" type="audio/ogg">
  <source src="{{url('/')}}/sound/eventually.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
    @yield('body')
      
            <!-- END QUICK NAV -->
            <!--[if lt IE 9]>
<script src="{{url('/')}}/admin/assets/global/plugins/respond.min.js"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/excanvas.min.js"></script> 
<script src="{{url('/')}}/admin/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->

             <!-- BEGIN PAGE LEVEL PLUGINS -->
              @yield('page_level_plugins_js')
              <!-- END PAGE LEVEL PLUGINS -->

            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="{{url('/')}}/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
           
           <!-- BEGIN PAGE LEVEL SCRIPTS -->
           @yield('page_level_scripts_js')
            <!-- END PAGE LEVEL SCRIPTS -->


            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="{{url('/')}}/admin/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/lightGallery-master/dist/js/lightgallery-all.js"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/lightGallery-master/lib/jquery.mousewheel.min.js"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/Print.js-1.0.30/dist/print.min.js"></script>
            <script src="{{url('/')}}/admin/assets/toastr.min.js"></script>
            <script src="{{url('/')}}/admin/assets/sweetalert2/sweetalert2.min.js"></script>
             @yield('theme_layout_scripts_js')
            <!-- END THEME LAYOUT SCRIPTS -->
            
            @yield('scripts')
            

            <script>
		

                $(document).ready(function(){	
		            toastr.options = {
		                newestOnTop: true,
		                progressBar: true,
		                rtl: true,
		                positionClass:'toast-bottom-left'
		            };

                    $('#clickmewow').click(function()
                    {
                        $('#radio1003').attr('checked', 'checked');
                    });
					 notify_counters();
                   
					 
		
			 /////////////////////////////////////////////////////////////
     
               //////////////////////////////////////////////////////////////////////
                 $("#header_notification_bar").click(function(){
						$.get('{!! URL::asset("/display_nuread") !!}', function (e) { 
							$('#d_n_r').empty();
							$.each(e, function(k, v) {
                                var data = JSON.parse(v.data);
								$('#d_n_r').append("<li><a href='{{url('notifications/')}}/"+v['id']+"' >   <span class='time'>"+data.title+"</span><span class='details'> <span class='label label-xs label-icon label-success'><i class='fa fa-plus'></i> </span> "+data.details+"</span><div style='padding-right: 35px'>"+v['created_at']+"</div></a></li>");   
							}); 
						}); 
						/////////////////////////////////////////////////////////////
						$.get('{!! URL::asset("/counter_seen") !!}', function (e) {
			
						});
					////////////////////////////////////////////////////////
                    });
                });
            </script>

             <script type="text/javascript">
			 
	
	
	
			
			//===============================================
             
				

			 function notify_counters()
			 {
				 $.get('{!! URL::asset("/notify_counters") !!}', function (data) {
					 $.each(data,function(k,v){
					 	// if(k == 'unread_notification'){
					 	// 	Count_notif = v;
					 	// }
					 	if(k == 'unread_calender_data'){
					 		$.each(v,function(k,mesg){
					            var msg = mesg['rem_note']+'<br/><button type="button" class="btn btn-lg green clear" data-id="'+mesg['id']+'">تجاهل</button>';
					            var title = mesg['rem_title'];
					            // if(mesg['alert'] == '0'){
					            	var toast = toastr["success"](msg, title);
					            // }
				        	});




					 	}else if(k == 'unread_notification_data'){
					 		console.log(v.length);
					 		if(v.length < 5 && v.length >0 ){
					 			$.each(v,function(k,mesg){
	                                var data = JSON.parse(mesg.data);
	                                // console.log(data);
						            var msg = data.details+'<br/><a class="btn btn-sm green" target="_blank" href="{{ url("notifications") }}/'+mesg.id+'">مراجعة</a>';
						            var title = data.title;
						           	var toast = toastr["success"](msg, title);
									notifyAudio.play();
					        	});								
					 		}else if(v.length >= 5){
					 			var msg = 'هناك '+v.length+' تنبيه لديك . <br/><a class="btn btn-sm green" target="_blank" href="{{ url("notification_all") }}">مراجعة</a>';
						            var title = 'تنبيهات متعددة';
					 			var toast = toastr["success"](msg, title);	
								notifyAudio.play();							
					 		}							
					 	}else{
					 		if(v==0) {
							//alert('hide=>'+k+'-'+v);
							$('#'+k).hide(); 
							$('#'+k).text(''); 
							}else {
								//alert('show=>'+k+'-'+v);
								$('#'+k).show(); 
								$('#'+k).text(v); 
							 }
					 	}
					 	
					 });
				 	window.setTimeout(notify_counters,30000);

				 });
			 }


         


/********************/



/**********************/


                                  
                         </script>
    <!-- Google Code for Universal Analytics -->

<!-- End -->

<!-- Google Tag Manager -->










<!--#############-EVENT-VIEW-################-->
</body>

</html>