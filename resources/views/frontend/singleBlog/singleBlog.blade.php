@extends('layouts.master')

@section('content')

<!--====== Post Details Start ======-->
<section class="post-details-area">
    <div class="container container-1000">
        <div class="post-details">
            <div class="entry-header">
                <h2 class="title">Dating While Studying Abroad—Maximize Fun, Minimize Heartbreak</h2>
                <ul class="post-meta">
                    <li>September 07 - 2020</li>
                    <li><a href="#">Design,</a><a href="#">Travel,</a><a href="#">photography</a></li>
                </ul>
                <p class="short-desc">
                    When it comes to creating is a website for your busi-ness, an attreactive design will only get
                    you far. With people increasingly using their tablets and smartphones and website for your
                    business, an attractive design will only get you far. With people increasingly using their
                    tablets and smartphones shop online,...
                </p>
            </div>
            <div class="entry-media text-center">
                <img src="{{ asset('frontend')}}/assets/img/post-details/01.jpg" alt="image">
            </div>
            <div class="entry-content">
                <p class="has-dropcap">
                    Adipiscing elit com-modo ligula eget dolor Morlem ipsuim dolor sit amiet nec, isc thua sdfk
                    onsec tetuer adipi scing elit. Aenean commeod ligula eget dolor Cuem sociis thena toquhte thigp
                    enatibus et magnis dis partu rient montes. Morlem ipsum doelor sit amet nec penatib et thjem
                    agnis dis part urient montes. Morlem ipsum dolor sit amet nerc, conseec tetuer adipiscing elit.
                    Aenean commodo ligulaits eget dolior. Aenean type massa. Cum sociis nato que pena tibus et
                    magnis dis partu rient moentes. Morlm ipsum dolor tibushrde set amet nec, consec tetuer
                    adipiscing elit. Aenean commodo ligula eget dolor.
                </p>
                <p>
                    Enatibus et magnis dis partu rient montes. Morlem ipsum doelor sit amet nec penatib et thjem
                    agnis dis part uriet montes. Morlem ipsium dolor sit amet nerc, conseec tetuer adipi scing elit.
                    Aenean commodo ligulaits eget doilior. Aenean type massa. Cum sociis nato que pena tibus et
                    magns dihtres partu rient moentes. Morlm ipsum dolor set amet nec, consec tetuer adipiscing
                    elit. Aenean comiodo ligula eget dolor. magnis dis partu rient moentes. Morlm ipsum dolor set am
                    nec, consec tetuer adipiscing elit
                </p>
            </div>
            <div class="entry-footer">
                <div class="post-tags">
                    <span>Tag:</span>
                    <a href="#">burger,</a>
                    <a href="#">pixxa,</a>
                    <a href="#">drink,</a>
                    <a href="#">hot,</a>
                    <a href="#">spacial,</a>
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
                        <img src="{{ asset('frontend')}}/assets/img/post-details/post-author.png" alt="PostAuthor">
                    </div>
                    <h5><a href="#">Maisha Smith</a></h5>
                    <p>Article Writer, Senior Designer, Wordpress Developer Father of 2 Daughters</p>
                </div>
            </div>
            <div class="post-nav">
                <div class="prev-post">
                    <a href="#"><i class="far fa-angle-left"></i></a><span class="title">Previous Post</span>
                </div>
                <div class="next-post">
                    <span class="title">Next Post</span><a href="#"><i class="far fa-angle-right"></i></a>
                </div>
            </div>


            {{-- related Post --}}
            <div class="related-posts">
                <h4 class="related-title">Related Posts</h4>
                <div class="related-loop row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                <img src="{{ asset('frontend')}}/assets/img/post-details/related-01.jpg" alt="image">
                            </div>
                            <h5 class="title">
                                <a href="#">
                                    The Olivier da Costa restaurant experience in Lisbon
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
            </div>
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
