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
Route::any('districts/search','DistrictManagementController@search');



//Routing for members
Route::resource('member-management', 'MemberManagementController');
Route::any('members/search','MemberManagementController@search');



//Routing for treasury
Route::resource('treasury-management', 'TreasuryManagementController');


//Routing for agents
Route::resource('agent-management', 'AgentManagementController');
Route::any('agents/search','AgentManagementController@search');



//Routing for salary
Route::resource('salary-management', 'SalaryController');
Route::any('salaries/search','SalaryController@search');



//Routing for charts
Route::get('graphs', 'ChartController@index');


Route::get('import',  'uploadController@import');
Route::post('import', 'uploadController@parseImport');