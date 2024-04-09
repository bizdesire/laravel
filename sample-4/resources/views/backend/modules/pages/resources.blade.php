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
                                            <label>Main heading</label>
                                            <input type="text" name="mainHeading"
                                                value="{{ $content->mainHeading ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Main Heading Tagline</label>
                                            <input type="text" name="mainHeadingTagline"
                                                value="{{ $content->mainHeadingTagline ?? '' }}" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="mainDescription" class="form-control editor" required><?= $content->mainDescription ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-6">
                                        <div class="card mt-3">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Docs</h5>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="docsTitle"
                                                                value="{{ $content->docsTitle ?? '' }}" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Icon</label>
                                                            <input type="file" name="docsIcon"
                                                                class="form-control chooseFile pictureUpload"
                                                                data-width="100" accept="image/*"
                                                                {{ empty($content->docsIcon) ? 'required' : '' }}>
                                                            <div class="previewImage">
                                                                @if (!empty($content->docsIcon))
                                                                    <img src="/{{ $content->docsIcon }}"
                                                                        style="width:120px">
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="docsIcon2"
                                                                value="{{ $content->docsIcon ?? '' }}" class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="docsDescription" class="form-control editor" required><?= $content->docsDescription ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-6">
                                        <div class="card mt-3">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Discussion Forums
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="forumTitle"
                                                                value="{{ $content->forumTitle ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Icon</label>
                                                            <input type="file" name="forumIcon"
                                                                class="form-control chooseFile pictureUpload"
                                                                data-width="100" accept="image/*"
                                                                {{ empty($content->forumIcon) ? 'required' : '' }}>
                                                            <div class="previewImage">
                                                                @if (!empty($content->forumIcon))
                                                                    <img src="/{{ $content->forumIcon }}"
                                                                        style="width:120px">
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="forumIcon2"
                                                                value="{{ $content->docsIcon ?? '' }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="forumDescription" class="form-control editor" required><?= $content->forumDescription ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-6">
                                        <div class="card mt-3">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Educational
                                                            Materials</h5>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="educationalMeterialsTitle"
                                                                value="{{ $content->educationalMeterialsTitle ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Icon</label>
                                                            <input type="file" name="educationalMeterialsIcon"
                                                                class="form-control chooseFile pictureUpload"
                                                                data-width="100" accept="image/*"
                                                                {{ empty($content->educationalMeterialsIcon) ? 'required' : '' }}>
                                                            <div class="previewImage">
                                                                @if (!empty($content->educationalMeterialsIcon))
                                                                    <img src="/{{ $content->educationalMeterialsIcon }}"
                                                                        style="width:120px">
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="educationalMeterialsIcon2"
                                                                value="{{ $content->docsIcon ?? '' }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="educationalMeterialsDescription" class="form-control editor" required><?= $content->educationalMeterialsDescription ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-6">
                                        <div class="card mt-3">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <h5 class="text-uppercase bg-light p-2 mt-3 mb-3">Blogs</h5>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="blogTitle"
                                                                value="{{ $content->blogTitle ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="form-group">
                                                            <label>Icon</label>
                                                            <input type="file" name="blogIcon" accept="image/*"
                                                                class="form-control chooseFile pictureUpload"
                                                                data-width="100"
                                                                {{ empty($content->blogIcon) ? 'required' : '' }}>
                                                            <div class="previewImage">
                                                                @if (!empty($content->blogIcon))
                                                                    <img src="/{{ $content->blogIcon }}"
                                                                        style="width:120px">
                                                                @endif
                                                            </div>
                                                            <input type="hidden" name="blogIcon2"
                                                                value="{{ $content->docsIcon ?? '' }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="blogDescription" class="form-control editor" required><?= $content->blogDescription ?? '' ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/croppie.js') }}"></script>
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/blog.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replaceAll('editor');
    </script>
@endsection
