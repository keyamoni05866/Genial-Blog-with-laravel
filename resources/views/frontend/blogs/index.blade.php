@extends('layouts.master')

@section('content')

<div class="entry-posts clearfix masonary-posts row " style="margin: 10px 100px;">
    @forelse ($blogs as $blog)
        <div class="col-xl-4 col-sm-6">
                                <div class="entry-post">
                                    <div class="entry-thumbnail">
                                        <img src="{{ asset('uploads/blog')}}/{{$blog->image}}" alt="Image">
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="title">
                                            <a href="blog-details.html">
                                                {{$blog->title}}
                                            </a>
                                        </h4>
                                        <ul class="post-meta">
                                            <li class="date">
                                                <a href="#">{{$blog->date}}</a>
                                            </li>


                                            <li class="categories">
                                                Tags:
                                                @foreach ($blog->ManyRelationTags as $item)
                                                <a href="#">

                                                   {{$item->title}},

                                                </a>
                                                @endforeach

                                            </li>
                                        </ul>

                                        <p>
                                            <?php
                                            $blog_des = strip_tags($blog->description);
                                            $blog_id = $blog->id;
                                            if(strlen($blog_des > 250)):
                                            $blog_cut = substr($blog_des,0,250);
                                            $endpoint= strrpos($blog_cut, " ");
                                            $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                            $blog_des .= ".....";
                                          endif;
                                          echo $blog_des;
                                          ?>

                                        </p>
                                        <a href="{{ route('root.single',$blog->id)}}" class="read-more">
                                            Read More <i class="fas fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
    @empty
           <div class="col-xl-12 col-sm-6">
            <h2 class="text-danger font-bold text-center">No Blogs Found</h2>
           </div>
    @endforelse

    {{-- pagination --}}
  {{-- <div class="col-6" >
    {{ $blogs->links() }}
  </div> --}}
</div>

@endsection
