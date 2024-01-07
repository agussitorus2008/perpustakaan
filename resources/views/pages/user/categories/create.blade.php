<x-user>
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
                        <li class="breadcrumb-item">kategori</li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form action="{{ route('user.categories.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama Kategori
                                            Buku</label>
                                        <input class="form-control" name="name" id="exampleFormControlInput1"
                                            type="text" placeholder="Judul Buku">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('user.categories.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-user>
