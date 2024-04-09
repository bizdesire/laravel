@extends('backend.layouts.layoutNew')
@section('content')
    <div class="m-c-heading">
        <h2>Guidelines</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <a href="{{ route('admin.guideline.index') }}" class="main-button m-b-rounded" title="view List">
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
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Main Step</label>
                                            <select name="parent" class="form-control categorytree"
                                                data-action="{{ route('admin.guideline.options') }}" data-sub="#subSteps">
                                                <option value="0">select</option>
                                                @foreach ($category as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ $data->parent == $cate->id ? 'selected' : '' }}>
                                                        {{ $cate->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Sub Step</label>
                                            <select name="subparent" class="form-control" id="subSteps">
                                                <option value="0">select</option>
                                                @foreach ($subcategory as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ $data->subparent == $cate->id ? 'selected' : '' }}>
                                                        {{ $cate->label }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="label" value="{{ $data->label }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="file" name="image" class="form-control" accept="image/*">
                                            @if (!empty($data->image))
                                                <img src="/{{ $data->image }}" style="width: 120px">
                                            @endif
                                        </div>
                                    </div>

                                   

                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"><?= $data->description ?></textarea>
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
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/guideline.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description');
    </script>
@endsection
