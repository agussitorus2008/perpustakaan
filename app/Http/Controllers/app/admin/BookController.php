<?php

namespace App\Http\Controllers\app\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection
{
    public function collection()
    {
        $user = Auth::user();
        $books = $user->is_admin ? Book::all() : $user->books;
        return $books;
    }
}

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Tambahkan middleware auth di sini
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->is_admin) {
            // Jika admin, ambil semua buku
            $books = Book::all();
        } else {
            // Jika user, ambil buku yang dimilikinya sendiri
            $books = $user->books;
        }

        $categories = Category::all();
        return view('pages.admin.buku.index', compact('books', 'categories'));
    }


    public function filterByCategory(Request $request)
    {
        // Ambil ID kategori dari parameter URL
        $categoryId = $request->input('category');

        // Ambil semua kategori
        $categories = Category::all();

        // Jika ada ID kategori, ambil buku berdasarkan kategori
        if ($categoryId) {
            $category = Category::find($categoryId);
            $books = $category ? $category->books : [];
        } else {
            // Jika tidak ada ID kategori, ambil semua buku
            $books = Book::all();
        }

        return view('pages.admin.buku.index', compact('books', 'categories'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.buku.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'file' => 'required|mimes:pdf|max:2048',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file PDF
        $filePath = $this->uploadFile($request);

        // Upload cover image
        $coverPath = $this->uploadImage($request);

        // Simpan data buku
        $user = auth()->user(); // Mengambil objek pengguna yang saat ini login
        $user->books()->create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'pdf_path' => $filePath,
            'cover_path' => $coverPath,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.buku.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'file' => 'nullable|mimes:pdf|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil data buku
        $book = Book::findOrFail($id);

        // Update data buku
        $book->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
        ]);

        // Upload file PDF jika ada
        if ($request->hasFile('file')) {
            $filePath = $this->uploadFile($request, $book->pdf_path);
            $book->update(['pdf_path' => $filePath]);
        } else {
            // Jika tidak ada file baru, gunakan file yang sudah ada
            $filePath = $book->pdf_path;
        }

        // Upload cover image jika ada
        if ($request->hasFile('cover')) {
            $coverPath = $this->uploadImage($request, $book->cover_path);
            $book->update(['cover_path' => $coverPath]);
        } else {
            // Jika tidak ada cover baru, gunakan cover yang sudah ada
            $coverPath = $book->cover_path;
        }

        // Redirect with a success message
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Hapus gambar terkait
        Storage::disk('public')->delete($book->cover_path);
        Storage::disk('public')->delete($book->pdf_path);

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Produk berhasil dihapus.');
    }

    protected function uploadImage(Request $request, $existingImagePath = null)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->getClientOriginalExtension();
            $cover->storeAs('public/covers', $coverName);

            // Hapus gambar lama jika ada gambar baru
            if ($existingImagePath) {
                Storage::disk('public')->delete($existingImagePath);
            }

            // Mengembalikan nama file baru
            return $coverName;
        }

        // Mengembalikan nama file lama jika tidak ada gambar yang diunggah
        return $existingImagePath;
    }

    protected function uploadFile(Request $request, $existingFilePath = null)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pdfs', $fileName);

            // Hapus file lama jika ada file baru
            if ($existingFilePath) {
                Storage::disk('public')->delete($existingFilePath);
            }

            // Mengembalikan nama file baru
            return $fileName;
        }

        // Mengembalikan nama file lama jika tidak ada file yang diunggah
        return $existingFilePath;
    }
    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'daftar_buku.xlsx');
    }
}
