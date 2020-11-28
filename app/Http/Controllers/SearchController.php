<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;


class SearchController extends Controller
{
             

                public function search_based_on_subcategory($id)
                {
                	   $Categories = Category::all();
                       $Products = Product::where('sub_category_id',$id)->get();
                       $ProductsSide = Product::inRandomOrder()->limit(3)->get();
		               return view('welcome',['Categories'=>$Categories , 'Products'=>$Products , 'ProductsSide'=>$ProductsSide]);
                }



                public function search_products_based_on_filter(Request $request)
                {
                	    $keyword = $request->search_keyword;

                        $Categories = Category::all();
                        $ProductsSide = Product::inRandomOrder()->limit(3)->get();
                        $Products = Product::where('name','LIKE','%'.$keyword.'%')
                                            ->orWhere('description','LIKE','%'.$keyword.'%')
                                            ->orWhere('price','LIKE','%'.$keyword.'%')
                                            ->get();

                        return view('welcome',['Categories'=>$Categories , 'Products'=>$Products , 'ProductsSide'=>$ProductsSide]);                    
                }



                public function search_products_based_on_filter_for_login_user(Request $request)
                {
                        $keyword = $request->search_keyword;

                        $Categories = Category::all();
                        $ProductsSide = Product::inRandomOrder()->limit(3)->get();
                        $Products = Product::where('name','LIKE','%'.$keyword.'%')
                                            ->orWhere('description','LIKE','%'.$keyword.'%')
                                            ->orWhere('price','LIKE','%'.$keyword.'%')
                                            ->get();

                        return view('app.store.all_products',['Categories'=>$Categories , 'Products'=>$Products , 'ProductsSide'=>$ProductsSide]);
                }
}
