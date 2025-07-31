<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'publication_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'author',
        'publication_date',
        'publisher',
        'pages',
        'category_id'
    ];

    protected $dates = ['publication_date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
