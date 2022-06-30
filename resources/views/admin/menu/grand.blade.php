   <div   >
   <div class="portlet box green">
   <div class="portlet-title">
   <div class="caption">
    <i class=""></i>{{$main_title}}</div>
    </div></div>

            <div class="form-group">
           
            <div class="input-group">
                <div class="icheck-list">
            

            <?php //dd($datas) ; ?>
             @foreach ($datas as $data)


             <div>
               <a style="display: inline-block;" onclick="user_have_subpermission_data(<?php echo $id ?>,<?php echo $data->id;?>)" class="btn btn-xs green"><i class="fa fa-users"></i></a>

               
               <label style="display: inline-block;">

              
               
               <input type="checkbox"  name="{{$mkey}}[]" class="icheck " 

                <?php
           // $prog_num_selected=$data->id;

                 if( isset($list) ){  
                 if (is_array($list)) {


                // dd( $list);
                 if (in_array($data->id, $list)) {
                   echo "checked";
                        }
               
                  ?>  <?php } } ?>
                 value="{{$data->id}}" data-checkbox="icheckbox_square-grey"> 
                {{$data->title}} 


               

               </label>
  
            </div>
              @endforeach          
                    
                </div>
            </div>
        </div>
               


          </div>