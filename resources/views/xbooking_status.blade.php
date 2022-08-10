

@extends('layouts.app')


@section('content')


<div class="container">
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search by name" value="{{ old('q') }}" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="fas fa-search"></span>
            </button>
        </span>
    </div>
    @if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
    @endif
</form>

<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Booking details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cylinder_qty</th>
                <th>Supplier Name</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->cylinder_qty}}</td>
                <td>{{$user->supplier_name}}</td>
                <td>{{$user->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</div>


<script>
    // $(document).ready(function(){
    //     var table= $('#datatable').DataTable({
    //         'processing':true,
    //         'serverSide' : true,
    //         'ajax':"{{ url('api/search_by')}}",
    //         'columns':[
    //             {'data':'state'},
                
    //         ],
    //     });

    //     $('.filter-input').keyup(function(){
    //         table.column($(this).data('column')).search($(this).val()).draw();
    //     });

    //     $('.filter-select').change(function(){
    //         table.column($(this).data('column')).search($(this).val()).draw();
    //     });
    // })
</script>

@endsection