@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Judul</td>
          <td>Penerbit</td>
          <td>Tahun Terbit</td>
          <td>Pengarang</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $buku)
        <tr>
            <td>{{$buku->id}}</td>
            <td>{{$buku->judul}}</td>
            <td>{{$buku->penerbit}}</td>
            <td>{{$buku->tahun_terbit}}</td>
            <td>{{$buku->pengarang}}</td>
            <td><a href="{{ route('bukus.edit',$buku->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('bukus.destroy', $buku->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
