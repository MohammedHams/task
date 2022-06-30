
           <?php
         //  echo $prem;
             //echo $g_perm;
           if ( !empty ( $g_perm ) ) {
           $global_per=$g_perm;



          $menues=DB::connection("stock_con")->table('menus')->select('p_id')->where('slug', 'like', $global_per)->count();

          
		  
         
        if ($menues == 0) {
   
}else {

	   $menues_data=DB::connection("stock_con")->table('menus')->select('p_id')->where('slug', 'like', $global_per)->get();
            $p_id_global=$menues_data[0]->p_id;

          $menues_data_gs=DB::connection("stock_con")->table('menus')->select('title','url','icon','slug','visible','p_id','typeoflink','color','ignore_permission')->where('p_id', '=', $p_id_global)->where('visible','=',1)->orderBy('new_order')->get();
          
$menu_for_user=Sentinel::getUser();



             ?>

                 <style type="text/css">

  .laila .dashboard-stat {
   	margin-bottom: 15px;
   }                
                    

  .laila .dashboard-stat .visual {
    width: 40px;
    height: 57px;
    display: block;
    float: right;
    padding-left: 10px;
    margin-bottom: 15px;
    font-size: 18px
    line-height: 20px;
}

.laila .dashboard-stat.dashboard-stat-v2 .visual {
    padding-top: 27px;
    margin-bottom: 6px;
}






.laila .dashboard-stat .visual>i {
    margin: -36px 131px ;
    font-size: 35px;
    line-height: 40px;
   
}

.laila .dashboard-stat.mured .visual>i {
	 opacity: 0.5;
}
.laila  .dashboard-stat .details .number  {
    padding: 1px 23px; 
    text-align: right;
   
    line-height: 15px;
    letter-spacing: -1px;
    margin-bottom: 0;
    font-family: 'DroidArabicKufiRegular', sans-serif;
   
}  
 .laila  .dashboard-stat .details .number span {
	 font-size: 14px !important ;
	 font-weight: 400;
} 

 .laila .dashboard-stat .details {
    position: absolute;
    right: 0px;
    padding-right: 0px;
    left:auto;
	
    padding-left:0px;
}        
                   </style> 

                   <div class=" laila row hide_on_print ">

                    @foreach($menues_data_gs   as  $menues_data_g )

                     @if($menu_for_user->hasAccess($menues_data_g->slug) )

                       <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">

                         @if($menues_data_g->typeoflink)
                            <a class="dashboard-stat dashboard-stat-v2 mured {{$menues_data_g->color}}" href="{{$menues_data_g->url}}" target="_blank">
                          @else  
                          <a class="dashboard-stat dashboard-stat-v2 mured {{$menues_data_g->color}}" href="{{url('/')}}{{$menues_data_g->url}}">  

                          @endif 
                                <div class="visual">
                                    <i class="{{$menues_data_g->icon}}"></i>
                                </div>
                                <div class="details" >
                                    <div class="number">
                                   
                                        <span data-counter="counterup" data-value="">

                                   
                                    {{$menues_data_g->title}}
                                         </span></div>
                                    <div class="desc">  </div>
                                </div>
                            </a>
                        </div>
                       @endif
                     @endforeach 
                       

                      


                        
                    </div>  

                

                    <?php }} ?>