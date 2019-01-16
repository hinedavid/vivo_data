<?php
namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use App\Entrega;
use App\Lote;
use App\Miembro;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Debugbar;


class AdministrativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      /*return view ('administrativo.index'); */
      $stocks= DB::table('productos')
            ->select('proveedores.nombre as proveedor', 'productos.nombre as producto')
            ->join('proveedores', 'productos.proveedor_id', '=', 'proveedores.idproveedor')
            ->paginate(25);

      return view ('administrativo.index')->with('stocks', $stocks);

    }

    public function registrarProveedor()
    {
        return view('administrativo.registrarProveedor');
    }

    public function registrarProducto()
    {
        return view('administrativo.registrarProducto',["proveedores"=>Proveedor::all()]);
    }

    public function registrarMiembro()
    {
        return view('administrativo.registrarMiembro');
    }
    public function guardarProducto(Request $request)
    {
        $this->validate($request, [
            'proveedor' => 'required',
            'producto' => 'required',
            'medida' => 'required',
        ]);
        $producto = new Producto;
        $producto->nombre=$request->input('producto');
        $producto->proveedor_id=$request->input('proveedor');
        $producto->medida=$request->input('medida');
        $producto->es_discreta=$request->input('discreta','0');
        $producto->save();
        return redirect()->route('admin.index')->with('status','Se guardó exitosamente el producto: '.$producto->nombre);

    }
    public function guardarProveedor(Request $request)
    {
        $this->validate($request, [
            'proveedor' => 'required',
        ]);
        $proveedor = new Proveedor;
        $proveedor->nombre=$request->get('proveedor');
        $proveedor->save();
        return redirect()->route('admin.index')->with('status','Se guardó exitosamente el proveedor: '.$proveedor->nombre);
    }

    public function guardarMiembro(Request $request)
    {
        $this->validate($request, [
            'miembro' => 'required',
        ]);
        $miembro = new Miembro;
        $miembro->nombre=$request->get('miembro');
        $miembro->save();
        return redirect()->route('admin.index')->with('status','Se guardó exitosamente el miembro: '.$miembro->nombre);
    }

    public function RegistrarEntrega(Request $request)
    {
      $this->validate($request, [
          'date' => 'required',
          'recibe' => 'required',
          'entregar' => 'required',
      ]);
      $disponible = $request->session()->get('disponible');

      if($disponible == $request->input('entregar')){
        $lote = Lote::where('idlote',$request->input('lote'))
                      ->update(['esta_disponible'=> 0]);
      }

      $entrega = new Entrega;
      $entrega->fecha= $request->input('date');
      $entrega->cantidad=$request->input('entregar');
      $entrega->lote_id=$request->input('lote');
      $entrega->producto_id=$request->input('idproducto');
      $entrega->miembro_id=$request->input('recibe');
      $entrega->save();
      return redirect()->route('lote.delivery')->with(['type'=>'success','status'=>'Se guardó exitosamente la entrega']);
    }

}
