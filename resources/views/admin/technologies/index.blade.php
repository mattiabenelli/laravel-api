@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>Elenco Technlogies</h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <th>id</th>
                        <th>nome</th> 
                        <th>slug</th>     
                    </thead>
                    <tbody>
                        @foreach ($technologies as $item)
                            <tr>
                                <td>{{ $item->id }}</td> 
                                <td>{{ $item->name }}</td>   
                                <td>{{ $item->slug }}</td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>    
            </div>  
        </div>    
    </div>    
@endsection