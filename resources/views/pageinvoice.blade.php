<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Create Invoice</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
          <div class="navbar-brand"> <img src="{{asset('pictures/chicha.png')}}" width="50px" alt="">ChipiChapa</div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Catalog</a>
              </li>

              @if(Auth::user() && Auth::user()->isAdmin == '1')
              <li class="nav-item">
                <a class="nav-link" href="{{route('viewform')}}">Add Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('createcategoryform')}}">Create Category</a>
              </li>
            @endif
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-danger">Log Out</button>
              </form>
            </ul>
          </div>
        </div>
    </nav>

    <form action="{{route('invoice.store')}}" method="post">
        @csrf
        <select name="skincares[0][id]">
            @foreach($skincares as $skincare)
            <option value="{{ $skincare->id }}">{{ $skincare->name }} - {{ $skincare->price }}</option>
            @endforeach
        </select>
        <input type="number" name="skincare[0][stock]" placeholder="Jumlah Barang">
        <input type="text" name="shippingAddress" placeholder="Alamat Pengiriman">
        <input type="text" name="postalCode" placeholder="Kode Pos">
        <button type="submit">Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>