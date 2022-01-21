<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class AdminBookController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Book");
        $this->crud->setRoute("admin/adminbook");
        $this->crud->setEntityNameStrings('book', 'books');
//        $books = $this->books();
//        $this->crud->setColumns([
//            'label' => 'родительская категория'
//        ]);
    }
    public function setupListOperation()
    {
        $this->crud->setColumns(['name', 'author','price']);
    }

    public function setupCreateOperation()
    {
//        $this->crud->setValidation(TagCrudRequest::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "name book"
        ]);
        $this->crud->addField([
            'name' => 'author',
            'type' => 'text',
            'label' => "name author"
        ]);
        $this->crud->addField([
            'name' => 'price',
            'type' => 'number',
            'label' => "price"
        ]);
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
//    private function books()
//    {
//        $books = (new Book())->get();
//        $responce = [];
//        foreach ($books as $book) {
//            $responce[$book->id] = $book->name;
//        }
//        return $responce;
//    }
}