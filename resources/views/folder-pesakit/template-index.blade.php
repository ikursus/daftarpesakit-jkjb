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

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('content-footer')

<h1>CONTENT BARU DI FOOTER</h1>

@endsection
