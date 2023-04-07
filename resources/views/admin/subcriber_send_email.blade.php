@extends('admin.layouts.app')

@section('judul', 'Subcriber Send Email')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subcriber_send_email_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="mb-4">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control h_100" cols="30" rows="30">{{ old('message') }}</textarea>
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