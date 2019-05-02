<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku=Buku::all();
        return view('inputs.index',compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'judul'=>'required',
          'penerbit'=>'required',
          'tahun_terbit'=>'required|integer',
          'pengarang'=>'required'
        ]);
        $buku = new Buku([
          'judul'=>$request->get('judul'),
          'penerbit'=>$request->get('penerbit'),
          'tahun_terbit'=>$request->get('tahun_terbit'),
          'pengarang'=>$request->get('pengarang'),
        ]);
        $buku->save();
        return redirect('/bukus')->with('success','Data sudah dimasukkan');
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
      $buku = Buku::find($id);

      return view('inputs.edit', compact('buku'));
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
      $request->validate([
      'judul'=>'required',
      'penerbit'=> 'required',
      'tahun_terbit' => 'required|integer',
      'pengarang' => 'required'
    ]);

    $buku = Buku::find($id);
    $buku->judul = $request->get('judul');
    $buku->penerbit = $request->get('penerbit');
    $buku->tahun_terbit = $request->get('tahun_terbit');
    $buku->pengarang = $request->get('pengarang');
    $buku->save();

    return redirect('/bukus')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //function delete
    {
      $buku = Buku::find($id);
      $buku->delete();

      return redirect('/bukus')->with('success', 'Data berhasil dihapus');
    }
}
