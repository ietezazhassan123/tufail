<?php

namespace App\Http\Controllers;



use App\Category;
use App\SubCategory;


use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
                public function index()
                {
                       $SubCategories = SubCategory::all();
                       return view('app.admin.subcategory.all',['SubCategories'=>$SubCategories]);
                }

                
                public function create()
                {
                       $Categories = Category::all();
                       return view('app.admin.subcategory.new',['Categories'=>$Categories]);
                }


                public function store(Request $request)
                {
                           $request->validate([
                                'name' => 'required',
                                'description' => 'required',
                                'sub_category' => 'required',
                            ],[
                                'name.required' => 'Sub Category Name is Required', 
                                'sub_category.required' => 'Parent Category for this Sub Category is Required',
                                'description.required' => 'Description for Sub Category is Required', 
                            ]);

                            $SubCategory = new SubCategory;
                            $SubCategory->name = $request->name;
                            $SubCategory->description = $request->description;
                            $SubCategory->category_id = $request->sub_category;
                            $SubCategory->save();


                            return ['success'=>'New Sub Category Successfully Created'];
                }

                
                public function show(SubCategory $subCategory)
                {
                    //
                }

                
                public function edit($subCategory)
                {
                            $SubCategory = SubCategory::findOrFail($subCategory);
                            $Categories = Category::all();
                            return view('app.admin.subcategory.edit',['SubCategory'=>$SubCategory , 'Categories'=>$Categories]);
                }

                public function update(Request $request, $subCategory)
                {
                            $request->validate([
                                'name' => 'required',
                                'description' => 'required',
                                'sub_category' => 'required',
                            ],[
                                'name.required' => 'Sub Category Name is Required', 
                                'sub_category.required' => 'Parent Category for this Sub Category is Required',
                                'description.required' => 'Description for Sub Category is Required', 
                            ]);


                            $SubCategory =  SubCategory::findOrFail($subCategory);
                            $SubCategory->name = $request->name;
                            $SubCategory->description = $request->description;
                            $SubCategory->category_id = $request->sub_category;
                            $SubCategory->save();

                            return ['success'=>'Sub Category Successfully Updated'];
                }

               
                public function destroy($subCategory)
                {
                        $SubCategory = SubCategory::findOrFail($subCategory);
                        $SubCategory->forceDelete();

                        return ['success'=>'SubCategory Successfully deleted'];
                }
}
