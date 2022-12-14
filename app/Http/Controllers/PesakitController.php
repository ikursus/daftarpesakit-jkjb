<?php

namespace App\Http\Controllers;

use App\Models\Pesakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Senarai Pesakit';
        $tarikhToday = date('d-m-Y');
        $number = 5;
        //
        // $senaraiPesakit = [
        //     ['id' => 1, 'nama' => 'Ali Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 2, 'nama' => 'Ahmad Bin Abu', 'nokp' => '7070707070770'],
        //     ['id' => 3, 'nama' => 'Jamal Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 4, 'nama' => 'Siti Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 5, 'nama' => 'Ah Leong Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 6, 'nama' => 'Sammy Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 7, 'nama' => 'John Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 8, 'nama' => 'Smith Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 9, 'nama' => 'Maria Bin Abu', 'nokp' => '808080808080'],
        //     ['id' => 10, 'nama' => 'Ipin Bin Abu', 'nokp' => '808080808080'],
        // ];
        //$senaraiPesakit = DB::table('pesakit')->get();
        // $senaraiPesakit = DB::table('pesakit')
        // ->join('jantina', 'pesakit.jantina_id', '=', 'jantina.id')
        // ->select('pesakit.*', 'jantina.label')
        // ->paginate(2);

        $senaraiPesakit = Pesakit::with('jantina')->paginate(10);

        //return view('pesakit.template-index');
        // Cara 1 Pass Data Kepada Template
        // return view('pesakit.template-index')
        // ->with('pesakitList', $senaraiPesakit)
        // ->with('title', $title)
        // ->with('tarikhHariIni', $tarikhToday);
        // Cara 2 Pass Data Kepada Template
        // return view('pesakit.template-index', [
        //     'pesakitList' => $senaraiPesakit,
        //     'title' => $title,
        //     'tarikhHariIni' => $tarikhToday
        // ]);
        //Cara 3 Pass Data Kepada Template
        return view('folder-pesakit.template-index', compact('number', 'senaraiPesakit', 'title', 'tarikhToday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Dapatkan data jantina menerusi kaedah query builder
        $senaraiJantina = DB::table('jantina')
                            ->select('id', 'label')
                            ->orderBy('label', 'asc')
                            ->get();

        return view('folder-pesakit.template-daftar', compact('senaraiJantina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Die and Dump
        // $data = $request->all();
        // $data = $request->input('nama_pesakit');
        // $data = $request->nama_pesakit;
        // $data = $request->except('nama_pesakit');
        // $data = $request->only(['nama_pesakit', 'no_kp']);

        // Kod asas untuk validation
        $request->validate([
            'nama_pesakit' => 'required|min:3|string', // Cara pertama menulis rules
            'no_kp' => ['required', 'digits:12', 'unique:pesakit,no_kp'], // Cara kedua menulis rules
            'jantina_id' => ['required', 'integer'],
            'tarikh_lahir' => ['required'],
            'alamat' => ['sometimes', 'nullable'] // Untuk kes bagi field yang tak wajib
        ]);

        $data = $request->all();

        // Attach data untuk column created_at kepada variable $data diatas
        // $data['created_at'] = now(); // Carbon\Carbon::now();
        // Jika model, tak perlu masukkan data untuk created_at

        // Jika nama field tidak sama dengan nama column dalam table,
        // perlu kena declare nama field dan nama column yang berkaitan
        // $data = [
        //     'nama_pesakit' => $request->input('nama_pesakit'),
        //     'no_kp' => $request->input('no_kp'),
        //     'jantina' => $request->input('jantina'),
        //     'alamat' => $request->input('alamat'),
        //     'tarikh_lahir' => $request->input('tarikh_lahir'),
        // ];

        // DB::table('pesakit')->insert($data);
        // Cara 1 menyimpan data menggunakan model
        // $pesakit = new Pesakit;
        // $pesakit->nama_pesakit = $request->input('nama_pesakit');
        // $pesakit->no_kp = $request->no_kp;
        // $pesakit->jantina = $request->jantina;
        // $pesakit->alamat = $request->alamat;
        // $pesakit->tarikh_lahir = $request->tarikh_lahir;
        // $pesakit->save();
        Pesakit::create($data);

        return redirect('/pesakit')->with('mesej-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pesakit = DB::table('pesakit')->where('id', '=', $id)->first(); // LIMIT 1
        $pesakit = Pesakit::findOrFail($id); // LIMIT 1
        // $pesakit = Pesakit::find($id); // LIMIT 1

        return view('folder-pesakit.template-show', compact('pesakit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Dapatkan data jantina menerusi kaedah query builder
        $senaraiJantina = DB::table('jantina')
                            ->select('id', 'label')
                            ->orderBy('label', 'asc')
                            ->get();

        // $pesakit = DB::table('pesakit')->where('id', '=', $id)->first(); // LIMIT 1
        $pesakit = Pesakit::findOrFail($id);

        return view('folder-pesakit.template-edit', compact('pesakit', 'senaraiJantina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Kod asas untuk validation
        $data = $request->validate([
            'nama_pesakit' => 'required|min:3|string', // Cara pertama menulis rules
            'no_kp' => ['required', 'digits:12', 'unique:pesakit,no_kp,' . $id], // Cara kedua menulis rules
            'jantina_id' => ['required', 'integer'],
            'tarikh_lahir' => ['required'],
            'alamat' => ['sometimes', 'nullable'] // Untuk kes bagi field yang tak wajib
        ]);

        // DB::table('pesakit')->where('id', $id)->update($data);
        $pesakit = Pesakit::findOrFail($id);
        $pesakit->update($data);

        return redirect()->back()->with('mesej-berjaya', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('pesakit')->where('id', $id)->delete();
        $pesakit = Pesakit::findOrFail($id);
        $pesakit->delete();

        return redirect('/pesakit')->with('mesej-berjaya', 'Rekod berjaya dihapuskan');
    }
}
