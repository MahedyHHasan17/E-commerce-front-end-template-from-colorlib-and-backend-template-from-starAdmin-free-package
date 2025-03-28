<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class , 'category_id') ; 
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class , 'sub_category_id') ; 
    }

    public function brand(){
        return $this->belongsTo(BrandName::class , 'brand_id') ; 
    }


}
