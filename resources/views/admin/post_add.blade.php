@extends('admin.layouts.app')

@section('judul', 'Add Post')

@section('right_top_button')
    <a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fas fa-plus">  </i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <div>
                                        <input type="file" name="photo" id="">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Content</label>
                                    <textarea name="short_content" class="form-control snote h_100" cols="30" rows="30">{{ old('short_content') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" class="form-control snote h_100" cols="30" rows="30">{{ old('content') }}</textarea>
                                </div>
                                

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection