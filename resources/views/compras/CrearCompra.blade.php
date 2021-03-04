@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
            @yield('contenido')
            @push('scripts')
                <script>
                    $(document).ready(function(){
                        $('#bt_add').click(function (){
                            agregar();
                        })
                    })
                    var cont =0;
                    total=0;
                    sub_total=[];

                    $("#guardar").hide();
                    function agregar(){
                        id_producto=$("#pid_producto").val();
                        producto=$("#pid_producto option:selected").text();
                        cantidad=$("#pcantidad").val();
                        costo_compra=$("#pcosto_compra").val();
                        costo_venta=$("#pcosto_venta").val();

                        if(id_producto != "" && costo_compra != "" && costo_venta!="" && cantidad>0){
                            sub_total[cont]=(cantidad*costo_compra);
                            total=total+ sub_total[cont];
                            var fila = '<tr class="selected" id="fila'+cont+'" >' +
                                '<td><button class="btn btn-warning btn-sm" type="botton" onclick="eliminar('+cont+');" >X</button></td>' +
                                '<td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td>'+
                                '<td><input type="hidden" name="costo_compra[]" value="'+costo_compra+'">'+costo_compra+'</td>'+
                                '<td><input type="hidden" name="costo_venta[]" value="'+costo_venta+'">'+costo_venta+'</td>'+
                                '<td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>'+
                                '<td>'+sub_total[cont]+'</td>'+
                                '</tr>'
                            cont++;
                            limpiar();
                            $("#total").html("L/."+total);
                            evaluar();
                            $("#detalles").append(fila);
                        }else {
                            alert("error al ingresas detalles compra favor revise los datos compra");
                        }
                    }
                    function evaluar(){
                        if(total>0){
                            $("#guardar").show();
                        }else{
                            $("#guardar").hide();
                        }
                    }
                    function limpiar(){
                        $("#pcosto_compra").val("");
                        $("#pcosto_venta").val("");
                        $("#pcantidad").val("");
                    }
                    function eliminar(index){
                        total=total-sub_total[index];
                        $("#total").html("L/."+total);
                        $("#fila"+index).remove();
                        evaluar();
                    }
                </script>
    @endpush
@endsection
