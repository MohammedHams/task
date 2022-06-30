
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>فاتورة  </title>
<style>

#content{
width:900px;
height:90px;
margin:auto;  
  }
#top{
width:800px;
height:113px;
margin:auto;

/*font-weight:bold;*/
line-height: 1.2;
  
  }
  
  #rbox{
    margin-right:5px;
    margin-top:10px;
    width:309px;
    float:right;
    direction: rtl;
    text-align:right}


      #mbox{
    margin-top:5px;
  
    text-align: center;
    float:right;
    }


      #lbox{
    margin-left:5px;
    margin-top:10px;
    width:160px;
    text-align: right;
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


<div id='rbox'>المورد :  {{ isset($stock_side_in_vw[0]->side_name) ? $stock_side_in_vw[0]->side_name : null  }}  <br/> العنوان  :  {{ isset($stock_side_in_vw[0]->address) ? $stock_side_in_vw[0]->address : null  }}

 <br/>رقم المشغل   :   {{ isset($stock_side_in_vw[0]->operator_no) ? $stock_side_in_vw[0]->operator_no : null  }}   <br/>
  تلفون  :  {{ isset($stock_side_in_vw[0]->tel) ? $stock_side_in_vw[0]->tel : null  }}   </div>




<div id='mbox'><img name="logo" id='logo' type="image" src="{{url('/admin/report_img/logo2.png')}}"   width="70"  height="70" /> </br>  السلطة الوطنية الفلسطينية 
 </br> وزارة المالية </br> الادارة العامة للوازم </div>




<div id='lbox'> الوزارة :سلطة الاراضى  <br/>    الادارة العامة : الشئون المالية    <br/>   العنوان :غزة   </br>   </div>

</div>


<fieldset dir="rtl" id='dform'>
  <legend style="color:#00F;font-size: 18px;">طلبية  شراء    </legend>
 <div> 
  <table width="687" border="0" dir="rtl">
    <tr>
    <td width="212"><span class='tit'> رقم  الطلبية   </span>{{ isset($stock_purchasing_vw[0]->serial) ? $stock_purchasing_vw[0]->serial : null  }}
   
    /{{ isset($stock_purchasing_vw[0]->year1) ? $stock_purchasing_vw[0]->year1 : null  }}</td>

    <td width="300"><span class='tit'></td>

    <td width="170"><span class='tit'>   التاريخ   </span>{{ isset($stock_purchasing_vw[0]->date3) ? $stock_purchasing_vw[0]->date3 : null  }} </td>
  </tr>
    <tr></tr>
      <tr></tr>
  <tr>
     <td><span class='tit'></td>
      <td><span class='tit'></td>
    <td><span class='tit'> </td>
   
    <!--<td><span class='tit'>تاريخ الصرف:</span></td>-->
  </tr></table></div>


<div class='dtit' style="font-weight:bold;font-size:20px;"> تفاصيل الطلبية</div>
<br/>
<div>
<table width="900" id='details' border="1" style="border-collapse: collapse;">
  <tr>
    <th width="10">  #  </th>
    <th width="150">   البند   </th>

     <th width="80"> # الكتالوج لشركة </th>
    <th width="50"># التعريف  </th>
    <th width="50">   الوحدة   </th>
    <th width="50">   الكمية   </th>
    <th width="50"> سعر الوحدة  <br>   {{ isset($stock_purchasing_vw[0]->cur_name) ? $stock_purchasing_vw[0]->cur_name : null  }}    </th>
    <th width="50">الاجمالى  <br>   {{ isset($stock_purchasing_vw[0]->cur_name) ? $stock_purchasing_vw[0]->cur_name : null  }}     </th>
    <th width="150"> ملاحظات      </th>
  

   
  </tr>

  <?php  $i=1; $sum=0; ?>
  
  @foreach($stock_purchasing_item_datas  as $stock_purchasing_item_data)

  <tr>
  <td>{{$i++}}</td>

  <?php $sum=$sum+intval($stock_purchasing_item_data->price); ?>
  <td>{{$stock_purchasing_item_data->item_name}}</td>


  <td>@if($stock_purchasing_item_data->catalog_no == 0)  


    @else
    {{ $stock_purchasing_item_data->catalog_no}}

    @endif
  </td>


  <td>

  @if($stock_purchasing_item_data->id1 == 0)  


    @else
    {{ $stock_purchasing_item_data->id1}}

    @endif
    
  
  
</td>
  <td>{{$stock_purchasing_item_data->unit_name}}</td>
  <td>{{$stock_purchasing_item_data->count1}}</td>
  <td>{{$stock_purchasing_item_data->unit_price}}</td>
  <td>{{$stock_purchasing_item_data->price}}</td>
  <td>{{$stock_purchasing_item_data->note2}}</td>
 </tr>
 @endforeach

 

 <tr  style="border:1px solid #000"><td  style="border:0px solid #000" colspan="4"><br></td>  <td  style="border:1px solid #000" colspan="3">المجموع </td> 
  <td  style="border:1px solid #000" colspan="1">{{$sum}} </td> 
  <td  style="border:1px solid #000" colspan="1"> </td></tr>

  <tr  style="border:1px solid #000"><td  style="border:0px solid #000" colspan="4"><br></td>  <td  style="border:1px solid #000" colspan="3"> </td> 
  <td  style="border:1px solid #000" colspan="1">  شامل </td> 
  <td  style="border:1px solid #000" colspan="1"> </td></tr>

<tr  style="border:1px solid #000"><td  style="border:0px solid #000" colspan="4"><br></td>  <td  style="border:1px solid #000" colspan="3"> إجمالى قيمة الطلبية  </td> 
  <td  style="border:1px solid #000" colspan="1"> {{$sum}}   </td> 
  <td  style="border:1px solid #000" colspan="1"> </td></tr>




    <tr  style="border:0px"><td   style="border:0px" colspan="9"><br></td></tr>
     <tr  style="border:0px"><td   style="border:0px" colspan="9"><br></td></tr>
 </table>



 <table width="900" id='details' border="1" style="border-collapse: collapse;">
  <tr>

  <td>توقيع وختم الجهة الطالبة   </td>

  <td> توقيع وختم مفوض الوزارة  </td>

  <td>توقيع  وختم  المراقب  المالى </td>

  <td> توقيع مراجع اللوزام العامة  </td>

  <td> توقيع وختم اللوازم العامة   </td>

  <td> توقيع وختم  وزير المالية    </td>

  
      </tr>


      <tr>

<td> <br> <br>  </td>

<td> <br> <br> </td>
<td> <br> <br> </td>

<td>  <br> <br> </td>

<td>   <br> <br> </td>

<td>   <br> <br>  </td>
    </tr>

 </table>

 <br>


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
