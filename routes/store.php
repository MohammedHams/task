<?php
/*************************الجديد  *****************/
//عرض صفحة لعمل طلبية 
// عملية الإضافة
Route::get('/stock_store/view_new_order','store\StockStoreController@view_new_order')->middleware('user:store.add_new_order');
Route::post('/stock_store/confirm_order_data','store\StockStoreController@confirm_order_data')->middleware('user:store.add_new_order');
//البيانات الت اختار منها 
Route::get('/stock_store/order_data','store\StockStoreController@order_data')->middleware('user:store.add_new_order');
//الطلبية المعطاة
Route::get('/stock_store/given_order','store\StockStoreController@given_order')->middleware('user:store.given_order');
Route::get('/stock_store/given_order_data','store\StockStoreController@given_order_data')->middleware('user:store.given_order');
// order report


// طلبات قيد التدقيق
Route::get('/stock_store/ungiven_order/{id?}','store\StockStoreController@ungiven_order')->middleware('user:store.ungiven_order');
Route::get('/stock_store/ungiven_order_data','store\StockStoreController@ungiven_order_data')->middleware('user:store.ungiven_order');
//بيانات الطلبية غير معطاه 
Route::get('/stock_store/ungiven_order_item/{order_id}','store\StockStoreController@ungiven_order_item')->middleware('user:store.add_new_order');
// حفظ الطلبية بشكل نهائى



//<!--=================================='طلباتى كمستخدم'================!>
// الذهاب الى الطلب الذى لم يعتمد للتعديل غليه 
Route::get('/stock_store/edit_order/{order_num}','store\StockStoreController@edit_order')->middleware('user:store.my_order');

// جميع طلباتى حسب ال username
Route::get('/stock_store/my_order_list/{order_id?}','store\StockStoreController@my_order_list')->middleware('user:store.my_order');
Route::get('/stock_store/my_order_data','store\StockStoreController@my_order_data')->middleware('user:store.my_order');

// التعديل على طلبيتى التى لم تعتمد
Route::post('/stock_store/update_myorder_data','store\StockStoreController@update_myorder_data')->middleware('user:store.my_order');





Route::get('/stock_store/items/add_items_vw','store\StoreDataController@add_items_vw')->middleware('user:store.storekeeper.add_items_vw');
Route::post('/stock_store/items/add_items_data','store\StoreDataController@add_items_data')->middleware('user:store.storekeeper.add_items_vw');
Route::get('/stock_store/items/stock_item_main_vw','store\StoreDataController@stock_item_main_vw')->middleware('user:store.storekeeper.add_items_vw');
Route::get('/stock_store/items/stock_item_main_vw_report','store\StoreDataController@stock_item_main_vw_report')->middleware('user:store.storekeeper.add_items_vw');
Route::get('/stock_store/items/stock_card_vw_report/{item_id_pk}','store\StoreDataController@stock_card_vw_report')->middleware('user:store.storekeeper.add_items_vw');
Route::get('/stock_store/items/fav_item/{item_id_pk}','store\StoreDataController@fav_item')->middleware('user:store.storekeeper.add_items_vw');

Route::get('/stock_store/items/custody_item/{item_id_pk}','store\StoreDataController@custody_item')->middleware('user:store.storekeeper.add_items_vw');
Route::get('/stock_store/items/enabled_item/{item_id_pk}','store\StoreDataController@enabled_item')->middleware('user:store.storekeeper.add_items_vw');


Route::get('/stock_store/items/add_stock_invoice_out_vw','store\StoreDataController@add_stock_invoice_out_vw')->middleware('user:store.storekeeper.add_stock_invoice_out_vw');
Route::get('/stock_store/items/stock_emp_name/{side_id}','store\StoreDataController@stock_emp_name')->middleware('user:store.storekeeper.add_stock_invoice_out_vw');

Route::get('/stock_store/items/stock_invoice_vw','store\StoreDataController@stock_invoice_vw')->middleware('user:store.storekeeper.add_stock_invoice_out_vw');


Route::get('/stock_store/items/stock_item_mains','store\StoreDataController@stock_item_mains')->middleware('user:index');
Route::post('/stock_store/items/add_stock_out_item','store\StoreDataController@add_stock_out_item')->middleware('user:store.storekeeper.add_stock_invoice_out_vw');




//Route::get('/store/remove_item_session','StoreController@remove_item_session');

///stock_store/items/stock_order_vw/1    //store.storekeeper.manger_stock_order_vw
//الموافقة على الصرف

Route::get('/stock_store/items/update_order_status/{order_num}','store\StoreDataController@update_order_status')->middleware('user:store.storekeeper.update_order_status');

//  صفحة   الطلبات  
Route::get('/stock_store/items/stock_invoice_out_item_vw/{inv_id_pk}','store\StoreDataController@stock_invoice_out_item_vw')->middleware('user:index');
///stock_store/items/stock_order_vw/0
Route::get('/stock_store/items/stock_order_vw/{status_flag?}','store\StoreDataController@stock_order_vw')->middleware('user:store.storekeeper.stock_order_vw');
// طلبات للمدير
Route::get('/stock_store/items/stock_order_data/{status_flag?}','store\StoreDataController@stock_order_data')->middleware('user:store.storekeeper.stock_order_vw');

Route::get('/stock_store/items/cancel_order/{id_in}','store\StoreDataController@cancel_order')->middleware('user:store.storekeeper.cancel_order');

Route::get('/stock_store/order_report/{order_id}','store\StoreDataController@order_report')->middleware('user:store.storekeeper.stock_order_vw');
Route::get('/stock_store/invoice_report/{inv_id_pk}','store\StoreDataController@invoice_report')->middleware('user:store.storekeeper.stock_order_vw');
Route::post('/stock_store/update_order/{order_num}','store\StockStoreController@update_order')->middleware('user:store.storekeeper.update_order');

Route::get('/stock_store/ungiven_order_item_data/{order_id}','store\StockStoreController@ungiven_order_item')->middleware('user:store.storekeeper.stock_order_vw');


/************************/
// طلبيات   ادخل
Route::get('/stock_store/items/add_stock_invoice_in_vw','store\StoreDataController@add_stock_invoice_in_vw')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');
Route::post('/stock_store/items/add_stock_invoice_in_data','store\StoreDataController@add_stock_invoice_in_data')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');
Route::get('/stock_store/items/stock_invoice_in_vw','store\StoreDataController@stock_invoice_in_vw')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');


Route::get('/stock_store/items/stock_invoice_in_item_vw/{inv_id_pk}','store\StoreDataController@stock_invoice_in_item_vw')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

// حذف   العنصر  
Route::get('/stock_store/items/delete_item_invoice_in/{item_id_pk}/{inv_id_pk}','store\StoreDataController@delete_item_invoice_in')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

Route::post('/stock_store/items/add_stock_in_item','store\StoreDataController@add_stock_in_item')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');










Route::get('/stock_store/items/stock_invoice_in_vw_one_data/{inv_id_pk}','store\StoreDataController@stock_invoice_in_vw_one_data')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

Route::get('/stock_store/items/approve_stock_invoice/{inv_id_pk}/{inv_type}','store\StoreDataController@approve_stock_invoice')
->middleware('user:store.storekeeper.approve_stock_invoice');

// تدقيق لجنة 

Route::get('/stock_store/items/according_approve/{inv_id_pk}','store\StoreDataController@according_approve')
->middleware('user:store.storekeeper.according_approve');

// اعتماد مدير 

Route::get('/stock_store/items/manager_approve/{inv_id_pk}','store\StoreDataController@manager_approve')
->middleware('user:store.storekeeper.manager_flag');

//cancel

Route::get('/stock_store/items/cancel_stock_in_invoice/{inv_id_pk}','store\StoreDataController@cancel_stock_in_invoice')
->middleware('user:store.storekeeper.cancel_stock_in_invoice');

Route::get('/stock_store/items/add_to_store/{inv_id_pk}','store\StoreDataController@add_to_store')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

Route::get('/stock_store/items/add_to_store_sanad/{inv_id_pk}','store\StoreDataController@add_to_store_sanad')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

Route::get('/stock_store/items/stock_receipt_vw/{inv_id_pk}','store\StoreDataController@stock_receipt_vw')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');



Route::post('/stock_store/items/add_order_no','store\StoreDataController@add_order_no')->middleware('user:store.storekeeper.add_stock_invoice_in_vw');


// اضافة  موردين  

Route::get('/stock_store/items/add_stock_side_in_vw','store\StoreDataController@add_stock_side_in_vw')->middleware('user:store.storekeeper.add_stock_side_in_vw');

Route::post('/stock_store/items/add_stock_side_in_data','store\StoreDataController@add_stock_side_in_data')->middleware('user:store.storekeeper.add_stock_side_in_vw');


Route::get('/stock_store/items/stock_side_in_vw','store\StoreDataController@stock_side_in_vw')->middleware('user:store.storekeeper.add_stock_side_in_vw');


/*******************طلبيات   المخزن   مدخلة بواسطة أمين   المخزن****************/

Route::get('/stock_store/items/add_store_storekeeper','store\StoreDataController@add_store_storekeeper')->middleware('user:store.storekeeper.add_store_storekeeper');
Route::post('/stock_store/items/confirm_order_data','store\StockStoreController@confirm_order_data')->middleware('user:store.storekeeper.add_store_storekeeper');
Route::get('/stock_store/order_data_storekeeper','store\StockStoreController@order_data')->middleware('user:store.storekeeper.add_store_storekeeper');


/*********************************************************/
Route::get('/stock_store/items/stock_min_qnt_vw','store\StoreDataController@stock_min_qnt_vw')->middleware('user:store.storekeeper.stock_min_qnt_vw');
Route::get('/stock_store/items/stock_min_qnt_data','store\StoreDataController@stock_min_qnt_data')->middleware('user:store.storekeeper.stock_min_qnt_vw');

/********************التقارير  ******/
Route::get('/stock_store/items/all_order_approved_vw','store\StoreDataController@all_order_approved_vw')->middleware('user:store.storekeeper.all_order_approved_vw');
Route::get('/stock_store/items/all_order_approved_vw_data','store\StoreDataController@all_order_approved_vw_data')->middleware('user:store.storekeeper.all_order_approved_vw');


Route::get('/stock_store/items/departments_report','store\StoreDataController@departments_report')->middleware('user:store.storekeeper.all_order_approved_vw');

/*******************************العهد *****************/
Route::get('/stock_store/custody/add_custody_vw','store\CustodyController@add_custody_vw')->middleware('user:store.custody.add_custody_vw');
Route::post('/stock_store/custody/add_custody_data','store\CustodyController@add_custody_data')->middleware('user:store.custody.add_custody_vw');
Route::get('/stock_store/custody/custody_vw_data','store\CustodyController@custody_vw_data')->middleware('user:store.custody.add_custody_vw');
Route::post('/stock_store/custody/update_custody_delivery','store\CustodyController@update_custody_delivery')->middleware('user:store.custody.add_custody_vw');





Route::get('/stock_store/custody/add_stock_custody_vw','store\StockCustController@add_stock_custody_vw')->middleware('user:store.custody.add_custody_vw');

Route::post('/stock_store/custody/add_stock_cust','store\StockCustController@add_stock_cust')->middleware('user:store.custody.add_custody_vw');



Route::get('/stock_store/custody/cust_vw_data/{inv_id_pk?}','store\StockCustController@cust_vw_data')->middleware('user:store.custody.add_custody_vw');




Route::post('/stock_store/custody/update_stock_cust','store\StockCustController@update_stock_cust')->middleware('user:store.custody.add_custody_vw');

Route::get('/stock_store/custody/delete_stock_cust/{cust_id}','store\StockCustController@delete_stock_cust')->middleware('user:store.custody.add_custody_vw');


Route::get('/stock_store/custody/cust_for_user_data','store\StockCustController@cust_for_user_data')->middleware('user:store.custody.cust_for_user');

Route::get('/stock_store/custody/cust_for_user_vw','store\StockCustController@cust_for_user_vw')->middleware('user:store.custody.cust_for_user');


Route::get('/stock_store/custody/select_item_note/{item_id_pk}','store\StockCustController@select_item_note')->middleware('user:store.custody.cust_for_user');


/********************************************/

Route::get('/stock_store/items/display_stockin_images/{enc_id1}','store\StoreDataController@display_stockin_images')->middleware('user:store.storekeeper.stockin_viewimg');

Route::post('/stock_store/items/stockin_attachment','store\StoreDataController@stockin_attachment')->middleware('user:store.storekeeper.add_stockin_archive');


Route::get('/stock_store/items/delete_stockin_attachment/{year}/{month}/{imgname}','store\StoreDataController@delete_stockin_attachment')->middleware('user:store.storekeeper.delete_stockin_archive');


Route::get('/stock_store/items/delete_selected_attach_stockin/{imgname}','store\StoreDataController@delete_selected_attach_stockin')->middleware('user:store.storekeeper.delete_stockin_archive');


Route::get('/stock_store/items/show_thumb_stockinvw/{arch_year}/{arch_month}/{imgname}','store\StoreDataController@show_thumb_stockinvw')->middleware('user:store.storekeeper.stockin_viewimg');


Route::get('/stock_store/items/show_image/{arch_year}/{arch_month}/{imgname}','store\StoreDataController@show_image')->middleware('user:store.storekeeper.stockin_viewimg');


////////////////////////////////////////طلبيات شراء////////
Route::get('/stock_store/purchasing/stock_purchasing_vw','store\PurchaseController@stock_purchasing_vw')->middleware('user:store.purchasing.stock_purchasing_vw');


Route::post('/stock_store/purchasing/add_purchasing_data','store\PurchaseController@add_purchasing_data')->middleware('user:store.purchasing.add_purchasing_data');
Route::get('/stock_store/purchasing/stock_purchasing_vw_data','store\PurchaseController@stock_purchasing_vw_data')->middleware('user:store.purchasing.stock_purchasing_vw');


Route::post('/stock_store/purchasing/add_purchasing_item','store\PurchaseController@add_purchasing_item')->middleware('user:store.purchasing.add_purchasing_data');


Route::get('/stock_store/purchasing/stock_purchasing_item_vw/{inv_id_pk_in}','store\PurchaseController@stock_purchasing_item_vw')
->middleware('user:store.purchasing.stock_purchasing_vw');


Route::get('/stock_store/purchasing/approve_purchasing/{inv_id_pk_in}','store\PurchaseController@approve_purchasing')
->middleware('user:store.purchasing.approve_purchasing');


Route::get('/stock_store/purchasing/cancel_purchasing/{inv_id_pk_in}','store\PurchaseController@cancel_purchasing')
->middleware('user:store.purchasing.cancel_purchasing');


Route::get('/stock_store/purchasing/stock_purchasing_vw_one_data/{inv_id_pk}','store\PurchaseController@stock_purchasing_vw_one_data')->middleware('user:store.purchasing.add_purchasing_data');
Route::get('/stock_store/purchasing/stock_purchasing_item_data/{pur_id}','store\PurchaseController@stock_purchasing_item_data')->middleware('user:store.purchasing.add_purchasing_data');
Route::get('/stock_store/purchasing/purchasing_report/{inv_id_pk}','store\PurchaseController@purchasing_report')->middleware('user:store.purchasing.stock_purchasing_vw');




Route::get('/stock_store/purchasing/display_stockin_images/{enc_id1}','store\StoreDataController@display_stockin_images')
->middleware('user:store.purchasing.display_stockin_images');

Route::post('/stock_store/purchasing/stockin_attachment','store\StoreDataController@stockin_attachment')
->middleware('user:store.purchasing.stockin_attachment');


Route::get('/stock_store/purchasing/delete_stockin_attachment/{year}/{month}/{imgname}','store\StoreDataController@delete_stockin_attachment')
->middleware('user:store.purchasing.delete_stockin_archive');


Route::get('/stock_store/purchasing/delete_selected_attach_stockin/{imgname}','store\StoreDataController@delete_selected_attach_stockin')
->middleware('user:store.purchasing.display_stockin_images');


Route::get('/stock_store/purchasing/show_thumb_stockinvw/{arch_year}/{arch_month}/{imgname}','store\StoreDataController@show_thumb_stockinvw')
->middleware('user:store.purchasing.display_stockin_images');


Route::get('/stock_store/purchasing/show_image/{arch_year}/{arch_month}/{imgname}','store\StoreDataController@show_image')
->middleware('user:store.purchasing.display_stockin_images');

//

/*********************************اللجان******************* */
Route::get('/stock_store/committees/pla_committees_vw','store\CommitteesController@pla_committees_vw')->middleware('user:store.committees.pla_committees_vw');
Route::get('/stock_store/committees/pla_committees_vw_data','store\CommitteesController@pla_committees_vw_data')->middleware('user:store.committees.pla_committees_vw');
Route::get('/stock_store/committees/pla_committees_vw_data_one_data/{commit_id}','store\CommitteesController@pla_committees_vw_data_one_data')
->middleware('user:store.committees.pla_committees_vw');

// اضافة 
Route::post('/stock_store/committees/add_pla_committees','store\CommitteesController@add_pla_committees')->middleware('user:store.committees.add_pla_committees');
// اضافة أعضاء اللجنه
Route::post('/stock_store/committees/add_pla_committees_members','store\CommitteesController@add_pla_committees_members')
->middleware('user:store.committees.add_pla_committees_members');

// عرض عضو من اللجنه
Route::get('/stock_store/committees/pla_committees_members_vw_one_date/{com_id}','store\CommitteesController@pla_committees_members_vw_one_date')
->middleware('user:store.committees.pla_committees_vw');

// عرض كل الاعضاء
Route::get('/stock_store/committees/pla_committees_members_vw/{commit_id}','store\CommitteesController@pla_committees_members_vw')
->middleware('user:store.committees.pla_committees_vw');


/************************ */
// عرض اللجان على الموظفين للتوقيع
Route::get('/stock_store/committees/invoice_in_signature_vw','store\CommitteesController@invoice_in_signature_vw')
->middleware('user:store.committees.invoice_in_signature_vw');

Route::get('/stock_store/committees/invoice_in_signature_vw_data','store\CommitteesController@invoice_in_signature_vw_data')
->middleware('user:store.committees.invoice_in_signature_vw');

Route::get('/stock_store/committees/add_member_sign/{sign_id}/{sign_flag}','store\CommitteesController@add_member_sign')
->middleware('user:store.committees.invoice_in_signature_vw');


Route::get('/stock_store/committees/stock_invoice_in_item_vw/{inv_id_pk}','store\StoreDataController@stock_invoice_in_item_vw')
->middleware('user:store.committees.invoice_in_signature_vw');

// سعر صرف العملة 

Route::get('/stock_store/items/pla_usd_cur','store\StoreDataController@pla_usd_cur')
->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

Route::get('/stock_store/items/pla_jd_cur','store\StoreDataController@pla_jd_cur')
->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

/*************************** */
// طلبية الجرد

Route::get('/stock_store/items/stock_beginning_item_vw','store\StoreDataController@stock_beginning_item_vw')
->middleware('user:store.storekeeper.stop_beginning_item_vw');
Route::get('/stock_store/items/stock_beginning_item_vw_data','store\StoreDataController@stock_beginning_item_vw_data')
->middleware('user:store.storekeeper.stop_beginning_item_vw');

// عرض أصناف طلبية الجرد

Route::get('/stock_store/stock_beginning_item_vw_for_one_req/{inv_id_pk}','store\StoreDataController@stock_beginning_item_vw_for_one_req')
->middleware('user:store.storekeeper.add_stock_invoice_in_vw');
// تعديل عناصر طلبية الجرد
Route::post('/stock_store/add_begining_inv_item','store\StoreDataController@add_begining_inv_item')
->middleware('user:store.storekeeper.add_stock_invoice_in_vw');
// عرض البيانات للتعديل 
Route::get('/stock_store/stock_beginning_item_vw_only_one_data/{beg_id}','store\StoreDataController@stock_beginning_item_vw_only_one_data')
->middleware('user:store.storekeeper.add_stock_invoice_in_vw');

?>