<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

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

//Route de base
Route::get('/', function () {
    return view('welcome');
});

//Routing simple
Route::get('/page1', function () {
    echo "<h1>my first page</h1>";
});

//Routing paramétrés
Route::get('/message/{foulen}/{CIN}', function ($foulen,$CIN) {
    echo "<h1>Welcom $foulen CIN $CIN</h1>";
});

//Routing paramétrés optionnel
Route::get('/message/{foulen?}/{CIN?}', function ($foulen = null ,$CIN = null) { //valeur par defaut pour eviter erreur
    if($foulen == null )
    {
        $foulen = "'vide'";
    }

    if($CIN == null )
    {
        $CIN = "'vide'";
    }
    echo "<h1>Welcom $foulen CIN $CIN</h1>";
});

//Contraintes sur les lettres
Route::get('/message1/{foulen}/{CIN}/{Identifiant}', function ($foulen, $CIN,$Identifiant) {
    echo "<h1>Welcome : $foulen | CIN : $CIN | Identifiant : $Identifiant</h1>";
})->where('CIN', '[0-9]{8}')->where('foulen', '[A-Za-z]+')->where('Identifiant', '[A-Za-z0-9]{10}');
/*)->where('CIN', '\w{9}');*/  //word
/*->where('CIN', '\d{9}');*/        //decimal
/*->where('username', '[A-Za-z]+');*/


//Route de base
Route::get('/homeController/view',[HomeController::class,'afficher_une_page']);

Route::get('/homeController/data',[HomeController::class,'envoyer_des_données']);

Route::get('/homeController/{message}', [HomeController::class,'show']);
