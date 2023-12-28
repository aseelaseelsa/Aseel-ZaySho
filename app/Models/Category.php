<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;
protected $guarded=[];



//relation
public function parent(){
    return $this->belongsTo(Category::class,'parent_id','id');
}

public function childrens(){
    return $this->hasMany(Category::class,'parent_id','id')->withCount(['products']);

}

public function products(){
    return $this->hasMany(Product::class);

}

}
