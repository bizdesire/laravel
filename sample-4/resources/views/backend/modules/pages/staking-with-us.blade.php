@extends('backend.layouts.layoutNew')
@section('content')
    <div class="m-c-heading">
        <h2>{{ $data->page_title }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <a href="{{ route('admin.pages.index') }}" class="main-button m-b-rounded" title="view List">
            <span class="material-icons">visibility</span>
        </a>
    </div>
    <?php
    
    $icons = ['Support', 'Health', 'Network', 'Global', 'Hosting'];
    
    ?>

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
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="mainTitle" value="{{ $content->mainTitle ?? '' }}"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Tagline</label>
                                            <input type="text" name="mainTagline"
                                                value="{{ $content->mainTagline ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="mainDescription" class="form-control" required><?= $content->mainDescription ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>








                              

                                <div class="row">
                                    <div class="col-6">

                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Terms & Requirements</h5>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="termTitle" value="{{ $content->termTitle ?? '' }}"
                                                        class="form-control" required>
                                                </div>
                                            </div>
        
                                            <div class="col-sm-6 ">
                                                <div class="form-group">
                                                    <label>Tagline</label>
                                                    <input type="text" name="termTagline"
                                                        value="{{ $content->termTagline ?? '' }}" class="form-control" required>
                                                </div>
                                            </div>
        
                                        </div>

                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Requirements for staking</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-12" id="socialItemContainer">
                                                    @if (!empty($content->requirements))
                                                        @foreach ($content->requirements as $k => $point)
                                                            <div class="row pointItem">
                                                                <div class="col-11">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" name="titles[]"
                                                                            value="{{ $point->title ?? '' }}"
                                                                            class="form-control" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Icon</label>
                                                                        <input type="file" name="icon[]"
                                                                            accept="image/*" class="form-control chooseFile pictureUpload" data-width="50"
                                                                            {{ empty($point->icon) ? 'required' : '' }}>
                                                                            <div class="previewImage">  @if(!empty($point->icon))
                                                                            <img src="/{{ $point->icon }}"
                                                                                style="width:50px">
                                                                        @endif </div>
                                                                        <input type="hidden" name="icons[{{$k}}]" value="{{ $point->icon }}" class="fileField form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="descriptions[]" class="form-control editor" id="editor-0" required><?= $point->description ?? '' ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    @if ($k == 0)
                                                                        <button class="main-button m-b-rounded additems"
                                                                        data-target=".cloneRow" data-container="#socialItemContainer"
                                                                              type="button">+</button>
                                                                    @else
                                                                        <button class="main-button m-b-rounded removeItem"
                                                                            type="button">X</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text" name="titles[]" value=""
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Icon</label>
                                                                    <input type="file" name="icon[]" accept="image/*"
                                                                    class="form-control chooseFile pictureUpload" data-width="50" required>
                                                                        <div class="previewImage"> </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea name="descriptions[]" class="form-control editor" id="editor-0" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <button class="main-button m-b-rounded additems"
                                                                data-target=".cloneRow" data-container="#socialItemContainer"
                                                                      type="button">+</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">

                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Step by step staking guides</h5>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="guideTitle" value="{{ $content->guideTitle ?? '' }}"
                                                        class="form-control" required>
                                                </div>
                                            </div>
        
                                            <div class="col-sm-6 ">
                                                <div class="form-group">
                                                    <label>Tagline</label>
                                                    <input type="text" name="guideTagline"
                                                        value="{{ $content->guideTagline ?? '' }}" class="form-control" required>
                                                </div>
                                            </div>
        
                                        </div>


                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Step by step staking guides</h5>
                                        <div class="card">
                                            <div class="card-body">
                                               

                                                <div class="col-12" id="guideItemContainer">
                                                    @if (!empty($content->guides))
                                                        @foreach ($content->guides as $k => $point)
                                                            <div class="row pointItem">
                                                                <div class="col-11">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" name="guide_titles[]"
                                                                            value="{{ $point->title ?? '' }}"
                                                                            class="form-control" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Icon</label>
                                                                        <input type="file" name="guide_icon[]"
                                                                            accept="image/*"  class="form-control chooseFile pictureUpload" data-width="50"
                                                                            {{ empty($point->icon) ? 'required' : '' }}>
                                                                            <div class="previewImage"> @if (!empty($point->icon))
                                                                            <img src="/{{ $point->icon }}"
                                                                                style="width:50px">
                                                                        @endif</div>
                                                                        <input type="hidden" 
                                                                            name="guide_icons[{{$k}}]" value="{{ $point->icon }}"
                                                                            class="form-control fileField" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="guide_descriptions[]" class="form-control editor" id="editor-0" required><?= $point->description ?? '' ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    @if ($k == 0)
                                                                    <button class="main-button m-b-rounded additems"
                                                                    data-target=".cloneRow2" data-container="#guideItemContainer"
                                                                          type="button">+</button>
                                                                    @else
                                                                        <button class="main-button m-b-rounded removeItem"
                                                                            type="button">X</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text" name="guide_titles[]" value=""
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Icon</label>
                                                                    <input type="file" name="guide_icon[]" accept="image/*"
                                                                    class="form-control chooseFile pictureUpload" data-width="50" required> <div class="previewImage"> </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea name="guide_descriptions[]" class="form-control editor" id="editor-0" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-1">
                                                                <button class="main-button m-b-rounded additems"
                                                                    data-target=".cloneRow2" data-container="#guideItemContainer"
                                                                          type="button">+</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Estimate potential returns with yield calculators.</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="estimateTitle" value="{{$content->estimateTitle ?? ''}}"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tagline</label>
                                            <input type="text" name="estimateTagline" value="{{$content->estimateTagline ?? ''}}"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Image Step 1</label>
                                            <input type="file" name="estimateImage" accept="image/*"
                                            class="form-control chooseFile pictureUpload" data-width="200">

                                                <input type="hidden" name="estimateOldImage" 
                                                class="form-control" value="{{$content->estimatePicture ?? ''}}">
                                                <div class="previewImage">   
                                                    @if (!empty($content->estimatePicture))
                                                      <img src="/{{ $content->estimatePicture }}" style="width:200px">
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image Step 2</label>
                                            <input type="file" name="estimateImage2" accept="image/*"
                                            class="form-control chooseFile pictureUpload" data-width="200">

                                                <input type="hidden" name="estimateOldImage2" 
                                                class="form-control" value="{{$content->estimatePicture2 ?? ''}}">
                                                <div class="previewImage">   
                                                    @if (!empty($content->estimatePicture2))
                                                      <img src="/{{ $content->estimatePicture2 }}" style="width:200px">
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="estimateDescription" class="form-control editor" id="editor-0" required>{{$content->estimateDescription ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>



                            </div>
                            <div class="col-sm-12 mt-2">
                                <button type="submit" id="categoryFormSbt"
                                    class="main-button btn-submit btn-form-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <div class="d-none cloneRow">
        <div class="row mt-3 pointItem">
            <div class="col-11">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="titles[]" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input type="file" name="icon[]" accept="image/*"  class="form-control chooseFile pictureUpload" data-width="50" required>
                    <div class="previewImage"> </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="descriptions[]" class="form-control cheditors" required></textarea>
                </div>
            </div>
            <div class="col-1">
                <button class="main-button m-b-rounded removeItem" type="button">X</button>
            </div>
        </div>
    </div>

    <div class="d-none cloneRow2">
        <div class="row mt-3 pointItem">
            <div class="col-11">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="guide_titles[]" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input type="file" name="guide_icon[]" accept="image/*"  class="form-control chooseFile pictureUpload" data-width="50" required>
                    <div class="previewImage"> </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="guide_descriptions[]" class="form-control cheditors" required></textarea>
                </div>
            </div>
            <div class="col-1">
                <button class="main-button m-b-rounded removeItem" type="button">X</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/croppie.js') }}"></script>
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/blog.js') }}"></script>
    <script type="text/javascript">
        //   CKEDITOR.replaceAll('editor'); 
       
        $("body").on('click', '.additems', function() {
            // Append the new row after the last row
            $this = $(this);
            var $newRow = $($this.data('target')).html();
            var $socialItemContainer = $("body").find($this.data('container'));
            $socialItemContainer.append($newRow); 
        });

        $("body").on('click', '.removeItem', function() {
            $(this).closest('.pointItem').remove();
        });

        $("body").on('change','.chooseFile',function(){
            $this = $(this);

            $this.closest('.form-group').find('.fileField').remove();
        });
    </script>
@endsection
