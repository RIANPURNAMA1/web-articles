@extends('app')
@section('main')
    <h1 class="my-4 text-center">--- Artikel {{ $user->name }} ---</h1>
    <a href="{{ route('article') }}" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <nav aria-label="breadcrumb my-3 me-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artikel Saya</li>
        </ol>
    </nav>
    @if ($article->isEmpty())
        <hr>
        <p class="text-center">Belum ada artikel </p>
    @endif
    <div class="row container-fluid">
        @foreach ($article as $articl)
            <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $articl->image) }}" class="card-img-top" alt="..."
                        style="height: 500px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $articl->user->name }}</h5>
                        <h5 class="card-title">{{ $articl->title }}</h5>
                        <p class="card-text">{!! $articl->body !!}</p>
                        {{-- tampilan data komen dan user yang mengomentari --}}
                        <h1>Komentar</h1>
                        @if ($comments->isEmpty())
                              <p>Belum ada komentar</p>
                        @endif
                        @foreach ($comments->where('article_id', $articl->id) as $comment)
                            <p class="fw-bold card p-3">{{ $comment->user->name }}: <span
                                    class="fw-normal">{{ $comment->comment }}</span></p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
