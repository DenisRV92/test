<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthorRequests;
use App\Models\Book;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class AdminAuthorController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Author");
        $this->crud->setRoute("admin/author");
        $this->crud->setEntityNameStrings('author', 'authors');

    }
    public function setupListOperation()
    {
        $this->crud->setColumns(['name']);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(AdminAuthorRequests::class);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "name author"
        ]);

    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
