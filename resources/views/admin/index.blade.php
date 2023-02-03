@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-xxl bd-gutter">
                    <div class="col-md-8 mx-auto text-center">
                    <h1 class="mb-3 fw-semibold lh-1">Sistema de Facturaci&oacute;n</h1>
                    <div class="d-grid gap-2"><a class="btn btn-primary" type="button">Generar</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Facturas Procesadas</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <ul class="list-group">
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Factura</th>
                                <th class="text-center" scope="col">Usuario</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">View</th>
                            </tr>
                                </ul>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td><ul class="list-group text-center"><li class="list-group-item">123</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Luis Campos</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Procesado</li></ul></td>
                                <td><div class="d-grid gap-2"><a class="btn btn-primary" onclick="viewInfo(123);" type="button">View</a></div></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">2</th>
                                <td><ul class="list-group text-center"><li class="list-group-item">456</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Luis Campos</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Procesado</li></ul></td>
                                <td><div class="d-grid gap-2"><a class="btn btn-primary" onclick="viewInfo(456);" type="button">View</a></div></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">3</th>
                                <td><ul class="list-group text-center"><li class="list-group-item">789</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Luis Campos</li></ul></td>
                                <td><ul class="list-group text-center"><li class="list-group-item">Procesado</li></ul></td>
                                <td><div class="d-grid gap-2"><a class="btn btn-primary" onclick="viewInfo(789);" type="button">View</a></div></td>
                            </tr>
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
        console.log( "ready!" );
    });

    function viewInfo(id)
    {
        window.location.href = '/admin/view/'+id+'';
    }

</script>

@endsection
