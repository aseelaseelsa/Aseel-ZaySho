<?php

namespace App\Http\Controllers;

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

    public function shop (){
    return view('Zay.shop');

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
