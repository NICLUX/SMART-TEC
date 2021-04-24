<?php

namespace App\Http\Livewire;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use IntlChar;
use Livewire\Component;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use function Symfony\Component\String\s;

class CrearVenta extends Component
{
    public $clientes;
    public $users;
    public $id_cliente;
    public $id_usuario;
    public $fecha_venta;
    public $total_venta;
    public $id_productos;
    public $id_producto;
    public $productos;
    public $id_venta;
    public $cantidad;
    public $productos_en_cola;
    public function render()
    {
        $this->productos = Producto::orderBy("nombre", "ASC")->get();
        return view('livewire.ventas.crear-venta')
            ->extends("layouts.main")
            ->section("content");
    }
    public function mount()
    {
        $this->clientes = Cliente::orderBy("nombre", "ASC")->get();
        $this->users = User::orderBy("id", "ASC")->get();
        $this->fecha_venta = date("Y-m-d");
        $this->productos = Producto::orderBy("nombre", "ASC")->get();
        $this->calcularTotalPagar();
        $this->cargarProductoEnCola();
    }
    public function cargarProductoEnCola()
    {
        if ($this->id_venta){
            $this->productos_en_cola=DetalleVenta::where("id_venta","=",$this->id_venta)->get();
        }
    }
    public function agregarProducto()
    {
        $this->validate([
            "id_cliente" => "required",
            "cantidad"=>"required",
            "id_producto"=>"required"
        ], [
            "id_cliente.required" => "Se requiere seleccionar el cliente",
            "cantidad.required"=>"Se requiere ingresar la cantidad",
            "id_producto.required"=>"Se requiere seleccionar el producto"
        ]);
        if ($this->id_venta) {
            $detalleVenta = new DetalleVenta();
            $detalleVenta->id_producto = $this->id_producto;
            $detalleVenta->id_venta = $this->id_venta;
            $producto = Producto::findOrFail($this->id_producto);
            $inventario = Inventario::firstWhere('id_producto',$this->id_producto);
            if ($producto->en_stock>= $this->cantidad) {
                $detalleVenta->costo_compra = $producto->costo_compra;
                $detalleVenta->costo_venta = $producto->costo_venta;
                $detalleVenta->cantidad = $this->cantidad;
                $inventario->cantidad = (int)$inventario->cantidad - (int)$this->cantidad;
                $inventario->save();
        
                $detalleVenta->save();
                $this->calcularTotalPagar();
                $this->cargarProductoEnCola();
                $this->limpiar();
                $this->productos = Producto::orderBy("nombre", "ASC")->get();
                session()->flash("exito", "Se agregó el producto a la venta");
            }else{
                $this->addError("cantidad",
                    "No se puede agregar el producto porque no hay suficientes unidades en Stock. Solo puede vender ".$producto->en_stock." unidades.");

            }
        } else {
            //Si no se ha creado el primer registro se debe crear la venta padre primero
            $nuevaVenta = new Venta();
            $nuevaVenta->id_cliente = $this->id_cliente;
            $nuevaVenta->fecha_venta = $this->fecha_venta;
            $nuevaVenta->total_venta = 0;
            $nuevaVenta->id_usuario = 1;
            $nuevaVenta->save();
            $this->id_venta = $nuevaVenta->id;
            //-----Una vez creada la venta padre se registra la primera venta
            $detalleVenta = new DetalleVenta();
            $detalleVenta->id_producto = $this->id_producto;
            $detalleVenta->id_venta = $this->id_venta;

            $producto = Producto::findOrFail($this->id_producto);
            $inventario = Inventario::firstWhere('id_producto',$this->id_producto);
            if ($producto->en_stock>=$this->cantidad){
                $detalleVenta->costo_compra = $producto->costo_compra;
                $detalleVenta->costo_venta = $producto->costo_venta;
                $detalleVenta->cantidad = $this->cantidad;
                $detalleVenta->save();
                $inventario->cantidad = (int)$inventario->cantidad - (int)$this->cantidad;
                $inventario->save();
        
                $this->calcularTotalPagar();
                $this->limpiar();
                $this->cargarProductoEnCola();
                $this->productos = Producto::orderBy("nombre", "ASC")->get();
                session()->flash("exito", "Se agregó el producto a la venta");
            }else{
                $this->addError("cantidad",
                    "No se puede agregar el producto porque no hay suficientes unidades en Stock. Solo puede vender ".$producto->en_stock." unidades.");
            }
        }
    }
    public function calcularTotalPagar()
    {
        if ($this->id_venta) {
            $this->total_venta = DB::table("detalle_ventas")
                ->select(DB::raw("sum(costo_venta * cantidad) as venta"))
                ->where("id_venta", "=", $this->id_venta)
                ->value("venta");
                
        } else {
            $this->total_venta = 0.00;
        }
        $this->productos = Producto::orderBy("nombre", "ASC")->get();
    }
    public function limpiar()
    {
        $this->cantidad = "";
        $this->id_producto = "";
    }
    public function eliminarProductoCola($id){
        $detalle = DetalleVenta::findOrFail($id);
        $inventario = Inventario::firstWhere('id_producto',$detalle->id_producto);
        $inventario->cantidad = (int)$inventario->cantidad + (int)$detalle->cantidad;
        $inventario->save();

        $detalle->delete();
        session()->flash("exito","Se eliminó correctamente el producto de la venta.");
        $this->cargarProductoEnCola();
        $this->calcularTotalPagar();
    }
    public function guardarVenta()
    {
       
        return redirect()->route("venta.nuevo");
    }
}
