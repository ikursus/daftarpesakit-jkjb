@extends('layouts.induk')

@section('content')

<table class="table">

    <thead>
        <tr>
            <th>PERKARA</th>
            <th>BUTIRAN</th>
        </tr>
    </thead>

<tbody>
    <tr>
        <td>NAMA</td>
        <td>{{ $pesakit->nama_pesakit }}</td>
    </tr>

    <tr>
        <td>NO KP</td>
        <td>{{ $pesakit->no_kp }}</td>
    </tr>

    <tr>
        <td>JANTINA</td>
        <td>{{ $pesakit->jantina }}</td>
    </tr>
</tbody>

</table>

@endsection
