@extends('layouts.dashboard_master')

@section('content')
<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description d-flex justify-content-between">
            <h2>All Blogs</h2>
            <a href="{{ route('blog.insert.view')}}"><button class="btn btn-info btn-md me-5">Add More Blogs</button></a>
        </div>
    </div>

</div>
<div class="row mt-5">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Blogs</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $blogs->firstItem() + $loop->index }}</th>
                                <td>
                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt=""
                                        style="width:80px; height:50px; border-radius:50%">
                                </td>
                                <td>{{ $blog->title }}</td>

                                <td>{{ $blog->RelationWithUser->name }}</td>
                                <td>{{ $blog->RelationWithCategory->title }}</td>
                                <td>
                                   @if ($blog->status == 'active')
                                    <a href="{{ route('blog.status', $blog->id) }}" class="btn  btn-success btn-sm">{{ $blog->status }}</a>
                                   @else
                          <a  href="{{ route('blog.status', $blog->id) }}" class="btn  btn-outline-secondary btn-sm">{{ $blog->status }}</a>


                                   @endif


                                    </td>

                                {{-- for info --}}
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#blogModal{{ $blog->id }}">Info</button>

                                    <!-- Modal for full Information -->
                                    <div class="modal fade" id="blogModal{{ $blog->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}"
                                                        alt=""
                                                        style="width:300px; height:170px; border-radius:5%;margin-left:70px">

                                                    <div class="mt-4 ms-3 ">
                                                        <h4 class=" text-center mb-3"><span class="fw-bold"> </span>
                                                            <span class="text-info">{{ $blog->title }}</span>
                                                        </h4>

                                                        <h6 class="fs-5"><span class=" me-2">Author Name:</span>
                                                            {{ $blog->RelationWithUser->name }} </h6>
                                                        <h6 class="fs-5"><span class="me-2">Category-Name:</span>
                                                            {{ $blog->RelationWithCategory->title }}</h6>


                                                        <h6 class="fs-5"> <span class=" me-2">Submit Date:</span>

                                                            {{ $blog->date }}
                                                        </h6>


                                                        <p><span class="fw-bold fs-5">Description:</span>

                                                             {{$blog->description }}

                                                        </p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                  </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>



                                <td><a href="{{ route('blog.edit.view', $blog->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a></td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <button class="btn btn-dark btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td>


                                      @if ( $blog->feature == 'active')
                                          <a href="{{ route('blog.feature', $blog->id) }}"
                                              class="btn btn-success btn-sm">Featured</a>


                                       @else
                                          <a href="{{ route('blog.feature', $blog->id) }}"
                                              class="btn btn-primary btn-sm">Feature</a>

                                  @endif
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="9" class="text-danger text-center">No Blogs Found </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
