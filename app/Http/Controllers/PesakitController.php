<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $senaraiPesakit = [
            ['id' => 1, 'nama' => 'Ali Bin Abu', 'nokp' => '808080808080'],
            ['id' => 2, 'nama' => 'Ahmad Bin Abu', 'nokp' => '7070707070770'],
            ['id' => 3, 'nama' => 'Jamal Bin Abu', 'nokp' => '808080808080'],
            ['id' => 4, 'nama' => 'Siti Bin Abu', 'nokp' => '808080808080'],
            ['id' => 5, 'nama' => 'Ah Leong Bin Abu', 'nokp' => '808080808080'],
            ['id' => 6, 'nama' => 'Sammy Bin Abu', 'nokp' => '808080808080'],
            ['id' => 7, 'nama' => 'John Bin Abu', 'nokp' => '808080808080'],
            ['id' => 8, 'nama' => 'Smith Bin Abu', 'nokp' => '808080808080'],
            ['id' => 9, 'nama' => 'Maria Bin Abu', 'nokp' => '808080808080'],
            ['id' => 10, 'nama' => 'Ipin Bin Abu', 'nokp' => '808080808080'],
        ];

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
        return view('folder-pesakit.template-daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}