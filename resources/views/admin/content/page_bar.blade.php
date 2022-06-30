@include('admin.alert_data') 


@yield('menues_bar')


                 <div class="page-bar hide_on_print">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{!! URL::asset("/")!!}">الرئيسية</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            @yield('page_bar')
                            <!--<li>
                                <a href="#">مستخدم جديد</a>
                                <i class="fa fa-angle-right"></i>
                            </li>-->
                           
                        </ul>
                    
                    </div>

                    
     @include('admin.menue_according_permission')              
