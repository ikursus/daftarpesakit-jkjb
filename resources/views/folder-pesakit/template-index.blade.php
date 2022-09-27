@extends('layouts.induk')

@section('content-1')

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAMA</th>
          <th scope="col">NO KP</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($senaraiPesakit as $pesakit)
        <tr>
          <td>{{ $pesakit['id'] }}</td>
          <td>{{ $pesakit['nama'] }}</td>
          <td>{{ $pesakit['nokp'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection

@section('content-footer')

<h1>CONTENT BARU DI FOOTER</h1>

@endsection
