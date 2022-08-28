<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Models\Category;
use Illuminate\Http\Request;

class ContractQuestionsController extends Controller
{
    public function index()
    {
        $category = Category::query()->with('permissions')->get();
//        $category = Category::with('permission')->get();
        return ContractResource::collection(compact('category'));
    }
}
