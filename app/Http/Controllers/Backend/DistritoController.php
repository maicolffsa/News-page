<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DistritoController extends Controller
{
      
    public function __construct(){
        $this->middleware('auth');
    }

    
      public function Index(){
    	$distrito = DB::table('distritos')
    		->join('provincias','distritos.provincia_id','provincias.id')
    		->select('distritos.*','provincias.provincia_es')
    		->orderBy('id','desc')->paginate(4);
    	return view('backend.distrito.index',compact('distrito'));
    }

 public function AddDistrito(){
    	$provincia = DB::table('provincias')->get();
    	return view('backend.distrito.create',compact('provincia'));
    }


public function StoreDistrito(Request $request){

    	 $validatedData = $request->validate([
        'distrito_es' => 'required|unique:distritos|max:255',
       ]);

    	 $data = array();
    	 $data['distrito_es'] = $request->distrito_es;
    	 $data['provincia_id'] = $request->provincia_id;
    	 DB::table('distritos')->insert($data);

    	 $notification = array(
    	 	'message' => 'Distrito Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('distrito')->with($notification);
    }


  public function EditDistrito($id){
    	$distrito = DB::table('distritos')->where('id',$id)->first();
    	$provincia = DB::table('provincias')->get();
    	return view('backend.distrito.edit',compact('distrito','provincia'));

    }


    public function UpdateDistrito(Request $request,$id){

         $data = array();
    	 $data['distrito_es'] = $request->distrito_es;
    	 $data['provincia_id'] = $request->provincia_id;
    	 DB::table('distritos')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Distrito Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('distrito')->with($notification);
    }


 public function DeleteDistrito($id){
    	DB::table('distritos')->where('id',$id)->delete();

    	$notification = array(
    	 	'message' => 'Distrito Deleted Successfully',
    	 	'alert-type' => 'error'
    	 );

    	 return Redirect()->route('distrito')->with($notification);
    }





}
 