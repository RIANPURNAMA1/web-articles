@extends('app')
@section('main')

<a href="{{route('semua.artikel')}}" class="btn btn-primary mt-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
<div class="row d-flex justify-content-center mt-5">
    <h1 class="text-center">---Lihat Comment---</h1>
    <div class="col-md-8 col-lg-10">
        <div class="card mb-3">
            <img src="{{asset('images/' . $detail->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title fw-bold">{{$detail->title}}</h3>
              <p class="card-text">{!!$detail->body!!}</p>

            </div>
          </div>
          {{-- tampilan data komen dan user yang mengomentari --}}
          <h1>Komentar</h1>
            @if ($comments->isEmpty())
              <p>Tidak ada komentar</p>
            @endif
                @foreach ($comments as $comment)
                    <div class="card p-3 rounded-2">
                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                    </div>
                @endforeach

    </div>
</div>

@endsection
