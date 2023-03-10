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
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Impuesto</th>
                            </tr>
                            <tbody>
                                @php $imp=0; $sub=0; $total=0 @endphp
                                @foreach ($data as $in)
                                    <tr class="text-center">
                                        <td>{{ $in->id }}</td>
                                        <td>{{ $in->date}}</td>
                                        <td>{{ $in->name}}</td>
                                        <td>{{ $in->sub}}</td>
                                        <td>{{ $in->imp}}</td>
                                        @php
                                            $imp += $in->imp;
                                            $sub += $in->sub;
                                            $total += ($in->imp + $in->sub);
                                        @endphp 
                                    </tr>
                                @endforeach
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Subtotal</strong></td>
                                    <td>{{ $sub }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Import</strong></td>
                                    <td>{{ $imp }}</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                    <td>{{ $total }}</td>
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
