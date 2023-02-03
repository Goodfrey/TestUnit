@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Productos</div>

                <div class="card-body">
                    <input type="text" id="identified" name="identified" readonly hidden>

                    <table class="table">
                        <thead>
                            <ul class="list-group">
                          <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Producto</th>
                            <th class="text-center" scope="col">Accion</th>
                          </tr>
                            </ul>
                        </thead>
                        <tbody>
                            @foreach ($products as $pr)
                                <tr>
                                    <th class="text-center" scope="row">{{ $pr->id }}</th>
                                    <td><ul class="list-group text-center"><li class="list-group-item">{{ $pr->name }}</li></ul></td>
                                    <td><div class="d-grid gap-2"><a class="btn btn-primary" onclick="addItem({{ $pr->id }});" type="button">Add</a></div></td>
                                </tr>
                            @endforeach
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
    let x = Math.floor((Math.random() * 10000000) + 1);
    $('#identified').val(x);
});

function addItem(id)
{
    var request = $.ajax({
        url:    '{{url('client/add')}}',
        type:   'POST',
        data:   {id:id, ident:$('#identified').val() },
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
