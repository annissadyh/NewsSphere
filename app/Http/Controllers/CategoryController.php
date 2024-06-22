<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ValidatesRequests;

    public function index()
    {
        $category = Kategori::all();
        return view('back.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        $this->validate($request, [
            'name_category' => 'required',
        ]);

        $category = Kategori::create([
            'name_category' => $request->name_category,
            'slug' => Str::slug($request->name_category)
        ]);

        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Kategori::find($id);

        return view('back.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name_category);

        $category = Kategori::findOrFail($id);
        $category->update($data);

        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Terupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Kategori::find($id);

        $category->delete();

        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
