 <style type="text/css">
  .select2-container--bootstrap[dir="rtl"] .select2-selection--single {
    padding-left: 24px;
    padding-right: 0px;
} 
   
 </style>

 <div class="modal fade" id="paper_content"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " style="overflow:hidden;" >


   
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user"></i>
                                        <span class="caption-subject font-dark bold uppercase" id="cont_name1"></span>
                                    </div>
                                  
                                </div>
                                  
                               
                                    <div class="table-scrollable" id="paper_content_data">

                                       
                                    </div>


                                     <div class="col-md-12">
    
      </div>
                              
                            
                            <br><br> <br><br> <br><br> <br><br>
   
    
   
 <div  class="col-sm-12">


 


<p id="attache_paper">
   

  
  </p>


  

 
</div>
                                                

                  
                       
                        </div>
                        <div class="modal-footer">
                     
                          <div  class="col-sm-6">
                        
                         </div>

                       
                           
                        </div>
                    </div>
                </div>
            </div>



<script type="text/javascript">


//alert(app_d_id);
  function displayAttachpaper(e)
  {
$.each(e, function(k, v) {
//alert(v['imgext']);

	var adddate='';
		if(v['adddate'])  adddate=v['adddate'];

   
		
		var title='';
		if(v['title'])  title=v['title'];



      if(v['imgext']=='JPG' || v['imgext']=='PNG'  || v['imgext']=='GIF' || v['imgext']=='jpg' || v['imgext']=='JPEG' || v['imgext']=='png' || v['imgext']=='jpeg' || v['imgext']=='gif'  ){
<?php $user_test=Sentinel::getUser();//$user_test->id!='1' ?>




		  $('#attache_paper').append('<div class="mt-element-overlay col-sm-6 col-md-3">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
													'<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'); width:100%; height:250px"></div>'+
                                                    '<div class="mt-overlay"><h2>'+

                                                    
                                                      v['ptype'] +'   </h2>'+
													                  '<ul class="mt-info">'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline fancybox-buttons" data-fancybox-group="image" href="'+show_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                                                                    '<i class="icon-magnifier"></i>'+
                                                                '</a>'+
                                                            '</li>'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="javascript:delete_attach(\''+v['imgname']+'\');">'+
                                                                    '<i class="icon-trash"></i>'+
                                                                '</a>'+
                                                            '</li>'+															
                                                        '</ul>'+
														
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>');





								

       } else {

          var val;


 switch (v['imgext']) {
    case 'doc': val='{!!URL::asset("/icon/DOC.png")!!}';break;
    case 'docx': val='{!!URL::asset("/icon/DOCX.png")!!}';break;
    case 'pdf': val='{!!URL::asset("/icon/PDF.png")!!}';break;
    case 'dwg': val='{!!URL::asset("/icon/DWG.png")!!}';break;
     case 'jpeg': val='{!!URL::asset("/icon/JPEG.png")!!}';break;
    default: val='{!!URL::asset("/")!!}icon/'+v['imgext'].toUpperCase()+'.png';
   }

<?php $user_test=Sentinel::getUser();?>

$('#attache_paper').append('<div class="mt-element-overlay col-sm-6 col-md-3">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
													'<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+val+'); width:100%; height:250px"></div>'+
                                                    '<div class="mt-overlay">'+
                                                   
                                                    
                                                       '<h2>'+v['ptype']+'</h2>'+
													    '<ul class="mt-info">'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="'+download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                                                                    '<i class="fa fa-download"></i>'+
                                                                '</a>'+
                                                            '</li>'+
                                                            '<li>'+
                                                                '<a class="btn default btn-outline" href="javascript:delete_attach(\''+v['imgname']+'\');">'+
                                                                    '<i class="icon-trash"></i>'+
                                                                '</a>'+
                                                            '</li>'+															
                                                        '</ul>'+
														
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>');
								
       }
});

}



</script>
