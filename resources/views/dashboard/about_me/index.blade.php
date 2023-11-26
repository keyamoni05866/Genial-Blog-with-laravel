@extends('layouts.dashboard_master')

@section('content')

<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description d-flex justify-content-between">
            <h3>About Section</h3>
            <button class="btn btn-info " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Describe Yourslf
            </button>
        </div>
    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">About Yourself
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route('about.insert')}}"
                        enctype="multipart/form-data" method="POST" >
                        @csrf


                   <div  class="row">
                    <div class="col-6 mt-2">
                        <label for="exampleInputEmail1" class="form-label">
                            Name:</label>
                        <input type="text" class="form-control form-control-rounded"
                            aria-describedby="..." placeholder="Inter Your Name"
                            name="name" >

                    </div>

                   <div class="col-6 ">
                    <label for="exampleInputEmail1" class="form-label mt-3">Title:</label>
                    <input type="text" class="form-control  form-control-rounded"
                        aria-describedby="..." placeholder="Insert Bio Title"
                        name="title" >
                   </div>
                   </div>

                  <div class="row">

                    <div class="col-6 ">
                        <label for="exampleInputEmail1" class="form-label mt-3">Profession:</label>
                        <input type="text" class="form-control  form-control-rounded"
                            aria-describedby="..." placeholder="Insert Your Profession"
                            name="profession" >
                       </div>
                      <div class="col-6">
                        <label for="exampleInputEmail1" class="form-label mt-3">Your
                            Image:</label>
                        <input type="file"
                            class="form-control form-control-solid-bordered form-control-rounded"
                            aria-describedby="..." name="image">
                      </div>


                  </div>







                            <label for="exampleInputEmail1" class="form-label mt-3"> Description:</label>
                            <textarea  class="form-control  form-control-rounded" rows="5" name="description" ></textarea>
                        <button type="submit"
                            class="btn btn-info btn-md ms-2 mt-2">Insert</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

                  </div>
            </div>

        </div>

    </div>
</div>


<div class="mt-5 d-flex gap-4" >
@forelse ($abouts as $about)
        <div class="card" style="width: 25rem;">
            <img src="{{ asset('uploads/about') }}/{{ $about->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Name: {{$about->name}}</h5>
              <h6 class="card-title">Bio: {{$about->title}}</h6>
              <h6 class="card-title">Profession: {{$about->profession}}</h6>

              <p class="card-text">Description: {{$about->description}} </p>
              <div class="d-flex">
                <form action="{{route('about.status',$about->id)}}" method="POST">
                    @csrf
                    @if ($about->status == 'active')
                        <button class="btn btn-success btn-sm">{{ $about->status }}</button>
                    @else
                    <button class="btn btn-primary btn-sm">{{ $about->status }}</button>
                    @endif

                   </form>

                 <a  href="{{ route('about.delete', $about->id)}}" class="btn btn-dark btn-sm ms-2">Delete</a>
                 <button class="btn btn-info btn-sm ms-2" data-bs-toggle="modal"
                 data-bs-target="#aboutModal{{ $about->id }}">Edit</button>
                 {{-- Edit Input Modal --}}

                 <div class="modal fade" id="aboutModal{{ $about->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">About Inventroy
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <form action="{{ route('about.update',$about->id)}}"
                                    enctype="multipart/form-data" method="POST" >
                                    @csrf


                               <div  class="row">


                                <div class="col-6 ">
                                    <label for="exampleInputEmail1" class="form-label mt-3">Name:</label>
                                    <input type="text" class="form-control  form-control-rounded"
                                        aria-describedby="..."
                                        name="name" value="{{$about->name}}">
                                   </div>

                                <div class="col-6 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">
                                        Title:</label>
                                    <input type="text" class="form-control form-control-rounded"
                                        aria-describedby="..." placeholder="Insert Bio Title"
                                        name="title" value="{{$about->title}}">

                                </div>



                               </div>
                               <div class="row">

                                <div class="col-6 ">
                                    <label for="exampleInputEmail1" class="form-label mt-3">Profession:</label>
                                    <input type="text" class="form-control  form-control-rounded"
                                        aria-describedby="..." placeholder="Insert Your Profession"
                                        name="profession" value="{{$about->profession}}">
                                   </div>

                                <div class="col-6">
                                    <label for="exampleInputEmail1" class="form-label mt-3">Your
                                        Image:</label>
                                    <input type="file"
                                        class="form-control form-control-solid-bordered form-control-rounded"
                                        aria-describedby="..." name="image">
                                 </div>

                               </div>


                                        <label for="exampleInputEmail1" class="form-label mt-3"> Description:</label>
                                        <textarea  class="form-control  form-control-rounded" rows="5" name="description"> {{$about->description}}</textarea>
                                    <button type="submit"
                                        class="btn btn-info btn-md ms-2 mt-2">Update</button>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                  </div>
                            </div>

                        </div>

                    </div>
                </div>
              </div>
            </div>
          </div>
          @empty
        <div class="mx-auto">
            <h2 class="text-danger ">No Section Found</h2>
        </div>
          @endforelse
        </div>


@endsection


