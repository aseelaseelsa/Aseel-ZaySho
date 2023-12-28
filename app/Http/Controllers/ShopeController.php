<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Http\Request;

class ShopeController extends Controller
{

    public function index (){

    return view('Zay.index');
}

     public function about (){
     return view('Zay.about');
                    }

     public function contact (){
    return view('Zay.contact');
                }

    public function shop (Request $requset){
        $queryParams= $requset->query();
        $mainCategories=Category::with(['childrens'])->whereNull('parent_id')->where('status',true)->get();
        $products = Product::where('status',true)->get();
         $productsQuery=Product::query();


//proudct fillteration
if(isset($queryParams['category'])){
    $productsQuery->where('category_id',$queryParams['category']);
}
$products = $productsQuery->where('status',true)->paginate(6);
        return view('Zay.shop' , compact("mainCategories" , 'products' , 'products'));
                       }





                       public function shopSingle (){

    return view('Zay.shopSingle');
    }








            public function create (){

            }

            public function store (Request $requset){


        }

            public function show ($id){
            }

             public function edit ($id){

            }

            public function update ($id){

            }
            public function destroy ($id){

            }







}
