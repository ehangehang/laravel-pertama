@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('bukus.update', $buku->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Judul :</label>
          <input type="text" class="form-control" name="judul" value={{ $buku->judul }} />
        </div>
        <div class="form-group">
          <label for="price">Penerbit :</label>
          <input type="text" class="form-control" name="penerbit" value={{ $buku->penerbit }} />
        </div>
        <div class="form-group">
          <label for="quantity">Tahun Terbit :</label>
          <input type="text" class="form-control" name="tahun_terbit" value={{ $buku->tahun_terbit }} />
        </div>
        <div class="form-group">
          <label for="quantity">Pengarang :</label>
          <input type="text" class="form-control" name="pengarang" value={{ $buku->pengarang }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
