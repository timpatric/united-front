<?php

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');


Auth::routes();

Route::post('/dashboard', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController');

Route::resource('district-management', 'DistrictManagementController');
Route::post('district-management/search', 'DistrictManagementController@search')->name('district-management.search');

Route::resource('member-management', 'MemberManagementController');
Route::post('member-management/search', 'MemberManagementController@search')->name('member-management.search');
  Route::get('delete/{id}','MemberManagementController@destroy');



Route::resource('treasury-management', 'TreasuryManagementController');
Route::post('treasury-management/search', 'TreasuryManagementController@search')->name('treasury-management.search');

Route::get('agent-management','AgentManagementController@index');
Route::resource('agent-management', 'AgentManagementController');
Route::post('agent-management/search', 'AgentManagementController@search')->name('agent-management.search');
Route::get('edit/{id}','AgentManagementController@edit'); 
Route::get('destroy/{id}','AgentManagementController@destroy');


Route::get('member-management','MemberManagementController@index');
Route::resource('member-management', 'MemberManagementController');
Route::post('member-management/search', 'MemberManagementController@search')->name('member-management.search');
Route::get('delete/{id}','MemberManagementController@destroy');

Route::get('salary-management','SalaryController@index');
Route::resource('salary-management', 'SalaryController');
Route::post('salary-management/search', 'SalaryController@search')->name('salary-management.search');

Route::get('Charts', 'ChartController@index');


Route::get('my-chart', 'ChartController@index');