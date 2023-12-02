@extends('Firebase.master')

@section('content')

<style>
    .tb {
        position: absolute;
        left: 250px; 
        bottom: 50px
    }
    .sp {
        position:relative;
        bottom: 20px;
    }
</style>

<div class="container">
    <div clas="row">
        <div class="col-md-12">

            @if(session('Status'))
                <h4 class="alert alert-warning mb-2">{{session('Status')}}</h4>
            @endif
           
            <div class="tb">
           
                <div class="card-header">
                    <h4 class="sp">Product List
                        <a href="{{url('add-modules')}}" class="btn btn-sm btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                <div class="position-relative">
                    
                </div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>ImageURL</th>
                                <th>Search</th>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Verified Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($modules ?? [] as $key => $item)
                          <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ isset($item['Module_ID']) ? $item['Module_ID'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModuleReaders']) ? $item['ModuleReaders'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModulePages']) ? $item['ModulePages'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModuleName']) ? $item['ModuleName'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModuleImage']) ? $item['ModuleImage'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModuleGenre']) ? $item['ModuleImage'] : 'N/A' }}</td>
                                    <td>{{ isset($item['ModuleDescription']) ? $item['ModuleDescription'] : 'N/A' }}</td>
                                    <td><a href="{{url('edit-modules/'.$key)}}" class="btn btn-sm btn-success">Edit</a></td>
                                    <td>
                                        <form>
                                         <form action="{{url('delete-modules/'.$key)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty($modules)
                                <tr>
                                    <td colspan="7">No Record</td>
                                </tr>
                                
                            @endempty
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
