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
                                            <textarea name="description" class="form-control" required><?= $content->description ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Powered by Cortex / Partner
                                            agencies</h5>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Title <sup>Powered</sup></label>
                                            <input type="text" name="poweredTitle"
                                                value="{{ $content->poweredTitle ?? '' }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Powered Picture</label>
                                            <input type="file" name="poweredImage"
                                            accept="image/*" class="form-control chooseFile pictureUpload" data-width="100"
                                            {{ empty($content->poweredPicture) ? 'required' : '' }}> 
                                                <div class="previewImage">  
                                                    @if(!empty($content->poweredPicture))
                                                    <img src="/{{ $content->poweredPicture }}"
                                                        style="width:100px">
                                                @endif
                                               </div>  
                                                <input type="hidden" name="poweredPictureOld" value="{{ $content->poweredPicture ?? '' }}" class="fileField form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> Description <sup>Powered</sup></label>
                                            <textarea name="poweredDescription" class="form-control" required><?= $content->poweredDescription ?? '' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Title <sup>agencies</sup></label>
                                            <input type="text" name="agencyTitle"
                                                value="{{ $content->agencyTitle ?? '' }}" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Description <sup>agencies</sup></label>
                                            <textarea name="agencyDescription" class="form-control" required><?= $content->agencyDescription ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">PartnerShip Services </h5>
                                    </div>

                                    <div class="col-12" id="socialItemContainer">
                                        @if (!empty($content->services))
                                            @foreach ($content->services as $k => $point)
                                                <div class="row pointItem">
                                                    <div class="col-11">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="titles[]"
                                                                value="{{ $point->title ?? '' }}" class="form-control"
                                                                required>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label>Icon</label>
                                                            <input type="file" name="icon[]"
                                                            accept="image/*" class="form-control chooseFile pictureUpload" data-width="100"
                                                            {{ empty($point->icon) ? 'required' : '' }}> 
                                                                <div class="previewImage">  
                                                                    @if(!empty($point->icon))
                                                                    <img src="/{{ $point->icon }}"
                                                                        style="width:100px">
                                                                @endif
                                                               </div>  
                                                                <input type="hidden" name="icons[{{$k}}]" value="{{ $point->icon }}" class="fileField form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="descriptions[]" class="form-control editor" id="editor-0" required><?= $point->description ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        @if ($k == 0)
                                                            <button class="main-button m-b-rounded" id="addItem"
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
                                                        class="form-control chooseFile pictureUpload" data-width="100" required>
                                                        <div class="previewImage"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="descriptions[]" class="form-control editor" id="editor-0" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <button class="main-button m-b-rounded" id="addItem"
                                                        type="button">+</button>
                                                </div>
                                            </div>
                                        @endif
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
                    <input type="file" name="icon[]" accept="image/*" class="form-control chooseFile pictureUpload" data-width="100" required>
                    <div class="previewImage"></div>
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
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/croppie.js') }}"></script>
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/blog.js') }}"></script>
    <script type="text/javascript">
        //   CKEDITOR.replaceAll('editor'); 
        $("body").on('click', '#addItem', function() {
            // Append the new row after the last row
            var $newRow = $('.cloneRow').html();
            var $socialItemContainer = $("body").find('#socialItemContainer');
            $socialItemContainer.append($newRow);
            // $socialItemContainer.find('textarea.cheditors').each(function (index) {
            //     if (!$(this).hasClass('newEditor')) {
            //         var idPrefix = 'description_' + Math.floor(Math.random() * (999999999999 - 1111 + 1)) + 1111;
            //         $(this).attr('id', idPrefix); 
            //         $(this).addClass('newEditor'); 
            //         setTimeout(() => {
            //             CKEDITOR.replace(idPrefix);
            //         }, 1000); 
            //     }
            // }); 

            // // Destroy CKEditor instances on elements with the class 'editor'
            // $socialItemContainer.find('.editor').each(function () {
            //     var instance = CKEDITOR.instances[this.id];
            //     if (!instance) {
            //         CKEDITOR.replace(this);
            //     }
            // }); 
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
