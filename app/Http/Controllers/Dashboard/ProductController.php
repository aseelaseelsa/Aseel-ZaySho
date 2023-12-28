<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Products\CreateRequest;
use App\Http\Requests\Products\UpdateProductRequest ;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with(['category'])->get();
        return view ('dashboard.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::whereNotNull('parent_id')->where('status',true)->get();
        return view('dashboard.products.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        $data=$request->except(['_token','image']);
        $path = $request->file('image')->store('products' , ['disk'=>'public']);
        $data['image'] = $path;

         Product::create($data);
        return redirect()->route('dashboard.products.index')->with('success','Product Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');

        }
        $categories=Category::whereNotNull('parent_id')->where('status',true)->get();
        return view('dashboard.products.edit',compact('product','categories'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest  $request, string $id)
    {
        $product=Product::find($id);
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');

        }
        $data = $request->except(['_toaken','image']);
        $old_image = $product->image;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('products');
            $data['image'] = $path;
        }
        $product->update($data);
        if($request->hasFile('image') && $old_image){
            Storage::delete($old_image);
        }

        return redirect()->route('dashboard.products.index')->with('success','Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::find($id);
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');

        }
        $product->delete();
Storage::delete($product->image);
return redirect()->back()->with('success','Product Deleted Successfully');

    }
}
