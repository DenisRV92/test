<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBookRequest;
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


    public function setup()
    {
        $this->crud->setModel("App\Models\Book");
        $this->crud->setRoute("admin/book");
        $this->crud->setEntityNameStrings('book', 'books');

    }

    public function setupListOperation()
    {

        $this->crud->setColumns(['name', 'price']);
    }

    public function setupCreateOperation()
    {

        $this->crud->setValidation(AdminBookRequest::class);
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "name book"
        ]);
        $this->crud->addField([
            'name' => 'authors',
            'type' => 'select2_multiple',
            'label' => "name author",
            'attribute' => 'name',
            'pivot' => true,
            'multiple' => true,
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
        $this->setupCreateOperation();
    }

}
