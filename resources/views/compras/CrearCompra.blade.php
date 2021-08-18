@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
    <div class="modal fadeOutUpBig"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         id="myModal" aria-hidden="true"
         role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d152a;color: white">
                    <h5 class="modal-title">Error al ingresas detalles compra favor revise los siguientes datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>1 - El precio de compras debe ser menor que el de venta.</h6>
                    <h6>2 - Debe completar todos los campos.</h6>
                    <h6>3 - La cantidad debe ser mayor a 0.</h6>
                </div>
                <div class="modal-footer" style="background-color: #dbdbdc">
                    <button type="button" class="btn btn-outline-primary" style="border-radius: 10px" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

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
                        id_producto=parseInt($("#pid_producto").val());
                        producto=$("#pid_producto option:selected").text();
                        cantidad=$("#pcantidad").val();
                        costo_compra= parseFloat($("#pcosto_compra").val());
                        costo_venta= parseFloat($("#pcosto_venta").val());

                        if(id_producto > "" && costo_compra > 0 && costo_compra < costo_venta && cantidad > 0){
                            sub_total[cont]=(cantidad*costo_compra);
                            total=total+sub_total[cont];
                            var fila = '<tr class="selected" id="fila'+cont+'" >' +
                                '<td><button class="btn btn-warning btn-sm" type="botton" onclick="eliminar('+cont+');" >X</button></td>' +
                                '<td><input type="hidden" style="text-align: center" name="id_producto[]" value="'+id_producto+'">'+producto+'</td>'+
                                '<td><input type="hidden" style="text-align: center" name="costo_compra[]" value="'+costo_compra+'">'+costo_compra+'</td>'+
                                '<td><input type="hidden" style="text-align: center" name="costo_venta[]" value="'+costo_venta+'">'+costo_venta+'</td>'+
                                '<td><input type="hidden" style="text-align: center" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>'+
                                '<td>'+sub_total[cont]+'</td>'+
                                '</tr>'
                            cont++;
                            limpiar();
                            $("#total").html("L/."+total);
                            evaluar();
                            $("#detalles").append(fila);
                        }else {
                                $(function (){
                                    $('#myModal').modal();
                                });
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
