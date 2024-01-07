<x-app>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Menu</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Data Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <form action="{{ route('storeBook') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Judul
                                                    Buku</label>
                                                <input class="form-control" name="title" id="exampleFormControlInput1"
                                                    type="text" placeholder="Judul Buku">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="exampleFormControlSelect9">Kategori</label>
                                                <select class="form-select digits" name="category_id"
                                                    id="exampleFormControlSelect9">
                                                    <option value="" selected disabled>Pilih Kategori</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
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
                                                    placeholder="Deskripsi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah</label>
                                                <input class="form-control" name="quantity" type="text"
                                                    placeholder="Jumlah">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="file">Upload File Buku (PDF):</label><br>
                                                <input type="file" name="file" id="file" accept=".pdf"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="cover">Upload Cover Buku (jpeg/jpg/png):</label><br>
                                                <input type="file" name="cover" id="cover"
                                                    accept=".jpeg, .jpg, .png" required>
                                            </div>
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

        </div>
    </div>

</x-app>
