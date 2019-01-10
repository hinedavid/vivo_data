<?php
namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;
use DB;

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

}
