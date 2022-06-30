@extends('admin.layouts.backend')
@section('title','اضافة الاصناف  ')
@section('page_level_plugins_styles')
   <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" /> 

 <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

          <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
       <link href="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_global_styles')
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_level_styles')
@endsection

@section('theme_layout_styles')
@endsection

@section('style')
<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
<link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5"  media="screen">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" href="{{url('/')}}/css/style.css">
<style type="text/css">
.page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {
    min-height: 78px;
    display: block;
    position: relative;
    margin: 0;
    border: 0;
    padding: 17px 15px 15px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 300;
    text-align: center;
}
    
     div#sample_1_length.dataTables_length{
  float: right;
}


.color-view {
    padding: 7px;
    text-align: center !important;
}

.bg-blue-dark {
    background: #442850!important;
}

.cd-horizontal-timeline .events {
    position: absolute;
    z-index: 1;
    right: 0;
    top: 49px;
    height: 2px;
    background: #fdfdfd;
    -webkit-transition: -webkit-transform .4s;
    -moz-transition: -moz-transform .4s;
    transition: transform .4s;
}




/******************/

.mt-element-step .step-line .mt-step-col {
    padding: 10px 0;
    text-align: center;
}

.mt-element-step .step-line .active .mt-step-number {
    color: #dbdb37!important;
    border-color: #dbdb37!important;
}
.mt-element-step .step-line .active .mt-step-content, .mt-element-step .step-line .active .mt-step-title {
    color: #dbdb37!important;
}



.mt-element-step .step-line .last .mt-step-number {
     color: #ee6d75 !important;
    border-color: #ee6d75 !important;

}

.mt-element-step .step-line .mt-step-title {
    font-size: 10px;
    font-weight: 400;
    position: static;
  
}

.font-grey-cascade {
    color: #ee6d75!important;
}


.mt-element-step .step-line .active .mt-step-title:after, .mt-element-step .step-line .active .mt-step-title:before {
    background-color: #dbdb37;
}
/**************/

.mt-element-step .step-line  .last .mt-step-title:after, .mt-element-step .step-line .mt-step-title:before {
    content: '';
    height: 3px;
    width: 50%;
  /*  position:static;*/
    background-color: #ee6d75;
    top: 34px;
    z-index: 4;
    transform: translateY(-100%);
}


.mt-element-step .step-line .mt-step-number {
    font-size: 20px;
    border-radius: 50%!important;
    display: inline-block;
    margin: auto auto 5px;
    padding: 5px;
    border: 3px solid #e5e5e5;
    position: relative;
    z-index: 5;
    height: 40px;
    width: 40px;
    text-align: center;
}




@media (min-width: 768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto;
  }
 
}

@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}


@media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}

</style>



@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="#">اضافة  الاصناف   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


 







<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> الاصناف   </span>
   
</div>


 <div class="actions">


 
<a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" onclick="add_items_data()"><i class="fa fa-plus"></i> اضافة   الاصناف     </a>

 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick="help(46)"></i>

<?php  }  ?>
                            
 </div>
</div>
<div class="portlet-body">
    <h4></h4>
 
   <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="search">
   
   

       <div class="form-body">
        <div  class="row">

            

          


        <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >رقم  الصنف  </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="item_id_pk_data" id="item_id_pk_data"  placeholder="رقم  الصنف   " >
                   

                    </div>
                  </div> 



     <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark"  > اسم  الصنف   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="item_name_data" id="item_name_data"  placeholder="اسم  الصنف  "  >
                   

                    </div>
                  </div> 


         <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >التصنيف</label>
                     <div class="col-sm-8">

                    <select  class="item_class_data  select2"  id="item_class_data" name="item_class_data">
                      <option  value=""> اختر   التصنيف  </option>

                       @foreach($item_classes as $item_classe)
                      <option value="{{$item_classe->class_id}}">{{$item_classe->class_name}}</option>

                      @endforeach

                    </select>
 

              


                   

                    </div>
                  </div>  


                          <div class="form-group col-sm-4  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> اختر  الاصناف   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="favorite"  name="favorite" class="form-control select2 ">
                      <option value=""> الكل    </option>
                      
                      <option value="1">المفضل   </option>

                    
                  

                    </select>
                    
                    </div>
                
            </div>


             


                  <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > الوحدة   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="unit_data" id="unit_data"  placeholder="الوحدة  " >
                   

                    </div>
                  </div>  



                       <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" >  حالة   الاصناف   </label>
                     <div class="col-sm-8">
                  <select  id="type_of_class"  name="type_of_class" class="form-control">

                    <option  value="">اختر   حالة   الاصناف  </option>
                    <option value="1"> الاصناف    المتوفرة    </option>
                    <option value="2"> الاصناف   غير متوفرة   </option>
                    

                  </select>
                     
                   

                    </div>
                  </div>  

      




<div class="col-md-offset-9 col-md-3">
                  
                    <button type="submit" id="save" class="btn btn green">بحث <i class="fa fa-search"></i></button>
                     <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style="display:none;width:30px;height:30px;" id="loading5">
                      <button type="button" class="btn  btn-info" id="print"><i class="fa fa-print"></i> جرد  أصناف  </button>
                    
                </div>


        </div>
         
        </div>

        </form>

        </div>                               
                                   
</div> </div>





   <div class="row " >
<div class="portlet light borderd">
    <div class="portlet-title">
<div class="caption">


</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="stock_item_main_vw">
                <thead>
                  <tr>
                    <th>مفضلة  </th>
                     <th>عهدة أم لا </th>
                      <th>فعال / غير فعال  </th>
                    <th>اضافة  للمفضلة   </th>
                    <th>رقم  الصنف  </th>
                    <th>اسم  الصنف  </th>
                    <th>التنصيف  </th>
                    <th>الوحدة  </th>
                    <th> العدد   </th>
                    <th> الحد  الأدنى  </th>
                    <th>سعر  الشراء  </th>
                 
                    <th>ملاحظات   </th>
                    <th>كرت   <br> اللوازم  <br>  المستهلكة   </th>
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 









 <div class="modal fade" id="add_items_data_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee" >



         <div class="row " >
<div class="portlet light borderd">
    <div class="portlet-title">
<div class="caption">
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> الاصناف   </span>

</div>
 
</div>
<div class="portlet-body borderd">


<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="add_items_data_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_items_data_alert" style="display:none" >
                        <ul id="add_items_data_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


           <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">اسم  الصنف   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">
                    <input type="text" class="form-control typeahead" placeholder="اسم  الصنف  " id="item_name" name="item_name"  style="direction: rtl"  >
                  </div>
                    
                    </div>
                
            </div>



            <div class="form-group col-sm-6 type">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الصنف  الاساسى   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="item_class"  name="item_class" class="form-control select2 " >
                      <option value="">اختر الصنف   الاساسى  </option>

                        @foreach($item_classes as $item_classe)
                      <option value="{{$item_classe->class_id}}">{{$item_classe->class_name}}</option>

                      @endforeach

                   

                   
                    </select>
                    </div>
                
            </div>

             <div class="form-group col-sm-6 status">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الوحدة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="item_unit"  name="item_unit" class="form-control select2 ">
                      <option value="">اختر الوحدة  </option>
                      @foreach($item_units  as $item_unit)
                      <option value="{{$item_unit->status_id}}">{{$item_unit->status_name}}</option>

                      @endforeach
                  

                    </select>
                    
                    </div>
                
            </div>

            

              



                <div class="form-group col-sm-6 buy_price ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">سعر  المنتج   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="سعر  المنتج  " id="buy_price" name="buy_price"   >
                    </div>
                
            </div>



              <div class="form-group col-sm-6  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> الحد  الأدني    <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="الحد  الأدني  " id="min_qnt" name="min_qnt"   >
                    </div>
                
            </div>



             <div class="form-group col-sm-6 currency ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">العملة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="currency"  name="currency" class="form-control select2 ">
                      <option value="">العملة   </option>
                      @foreach($currencys  as $currency)
                      <option value="{{$currency->status_id}}">{{$currency->status_name}}</option>

                      @endforeach
                  

                    </select>
                    
                    </div>
                
            </div>



              <div class="form-group col-sm-6 custody ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> عهدة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="custody"  name="custody" class="form-control  ">
                      <option value=""> اختر   عهدة  / ام لا     </option>
                      <option value="1">نعم </option>
                      <option value="0">لا</option>

                     
                  

                    </select>
                    
                    </div>
                
            </div>


              <div class="form-group col-sm-6 enabled ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> فعال    <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="enabled"  name="enabled" class="form-control  ">
                      <option value="">  اختر   فعال  /  غير   فعال     </option>
                      <option value="1">نعم </option>
                      <option value="0">لا</option>

                     
                  

                    </select>
                    
                    </div>
                
            </div>


            <div class="form-group col-sm-6 favorite ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> المفضلة     <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <select id="favorite"  name="favorite" class="form-control  ">
                      <option value=""> اختر   مفضلة  أم  لا       </option>
                      <option value="1">نعم </option>
                      <option value="0">لا</option>

                     
                  

                    </select>
                    
                    </div>
                
            </div>




             

           
            
             <div class="form-group col-sm-6 note1">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الملاحظات <span style="color:red;">*</span>  </label>
                <div class="col-md-8">
                 <input type="text" class="form-control" placeholder="الملاحظات  " id="note1" name="note1" >
                    
                    </div>
                
            </div>


    

					
		<!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button><img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >
                   <a href='{!! URL::asset("/")!!}' class="btn red"> <i class="fa fa-close"></i> اغلاق  </a>
                    
                 
                </div>
                 <div class=" col-md-6">  </div>
            </div>
        

        </div></div></div>
    </form>
    <!-- END FORM-->
</div>


</div></div></div> 


  
  
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>





<div class="modal fade " id="help_modal" role="dialog" >
    <div class="modal-dialog" style="width:1100px">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تعليمات  </h4>
        </div>
      
        <div class="modal-body">
 
 
   
        
      
 <div class="col-sm-12">

  <div class="portlet light borderd">

 
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

<div class="mt-comment">
                                                        <div class="mt-comment-img">
                                                           <i class="fa fa-question-circle fa-2x"></i> </div>
                                                        <div class="mt-comment-body">
                                                            <div class="mt-comment-info">
                                                                <span class="mt-comment-author" id="screen_name"></span>
                                                             
                                                            </div>
                                                            <div class="mt-comment-text" id="description"> </div>
                                                           
                                                        </div>
                                                    </div>
   
 



</div></div></div></div></div></div>
        <div class="modal-footer">
        
          
        </div>
     
      </div>
      
    </div>
  </div>

 


<meta name="_token" content="{!! csrf_token() !!}" />


@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

 <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>


 <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
             <script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

               <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
@endsection


@section('page_level_scripts_js')
 
   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
      <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/admin/assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

    <script src="{{url('/')}}/admin/assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
     <script src="{{url('/')}}/admin/assets/pages/scripts/components-typeahead.min.js" type="text/javascript"></script>
@endsection



@section('scripts')  


<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>


<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">

   $(document).ready(function () {

    stock_item_main_vw();
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


stock_item_main_vw();
});


});  






$("#add_items_data_form").on('submit', function(e) {
   var id="{{  Route::current()->getParameter('id') }}";
 
   // $('#loading1').show();
    //$('#add').hide();
   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/items/add_items_data") !!}',
      data:new FormData($("#add_items_data_form")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
             $('#loading1').hide();
               $('#add').show();
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#add_items_data_alert').hide();
                  $('#add_items_data_form')[0].reset();
                  
                  $("#add_items_data_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#add_items_data_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');

                     $("#add_items_data_modal").modal("toggle");
                  stock_item_main_vw();
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_items_data_alert').hide();
                    swal(
                          'تنبية',
                             e['response'],
                              'error',);
                   
                   
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                  
            }
       
        
            },
            error: function(e) 
            {
                 $('#loading1').hide();
               $('#add').show();
              $('#add_items_data_alert').show();
              $('#add_items_data_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#add_items_data_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 






function stock_item_main_vw(){
 
    $('#stock_item_main_vw').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 25,
     "autoWidth": false,
     "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

   $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();

  },
      "ajax": {
            "url": '{!! URL::asset("/stock_store/items/stock_item_main_vw") !!}',
            "data": function ( d ) {


            //   d.item_id=$("#item_id_data").val();
              d.item_name=$("#item_name_data").val();
             d.item_class_data=$("#item_class_data").val();
             d.unit=$("#unit_data").val();
             d.item_id_pk=$("#item_id_pk_data").val();
             d.type_of_class=$("#type_of_class").val();
             d.favorite=$("#favorite").val();
           

           
          
            }
            },
   
     
      columns: [

                
                {data: 'is_fav', name: 'is_fav',width:"5%"},
                 {data: 'custody_item', name: 'custody_item',width:"5%"},
                  {data: 'enabled_item', name: 'enabled_item',width:"5%"},
                 {data: 'fav_item', name: 'fav_item',width:"5%"},
                 {data: 'item_id_pk', name: 'item_id_pk',width:"5%"},
                 {data: 'item_name', name: 'item_name',width:"15%"},
                 {data: 'class_name', name: 'class_name',width:"15%"},
                 {data: 'item_unit', name: 'item_unit',width:"5%"},
                 {data: 'item_count', name: 'item_count',width:"5%"},
                 {data: 'min_qnt', name: 'min_qnt',width:"5%"},
                 {data: 'buy_price', name: 'buy_price',width:"5%"},
                 {data: 'note1', name: 'note1',width:"15%"},
                 {data: 'stock_card_vw', name: 'stock_card_vw',width:"5%"},
          
                
                
                 

                
                
              

       
        ]


    });
  }







var substringMatcher = function(strs) {
  //alert(strs);
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
    //    alert(str);
      }
    });

    cb(matches);
  };
};



var states = '{!!$stock_item_main!!}';
var st1=states.split(",");

for (var i = 0; i < st1.length; i++) {
    st1[i] = st1[i].replace(/"/g, "");
}


//alert(states);


$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'item_name',
  source: substringMatcher(st1)
});


 
function add_items_data(){

$("#add_items_data_modal").modal("toggle");

}



function fav_item(item_id_pk){


   var url3='{!! URL::asset("/stock_store/items/fav_item/'+item_id_pk+'") !!}';

  $.get(url3, function (e) {


stock_item_main_vw();



 });



}



function custody_item(item_id_pk){


   var url3='{!! URL::asset("/stock_store/items/custody_item/'+item_id_pk+'") !!}';

  $.get(url3, function (e) {


stock_item_main_vw();



 });



}

function enabled_item(item_id_pk){


   var url3='{!! URL::asset("/stock_store/items/enabled_item/'+item_id_pk+'") !!}';

  $.get(url3, function (e) {


stock_item_main_vw();



 });



}

function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}



$("#print").click(function(){



var url1='{!! URL::asset("stock_store/items/stock_item_main_vw_report") !!}';

var ser=$('#search').serialize();

   window.location.href = url1+"?"+ser;








});


</script>



@endsection                  

