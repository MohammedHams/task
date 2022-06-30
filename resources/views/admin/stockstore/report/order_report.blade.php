
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>طلبية صرف مواد للدوائر</title>
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
      margin-top:60px;}
      .tit{
        font-weight:bold;
        text-decoration:underline;
        font-size:16px;
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
  <legend style="color:#00F">طلبية صرف مواد للدوائر</legend>
 <div> 
  <table width="687"  dir="rtl">
    <tr>
    <td width="212"><span class='tit'>رقم الطلبية:</span>  {{ isset($order[0]->years) ? $order[0]->years : null  }} / {{ isset($order[0]->serial_num) ? $order[0]->serial_num : null  }}</td>
    <td width="235"><span class='tit'>نوع الطلبية:</span> طلبية صرف</td>
    <td width="226"><span class='tit'>تاريخ وارد الطلبية:</span>{{ isset($order[0]->date1) ? $order[0]->date1 : null  }} </td>
  </tr>


<tr></tr>
  <tr></tr>


  <tr>
    <td><span class='tit'>الجهة الطالبة:</span>{{ isset($department[0]->name) ? $department[0]->name : null  }}</td>
    <td><span class='tit'>بواسطة:</span> @if(!$user->isEmpty()) {{$user[0]->first_name." ".$user[0]->last_name}}  @else @endif</td>
    <!--<td><span class='tit'>تاريخ الصرف:</span></td>-->
  </tr></table></div>


<div class='dtit'> تفاصيل الطلبية</div>
<div>
<table width="791" id='details' border="1" style="border-collapse: collapse;">
  <tr>
    <th width="50">رقم الصنف</th>
    <th width="220">تفاصيل الصنف</th>
    <th width="220">التصنيف</th>
    <th width="50">الوحدة</th>
    <th width="75">الكمية المطلوبة</th>

    <th width="75">الكمية المعطاة</th>
       <th width="200">ملاحظات </th>
  </tr>
  @if(isset($items))
  @foreach($items  as $item)

  <tr>
  <td>{{$item->item_id_pk}}</td>
  <td>{{$item->item_name}}</td>
  <td>{{$item->class_name}}</td>
  <td>{{$item->unit_name}}</td>
  <td>{{$item->need1}}</td>
  <td >{{$item->given1}}</td>
   <td >{{$item->note1}}</td>
 </tr>
 @endforeach
  @endif
 
 
 </table>


</div>

  
  </fieldset>


  <div style="
    position: fixed;
    bottom: 0;
   
    width:800px;">

    <p style="float:left;text-align:center; padding:40px ;">ختم  وتوقيع   المستلم  </p>
    <p  style="float:right;text-align:center; padding: 40px ;">مكلف    رئيس  قسم  المخازن  </p>
    <div style="clear:both"></div>
  

</div>

</div>
<script>

    window.print();

</script>
</body>
</html>
