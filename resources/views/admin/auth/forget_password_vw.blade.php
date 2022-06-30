



<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>تسجيل الدخول</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #2 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{url('/')}}/admin/assets/fonts_googleapis.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('/')}}/admin/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{url('/')}}/admin/assets/pages/css/login-rtl.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
        <link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
        <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
         <link rel="shortcut icon" href="{{url('/')}}/admin/assets/layouts/layout2/img/favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">

        <style type="text/css">
        .logo > a> img {
            position: absolute;
            left: 25%;
            top: 0%;
            width: 270px;
            z-index: 9;
            -webkit-animation:linear infinite alternate;
            -webkit-animation-name: run;
            -webkit-animation-duration: 5s;
             
        }
        @-webkit-keyframes run {
            0% { transform: translate(-80% ,-100%) rotate(5deg); }
            50%{ transform: translate(-80% ,-100%) rotate(-5deg); }
            100%{  transform: translate(-80% ,-100%) rotate(5deg);  }
        }
        .content{
            position: relative !important;
            overflow: initial !important;
            transform: translateY(50%);
        }
        .logo a{
            float: left;
            width: 100%;
            position: relative;
        }
        .logo{
            float: left;
            position: absolute;
            left: 0;
            top: 0;
            width: 15px;
        }

        @media screen and (max-width: 992px) {
            .logo > a> img{
                width: 250px;
                -webkit-animation:linear infinite alternate;
                -webkit-animation-name: run;
                -webkit-animation-duration: 5s;
            }
            @-webkit-keyframes run {
                0% { transform: translate(-70% ,-90%) rotate(5deg); }
                50%{ transform: translate(-70% ,-90%) rotate(-5deg); }
                100%{  transform: translate(-70% ,-90%) rotate(5deg);  }
            }
        }

        @media screen and (max-width: 620px) {
            .logo > a> img{
                width: 190px;
                -webkit-animation:linear infinite alternate;
                -webkit-animation-name: run;
                -webkit-animation-duration: 5s;
            }
            @-webkit-keyframes run {
                0% { transform: translate(-70% ,-90%) rotate(5deg); }
                50%{ transform: translate(-70% ,-90%) rotate(-5deg); }
                100%{  transform: translate(-70% ,-90%) rotate(5deg);  }
            }
        }

        @media screen and (max-width: 420px) {
            .logo > a> img{
                width: 120px;
                -webkit-animation:linear infinite alternate;
                -webkit-animation-name: run;
                -webkit-animation-duration: 5s;
            }
            @-webkit-keyframes run {
                0% { transform: translate(-70% ,-140%) rotate(5deg); }
                50%{ transform: translate(-70% ,-140%) rotate(-5deg); }
                100%{  transform: translate(-70% ,-140%) rotate(5deg);  }
            }
        }
    </style>

        <!-- BEGIN LOGO -->
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">

            <div class="logo">
                <a href="{{url('/login')}}">
                <img src="{{url('/')}}/admin/assets/layouts/layout2/img/gis_logoo.png" alt="" /> </a>
            </div>

            <!-- BEGIN LOGIN FORM -->
            <form class="form-horizontal" method="post"  id="forget_password" enctype="multipart/form-data">
           {{ csrf_field() }}

                <h3 class="form-title font-green" style="font-family: 'DroidArabicKufiRegular', sans-serif;"> نسيت  كلمة  المرور  </h3>
                <div class="alert alert-danger" id="forget_password_alert" style="display:none" >
                        <ul id="forget_password_error"> 
                        </ul>
                        </div>

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم" name="username" required="required" /> </div>

                    <input type="hidden" name="redirect" id="redirect" value="<?php if(isset($_GET['redirect']))echo $_GET['redirect'];?>">
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">رقم   الجوال  </label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="رقم  الجوال  " name="mobile_no" required="required" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">ارسال   كود  التحقق  </button>
                    <br/>
                      <br/>
                       
                       
                    </label>
                   
                </div>
                
               
            </form>
            <meta name="_token" content="{!! csrf_token() !!}" />
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
           @include('admin.content.fpassword')
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
           @include('admin.content.register')
            <!-- END REGISTRATION FORM -->
        </div>
        <div class="copyright"> 2020 © جميع الحقوق محفوظة لسلطة الاراضى  </div>
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
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{url('/')}}/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url('/')}}/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{url('/')}}/admin/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    <!-- Google Code for Universal Analytics -->

<!-- End -->

<!-- Google Tag Manager -->


<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>
<script type="text/javascript">

 $(document).ready(function (e) {


$("#forget_password").on('submit', function(e) {

     // alert("hi");

   if (e.isDefaultPrevented()) {
     //  alert("hi");
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  // alert("hi");


  e.preventDefault(); 
    
         $.ajax({
                type: 'POST',
                dataType: "json",
                url: '{!! URL::asset("user/forget_password") !!}',
                data: new FormData($("#forget_password")[0]),
                 contentType: false, 
                 processData: false,
                success: function (e) {

            //    alert("hi");
               // exit;
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#forget_password_alert').hide();
                 var url3='{!! URL::asset("/user/reset_password_vw") !!}';
                  window.location = url3;
                 
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#forget_password_alert').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#forget_password_alert').show();
              $('#forget_password_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#forget_password_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });

  }


            
        }); 


       
  });



 

</script>
<!-- End -->
</body>


</html>










