@extends('layouts.home')

@section('main')

    {{-- @if (!is_null($purchased_courses))
        <h3>My courses</h3>
        <div class="row">

        @foreach($purchased_courses as $course)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                        </h4>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="ratings">
                        <p>Progress: {{ Auth::user()->lessons()->where('course_id', $course->id)->count() }}
                            of {{ $course->lessons->count() }} lessons</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <hr />

    @endif --}}

    @if (!is_null($purchased_courses))
        <div class="">
        <div class="uk-container">
            <div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
            <div class="uk-width-expand@m">
                <h2>My Courses</h2>
            </div>
            </div>
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
            @foreach($purchased_courses as $course)
            <div>
                <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
                <div class="uk-card-media-top uk-inline uk-light">
                    <img src="https://source.unsplash.com/gMsnXqILjp4/640x380" alt="Course Title">
                    <div class="uk-position-cover uk-overlay-xlight"></div>
                    {{-- <div class="uk-position-small uk-position-top-left">
                    <span class="uk-label uk-text-bold uk-text-price">Tsh {{ $course->price }}/=</span>
                    </div> --}}
                    {{-- <div class="uk-position-small uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                    </div>             --}}
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title uk-margin-small-bottom">{{ $course->title }}</h3>
                    <div class="uk-text-muted uk-text-small">{{ $course->description }}</div>
                    <div class="uk-text-muted uk-text-xxsmall uk-rating uk-margin-small-top">
                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    <span class="uk-margin-small-left uk-text-bold">5.0</span>
                    {{-- @for ($star = 1; $star <= 5; $star++)
                            @if ($course->rating >= $star)
                                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                            @else
                                    <span class="glyphicon glyphicon-star"></span>
                            @endif
                        @endfor  --}}
                    <span>({{ $course->students()->count() }})</span>
                    </div>
                </div>
                <a href="{{ route('courses.show', [$course->slug]) }}" class="uk-position-cover"></a>
                </div>
            </div>
            @endforeach
            </div>
            <div class="uk-text-center uk-margin-large-top">
                
        </div>
        </div>
@endif


<div class="uk-section ">
  <div class="uk-container">
    <div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
      <div class="uk-width-expand@m">
        <h2>All Courses</h2>
      </div>
    </div>
    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
    @foreach($courses as $course)
      <div>
        <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
          <div class="uk-card-media-top uk-inline uk-light">
            <img src="https://source.unsplash.com/gMsnXqILjp4/640x380" alt="Course Title">
            <div class="uk-position-cover uk-overlay-xlight"></div>
            <div class="uk-position-small uk-position-top-left">
              <span class="uk-label uk-text-bold uk-text-price">Tsh {{ $course->price }}/=</span>
            </div>
            {{-- <div class="uk-position-small uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>             --}}
          </div>
          <div class="uk-card-body">
            <h3 class="uk-card-title uk-margin-small-bottom">{{ $course->title }}</h3>
            <div class="uk-text-muted uk-text-small">{{ $course->description }}</div>
            <div class="uk-text-muted uk-text-xxsmall uk-rating uk-margin-small-top">
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-margin-small-left uk-text-bold">5.0</span>
               {{-- @for ($star = 1; $star <= 5; $star++)
                    @if ($course->rating >= $star)
                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                    @else
                            <span class="glyphicon glyphicon-star"></span>
                    @endif
                @endfor  --}}
              <span>({{ $course->students()->count() }})</span>
            </div>
          </div>
          <a href="{{ route('courses.show', [$course->slug]) }}" class="uk-position-cover"></a>
        </div>
      </div>
    @endforeach
    </div>
    <div class="uk-text-center uk-margin-large-top">
        
  </div>
</div>
    {{-- <h3>All courses</h3>
    <div class="row">
    @foreach($courses as $course)
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src="http://placehold.it/320x150" alt="">
                <div class="caption">
                    <h4 class="pull-right">${{ $course->price }}</h4>
                    <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                    </h4>
                    <p>{{ $course->description }}</p>
                </div>
                <div class="ratings">
                    <p class="pull-right">Students: {{ $course->students()->count() }}</p>
                    <p>
                        @for ($star = 1; $star <= 5; $star++)
                            @if ($course->rating >= $star)
                                <span class="glyphicon glyphicon-star"></span>
                            @else
                                <span class="glyphicon glyphicon-star-empty"></span>
                            @endif
                        @endfor 
                    </p>
                </div>
            </div>
        </div>
    @endforeach --}}
    {{-- </div> --}}

@endsection