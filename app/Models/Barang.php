<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'barang_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'barang_id');
    }

    public function getRouteKeyName()
    {
        return 'slug'; // Pastikan 'slug' adalah kolom di tabel 'barangs'
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search']??false, function($query, $search){
            return $query->where('nama','like','%' . $search . '%')
                -> orWhere('body','like','%' . $search . '%');
        });

        $query->when($filters['search']?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('id', $category);
            });
        });


    }


}
