<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use App\Models\transaksi_pembayaran;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $detbarang = DetailBarang::latest();

        if(request('cari')){
            $detbarang->where('nama_barang', 'like', '%' .request('cari') . '%')
                   ->orWhere('harga', 'like', '%' .request('cari') . '%');
        }

        return view('dashboard.index', [
            'detailBarang' => $detbarang->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard/tambah', [
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validatedData = $request->validate(
            [
                'nama_barang' => 'required|max:255',
                'slug' => 'required|unique:detail_barangs',
                'category_id' => 'required',
                'image' => 'image|file|max:5024',
                'harga' => 'required',
                'stok' => 'required',
                'keterangan' => 'required|max:255'
            ]);

            if($request->file('image')){
                $validatedData['image'] = $request->file('image')->store('foto-barang');
            }

            $validatedData['user_id'] = auth()->user()->id;

            DetailBarang::create($validatedData);

            alert()->success('Berhasil Menambahkan Data Barang', 'Succes');
            return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DetailBarang $detailBarang)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailBarang $detailBarang)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detailBarang $detailBarang)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailBarang  $detailBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailBarang $detailBarang)
    {
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(DetailBarang::class, 'slug', $request->nama_barang);
        return response()->json(['slug' => $slug]);
    }

    public function hapusData($id){
        
        $barang = DetailBarang::find($id);
        if($barang->image){
            Storage::delete($barang->image);
        }
        $barang->delete();

        alert()->success('Berhasil Menghapus Data Barang', 'Hapus');
        return redirect('dashboard');
    }

    public function tampiledit($id){
        $barang = DetailBarang::find($id);
        $categories = category::all();
    

        return view ('/dashboard/edit', compact('barang', 'categories'));

    }

    public function ngedit(Request $request, $id){
        $barang = DetailBarang::find($id);
        $categories = category::all();

        $rules =
            [
                'nama_barang' => 'required|max:255',
                'category_id' => 'required',
                'image' => 'image|file|max:5024',
                'harga' => 'required',
                'stok' => 'required',
                'keterangan' => 'required|max:255'
            ];

            

            if($request->id != $barang->id) {
                $rules['slug'] = 'required|unique:detail_barangs';
            }
            
        $validatedData = $request->validate($rules);

        if($request->file('image')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('foto-barang');
        }

            DetailBarang::where('id', $barang->id)->update($validatedData);


        alert()->success('Berhasil Update Data Barang', 'Update');
        return redirect('dashboard');
    }

}
