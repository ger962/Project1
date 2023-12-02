
@extends('Firebase.master')

@section('content')

<style>
    .tb {
        position: absolute;
        left: 250px; 
        bottom: 150px;
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
                    <h4 class="sp">Add Users
                

                        <form action="{{url('add-users')}}" method="POST">
                            @csrf
                            <label>ID</Label>
                                <input type="text" name="id">
                            <label>Image</Label>
                                <input type="text" name="imageURL">
                            <label>Role</Label>
                                <input type="text" name="role">
                            <label>Search</Label>
                                <input type="text" name="search">
                            <label>Status</label>
                                <input type="text" name="status">
                            <label>Username</label>
                                <input type="text" name="username">
                            <label>
                            <label>Verified Email</label>
                                <input type="text" name="verifiedmail">
                              <button type="submit">Save</button>
                            </form>
                    </h4>
                </div>
                <div class="position-relative">
                    
                </div>
                    <table>
                        <thead>
                            <tr>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users ?? [] as $key => $item)
                          <tr>
                            <form action="{{url('add-users')}}" method="POST">
                                @csrf
                                <label>ID</Label>
                                    <input type="text" name="Id">
                                <label>Image</Label>
                                    <input type="text" name="imageURL">
                                <label>Role</Label>
                                    <input type="text" name="role">
                                <label>Search</Label>
                                    <input type="text" name="search">
                                <label>Username</label>
                                    <input type="text" name="username">


                                </form>
                                   
                                        <form>
                                         <form action="{{url('delete-users/'.$key)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                          
                                            <a href="{{url('create')}}" class="btn btn-sm btn-primary float-end">Add Product</a>
                                        </form>
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
