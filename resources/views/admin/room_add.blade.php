@extends('admin.layouts.app')

@section('judul', 'Add Room')

@section('right_top_button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fas fa-eye">  </i>View All</a>
@endsection


@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <div>
                                        <input type="file" name="feature_photo" id="">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="30">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Price *</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total Rooms *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ old('total_rooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php
                                        $i=0;
                                    @endphp

                                    @foreach ($all_amenities as $item)
                                    @php
                                        $i++;
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="arr_amenities[]" id="flexCheckDefault{{ $i }}">
                                        <label class="form-check-label" for="flexCheckDefault{{ $i }}">
                                          {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                      
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Room Size *</label>
                                    <input type="text" class="form-control" name="room_size" value="{{ old('room_size') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Beds *</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ old('total_beds') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Bathroom *</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ old('total_bathrooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Balconies *</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ old('total_balconies') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Guests *</label>
                                    <input type="text" class="form-control" name="total_quests" value="{{ old('total_quests') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Id *</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ old('video_id') }}">
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