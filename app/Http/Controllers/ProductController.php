<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use App\ProductImages;


use Image;
use Validator;


use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;


class ProductController extends Controller
{
   
                    public function index()
                    {
                           $Products = Product::all();
                           return view('app.admin.product.all',['Products'=>$Products]);
                    }

                    
                    public function create()
                    {
                            $Categories = Category::all();
                            return view('app.admin.product.new',['Categories'=>$Categories]);
                    }

                    
                    public function store(Request $request)
                    {


                                $request->validate([
                                    'name' => 'required',
                                    'description' => 'required',
                                    'category' => 'required',
                                    'sub_category' => 'required',
                                    'price' => 'required',
                                    'my_image' => 'required',
                                ],[
                                    'name.required' => 'Product Name is Required',
                                    'description.required' => 'Description for Product is Required',
                                    'category.required' => 'Product Category is Required',
                                    'sub_category.required' => 'Sub Category  for Product is Required',
                                    'price.required' => 'Product Price is Required',
                                    'my_image.required' => 'Product Image is Required',
                                ]); 

                                
                                $Product = new Product;
                                $Product->name = $request->name ;
                                $Product->description = $request->description ;
                                $Product->category_id = $request->category ;
                                $Product->price = $request->price ;
                                $Product->sub_category_id = $request->sub_category ;
                                $Product->save();

                                $destinationPath = 'upload/images';

                                if($request->file('my_image'))
                                {
                                        $files = $request->file('my_image');
                                        foreach($files as $file)
                                        {                                            
                                                $filename1 = $file->getClientOriginalName();
                                                $image_resize1 = Image::make($file->getRealPath());  
                                                $image_resize1->resize(200, 200);            
                                                $image_resize1->save(public_path('Images/Products/'.$filename1));
                                         
                                                $ProductImages = new ProductImages;
                                                $ProductImages->image_path = $filename1;
                                                $ProductImages->product_id = $Product->id ;
                                                $ProductImages->save();
                                        }
                                   
                                }
                            

                                return redirect()->route('Product.index')->with('success','New Product Successfully Added');
                    }

                    
                    public function show(Product $product)
                    {
                        //
                    }

                    
                    public function edit($product)
                    {
                           $Product = Product::findOrFail($product);
                           $Categories = Category::all();
                           return view('app.admin.product.edit',['Product'=>$Product , 'Categories'=>$Categories]);
                    }


                    public function update(Request $request, $Product)
                    {

                            $validator = Validator::make($request->all(), [
                                    'name' => 'required',
                                    'description' => 'required',
                                    'category' => 'required',
                                    'sub_category' => 'required',
                                    'price' => 'required',
                            ],[
                                    'name.required' => 'Product Name is Required',
                                    'description.required' => 'Description for Product is Required',
                                    'category.required' => 'Product Category is Required',
                                    'sub_category.required' => 'Sub Category  for Product is Required',
                                    'price.required' => 'Product Price is Required',
                            ]);


                            $Product = Product::findOrFail($Product);
                            $deleting_images =  session()->has('deleting_images') ? session()->get('deleting_images') : [];

                            if($request->file('my_image'))
                            {
                                  $newimages = count($request->file('my_image'));
                            }else{
                                  $newimages = 0;
                            }
                            


                            if(($Product->product_images->count() == count($deleting_images)) && ($newimages == 0))
                            {
                                   $validator->errors()->add('my_image','There must be atleast one Image for Product');
                            }

                            if(count($validator->errors()) == 0)
                            {
                                    $Product->name = $request->name ;
                                    $Product->description = $request->description ;
                                    $Product->category_id = $request->category ;
                                    $Product->price = $request->price ;
                                    $Product->sub_category_id = $request->sub_category ;
                                    $Product->save();


                                    if(count($deleting_images) > 0)
                                    {
                                           foreach($deleting_images as $key => $value) 
                                           {
                                                   $ProductImages = ProductImages::findOrFail($value);
                                                   unlink(public_path('Images/Products/'.$ProductImages->image_path));
                                                   $ProductImages->forceDelete();
                                           }
                                    }

                                    $request->session()->forget('deleting_images');


                                    if($newimages != 0)
                                    {
                                            $files = $request->file('my_image');
                                            foreach($files as $file)
                                            {                                            
                                                    $filename1 = $file->getClientOriginalName();
                                                    $image_resize1 = Image::make($file->getRealPath()); 
                                                    $image_resize1->resize(200, 200);             
                                                    $image_resize1->save(public_path('Images/Products/'.$filename1));
                                             
                                                    $ProductImages = new ProductImages;
                                                    $ProductImages->image_path = $filename1;
                                                    $ProductImages->product_id = $Product->id ;
                                                    $ProductImages->save();
                                            }
                                    }

                                    return redirect()->route('Product.index')->with('success','Product Successfully Updated');
                            }else{
                                    return back()->withErrors($validator->errors());
                            }

                    }

                    

                    public function destroy($product)
                    {
                          $Product = Product::findOrFail($product);
                          $Product->forceDelete();

                          return ['success'=>'Product Successfully Deleted'];
                    }


                    public function store_image_id_for_deletion(Request $request,$id)
                    {
                          
                          $deleting_images =  session()->has('deleting_images') ? session()->get('deleting_images') : [];
                          if(array_key_exists($id, $deleting_images))
                          {
                                 
                          }else{
                               $deleting_images[$id]= $id;
                          }
                          $request->session()->put(['deleting_images'=>$deleting_images]);
                          return "Product Image id Successfully Stored";
                    }
}
