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
                                            <input type="text" name="title" value="{{ $content->title ?? '' }}"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Tagline</label>
                                            <input type="text" name="tagline"
                                                value="{{ $content->tagline ?? '' }}" class="form-control" required>
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
                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Educational meterials</h5>
                                    </div>

                                    <div class="col-12" id="socialItemContainer">
                                        @if (!empty($content->meterials))
                                            @foreach ($content->meterials as $k => $point)
                                                <div class="row mt-2 pointItem">
                                                     <div class="col-11">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text" name="titles[]"
                                                                        value="{{ $point->title ?? '' }}" class="form-control"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label>Update Date</label>
                                                                    <input type="date" name="update_dates[]"
                                                                        value="{{ $point->update_date ?? '' }}"
                                                                        class="form-control">
                                                                </div> 
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status[]" class="form-control">
                                                                        <option value="No Update"
                                                                            {{ !empty($point->status) && $point->status == 'No Update' ? 'selected' : '' }}>
                                                                            No Update</option>
                                                                        <option value="New Update"
                                                                            {{ !empty($point->status) && $point->status == 'New Update' ? 'selected' : '' }}>
                                                                            New Update</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label>Icon</label>
                                                                    <input type="file" name="icon[]" accept="image/*"
                                                                        class="form-control chooseFile pictureUpload" data-width="100" {{ empty($point->icon) ? 'required' : '' }}>
                                                                        <div class="previewImage"> 
                                                                            @if (!empty($point->icon))
                                                                               <img src="/{{ $point->icon }}" style="width:100px">
                                                                            @endif
                                                                       </div>  
                                                                    <input type="hidden" name="icons[{{ $k }}]"
                                                                        value="{{ $point->icon }}" class="fileField form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea name="descriptions[]" class="form-control editor" id="editor-0" required><?= $point->description ?? '' ?></textarea>
                                                                </div>
        
                                                                <div class="form-group">
                                                                    <label>Link</label>
                                                                    <input type="text" name="links[]"
                                                                        value="{{ $point->link ?? '' }}" class="form-control"
                                                                        required>
                                                                </div>
                                                            </div>
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

                                         


                                            <div class="row pointItem">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="titles[]" value="" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>Update Date</label>
                                                                <input type="date" name="update_dates[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select name="status[]" class="form-control">
                                                                    <option value="No Update">No Update</option>
                                                                    <option value="New Update">New Update</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>Icon</label>
                                                                <input type="file" name="icon[]" accept="image/*"  class="form-control chooseFile pictureUpload" data-width="100" required>
                                                                
                                                                <div class="previewImage">  
                                                               </div>  
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea name="descriptions[]" class="form-control cheditors" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link</label>
                                                                <input type="text" name="links[]" value="" class="form-control" required>
                                                            </div>
                                                        </div>
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
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="titles[]" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Update Date</label>
                            <input type="date" name="update_dates[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status[]" class="form-control">
                                <option value="No Update">No Update</option>
                                <option value="New Update">New Update</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" name="icon[]" accept="image/*" class="form-control chooseFile pictureUpload" data-width="100" required>
                             <div class="previewImage">  </div>  
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descriptions[]" class="form-control cheditors" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" name="links[]" value="" class="form-control" required>
                        </div>
                    </div>
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


        $("body").on('change', '.chooseFile', function() {
            $this = $(this);

            $this.closest('.form-group').find('.fileField').remove();
        });
    </script>
@endsection
