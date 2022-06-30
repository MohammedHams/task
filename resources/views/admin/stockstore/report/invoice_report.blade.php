
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
<div id='rbox'>السلطة الوطنية الفلسطينية<br/>سلطة الأراضي قطاع غزة<br/>الدائرة المالية</div>
<div id='mbox'><img name="logo" id='logo' type="image" src="{{url('/admin/report_img/logo2.png')}}"   width="80"  height="80" /></div>
<div id='lbox'>قسم المشتريات والمخازن<br/>المخزن الرئيسي لسلطة الاراضي</div>

</div>


<fieldset dir="rtl" id='dform'>
  <legend style="color:#00F">طلبية صرف مواد للدوائر</legend>
 <div> 
  <table width="687" border="0" >
    <tr>
    <td width="212"><span class='tit'>رقم  الفاتورة  </span>{{ isset($invoice[0]->inv_year) ? $invoice[0]->inv_year : null  }} / {{ isset($invoice[0]->serial) ? $invoice[0]->serial : null  }}  </td>

    <td width="235"><span class='tit'>نوع  الفاتورة  </span>{{ isset($invoice[0]->inv_type) ? $invoice[0]->inv_type : null  }} </td>
    <td width="226"><span class='tit'>تاريخ   الورود  </span>{{ isset($invoice[0]->date1) ? $invoice[0]->date1 : null  }} </td>
  </tr>
    <tr></tr>
      <tr></tr>
  <tr>
     <td><span class='tit'>تاريخ   الصرف  </span>{{ isset($invoice[0]->date2) ? $invoice[0]->date2 : null  }}</td>
      <td><span class='tit'>الجهة  الطالبة   </span>{{ isset($invoice[0]->name) ? $invoice[0]->name : null  }}</td>
    <td><span class='tit'> اعتمد  بواسطة  :</span>{{ isset($invoice[0]->full_name) ? $invoice[0]->full_name : null  }}</td>
   
    <!--<td><span class='tit'>تاريخ الصرف:</span></td>-->
  </tr></table></div>


<div class='dtit'> تفاصيل الطلبية</div>
<div>
<table width="771" id='details' border="1" style="border-collapse: collapse;">
  <tr>
    <th width="64">رقم الصنف</th>
    <th width="181">اسم  الصنف  </th>
    <th width="114">مطلوب  </th>
    <th width="53">مصروف  </th>
      <th width="200">ملاحظات  </th>
  

   
  </tr>
  
  @foreach($items  as $item)

  <tr>
  <td>{{$item->item_id_pk}}</td>
  <td>{{$item->item_name}}</td>
  <td>{{$item->count1}}</td>
  <td>{{$item->count2}}</td>
   <td>{{$item->note2}}</td>
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
