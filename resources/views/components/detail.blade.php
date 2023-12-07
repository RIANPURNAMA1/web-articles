@extends('app')
@section('main')
<a href="{{route('article')}}" class="btn btn-primary mt-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
<div class="row d-flex justify-content-center mt-5">
    <h1 class="text-center">---Detail Artikel---</h1>
    <div class="col-md-8 col-lg-10">
        <div class="card mb-3">
            <img src="{{asset('images/' . $detail->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title fw-bold">{{$detail->title}}</h3>
              <p class="card-text">{!!$detail->body!!}</p>
              @auth
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-comment fs-3"></i>
                </button>
              @else
                <p class="text-danger">Anda harus login untuk memberikan komentar.</p>
              @endauth
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
         <form action="{{ route('articles.commentStore', $detail->id) }}" method="POST">
            @csrf
            <div>
                <label for="">Komentar</label>
                <textarea name="comment" id="" cols="30" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
