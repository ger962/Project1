@extends('Firebase.master')
@extends('Firebase.Modules.index')
@section('content')

<style>
    .tb {
        position: absolute;
        left: 250px; 
        bottom: 320px;
    }
    .sp {
        position:relative;
        bottom: 20px;
    }
    body {
        overflow-y: hidden;
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
                        <a href="{{url('add-users')}}" class="btn">Add Users</a>
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
                            @forelse ($users ?? [] as $key => $item)
                          <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ isset($item['id']) ? $item['id'] : 'N/A' }}</td>
                                    <td>{{ isset($item['imageURL']) ? $item['imageURL'] : 'N/A' }}</td>
                                    <td>{{ isset($item['search']) ? $item['search'] : 'N/A' }}</td>
                                    <td>{{ isset($item['status']) ? $item['status'] : 'N/A' }}</td>
                                    <td>{{ isset($item['username']) ? $item['username'] : 'N/A' }}</td>
                                    <td>{{ isset($item['verifiedEmail']) ? $item['verifiedEmail'] : 'N/A' }}</td>
                                    <td><a href="{{url('edit-users/'.$key)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{url('delete-users/'.$key)}}" class="btn btn-primary">Delete</a></td>
                                
                                    </td>
                                </tr>
                            @empty($users)
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
