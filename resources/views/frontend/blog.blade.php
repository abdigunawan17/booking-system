@extends('frontend.layout.app')

@section('main_content')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $global_page_data->blog_heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-item">
        <div class="container">
            <div class="row">
                @foreach($get_post_data as $item)
                <div class="col-md-4">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('show.blog', $item->slug) }}">{{ $item->heading }}</a></h2>
                            <div class="short-des">
                                <p>
                                    {!! $item->short_content !!}
                                </p>
                            </div>
                            <div class="button">
                                <a href="{{ route('show.blog', $item->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $get_post_data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection