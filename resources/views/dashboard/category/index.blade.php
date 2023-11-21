@extends('layouts.dashboard_master')


@section('content')

<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description">
            <h2>Category Section</h2>
        </div>
    </div>

</div>



<div class="row mt-5">

    {{-- category insert code --}}
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4>Insert Categories</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.insert') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Category Title:</label>
                    <input type="text" class="form-control form-control-rounded" aria-describedby="..."
                        placeholder="Inset Category Title" name="title">
                    <label for="exampleInputEmail1" class="form-label mt-3">Category Slug:</label>
                    <input type="text" class="form-control  form-control-rounded" aria-describedby="..."
                        placeholder="Inset Category Slug" name="slug">
                    <label for="exampleInputEmail1" class="form-label mt-3">Category Image:</label>
                    <input type="file" class="form-control form-control-solid-bordered form-control-rounded"
                        aria-describedby="..." name="image">
                    <button type="submit" class="btn btn-info btn-md ms-2 mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>


    {{-- category table --}}


    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4>Category Lists</h4>
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
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th scope="row">{{$categories->firstItem() + $loop->index  }}</th>

                                <td>{{ $category->title }}</td>
    <td>
       <form action="{{route('category.status',$category->id)}}" method="POST">
        @csrf
        @if ($category->status == 'active')
            <button class="btn btn-success btn-sm">{{ $category->status }}</button>
        @else
        <button class="btn btn-info btn-sm">{{ $category->status }}</button>
        @endif

       </form>

    </td>
                                <td><button class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#categoryModal2{{ $category->id }}">Edit</button></td>

                                <div class="modal fade" id="categoryModal2{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Inventroy
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form action="{{ route('category.update', $category->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <label for="exampleInputEmail1" class="form-label">Category
                                                            Title:</label>
                                                        <input type="text" class="form-control form-control-rounded"
                                                            aria-describedby="..." placeholder="Inset Category Title"
                                                            name="title" value="{{ $category->title }}">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Category
                                                            Slug:</label>
                                                        <input type="text" class="form-control  form-control-rounded"
                                                            aria-describedby="..." placeholder="Inset Category Slug"
                                                            name="slug" value="{{ $category->slug }}">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Category
                                                            Image:</label>
                                                        <input type="file"
                                                            class="form-control form-control-solid-bordered form-control-rounded"
                                                            aria-describedby="..." name="image">
                                                        <button type="submit"
                                                            class="btn btn-info btn-md ms-2 mt-4">Update</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                  </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                    <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                        @csrf
                                        <td><button type="submit" class="btn btn-dark btn-sm">Delete</button></td>

                                    </form>


                                    <td><button type="submit" class="btn btn-outline-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#categoryModal{{ $category->id }}">Info</button></td>

                                    <!-- Modal for info-->
                                    <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category
                                                        Inventroy</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body d-flex justify-content-between">
                                                            <img style="width: 150px; height:150px; border-radius:10%;"
                                                                src="{{ asset('uploads/category') }}/{{ $category->image }}"
                                                                alt="">

                                                            <div class="mt-4">
                                                                <h5>Title: {{ $category->title }}</h5>
                                                                <h6>Slug: {{ $category->slug }}</h6>
                                                                <h6>Submit Date:
                                                                    {{ \Carbon\Carbon::parse($category->created_at)->format('M,d-Y') }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                  </div>
                                            </div>
                                        </div>
                                    </div>



                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">Categories Not Found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection



@section('footer_script')
    @if (session('category_success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('category_success') }}",
            })
        </script>
    @endif
    {{-- delete --}}
    @if (session('delete_success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('delete_success') }}",
            })
        </script>
    @endif
    {{-- update --}}
    @if (session('category_update'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('category_update') }}",
            })
        </script>
    @endif
@endsection
