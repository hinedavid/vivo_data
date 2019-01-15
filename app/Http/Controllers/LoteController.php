<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lote;
use App\Proveedor;
use App\Producto;
use App\Entrega;
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
        $proveedores = Proveedor::all();
        return view('lote.create')->with('proveedores', $proveedores);
    }
    
    public function delivery()
    {
        $proveedores = Proveedor::all();
        
        return view('lote.delivery')->with('proveedores', $proveedores);
    }
    
    public function store(LoteFormRequest $request)
    {
        $numerolote = $request->get('lote');
        //Acá solo valido que sea el numero de lote que no sea repetido no sé si hay que agregar algo más
        $validarLote= Lote::where('numero_lote',$request->get('lote'))
                          ->where('proveedor_id',$request->get('proveedor'))->get();

        if(count($validarLote)!=0){
          return redirect()->route('lote.create')->with(['type'=>'warning', 'status'=>'El lote ya está registrado en el sistema']);
        }
        $lote = new Lote;
        $lote->date=$request->get('date');
        $lote->numero_lote=$request->get('lote');
        $lote->cantidad=$request->get('cantidad');
        $lote->proveedor_id=$request->get('proveedor');
        $lote->producto_id=$request->get('producto');
        $lote->esta_disponible=1;
        $lote->save();
        return redirect()->route('lote.create')->with(['type'=>'success','status'=>'Se guardó exitosamente el lote: '.$lote->numero_lote]);

    }
    public function show($id)
    {
       return view ("lote.show",["lote"=>Lote::findOrFail($id)]);
    }
    
    public function registered($id)
    {
      
      $lote = Lote::where('idlote', $id)->first();
      $producto = Producto::where('idproducto', $lote->producto_idproducto)->first();
      $proveedor = Proveedor::where('idproveedor', $lote->proveedor_id)->first();
      $data = array();
      array_push($data,$proveedor->nombre,$producto->nombre, $lote->idlote, $lote->date);
      return view ("lote.registered")->with('lote', $data);
    } 
    
    public function edit($id)
    {
       return view ("lote.edit",["lote"=>Lote::findOrFail($id)]);
    }
    
    public function update(LoteFormRequest $request,$id)
    {
        $lote=Lote::findOrFail($id);
        $lote->fecha= $request->get('date');
        $lote->numero_lote=$request->get('numero_lote');
        $lote->cantidad=$request->get('cantidad');
        $lote->producto_idproducto=$request->get('producto');
        $lote->update();
        return Redirect::to('lote');
    }
    public function destroy()
    {

    }


    public function ObtenerProducto(Request $request)
    {
      //validamos que sea un llamado AJAX
      if ($request->ajax())
      {
        $this->validate($request, [
            'idproveedor' => 'required',
        ]);
        $proveedorID = $request->input('idproveedor');
        $productos= Producto::where('proveedor_id', $proveedorID)->get();
        $output = '<option value="" disabled selected>Producto</option>';
        foreach ($productos as $producto)
        {
          $output .= '<option value="'.$producto->idproducto.'">'.$producto->nombre.'</option>';
        }
        //retornamos el texto para guardarlo en el html
        return  $output;
      }
    }

    public function ObtenerMedidas(Request $request)
    {
    
      if ($request->ajax())
      {
        $this->validate($request, [
            'idproducto' => 'required',
        ]);
        $productoID = $request->input('idproducto');
        $producto = Producto::where('idproducto', $productoID)->get();
        $request->session()->put('Producto',$producto);
        $output = '<input type="text" name="cantidad" class="form-control fd-input" placeholder=" Cantidad de '. $producto->first()->medida .'">';
        return  $output;
      }
    }

    public function RealizarEntrega ()
    {
      $proveedores= DB::table('proveedores')
            ->select('proveedores.idproveedor  as idproveedor', 'proveedores.nombre as nombre')
            ->join('lotes', 'lotes.proveedor_id', '=', 'proveedores.idproveedor')
            ->where('lotes.esta_disponible', 1)
            ->groupby('proveedores.idproveedor','proveedores.nombre')
            ->distinct()->get();
      return view('lote.register_delivery')->with('proveedores', $proveedores);
    }

    public function ObtenerLotes (Request $request)
    {
      //validamos que sea un llamado AJAX
      if ($request->ajax())
      {
        $this->validate($request, [
            'idproveedor' => 'required',
        ]);
        $proveedorID = $request->input('idproveedor');
        $lotes= Lote::select(['idlote', 'numero_lote'])
                      ->where('proveedor_id', $proveedorID)
                      ->where('esta_disponible', 1)
                      ->get();
        $output = '<option value="" disabled selected>Número de lote</option>';
        foreach ($lotes as $lote)
        {
          $output .= '<option value="'.$lote->idlote.'">'.$lote->numero_lote.'</option>';
        }
        //retornamos el texto para guardarlo en el html
        return  $output;
      }
    }

    public function ObtenerNombreProductoDeLote (Request $request)
    {
      //validamos que sea un llamado AJAX
      if ($request->ajax())
      {
        $this->validate($request, [
            'idlote' => 'required',
        ]);
        $loteID = $request->input('idlote');

        $entregas= Entrega::where('lote_id',$loteID)->sum('cantidad');

        $lotes= DB::table('productos')
              ->select('productos.nombre  as nombre', 'productos.idproducto  as idproducto', 'lotes.cantidad as cantidad', 'productos.medida as medida')
              ->join('lotes', 'lotes.producto_id', '=', 'productos.idproducto')
              ->where('lotes.idlote', $loteID)
              ->first();

        $disponibilidad = $lotes->cantidad - $entregas;


        return response()->json(['nombre' => $lotes->nombre,'idproducto' => $lotes->idproducto,'medida'=> $lotes->medida, 'disponible'=>$disponibilidad]);
      }
    }


}
