<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class ModulesController extends Controller
{

protected $database;

public function __construct(Database $database){
    $this->database = $database;
    $this->tablename = 'Modules';

}

public function index(){
    $modules = $this->database->getReference($this->tablename)->getValue();
    return view('Firebase.Modules.index', compact('modules'));
    
}

public function create(){
    return view('Firebase.Modules.create');
}

public function store(Request $request){
    $postData = [
        'Module_ID' => $request->Module_ID,
        'ModuleReaders' => $request->ModuleReaders,
        'ModulePages' => $request->ModulePages,
        'ModuleName' => $request->ModuleName,
        'ModuleImage' => $request->ModuleImage,
        'ModuleGenre' => $request->ModuleGenre,
        'ModuleDescription' => $request->ModuleDescription
    ];
    $postRef = $this->database->getReference($this->tablename)->push($postData);
    // Return a response or redirect after storing the data
    if($postRef){
        return redirect('Firebase.Modules.index')->with('Status','Product Added Succesfully');
    }else{
        return redirect('Firebase.Modules.index')->with('Status','Product Not Added');
    }
}
public function edit($Module_ID){
    $key = $Module_ID;
    $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
    if($editdata){
        return view ('Firebase.Modules.index',compact('editdata','key'));
    }else{
        return view ('Firebase.Modules.index')->with('Status','Product failed to updated');

    }
}
public function update(Request $request, $Module_ID){
    $key = $Module_ID;
    $updatedata = [
        'Module_ID' => $request->Module_ID,
        'ModuleReaders' => $request->ModuleReaders,
        'ModulePages' => $request->ModulePages,
        'ModuleName' => $request->ModuleName,
        'ModuleImage' => $request->ModuleImage,
        'ModuleGenre' => $request->ModuleGenre,
        'ModuleDescription' => $request->ModuleDescription
    ];
    $resupdate = $this->database->getReference($this->tablename.'/'.$key)->update($updatedata);
    if($resupdate){
        return redirect('Firebase.Modules.index')->with('Status','Product Updated Succesfully');
    }else{
        return redirect('Firebase.Modules.index')->with('Status','Product Failed to Updated');
    }
}
public function delete($id){
    $key = $Module_ID;
    $delete_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
    if($delete_data){
        return redirect('Firebase.Modules.index')->with('Status','Product Deleted Succesfully');
    }else{
        return redirect('Firebase.Modules.index')->with('Status','Product Failed to Delete');
    }


}
}