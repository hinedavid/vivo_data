<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lote;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoteFormRequest;
use DB;

class LoteController extends Controller
{
    public function __construct()
    {
        
        
    }
    public function index(Request $request)
    {
        if($request)
        {
           $query=trim($request->get('searchText'));
           $lotes =DB::table('lotes')->where('cantidad', 'LIKE', '%'.$query.'%')
           ->orderBy('idlote','desc')
           ->paginate(10);
           return view('lote.index',["lotes"=>$lotes,"searchText"=>$query]);
            
        }
    }
    public function create()
    {
        return view('lote.create');
    }
    public function store(LoteFormRequest $request)
    {
        $lote = new Lote;
        $lote->date=$request->get('date');
        $lote->numero_lote=$request->get('numero_lote');
        $lote->cantidad=$request->get('cantidad');
        $lote->proveedor_id=$request->get('proveedor');
        $lote->producto_idproducto=$request->get('producto');
        $lote->save();
        
    }
    public function show($id)
    {
       return view ("lote.show",["lote"=>Lote::findOrFail($id)]); 
    }
    public function edit($id)
    {
       return view ("lote.edit",["lote"=>Lote::findOrFail($id)]);  
    }
    public function update(LoteFormRequest $request,$id)
    {
        $lote=Lote::findOrFail($id);
        $lote->fecha=$request->get('date');
        $lote->numero_lote=$request->get('numero_lote');
        $lote->cantidad=$request->get('cantidad');
        $lote->producto_idproducto=$request->get('producto');
        $lote->update();
        return Redirect::to('lote');
    }
    public function destroy()
    {
        
    }
}
