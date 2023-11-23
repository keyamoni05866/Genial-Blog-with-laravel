@extends('layouts.master')


@section('content')


	<!--====== Banner Area Start ======-->
	<section class="banner-section">
		<div class="banner-slider">
			@forelse ($features as $feature)
                <div class="sinlge-banner" style="height: 800px;">
                <div class="banner-wrapper">
                    <div class="banner-bg" style="background-image:  url('{{ asset('uploads/blog')}}/{{$feature->image}}')"></div>
                    <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s" style="height: 500px">
                        <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                            <a href="#">
                               {{$feature->title}}
                            </a>
                        </h3>
                        <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                            <li><a href="#">By -{{$feature->RelationWithUser->name}}</a></li>
                            <li>
                                @foreach ($feature->ManyRelationTags as $item)
                                <li >
                                    <a href="">{{$item->title}}</a>
                                </li>
                            @endforeach
                        </li>
                        </ul>
                        <p data-animation="fadeInUp" data-delay="1s">

                            <?php
                            $blog_des = strip_tags($feature->description);
                            $blog_id = $feature->id;
                            if(strlen($blog_des > 250)):
                            $blog_cut = substr($blog_des,0,250);
                            $endpoint= strrpos($blog_cut, " ");
                            $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                            $blog_des .= ".....";
                          endif;
                          echo $blog_des;


                            ?>
                             <a href="{{ route('root.single',$feature->id)}}" class='text-info fw-bold'>Read More</a>
                        </p>

                    </div>
                </div>
                			</div>
            @empty
            <div class="sinlge-banner">
                <div class="banner-wrapper">
                    <div class="banner-bg" style="background-image: url({{ asset('frontend')}}/assets/img/banner/01.jpg);"></div>
                    <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                        <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                            <a href="#">
                                The Olivier da Costa restaurant experience in Lisbon
                            </a>
                        </h3>
                        <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                            <li><a href="#">By - Zhon Smith</a></li>
                            <li><a href="#">Travel,</a><a href="#">Design,</a><a href="#">Nature</a></li>
                        </ul>
                        <p data-animation="fadeInUp" data-delay="1s">
                            When it comes to creating is a website for your busin an attractive design will only get you
                            far. With people increasingly using their tablets and smartphones and shop online,...
                        </p>
                        <a href="blog-details.html" class="read-more" data-animation="fadeInUp" data-delay="1.2s">
                            Read More <i class="fas fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            @endforelse

		</div>
		<div class="banner-nav"></div>
	</section>
	<!--====== Banner Area End ======-->


    <!--====== Post Area Start ======-->
	<section class="post-area with-sidebar" id="postWarpperLoaded">
		<div class="container-fluid">
			<div class="post-area-inner">
				<!-- Entry Post -->
				<div class="entry-posts clearfix masonary-posts row">
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
                                                                @foreach ($feature->ManyRelationTags as $item)
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
                            <h2 class="text-danger font-bold text-center">No Blogs Found</h2>
                    @endforelse

                    {{-- pagination --}}
                  <div class="col-6" >
                    {{ $blogs->links() }}
                  </div>
				</div>
				<!-- Sidebar -->
				<div class="primary-sidebar clearfix">
					<div class="sidebar-masonary row">

                        {{-- Bloger --}}
						<div class="col-lg-12 col-sm-6 widget author-widget">
							<div class="author-img">
								<img src="assets/img/sidebar/author.jpg" alt="Post-Author">
							</div>
							<h5 class="widget-title">I am a Bloger</h5>
							<p>
								When it comes to creating is a website for your business, an attractive design will only
								get you far,...
							</p>
							<div class="author-signature">
								<img src="assets/img/sidebar/author-signature.png" alt="Signature">
							</div>
						</div>

                        {{-- categories --}}
						<div class="col-lg-12 col-sm-6 widget categories-widget">
							<h5 class="widget-title">Categoriesr</h5>
							<div class="categories">
								@forelse ($categories as $category)
                                    <div class="categorie" style="background-image: url({{ asset('uploads/category')}}/{{$category->image}});">
                                    									<a href="#">
                                    										{{$category->title}}
                                    									</a>
                                    								</div>
                                @empty
                                <h2>NO Category Found</h2>
                                @endforelse

							</div>
						</div>
						<div class="col-lg-12 col-sm-6 widget social-widget">
							<h5 class="widget-title">Subscribe</h5>
							<div class="social-links">
								<a href="#">
									<i class="fab fa-facebook-f"></i>Facebook
								</a>
								<a href="#">
									<i class="fab fa-twitter"></i>Twitter
								</a>
								<a href="#">
									<i class="fab fa-instagram"></i>Instagram
								</a>
								<a href="#">
									<i class="fab fa-youtube"></i>YouTube
								</a>
								<a href="#">
									<i class="fab fa-pinterest-p"></i>Pinterest
								</a>
							</div>
						</div>


                        {{-- popular article --}}
						<div class="col-lg-12 col-sm-6 widget popular-articles">
							<h5 class="widget-title">Popular Articles</h5>
							<div class="articles">
								<div class="article">
									<div class="thumb">
										<img src="assets/img/sidebar/articles/01.jpg" alt="Image">
									</div>
									<div class="desc">
										<h6><a href="blog-details.html">Best Wordpress Theme of 2018</a></h6>
										<span class="post-date">Audust 23, 2015</span>
									</div>
								</div>
								<div class="article">
									<div class="thumb">
										<img src="assets/img/sidebar/articles/02.jpg" alt="Image">
									</div>
									<div class="desc">
										<h6><a href="blog-details.html">Dating While Studying Abroad—Maximize Fun
												Minimize Heartbreak</a></h6>
										<span class="post-date">Audust 23, 2015</span>
									</div>
								</div>
								<div class="article">
									<div class="thumb">
										<img src="assets/img/sidebar/articles/03.jpg" alt="Image">
									</div>
									<div class="desc">
										<h6><a href="blog-details.html">Nature Photography Best Place Focus</a></h6>
										<span class="post-date">Audust 23, 2015</span>
									</div>
								</div>
								<div class="article">
									<div class="thumb">
										<img src="assets/img/sidebar/articles/04.jpg" alt="Image">
									</div>
									<div class="desc">
										<h6><a href="blog-details.html">Best Wordpress Theme of 2018</a></h6>
										<span class="post-date">Audust 23, 2015</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-sm-6 widget ad-widget">
							<img src="assets/img/sidebar/ad.jpg" alt="Image">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== Post Area End ======-->

@endsection