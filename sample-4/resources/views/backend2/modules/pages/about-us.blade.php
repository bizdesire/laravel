@extends('backend.layouts.layoutNew')
@section('content')
<div class="m-c-heading">
  <h2>{{$data->page_title}}</h2>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li> 
      <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
  </nav>
  <a href="{{route('admin.pages.index')}}" class="main-button m-b-rounded" title="view List">
    <span class="material-icons">visibility</span>
  </a>
</div>


<div class="wrapper-shadow-inset">

  <form class="form-edit-category" name="addCategory" role="form" method="post" id="categoryForm"  
  enctype="multipart/form-data">
   @csrf

     @include('backend.error_message')
     <div class="row">
          <div class="col-md-12"> 
               <div class="card-box">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row"> 
                                <div class="col-sm-12 ">
                                   <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Main Section</h5>
                                </div>
                            <div class="col-sm-6 ">
                                <div class="form-group"  >
                                    <label>Main heading</label>
                                    <input type="text" name="mainHeading" value="{{$content->mainHeading ?? ''}}" class="form-control" required>
                                </div>
                            </div> 
                            <div class="col-sm-6 ">
                                <div class="form-group"  >
                                    <label>Main Heading Tagline</label>
                                    <input type="text" name="mainHeadingTagline" value="{{$content->mainHeadingTagline ?? ''}}" class="form-control" required>
                                </div>
                            </div> 
                            <div class="col-sm-12 ">
                                <div class="form-group"  >
                                    <label>Our History / Our Story</label>
                                    <textarea name="ourHistory" class="form-control" required><?= $content->ourHistory ?? '' ?></textarea>
                                </div>
                            </div> 


                            </div>


                            <div class="row"> 
                                <div class="col-sm-12 ">
                                   <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Complete Projects Section</h5>
                                </div>
                                <div class="col-sm-4"> 
                                    <div class="card"> 
                                        <div class="card-body">
                                            <div class="form-group"> 
                                                <label>Value</label>
                                                <input type="text" name="projectDetailValueFirst" value="{{$content->projectDetailValueFirst ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"> 
                                                <label>Title</label>
                                                <input type="text" name="projectDetailTitleFirst" value="{{$content->projectDetailTitleFirst ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="projectDetailDescriptionFirst" class="form-control" required><?= $content->projectDetailDescriptionFirst ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 

                                <div class="col-sm-4"> 
                                    <div class="card"> 
                                        <div class="card-body">
                                            <div class="form-group"> 
                                                <label>Value</label>
                                                <input type="text" name="projectDetailValueSecond" value="{{$content->projectDetailValueSecond ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"> 
                                                <label>Title</label>
                                                <input type="text" name="projectDetailTitleSecond" value="{{$content->projectDetailTitleSecond ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="projectDetailDescriptionSecond" class="form-control" required><?= $content->projectDetailDescriptionSecond ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 

                                <div class="col-sm-4"> 
                                    <div class="card"> 
                                        <div class="card-body">
                                            <div class="form-group"> 
                                                <label>Value</label>
                                                <input type="text" name="projectDetailValueThird" value="{{$content->projectDetailValueThird ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"> 
                                                <label>Title</label>
                                                <input type="text" name="projectDetailTitleThird" value="{{$content->projectDetailTitleThird ?? ''}}" class="form-control" required>
                                            </div>
                                            <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="projectDetailDescriptionThird" class="form-control" required><?= $content->projectDetailDescriptionThird ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 
                                
                            </div>

 
                            <div class="row"> 
                                <div class="col-sm-12"> 
                                <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Our Mission / Vision</h5>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group"  >
                                        <label>Title</label>
                                        <input type="text" name="visionHeadingTitle" value="{{$content->visionHeadingTitle ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-sm-6 ">
                                    <div class="form-group"  >
                                        <label>Tagline</label>
                                        <input type="text" name="visionHeadingTagline" value="{{$content->visionHeadingTagline ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                           <div class="form-group"  >
                                                <label>Our Mission</label>
                                                <textarea name="ourMission" class="form-control" required><?= $content->ourMission ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 
                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                           <div class="form-group"  >
                                                <label>Our Vision</label>
                                                <textarea name="ourVision" class="form-control" required><?= $content->ourVision ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div>  
                            </div>


                            <div class="row"> 
                                <div class="col-sm-12"> 
                                <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Join Cortex</h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group"  >
                                        <label>Title</label>
                                        <input type="text" name="joinHeadingTitle" value="{{$content->joinHeadingTitle ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-sm-12 ">
                                    <div class="form-group"  >
                                        <label>Tagline</label>
                                        <input type="text" name="joinHeadingTagline" value="{{$content->joinHeadingTagline ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                            <div class="form-group"  >
                                                <label>Title</label>
                                                <input type="text" name="joinSectionOneTitle" value="{{$content->joinSectionOneTitle ?? ''}}" class="form-control" required>
                                            </div>
                                           <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="joinSectionOneDescription" class="form-control" required><?= $content->joinSectionOneDescription ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 
                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                            <div class="form-group"  >
                                                <label>Title</label>
                                                <input type="text" name="joinSectionTwoTitle" value="{{$content->joinSectionTwoTitle ?? ''}}" class="form-control" required>
                                            </div>
                                           <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="joinSectionTwoDescription" class="form-control" required><?= $content->joinSectionTwoDescription ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 

                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                            <div class="form-group"  >
                                                <label>Title</label>
                                                <input type="text" name="joinSectionThreeTitle" value="{{$content->joinSectionThreeTitle ?? ''}}" class="form-control" required>
                                            </div>
                                           <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="joinSectionThreeDescription" class="form-control" required><?= $content->joinSectionThreeDescription ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 

                                <div class="col-sm-6"> 
                                    <div class="card mt-3"> 
                                        <div class="card-body">
                                            <div class="form-group"  >
                                                <label>Title</label>
                                                <input type="text" name="joinSectionFourTitle" value="{{$content->joinSectionFourTitle ?? ''}}" class="form-control" required>
                                            </div>
                                           <div class="form-group"  >
                                                <label>Description</label>
                                                <textarea name="joinSectionFourDescription" class="form-control" required><?= $content->joinSectionFourDescription ?? '' ?></textarea>
                                            </div>
                                        </div>
                                   </div> 
                                </div> 
                                   
                            </div>


                            <div class="row"> 
                                <div class="col-sm-12"> 
                                <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Our Team</h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group"  >
                                        <label>Title</label>
                                        <input type="text" name="ourTeamTitle" value="{{$content->ourTeamTitle ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="col-sm-12 ">
                                    <div class="form-group"  >
                                        <label>Tagline</label>
                                        <input type="text" name="ourTeamTagline" value="{{$content->ourTeamTagline ?? ''}}" class="form-control" required>
                                    </div>
                                </div> 
                                
                            </div>
                        </div> 
                        <div class="col-sm-12 mt-2"> 
                            <button type="submit" id="categoryFormSbt" class="main-button btn-submit btn-form-submit">Submit</button>
                        </div>
                    </div>
               </div> 
      </div> 
  </form> 
</div>
 
@endsection 
@section('scripts')
<script type="text/javascript" src="{{url('/admin-vue/scripts/admin/croppie.js')}}"></script>
<script type="text/javascript" src="{{url('/admin-vue/scripts/admin/blog.js')}}"></script>
<script type="text/javascript">
  
</script>
@endsection

