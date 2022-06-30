
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>فاتورة  </title>
<style>

#content{
width:800px;
height:90px;
margin:auto;  
  }
#top{
width:800px;
height:90px;
margin:auto;
border:2px solid #000;  
font-weight:bold;
  
  }
  
  #rbox{
    margin-right:10px;
    margin-top:10px;
    width:300px;
    float:right;
    text-align:right}
      #mbox{
    margin-top:5px;
    width:110px;
    float:right;}
      #lbox{
    margin-left:10px;
    margin-top:10px;
    width:350px;
    float:left;}
    #dform{
      margin-top:20px;}
      .tit{
        font-weight:bold;
        text-decoration:underline;
        font-size:14px;
        margin-left:5px}
    .dtit{
      width:100px;
      margin:auto;
      font-size:18px;
      font-weight:bold;
      margin-top:30px;
      color:#0066FF}
      
      #details{
      border:1px solid #000;
      border-style:outset;
      text-align:right  
        }
     
</style>
</head>
<body>

<div id='content'>
<div id='top'>
<div id='rbox'>السلطة الوطنية الفلسطينية<br/>سلطة الأراضي قطاع  غزة   </div>
<div id='mbox'><img name="logo" id='logo' type="image" src="{{url('/admin/report_img/logo2.png')}}"   width="80"  height="80" /></div>
<div id='lbox'>دائرة  الشئون   الادارية   <br/>  قسم   المخازن  </div>

</div>


<fieldset dir="rtl" id='dform'>
  <legend style="color:#00F;font-size:18px;"> <strong>سند   اضافة   /  نسخة  الى وزارة المالية  </strong>  </legend>
 <div> 
  <table width="687" border="0" dir="rtl">
    <tr>
    <td width="212"><span class='tit'> بموجب  فاتورة رقم   </span>{{ isset ($stock_invoice_in_vw[0]->order_no) ? $stock_invoice_in_vw[0]->order_no : null }}</td>

    <td width="235"><span class='tit'> رقم  السند   </span>{{ isset($stock_invoice_in_vw[0]->year1) ? $stock_invoice_in_vw[0]->year1 : null  }}
/{{ isset($stock_invoice_in_vw[0]->serial) ? $stock_invoice_in_vw[0]->serial : null  }}
    </td>

    <td width="226"><span class='tit'> تاريخ  الفاتورة   </span>{{ isset($stock_invoice_in_vw[0]->date3) ? $stock_invoice_in_vw[0]->date3 : null  }} </td>
  </tr>
    <tr></tr>
      <tr></tr>
  <tr>
     <td><span class='tit'>اسم  المورد   </span>{{ isset($stock_invoice_in_vw[0]->side_name) ? $stock_invoice_in_vw[0]->side_name : null  }}</td>
      <td><span class='tit'></td>
    <td><span class='tit'> </td>
   
    <!--<td><span class='tit'>تاريخ الصرف:</span></td>-->
  </tr></table></div>


<div class='dtit' style="font-weight:bold;font-size:20px;"> تفاصيل الطلبية</div>
<br/>
<div>
<table width="771" id='details' border="1" style="border-collapse: collapse;">
  <tr>
    <th width="50"> رقم  الصنف  </th>
    <th width="200">تفاصيل   الصنف   </th>
     <th width="100"> التصنيف </th>
    <th width="50">الوحدة  </th>
    <th width="53"> الكمية   المدخلة   </th>
    <th width="53"> الاجمالى    </th>
    <th width="53">العملة    </th>
    <th width="53"> ملاحظات      </th>
  

   
  </tr>
  
  @foreach($stock_invoice_in_item_vws  as $stock_invoice_in_item_vw)

  <tr>
  <td>{{$stock_invoice_in_item_vw->item_id_pk}}</td>
  <td>{{$stock_invoice_in_item_vw->item_name}}</td>
  <td>{{$stock_invoice_in_item_vw->class_name}}</td>
  <td>{{$stock_invoice_in_item_vw->unit_name}}</td>
  <td>{{$stock_invoice_in_item_vw->count2}}</td>
  <td>{{$stock_invoice_in_item_vw->price}}</td>
  <td>{{$stock_invoice_in_item_vw->cur_name}}</td>
  <td>{{$stock_invoice_in_item_vw->note2}}</td>
 </tr>
 @endforeach

 <tr  >
   <td colspan="4"> عدد   الاصناف   فى   الطلبية  ( {{$stock_invoice_sum_counts[0]->count}} )</td>
    <td colspan="4">المجموع   ( {{$stock_invoice_sum_counts[0]-> sum}} )  العملة   مثبته  لكامل  الطلبية ,  السعر   شامل   قيمة  الضريبة  المضافة   </td>

 </tr>

 <tr  style="border:0px"><td  style="border:0px" colspan="8"><br></td></tr>
 <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"> الاصناف    بعاليه  حسب  الأصول  وسجلت  بالعهدة  بتاريخ    {{ isset($stock_invoice_in_vw[0]->date1) ? $stock_invoice_in_vw[0]->date1 : null  }}</td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>

  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="4"> </td><td   style="border:0px" colspan="4">توقيع   رئيس  قسم   المخازن  </td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
    <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>
  <tr  style="border:0px"><td   style="border:0px" colspan="8"><br></td></tr>

 </table>


</div>

  
  </fieldset>


    <div style="
    position: fixed;
    bottom: 0;
   
    width:800px;">

    <p style="float:left;text-align:center; padding:60px ;">   </p>
    <p  style="float:right;text-align:center; padding: 60px ;font-weight: bold"> </p>
    <div style="clear:both"></div>
  

</div>

</div>
<script>

    window.print();

</script>
</body>
</html>
