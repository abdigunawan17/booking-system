@extends('admin.layouts.app')

@section('judul', 'View Rooms')

@section('right_top_button')
    <a href="{{ route('admin_room_add') }}" class="btn btn-primary"><i class="fa fa-plus">  </i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Price (per night)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp

                                @foreach ($get_rooms as $row)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->feature_photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>
                                        {{ $row->name }}
                                    </td>
                                    <td>
                                        {{ $row->price }}
                                    </td>
                                    <td class="pt_10 pb_10">

                                        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{ $i }}">Detail</button>
                                        <a href="{{ route('admin_room_gallery', $row->id) }}" class="btn btn-primary">Photo Gallery</a>
                                        <a href="{{ route('admin_room_edit', $row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_room_delete', $row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                    
                                </tr>
                                




                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" data-backdrop="false" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal" data-backdrop="false"  aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Photo</label></div>
                                                    <div class="col-md-8">
                                                        <img src="{{ asset('uploads/'. $row->feature_photo) }}" alt="" class="w-100">
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Name</label></div>
                                                    <div class="col-md-8">{{ $row->name }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Description</label></div>
                                                    <div class="col-md-8">{!! $row->description !!}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Price</label></div>
                                                    <div class="col-md-8">Rp. {{ $row->price }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Room Size</label></div>
                                                    <div class="col-md-8">{{ $row->room_size }} m2</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Total Beds</label></div>
                                                    <div class="col-md-8">{{ $row->total_beds }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Total Rooms</label></div>
                                                    <div class="col-md-8">{{ $row->total_rooms }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Amenities</label></div>
                                                    <div class="col-md-8">
                                                        @php
                                                            $arr = explode(',', $row->amenities);
                                                            //echo '<pre>';
                                                            //print_r($arr);
                                                            //echo '</pre>';
                                                            for($j=0; $j<count($arr); $j++)
                                                            {
                                                                //echo $arr[$j].'<br>';
                                                                $temp_row = \App\Models\Amenity::where('id', $arr[$j])->first();

                                                                echo $temp_row->name .', ';
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Total Bathrooms</label></div>
                                                    <div class="col-md-8">{{ $row->total_bathrooms }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Total Balconies</label></div>
                                                    <div class="col-md-8">{{ $row->total_balconies }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Total Quests</label></div>
                                                    <div class="col-md-8">{{ $row->total_quests }}</div>
                                                </div>
                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                    <div class="col-md-4"><label class="form-label">Video</label></div>
                                                    <div class="col-md-8">
                                                        <div class="iframe-container1">
                                                            <iframe width="500" height="300"
                                                             src="http://www.youtube.com/embed/{{ $row->video_id }}" title="Youtube video player" allow="accelerometer; autoplay; encrypted-media; clipboard-write; gyroscope; picture-in-picture" frameborder="0" allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection