@extends('dashboard')
@section('data')
   <h1>Detail Artikel</h1>
   <a href="{{route('articles.index')}}" class="btn btn-primary my-3">Kembali</a>
   <div class="row container">
      <div class="col-md-12 col-lg10">
         <div class="card mb-3">
            <img src="{{asset('images/'. $articles->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$articles->title}}</h5>
              <p class="card-text">{!!$articles->body!!}</p>
            </div>
          </div>
      </div>
   </div>
@endsection
