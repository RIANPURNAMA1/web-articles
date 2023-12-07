@extends('app')
@section('main')
<h1 class="my-4 text-center">---Semua Artikel Saya---</h1>
<nav aria-label="breadcrumb my-3 me-2">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Artikel Saya</li>
    </ol>
  </nav>
@if ($articles->isEmpty())
<hr>
  <p class="text-center">Belum ada artikel </p>
@endif
<div class="row row-cols-1 row-cols-md-2 g-4 container-fluid">
    @foreach ($articles as $article )
    <div class="col">
        <div class="card">
            <img src="{{asset('images/'. $article->image)}}" class="card-img-top" alt="..." style="height: 500px;object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{$article->user->name}}</h5>
                <h5 class="card-title">{{$article->title}}</h5>
                <p class="card-text">{!!$article->body!!}</p>
                <a href="/detailComment/ {{$article->id}}"><i class="fa-solid fa-comment fs-1 text-light bg-dark border border-solid p-3 rounded-circle"></i></a>
            </div>
        </div>
    </div>
    @endforeach
  </div>
@endsection
