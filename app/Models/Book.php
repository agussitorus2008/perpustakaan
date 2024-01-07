<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'description',
        'quantity',
        'pdf_path',
        'cover_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // tambahkan relasi ke user jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
