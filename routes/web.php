<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////  19-6-2020   sklonio
/*
Route::get('/', function () {
  return view('pages.welcome');
})->name('welcome');
*/
////////  19-6-2020   dodao
Route::get('/', 'HomeController@welcome')->name('welcome');
////////  19-6-2020   dodao

Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');


Auth::routes();

//Route::get('home', 'HomeController@index')->name('home');

//Route::get('test_pdf', 'InvoiceController@show');

//Route::get('kalkulacija_pdf', 'Kalk_PDFController@show');


Route::get('pocetna', 'HomeController@index')->name('home');
Route::get('pricing', 'ExamplePagesController@pricing')->name('page.pricing');
Route::get('lock', 'ExamplePagesController@lock')->name('page.lock');
Route::get('error', ['as' => 'page.error', 'uses' => 'ExamplePagesController@error']);

// uplad slike dijala turbine
Route::post('turbinadio/slika', 'TurbinadioController@upload');
//Route::post('formSubmit','ImageController@formSubmit');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'TagController', ['except' => ['show']]);
    Route::resource('mtag', 'MtagController', ['except' => ['show']]);
    Route::resource('item', 'ItemController', ['except' => ['show']]);
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::resource('masina', 'MasinaController', ['except' => ['show']]);
    Route::resource('masinvrsta', 'MasinvrstaController', ['except' => ['show']]);
    Route::resource('masinlokacija', 'MasinlokacijaController', ['except' => ['show']]);
    Route::resource('radnik', 'RadnikController', ['except' => ['show']]);
    
    Route::resource('alat', 'AlatController', ['except' => ['show']]);
    Route::resource('alatnaziv', 'AlatnazivController', ['except' => ['show']]);
    Route::resource('proizvodjac', 'ProizvodjacController', ['except' => ['show']]);

    Route::resource('turbina', 'TurbinaController', ['except' => ['show']]);
    Route::resource('turbinadio', 'TurbinadioController', ['except' => ['show']]);

    Route::resource('predracun', 'PredracunController', ['except' => ['show']]);

    Route::resource('materijal', 'MaterijalController', ['except' => ['show']]);
    Route::resource('mattipoznaka', 'MattipoznakaController', ['except' => ['show']]);
    Route::resource('mattipvrsta', 'MattipvrstaController', ['except' => ['show']]);
    Route::resource('mattip', 'MattipController', ['except' => ['show']]);

    Route::resource('parametar', 'ParametarController', ['except' => ['show']]);

    Route::resource('rnalog', 'RnalogController', ['except' => ['show']]);
    Route::resource('kupac', 'KupacController', ['except' => ['show']]);
    Route::resource('planproizvodnje', 'PlanproizvodnjeController', ['except' => ['show']]);
    Route::resource('proizvod', 'ProizvodController', ['except' => ['show']]);
    Route::resource('proizvrstamodel', 'ProizvrstamodelController', ['except' => ['show']]);
    Route::resource('element', 'ElementController', ['except' => ['show']]);


    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

 

    Route::get('rtl-support', ['as' => 'page.rtl-support', 'uses' => 'ExamplePagesController@rtlSupport']);
    Route::get('timeline', ['as' => 'page.timeline', 'uses' => 'ExamplePagesController@timeline']);
    Route::get('widgets', ['as' => 'page.widgets', 'uses' => 'ExamplePagesController@widgets']);
    Route::get('charts', ['as' => 'page.charts', 'uses' => 'ExamplePagesController@charts']);
    Route::get('calendar', ['as' => 'page.calendar', 'uses' => 'ExamplePagesController@calendar']);

    Route::get('buttons', ['as' => 'page.buttons', 'uses' => 'ComponentPagesController@buttons']);
    Route::get('grid-system', ['as' => 'page.grid', 'uses' => 'ComponentPagesController@grid']);
    Route::get('panels', ['as' => 'page.panels', 'uses' => 'ComponentPagesController@panels']);
    Route::get('sweet-alert', ['as' => 'page.sweet-alert', 'uses' => 'ComponentPagesController@sweetAlert']);
    Route::get('notifications', ['as' => 'page.notifications', 'uses' => 'ComponentPagesController@notifications']);
    Route::get('icons', ['as' => 'page.icons', 'uses' => 'ComponentPagesController@icons']);
    Route::get('typography', ['as' => 'page.typography', 'uses' => 'ComponentPagesController@typography']);
    
    Route::get('regular-tables', ['as' => 'page.regular_tables', 'uses' => 'TablePagesController@regularTables']);
    Route::get('extended-tables', ['as' => 'page.extended_tables', 'uses' => 'TablePagesController@extendedTables']);
    Route::get('datatable-tables', ['as' => 'page.datatable_tables', 'uses' => 'TablePagesController@datatableTables']);

    Route::get('regular-form', ['as' => 'page.regular_forms', 'uses' => 'FormPagesController@regularForms']);
    Route::get('extended-form', ['as' => 'page.extended_forms', 'uses' => 'FormPagesController@extendedForms']);
    Route::get('validation-form', ['as' => 'page.validation_forms', 'uses' => 'FormPagesController@validationForms']);
    Route::get('wizard-form', ['as' => 'page.wizard_forms', 'uses' => 'FormPagesController@wizardForms']);

    Route::get('google-maps', ['as' => 'page.google_maps', 'uses' => 'MapPagesController@googleMaps']);
    Route::get('fullscreen-maps', ['as' => 'page.fullscreen_maps', 'uses' => 'MapPagesController@fullscreenMaps']);
    Route::get('vector-maps', ['as' => 'page.vector_maps', 'uses' => 'MapPagesController@vectorMaps']);
  });


