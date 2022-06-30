
 <div class="modal fade" id="update_stock_cust_modal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee" >



         <div class="row " >
<div class="portlet light borderd">
    <div class="portlet-title">
<div class="caption">
  <i class="fa fa-map font-red-thunderbird"></i>
    <span class="caption-subject  bold uppercase borderd font-red-thunderbird"> تعديل   الملاحظات    </span>

</div>
 
</div>
<div class="portlet-body borderd">


<div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form  class="form-horizontal"  method="post"   id="update_stock_cust_form" enctype="multipart/form-data" >
         {{ csrf_field() }}
     <div class="alert alert-danger" id="update_stock_cust_alert" style="display:none" >
                        <ul id="update_stock_cust_error"> 
                        </ul>
                        </div>
        
        <div class="form-body">

<div class="row">
      <div class="col-sm-12">


      <input type="hidden" id="cust_id_in_update" name="cust_id_in_update">
       <input type="hidden" id="inv_id_pk_update" name="inv_id_pk_update">

   
 
              <div class="form-group col-md-8 col-sm-offset-4  ">
                <label class="col-md-4 control-label color-view bg-blue-dark bg-font-blue-dark"> الملاحظات   <span style="color:red;">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control " placeholder="الملاحظات   " id="note_in_update" name="note_in_update"   >
                    </div>
                
            </div>



            <div class="form-group  col-sm-12">
                <div class="  col-md-3 col-sm-offset-9">
                    <button  type="submit" class="btn green" id="add"><i class="fa fa-plus"></i> تعديل    </button><img src="{{url('/')}}/admin/assets/global/img/loading5.gif" style=" display:none; height:25px;float:left"  id="loading1" >
              
                    
                 
                </div>
                 <div class=" col-md-6">  </div>
            </div>
        

        </div></div></div>
    </form>
    <!-- END FORM-->
</div>


</div></div></div> 


  
  
     <br> <br>
                       </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
  

  /**********************************/
$("#update_stock_cust_form").on('submit', function(e) {
 
 
   // $('#loading1').show();
    //$('#add').hide();
   if (e.isDefaultPrevented()) {
 
       
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

  


  e.preventDefault(); 

    $.ajax({
      url:'{!! URL::asset("/stock_store/custody/update_stock_cust") !!}',
      data:new FormData($("#update_stock_cust_form")[0]),
      dataType:'json',
      async:false,
      type:'POST',
      processData: false,
      contentType: false,
      success:function(e) {
            
             $('#loading1').hide();
               $('#add').show();
         
               
            if (e['result'] == 'ok') {
                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                 $('#update_stock_cust_alert').hide();
                  $('#update_stock_cust_form')[0].reset();
                  $("#update_stock_cust_form").find('input[type=text], input[type=hidden], input[type=password], input[type=file], select, textarea').val('');
                  $("#update_stock_cust_form").find('input[type=radio], input[type=checkbox]').removeAttr('checked').removeAttr('selected');
                  $( ".select2" ).val('').trigger('change');

               //   $(".select2").select2("val", "");

                     $("#update_stock_cust_modal").modal("toggle");
                  cust_vw_data(e['inv_id_pk_update']);
                   
            }

           else if (e['result'] == 'error')
            {
                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
                   $('#update_stock_cust_alert').hide();
                    swal(
                          'تنبية',
                             e['response'],
                              'error',);
                   
                   
            }


            else
            {
                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});
                  
            }
       
        
            },
            error: function(e) 
            {
                 $('#loading1').hide();
               $('#add').show();
              $('#update_stock_cust_alert').show();
              $('#update_stock_cust_error').empty();
              var error = e.responseJSON;
              $.each(error, function (i, member) {
              for (var i in member) {
              $('#update_stock_cust_error').append('<li >'+ member[i] +'</li>' );
             }
           });

             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});
            }           
     });

  }
            
        }); 



function update_stock_cust(cust_id,inv_id_pk,item_id_pk){




  $("#update_stock_cust_modal").modal("toggle");




  $("#cust_id_in_update").val(cust_id);
  $("#inv_id_pk_update").val(inv_id_pk);


}




</script>