<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| This file is where you may define all of the routes that are handled
	| by your application. Just tell Laravel the URIs it should respond
	| to using a Closure or controller method. Build something great!
	|
	*/

	Auth::routes();
	/*
	 * Приложение пропускает только аутентифицированных пользователей
	 */
	Route::group(['middleware' => ['auth']], function () {
		/*
		 * Определение пользователя с ролью "Админ"
		 */
		Route::group([
				'middleware' => ['admin']
		], function () {
			/*
			 * Доступные маршруты для админа
			 */
			Route::get('/admin', 'Dashboard\MainController@index');
			Route::get('/admin/users', 'Dashboard\MainController@showUsers');
			Route::get('/admin/statistic', 'Dashboard\MainController@showStatistic');
			Route::resource('/admin/resource', 'Dashboard\IndexController',
					['only' => ['store', 'edit', 'update', 'destroy']]);
		});
		/*
		 * Определение пользователя с ролью "Юзер"
		 */
		Route::group([
				'middleware' => ['user']
		], function () {
			/*
			 * Дотупные маршруты для юзеров
			 */
			Route::get('/', 'Core\IndexController@index');
			Route::post('/startWork', 'Core\IndexController@startWork');
			Route::post('/endWork', 'Core\IndexController@endWork');
			Route::post('/rest', 'Core\IndexController@rest');
		});

	});




