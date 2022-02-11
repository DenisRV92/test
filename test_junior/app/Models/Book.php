<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, CrudTrait;

//    protected $fillable = ['name','author','price'];
    protected $table = 'books';
    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_books', 'book_id', 'author_id');
    }

    public function booksAuthors()
    {
        return $this->hasMany(Author::class, 'book_id', 'id');
    }

}
