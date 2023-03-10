@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-xxl bd-gutter">
                    <div class="col-md-8 mx-auto text-center">
                    <h1 class="mb-3 fw-semibold lh-1">Sistema de Facturaci&oacute;n</h1>
                    <div class="d-grid gap-2"><a class="btn btn-primary" onclick="generateInvoices()" type="button">Generar</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                @if ($invoices != '')
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

                                    @foreach ($invoices as $in)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $in->id }}</th>
                                            <td><ul class="list-group text-center"><li class="list-group-item">{{ $in->identified }}</li></ul></td>
                                            <td><ul class="list-group text-center"><li class="list-group-item">{{ $in->shopping->user->name }}</li></ul></td>
                                            <td><ul class="list-group text-center"><li class="list-group-item">{{ $in->shopping->status->name }}</li></ul></td>
                                            <td><div class="d-grid gap-2"><a class="btn btn-primary" onclick="viewInfo({{ $in->identified }});" type="button">View</a></div></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

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

    function generateInvoices()
    {
        var request = $.ajax({
            url:    '{{url('admin/invoices')}}',
            type:   'GET',
            headers:{
                'X-CSRF-TOKEN': 	$('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 	'application/x-www-form-urlencoded'
            }
        });
        request.done(function(data){
            window.alert(data.message);
        })
        request.fail(function(response)
        {
            window.alert(JSON.parse(response.responseText).message);
        });
        return false;
    }

</script>

@endsection
