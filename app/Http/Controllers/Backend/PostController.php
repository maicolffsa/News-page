<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class PostController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  
	public function index(){
		$post = DB::table('posts')
			->join('categories','posts.category_id','categories.id')
			->join('subcategories','posts.subcategory_id','subcategories.id')
			->join('provincias','posts.provincia_id','provincias.id')
			->join('distritos','posts.distrito_id','distritos.id')
			->select('posts.*','categories.category_es','subcategories.subcategory_es','provincias.provincia_es','distritos.distrito_es')
			->orderBy('id','desc')->paginate(10);
			return view('backend.post.index',compact('post'));

	}

 



    public function Create(){

    	$category = DB::table('categories')->get();
    	$provincias = DB::table('provincias')->get();
		$distritos = DB::table('distritos')->get();
    	return view('backend.post.create',compact('category','provincias', 'distritos'));

    }


  public function StorePost(Request $request){

  	 $validatedData = $request->validate([
        'category_id' => 'required',
        'provincia_id' => 'required',
       ]);


  	 $data = array();
  	 $data['title_es'] = $request->title_es;
  	 $data['user_id'] = Auth::id();
  	 $data['category_id'] = $request->category_id;
  	 $data['subcategory_id'] = $request->subcategory_id;
  	 $data['provincia_id'] = $request->provincia_id;
  	 $data['distrito_id'] = $request->distrito_id;
  	 $data['tags_es'] = $request->tags_es;
  	 $data['details_es'] = $request->details_es;
  	 $data['headline'] = $request->headline;
  	 $data['first_section'] = $request->first_section;
  	 $data['first_section_thumbnail'] = $request->first_section_thumbnail;
     $data['bigthumbnail'] = $request->bigthumbnail;
  	 $data['post_date'] = date('d-m-Y');
  	 $data['post_month'] = date("F");


  	 $image = $request->image;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
  	 		$data['image'] = 'image/postimg/'.$image_one;
  	 		// image/postimg/343434.png
  	 		DB::table('posts')->insert($data);

  	 		$notification = array(
    	 	'message' => 'Post Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('all.post')->with($notification);
  	 	
  	 	}else{
  	 		return Redirect()->back();
  	 	} // End Condition


  }  // END Method 




  public function EditPost($id){

  	$post = DB::table('posts')->where('id',$id)->first();
  	$category = DB::table('categories')->get();
  	$provincia = DB::table('provincias')->get();
	$distrito = DB::table('distritos')->get();
  	return view('backend.post.edit',compact('post','category','provincia', 'distrito'));

  }


  public function UpdatePost(Request $request, $id){
     
     $data = array();
  	 $data['title_es'] = $request->title_es;
  	 $data['user_id'] = Auth::id();
  	 $data['category_id'] = $request->category_id;
  	 $data['subcategory_id'] = $request->subcategory_id;
  	 $data['provincia_id'] = $request->provincia_id;
  	 $data['distrito_id'] = $request->distrito_id;
  	 $data['tags_es'] = $request->tags_es;
  	 $data['details_es'] = $request->details_es;
  	 $data['headline'] = $request->headline;
  	 $data['first_section'] = $request->first_section;
  	 $data['first_section_thumbnail'] = $request->first_section_thumbnail;
     $data['bigthumbnail'] = $request->bigthumbnail;
 

     $oldimage = $request->oldimage;
  	 $image = $request->image;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
  	 		$data['image'] = 'image/postimg/'.$image_one;
  	 		// image/postimg/343434.png
  	 		DB::table('posts')->where('id',$id)->update($data);
  	 		unlink($oldimage);

  	 		$notification = array(
    	 	'message' => 'Post Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('all.post')->with($notification);
  	 	
  	 	}else{
  	 		$data['image'] = $oldimage;
  	 		DB::table('posts')->where('id',$id)->update($data);
  	 		 
  	 		$notification = array(
    	 	'message' => 'Post Updated Successfully',
    	 	'alert-type' => 'success'
    	 );
         return Redirect()->route('all.post')->with($notification);
  	 	} // End Condition
  }  // End Method
 


 public function DeletePost($id){
 	$post = DB::table('posts')->where('id',$id)->first();
 	unlink($post->image);

 	DB::table('posts')->where('id',$id)->delete();

 	$notification = array(
    	 	'message' => 'Post Deleted Successfully',
    	 	'alert-type' => 'error'
    	 );

    	 return Redirect()->route('all.post')->with($notification);
 }



  public function GetSubCategory($category_id){
  $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
  return response()->json($sub);

    }


  public function GetDistrito($provincia_id){
  $sub = DB::table('distritos')->where('provincia_id',$provincia_id)->get();
  return response()->json($sub);

    }





}
