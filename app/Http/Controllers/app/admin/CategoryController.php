<?php

namespace App\Http\Controllers\app\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if ($user->is_admin) {
            // Jika admin, ambil semua kategori
            $categories = Category::all();
        } else {
            // Jika user, ambil kategori yang dimilikinya sendiri
            $categories = $user->categories;
        }

        return view('pages.admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('pages.admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        // Simpan data kategori buku dengan mengaitkannya ke user yang sedang login
        auth()->user()->categories()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori buku berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Ambil data kategori buku
        $category = Category::findOrFail($id);

        // Pastikan pengguna saat ini memiliki izin untuk memperbarui kategori ini
        $user = auth()->user();
        if (!$user->is_admin && !$user->categories->contains($category)) {
            // Jika bukan admin dan bukan pemilik kategori, kembalikan ke halaman sebelumnya
            return redirect()->back()->with('error', 'Anda tidak diizinkan memperbarui kategori ini.');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        // Update data kategori buku
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori buku berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori buku berhasil dihapus.');
    }
}
