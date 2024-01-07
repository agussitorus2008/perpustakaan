<x-user>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Default</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">
            <h2>Action Master Data Buku</h2>
            <a href="{{ route('createBook') }}">Tambah Buku</a>
            @foreach ($books as $book)
                <a href="{{ route('editBook', ['id' => $book->id]) }}">Edit Buku {{ $book->id }}</a>
                <a href="{{ route('deleteBook', ['id' => $book->id]) }}">Hapus Buku {{ $book->id }}</a>
            @endforeach
            <form action="{{ route('uploadFile', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="file">Upload File Buku:</label>
                <input type="file" name="file" id="file">
                <button type="submit">Upload</button>
            </form>

        </div>
    </div>
</x-user>
