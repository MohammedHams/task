<!doctype html>
<html lang="ar" class="no-js">
    <head>
        <title>صلاحيات   المستخدم   </title>
     <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
       <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <style>
            @font-face {
                font-family: dr;
                src: url(DroidKufi-Regular.ttf);
            }
           
            @page {
                size: A4  ;
            }
            table {float:right;width:100%; page-break-inside:auto; border-collapse: collapse; }
            thead { display: table-header-group }
            tr { page-break-inside: avoid }
            html,body {
                float:right;
                width:100%;
                margin: 0px;
                text-align:  right;
                color: #000;
                 font-family: 'DroidArabicKufiRegular';
                font-size: 12px;
                direction: rtl;
                box-sizing: border-box;
            }
            td,th{
                padding: 5px 10px;
                color:  #000;
           
                border:0;
                vertical-align: top;
            }
            #content{
                float: right;width: 100%;
            }
            .req_data {
                float: right;
                width: 100%;
                margin-bottom: 20px;
                position: relative;
            }
            div.divFooter {
                float: right;
                width: 100%;
                position: relative;
            }
            div.divFooter thead th img {
                display: inline-block;
                width: 45px;
                margin-top: -5px;
            }
            div.divFooter>table>tbody>tr>td {
                border: 0;
                padding: 0 !important;
            }
            div.divFooter>table>thead th {
                border: 0;
                width: 33.3%;
                padding: 15px 0 0;
            }
            div.divFooter thead th b {
                float: right;
                width: 100%;
                margin-bottom: 2px;
            }div.divFooter thead th span {
                float: right;
                width: 100%;
                font-weight: bold;
                font-size: 14px;
                margin-bottom: 0;
                line-height: 22px;
            }
            .list_req_data {
                float: right;
                width: 100%;
            }
            .req_data {
                float: right;
                width: 100%;
                margin-bottom: 20px;
            }
            .req_data_list{
                float: right;
                width: 33.3%;
                margin-bottom: 15px;
            }
            .namses td:nth-child(1),
            .namses td:nth-child(3){
                font-weight: bold;
            }
            .namses td{
                background: #eee;
                vertical-align: top;
            }
            .namses td span{
                float: right;
                width: 100%;
                text-align: right;
                font-weight: bold;
            }
            p ,h2{
                margin: 0;
            }
            .req_data_list p{
                float: right;
                width: 100%;
                text-align: right;
                font-size: 12px;
                font-weight: bold;
            }
            .headsubject td{
                width: 33.3%;
            }
            .req_data_list td table td{
                padding: 2px 5px;
                border: 1px solid #eee;
            }
            .req_data_list td table tr:nth-child(1) td{
                border: 0;
            }
            .req_data_list td table{
                float: right;
                width: 100%;
            }
            .req_data_list .page p {
                line-height: 38px;
            }
            .req_data_list .page p span {
                /* text-decoration: underline; */
                border-bottom: 1px dashed #020202;
                padding: 0 15px;
                display: inline-block;
                line-height: 24px;
            }
            .asww td{
                width: 60%;
                text-align: right;
                padding: 0 0 10px;
            }
            .asww tr td:nth-child(2){
                width: 40%;
            }
            .asww tr td:nth-child(2) span{
                float: right;
                width: 100%;
                border-bottom: 1px dashed #000;
            }
            .req_data_list th{
                font-size: 12px;
                text-align: center;
                padding: 10px 5px;
                border: 1px solid #000;
                background: #eee;
            }
            .req_data_list.w30 td{
                width: 33.3%;
                padding: 0 !important;
            }
            .req_data_list td{
                border: 1px solid #000;
            }
            .req_data_list td{
                text-align: right;
            }
            tr.headsubject div {
                position: relative;
                float: right;
                width: 100%;
            }
            tr.headsubject h3 {
                display: inline-block;
                margin: 5px 0 0;
                font-size: 14px !important;
                border-bottom: 1px solid #000;
            }
            tr.headsubject span {
                position: absolute;
                left: 0;
                right: auto;
                font-size: 10px !important;
                width: auto !important;
                top: -5px;
            }
            .headsubject th{
                padding: 5px 10px !important;
            }
            .req_data_list.w30 td.item1sw{
                font-size: 12px;padding: 5px 10px !important;font-weight: bold;background: #eee;
            }
            .textbold>p{
                font-weight: normal;
                margin-bottom: 5px;
            }
            .textbold>p span{
                display: inline-block;
                padding: 0 8px;
                font-weight: bold;
            }
            .textbold table{
                margin-top: 15px;
            }
            .tbpeors td{
                border: 0;
            }
            .tbpeors td{
                font-weight: bold;
                text-align: center;
                font-size: 14px;
            }
            .tbpeors td span{
                float: right;
                width: 100%;
                font-size: 12px;
                margin: 5px 0;
            }
            .tabpos th{
                font-size: 10px;
            }
            .tabpos td{
                padding: 5px;
                text-align: center;
                vertical-align: middle;
            }
        </style>
    </head>
    <body id="content">
        <div class="">
            <table>
                <thead>
                    <tr>
                        <th>
                            <span>دولة فلسطين</span>
                            <span>سلطة الأراضي</span>
                            <span> </span>
                        </th>
                        <th>
                           <img src="{{url('/admin/report_img/logo.jpg')}}">
                        </th>
                        <th>
                           <span>State of Palestine</span> 
                           <span>Land Authority</span> 
                           <span></span> 
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <b style="background: #333;height: 6px;"></b>
                            <b style="background: #333;height: 2px;"></b>
                        </th>
                    </tr>
                    <tr class="headsubject">
                        <th colspan="3">
                            <div>
                            <span>تاريخ الطباعه : {{ Date('Y/m/d') }}</span>
                                <h3>تقرير   ايردات   شهري   </h3>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td colspan="3" class="porde">
                            <div class="req_data">

                                <h3></h3>
                                <div class="list_req_data">
                                    <div class="req_data_list dot w28">
                                        <strong> اسم   المستخدم   : </strong><span> {{$user->full_name}}
                                             </span>
                                    </div>
                                    <div class="req_data_list dot w71">
                                    </div>
                                    <div class="req_data_list dot w28">
                                        <strong> </strong><span></span>
                                    </div>
                                  
                                </div>
                          

                                <div class="req_data_list textbold" style="width: 100%">
       <div class="form-body form-horizontal">
            <div class="form-group " >
            <!--==================================-->

   <?php    $user_id=isset($user->id) ? $user->id : null;

                       if($user_id != null) {

                      $userpermission = \Sentinel::findById($user_id); }    ?>


         @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)  



 <?php 





  if($user_id != null) {
                if($userpermission->hasAccess($menues->slug.'.*')) {


             
                 ?>




        <div class="col-md-3 grand" style="border: 1px solid #000"  >

  
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption" style="font-size:20px;font-weight:bold">
    <i class="{{ $menues->icon}}"></i>{{ $menues->title}} </div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
             <?php    $user_id=isset($user->id) ? $user->id : null;
                       if($user_id != null) {

                      $userpermission = \Sentinel::findById($user_id); }    ?>  
         

             @foreach ($menues->user_permissions as $submenue)
     

   <?php 
                  if($user_id != null) {
                if($userpermission->hasAccess($submenue['slug'].'.*')) {
             
                 ?>
               <label style="display: inline-block;font-size:12px;font-weight:bold">
             
               <input type="checkbox"  class="icheck permission" 
               
                 value="{{$submenue['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$submenue['title']}} 
               

               </label>
     <?php } } ?>
   <!--===================================================================================================-->
               @foreach ($submenue->user_permissions as $data_menu) 
                 <div  class="s_m">
         <?php  $sub_permission_menue=isset($data_menu->sub_permission) ? $data_menu->sub_permission:null; ?>


 <?php  
                  if($user_id != null) {
                if($userpermission->hasAccess($data_menu['slug'])) {
                
                 ?>

                <label style="display: inline-block;padding-right:20px;">
               
               <input type="checkbox"  class="icheck permission" 
              
                 value="{{$data_menu['slug']}}" data-checkbox="icheckbox_square-grey"> 
                {{$data_menu['title']}} 
               

               </label>

           <?php }}  ?>

              

               </div>


               @endforeach
  <!--======================================================================================================-->
 
  <!--=====================================================================================================-->               </div>
              @endforeach          
                    
                </div>
            </div>
        </div>

<?php }} ?>
         @endforeach         


          </div>
            




 
  
          
          
 
</div></div>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>



                    <div class="footer">
                <div class="req_data footsdw" style="margin-bottom: 0">

                         <div  class="req_data_list" style="width: 100% ">
                                    <div class="req_data_list dot w28">
                                        <strong style="text-align: center;margin: 112px;"> اعداد  : </strong>
                                    </div>
                                    <div class="req_data_list dot w71">
                                        <strong style="text-align: center;margin: 112px;"> تدقيق   : </strong>
                                    </div>
                                    <div class="req_data_list dot w28">
                                        <strong style="text-align: center;margin: 112px;"> المدير   المالى   : </strong>
                                    </div>
                                  
                                </div>

                                
                  
                </div>
            </div>


        </div>




    </body>
</html>
