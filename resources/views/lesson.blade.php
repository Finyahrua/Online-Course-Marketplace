@extends('layouts.home')

{{-- @section('sidebar')
    <p class="lead">{{ $lesson->course->title }}</p>

    <div class="list-group">
        @foreach ($lesson->course->publishedLessons as $list_lesson)
            <a href="{{ route('lessons.show', [$list_lesson->course_id, $list_lesson->slug]) }}" class="list-group-item"
                @if ($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $list_lesson->title }}</a>
        @endforeach
    </div>
@endsection --}}

@section('main')
<div class="uk-section" style="margin-top: -50px">
  <div class="uk-container">
    <div class="uk-grid-large" data-uk-grid>
      <div class="uk-width-expand@m">
        <div class="uk-article">
            <div style="display:flex; flex-direction:row;justify-content:space-between;">
                <div style="width: 55%">
                @if ($purchased_course || $lesson->free_lesson == 1)
                    <h3>{{ $lesson->title }}</h3>
                    {{-- below commented code shows the lesson image --}}
                    {{-- <img src="{{ asset('uploads/thumb/'.$lesson->lesson_image)  }}" alt="" style="width: 120px"> --}}
                    
                    
                        <video id="my-video"  class="video-js"
                        controls
                        preload="auto"
                        width="560"
                        height="364"
                        poster="{{ asset('uploads/thumb/'.$lesson->lesson_image)  }}"
                        data-setup="{}" style="margin-right: 50px">
                        <source src="{{ asset('uploads/'.$lesson->lesson_video)  }}" type="video/mp4" />
                    </video>
                   
                    
                    
                        <p>{!! $lesson->full_text !!}</p>
                        
                       
                        
                       
                    @else
                        Please <a href="{{ route('courses.show', [$lesson->course->slug]) }}">go back</a> and buy the course.
                    @endif

                    <div style="display:flex; flex-direction:row;justify-content:space-between; margin-top:10px">

                        @if ($previous_lesson)
                            <p><a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}"><< Previous Lesson</a></p>
                        @endif
                        @if ($next_lesson)
                            <p><a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}">Next Lesson >></a></p>
                        @endif
                    </div>
                    
                </div>
                <div>
                    <div class="uk-accordion-content" style="width: 400px">
                        <table class="uk-table uk-table-justify uk-table-middle uk-table-divider">
                            <tbody>
                              
                                @foreach ($lesson->course->publishedLessons as $list_lesson)
                                    <tr class="uk-text-primary">
                                        <td class="uk-table-expand"><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>

                                            <a href="{{ route('lessons.show', [$list_lesson->course_id, $list_lesson->slug]) }}" class="uk-text-primary"
                                                @if ($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $list_lesson->title }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>@if ($test_exists)
                          
                            <h3>Test: {{ $lesson->test->title }}</h3>
                            @if (!is_null($test_result))
                                <div class="alert alert-info">Your test score: {{ $test_result->test_result }}
                                </div>
                                   <a href="{{ route('certificate',[$lesson->course->slug ]) }}" class="uk-button uk-button-primary-preserve uk-button-large uk-width-1-1">Get Certificate</a>
                            @else
                            <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                                {{ csrf_field() }}
                                @foreach ($lesson->test->questions as $question)
                                    <b>{{ $loop->iteration }}. {{ $question->question }}</b>
                                    <br />
                                    @foreach ($question->options as $option)
                                        <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}" /> {{ $option->option_text }}<br />
                                    @endforeach
                                    <br />
                                @endforeach
                                <input type="submit" value=" Submit results " />
                            </form>
                            
                            
                            @endif
                            
                            
                        @endif
                    </td>

                </tr>
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection