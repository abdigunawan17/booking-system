@extends('admin.layouts.app')

@section('judul', 'Add Faq')

@section('right_top_button')
    <a href="{{ route('admin_faq_view') }}" class="btn btn-primary"><i class="fas fa-eye">  </i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="mb-4">
                                    <label class="form-label">Question</label>
                                    <input type="text" class="form-control" name="question" value="{{ old('caption') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Answer</label>
                                    <input type="text" class="form-control" name="answer" value="{{ old('answer') }}">
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