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
                <th>Cover</th>
                <th>PDF</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        @if ($book->cover_path)
                            <!-- Display cover image in PDF -->
                            <img src="{{ public_path('storage/covers/' . $book->cover_path) }}" alt="{{ $book->title }}"
                                style="max-width: 50px; max-height: 50px; object-cover rounded-md">
                        @else
                            No Cover
                        @endif
                    </td>
                    <td>
                        <!-- Display PDF link in PDF -->
                        <a href="{{ public_path('storage/pdfs/' . $book->pdf_path) }}" target="_blank">Baca PDF</a>
                    </td>
                    <td>
                        <!-- Display Edit and Delete actions in PDF -->
                        Edit | Hapus
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table></x-user>
