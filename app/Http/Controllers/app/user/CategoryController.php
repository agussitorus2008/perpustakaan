<?php

namespace App\Http\Controllers\app\user;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil kategori yang dimiliki oleh user saat ini
        $categories = $user->categories;
        return view('pages.user.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.user.categories.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        // Simpan data kategori buku dengan mengaitkannya ke user yang sedang login
        $user = auth()->user();

        $category = new Category([
            'name' => $request->input('name'),
        ]);

        // Hubungkan kategori dengan pengguna saat ini
        $user->categories()->save($category);

        return redirect()->route('user.categories.index')->with('success', 'Kategori buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.user.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        // Ambil data kategori buku
        $category = Category::findOrFail($id);

        // Update data kategori buku
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('user.categories.index')->with('success', 'Kategori buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('user.categories.index')->with('success', 'Kategori buku berhasil dihapus.');
    }
}
