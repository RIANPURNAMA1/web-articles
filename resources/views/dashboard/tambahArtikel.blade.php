@extends('dashboard')
@section('data')

<h1>Create Article</h1>
<form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
    @csrf
    <!-- Isi formulir di sini -->
    <label for="image">Gambar:</label>
    <input type="file" name="image" id="image" required class="form-control">

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required class="form-control">

    <label for="body">Body:</label>
    <textarea name="body" id="body" ></textarea>

    <button type="submit" class="btn btn-primary tombol-simpan my-3">Submit</button>
</form>
@include('dashboard.script')
@endsection
