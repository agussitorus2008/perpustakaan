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
                        <li class="breadcrumb-item">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="container-fluid basic_table">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="border-bottom-primary">
                                            <th scope="col">Id</th>
                                            <th scope="col">Nama Kategori</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="border-bottom-secondary">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>

                                                    <form action="{{ route('categories.delete', $category->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
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
        </div>
    </div>


</x-app>
