@extends('layouts.dashboard_master')

@section('content')

<div class="row border-bottom mt-4 border-secondary-subtle">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard </h1>
        </div>
    </div>

</div>

<div class="" style="margin-top:100px;">
    <h4 class="fs-2 text-center">Welcome To Dashboard, Dear {{ auth()->user()->name}}</h4>

        <p class="text-info text-center text-info fs-2 text-bold ">Take a Overview</p>


</div>
<div class="mt-5  " style="margin-left: 150px;">
    <a href="{{ route('profile.index')}}"><button class="btn btn-info btn-md ms-3">profile</button></a>
    <a href="{{ route('about')}}"><button class="btn btn-dark btn-md ms-3">Describe Yourself</button></a>
    <a href="{{ route('tag')}}"><button class="btn btn-primary btn-md ms-3">Add Tag</button></a>
    <a href="{{ route('category')}}"><button class="btn btn-secondary btn-md ms-3">Add Categories</button></a>
    <a href="{{ route('blog.insert.view')}}"><button class="btn btn-success btn-md ms-3">Insert Blogs</button></a>
    <a href="{{ route('blog')}}"><button class="btn btn-light btn-md ms-3">All Blogs</button></a>
</div>


@endsection
