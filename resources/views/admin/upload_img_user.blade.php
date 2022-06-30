<style type="text/css">
#chart-checkbox {
  display: none;
}
.chart-checker {
  background-image: url({{url('/')}}/admin/assets/map.png);
  background-position: left center;
  background-size: auto 100%;
  /*width: 40px;
  height: 40px;*/
  background-repeat: no-repeat;
}
#chart-checkbox:checked + .chart-checker {
   background: url({{url('/')}}/admin/assets/checkmark.png) left center no-repeat;  
}
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: right;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 251px;
    height: 300px;
				text-align:center;
				border: 1px solid;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;           
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.8;
              width: 48px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .home .demo-gallery {
              padding-bottom: 80px;
            }

         .thumbnail{
    width: 251px;
    height: 300px;
          
         }



</style>
<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">
<div class="modal fade" id="view_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="z-index:90030">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " >
    <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user"></i>
                                        <span class="caption-subject font-dark bold uppercase" id="cont_name2"></span>
                                    </div>
                                  
                                </div>
                               
                                    <div class="table-scrollable" id="view_attachment_info">
                                        
                                    </div>
   
    
   
 <div  class="col-sm-12">


<p >
<div class="demo-gallery">
   <ul id="attache1_images" class="list-unstyled row lightgallery">

  </ul>
  <div id="attache1_files" class="list-unstyled row">

  </div>
  </div>
  
  </p>

 
</div>



                                                

                  
                       
                        </div>
                        <div class="modal-footer">
                        
  

                   
                           
                        </div>
                    </div>
                </div>
            </div>

<!--====================================================================-->



<!--=====================================================================-->
<meta name="_token" content="{!! csrf_token() !!}" />
<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>
<script type="text/javascript">

var img_determin='';
var app_d_id1=0;

  //$(document).ready(function () {

function copy_system(){

  
  if (typeof application_dept_id === 'undefined' ||  hidedeterminprint || application_dept_id==0 ) {
         
         $("#hidedeterminprint").hide(); 
        app_d_id1= 0;

    } else{
      $("#hidedeterminprint").show();
      app_d_id1 = application_dept_id;  
     // alert(app_d_id1);
     
    } 



}











//});

//alert(app_d_id1);
var $lg = $('#attache1_images');
$lg.lightGallery();

function displayAttachuserCustom(e,delete_url,show_url ,thumbnail_url,download_url,delete_url_2){

    displayAttachuserNew(e,delete_url,show_url ,thumbnail_url,download_url,delete_url_2);

}


function displayAttachuser(e){

//alert(show_url+download_url);
  if (typeof delete_url == 'undefined')  delete_url='';
  if (  typeof download_url === "undefined")  download_url='';
  if (typeof delete_url_2 == 'undefined')  delete_url_2='';
  //alert(my_data);
  //if(typeof my_data == 'undefined') my_data=0;

  copy_system();

    displayAttachuserNew(e,delete_url,show_url ,thumbnail_url,download_url,delete_url_2);

    copy_system();
       
}

  function displayAttachuserNew(e,delete_url,show_url ,thumbnail_url,download_url,delete_url_2)
  {

    copy_system();
	  //alert('11');
	$('#attache1_images').empty();
	$('#attache1_files').empty();
	$.each(e, function(k, v) {
		var adddate='';
		if(v['adddate'])  adddate=v['adddate'];

    var number =0;
   if(v['copy_num']) number=v['copy_num'];
		
		var title='';
		if(v['title'])  title=v['title'];
		
      if(v['imgext']=='JPG' || v['imgext']=='PNG' || v['imgext']=='JPEG' || v['imgext']=='jpeg'  || v['imgext']=='GIF' || v['imgext']=='jpg' || v['imgext']=='png' || v['imgext']=='gif'  ){

         if(true)
		 {
      var imgname=v['imgname'];



if(app_d_id1 > 0) {
  img_determin =

'<span class="d1">تحديد <input type="checkbox" value="'+v['id']+'" name="print_image[]"    class="print_image" id="print_image_'+imgname.replace('.','_')+'"></span> '+  

          '<span class="d2">خريطة  <input type="checkbox" value="1" name="chart_or_not[]"    class="chart_or_not" id="chart_or_not_'+imgname.replace('.','_')+'"><br>   <input type="text"  name="number-input[]"   value="1" class="number-input input-xsmall" id="number-input_'+imgname.replace('.','_')+'"> </span> ';


         

        }

          else{
img_determin='';
          }  


			 $('#attache1_images').append('<li class="col-xs-6 col-sm-4 col-md-3" data-src="'+show_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'" data-responsive="" data-sub-html="">'+img_determin+'<br>'+
                    '<a href="">'+
                        '<img class="img-responsive" src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
						'<div class="demo-gallery-poster">'+
							'<img src="{{url("/")}}/admin/assets/global/plugins/lightGallery-master/dist/img/zoom.png">'+
                        '</div>'+
						'<span>'+title+" "+adddate+" "+number +'</span>'+
                    '</a> <br>'+

               
                '</li>');
		 }
		 

       } else {

          var val;
		var view_icon='';

 switch (v['imgext'].toUpperCase()) {
    case 'PDF': 
			var pdf_viewer=download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname'];
			pdf_viewer=pdf_viewer.replace('{{url("/")}}/','{{url("/")}}/pdf_viewer?pdf=');
			val='{!!URL::asset("/icon/PDF.png")!!}';
			view_icon='<li>'+
							'<a class="btn default btn-outline" href="'+pdf_viewer+'" target="_blank">'+
							'<i class="icon-eye"></i>'+
							'</a>'+
							'<br><span>'+title+" "+adddate+" "+number +'</span>'+
					   '</li>';
	break;
    default:
		   val='{!!URL::asset("/")!!}icon/'+v['imgext'].toUpperCase()+'.png';
		   view_icon='<li>'+
						'<a class="btn default btn-outline" href="'+download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
							'<i class="fa fa-download"></i>'+
						'</a>'+
						'<br><span>'+title+" "+adddate+" "+number +'</span>'+
					 '</li>';
			
  }


 $('#attache1_files').append(' <div class="mt-element-overlay col-sm-2 col-md-2">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                          '<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+val+'); width:150px; height:170px"></div>'+
                                                    '<div class="mt-overlay">'+
                                                       
                              							'<ul class="mt-info">'+                                                            
                                                                view_icon+                     
                                                        '</ul>'+
                                            
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>')


       }
	});


	
	$lg.data('lightGallery').destroy(true);	
	$lg.lightGallery({
		share:false
	});

//  copy_system();
  }












 

</script>
