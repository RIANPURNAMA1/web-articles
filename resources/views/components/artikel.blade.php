@extends('app')
@section('main')

<div class="row d-flex justify-content-center my-2">
    <div class="col-6">
        @if (session('success'))
        <div class="alert alert-success">
           {{session('success')}}
        </div>
        @endif
    </div>
</div>
    {{-- search --}}
    <div class="row my-4">
        <div class="col-9 m-auto">
            <form class="d-flex" role="search" method="GET" action="{{ route('article') }}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
   {{-- hero --}}
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        @foreach ($data->take(3) as $index => $article)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
                class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($data->take(3) as $index => $article)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('images/' . $article->image) }}" class="d-block w-100 carousel-image" alt="..." style="height:70vh; object-fit:cover;">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <h1 class="text-center mt-4">---Artikel Terbaru--</h1>
    @if ($data->isEmpty())
    <hr>
      <p class="text-center">Belum ada artikel </p>
    @endif
    @foreach ($data as $d)
    <div class="card mb-3 container-fluid" style="">
        <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('images/' . $d->image)}}" class="img-fluid rounded-start" alt="..." width="400px"
                        style="height: 400px; object-fit:cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ route('user.article', $d->user->id) }}"><h5 class="card-title fw-bold">{{ $d->user->name }}</h5></a>
                        <h5 class="card-title">{{$d->title}}</h5>
                        <p class="card-text">{!!$d->body!!}</p>
                    </div>
                    <div class="m-4">
                        <a href="{{route('detail.artikel', $d->id)}}" class="btn btn-info">Lihat Artikel <i class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
