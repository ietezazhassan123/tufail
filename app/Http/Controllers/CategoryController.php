<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
                public function index()
                {
                        $Categories = Category::all();
                        return view('app.admin.category.all',['Categories'=>$Categories]);
                }

                
                public function create()
                {
                       return view('app.admin.category.new');
                }

                public function store(Request $request)
                {
                            $request->validate([
                                'name' => 'required',
                                'description' => 'required',
                            ],[
                                'name.required' => 'Category Name is Required',
                                'description.required' => 'Category Description is Required',
                            ]);



                            $Category = new Category;
                            $Category->name = $request->name;
                            $Category->description = $request->description;
                            $Category->save();


                            return ['success'=>'New Category Successfully Added'];
                }




                public function category_related_subcategory($id)
                {
                        return Category::findOrFail($id)->sub_category;
                }



                
                public function show(Category $category)
                {
                    //
                }

                
                public function edit($category)
                {
                         $Category = Category::findOrFail($category);
                         return view('app.admin.category.edit',['Category'=>$Category]);
                }

                
                public function update(Request $request, $category)
                {
                        $request->validate([
                            'name' => 'required',
                            'description' => 'required',
                        ],[
                            'name.required' => 'Category Name is Required',
                            'description.required' => 'Category Description is Required',
                        ]);



                        $Category = Category::findOrFail($category);
                        $Category->name = $request->name;
                        $Category->description = $request->description;
                        $Category->save();


                        return ['success'=>'Category Successfully Updated'];
                }

                public function destroy($category)
                {
                         $Category = Category::findOrFail($category);
                         $Category->forceDelete();

                         return ['success'=>'Category Successfully deleted'];
                }
}
