<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = ['item_category', 'item_subcategory', 'item_brand', 'item_size', 'item_name', 'item_description', 'item_color', 'item_condition', 'item_price', 'item_photos',];

    protected $dates = [ 'created_at'=>'datetime'];
}
