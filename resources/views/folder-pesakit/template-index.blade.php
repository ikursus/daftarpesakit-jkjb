@extends('layouts.induk')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col">

            <div class="card">

                <div class="card-header">
                    <h3>{{ $title ?? NULL }}</h3>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NO KP</th>
                            <th scope="col">JANTINA</th>
                            <th scope="col">TARIKH LAHIR</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiPesakit as $pesakit)
                            <tr>
                            <td>{{ $pesakit->id }}</td>
                            <td>{{ $pesakit->nama_pesakit }}</td>
                            <td>{{ $pesakit->no_kp }}</td>
                            <td>{{ $pesakit->jantina }}</td>
                            <td>{{ $pesakit->tarikh_lahir }}</td>
                            <td>{{ $pesakit->alamat }}</td>
                            <td>
                                <a class="btn btn-primary" href="/pesakit/{{ $pesakit->id }}">SHOW</a>
                                <a class="btn btn-info" href="/pesakit/{{ $pesakit->id }}/edit">EDIT</a>
                                <a class="btn btn-danger" href="/pesakit/{{ $pesakit->id }}/delete">DELETE</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>

                    {{ $senaraiPesakit->links() }}

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('content-footer')

<h1>CONTENT BARU DI FOOTER</h1>

@endsection
