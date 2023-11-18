@extends('layouts.dashboard_master')

@section('content')


<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description">
            <h1>Profile Section</h1>
        </div>
    </div>

</div>


{{-- name update --}}
<div class="row  mt-5 ms-5 me-3" >
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Name Update</h4>
            </div>
            <div class="card-body">
                <form action="{{route('profile.name.update', auth()->id())}}" method="POST">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Old Name:</label>
                    <input type="text" value="{{ auth()->user()->name }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label mt-3">New Name:</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-info btn-sm mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Email Update</h4>
            </div>
            <div class="card-body">
                <form action="{{route('profile.email.update', auth()->id())}}" method="POST">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Old Email:</label>
                    <input type="text" value="{{ auth()->user()->email }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label mt-3">New Email:</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-info btn-sm mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- passwordd --}}
<div class="row  mt-4 ms-5 me-3" >
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Password Update</h4>
            </div>
            <div class="card-body">
                <form action="{{route('profile.password.update', auth()->id())}}" method="POST">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Current Password:</label>
                    <input type="password"  class="form-control form-control  @error('current_password') is-invalid @enderror"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name="current_password" >

                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <label for="exampleInputEmail1" class="form-label">New  Password:</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="exampleInputEmail1" class="form-label mt-3">Confirm Password:</label>
                    <input type="password" class="form-control "
                        id="exampleInputEmail1" aria-describedby="emailHelp" name="password_confirmation">


                    <button type="submit" class="btn btn-info btn-sm mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>

    {{-- image update --}}
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Image Update</h4>
            </div>
            <div class="card-body">
                <form action="{{route('profile.image.update', auth()->id())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img style="width:100px;height:70px;" src="{{asset('uploads/default')}}/{{auth()->user()->image}}">
                    <br>
                    <label for="exampleInputEmail1" class="form-label mt-3">Image Update:</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <button type="submit" class="btn btn-info btn-sm mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('footer_script')

@if (session('name_success'))
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
    title: "{{session('name_success')}}",
  })
</script>
@endif
@if (session('email_success'))
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
    title: "{{session('email_success')}}",
  })
</script>
@endif

@if (session('password_success'))
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
    title: "{{session('password_success')}}",
  })
</script>

@endif
@if (session('password_error'))
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
    icon: 'error',
    title: "{{session('password_error')}}",
  })
</script>

@endif

@endsection
