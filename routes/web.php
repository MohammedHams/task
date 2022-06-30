<?php


use \Carbon\Carbon ;
use \App\User;




Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');
   
    Artisan::call('view:clear');

	Artisan::call('route:clear');
	Artisan::call('config:cache');

  return redirect()->back();
    // return what you want
});



Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
  

    // return what you want
});






include ('user.php');
include ('menu.php');
include ('store.php');
include ('notification.php');          
include ('task.php');

