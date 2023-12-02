<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class UsersController extends Controller
{

protected $database;

public function __construct(Database $database){
    $this->database = $database;
    $this->tablename = 'Users';
}

public function index(){
    $users = $this->database->getReference($this->tablename)->getValue();
    return view('Firebase.Users.index', compact('users'));
}

public function create(){
    return view('firebase.Users.create');
}
public function store(Request $request){
    $ref_tablename = 'Users';
    $postData = [
        'id' => $request->id,
        'imageURL' => $request->imageURL,
        'search' => $request->search,
        'status' => $request->status,
        'role' => $request->role,
        'username' => $request->username,
        'verifiedEmail' => $request->verifiedEmail
        
    ];
    $postRef = $this->database->getReference($this->tablename)->push($postData);
    // Return a response or redirect after storing the data
    if($postRef){
        return redirect('master')->with('Status','Product Added Succesfully');
    }else{
        return redirect('master')->with('Status','Product Not Added');
    }
}
public function edit($id){
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getvalue();
        if($editdata)
        {
        return view('firebase.Users.edit', compact('editdata', 'key'));
        }
        else
        {
            return redirect('Users')->with('Status','User Not Added');
        }
    }
}
public function update(Request $request, $id){
    $key = $id;
    $updateData = [
        'id' => $request->id,
        'imageURL' => $request->imageURL,
        'search' => $request->search,
        'status' => $request->status,
        'role' => $request->role,
        'username' => $request->username,
        'verifiedEmail' => $request->verifiedEmail
        
    ];

   $res_updated = $this->database->getReference($this->tablename. '/' .$key)->update($updateData);
   if($res_updated)
   {
    return redirect('users')->with('status', 'User Added');
   }
   else
   {
    return redirect('users')->with('status', ' Not User Added');
   }
}
public function delete($id){
   $key = $id;
   $del_data = $this->database->getReference($this->tablename. '/' .$key)->remove();
    if($del_data)
    {
        return redirect('users')->with('status');
    }else{
        return redirect('users')->with('status', 'Not User Added');
    }


}
}