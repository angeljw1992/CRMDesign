<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::redirect('/', url("login"))->middleware([App\Http\Middleware\IsNotLogged::class]);

Route::get('/home', function () {

    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
})->middleware([App\Http\Middleware\IsLogged::class])->name("home");


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => [App\Http\Middleware\IsLogged::class]], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Clientes
    Route::delete('clientes/destroy', 'ClientesController@massDestroy')->name('clientes.massDestroy');
    Route::post('clientes/parse-csv-import', 'ClientesController@parseCsvImport')->name('clientes.parseCsvImport');
    Route::post('clientes/process-csv-import', 'ClientesController@processCsvImport')->name('clientes.processCsvImport');
    Route::resource('clientes', 'ClientesController');

    // Pagos
    Route::delete('pagos/destroy', 'PagosController@massDestroy')->name('pagos.massDestroy');
    Route::post('pagos/media', 'PagosController@storeMedia')->name('pagos.storeMedia');
    Route::post('pagos/ckmedia', 'PagosController@storeCKEditorImages')->name('pagos.storeCKEditorImages');
    Route::resource('pagos', 'PagosController');

    // Asistencia
    Route::delete('asistencia/destroy', 'AsistenciaController@massDestroy')->name('asistencia.massDestroy');
    Route::resource('asistencia', 'AsistenciaController');

    // Clases
    Route::delete('clases/destroy', 'ClasesController@massDestroy')->name('clases.massDestroy');
    Route::resource('clases', 'ClasesController');

    // Horario
    Route::delete('horarios/destroy', 'HorarioController@massDestroy')->name('horarios.massDestroy');
    Route::resource('horarios', 'HorarioController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => [App\Http\Middleware\IsLogged::class]], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
