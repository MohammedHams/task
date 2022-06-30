 <style type="text/css">
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
   
 </style>

 <div class="modal fade" id="create_bill"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog "  style="width:1200px">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="overflow:hidden;" >


   
                                   <div class="portlet-title">
<div class="caption">
    <i class="icon-share font-red-thunderbird"></i>
    <span class="caption-subject font-red-thunderbird bold uppercase">ايصالات الدفع 

</div>
 
</div>
                                  
                               
                                    <div class="table-scrollable" id="upload_info">

                                       
                                    </div>


                                     <div class="col-md-12">


             <form class="form-horizontal" role="form" method="post" 
                 data-toggle="validator"   id="project_payment">
       <div class="alert alert-danger" id="project_payment_alert" style="display:none" >
                        <ul id="project_payment_error"> 
                        </ul>
                        </div>




<div class="row " >
<div class="portlet light borderd ">

<div class="portlet-body">

  <div class="caption">
   <div class="form-body">


      <div class="row">
      <div class="col-sm-12">
      <div class="form-group col-sm-4 ">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark" for="ceipt_ord">أمر  التحصيل  </label>
            <div class="col-sm-8">
         <input type="text" class="form-control " name="ceipt_ord" id="ceipt_ord" 
         placeholder="أمر  التحصيل  "  disabled  >
            </div>
            
        </div>
      
        <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="receipt_order_date">تاريخ  الأمر  </label>
            <div class="col-sm-8">
          <input type="text" class="form-control date-picker" name="receipt_order_date" id="receipt_order_date" data-date-format="dd/mm/yyyy"
           placeholder="تاريخ  الأمر  "  value="{{date('d/m/Y')}}" >
            </div>
            
        </div>


          <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="file_type">نوع  الملف   </label>
            <div class="col-sm-8">
          <select id="file_type"  name="file_type" class="form-control">
            <option value="">اختر  نوع الملف  </option>
           
            <option>  </option>

           
            
          </select>
            </div>
           
        </div>

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="payment_type"> نوع  الدفع   </label>
            <div class="col-sm-8">
          <select id="payment_type"  name="payment_type" class="form-control" >
             <option value="">نوع  الدفع   </option>
            
            
          </select>
            </div>
           
        </div>

        <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="file_num">رقم  الملف   </label>
            <div class="col-sm-4">
          <input type="text" class="form-control " name="file_num" id="file_num" 
           placeholder="رقم  الملف   " readonly=""   >
            </div>
                <div class="col-md-3"><button type="button" class="btn  btn-outline red dropdown-toggle" data-toggle="dropdown" onclick="add_app()"><i class="fa fa-plus"></i><span class="hidden-sm hidden-xs">المعاملات   </button></div>
           
        </div>

        <input  type="hidden" name="unique_dept" id="unique_dept"  >

        <input type="hidden" name="cur_file" id="cur_file">


    


        <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="id_num"> تحصيل  من  / الهوية  </label>
            <div class="col-sm-6">
       

          <div class="input-icon  left ">
         <i class="fa fa-user fa" id="id_num_loading"></i>
           <input type="text" class="form-control  " name="id_num" id="id_num" placeholder="رقم الهوية" >

           </div>
            </div>
             <div class="col-sm-2" id="show_balance"><button onclick="show_balance()"  type="button" class="btn btn-info"><i class="fa fa-money"></i></button></div>

              </div>
            
          
       

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="from_name1"> تحصيل  من  السيد   </label>
            <div class="col-sm-8">
          <input  type="text" name="from_name1" id="from_name1" class="form-control" placeholder="حصيل  من  السيد " >
            </div>
           
        </div>

        <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="id_num2" id="id_num2_label"> الدافع  / الهوية  </label>
            <div class="col-sm-8">
           <div class="input-icon  left ">
         <i class="fa fa-user fa" id="id_num_loading1"></i>
           <input type="text" class="form-control  " name="id_num2" id="id_num2" placeholder="رقم الهوية" >

           </div>


        
            </div>
         
        </div>

        <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="from_name2" id="paid_for_all_person_label"> الدفع  بواسطة    </label>
            <div class="col-sm-8">
          <input  type="text" name="from_name2" id="from_name2" class="form-control" placeholder="الدفع  بواسطة ">
            </div>
          
        </div>

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="payment">المبلغ  المدفوع    </label>
            <div class="col-sm-8">
          <input  type="text" name="payment" id="payment" class="form-control" placeholder="المبلغ  المدفوع  " >
            </div>
            
        </div>

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="cd_cur"> العملة  </label>
            <div class="col-sm-8">
          <select id="cd_cur"  name="cd_cur" class="form-control" >
                <option value="">اختر  العملة </option>
           
          </select>
            </div>
           
        </div>

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="cur_exchange_to_nis"> للتحويل  الى الشيكل </label>
            <div class="col-sm-8">
         <input  type="text" class="form-control" id="cur_exchange_to_nis" name="cur_exchange_to_nis" >
            </div>
           
        </div>


         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="cur_exchange_to_file_cur"> تحويل  لعملة  الملف </label>
            <div class="col-sm-8">
         <input  type="text" class="form-control" id="cur_exchange_to_file_cur" name="cur_exchange_to_file_cur" >
            </div>
           
        </div>


        

           <div class=" form-group col-sm-4 activation_code">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="activation_code"> كود  التفعيل    </label>
            <div class="col-sm-8">
          <input  type="text" name="activation_code" id="activation_code" class="form-control" placeholder="كود  التفعيل  " >
            </div>
           
        </div>


          <div class=" form-group col-sm-4 number_of_user">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="number_of_user"> عدد  الافراد   </label>
            <div class="col-sm-8">
          <input  type="number" name="number_of_user" id="number_of_user" class="form-control" placeholder="عدد  الافراد  " >
            </div>
           
        </div>


         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="payment_tax"> الضريبة  </label>
            <div class="col-sm-8">
          <select id="payment_tax"  name="payment_tax" class="form-control" >
             <option value="">اختر   الضريبة  </option>
            
            
          </select>
            </div>
           
        </div>

          <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="payment_details"> التفصيل    </label>
            <div class="col-sm-8">
          <input  type="text" name="payment_details" id="payment_details" class="form-control" placeholder="التفصيل  " >
            </div>
           
        </div>

         <div class=" form-group col-sm-4">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="paid_for_all_person"> الدفع عن  </label>
            <div class="col-sm-8">
          <select id="paid_for_all_person"  name="paid_for_all_person" class="form-control" >
             <option value=""> الدفع  عن   </option>
            
            
            
          </select>
            </div>
           
        </div>



       



      <div class="form-group col-sm-4 ">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark" for="year1" >السنه   </label>

            <div class="col-sm-8">
             <input type="text" name="year1" id="year1" class="form-control" placeholder="السنه  "  disabled=""  value="{{date('Y')}}"
     

             >
            </div>
            
        </div>



         <div class=" form-group col-sm-4 gov_to_owner_id">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="gov_to_owner_id"> الدفع عن  </label>
            <div class="col-sm-8">
          <select id="gov_to_owner_id"  name="gov_to_owner_id" class="form-control" >
             
            
          </select>
            </div>
           
        </div>
    
    
        <div class=" form-group col-sm-4 dept_id">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="dept_id"> القسم  </label>
            <div class="col-sm-8">
          <select id="dept_id"  name="dept_id" class="form-control" >
      <option value=""> الرجاء اختيار القسم </option>
           <option value="1">أملاك حكومة</option>
           <option value="2">طابو</option>       
            <option value="3">مساحة</option> 
          </select>
            </div>
           
        </div>



            <div class=" form-group col-sm-4 paid_type">
            <label class="col-sm-4 control-label color-view bg-blue-dark bg-font-blue-dark"  for="paid_type"> نوع الدفعة    </label>
            <div class="col-sm-8">
          <select id="paid_type"  name="paid_type" class="form-control" >
             <option value="">نوع  الدفعة   </option>
            
            
            
          </select>
            </div>
           
        </div>

<div id="hidden"> </div>
  
 <div class=" form-group col-sm-4"></div>

        <div class="col-md-offset-9 col-md-3">
                    <button type="submit" class="btn green" id="add_data" name="add_data" >  اضافة  </button>

                     <button type="button" class="btn red"  onclick="close_modal()">  اغلاق   </button>

      </div>



</div></div></div></div></div></div></div>


  


   </form>

    </div>
                              
                            
   <br><br> <br><br> <br><br> <br><br>
   
    
   
 <div  class="col-sm-12">


 


<p id="attache">
   

  
  </p>


  

 
</div>
                                                

                  
                       
                        </div>
                        <div class="modal-footer">
                       
                        

                       
                        </div>
                    </div>
                </div>
            </div>



<script type="text/javascript">  


function append_data(){

 var url2='{!! URL::asset("finance/projectpayment/append_data") !!}';
 $.get(url2,{ }, function (ec) {

  $("#project_payment").find("#file_type").empty();
          var file_type = $("#project_payment").find("#file_type");
          file_type.append($("<option />").val('').text('اختر  نوع الملف   '));
         $.each(ec.file_types, function() {
         file_type.append($("<option />").val(this.status_id).text(this.status_name));
        });  


          $("#project_payment").find("#payment_type").empty();
          var payment_type = $("#project_payment").find("#payment_type");
          payment_type.append($("<option />").val('').text('وع  الدفع  '));
         $.each(ec.payment_types, function() {
         payment_type.append($("<option />").val(this.status_id).text(this.status_name));
        });



         $("#project_payment").find("#cd_cur").empty();
          var cd_cur = $("#project_payment").find("#cd_cur");
          cd_cur.append($("<option />").val('').text('العملة  '));
         $.each(ec.cd_curs, function() {
         cd_cur.append($("<option />").val(this.ref_id).text(this.status_name));
        });

          $("#project_payment").find("#payment_tax").empty();
          var payment_tax = $("#project_payment").find("#payment_tax");
          payment_tax.append($("<option />").val('').text('الضريبة  '));
         $.each(ec.payment_ts, function() {
         payment_tax.append($("<option />").val(this.status_id).text(this.status_name));
        }); 


          $("#project_payment").find("#paid_for_all_person").empty();
          var paid_for_all_person = $("#project_payment").find("#paid_for_all_person");
          paid_for_all_person.append($("<option />").val('').text('الدفع  عن  '));
         $.each(ec.paid_for_all_persons, function() {
         paid_for_all_person.append($("<option />").val(this.status_id).text(this.status_name));
        });  


          $("#project_payment").find("#paid_type").empty();
          var paid_type = $("#project_payment").find("#new_to_date");
          paid_type.append($("<option />").val('').text(' نوع  الدفعة  '));
         $.each(ec.gov_paids_dates, function() {
         paid_type.append($("<option />").val(this.status_id).text(this.status_name));
        });




   });



 /******************************/

 $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");
  $(".gov_to_owner_id").hide();
   $(".activation_code").hide();
    $("#show_balance").hide();
  
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
 /************************************/

 }







$("#project_payment").find("#id_num").keyup(function(e) {
   var id_num =$("#project_payment").find("#id_num").val();
 
   if(id_num.length==9 ) {
    
      $("#id_num_loading").addClass('fa-spin');
      $("#id_num_loading").addClass('fa-user');
        $("#id_num_loading").removeClass('fa-exclamation font-red');
         $("#id_num_loading").removeClass('fa-check font-green');
          $("#id_num_group").removeClass('has-error');
           $("#id_num_group").removeClass('has-success ');

      var url='{!! URL::asset("/gov/gov_request/get_name/'+id_num+'") !!}'
      
         $.get(url , function (data) {
         $("#id_num_loading").removeClass('fa-spin'); 
          // var a=jQuery.parseJSON(data);
           if(data['fname'].length == 0){
              $("#id_num_loading").removeClass('fa-user'); 
               $("#id_num_loading").addClass('fa-exclamation font-red');
               $("#id_num_group").addClass('has-error');
               $("#from_name1").val('');
      


           }else {
             $("#id_num_loading").removeClass('fa-user'); 
               $("#id_num_loading").addClass('fa-check font-green');
                $("#id_num_group").addClass('has-success ');
                 $("#from_name1").val(data['fname']+" "+data['sname']+" "+data['tname']+" "+data['lname']);
         


           }
          
        

    });
    }
});



$("#project_payment").find("#id_num2").keyup(function(e) {
   var id_num =$("#project_payment").find("#id_num2").val();
 
   if(id_num.length==9 ) {
    
      $("#id_num_loading1").addClass('fa-spin');
      $("#id_num_loading1").addClass('fa-user');
        $("#id_num_loading1").removeClass('fa-exclamation font-red');
         $("#id_num_loading1").removeClass('fa-check font-green');
          

      var url='{!! URL::asset("/gov/gov_request/get_name/'+id_num+'") !!}'
      
         $.get(url , function (data) {
         $("#id_num_loading1").removeClass('fa-spin'); 
          // var a=jQuery.parseJSON(data);
           if(data['fname'].length == 0){
              $("#id_num_loading1").removeClass('fa-user'); 
               $("#id_num_loading1").addClass('fa-exclamation font-red');
           
               $("#from_name1").val('');
      


           }else {
             $("#id_num_loading1").removeClass('fa-user'); 
               $("#id_num_loading1").addClass('fa-check font-green');
             
                 $("#from_name2").val(data['fname']+" "+data['sname']+" "+data['tname']+" "+data['lname']);
         


           }
          
        

    });
    }
});







$("#project_payment").validator().on('submit', function(e) {



   if (e.isDefaultPrevented()) {
       
    } else {
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

 e.preventDefault(); 
    $.ajax({
     url:" {!! URL::asset("/finance/projectpayment/project_payment_add") !!}",
      data:new FormData($("#project_payment")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
            
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#project_payment_alert').hide();

                 if((e['id1'] != '') && (parseInt(e['id1'])>0) ){

                   location.reload();
                 // alert('hi');
                   //window.location='{!! URL::asset("gov/gov_accounting/projectpayment/project_payment_op_edit/'+e['id1']+'") !!}';
               // window.location='{!! URL::asset("/finance/projectpayment/project_payment_display_view_for_finance") !!}';


                 }

                 if(parseInt(e['dontremove'])==1){}else{
                 
                 $("#project_payment").click(function() {
                 $(this).closest('form').find("input[type=text], textarea").val("");
                  });

               }

               
                 
                  
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#project_payment_alert').hide();

                   
                    swal.queue([{
                     title: 'تنبية',
                      text: e['response'],
                       type: 'danger',}]); 
                   
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                    
            }
       
        
            },
            error: function(e) 
            {
                
              $('#project_payment_alert').show();
              
              $('#project_payment_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#project_payment_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
       });
            }
        }); 



//////////////////////////////////////تغير  العملة
$("#project_payment").find("#cd_cur").change(function(){
 change_cur();
});

function  change_cur(){

var url='{!! URL::asset("/gov/gov_accounting/projectpayment/exchange_prices") !!}';
    
    $.get(url, function (e) {



if($("#project_payment").find("#cd_cur").val()==2){

  $("#project_payment").find("#cur_exchange_to_nis").val(1);
  $("#project_payment").find("#cur_exchange_to_nis").prop("readonly","readonly");

}else if($("#project_payment").find("#cd_cur").val()==6){
  $("#project_payment").find("#cur_exchange_to_nis").val(e['j_to_nis']);
   $("#project_payment").find("#cur_exchange_to_nis").prop("readonly","readonly");
}
else if($("#project_payment").find("#cd_cur").val()==1){

    $("#project_payment").find("#cur_exchange_to_nis").val(e['d_to_nis']);
     $("#project_payment").find("#cur_exchange_to_nis").prop("readonly","readonly");

}

/////////////////////////////////////////////

if($("#project_payment").find("#unique_dept").val() !='' && $("#project_payment").find("#file_type").val()==510){

  if($("#project_payment").find("#cd_cur").val() == $("#project_payment").find("#cur_file").val()) {
    $("#project_payment").find("#cur_exchange_to_file_cur").val(1);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");
  }

  else if($("#project_payment").find("#cd_cur").val()==2 &&  $("#project_payment").find("#cur_file").val()==6){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['j_to_nis']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }

  else if($("#project_payment").find("#cd_cur").val()==2 &&  $("#project_payment").find("#cur_file").val()==1){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['d_to_nis']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }



   else if($("#project_payment").find("#cd_cur").val()==6 &&  $("#project_payment").find("#cur_file").val()==2){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['j_to_nis']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }

  else if($("#project_payment").find("#cd_cur").val()==6 &&  $("#project_payment").find("#cur_file").val()==1){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['j_to_d']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }


   else if($("#project_payment").find("#cd_cur").val()==1 &&  $("#project_payment").find("#cur_file").val()==2){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['d_to_nis']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }

   else if($("#project_payment").find("#cd_cur").val()==1 &&  $("#project_payment").find("#cur_file").val()==6){

     $("#project_payment").find("#cur_exchange_to_file_cur").val(e['d_to_j']);
     $("#project_payment").find("#cur_exchange_to_file_cur").prop("readonly","readonly");


  }





}



});








}

/**************بس  عند  دفع  من  المستحقات  ******************/



/********************************/
////////////////////////////////////
$("#project_payment").find("#paid_for_all_person").change(function(){
if($("#project_payment").find("#paid_for_all_person").val() == 511 ) {
  $("#project_payment").find(".gov_to_owner_id").hide();


}
else if($("#project_payment").find("#paid_for_all_person").val() == 512 && $("#project_payment").find("#file_type").val() == 510) {


  $("#project_payment").find(".gov_to_owner_id").show();
//  alert();
  var unique_dept =$("#project_payment").find("#unique_dept").val()

  owner_in_application(unique_dept);


}


})
//////////////////////////////////
function all_application(id ,ftype=0){

    $("#project_payment").find("#file_num").val('');
       $("#project_payment").find("#unique_dept").val('');
       $("#project_payment").find("#id_num").val('');
       $("#project_payment").find("#from_name1").val('');
        $("#project_payment").find("#cd_cur option[value='']").attr('selected', 'selected');

  if($("#project_payment").find('#file_type').val() == 253) {
   // alert('hi');
      var url='{!! URL::asset("/finance/projectpayment/tabo_one_data/'+id+'") !!}';
    
    $.get(url, function (e) {

       $("#project_payment").find("#file_num").val(e[0]['app_no']);
       $("#project_payment").find("#unique_dept").val(e[0]['app_cost_id']);
       $("#project_payment").find("#id_num").val(0);
       $("#project_payment").find("#from_name1").val(e[0]['name1']);

      });



  } else if($("#project_payment").find('#file_type').val() == 510) {




    var url2='{!! URL::asset("/finance/transactions/app_one_data/'+id+'") !!}';

  $.get(url2, function (e) {

    $("#project_payment").find("#file_num").val(e[0]['app_no']);
    $("#project_payment").find("#unique_dept").val(e[0]['id']);

 $("#project_payment").find("#id_num").val(e[0]['id_num']);
  $("#project_payment").find("#from_name1").val(e[0]['full_name']);
  
   


 });
    
 
    var url2='{!! URL::asset("/finance/projectpayment/cd_cur_info/'+id+'") !!}';

  $.get(url2, function (e) {
  var cur_file =e;

    $("#project_payment").find("#cur_file").val(cur_file);
    $("#project_payment").find("#cd_cur option[value="+e+"]").attr('selected', 'selected');
     change_cur();

 });
$('#add_app').modal('toggle');

}

else if( $("#project_payment").find('#file_type').val() == 254) {


    var url3='{!! URL::asset("/finance/projectpayment/area_one_data/'+id+'") !!}';

  $.get(url3, function (e) {

     $("#project_payment").find("#file_num").val(e[0]['serial']);
     $("#project_payment").find("#unique_dept").val(e[0]['app_id']);

  $("#project_payment").find("#id_num").val(e[0]['identity_num']);
 if(e[0]['identity_num'] == ''){
   $("#project_payment").find("#id_num").val(0);
 }
   $("#project_payment").find("#from_name1").val(e[0]['full_name']);
  
   


 });


}


else if( $("#project_payment").find('#file_type').val() == 229) {


    var url4='{!! URL::asset("/finance/projectpayment/statments_one_data/'+id+'/'+ftype+'") !!}';

  $.get(url4, function (e) {

     $("#project_payment").find("#file_num").val(e[0]['appcl_no']);
     $("#project_payment").find("#unique_dept").val(e[0]['id']);

  $("#project_payment").find("#id_num").val(e[0]['id_num']);
 if(e[0]['id_num'] == ''){
   $("#project_payment").find("#id_num").val(0);
 }
   $("#project_payment").find("#from_name1").val(e[0]['full_name']);
  
   


 });


}




}
/***********    *******************/
function owner_in_application(unique_dept){
 // alert(unique_dept);
   var url='{!! URL::asset("/finance/projectpayment/owner_in_application/'+unique_dept+'") !!}';

  $.get(url, function (ec) {
//alert (ec[0]['full_name']);
    $("#project_payment").find("#gov_to_owner_id").empty();
    var $gov_to_owner_id =  $("#project_payment").find("#gov_to_owner_id");
         $gov_to_owner_id.append($("<option />").val('').text('الدفع  عن  '));
         $.each(ec.owner_in_applications, function() {
         $gov_to_owner_id.append($("<option />").val(this.id1).text( this.full_name ));
        }); 


 
    
 


  });






}
/*************** شروط ******************/
 $("#project_payment").find("#file_type").change(function(){
  /**  اذا  المعادلة  مساحة   أو  طابو   أو   أملاك  حكومة  **/
  if(  $("#project_payment").find("#file_type").val()==510){
     $("#project_payment").find("#id_num").attr("readonly","readonly");
     $("#project_payment").find("#from_name1").attr("readonly","readonly");
    $("#project_payment").find("#cd_cur").prop("readonly",false);
    $("#project_payment").find('.paid_type').show();
     $("#project_payment").find('.number_of_user').hide();

  }
  //طابو 
  else if( $("#project_payment").find("#file_type").val() == 253   ){
     $("#project_payment").find("#id_num").attr("readonly","readonly");
     $("#project_payment").find("#from_name1").attr("readonly","readonly");
     $("#project_payment").find("#cd_cur").prop("readonly",false);
      $("#project_payment").find('.paid_type').hide();
        $("#project_payment").find('.number_of_user').hide();
     

  }
// مساحة 
   else if( $("#project_payment").find("#file_type").val() == 254   ){
  $("#project_payment").find("#id_num").attr("readonly","readonly");
     $("#project_payment").find("#from_name1").attr("readonly","readonly");
     $("#project_payment").find("#cd_cur").prop("readonly",false);
      $("#project_payment").find('.paid_type').hide();
      $("#project_payment").find('.number_of_user').hide();

   }

    else if( $("#project_payment").find("#file_type").val() == 229   ){

       $("#project_payment").find("#payment_details").val(' افادة  ');

  $("#project_payment").find("#id_num").attr("readonly","readonly");
     $("#project_payment").find("#from_name1").attr("readonly","readonly");
     $("#project_payment").find("#cd_cur").prop("readonly",false);
      $("#project_payment").find('.paid_type').hide();
      $("#project_payment").find('.number_of_user').hide();

      $("#project_payment").find("#payment_type option[value='"+521+"']").attr('selected', 'selected');
      $("#project_payment").find("#payment_tax option[value='"+227+"']").attr('selected', 'selected');
       $("#project_payment").find("#cd_cur option[value='"+2+"']").attr('selected', 'selected');
       $("#project_payment").find("#paid_for_all_person option[value='"+511+"']").attr('selected', 'selected');
          
           

       $("#projectpayment").find("#cur_exchange_to_nis").val(1);
       $("#projectpayment").find("#cur_exchange_to_file_cur").val(1);
    
    


   }

    else if( $("#project_payment").find("#file_type").val() == 255   ){
  $("#project_payment").find('.number_of_user').show();
   $("#project_payment").find("#id_num").prop("readonly",false);
     $("#project_payment").find("#from_name1").prop("readonly",false);

    }

  else {
     $("#project_payment").find("#id_num").prop("readonly",false);
     $("#project_payment").find("#from_name1").prop("readonly",false);
       $("#project_payment").find("#cd_cur").prop("readonly",false);
        $("#project_payment").find('.paid_type').hide();
        $("#project_payment").find('.number_of_user').hide();

  }


});
/*******************تكرار رقم الهوية تحصيل من  هو الدافع  *******************/
 $("#project_payment").find("#id_num").dblclick(function(){
 // alert("hi");

   $("#project_payment").find("#id_num2").val( $("#project_payment").find("#id_num").val());
})

/***********************************/
 $("#project_payment").find("#from_name1").dblclick(function(){

   $("#project_payment").find("#from_name2").val( $("#project_payment").find("#from_name1").val());
})
/*****************************/
function add_app(){
 
/********************أملاك  حكومة**************/
if( $("#project_payment").find('#file_type').val() == 510) {
  $('#add_app').modal('toggle');
 show_data();
 change_cur();
}
/********************طابو  **************/
if( $("#project_payment").find('#file_type').val() == 253) {
  $('#add_app_tabo').modal('toggle');
 show_data_tabo();
}
/********************المساحة  **************/
if( $("#project_payment").find('#file_type').val() == 254) {
  $('#add_app_area').modal('toggle');
 show_data_area();
}
/***************** افادات  ملكية  **************/
if( $("#project_payment").find('#file_type').val() == 229) {
   $('#add_app_statements').modal('toggle');
 show_data_statements();
}
 
}
///////////////////////توقيع  خروج
 $("#project_payment").find("#number_of_user").keyup(function(){
var payment;
if( $("#project_payment").find("#number_of_user").val() > 0){
payment=parseInt( $("#project_payment").find("#number_of_user").val()) * 60;
if(parseInt(payment) > 300){
  payment= $("#project_payment").find("#number_of_user").val() * 60;;

}else{
  payment=300;
 // alert("hi");

}

   $("#project_payment").find("#payment").prop("readonly",true);
   $("#project_payment").find("#payment").val(payment);
     $("#project_payment").find("#cd_cur option[value='"+2+"']").attr('selected', 'selected');
      $("#project_payment").find("#payment_tax option[value='"+227+"']").attr('selected', 'selected');
       $("#project_payment").find("#paid_for_all_person option[value='"+511+"']").attr('selected', 'selected');

   $("#project_payment").find("#payment_details").prop("readonly",true);
   $("#project_payment").find("#payment_details").val('رسوم  توقيع  خارجي   ');
      $("#project_payment").find("#cur_exchange_to_nis").val(1);

}

})


 $("#project_payment").find("#number_of_user").change(function(){
var payment;
if( $("#project_payment").find("#number_of_user").val() > 0){
payment=parseInt( $("#project_payment").find("#number_of_user").val()) * 60;
if(parseInt(payment) > 300){
  payment= $("#project_payment").find("#number_of_user").val() * 60;;

}else{
  payment=300;
 // alert("hi");

}

   $("#project_payment").find("#payment").prop("readonly",true);
   $("#project_payment").find("#payment").val(payment);
     $("#project_payment").find("#cd_cur option[value='"+2+"']").attr('selected', 'selected');
          $("#project_payment").find("#payment_tax option[value='"+227+"']").attr('selected', 'selected');
       $("#project_payment").find("#paid_for_all_person option[value='"+511+"']").attr('selected', 'selected');

   $("#project_payment").find("#payment_details").prop("readonly",true);
   $("#project_payment").find("#payment_details").val('رسوم  توقيع  خارجي   ');
      $("#project_payment").find("#cur_exchange_to_nis").val(1);

}

})


/*****************دفع  مستحقات  ********************/


 $("#project_payment").find("#payment_type").change(function(){

  if($("#payment_type").val() ==693){

   $("#project_payment").find(".activation_code").show();  
   $("#project_payment").find("#add_data").prop("disabled",true);
   $("#project_payment").find("#verify_code").prop("disabled",false);
   $("#project_payment").find("#hidden").html("<input type='hidden' name='verify_code_input' id='verify_code_input'/>");
   $("#project_payment").find("#paid_for_all_person_label").text("اسم  المستفيد   ");
   $("#project_payment").find("#id_num2_label").text("المستفيد  / هوية  ");
   $("#project_payment").find("#id_num").prop("readonly",false);
   $("#project_payment").find("#from_name1").prop("readonly",false);
   $("#project_payment").find("#cur_exchange_to_nis").attr("readonly","readonly");
 $("#project_payment").find("#cur_exchange_to_file_cur").attr("readonly","readonly");
  $("#project_payment").find("#show_balance").show();

  }

  else if( $("#project_payment").find("#payment_type").val() == 519 ){

   $("#project_payment").find("#cur_exchange_to_nis").attr("readonly", false);
   $("#project_payment").find("#cur_exchange_to_file_cur").attr("readonly", false);

   $("#project_payment").find("#add_data").prop("disabled",false);
   $("#project_payment").find("#verify_code").prop("disabled",true);
   $("#project_payment").find("#hidden").html("");
   $("#project_payment").find(".activation_code").hide(); 
   $("#project_payment").find("#paid_for_all_person_label").text("ا لدفع  بواسطة ");
   $("#project_payment").find("#id_num2_label").text("الدافع  / الهوية  ");


 if( $("#project_payment").find("#file_type").val() == 510  ||   $("#project_payment").find("#file_type").val() == 253 ||  $("#project_payment").find("#file_type").val() == 259|| $("#project_payment").find("#file_type").val() == 299 ||  $("#project_payment").find("#file_type").val() == 255){

   $("#project_payment").find("#id_num").prop("readonly",true);
   $("#project_payment").find("#from_name1").prop("readonly",true);
    $("#project_payment").find("#show_balance").hide();
}



}else {

 $("#project_payment").find("#cur_exchange_to_nis").attr("readonly","readonly");
 $("#project_payment").find("#cur_exchange_to_file_cur").attr("readonly","readonly");
 $("#project_payment").find("#add_data").prop("disabled",false);
 $("#project_payment").find("#verify_code").prop("disabled",true);
 $("#project_payment").find("#hidden").html("");
 $("#project_payment").find(".activation_code").hide(); 
 $("#project_payment").find("#paid_for_all_person_label").text("ا لدفع  بواسطة ");
 $("#project_payment").find("#id_num2_label").text("الدافع  / الهوية  ");
if( $("#project_payment").find("#file_type").val() == 510  ||   $("#project_payment").find("#file_type").val() == 253 ||  $("#project_payment").find("#file_type").val() == 259|| $("#project_payment").find("#file_type").val() == 299 ||  $("#project_payment").find("#file_type").val() == 255){

      $("#project_payment").find("#id_num").prop("readonly",true);
   $("#project_payment").find("#from_name1").prop("readonly",true);
    $("#project_payment").find("#show_balance").hide();
}

  }


})


 $("#project_payment").find("#activation_code").change(function(){
 $("#project_payment").find("#add_data").prop("disabled",false);
   $("#project_payment").find("#verify_code").prop("disabled",true);
   $("#project_payment").find("#hidden").html(""); 


});

 $("#project_payment").find("#activation_code").keyup(function(){
 $("#project_payment").find("#add_data").prop("disabled",false);
   $("#project_payment").find("#verify_code").prop("disabled",true);
   $("#project_payment").find("#hidden").html(""); 


});





/*******************رصيد  المستحقات  *********/
function show_balance(){

  var id_num= $("#project_payment").find("#id_num").val();

   var url='{!! URL::asset("/finance/projectpayment/show_balance/'+id_num+'") !!}';

  $.get(url, function (ec) {

    if(ec['result'] == "ok");

    alert(ec['response']);

        }); 


 
    
 


  }


/************************************************/

function close_modal(){

 $('#create_bill').modal('toggle');
document.getElementById("project_payment").reset();
}
 


</script>
