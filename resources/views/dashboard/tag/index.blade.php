@extends('layouts.dashboard_master')

@section('content')


<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description">
            <h2>Tag Section</h2>
        </div>
    </div>

</div>

<div class="row mt-5">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3>Insert Tags</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.insert') }}"  method="POST">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Tag Title:</label>
                    <input type="text" class="form-control form-control-rounded  @error('title')
                        is-invalid
                    @enderror" aria-describedby="..."
                        placeholder="Insert Tag Title" name="title">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-info btn-md ms-2 mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h4>Tag Lists</h4>
            </div>
            <div class="card-body ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">Image</th> --}}
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                            <tr>
                                <th scope="row">{{ $tags->firstItem() + $loop->index}}</th>

                                <td>{{ $tag->title }}</td>

                                    @csrf
                                    <td>
                            <form action="{{route('tag.status', $tag->id)}}" method="POST">
                                @csrf
                                @if ($tag->status == 'active')
                                <button class="btn btn-success btn-sm">{{ $tag->status }}</button>
                       @else
                                <button class="btn btn-info btn-sm">{{ $tag->status }}</button>


                      @endif
                            </form>
                                    </td>

                                <td><button class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#tagModal{{ $tag->id }}">Edit</button></td>

                                <div class="modal fade" id="tagModal{{ $tag->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tag Update
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                        <form action="{{route('tag.update', $tag->id)}}"  method="POST">
                            @csrf
                            <label for="exampleInputEmail1" class="form-label">Tag Title:</label>
                            <input type="text" class="form-control form-control-rounded " aria-describedby="..."
                                placeholder="Insert Category Title" name="title" value="{{$tag->title}}">
                            <button type="submit" class="btn btn-info btn-md ms-2 mt-4">Update</button>
                        </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                    <form action="{{ route('tag.delete', $tag->id) }}" method="POST">
                                        @csrf
                                        <td><button type="submit" class="btn btn-dark btn-sm">Delete</button></td>

                                    </form>



                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">Tags Not Found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                {{ $tags->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
