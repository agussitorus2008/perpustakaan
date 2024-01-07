<x-app>
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
            <h2>Action Master Data Kategori Buku</h2>
            <a href="{{ route('createCategory') }}">Tambah Kategori Buku</a>
            @foreach ($categories as $category)
                <a href="{{ route('editCategory', ['id' => $category->id]) }}">Edit Kategori {{ $category->id }}</a>
                <a href="{{ route('deleteCategory', ['id' => $category->id]) }}">Hapus Kategori {{ $category->id }}</a>
            @endforeach


        </div>
    </div>
</x-app>
