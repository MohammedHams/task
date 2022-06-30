<!doctype html>
<html lang="ar" class="no-js">
    <head>
        <title> الطلبات   المصروفة   للدوائر    </title>
		 <link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">
        <style>
            @font-face {
                font-family: dr;
                src: url(DroidKufi-Regular.ttf);
            }
            footer {page-break-after: always;}
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
                text-align:center;
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
        <div class="divFooter">
            <table>
                <thead>
                    <tr>
                        <th>
                            <span>السلطة الوطنیة الفلسطینیة  </span>
                            <span>سلطة الأراضي قطاع غزة</span>
                            <span> </span>
                        </th>
                        <th>
                           <img src="{{url('/admin/report_img/logo.jpg')}}">
                        </th>
                        <th>
                           <span>دائرة الشئون الاداریة</span> 
                           <span>قسم المخازن </span> 
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
                                <h3>   الطلبات   المصروفة   للدوائر   </h3>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td colspan="3" class="porde">
                            <div class="req_data">

                                <h3></h3>
                              
                          


                                <div class="req_data_list textbold" style="width: 100%;">
                                    <table class="tabpos">
                                        <thead>
                                            <tr>
                                              
                                                <th>رقم الطلبية</th>
                                              <th>سنة   الطلبية  </th>
                                                <th> القسم   </th>
                                                <th>تاريخ   الطلب  </th>
                                                       <th>تاريخ   الصرف  </th>


                   
                                                           <th>اسم   الصنف   </th>
                                                        <th>نوع  الصنف  </th>
                      
                                                     <th> الوحدة    </th>
                                                        <th> تم  طلب   </th>
                                                         <th> تم  صرف   </th>
                         
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                           
                                        	@foreach($all_datas  as  $all_order_approved_vw)
                                            <tr>
                                           
                                                <td>  {{$all_order_approved_vw->serial_num }} </td>
                                                <td>  {{$all_order_approved_vw->name }} </td>
                                               <td>  {{$all_order_approved_vw->date1_data  }} </td>
                                               <td>  {{$all_order_approved_vw->date2_data  }} </td> 
                                               
                                                <td> {{$all_order_approved_vw->item_name  }} </td> 
                                                 <td>  {{$all_order_approved_vw->class_name  }} </td>
                                                     <td>  {{$all_order_approved_vw->unit_name  }} </td>
                                                      <td>  {{$all_order_approved_vw->need1  }} </td>
                                                        <td>  {{$all_order_approved_vw->need1  }} </td>
                                                    <td>  {{$all_order_approved_vw->given1  }} </td>
                                               
                                            </tr>
                                           
                                           @endforeach

                                          
                                           
                                        </tbody>


                                          <tfoot>
                                         


                                         


                               









                                        </tfoot>
                                    </table>
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
                                        <strong style="text-align: center;margin: 112px;">   </strong>
                                    </div>
                                    <div class="req_data_list dot w71">
                                        <strong style="text-align: center;margin: 112px;"> </strong>
                                    </div>
                                    <div class="req_data_list dot w28">
                                        <strong style="text-align: center;margin: 112px;">  مدير   المخزن </strong>
                                    </div>
                                  
                                </div>

                                
                  
                </div>
            </div>


        </div>




    </body>
</html>
