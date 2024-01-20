<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'category_id', 'date'];

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
