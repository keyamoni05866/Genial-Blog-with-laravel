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
        </div>

        {{-- comments start--}}
        <div class="comment-template">

                <h4 class="template-title">{{$comments->count()}} Comments</h4>


            <ul class="comment-list">
            @forelse ($comments as $comment)
                    <li>
                        <div class="comment-body" id="comment">
                            <div class="comment-author">
                                <img src="{{ asset('uploads/default')}}/profile.jpg" alt="image">
                            </div>
                            <div class="comment-content">
                                <h6 class="comment-author">{{$comment->name}}</h6>
                                <p>
                                    {{$comment->message}}
                                </p>
                                <div class="comment-footer">
                                    <span class="date"> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                    <a href="#comment" id="{{ $comment->id}}" onclick="myReply(event)" class="reply-link" class="get-comment-id">Reply</a>
                                </div>
                            </div>
                        </div>
                    </li>
          @foreach ($comment->relationwithreply as $reply)
                      <li>
                          <div class="comment-body" id="comment" style="margin-left: 70px;">
                              <div class="comment-author">
                                  <img src="{{ asset('uploads/default')}}/profile.jpg" alt="image">
                              </div>
                              <div class="comment-content">
                                  <h6 class="comment-author">{{$reply->name}}</h6>
                                  <p>
                                      {{$reply->message}}
                                  </p>
                                  <div class="comment-footer">
                                      <span class="date"> {{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</span>
                                      <a href="#comment" id="{{ $reply->id}}" onclick="myReply(event)" class="reply-link" class="get-comment-id">Reply</a>
                                  </div>
                              </div>
                          </div>
                      </li>
                   @foreach ($reply->relationwithreply as $item)
                       <li>
                           <div class="comment-body" id="comment" style="margin-left: 150px ;">
                               <div class="comment-author">
                                   <img src="{{ asset('uploads/default')}}/profile.jpg" alt="image">
                               </div>
                               <div class="comment-content">
                                   <h6 class="comment-author">{{$item->name}}</h6>
                                   <p>
                                       {{$item->message}}
                                   </p>
                                   <div class="comment-footer">
                                       <span class="date"> {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                       {{-- <a href="#comment" id="{{ $item->id}}" onclick="myReply(event)" class="reply-link" class="get-comment-id">Reply</a> --}}
                                   </div>
                               </div>
                           </div>
                       </li>
                   @endforeach
          @endforeach
            @empty
            <h2 class="text-danger">NO Comments Found</h2>
            @endforelse

            </ul>

            <h4 class="template-title">Leave your comment</h4>
            <div class="comment-form">
                <form action="{{route('comment')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" placeholder="Enter your name" name="name">
                            <input type="hidden" value="{{$blog->id}}" name="blog_id">
                            <input type="hidden" class="pushId" name="reply_id">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" placeholder="Your Email" name="email">
                        </div>
                        <div class="col-12">
                            <textarea placeholder="Your message here" name="message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit">Post <i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- comments end --}}
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


@section('footer_script')

<script>
    let getCommentId = document.querySelector('.get-comment-id');
    let inputPush = document.querySelector('.pushId');
    function myReply(event){
        inputPush.value = event.target.getAttribute('id');

    }
</script>

@endsection
