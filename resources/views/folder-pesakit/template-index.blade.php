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
                            <td>{{ $pesakit->jantina->label }}</td>
                            <td>{{ $pesakit->tarikh_lahir }}</td>
                            <td>{{ $pesakit->alamat }}</td>
                            <td>
                                <a class="btn btn-primary" href="/pesakit/{{ $pesakit->id }}">SHOW</a>
                                <a class="btn btn-info" href="/pesakit/{{ $pesakit->id }}/edit">EDIT</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $pesakit->id }}">
                                    DELETE
                                </button>

                                <!-- Modal -->
                                <form method="POST" action="/pesakit/{{$pesakit->id}}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="modal-delete-{{ $pesakit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION DELETE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Adakah anda ingin menghapuskan rekod {{ $pesakit->nama_pesakit }} ?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">YES</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
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
