<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="doccss.css">
    <title>سلطة الأراضي  قطاع غزه</title>
	
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


	header
{
    border: 3px solid #444;
    overflow: hidden;
    padding: 0 20px;
}

header .depart{
    float: left;
    margin-right: 400px;
}

header .logo {
    float: left;
}
header .logo img {
    width: 80px;
    height: 80px;
}

header .ministry
{
    float:right;
}
.posi-r
{
    position: relative;
    right: 30px;
}
.posi-l
{
    position: relative;
    left: 20px;
}
.container h3 {
    text-align: center;
}

.container 
{
    padding: 20px;
}

.container p {
    direction: rtl;
    font-weight: 600;
}

.container p span {
    font-weight: bold;
    /*text-decoration: underline;*/
}
.container .lef {
    position: relative;
    right: 800px;
    top: -35px; 
}
table
{
    direction: rtl;
    width: 700px;
    margin: 10px auto;
    text-align: center;
}
p:last-of-type {
    margin: 100px;
    min-height: 300px;
}
p:last-of-type .r{
    margin-right: 150px;
}
p:last-of-type .m{
    margin-right: 350px;

}
p:last-of-type .l{
    float: left;
    margin-left: 100px;
}
footer{
    font-weight: bolder;
    text-align: center;
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
  
    <div class="container" >
        <h3>محضر ضبط استلام</h3>
        <p><span>رقم الطلبية :</span> &emsp; {{ isset($stock_receipt_vws[0]->inv_id) ? $stock_receipt_vws[0]->inv_id : null  }} &emsp;<span> &emsp;&emsp;رقم محضر الإستلام :</span>&emsp;{{ isset($stock_receipt_vws[0]->order_no) ? $stock_receipt_vws[0]->order_no : null  }}
        <span>&emsp;&emsp;تاريخ الإدخال :</span>&emsp;{{ isset($stock_receipt_vws[0]->input_date) ? $stock_receipt_vws[0]->input_date : null  }}</p>


        <p><span>الجهة الموردة :</span>&emsp;&emsp;{{ isset($stock_receipt_vws[0]->side_name) ? $stock_receipt_vws[0]->side_name : null  }}</p>
        <p>رئيس اللجنة : ..................................</p>
        <p>رئيس قسم المخازن : ..................................</p>
        <p>عضو : ..................................</p>
        <p>عضو : ..................................</p>
        <p>إستناد لإحكام المادة (29) من قانون اللوازم (9) لسنة 1998 وبناء على كتاب من رئيس سلطة الأراضي قامت اللجنة الموقعة أدناه بمعاينة اللوازم المبينة ادناه والمحولة على السادة المذكورين بموجب قرار رئيس سلطة الأراضي رقم 38\2011 تاريخ 18\8\2011 رقم الفاتورة ....... تاريخ ..... ادخال</p>
        <table border="3">
            <thead>
                <tr>
                    <td>رقم الصنف</td>
                    <td>اسم الصنف</td>
                    <td>التصنيف</td>
                    <td>الوحدة</td>
                    <td>الكمية المدخلة</td>
                    <td>السعر الإجمالي</td>
                    <td>ملاحظات </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                   @foreach($stock_receipt_vws  as $stock_receipt_vw)

                    <tr>
                    <td>{{$stock_receipt_vw->item_id_pk}}</td>
                    <td>{{$stock_receipt_vw->item_name}}</td>
                    <td>{{$stock_receipt_vw->class_name}}</td>
                    <td>{{$stock_receipt_vw->unit_name}}</td>
                    <td>{{$stock_receipt_vw->count2}}</td>
                    <td>{{$stock_receipt_vw->price}}</td>
                    <td>{{$stock_receipt_vw->note2}}</td>
                 
                   
                    </tr>
 @endforeach
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">عدد الأصناف في الطلبية : <?php  echo count($stock_receipt_vws)  ?></td>
                    <td colspan="3">المجموع الإجمالي لقيمة الفاتورة   : </td>
                    <td>{{ isset($stock_receipt_vws[0]->tottal_price) ? $stock_receipt_vws[0]->tottal_price : null  }} </td>
                </tr>
            </tfoot>
        </table>
        <p>وبعد المعاينة والفحص تبين أن :</p>
        <p>1 - اللوازم الموردة مطابقة للمواصفات والشروط في قرار الإحالة وكتاب التوريد وتم استلامها حسب الأصول</p>
        <p>2 - غير مطابقة للمواصفات وترفض اللجنة استلامها للأسباب التالية :</p>
        <p>1 - .............................................. 2 - ................................................... 3 - ..................................................... 4 - ....................................................................................................</p>
        <p>ورد التعهد اللوازم بتاريخ .................................................. &emsp;&emsp;&emsp;&emsp;&emsp;تبلغ بتاريخ ..................................................</p>
        <p>تأخر في التوريد مدة ........................... &emsp; يوماً &emsp;&emsp;&emsp; مدة التسليم .........................&emsp;;&emsp;&emsp;&emsp;&emsp;التاريخ .................</p>
        <p>
        <span >&emsp;&emsp;عضو   &emsp;&emsp;&emsp;</span>
            <span >&emsp;&emsp;عضو   &emsp;&emsp;&emsp;</span>
            <span >&emsp;&emsp;&emsp;&emsp;&emsp; عضو    &emsp;&emsp;&emsp;</span>
            <span >&emsp;&emsp;&emsp; &emsp;&emsp;رئيس اللجنة   &emsp;&emsp;&emsp;</span>
        </p>
    </div>

</body>
</html>