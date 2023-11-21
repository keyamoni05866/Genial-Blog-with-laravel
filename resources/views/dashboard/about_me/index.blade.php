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
                            Title:</label>
                        <input type="text" class="form-control form-control-rounded"
                            aria-describedby="..." placeholder="Insert Bio Title"
                            name="title" >

                    </div>

                   <div class="col-6 ">
                    <label for="exampleInputEmail1" class="form-label mt-3">Profession:</label>
                    <input type="text" class="form-control  form-control-rounded"
                        aria-describedby="..." placeholder="Insert Your Profession"
                        name="profession" >
                   </div>
                   </div>






                        <label for="exampleInputEmail1" class="form-label mt-3">Your
                            Image:</label>
                        <input type="file"
                            class="form-control form-control-solid-bordered form-control-rounded"
                            aria-describedby="..." name="image">


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
              <h5 class="card-title">Bio: {{$about->title}}</h5>
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
                 <button class="btn btn-info btn-sm ms-2">Edit</button>
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


