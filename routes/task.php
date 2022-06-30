<?php
Route::get('/task/tasks_view','Tasks\TaskController@task_view');
Route::post('/task/add_task_project_data','Tasks\TaskController@add_task_project_data');

?>