<form action="/antrian" method="post" class="mb-5 pb-4">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}"
      autocomplete="off" placeholder="isikan nama ...">
  </div>
  <input id="NIK" value="{{ auth()->user()->NIK }}" name="NIK" type="hidden">
  <input name="tgllahir" value="{{ auth()->user()->tgllahir }}" id="tgllahir" type="hidden">

  <div class="mb-3">
    <label for="kode_poli" class="form-label">Pilih Poli</label>
    <select class="form-control" name="kode_poli" id="kode_poli">
      @foreach ($polis as $poli)
        <option value="{{ $poli->kode_poli }}">{{ $poli->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </div>
</form>
