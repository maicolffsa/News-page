@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@php
  $sub = DB::table('subcategories')->where('category_id',$post->category_id)->get();

    $subdist = DB::table('distritos')->where('provincia_id',$post->provincia_id)->get();
@endphp

<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome to Easy News </h4>
                        
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
        <a href=" {{ url('/') }} " target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Vist Fontend ? </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

 

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    
 <form class="forms-sample" action="{{ route('update.post',$post->id ) }}" method="post" enctype="multipart/form-data">
  @csrf

    <div class="row">

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Title Español</label>
      <input type="text" class="form-control" id="exampleInputName1" name="title_es" value="{{ $post->title_es }}">
    </div>

  </div> <!-- End Row  --> 




 <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Category</label>
       <select class="form-control" id="exampleSelectGender" name="category_id">
   <option disabled="" selected="">--Select Category--</option>
                @foreach($category as $row)
  <option value="{{ $row->id }}"
  <?php if ($row->id == $post->category_id) {
    echo "selected"; } ?> >{{ $row->category_es  }} </option>
                @endforeach
                        </select>
    </div>

     <div class="form-group col-md-6">
      <label for="exampleInputName1">SubCategory</label>
      <select class="form-control" name="subcategory_id" id="subcategory_id">
      <option disabled="" selected="">--Select SubCategory--</option>
        
         @foreach($sub as $row)
  <option value="{{ $row->id }}"
  <?php if ($row->id == $post->subcategory_id) {
    echo "selected"; } ?> >{{ $row->subcategory_es  }} </option>
                @endforeach

                        </select>
    </div>

  </div> <!-- End Row  --> 





 <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Provincia</label>
       <select class="form-control" id="exampleSelectGender" name="provincia_id">
   <option disabled="" selected="">--Select Provincia--</option>
                @foreach($provincia as $row)
 <option value="{{ $row->id }}"
  <?php if ($row->id == $post->provincia_id) {
    echo "selected"; } ?> >{{ $row->provincia_es  }} </option>
                @endforeach
                        </select>
    </div>

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Distrito</label>
      <select class="form-control" id="distrito_id" name="distrito_id">
    <option disabled="" selected="">--Select Distrito--</option>

       @foreach($distrito as $row)
  <option value="{{ $row->id }}"
  <?php if ($row->id == $post->distrito_id) {
    echo "selected"; } ?> >{{ $row->distrito_es  }} </option>
                @endforeach
                        </select>
    </div>

  </div> <!-- End Row  --> 
 

 

<div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">News Image Upload</label>
      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Old Image</label>
      <img src="{{ URL::to($post->image)  }}" style="width: 70px; height: 50px;">
      <input type="hidden" name="oldimage" value="{{ $post->image }}">
    </div>

  </div> <!-- End Row  --> 

<div class="row">

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Tags Español</label>
      <input type="text" class="form-control" id="exampleInputName1" name="tags_es" value="{{ $post->tags_es }}">
    </div>

  </div> <!-- End Row  --> 

 <div class="form-group">
    <label for="exampleTextarea1">Details Español</label>
    <textarea class="form-control" name="details_es" id="summernote1">
       {{ $post->details_es }}
    </textarea>
                      </div>



<hr>
<h4 class="text-center">Extra Opions </h4>
<br>

<div class="row">
   
   <label class="form-check-label col-md-3">
   <input type="checkbox" name="headline" class="form-check-input" value="1" <?php if($post->headline == 1){ echo "checked";
    } ?> > Headline <i class="input-helper"></i></label>

    <label class="form-check-label col-md-3">
   <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1" <?php if($post->bigthumbnail == 1){ echo "checked";
    } ?> > General Big Thhumbnail <i class="input-helper"></i></label>

    <label class="form-check-label col-md-3">
   <input type="checkbox" name="first_section" class="form-check-input" value="1"<?php if($post->first_section == 1){ echo "checked";
    } ?> > First Section <i class="input-helper"></i></label>

    <label class="form-check-label col-md-3">
   <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1" <?php if($post->first_section_thumbnail == 1){ echo "checked";
    } ?> > First Section BigThumbnail <i class="input-helper"></i></label>
      
 
</div> <!-- End Row  -->
<br><br>
 
    <button type="submit" class="btn btn-primary mr-2">Update</button>
                     
                    </form>
                  </div>
                </div>
              </div>

<!-- 
 This is for Category  -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
                          $.each(data,function(key,value){
                              $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_es+'</option>');
                              });

                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>


<!-- 
 This is for Provincia  -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="provincia_id"]').on('change', function(){
             var provincia_id = $(this).val();
             if(provincia_id) {
                 $.ajax({
                     url: "{{  url('/get/distrito/') }}/"+provincia_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#distrito_id").empty();
                          $.each(data,function(key,value){
                              $("#distrito_id").append('<option value="'+value.id+'">'+value.distrito_es+'</option>');
                              });

                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>




@endsection