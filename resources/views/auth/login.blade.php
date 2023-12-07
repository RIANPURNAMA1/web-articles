<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <div class="row d-flex justify-content-center my-4">
            <div class="col-4">
                @if (session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
                @endif
            </div>
        </div>
        <h1 class="text-center">Form Login </h1>
        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <form action="{{route('store.login')}}" method="POST">
                    @csrf
                 <div>
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control">
                 </div>
                 @error('email')
                 <p class="text-danger">{{$message}}</p>
                 @enderror
                 <div>
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control">
                 </div>
                 @error('password')
                 <p class="text-danger">{{$message}}</p>
                 @enderror
                 <p>Belum punya akun ? silahkan <a href="{{route('register')}}">Register</a></p>
                 <input type="submit" class="btn btn-primary my-3"  value="Login">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
