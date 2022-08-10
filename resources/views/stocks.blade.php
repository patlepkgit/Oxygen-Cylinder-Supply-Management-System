

@extends('layouts.app')


@section('content')


   
    <div class="container">
        <div class="text-center">
            <h2>Oxygen Cylinder Stock</h2>
            <p></p> 
        </div>
            <table class="table table-bordered table-striped" id="datatable" >
           
                <thead class="thead-dark">
                    <tr>
                    
                    <th>Supplier Name</th>
                    <th>5 Ltr</th>
                    <th>10 Ltr</th>
                    <th>15 Ltr</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <form method="POST" action="{{ route('stocks') }}">
                @csrf
                    <tr>
                        <td>
                            <select name="supplier" id="supplier" class="form-control @error('supplier') is-invalid @enderror"  value="{{ old('supplier') }}" required autocomplete="supplier" autofocus>
                                <option value="">Select Name</option>
                                @foreach ($suppliers as $data)
                                    <option value="{{$data->name}}">
                                    {{$data->name}}
                                    </option>
                                @endforeach
                               
                            </select> 
                            @error('supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror   
                        </td>
                        <td>
                            <input type="text" name="cyl_qty_5" id="cyl_qty_5" class="form-control @error('cyl_qty_5') is-invalid @enderror"  value="{{ old('cyl_qty_5') }}" required autocomplete="cyl_qty_5" autofocus>
                            @error('cyl_qty_5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror 
                        </td>
                        <td>
                            <input type="text" name="cyl_qty_10" id="cyl_qty_10" class="form-control @error('cyl_qty_10') is-invalid @enderror"  value="{{ old('cyl_qty_10') }}" required autocomplete="cyl_qty_10" autofocus> 
                            @error('cyl_qty_10')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                        
                        </td>
                        <td>
                            <input type="text" name="cyl_qty_15" id="cyl_qty_15" class="form-control @error('cyl_qty_15') is-invalid @enderror"  value="{{ old('cyl_qty_15') }}" required autocomplete="cyl_qty_15" autofocus>
                            @error('cyl_qty_15')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                         
                        </td>
                        <td>
                        
                            <button type="submit" name="action" value="update" class="btn btn-danger"> {{ __('UPDATE') }}</button>  
                           
                        </td>
                    </tr>

                </form>
                </tbody>

                <!-- <tfoot>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="search by state.." data-column="0" />
                        </td>
                    </tr>
                    
                </tfoot> -->

            </table>
    </div>


<script>
    $(document).ready(function(){
        var table= $('#datatable').DataTable({
            'processing':true,
            'serverSide' : true,
            'ajax':"{{ url('api/search_by')}}",
            'columns':[
                {'data':'state'},
                
            ],
        });

        $('.filter-input').keyup(function(){
            table.column($(this).data('column')).search($(this).val()).draw();
        });

        $('.filter-select').change(function(){
            table.column($(this).data('column')).search($(this).val()).draw();
        });
    })

</script>

@endsection