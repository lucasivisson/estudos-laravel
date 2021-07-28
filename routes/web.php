<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Painel\ProdutoController;

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

/*
Route::group(['prefix' => 'ihuuuuu', 'middleware' => 'auth'], function() {
    Route::get('/usuarios', function() {
        return 'Controle de Users';
    });
    Route::get('/financeiro', function() {
        return 'Painel Financeiro';
    });
    Route::get('/dashboard', function() {
        return 'Dashboard';
    });
});

Route::get('/login', function() {
    return "login";
})->name('login');

Route::get('/categoria2/{idCat?}', function($idCat=null) {
    return "Posts da categoria {$idCat}";
});

Route::get('/categoria1/{idCat}/nome-fixo/{prm2}', function($idCat, $prm2) {
    return "Posts da categoria {$idCat} - ${prm2}";
});

Route::any('/nome/nome2/nome3', function() {
    return 'rota any';
})->name('rota.menor');

Route::match(['get', 'post'], '/match', function() {
    return 'Route match';
});

Route::post('/post', function() {
    return 'Route Post';
});

Route::get('/contato', function() {
    return 'Contato';
});

Route::get('/empresa', function() {
    return view('empresa');
});
*/

Route::get('/painel/produtos/tests', [ProdutoController::class, 'tests']);
Route::get('/painel/produtos', [ProdutoController::class, 'index'])->name('listaProdutos');
Route::get('/painel/produtos/create', [ProdutoController::class, 'create'])->name('criacaoDeProdutos');
Route::post('/painel/produtos/', [ProdutoController::class, 'store'])->name('envioFormProdutos');
Route::get('/painel/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('editaProdutos');
Route::put('/painel/produtos/{id}', [ProdutoController::class, 'update'])->name('atualizaProdutos');
Route::get('/painel/produtos/{id}', [ProdutoController::class, 'show'])->name('listaProduto');
Route::delete('/painel/produtos/{id}', [ProdutoController::class, 'destroy'])->name('deletaProduto');

Route::group([], function() {
    Route::get('/categoriaop/{id?}', [SiteController::class, 'categoriaop']);
    Route::get('/categoria/{id}', [SiteController::class, 'categoria']);
    Route::get('/', [SiteController::class, 'index']);
    Route::get('/contato', [SiteController::class, 'contato']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
