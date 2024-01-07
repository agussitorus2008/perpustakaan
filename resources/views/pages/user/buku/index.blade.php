<x-user>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Menu</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Daftar Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid basic_table">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.books.create') }}" class="btn btn-primary">Tambah Buku</a>
                        <!-- Add this button to export to Excel -->
                        <a href="{{ route('user.books.export.excel') }}" class="btn btn-success">Export to Excel</a>

                       

                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.filterByCategory') }}" method="GET">
                            <label for="category">Filter Kategori:</label>
                            <select name="category" id="category">
                                <option value="">Semua Kategori</option>
                                @foreach (auth()->user()->categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="border-bottom-primary">
                                    <th scope="col">Id</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">PDF</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr class="border-bottom-secondary">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td> {{ $book->title }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>
                                            @if ($book->cover_path)
                                                <a href="{{ asset('storage/covers/' . $book->cover_path) }}"
                                                    data-baguettebox="gallery" data-title="{{ $book->title }}">
                                                    <img src="{{ asset('storage/covers/' . $book->cover_path) }}"
                                                        alt="{{ $book->title }}"
                                                        style="max-width: 50px; max-height: 50px; object-cover rounded-md cursor-pointer">
                                                </a>
                                            @else
                                                <span>No Cover</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ asset('storage/pdfs/' . $book->pdf_path) }}"
                                                target="_blank">Baca
                                                PDF</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.books.edit', $book->id) }}">Edit</a>
                                            <form action="{{ route('user.books.delete', $book->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.gallery');
    </script>



</x-user>
