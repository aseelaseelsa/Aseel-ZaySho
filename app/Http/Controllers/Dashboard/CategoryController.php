<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
// use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainCategories = Category::with(['childrens'])->withCount(['products'])->wherenull('parent_id')->get();

return view ('dashboard.categories.index',compact('mainCategories'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mainCategories = Category::where('parent_id',null)->get();
        return view ('dashboard.categories.create' , compact('mainCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
// $request->validate([
// 'name'=>['required','string','max:150','unique:categories,name'],
// 'parent_id'=>['nullable','exists:categories,id'],
// 'status'=>['required','boolean'],
// ]);


    //     Category::create([
    //    'name'=>$request->name,
    //    "parent_id"=>$request->parent_id,
    //    "status"=>$request->boolean('status'),
    //     ]);

    Category::create($request->only(['name','status','parent_id']));

        return redirect()->route('dashboard.categories.index')->with('success','Category Created Successfully');
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
        $category = Category::find($id);
        $mainCategories = Category::where('parent_id',null)->get();

return view ('dashboard.categories.update', compact('mainCategories', 'category')) ;
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        // $request->validate([
        //     'name'=>['required','string','max:150','unique:categories,name'],
        //     'parent_id'=>['nullable','exists:categories,id'],
        //     'status'=>['required','boolean'],
        //     ]);

        $category = Category::find($id);
        $category->update($request->only(['name','status','parent_id']));
        return redirect()->route('dashboard.categories.index')->with('success','Category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category->childrens->count()>0){
            return redirect()->route('dashboard.categories.index')->with('error','Can Not Deleted this Category because it has childrens');

        }

if($category->products->count()>0){
    return redirect()->route('dashboard.categories.index')->with('error','Can Not Deleted this Category because it has childrens');

}

        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success','Category Deleted Successfully');



    }
}
