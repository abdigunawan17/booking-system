@extends('frontend.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $get_privacy_data->privacy_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    {!! $get_privacy_data->privacy_content !!}    
                </p>
               
            </div>
        </div>
    </div>
</div>
@endsection