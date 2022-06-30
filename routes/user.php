<?php 
Route::get('/', function () {
      
    	   

 
 return view('index');
    
})->middleware('user:index');



Route::get('/download','RegistartionController@download');
Route::get('/register','RegistartionController@register')->middleware('user:user.user_add');
Route::post('/register','RegistartionController@postRegister')->middleware('user:user.user_add');
Route::get('/user_list','RegistartionController@users_list')->middleware('user:user.user_list');
Route::get('/user_remove_list','RegistartionController@users_remove_list')->middleware('user:user.user_list');
Route::get('/user/user_list/changestatus/{id}/{status}','RegistartionController@changestatus')->middleware('user:user.user_add');

Route::get('/users_list_data','RegistartionController@users_list_data')->middleware('user:user.user_list');
Route::get('/users_remove_list_data','RegistartionController@users_remove_list_data')->middleware('user:user.user_list');


Route::get('/user_view/{id}','RegistartionController@user_view')->middleware('user:user.user_view');
Route::get('/print_permission/{id}','RegistartionController@print_permission');//->middleware('user:user.user_view');
Route::put('/user_update/{id}' ,'RegistartionController@user_update')->middleware('user:user.user_update');
Route::put('/update_permission/{id}','RegistartionController@update_permission')->middleware('user:user.update_permission');
Route::put('/update_role/{id}','RegistartionController@update_role')->middleware('user:user.update_role');


Route::get('/update_password','RegistartionController@update_password')->middleware('user:index,change_pass');
Route::post('/update_password','RegistartionController@updatePassword')->middleware('user:index,change_pass');

/************************/

Route::get('/update_mobile','RegistartionController@update_mobile')->middleware('user:index,change_mob');
Route::post('/updateMobile','RegistartionController@updateMobile')->middleware('user:index,change_mob');

/*************************/

Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postLogin');
Route::get('/logout','LoginController@logout');
Route::get('/user/tracking_user_login','RegistartionController@tracking_user_login')->middleware('user:index');
Route::get('/user/tracking_user_vw','RegistartionController@tracking_user_vw')->middleware('user:index');

// for chating
Route::get('/user/migrate_data','RegistartionController@migrate_data')->middleware('user:index');
// مين يملك الصلاحيت
Route::get('/user/user_has_permission/{slug}','RegistartionController@user_has_permission')->middleware('user:user.user_list');
// إزالة الصلاحية
Route::get('/user/remove_permission/{user_id}/{slug}','RegistartionController@remove_permission')->middleware('user:user.user_list');



/*********fav********/
Route::get('/user/my_fav', function () {
	return  view('admin.auth.user_fav');




})->middleware('user:index');


Route::post('/user/user_add_fav','RegistartionController@add_fav')->middleware('user:index');


Route::get('/user/user_image/{id}','RegistartionController@user_image')->middleware('user:user.user_list');


Route::get('/user/user_name/{username}/{id}','RegistartionController@user_name')->middleware('user:user.user_list');

Route::get('/user/forget_password_vw','RegistartionController@forget_password_vw');//->middleware('user:user.user_list');
Route::post('/user/forget_password','RegistartionController@forget_password');//->middleware('user:user.user_list');


Route::get('/user/reset_password_vw','RegistartionController@reset_password_vw');//->middleware('user:user.user_list');
Route::post('/user/reset_password','RegistartionController@reset_password');//->middleware('user:user.user_list');


Route::get('/user/user_img/{id_num}','LoginController@user_img');//->middleware('user:user.user_list');




?>