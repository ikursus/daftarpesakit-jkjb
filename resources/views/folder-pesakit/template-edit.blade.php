@extends('layouts.induk')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Borang Kemaskini Rekod Pesakit</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Maklumat Pesakit</h6>
                </div>
                <div class="card-body">


                    <form method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">NAMA PESAKIT</label>
                          <input type="text" class="form-control" name="nama_pesakit" value="{{ old('nama_pesakit') ?? $pesakit->nama_pesakit }}">
                          @error('nama_pesakit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label for="no_kp">NO K/P</label>
                          <input type="text" class="form-control" name="no_kp" value="{{ $pesakit->no_kp }}">
                          @error('no_kp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label for="jantina">JANTINA</label>
                          <select class="form-control" name="jantina">
                            <option value="">--SILA PILIH --</option>

                            @foreach ($senaraiJantina as $jantina)
                                <option value="{{ $jantina->label }}" {{ $pesakit->jantina == $jantina->label ? 'selected="selected"' : NULL }}>
                                    {{ $jantina->label }}
                                </option>
                            @endforeach

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">TARIKH LAHIR</label>
                          <input type="date" class="form-control" name="tarikh_lahir" value="{{ $pesakit->tarikh_lahir }}">
                        </div>

                        <div class="form-group">
                          <label for="alamat">ALAMAT</label>
                          <textarea class="form-control" name="alamat">{{  $pesakit->alamat }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>


                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
@endsection
