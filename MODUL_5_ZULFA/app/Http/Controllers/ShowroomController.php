<?php

namespace App\Http\Controllers;

use App\Models\showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function create() {
        return view('showroom.create');
    }
    
    public function store(Request $request) { 
        
        $this->validate($request,['nama' => 'required','brand' => 'required','warna' => 'required','tipe' => 'required','harga' => 'required']);

        showroom::create(
        ['nama' => $request->nama,'brand' => $request->brand,'warna' => $request->warna,'tipe' => $request->tipe,'harga' => $request->harga]);
        
        return redirect()->route('showroom.index');
    }

    public function index() {

        $showroom = showroom::all();

        return view('showroom.index', compact('showroom'));
    }
}
