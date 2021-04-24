<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ExtraController extends Controller
{

    public function Spanish(){
      Session::get('lang');
     Session()->forget('lang');
     Session()->put('lang','spanish');
     return redirect()->back();
   }   


 public function SinglePost($id){
    $post = DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->join('subcategories','posts.subcategory_id','subcategories.id')
            ->join('users','posts.user_id','users.id')
            ->select('posts.*','categories.category_es','subcategories.subcategory_es','users.name')
            ->where('posts.id',$id)->first();
            return view('main.single_post',compact('post'));

 }


  public function CatPost($id, $category_es){
    $catposts = DB::table('posts')->where('category_id',$id)->orderBy('id','desc')->paginate(5);
    return view('main.allpost',compact('catposts'));

  }


  public function SubCatPost($id, $subcategory_es){
     $subcatposts = DB::table('posts')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(5);
    return view('main.subpost',compact('subcatposts'));
  }


  public function GetSubDist($provincia_id){
      $sub = DB::table('distrito')->where('provincia_id',$provincia_id)->get();
      return response()->json($sub);
  }


  public function SearchProvincia(Request $request){
    $provid = $request->provincia_id;
    $distritid = $request->distrito_id;


  $catposts = DB::table('posts')->where('provincia_id',$provid)->where('distrito_id',$distritid)->orderBy('id','desc')->paginate(5);
    return view('main.allpost',compact('catposts'));

  }







}
 