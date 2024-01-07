<x-user>
    <h1>Daftar Buku</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-user>
