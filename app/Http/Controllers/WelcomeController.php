<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public $categories;
    public function getAllCategories()
    {
        $this->categories = Category::all();
        return view('welcome', ['categories' =>  $this->categories]);
    }
}
