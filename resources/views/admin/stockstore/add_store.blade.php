@extends('admin.layouts.backend')
@section('title','إضافة طلبية جديدة')
@section('page_level_plugins_styles')
 <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
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
  
 

 div#sample_1_length.dataTables_length{
  float: right;
}


.color-view {
    padding: 7px;
    text-align: center !important;
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


   
.modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #0480be;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
   
  
</style>

@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')
@section('page_bar')
<li>
        <a href="#">إضافة طلبية</a>
        <i class="fa fa-angle-left"></i>
    </li>
@endsection




@section('content')

 <!-- BEGIN EXAMPLE TABLE PORTLET-->
 
<div class="portlet light bordered">

<div class="row">
 <div class="col-md-12">
 
  <form class="form-horizontal" role="form" method="post" 
    data-toggle="validator"   id="save_orders">
 
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase"> بحث عن</span>
        </div>
        <hr>
        <div class="tools"> </div>
    </div>

     <div class="form-group col-sm-6">
      <span class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="class_name" style="font-weight:bold;">الأصناف</span>
      <div class=" col-sm-8">
       <select class="form-control  select2" id="class_name" name="class_name" >
       <option value="">إختر الصنف</option>
       
       @foreach($orders  as  $order)
        <option value="{{ $order->class_id}}">{{ $order->class_name}}</option>
        @endforeach
    
       </select>
        </div> 

     </div>


        <div class="form-group col-sm-6 ">
          <span class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark" style="font-weight:bold;" for="item_name" >الأصناف</span>
      <div class=" col-sm-8">
       <input type="name" class="form-control  " id="item_name" name="item_name" onkeyup="myFunction()">
     
        </div> 
      

     </div>

</form>
</div></div></div>

<div class="portlet light bordered">
<div class="row">
 <div class="col-md-6">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                   

                     <tr>
                      <th width="10%">إختر</th>
                        <th width="30%">الصنف</th>
                         <th width="40%" >النوع</th>
                         <th width="10%">العدد</th>
                                  
                    </tr>
                </thead>
                <tbody>
                       
                </tbody>
                <tfoot>
                 
                </tfoot>
            </table>
        </div>
       
    </div>



    <div class="col-md-6">
@if(isset($order_num))
<form id="update_all_order"   role="form" method="post" data-toggle="validator"  >
  <div class="alert alert-danger" id="alert_update" style="display:none">
                        <ul id="error_update"> 
                        </ul>
                        </div>
<input type="hidden" name="order_num" value="{{$order_num}}">
 @else
 <form id="add_all_order"   role="form" method="post" data-toggle="validator"  >
  <div class="alert alert-danger" id="alert_add" style="display:none">
                        <ul id="error_add"> 
                        </ul>
                        </div>
 
 @endif                       
  <div class="col-md-12">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="selected_items" >
                <thead>
                   

                     <tr>
                      <th>حذف</th>
                        
                         <th >النوع</th>

                         <th>العدد</th>
                                  
                    </tr>
                </thead>
                <tbody id="required_item">
                  @if(isset($item_orders))
                  @foreach($item_orders as $item_order)
                  <?php 

                  $stock_item=DB::connection('govowns')->select("select * from stock_item_vw where item_id_pk ='$item_order->item_id_pk' "); ?>

                  <tr><td><input class="r_item_id_pk" name="r_item_id_pk[]" type="checkbox" value="{{$item_order->item_id_pk}},{{$stock_item[0]->item_name}}" onclick="remove_order($('.r_item_id_pk').index(this),this)"></td> <td>{{$stock_item[0]->item_name}}</td><td><input type="number" value="{{$item_order->need1}}" class="number_needed form-control input-xsmall" name="number_needed[]"> <input type="hidden" value="{{$item_order->item_id_pk}}" class="item_needed" name="item_needed[]"></td> </tr>
                  @endforeach
                @endif 
                </tbody >
                <tfoot>
                 
                </tfoot>
            </table>
        </div>
       
    </div>
    <button type="submit" class="btn green btn-sm" id="add_new_order_data">حفظ</button>
</form>

</div>
</div></div>




<meta name="_token" content="{!! csrf_token() !!}" />


@endsection

@section('body')
@include('admin.content.body_full')
@endsection



@section('page_level_plugins_js')

  <script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

@endsection


@section('page_level_scripts_js')
 
  <script src="{{url('/')}}/admin/assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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


  /*prevent enter*/

  $('#save_orders').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

  

   $( "#class_name" ).change(function() {
    //  e.preventDefault();
    $("#sample_1").dataTable().fnDestroy();
   show_data();
});

function myFunction() {  
 //e.preventDefault();
  $("#sample_1").dataTable().fnDestroy();
 show_data();}

  function show_data(){
    $('#sample_1').DataTable({
     //  destroy: true,
        processing: true,
      serverSide: true, // remove it solve the problem of stop
       "paging": false, //remove_paging
       "ordering": false,//remove_paging
        "info": false, //remove_paging
     "pageLength": 10,
     "ajax": {
            "url": '{!! URL::asset("/stock_store/order_data") !!}',
          "type": "GET",
            "data": function ( d ) {
           d.class_name=$('#class_name').val();
           d.item_name=$('#item_name').val();
            }
           },
   
     
      columns: [
           
              {data: 'choose', name: 'choose'},
               {data: 'class_name', name: 'class_name'},
               {data: 'item_name', name: 'item_name'},
               {data: 'order_num', name: 'order_num'},

               
               
           
             
        ]


    });
  }

function add_order(index,checkboxElem){
   if (checkboxElem.checked) {

 // alert(index);
  var item_id_pk =$('.item_id_pk').eq(index).val().split(',');
 //item_id_pk[0];
//item_id_pk[1];
 // item[0] item_id_pk , // item[1] item_name , // num number of oreder needed from this Category
  var num = $('.num').eq(index).val();
 //////////////////// تخزين البيانات فى مصفوفة /////////////
  // step one
 var newEntry, table = [];
// step two Create a new object
newEntry = {
  item_id_pk: item_id_pk[0],
  item_name: item_id_pk[1],
  num: num
};
// step three 
table.push(newEntry);
// step four convert it to json
var id = JSON.stringify(table[0].item_id_pk);
var name =  JSON.stringify(table[0].item_name);
var number = JSON.stringify(table[0].num);
//alert(data);
$('#required_item').append('<tr><td><input  class="r_item_id_pk" name="r_item_id_pk[]" type="checkbox"  value="'+ id.replace(/\"/g, "")+','+name.replace(/\"/g, "")+'" onclick="remove_order($(\'.r_item_id_pk\').index(this),this)"></td> <td> '+name.replace(/\"/g, "")+'</td><td><input type="number" value="'+number.replace(/\"/g, "")+'" class="number_needed form-control input-xsmall" name="number_needed[]"> <input type="hidden" value="'+id.replace(/\"/g, "")+'" class="item_needed" name="item_needed[]"></td> </tr>');

/*var add_url='{!! URL::asset("/store/store_item_session/") !!}';
$.get( add_url , { 'item_id_pk': id.replace(/\"/g, "") ,'item_name':name.replace(/\"/g, ""),'number':number.replace(/\"/g, "") }) .done(function( data ) {
  
    
  });*/


}

}


//////////////////////////////////////
 function remove_order(index,checkboxElem){
   if (checkboxElem.checked) {
     var item_id_pk =$('.r_item_id_pk').eq(index).val().split(',');
 /* var add_url='{!! URL::asset("/store/remove_item_session/") !!}';
 $.get( add_url , { 'item_id_pk': item_id_pk[0]  }) .done(function( data ) {
  
    
  }); */
 jQuery(checkboxElem).closest('tr').remove();

  
}
}


/////////////////////////////save the orders////////////////////////
$(document).ready(function (e) {
  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
 
$("#add_all_order").on('submit', function(e) {
 
 $("#add_new_order_data").hide();

   if (e.isDefaultPrevented()) {
       
    } else {
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault();             
    
    $.ajax({
     url:" {!! URL::asset('/stock_store/confirm_order_data/') !!}",
      data:new FormData($("#add_all_order")[0]),
      dataType:'json',
     // async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                var id=e['id'];

                var url =" {!! URL::asset('/stock_store/my_order_list/"+id+"') !!}"
                window.location=url;
                 $('#alert_add').hide();
                 $("#add_new_order_data").show();
                
                  
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#alert_add').hide();
                    $("#add_new_order_data").show();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
              
              $("#add_new_order_data").show();
              $('#alert_add').show();
              $('#error_add').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error_add').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });
            }
        }); 
  });

/////////////////////////update _order data/////////////////////////////////////////
$(document).ready(function (e) {
$("#update_all_order").validator().on('submit', function(e) {
 

   if (e.isDefaultPrevented()) {
       
    } else {
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault();             
    
    $.ajax({
     url:" {!! URL::asset('/stock_store/update_myorder_data/') !!}",
      data:new FormData($("#update_all_order")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#alert_update').hide();
                
                  
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#alert_update').hide();
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
            }
       
        
            },
            error: function(e) 
            {
                
              $('#alert_update').show();
              $('#error_update').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#error_update').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية التعديل", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });
            }
        }); 
  });

















////////////////////////////////////////////////////



//add_all_order

</script>

@endsection                  

 