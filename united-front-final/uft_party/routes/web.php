<?php


//Routing for Dashboard
// Route::get('/', function () {
//     return view('dashboard');
// })


Auth::routes();

Route::get('/', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController');

//Routing for districts
Route::resource('district-management', 'DistrictManagementController');
Route::get('edit/{district_id}','DistrictManagementController@edit'); 
Route::get('destroy/{district_id}','DistrictManagementController@destroy');
Route::post('district-management/search', 'DistrictManagementController@search')->name('district-management.search');


//Routing for members
Route::resource('member-management', 'MemberManagementController');
Route::post('member-management/search', 'MemberManagementController@search')->name('member-management.search');
  Route::get('delete/{member_id}','MemberManagementController@destroy');


//Routing for treasury
Route::resource('treasury-management', 'TreasuryManagementController');
Route::post('treasury-management/search', 'TreasuryManagementController@search')->name('treasury-management.search');


//Routing for agents
Route::get('agent-management','AgentManagementController@index');
Route::resource('agent-management', 'AgentManagementController');
Route::get('edit/{id}','AgentManagementController@edit'); 
Route::get('destroy/{id}','AgentManagementController@destroy');


//Routing for salary
Route::get('salary-management','SalaryController@index');
Route::resource('salary-management', 'SalaryController');
Route::post('salary-management/search', 'SalaryController@search')->name('salary-management.search');


//Routing for charts
Route::get('graphs', 'ChartController@index');


//Routing for heirachy
Route::get('hierachy','HierachyController@index');


Route::get('import',  'uploadController@import');
Route::post('import', 'uploadController@parseImport');