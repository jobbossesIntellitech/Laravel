@include('site::_partials/header')
@if(Route::is('home'))
@if(!empty($sliders))
<ul class="slider">
    <?php $count = 1; ?>
    @foreach ($sliders as $slide)
    <li id="slide_{{$count}}" style="background-image: url('{{ Image::resize($slide->image, 2000,700, false) }}');">
        &nbsp;
    </li>
    <?php $count++; ?>
    @endforeach
</ul>
@endif
@endif
<div class="page relative">
    <div class="top_hint">
        Give us a call: +123 356 123 124
    </div>
    <!-- slider content -->
    @if(!empty($sliders))
    <div class="slider_content_box clearfix">
        <?php $count = 1 ?>
        @foreach($sliders as $slide)
        <div id="slide_{{$count}}_content" class="slider_content" style="{{ ($count == 1) ? 'display: block;': '' }}">
            <h1 class="title">
                {{ $slide->title }}
            </h1><br />
            <h3 class="subtitle">
                strength, stamina, power
            </h3>
        </div>
        <?php $count++ ?>
        @endforeach

        <div class="slider_navigation controls">
            <?php $count = 1 ?> 
            @foreach($sliders as $slide)
            <a class="more" href="#" id="slide_{{$count}}_url" style="{{ ($count == 1) ? 'display: block;': '' }}">&nbsp;</a>
            <?php $count++; ?>
            @endforeach

            <a id="prev" class="prev" href="#">&nbsp;</a>
            <a id="next" class="next" href="#">&nbsp;</a>
        </div>
    </div>
    @endif
    <!-- home box -->
    <ul class="home_box_container clearfix">
        <li class="home_box white">
            <div class="clearfix">
                <div class="header_left">
                    <h2>What's Next</h2>
                    <h3>upcoming classes</h3>
                </div>
                <div class="header_right">
                    <a href="#" id="upcoming_class_prev" class="icon_small_arrow left_black"></a>
                    <a href="#" id="upcoming_class_next" class="icon_small_arrow right_black"></a>
                </div>
            </div>
            <div class="upcoming_classes_wrapper">
                <ul class="items_list upcoming_classes clearfix">
                    <li>
                        <a href="?page=classes#boxing" title="Boxing">
                            Boxing
                        </a>
                        <div class="value">
                            11.30 - 12.30
                        </div>
                    </li>
                    <li>
                        <a href="?page=classes#cardio-fitness" title="Cardio Fitness">
                            Cardio Fitness
                        </a>
                        <div class="value">
                            14.00 - 15.00
                        </div>
                    </li>
                    <li>
                        <a href="?page=classes#yoga-pilates" title="Yoga Pilates">
                            Yoga Pilates
                        </a>
                        <div class="value">
                            17.30 - 20.30
                        </div>
                    </li>
                    <li>
                        <a href="?page=classes#indoor-cycling" title="Indoor Cycling">
                            Indoor Cycling
                        </a>
                        <div class="value">
                            21.00 - 22.00
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li class="home_box light_green">
            <h2>
                <a href="#" title="Membership Cards">
                    Membership Cards
                </a>
            </h2>
            <h3>25% discount for all members</h3>
            <div class="news clearfix">
                <span class="banner_icon note"></span>
                <div class="text">
                    Discount on services and treatments at the GymBase for all membership cards holders.
                </div>
                <a class="more black icon_small_arrow margin_right_white" href="#" title="More">More</a>
            </div>
        </li>
        <li class="home_box green">
            <h2>
                <a href="#" title="Personal Training">
                    Personal Training
                </a>
            </h2>
            <h3>sign up today</h3>
            <div class="news clearfix">
                <span class="banner_icon calendar"></span>
                <div class="text">
                    Lorem ipsum dolor sit amet velum, consectetur adipiscing volutpat rutrum sollicitudin.
                </div>
                <a class="more black icon_small_arrow margin_right_white" href="#" title="More">More</a>
            </div>
        </li>
    </ul>
    <div class="page_layout clearfix">
        <div class="page_left">
            <h3 class="box_header">
                Latest News
            </h3>
            <ul class="blog clearfix">
                @foreach ($entries as $entry)
                <li class="post">
                    <div class="comment_box">
                        <div class="first_row">
                            {{ date('d', strtotime($entry->created_at)) }}<span class="second_row">{{ date('M', strtotime($entry->created_at)) }}</span>
                        </div>
                        <a class="comments_number" href="?page=post#comments_list" title="2 comments">
                            2 comments
                        </a>
                    </div>
                    <div class="post_content">
                        @if ($entry->image)
                        <a href="{{ route('article', $entry->slug) }}"><img src="{{ Image::resize($entry->image, 500,200) }}" alt=""></a>
                        @endif
                        <h2>
                            <a href="{{ route('article', $entry->slug) }}" title="{{ $entry->title }}">
                                {{ $entry->title }}
                            </a>
                        </h2>
                        <div class="text">
                            {{ Str::limit($entry->body, 350) }}
                        </div>
                        <div class="post_footer">
                            <ul class="categories">
                                <li class="posted_by">Posted by <a class="author" href="#" title="{{ $entry->author->email }}">{{ $entry->author->email }}</a></li>
                                <li>
                                    <a href="#" title="Cardio fitness">
                                        Cardio fitness
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Gym fitness">
                                        Gym fitness
                                    </a>
                                </li>
                            </ul>
                            <a class="more icon_small_arrow margin_right_white" href="{{ route('article', $entry->slug) }}" title="More">More</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="show_all">
                <a class="more icon_small_arrow margin_right_white" href="{{ route('article.list') }}" title="Show all">
                    Show all
                </a>
            </div>
        </div>
        <div class="page_right">
            <h3 class="box_header">
                Training Classes
            </h3>
            <div class="sidebar_box first">
                @if(!empty($sports))
                <ul class="training_classes">
                    @foreach($sports as $sport)

                    <li>
                        <div id="accordion-{{$sport->slug}}">
                            <h3>{{ $sport->title }}</h3>
                            <h5>strength, speed, stamina</h5>
                        </div>
                        <div class="clearfix">
                            <div class="item_content clearfix">
                                @if ($entry->image)
                                <a href="#"><img src="{{ Image::resize($sport->image, 80,80) }}" alt=""></a>
                                @endif
                                <!-- <a class="thumb_image" href="#" title="Gym Fitness">
                                        <img src="{{ asset('site/assets/images/samples/classes_thumb1.jpg') }}" alt="" />
                                </a> -->
                                <div class="text">
                                    {{ Str::limit($sport->body, 200) }}
                                </div>
                            </div>
                            <div class="item_footer clearfix">
                                <a class="more icon_small_arrow margin_right_white" href="?page=classes#gym-fitness" title="Details">Details</a>
                                <a class="more icon_small_arrow margin_right_white" href="?page=timetable#gym-fitness" title="Timetable">Timetable</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif 
            </div>
            <div class="sidebar_box">
                <div class="clearfix">
                    <div class="header_left">
                        <h3 class="box_header">
                            Latest Tweets <?php echo Helpers::doMessage(); ?>
                        </h3>
                    </div>
                    <div class="twitter">
                            @if(!empty($tweets))
                                    @foreach($tweets as $tweet)
                                            <div class="twitter-block">
                                                    {{$tweet->user->name}} ({{Twitter::linkify('@'.$tweet->user->screen_name)}})
                                                    <p>{{Twitter::linkify($tweet->text)}}</p>
                                                    <span class="timeago" title="{{$tweet->created_at}}">{{ date('H:i, M d', strtotime($tweet->created_at)) }}</span>		
                                            </div>
                                    @endforeach
                            @else
                                    <p>We are having a problem with our Twitter Feed right now.</p>
                            @endif
                    </div>
                    <div class="header_right">
                        <a href="#" id="latest_tweets_prev" class="scrolling_list_control_left icon_small_arrow left_white"></a>
                        <a href="#" id="latest_tweets_next" class="scrolling_list_control_right icon_small_arrow right_white"></a>
                    </div>
                </div>
                <div class="scrolling_list_wrapper">

                </div>
            </div>
        </div>
    </div>
</div>
@include('site::_partials/footer')