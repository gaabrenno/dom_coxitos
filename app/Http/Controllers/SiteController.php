<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Category;

class SiteController extends Controller
{
    public function index(){
        $produtos = Produto::paginate(10);
        return view('site.home', compact('produtos'));
    }
    public function details($slug){
        $produto = Produto::where('slug', $slug)->first();
        return view('site.details', compact('produto'));
    }
    public function category($id){
        $category = Category::find($id);
        $produtos = Produto::where('category_id', $id)->paginate(5);
        return view('site.category', compact('produtos', 'category'));
    }
}
