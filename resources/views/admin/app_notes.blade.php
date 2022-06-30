<!--====================================================================-->
  <div class="modal fade" id="app_notes"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="background:#eee" >

    <div class="portlet light bordered">
<div class="row">
<div class="col-md-12">
 <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">ملاحظات معاملة</span>
        </div>
        <hr>
        <div class="tools"> </div>

      
    <form class="form-horizontal" role="form" method="post" data-toggle="validator"   id="app_notes_form">
      <div class="alert alert-danger" id="alert_remove_bill" style="display:none">
                        <ul id="error_remove_bill"> 
                        </ul>
     </div>


      



     <div  class="col-sm-12 form-group">

      <div class="col-sm-6">
        <span class="col-sm-4 control-label" style="font-weight:bold">الملاحظة  </span>
        <div class="col-sm-8">
        <textarea type="text" id="app_notes_note" name="app_notes_note" ></textarea>
          </div>
      </div>

  <input type="hidden" name="notes_app_id" id="notes_app_id">

      </div>

  
     
       

      <div class="form-group col-sm-12">
                <div class="col-md-offset-6 col-md-6">
                  
                   <button type="submit" class="btn green" > حفظ</button>
                 </div></div>


      </form>

      </div> </div></div></div>


  
  
     <br> <br>

      <table class="table table-striped table-bordered table-hover" id="app_notes_tb" >
                <thead>
                   

                     <tr>
                      <th width="5%" style="width:5%">تاريخ الملاحظة</th>
                     <th width="75%" style="width:75%">الملاحظة</th>
                     <th width="20%" style="width:20%">الموظف  </th>
                      
                    </tr>
                </thead>
                <tbody >
                  
                   
                 
                 

                       
                </tbody>
                <tfoot>
                 
                </tfoot>
            </table




  

                       ></div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>
<script>
function app_notes(app_id) {
 	$('#app_notes').modal('toggle');
 	$('#app_notes_form').find('#notes_app_id').val(app_id);
	app_notes_data(app_id);
}


function app_notes_data(app_id){
	var url1='{!! URL::asset("/gov/app_notes_data/'+app_id+'") !!}'
	$('#app_notes_tb').DataTable({
		  destroy: true,
		  processing: true,
		  serverSide: true,
		  "pageLength": 10,
		  "fnDrawCallback": function(settings, json) {

			  /* $(".popovers").popover(),$(document).on("click.bs.popover.data-api",function(e){t&&t.popover("hide")});
			   $("#save").attr("disabled",false);
			   $("#loading5").hide();*/

  		  },
		 "ajax": {
				"url": url1,
				"data": function ( d ) {
			
				}
         },
         columns: [
                {data: 'note_date', name: 'note_date'},
                {data: 'note1', name: 'note1'},
                {data: 'full_name', name: 'full_name'},
				
         ]
    });
}

$(document).ready(function (e) { 
	$("#app_notes_form").on('submit', function(e) {
	   if (e.isDefaultPrevented()) {
		   
	   } else {
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			})
	
	 e.preventDefault(); 
		$.ajax({
		 url:" {!! URL::asset('/gov/app_notes/') !!}",
		  data:new FormData($("#app_notes_form")[0]),
		  dataType:'json',
		  async:false,
		  type:'POST',
		  processData: false,
		  contentType: false,
		  success:function(e) {
				if (e['result'] == 'ok') {
					jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
					app_notes_data($('#app_notes_form').find('#notes_app_id').val());    
				}else if (e['result'] == 'error'){
					  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});
				}
				else
				{
					  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});    
				}
		   
			
		   },
		   error: function(e){
				 jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});    
		   }           
		});
	   }
	});
}); 
</script>