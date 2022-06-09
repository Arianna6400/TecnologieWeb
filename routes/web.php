<?php
use Illuminate\Support\Facades\Auth;
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

//Rotte pubbliche

Route::get('/', 'PublicController@showCatalog')->name('home');

Route::get('/who', function () {
    return view('who');
})->name('who');

Route::get('/where', function () {
    return view('where');
})->name('where');

Route::get('/cosaOffriamo', function () {
    return view('cosaOffriamo');
})->name('cosaOffriamo');

Route::get('/FAQ', 'PublicController@showFaq')->name('FAQ');

Route::get('/offerta/{id}', 'PublicController@showOfferta')->name('offerta');

Route::get('/filtra', 'PublicController@showByCityandCheckBox')
->name('home_filtrata');

Route::post('/modificaprofilo','PublicController@modprofilo')->name('modprofilo');

//Rotte autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');


Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

//Rotte registrazione

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register')->name('confermaregistrazione');

//Rotte utente locatore
Route::post('/modificaalloggio','LocatoreController@modalloggio')->name('modifyalloggio');

Route::get('/locatore', 'LocatoreController@showCatalog')
        ->name('locatore');

Route::get('locatore/mie_offerte', 'LocatoreController@showCatalogoMieOfferte')->name('mieofferte');

Route::get('locatore/opzionate', 'LocatoreController@showAlloggiOpzionati')->name('opzionate');

Route::get('locatore/utenteinteressato/{username}', 'LocatoreController@showInteressato')->name('viewutente');

Route::get('locatore/elimina_alloggio/{id}', 'LocatoreController@deleteLocal')->name('elimina_alloggio');

Route::get('locatore/chat', 'LocatoreController@chat')->name('chatlocatore');

Route::view('locatore/insertalloggio','insert/InsertAlloggio')->name('insertalloggio');

Route::post('locatore/insertcaratteristiche', 'LocatoreController@save' )->name('insertcaratteristiche');

Route::post('locatore/addmessage', 'LocatoreController@newMessage')->name('addmessageLocatore');

Route::get('locatore/insertmessage/{IdMessaggio}/alloggio/{IdAlloggio}', 'LocatoreController@formMessaggio')->name('nuovomessaggioLocatore');

Route::get('locatore/visualizzaprofilo', 'LocatoreController@showProfile')->name('visualizzaprofilolocatore');

Route::post('submit','LocatoreController@save2')->name('submit');

//Rotte utente locatario

Route::get('/locatario', 'LocatarioController@showAllLocal')
        ->name('locatario');

Route::get('/locatario/offerta/{id}', 'LocatarioController@showOfferta')->name('offertalocatario');

Route::get('locatario/chat', 'LocatarioController@chat')->name('chatlocatario');

Route::get('locatario/catalogo/filtro/{filtro}/scelta/{scelta}', 'LocatarioController@showFilteredLocal')->name('catalogofiltrato');

Route::get('/catalogo', 'LocatarioController@showAllLocal')->name('catalogolocatario');

Route::get('locatario/catalogo', 'LocatarioController@showFilteredLocal')->name('catalogofiltrato');

Route::get('locatario/visualizzaprofilo', 'LocatarioController@showProfile')->name('visualizzaprofilolocatario');

Route::get('locatario/miaOpzione', 'LocatarioController@showMiaOpzionata')->name('opzionataLocatario');

Route::post('locatario/addmessage', 'LocatarioController@newMessage')->name('addmessage');

Route::post('locatario/haiOpzionato/{id}', 'LocatarioController@Opziona')->name('opzionato');

Route::get('locatario/insertmessage/{IdMessaggio}/alloggio/{IdAlloggio}', 'LocatarioController@formMessaggio')->name('nuovomessaggio');

//Rotte utente admin

Route::get('/admin', 'AdminController@index')->name('admin');

Route::view('admin/insertfaq','insert/insertFAQ')->name('insertfaq');

Route::post('admin/addfaq', 'AdminController@newFaq')->name('addfaq');

Route::view('admin/stats', 'stats')->name('stats');

Route::post('admin/statsfind', 'AdminController@find')->name('statsfind');

Route::view('admin/modfaq/{id}', 'edit/modfaq')->name('modfaq');

Route::post('admin/updatefaq', 'AdminController@updateFaq')->name('updatefaq');

