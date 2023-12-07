@extends('dashboard')

@section('data')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 ">Data Artikel</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Judul Artikel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $article->image) }}" alt="Article Image"
                                        style="max-width: 100px;">
                                </td>
                                <td>{{ $article->title }}</td>

                                <td class="d-flex">
                                    {{-- Tambahkan tombol edit dan hapus --}}
                                    <a href="{{ route('articles.edit', $article->id) }}"
                                        class="btn btn-warning m-1">Edit</a>
                                    <button onclick="deleteArticle({{ $article->id }})"
                                        class="btn btn-danger m-1">Delete</button>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info m-1">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function deleteArticle(id) {
            let token = $("meta[name='csrf-token']").attr("content");
            if (confirm('Are you sure you want to delete this article?')) {
                $.ajax({
                    url: '/articles/' + id, // Use the correct URL
                    type: 'DELETE',
                    data: {
                        "_token": token
                    },
                    success: function(data) {
                        window.location.href = '{{ route('articles.index') }}';
                        // You can handle success, e.g., remove the deleted article from the UI
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error, show a message, or take appropriate action
                    }
                });
            }
        }
    </script>
@endsection
