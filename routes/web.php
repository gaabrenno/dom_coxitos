<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

//Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produtospage',[SiteController::class, 'produtospage'])->name('site.produtospage');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');

Route::get('/cart', [CartController::class, 'cartList'])->name('site.cart');
Route::post('/cart', [CartController::class, 'cartAdd'])->name('site.cartadd');
Route::post('/remove', [CartController::class, 'removeCart'])->name('site.cartremove');
Route::post('/update', [CartController::class, 'updateCart'])->name('site.cartupdate');
Route::get('/clean', [CartController::class, 'cleanCart'])->name('site.cartClean');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produtos/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produtos.delete');
Route::post('/admin/produtos/store', [ProdutoController::class, 'store'])->name('admin.produtos.store');

Route::get('/admin/categoria', [CategoryController::class, 'index'])->name('admin.categoria');
Route::delete('/admin/categoria/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categoria.delete');
Route::post('/admin/categoria/store', [CategoryController::class, 'store'])->name('admin.categoria.store');


/* Route::view('/empresa', 'site/empresa');
Route::view('/news', 'site/news');
Route::view('/welcome', 'welcome'); 
/////////Agrupando por prefixo e nome de rotas
Route::group([
    'prefix'=>'admin',
    'as'=>'admin.'
], function () {
    Route::get('dashboard', function () {
        return "dashboard";
    })->name('dashboard');
    Route::get('users', function () {
        return "users";
    })->name('users');
    Route::get('clientes', function () {
        return "clientes";
    })->name('clientes');
});

/////////Agrupando por prefixo
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    });
    Route::get('/users', function () {
        return 'Financeiro Admin';
    });
    Route::get('/clientes', function () {
        return 'Produtos Admin';
    });
});

/////////Agrupando por nomes de rotas
 Route::name('/admin')->group(function () {
    Route::get('admin/dashboard', function () {
        return 'Dashboard Admin';
    })->name('dashboard');
    Route::get('admin/dashboard', function () {
        return 'Financeiro Admin';
    })->name('users');
    Route::get('admin/clientes', function () {
        return 'Produtos Admin';
    })->name('clientes');
}); 

/////////Rotas com view 2 modos
Route::get('/empresa', function () {
    return view('site/empresa');
});
Route::view('/empresa', 'site/empresa');

/////////Rotas com metodo any
Route::any('/any', function () {
    return 'Permite todo tipo de acesso http (put, delet, get, post)';
});

 Route::match(['get', 'post'], '/match', function () {
    return 'Permite apenas acessos definidos';
});

/////////Rotas com parametros
Route::get('/produto/{idProduto}/{cat?}', function ($idProduto, $cat="Sem categoria") {
    return "Id: ".$idProduto."<br>"."Produto: ".$cat;
});

/////////Rotas com redirect
 Route::get('/sobre', function () {
    return redirect('/empresa');
}); 
Route::redirect('/sobre', '/empresa');

/////////Rotas com nome
Route::get('/news', function () {
    return view('site/news');
})->name('noticias');

Route::get('/novidades', function () {
    return redirect()->route('noticias');
}); */