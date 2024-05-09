<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <title>Registration</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
          <div class="navbar-brand"> <img src="{{asset('pictures/chicha.png')}}" width="50px" alt="">ChipiChapa</div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 button">
              <a href="{{route('registerForm')}}" class="btn btn-light">Register</a>
              <a href="{{route('loginForm')}}" class="btn btn-secondary">Log In</a>
            </ul>
          </div>
        </div>
    </nav>

    <form action="{{route('register')}}" method="POST" class="content">
        @csrf
    <h2>Registration</h2>
        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Nama Lengkap</label>
            <input type="text" id="inputPassword5" class="form-control" name="fullName">
    
            <label for="inputPassword5" class="form-label">Email</label>
            <input type="text" id="inputPassword5" class="form-control" name="email">
    
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password">
            
            <label for="inputPassword5" class="form-label">Konfirmasi Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="confirmPassword">
    
            <label for="inputPassword5" class="form-label">Nomor Handphone</label>
            <input type="text" id="inputPassword5" class="form-control" name="phoneNumber">
        </div>
        @if($errors->any())
         {{$errors->first()}}
        @endif

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>