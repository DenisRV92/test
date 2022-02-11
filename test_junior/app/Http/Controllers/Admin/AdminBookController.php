<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

/**
 * Class AdminBookController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\ $crud
 */
class AdminBookController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

//    private function getFieldsData($show = FALSE)
//    {
//        return [
//            [
//                'name' => 'name',
//                'label' => 'Title',
//                'type' => 'text'
//            ],
//            [
//                'name' => 'price',
//                'label' => 'Content',
//                'type' => 'number',
//            ],
//            [    // Select2Multiple = n-n relationship (with pivot table)
//                'label' => "authors",
//                'type' => ($show ? "select" : 'select2_multiple'),
//                'name' => 'authors', // the method that defines the relationship in your Model
//// optional
//                'entity' => 'authors', // the method that defines the relationship in your Model
//                'model' => "App\Models\Author", // foreign key model
//                'attribute' => 'name', // foreign key attribute that is shown to user
//                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
//            ]
//        ];
//    }

    public function setup()
    {
        $this->crud->setModel("App\Models\Book");
        $this->crud->setRoute("admin/adminbook");
        $this->crud->setEntityNameStrings('book', 'books');
//        $this->crud->addFields($this->getFieldsData());
//        $this->crud->getFieldsData();
//        $books = $this->books();
//        $this->crud->setColumns([
//            'label' => 'родительская категория'
//        ]);
    }

    public function setupListOperation()
    {
//        CRUD::setFromDb();
//        $this->crud->set('show.setFromDb', false);
//        $this->crud->addColumns($this->getFieldsData(TRUE));
        $this->crud->setColumns(['name','author', 'price']);
    }

    public function setupCreateOperation()
    {
//        $this->crud->set('show.setFromDb', false);
////        $this->crud->addFields($this->getFieldsData());
//        $this->crud->setValidation(TagCrudRequest::class);
////
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "name book"
        ]);
        $this->crud->addField([
            'name' => 'author',
            'type' => 'select2_multiple',
            'label' => "name book",
////            'label' => "Tags",
////            'type' => 'select2_multiple',
////            'name' => 'authors', // the method that defines the relationship in your Model
//            'entity' => 'authors', // the method that defines the relationship in your Model
//            'attribute' => 'name', // foreign key attribute that is shown to user
//            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
////            'name' => 'author',
////            'type' => 'text',
////            'label' => "name book"
////            'name' => 'authors',
////            'type' => 'select2_multiple',
////            'label' => "name author",
//////            'name' => 'author',
//            'entity' => 'author_books',
            'attribute' => 'name',
//            'pivot' => true,
//            'multiple'=>true,
//////////
            'model' => 'App\Models\Author',
        ]);
        $this->crud->addField([
            'name' => 'price',
            'type' => 'number',
            'label' => "price"
        ]);
    }

    public function setupUpdateOperation()
    {
//        $this->setupCreateOperation();
//        $this->crud->addColumns($this->getFieldsData(TRUE));
    }

//    protected function setupShowOperation()
//    {
//        // by default the Show operation will try to show all columns in the db table,
//        // but we can easily take over, and have full control of what columns are shown,
//        // by changing this config for the Show operation
//        $this->crud->set('show.setFromDb', false);
//        $this->crud->addColumns($this->getFieldsData(TRUE));
//    }
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
//'name' => 'authors',
//            'type' => 'select2_multiple',
//            'label' => "name author",
////            'name' => 'author',
//            'entity' => 'authors',
//            'attribute' => 'name',
//            'pivot' => true,
//////
//            'model' => 'App\Models\Author',
