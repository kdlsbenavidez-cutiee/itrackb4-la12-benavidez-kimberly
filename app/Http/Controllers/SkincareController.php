<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SkincareController extends Controller
{
    
public function index(Request $request)
{
    DB::enableQueryLog();

    $category = $request->query('category_id');
    $brand = $request->query('brand');

    $categories = Category::all();

    $query = Skincare::with('category');

    if ($category) {
        $query = $query->where('category_id', $category);
    }

    if ($brand) {
        $query = $query->where('brand', $brand);
    }

    $skincare = $query->get();

    return view('skincare.index', compact('skincare', 'category', 'brand', 'categories'));
}




    public function create()
    {
         $categories = Category::all();

    return view('skincare.create', compact('categories'));
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'product' => 'required|max:255',
        'brand' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:1'
    ]);

    Skincare::create($validated);

    return redirect()->route('skincare.index')
        ->with('success', 'Skincare product added successfully.');
}


    public function show(string $id)
    {
        $skincare = Skincare::findOrFail($id);

         return view('skincare.show', ['item' => $skincare]);

    }

    public function featured()
    {
        $item = Skincare::findOrFail(3);

        return view('skincare.featured', ['item' => $item]);
    }
}