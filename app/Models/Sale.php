<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'customer_id',
        'total',
        'discount',
    ];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'sale_product')->withPivot('quantity', 'total')->withTimestamps();;
    }
    
}
