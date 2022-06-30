@extends('admin.layouts.backend')
@section('title',' طلبية شراء  ')
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

table.table-bordered.dataTable td {
    border-left-width: 0;
    font-size: 11px;
}

.table .btn {
    margin-top: 0;
    margin-right: 0;
    margin-left: 3px;
    font-size: 10px;
}

.label {
    text-shadow: none!important;
    font-size: 12px;
    font-weight: 300;
    padding: 3px 6px;
    color: #fff;
}
</style>


@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')
@section('page_bar')
<li>
        <a href="#">اضافة   طلبية   </a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')


 
  <div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة  طلبية   شراء   </span>
  
</div>


        
    </div>
 </div></div>







<div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class=" fa fa-search font-dark font-red-flamingo"></i>
    <span class="caption-subject font-dark bold uppercase font-red-flamingo"> طلبيات  شراء    </span>
   
</div>


 <div class="actions">

  <a href="#" class="btn btn-circle red-thunderbird btn-outline btn-sm" onclick="add_purchasing()"><i class="fa fa-plus"></i>  اضافة  طلبية  شراء      </a>


 <?php   $user_test=Sentinel::getUser();
      
      if($user_test->hasAccess('admin_help')){  ?>
 <i class="fa fa-question-circle fa-2x font-green" style="color:#5e738b" onclick="help(48)"></i>

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
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > رقم   الفاتورة   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="order_no" id="order_no"   >
                   

                    </div>
                  </div> 



     <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > رقم  الطلبية    </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="serial" id="serial"  placeholder="الرقم  " >
                   

                    </div>
                  </div> 


         <div class="col-sm-4 form-group">
                     <label class="col-sm-4  color-view control-label bg-blue-dark bg-font-blue-dark" > سنة  الطلبية   </label>
                     <div class="col-sm-8">

                     <input type="text" class="form-control  " name="year1" id="year1"  placeholder=" السنه    " >
                   

                    </div>
                  </div>  


             


           <div class="form-group col-sm-4 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الجهة  الموردة   </label>
                <div class="col-md-8">
                


  <select id="side_id"  name="side_id" class="form-control select2 " >
                      <option value="">اختر الصنف   الاساسى  </option>

                        @foreach($stock_in_out_sides as $stock_in_out_side)
                      <option value="{{$stock_in_out_side->side_id}}">{{$stock_in_out_side->side_name}}</option>

                      @endforeach

                   

                   
                    </select>

              
                    
                    </div>
                
            </div>
      




<div class="col-md-offset-9 col-md-3">
                  
                    <button type="submit" id="save" class="btn btn-lg green">بحث <i class="fa fa-search"></i></button>
                     <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style="display:none;width:30px;height:30px;" id="loading5">
                    
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
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> طلبيات   الشراء     </span>

</div>
 
</div>
<div class="portlet-body borderd">

  <div class="caption">
   
   <div class="form-body">

      <div class="row">
      <div class="col-sm-12">

          <table class="table table-striped table-bordered table-hover" id="stock_purchasing_vw">
                <thead>
                  <tr>
                    <th>رقم   الطلبية  </th>
                   
                    <th>الجهة  الموردة  </th>
                    
                    <th>التاريخ  </th>

                    <th> تعديل  </th>
               
                         <th>اضافة العناصر  </th> 
                         <th>طباعة</th>
                         <th>الاعتماد</th>
                         <th>حذف</th>
                         <th>المرفقات</th>
                         <th>عرض المرفقات</th>
                         
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>


   </div></div></div></div></div></div></div> 





<div class="modal fade in" id="add_purchasing_item_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee">




        <div class="row " >
<div class="portlet light ">
    <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase"> اضافة عناصر طلبية الشراء   </span>
    <br>
 <i class="fa fa-info font-red-thunderbird"></i>

 
     
</div>


        
    </div>

<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                
    <form  class="form-horizontal"  method="post"   id="add_purchasing_item_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_purchasing_item_alert" style="display:none" >
                        <ul id="add_purchasing_item_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


           <div class="form-group col-sm-6  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">عناصر   طلبية   الشراء   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">

                    <input type="hidden" name="inv_id_pk_in" id="inv_id_pk_in">

                    <input type="hidden" name="pur_id_in" id="pur_id_in">



  <select id="item_id_pk_in"  name="item_id_pk_in" class="form-control  " >
                      <option value=""> اختر  الصنف   </option>

                        @foreach($stock_item_mains as $stock_item_main)
                      <option value="{{$stock_item_main->item_id_pk}}">{{$stock_item_main->item_name}}</option>

                      @endforeach

                   

                   
                    </select>

                   
                  </div>
                    
                    </div>
                
            </div>



         

            

                <div class="form-group col-sm-6 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> الكمية المطلوبة  </label>
                <div class="col-md-8">
                    <input type="text" class="form-control " placeholder="الكمية المطلوبة  " id="count1_in" name="count1_in" >
                     
                    </div>
                
            </div>


                <div class="form-group col-sm-6 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> سعر الوحدة  </label>
                <div class="col-md-8">
                    <input type="text" class="form-control " placeholder="سعر الوحدة  " id="unit_price_in" name="unit_price_in" >
                     
                    </div>
                
            </div>

               <div class="form-group col-sm-6 sesnum">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> السعر  </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"  placeholder=" السعر  " 
                    id="price_in" name="price_in"  >
                     
                    </div>
                
            </div>
         

            <div class="form-group col-sm-6 sesnum">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> رقم الكتالوج  </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"  placeholder=" رقم الكتالوج   " 
                    id="catalog_no_in" name="catalog_no_in"  >
                     
                    </div>
                
            </div>


            <div class="form-group col-sm-6 sesnum">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> رقم التعريف   </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"  placeholder=" رقم التعريف   " 
                    id="id1_in" name="id1_in"  >
                     
                    </div>
                
            </div>



                <div class="form-group col-sm-6 order_no_in ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> العملة    <span style="color:red;">*</span></label>
                <div class="col-md-8">

                    <select id="cur_in_item"  name="cur_in_item" class="form-control select2 " >
                      <option value="">العملة  </option>

                        @foreach($cur_ins as $cur_in)
                      <option value="{{$cur_in->status_id}}">{{$cur_in->status_name}}</option>

                      @endforeach

                   

                   
                    </select>



                   


                    </div>
                
            </div>

            
              <div class="form-group col-sm-6 ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> ملاحظات   </label>
                <div class="col-md-8">
                    <input type="text" class="form-control"  placeholder="ملاحظات   " 
                    id="note2_in" name="note2_in"  >
                     
                    </div>
                
            </div>




    

          
    <!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">

              
                   

                   <span id="add_button_item"><button  type="submit" class="btn green" id="add_item"><i class="fa fa-plus"></i> اضافة  </button> </span>
                

    
                    
                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >

                    <button type="button" class=" btn red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                    <i class="fa fa-close"></i> اغلاق</span></button>

                  
                    
                 
                </div>
                 <div class=" col-md-6">  </div>
            </div></div>
        

        </div></div></div>
    </form>
    <!-- END FORM-->
</div> </div></div>



      <div class="portlet light bordered">
<div class="row">
<div class="col-md-12">
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">بينات    الطلبية  </span>
        </div>
        <hr>
        <div class="tools"> </div>
    <!--==========================================================-->  
       <div class="table-scrollable">
        


          <table class="table table-striped table-bordered table-hover" id="stock_purchasing_item_vw">
        <thead>
               <tr>
               <th>رقم  الصنف  </th>
               <th>اسم   الصنف   </th>
                <th>مطلوب  </th>
                <th>سعر الوحدة  </th>
                <th>الاجمالى  </th>
                <th>العملة  </th>
                <th>تعديل</th>
             <!--    <th>حذف   </th> -->
             
              
                
               </tr>

          
        </thead>
         <tbody id="item_data"></tbody>
     <tfoot>
       

        </tfoot>
</table>

</div>  

    <!--===========================================================-->
      </div></div></div></div> 
  <!--===========================================================-->
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                       
                        </div>
                    </div>
                </div>
            </div>




 <!--======================================================-->
  <div class="modal fade" id="add_purchasing_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> طلبية الشراء   </span>

</div>
 
</div>
<div class="portlet-body borderd">



<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="add_purchasing_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="add_purchasing_alert" style="display:none" >
                        <ul id="add_purchasing_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


           <div class="form-group col-sm-6 decnum ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الجهة  الموردة   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                  <div id="the-basics">


  <select id="side_id_in"  name="side_id_in" class="form-control select2 " >
                      <option value=""> اختر   الجهة  الموردة   </option>

                        @foreach($stock_in_out_sides as $stock_in_out_side)
                      <option value="{{$stock_in_out_side->side_id}}">{{$stock_in_out_side->side_name}}</option>

                      @endforeach

                   

                   
                    </select>

                   
                  </div>
                    
                    </div>
                
            </div>


            <input type="hidden" class="form-control "   id="add_purchasing_inv_id_pk_in" name="add_purchasing_inv_id_pk_in"  >
         

               <div class="form-group col-sm-6 sesnum">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> تاريخ  الشراء    <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder=" تاريخ  الشراء   " 
                    id="date3_in" name="date3_in"  data-error=" اريخ  الشراء   ">
                     
                    </div>
                
            </div>



                <div class="form-group col-sm-6 order_no_in ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> رقم طلبية الشراء<span style="color:red;">*</span></label>
                <div class="col-md-8">
                  
                    <input type="text" class="form-control" placeholder=" رقم طلبية الشراء " id="serial_in" name="serial_in"   >
                    </div>
                
            </div>

              <div class="form-group col-sm-6 order_no_in ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">   سنة طلبية الشراء      <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="   سنة طلبية الشراء   " id="year_in" name="year_in"   >
                    </div>
                
            </div>



                <div class="form-group col-sm-6 order_no_in ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">  العملة    <span style="color:red;">*</span></label>
                <div class="col-md-8">

                    <select id="cur_in_data"  name="cur_in" class="form-control select2 " >
                      <option value="">العملة  </option>

                        @foreach($cur_ins as $cur_in)
                      <option value="{{$cur_in->status_id}}">{{$cur_in->status_name}}</option>

                      @endforeach

                   

                   
                    </select>



                   


                    </div>
                
            </div>




           
            
             <div class="form-group col-sm-6 note1_in">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">الملاحظات  <span style="color:red;">*</span> </label>
                <div class="col-md-8">
                 <input type="text" class="form-control" placeholder="الملاحظات  " id="note1_in" name="note1_in" >
                    
                    </div>
                
            </div>
			
			
			 <div class="form-group col-sm-6 note1_in">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark">تم  الاستلام  <span style="color:red;">*</span> </label>
                <div class="col-md-8">
				 <input type="radio" id="recieved_in1" name="recieved_in" value="1" checked="checked" >
               <label > يوجد فاتورة  </label><br>
                <input type="radio" id="recieved_in2" name="recieved_in" value="0" >
               <label >  لايوجد فاتورة  </label><br>
               
                    
                    </div>
                
            </div>


    

          
    <!--==========================================================================-->



               

            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
               

                  <span id="add_button">
                   

                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة   </button> </span> 


                    <img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >

                    <button type="button" class=" btn red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                    <i class="fa fa-close"></i> اغلاق</span></button>
                    
                 
               
                 <div class=" col-md-6">  </div>
            </div>
        

        </div></div></div></div>
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





<!---==============العهد  ======================-->
<div class="modal fade " id="custody_data_modal" role="dialog" >
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

          <table class="table table-striped table-bordered table-hover" id="cust_vw_data">
                <thead>
                  <tr>
                      <th>رقم  الفاتورة  </th>
                        <th> الصنف   </th>
                        <th>كود  العنصر  </th>
                        <th>نوع  الحركة </th>
                        <th>تاريخ   الحركة  </th>
                        <th>الموظف</th>
                        <th>القسم  </th>
                        <th> الملاحظات   </th>
                         <th> اضافة   الملاحظات   </th>
                        




                  
                   
                    
                  
                  </tr>
                </thead>
                <tbody>
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>

                   
                </tfoot>
            </table>
   
 



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

    var delete_url = '{!! URL::asset("/stock_store/items/delete_selected_attach_stockin/") !!}'+'/';
  var show_url = '{!! URL::asset("/stock_store/items/show_image") !!}'+'/';
  var thumbnail_url='{!! URL::asset("/stock_store/items/show_thumb_stockinvw") !!}'+'/';
  var download_url='{!! URL::asset("/stock_store/items/show_image") !!}'+'/';
  var delete_url_2 ='{!! URL::asset("/stock_store/items/delete_selected_attach_stockin/") !!}'+'/';
  var my_data =333;

var temp_inv_id_pk=0;

   $(document).ready(function () {
			$('#item_id_pk_in').select2({
					dropdownParent: $('#add_purchasing_item_modal')
				});
    stock_purchasing_vw();
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

   $("#search").on('submit', function(e) {
        e.preventDefault();
         $("#save").attr("disabled",true);
       $("#loading5").show();


       stock_purchasing_vw();
});


});  


/******************************** */

function add_purchasing(){

$("#add_purchasing_modal").modal("toggle");

$('#add_purchasing_form')[0].reset();
$("#add_purchasing_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
 $("#add_purchasing_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');

$('#cur_in_data').val('').trigger('change');
$("#side_id_in").val('').trigger('change');
$("#add_purchasing_inv_id_pk_in").val('');
$('input[name="_token"]').val('{!! csrf_token() !!}');

$("#add_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button>');


}
/************************** */





$("#add_purchasing_form").on('submit', function(e) {


   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/purchasing/add_purchasing_data") !!}',
      data:new FormData($("#add_purchasing_form")[0]),
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
                 $('#add_purchasing_alert').hide();
                  $('#add_purchasing_form')[0].reset();

                  $("#add_purchasing_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#add_purchasing_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
                  
                  $('#cur_in_data').val('').trigger('change');
                  $("#side_id_in").val('').trigger('change');
                  $("#add_purchasing_inv_id_pk_in").val('');
                 
					
                   $('#add_purchasing_modal').modal("toggle");

                   $("#add_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> اضافة  </button>');
                   $('input[name="_token"]').val('{!! csrf_token() !!}');
                 


                  stock_purchasing_vw();
				temp_inv_id_pk=e['inv_id_pk'];
					               //add_purchasing_item(e['inv_id_pk'])

               
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#add_purchasing_alert').hide();
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
              $('#add_purchasing_alert').show();
              $('#add_purchasing_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#add_purchasing_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 


/******************************************* */
function add_purchasing_item(inv_id_pk){


$("#add_purchasing_item_modal").modal("toggle");
 $('#add_purchasing_item_form')[0].reset();
 $("#add_purchasing_item_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
 $("#add_purchasing_item_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
 $("#cur_in_item").val('').trigger('change');
$('#item_id_pk_in').val('').trigger('change');
$("#pur_id_in").val('');

$("#add_button_item").html('<button  type="submit" class="btn green" ><i class="fa fa-plus"></i> اضافة  </button>');

$("#inv_id_pk_in").val(inv_id_pk);

stock_purchasing_item_vw(inv_id_pk);

//stock_invoice_in_vw_one_data(inv_id_pk);

}



/************************************** */
$("#add_purchasing_item_form").on('submit', function(e) {


if (e.isDefaultPrevented()) {

    
 } else {

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     })




e.preventDefault(); 

 $.ajax({
   url:'{!! URL::asset("/stock_store/purchasing/add_purchasing_item") !!}',
   data:new FormData($("#add_purchasing_item_form")[0]),
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
              $('#add_purchasing_item_alert').hide();
              $("#add_button_item").html('<button  type="submit" class="btn green" ><i class="fa fa-plus"></i> اضافة  </button>');
              $('#add_purchasing_item_form')[0].reset();
              $("#add_purchasing_item_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
              $("#add_purchasing_item_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
              $("#pur_id_in").val('');
              $("#cur_in_item").val('').trigger('change');
                   $('#item_id_pk_in').val('').trigger('change');
              stock_purchasing_item_vw(e['inv_id_pk']);
              $("#inv_id_pk_in").val(e['inv_id_pk']);

           
                
         }

        else if (e['result'] == 'error')
         {
               jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                $('#add_purchasing_item_alert').hide();
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
           $('#add_purchasing_item_alert').show();
           $('#add_purchasing_item_error').empty();
           var error = e.responseJSON;
           $.each(error, function (i, member) {
           for (var i in member) {
           $('#add_purchasing_item_error').append('<li >'+ member[i] +'</li>' );
          }
        });

          jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
         }           
  });

}
         
     }); 




/****************************************** */
function stock_purchasing_vw(){
 
    $('#stock_purchasing_vw').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "autoWidth": false,
     "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

  // $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();
   
   if(temp_inv_id_pk>0)	$('#add_purchasing_item_'+temp_inv_id_pk).trigger('click');
	 
	temp_inv_id_pk  =0;  

  },
      "ajax": {
            "url": '{!! URL::asset("/stock_store/purchasing/stock_purchasing_vw_data") !!}',
            "data": function ( d ) {


           
               d.serial=$("#serial").val();
               d.year1=$("#year1").val();
               d.side_id=$("#side_id").val();

           
          
            }
            },
   
     
      columns: [

      

      {data: 'serial_year_data', name: 'serial_year_data',width:"10%"},

    
                
                {data: 'side_name', name: 'side_name',width:"15%"},
            
                {data: 'date3', name: 'date3',width:"5%"},
              

                

                {data: 'edit_purchasing_data', name: 'edit_purchasing_data',width:"5%"},
                
            
                 {data: 'add_purchasing_item', name: 'add_purchasing_item',width:"5%"},
                 {data: 'purchasing_report', name: 'purchasing_report',width:"5%"},
                 {data: 'approve_purchasing', name: 'approve_purchasing',width:"5%"},
                 {data: 'cancel_purchasing', name: 'cancel_purchasing',width:"5%"},
                 {data: 'attachment', name: 'attachment',width:"5%"},
                 {data: 'attachment_display', name: 'attachment_display',width:"5%"},

                 
                 
                 
             
                 

                  
                 
                  ]


    });
  }





function stock_purchasing_item_vw(inv_id_pk){
 
    $('#stock_purchasing_item_vw').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
     "pageLength": 10,
     "autoWidth": false,
     "info": false,
    "searching": false,
    "ordering": false,
   "fnDrawCallback": function(settings, json) {

  // $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
   $("#save").attr("disabled",false);
   $("#loading5").hide();

  },
      "ajax": {
            "url": '{!! URL::asset("/stock_store/purchasing/stock_purchasing_item_vw/'+inv_id_pk+'") !!}',
            "data": function ( d ) {

            }
            },
   
     
      columns: [

      

                 {data: 'item_id_pk', name: 'item_id_pk',width:"10%"},

                 {data: 'item_name', name: 'item_name',width:"10%"},
                
                {data: 'count1', name: 'count1',width:"15%"},
                {data: 'unit_price', name: 'unit_price',width:"15%"},
                {data: 'price', name: 'price',width:"5%"},
                
                 {data: 'cur_name', name: 'cur_name',width:"5%"},

                 {data: 'edit_purchasing_item', name: 'edit_purchasing_item',width:"5%"},

                 
                  // {data: 'delete_item_invoice_in', name: 'delete_item_invoice_in',width:"5%"},
               
                  ]


    });
  }























function stock_invoice_in_vw_one_data(inv_id_pk){

   var url2='{!! URL::asset("/stock_store/items/stock_invoice_in_vw_one_data/'+inv_id_pk+'") !!}'; 
   $.get(url2,{ }, function (ec) {


    $("#stock_invoice_in_vw_one_data").html(ec[0]['side_name']+" _ ("+ec[0]['serial']+"/"+ec[0]['year1']+")");
    

  })



}


/*****************************************/
function approve_purchasing(inv_id_pk){


 if(confirm(" هل  انت متأكد   من   تأكيد الطلبية   ?"))
    {

   var url2='{!! URL::asset("/stock_store/purchasing/approve_purchasing/'+inv_id_pk+'") !!}'; 
   $.get(url2,{ }, function (ec) {

if(ec['result'] =='ok') {

    swal( 'تنبية', ec['response'], 'success',);

    stock_purchasing_vw( );

    

}else{

 swal( 'تنبية', ec['response'], 'error',);

}
                            


    

  })



}else{



}


}

/********************************** */
function cancel_purchasing(inv_id_pk){


if(confirm(" هل  انت متأكد   من   الغاء الطلبية   ?"))
   {

  var url2='{!! URL::asset("/stock_store/purchasing/cancel_purchasing/'+inv_id_pk+'") !!}'; 
  $.get(url2,{ }, function (ec) {

if(ec['result'] =='ok') {

   swal( 'تنبية', ec['response'], 'success',);

   stock_purchasing_vw( );

   

}else{

swal( 'تنبية', ec['response'], 'error',);

}
                           


   

 })



}else{



}


}



/****************************************/

function edit_purchasing_data(inv_id_pk){
$("#add_purchasing_modal").modal("toggle");

$("#add_purchasing_inv_id_pk_in").val(inv_id_pk);
$("#add_button").html('<button  type="submit" class="btn green" id="add"><i class="fa fa-edit"></i> تعديل  </button>');

var url2='{!! URL::asset("/stock_store/purchasing/stock_purchasing_vw_one_data/'+inv_id_pk+'") !!}'; 

$.get(url2,{ }, function (ec) {

$("#date3_in").val(ec[0]['date3']);
$("#serial_in").val(ec[0]['serial']);
$("#year_in").val(ec[0]['year1']);
$("#note1_in").val(ec[0]['note1']);

$('#cur_in_data').val(ec[0]['cur_id']).trigger('change');
$("#side_id_in").val(ec[0]['side_id']).trigger('change');

$('input[name="recieved_in"]:checked').val(ec[0]['recieved']);


})




}




/************************************** */
function edit_purchasing_item(pur_id,inv_id_pk){
 // $("#add_purchasing_item_modal").modal("toggle");
  $("#pur_id_in").val(pur_id);
  $("#inv_id_pk_in").val(inv_id_pk);

$("#add_button_item").html('<button  type="submit" class="btn green" ><i class="fa fa-edit"></i> تعديل  </button>');

var url2='{!! URL::asset("/stock_store/purchasing/stock_purchasing_item_data/'+pur_id+'") !!}'; 
$.get(url2,{ }, function (ec) {


$("#count1_in").val(ec[0]['count1']);
$("#unit_price_in").val(ec[0]['unit_price']);
$("#price_in").val(ec[0]['price']);
$("#catalog_no_in").val(ec[0]['catalog_no']);
$("#id1_in").val(ec[0]['id1']);
$("#note2_in").val(ec[0]['note2']);
$("#cur_in_item").val(ec[0]['cur_id']).trigger('change');
$('#item_id_pk_in').val(ec[0]['item_id_pk']).trigger('change');

})


}




/**************************************** */

function help(id){

  var help ='{!! URL::asset("/gov/help/get_help/'+id+'") !!}';
$("#help_modal").modal('toggle');

    $.get(help, function (e) {
  

$("#screen_name").text(e[0]['screen_name']);
$("#description").html(e[0]['description']);




    });




}


/*******************العهد  ****************/

function custody_data(inv_id_pk){
$("#custody_data_modal").modal("toggle");

cust_vw_data(inv_id_pk);




}


function cust_vw_data(inv_id_pk){
 
    $('#cust_vw_data').DataTable({
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
            "url": '{!! URL::asset("/stock_store/custody/cust_vw_data/'+inv_id_pk+'") !!}',
            "data": function ( d ) {
   
               d.item_id_pk=$("#item_id_pk").val();
               d.emp_id=$("#emp_id").val();
               d.dept_id=$("#dept_id").val();
               d.item_code=$("#item_code").val();
               d.inv_type=$("#inv_type").val();
               d.trans_type=$("#trans_type").val();
               d.order_no=$("#order_no").val();
          
            }
            },
   
     
      columns: [
                {data: 'order_no', name: 'order_no'},
                {data: 'item_name', name: 'item_name'},
                {data: 'item_code', name: 'item_code'},
                {data: 'trans_name', name: 'trans_name'},
                {data: 'custody_date', name: 'custody_date'},
                {data: 'emp_name', name: 'emp_name'},
                {data: 'side_name', name: 'side_name'},
                {data: 'note', name: 'note'},
                {data: 'update_stock_cust', name: 'update_stock_cust'},
                    
               
                  
         
        ]


    });
  }



/*********************************************/
function attach_file(inv_id_pk){
$('#upload_attachment').modal('toggle');

$('#upload_info').html('<div id="inv_id_pk_attach" style="display:none" >'+inv_id_pk+'</div>');

display_images(inv_id_pk);
 

}


function view_attache(inv_id_pk){

  $('#view_attachment').modal('toggle');
  $('#view_attachment_info').html('<div id="inv_id_pk_attach1" style="display:none" >'+inv_id_pk+'</div>');
  
   display_images(inv_id_pk);

}


///////////////////////////////////////////////////////
function display_images(inv_id_pk){
var url1='{!! URL::asset("/stock_store/items/display_stockin_images/'+inv_id_pk+'") !!}';
$('#inv_id_pk_attach').text(inv_id_pk);
$('#inv_id_pk_attach1').text(inv_id_pk);

$('#attache').empty();
$('#attache1').empty();

     $.get(url1, function (e) {
       displayAttachuser(e);

          displatAttach(e);


    //  alert('5555');
       

//alert('6666');
     });



  
}

///////////////////////////////add_images//////////////////////////
$(document).ready(function(){
 $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
  var accept = ".pdf,.doc,.docx,.jpg,.png,.doc,.docx,.xls,xlsx";
 
  
 $(".dropzone").dropzone({
  url: '{!! URL::asset("/stock_store/items/stockin_attachment") !!}',
    uploadMultiple: true,
    method:'post',
    paramName:'file',
    acceptedFiles: accept,
    
    sending : function(file,xhr,formData){
     
      formData.append('_token',"{!! csrf_token() !!}");
      var inv_id_pk = $('#inv_id_pk_attach').text();
      

      formData.append('inv_id_pk',inv_id_pk);
       
   
     

    },
     success : function (file,response){
      
      this.removeFile(file);
    },
     complete : function (file,response){
     
    },
     queuecomplete : function (file,response){
   
     display_images($('#inv_id_pk_attach').text());

    }


});

$('.fancybox-buttons').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',

        prevEffect : 'none',
        nextEffect : 'none',

        closeBtn  : false,

        helpers : {
          /*title : {
            type : 'inside'
          },*/
          thumbs : {
              width: 75,
              height: 50
            },
          buttons : {}
        },

        afterLoad : function() {
          this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
      });
    });

/************************************** */

$( "#count1_in" ).change(function() {

  var count1_in=$( "#count1_in" ).val();
  var unit_price_in=$( "#unit_price_in" ).val();
  var price=  Math.round(count1_in * 100) / 100   * Math.round(unit_price_in*100)/100;

  $("#price_in").val(price) 


});


$( "#unit_price_in" ).change(function() {
  var count1_in=$( "#count1_in" ).val();
  var unit_price_in=$( "#unit_price_in" ).val();
  var price=  Math.round(count1_in * 100) / 100   * Math.round(unit_price_in*100)/100;

  $("#price_in").val(price) 


});




</script>

@include ("admin.upload_img");
@include ("admin.upload_img_user");


@endsection                  

