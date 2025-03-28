<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class, 'channel_contact');
    }


    
    // public function scopeContactSearch($query, $category_id)
    // {
    //     if (!empty($category_id)) {
    //     $query->where('category_id', $category_id);
    //     }
    // }

    // public function scopeKeywordSearch($query, $keyword)
    // {
    //     if (!empty($keyword)) {
    //     $query->where('first_name', 'like', '%' . $keyword . '%')
    //     ->orWhere('last_name', 'like', '%' . $keyword . '%')
    //     ->orWhere('gender', $keyword)
    //     ->orWhere('email', 'like', '%' . $keyword . '%');
    //     }
    // }

    //     public function scopeDateSearch($query, $date)
    // {
    //     if (!empty($date)) {
    //         return $query->whereDate('created_at', $date);
    //     }
    // }
}
