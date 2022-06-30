
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>كرت   اللوازم  المستهلكة   </title>
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
      font-size:14px;
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
  <legend style="color:#00F">كرت   اللوازم   المستهلكة  </legend>
 <div> 
  <table width="687" border="0" dir="rtl">
    <tr>
    <td width="212"><span class='tit'>رقم  الصنف  </span>{{ isset($stock_item_main[0]->item_id_pk) ? $stock_item_main[0]->item_id_pk : null  }}</td>

    <td width="335"><span class='tit'>اسم   الصنف  </span>{{ isset($stock_item_main[0]->item_name) ? $stock_item_main[0]->item_name : null  }} </td>
    <td width="126"><span class='tit'>الرصيد   الحالى   </span>{{ isset($stock_item_main[0]->item_count) ? $stock_item_main[0]->item_count : null  }} </td>
  </tr>
    <tr></tr>
      <tr></tr>
  <tr>
     <td><span class='tit'>التصنيف  </span>{{ isset($stock_item_main[0]->class_name) ? $stock_item_main[0]->class_name : null  }}</td>
      <td><span class='tit'> الوحدة    </span>{{ isset($stock_item_main[0]->item_unit) ? $stock_item_main[0]->item_unit : null  }}</td>
    <td></td>
   
    <!--<td><span class='tit'>تاريخ الصرف:</span></td>-->
  </tr></table></div>


<div class='dtit'> </div>
<div>
<table width="771" id='details' border="1" style="border-collapse: collapse;">
  <tr>
    <th width="64">التاريخ  </th>
    <th width="181">رقم   الطلبية  /  فاتورة  </th>
    <th width="114"> اسم  الدائرة  /  اسم  المورد   </th>
    <th width="53">الادخال  </th>
     <th width="53"> الاخراج   </th>
      <th width="53"> سعر   الوحدة   </th>
      <th width="53"> نوع  الطلبية    </th>
  

   
  </tr>
  
  
@foreach($stock_card_vws  as $stock_card_vw)
  <tr>
  <td>{{$stock_card_vw->date1}}</td>
  <td>{{$stock_card_vw->inv_id}}</td>
   <td>{{$stock_card_vw->side_name }}</td>
  <td>{{$stock_card_vw->input}}</td>
  <td>{{$stock_card_vw->output}}</td>
  <td>{{$stock_card_vw->price}}</td>
  <td>{{$stock_card_vw->inv_type_sub}}</td>
 </tr>
@endforeach

 
 
 </table>


</div>

  
  </fieldset>

</div>
<script>

    window.print();

</script>
</body>
</html>
