@extends('admin.layouts.app')

@section('judul', 'Edit Testimonial')

@section('right_top_button')
    <a href="{{ route('admin_testimonial_view') }}" class="btn btn-primary"><i class="fa fa-eye">  </i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_testimonial_update', $get_testimonial_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo *</label>
                                    <div>
                                        <img src="{{ asset('uploads/' . $get_testimonial_data->photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <div>
                                        <input type="file" name="photo" id="">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $get_testimonial_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $get_testimonial_data->designation }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control h_100" cols="30" rows="30">{{ $get_testimonial_data->comment }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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