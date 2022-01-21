<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory,CrudTrait;

//    protected $fillable = ['name'];
    protected $table = 'authors';
    protected $guarded=[];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_books', 'author_id', 'book_id');
    }
}
