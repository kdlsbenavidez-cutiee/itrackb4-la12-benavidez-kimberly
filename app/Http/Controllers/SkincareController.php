<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

       $skincare = Skincare::create($validated);

       Log::info('Skincare product saved', ['id' => $skincare->id]);

       return redirect()->route('skincare.index')
       ->with('success', 'Skincare product added successfully.');
    }

    public function show(Skincare $skincare)
    {
        return view('skincare.show', ['item' => $skincare]);
    }

    public function edit(Skincare $skincare)
    {
        $categories = Category::all();

        return view('skincare.edit', compact('skincare', 'categories'));
    }

    public function update(Request $request, Skincare $skincare)
    {
        $validated = $request->validate([
            'product' => 'required|max:255',
            'brand' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1'
        ]);

        $skincare->update($validated);

        return redirect()->route('skincare.index');
    }

    public function destroy(Skincare $skincare)
    {
        abort_if($skincare->category->skincares()->count() === 1, 403);

        $skincare->delete();

        return redirect()->route('skincare.index');
    }

    public function featured()
    {
        $item = Skincare::findOrFail(3);

        return view('skincare.featured', ['item' => $item]);
    }
}
