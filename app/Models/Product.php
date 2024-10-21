<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name', 'description', 'purchase_price', 'sale_price', 'category', 'stock_quantity', 'image_path'  ];

    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function sales(){
        return $this->belongsToMany(Sale::class)->withPivot('quantity', 'total');
    }
   
}
