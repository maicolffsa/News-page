<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProvinciaController extends Controller
{

        public function __construct(){
        $this->middleware('auth');
    }

    
        public function Index(){
    	$provincia = DB::table('provincias')->orderBy('id','desc')->paginate(3);
    	return view('backend.provincia.index',compact('provincia'));
    }


        public function AddProvincia(){
    	return view('backend.provincia.create');
    }


    public function StoreProvincia(Request $request){

    	 $validatedData = $request->validate([
        'provincia_es' => 'required|unique:provincias|max:255',
       ]);

    	 $data = array();
    	 $data['provincia_es'] = $request->provincia_es;
    	 DB::table('provincias')->insert($data);

    	 $notification = array(
    	 	'message' => 'Provincia Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('provincia')->with($notification);
    }



  public function EditProvincia($id){
    	$provincia = DB::table('provincias')->where('id',$id)->first();
    	return view('backend.provincia.edit',compact('provincia'));
    }



public function UpdateProvincia(Request $request,$id){

    	 $data = array();
    	 $data['provincia_es'] = $request->provincia_es;
    	 DB::table('provincias')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Provincia Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('provincia')->with($notification);

    }


public function DeleteProvincia($id){
    	DB::table('provincias')->where('id',$id)->delete();

    	$notification = array(
    	 	'message' => 'Provincia Deleted Successfully',
    	 	'alert-type' => 'error'
    	 );

    	 return Redirect()->route('provincia')->with($notification);
    }





} 
