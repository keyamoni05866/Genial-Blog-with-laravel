@extends('layouts.master')

@section('content')

<!--====== Post Details Start ======-->
<section class="post-details-area">
    <div class="container container-1000">
        <div class="post-details">
            <div class="entry-header">
                <h2 class="title">{{$blog->title}}</h2>
                <ul class="post-meta">
                    <li>{{ \Carbon\Carbon::parse($blog->date)->format('M , d- Y') }}</li>
                    <li>
                        {{-- {{$blog->RelationWithCategory->title}} --}}
                        @foreach ($blog->ManyRelationTags as $item)
                        <a href="{{ route('root.tag.blog', $item->id)}}">{{$item->title}},</a>
                      @endforeach
                    </li>
                </ul>
                <p class="short-desc">
                    <?php
                    $blog_des = strip_tags($blog->description);
                    $blog_id = $blog->id;
                    if(strlen($blog_des > 250)):
                    $blog_cut = substr($blog_des,0,250);
                    $endpoint= strrpos($blog_cut, " ");
                    $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                    // $blog_des .= ".....";
                  endif;
                  echo $blog_des;
                  ?>
                </p>
            </div>
            <div class="entry-media text-center">
                <img src="{{ asset('uploads/blog')}}/{{$blog->image}}" alt="image" style="width: 800px; height:500px; border-radius:10px">
            </div>
            <div class="entry-content">
                <p class="has-dropcap">
                    {{$blog->description}}
                </p>

            </div>
            <div class="entry-footer">
                <div class="post-tags">
                    <span>Tag:</span>
                   @foreach ($blog->ManyRelationTags as $item)
                     <a href="{{ route('root.tag.blog', $item->id)}}">{{$item->title}},</a>
                   @endforeach

                </div>
                <div class="social-share">
                    <span>Share:</span>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="post-author">
                    <div class="author-img">
                        <img src="{{ asset('uploads/about')}}/{{$about->image}}" alt="PostAuthor">
                    </div>
                    <h5><a href="#">Author: {{$about->name}}</a></h5>
                    <p>{{$about->profession}}</p>
                </div>
            </div>
            {{-- <div class="post-nav">
                <div class="prev-post">
                    <a href="#"><i class="far fa-angle-left"></i></a><span class="title">Previous Post</span>
                </div>
                <div class="next-post">
                    <span class="title">Next Post</span><a href="#"><i class="far fa-angle-right"></i></a>
                </div>
            </div> --}}


            {{-- related Post --}}
            {{-- <div class="related-posts">
                <h4 class="related-title">Related Posts</h4>
                <div class="related-loop row justify-content-center">

                       <div class="col-lg-6 col-md-6 col-sm-10">
                           <div class="related-post-box">
                               <div class="thumb">
                                   <img src="{{ asset('frontend')}}/assets/img/post-details/related-01.jpg" alt="image">
                               </div>
                               <h5 class="title">
                                   <a href="#">

                                   </a>
                               </h5>
                           </div>
                       </div>


                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                <img src="{{ asset('frontend')}}/assets/img/post-details/related-02.jpg" alt="image">
                            </div>
                            <h5 class="title">
                                <a href="#">
                                    The Olivier da Costa restaurant experience in Lisbon
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- comments --}}
        <div class="comment-template">
            <h4 class="template-title">04 Comments</h4>

            <ul class="comment-list">
                <li>
                    <div class="comment-body">
                        <div class="comment-author">
                            <img src="{{ asset('frontend')}}/assets/img/post-details/comment-01.jpg" alt="image">
                        </div>
                        <div class="comment-content">
                            <h6 class="comment-author">Zhon Andarson</h6>
                            <p>
                                Coding is used in almost all aspects of life and work now, be it directly or
                                indirectly. It’s not just for companies in the tech sector. “An increasing number of
                                businesses rely on computer code,
                            </p>
                            <div class="comment-footer">
                                <span class="date"> 10:35pm, 27 jan 2015.</span>
                                <a href="#" class="reply-link">Reply</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="comment-body">
                        <div class="comment-author">
                            <img src="{{ asset('frontend')}}/assets/img/post-details/comment-02.jpg" alt="image">
                        </div>
                        <div class="comment-content">
                            <h6 class="comment-author">Andro Smith Doe</h6>
                            <p>
                                Coding is used in almost all aspects of life and work now, be it directly or
                                indirectly. It’s not just for companies in the tech sector. “An increasing number of
                                businesses rely on computer code,
                            </p>
                            <div class="comment-footer">
                                <span class="date"> 10:35pm, 27 jan 2015.</span>
                                <a href="#" class="reply-link">Reply</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <h4 class="template-title">Leave your comment</h4>
            <div class="comment-form">
                <form action="#">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" placeholder="Enter your name">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" placeholder="Your Email">
                        </div>
                        <div class="col-12">
                            <textarea placeholder="Your message here"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit">Post <i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--====== Post Details End ======-->

<!--====== Instagram Area Start ======-->
<section class="instagram-section">
    <div class="container-fluid p-0">
        <h5 class="instagram-title">
            Follow Us <span class="instagram-icon"><i class="fab fa-instagram"></i></span> Instagram
        </h5>
        <div class="instagram-images">
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/01.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/02.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/03.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/04.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/05.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/06.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/07.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/01.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/02.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/03.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/04.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/05.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/06.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="image">
                <img src="{{ asset('frontend')}}/assets/img/instagram/07.jpg" alt="Instagram-image">
                <a class="instagram-link" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</section>
<!--====== Instagram Area End ======-->



@endsection
