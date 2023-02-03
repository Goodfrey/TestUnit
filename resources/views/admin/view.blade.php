@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-xxl bd-gutter">
                    <div class="col-md-8 mx-auto text-center">
                        <h1 class="mb-3 fw-semibold lh-1">Desglose de Factura</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Impuesto</th>
                                <th class="text-center">Fecha</th>
                            </tr>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Producto 1</td>
                                    <td>10.00</td>
                                    <td>2.50</td>
                                    <td>2023-02-03</td>
                                </tr>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Producto 1</td>
                                    <td>10.00</td>
                                    <td>2.50</td>
                                    <td>2023-02-03</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Subtotal</strong></td>
                                    <td>20.00</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Import</strong></td>
                                    <td>5.00</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                    <td>25.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script type="text/javascript">

    $( document ).ready(function() {
    });

</script>

@endsection
