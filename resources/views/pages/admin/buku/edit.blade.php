<x-app>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Buku</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Edit Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul
                                            Buku</label>
                                        <input class="form-control" name="title" id="exampleFormControlInput1"
                                            type="text" placeholder="Judul Buku" value="{{ $book->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Kategori</label>
                                        <select class="form-select digits" name="category_id"
                                            id="exampleFormControlSelect9">
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <input class="form-control" name="description" type="text"
                                            placeholder="Deskripsi" value="{{ $book->description }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input class="form-control" name="quantity" type="text" placeholder="Jumlah"
                                            value="{{ $book->quantity }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="file">Upload File Buku (PDF):</label><br>
                                        <input type="file" name="file" id="file" accept=".pdf">
                                        @if ($book->pdf_path)
                                            <label>Existing PDF:</label>
                                            <a href="{{ asset('storage/pdfs/' . $book->pdf_path) }}"
                                                target="_blank">View
                                                PDF</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="cover">Upload Cover Buku (jpeg/jpg/png):</label><br>
                                        <input type="file" name="cover" id="cover" accept=".jpeg, .jpg, .png">
                                    </div>
                                    @if ($book->cover_path)
                                        <label>Existing Cover:</label>
                                        <img src="{{ asset('storage/covers/' . $book->cover_path) }}"
                                            alt="Existing Cover" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app>
