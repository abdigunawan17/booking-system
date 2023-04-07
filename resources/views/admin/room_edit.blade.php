@extends('admin.layouts.app')

@section('judul', 'Edit Room')

@section('right_top_button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fa fa-eye">  </i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_update', $get_room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Feature Photo *</label>
                                    <div>
                                        <img src="{{ asset('uploads/' . $get_room_data->feature_photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change feature Photo</label>
                                    <div>
                                        <input type="file" name="feature_photo" id="">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $get_room_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="30">{{ $get_room_data->description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Price *</label>
                                    <input type="text" class="form-control" name="price" value="{{ $get_room_data->price }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total Rooms *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ $get_room_data->total_rooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php
                                        $i=0;
                                    @endphp

                                    @foreach ($all_amenities as $item)

                                        @if (in_array($item->id, $existing_amenities))
                                        @php
                                            $checked_type = 'checked';
                                        @endphp
                                        @else
                                        @php
                                            $checked_type = '';
                                        @endphp
                                        @endif

                                    @php
                                        $i++;
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault{{ $i }}" name="arr_amenities[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="flexCheckDefault{{ $i }}">
                                          {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                      
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Room Size *</label>
                                    <input type="text" class="form-control" name="room_size" value="{{ $get_room_data->room_size }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Beds *</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ $get_room_data->total_beds }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Bathroom *</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ $get_room_data->total_bathrooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Balconies *</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ $get_room_data->total_balconies }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Guests *</label>
                                    <input type="text" class="form-control" name="total_quests" value="{{ $get_room_data->total_quests }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <br>
                                    <iframe width="500" height="300"
                                        src="http://www.youtube.com/embed/{{ $get_room_data->video_id }}" title="Youtube video player" allow="accelerometer; autoplay; encrypted-media; clipboard-write; gyroscope; picture-in-picture" frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Id *</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ $get_room_data->video_id }}">
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