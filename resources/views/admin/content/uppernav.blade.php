 <style type="text/css">
 <?php  use \Carbon\Carbon ; ?>
   
.page-header.navbar .page-logo .logo-default {
    margin: 2px 25px;
}

 .color-view {
  padding : 7px;
  text-align: center !important;
} 
 </style>
 <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo" >
                    <a href="{{url('/')}}">
                        <img src="{{url('/')}}/admin/assets/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" style="height:65px"  /> </a>
                    <div class="menu-toggler sidebar-toggler" style="display: inline;">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse" > </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
			

                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->

                  <!--  <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>  -->

                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <?php 
                                $user_test=Sentinel::getuser();
                                if($user_test->hasAccess('user.admin_clear')){
                            ?>
                                
                             
                                <li class="dropdown dropdown-extended">
                                    <a href="{{ url('/clear-cache') }}" class="dropdown-toggle">
                                        <i class="glyphicon glyphicon-cog"></i>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php  $user_id= Sentinel::getUser()->id; 
                                   $user =\App\User::find($user_id);

                                        ?> 

                           <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default" id="unread_notification" style="display:none;background-color: #f36a5a;">
                                    

                                   </span>
                                </a>
                        
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">أخر </span> الاشعارات</h3>
                                        <a href="{{ url('/notification_all') }}">قراءة الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="d_n_r">
                                       
                                      
                                           
                                          
                                           
                                           
                                        </ul>
                                       
                                    </li>
                                </ul>
                            </li> 

         
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                         <!--   <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bubble"></i>
                                    <span class="badge badge-default" id="unread_messages" style="display:none;background-color: #f36a5a;">  </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>رسائل جديدة</h3>                                       
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="new_messages">
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            -->

                         
                            
                            

                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                         <!--   <li class="dropdown dropdown-extended dropdown-notification" id="header_calender_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-default" id="unread_calender"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>لديك
                                            <span class="bold" id="unread_calender_inner"></span> تذكير
                                        </h3>
                                        <a href="{{url('/calendar/events')}}">عرض الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283"  id="new_calender">
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>  -->
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                @if(Sentinel::check())
                                 @if(Sentinel::getUser()->image == 'not_found' || Sentinel::getUser()->image == '' )
                                  <img alt="" class="img-circle" src="{{url('/')}}/admin/assets/layouts/layout2/img/avatar3_small.jpg" />

                                 @else
                                  <img alt="" class="img-circle" src="{{url('/')}}/admin/user_image/{{Sentinel::getUser()->image}}"/>

                                 @endif

                                   
                                     @else
                                     <img alt="" class="img-circle" src="{{url('/')}}/admin/assets/layouts/layout2/img/avatar3_small.jpg" />

                                       @endif
                                   
                                    <span class="username username-hide-on-mobile"> </span>
                                    <i class="fa fa-angle-down"></i>
                                    @if(Sentinel::check()) 
                                    {{Sentinel::getUser()->first_name }} - {{Sentinel::getUser()->last_name }}
                    
                                      @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                              <!--      <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo_2.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li> -->
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{url('/update_password')}}">
                                            <i class="icon-lock"></i> تغير كلمة المرور </a>
                                    </li> 

                                    <li>
                                    
                                        <a href="{{url('/logout')}}" >
                                            <i class="icon-key"></i> تسجيل الخروج </a>
                                          
                                    </li>

                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                   <!--         <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>  -->

                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>

   <script type="text/javascript">
       
function open_map_gis (){

  // var url1='{!! URL::asset("/tabo/token") !!}';



  //   $.get(url1, function (e) {
     


window.open('http://10.12.161.8:82/gis/');

  
  //   });
  
}

   </script>