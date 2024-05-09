<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
    <title>Edit Item</title>
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
              <li class="nav-item">
                <a class="nav-link" href="{{route('viewform')}}">Add Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('createcategoryform')}}">Create Category</a>
              </li>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-danger">Log Out</button>
              </form>
            </ul>
          </div>
        </div>
    </nav>

    <form action="{{route('edited', ['id' => $skincare->id])}}" method="POST" class="content"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h2>Edit Data Barang</h2>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
          <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value={{$skincare->name}}>
        </div>
        <div class="mb-3">
    
        <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
           <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value={{$skincare->price}}>
        </div>
        <div class="mb-3">
    
       <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Stok Barang</label>
          <input name="stock" type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value={{$skincare->stock}}>
       </div>
       <div class="mb-3">

       <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Foto Barang</label>
         <input name="itempicture" type="file" class="form-control" id="exampleFormControlInput1">
       </div>
       <div class="mb-3">

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Kategori Barang</label>
         <select class="form-select" aria-label="Default select example" name="category_id">
           <option selected>Pilih Kategori</option>
           @foreach($categories as $category)
             <option value="{{$category->id}}">{{$category->category}} </option>
           @endforeach
         </select>
      </div>
      <div class="mb-3">

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>