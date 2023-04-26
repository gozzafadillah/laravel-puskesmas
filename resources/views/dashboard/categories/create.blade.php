@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kategori</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/categories" method="post" class="mb-3" enctype="multipart/form-data">
        @csrf

       
        <div class="mb-3 col-lg-7">
        <label for="name" class="form-label">Tambah Kategori</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Kategori" value="{{ old('name') }}" autofocus>
        @error('name')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>

      <div class="mb-3">
      <label for="image" class="form-label">Masukan Gambar</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
    </div> 
      

      <div class="mb-4 col-lg-5">
        {{-- <label for="slug" class="form-label"></label> --}}
        <input type="text" class="form-control @error('slug') is-invalid @enderror" hidden id="slug" placeholder="slug" name="slug" value="{{ old('slug') }}">
        @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>


      <button type="submit" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Kategori</button>
    </form>

</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener("keyup", function() {
  let preslug = name.value;
  preslug = preslug.replace(/ /g,"-"); 
  slug.value = preslug.toLowerCase();
  });

  // tittle.addEventListener('change', function (){
  //   fetch('/dashboard/posts/checkSLug?tittle=' + tittle.value)
  //   .then(response => response.json())
  //   .then(data => slug.value = data.slug)
  // });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }

      // const blob = URL.createObjectURL(image.files[0]);
      // imgPreview.src = blob;
  
</script>

@endsection
