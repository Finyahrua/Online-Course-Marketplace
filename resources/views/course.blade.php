@extends('layouts.home')

@section('main')
	<div class="uk-container uk-container-large" style="margin-top: 10px">
		<div class="uk-box-shadow-small uk-overflow-hidden uk-border-rounded uk-inline uk-background-center-center 
		uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-overlay-blend" 
		
        >
			<div class="uk-padding-large">
				<div data-uk-grid>
					<div class="uk-width-expand@m uk-flex uk-flex-middle uk-light">
						<div>
							<a class="uk-text-demi-bold hvr-back" href="/"><span class="uk-margin-small-right" 
								data-uk-icon="icon: arrow-left; ratio: 1.4"></span>Back</a>
							<h1 class="uk-heading-small uk-letter-spacing-medium">{{ $course->title }}</h1>
							<p class="uk-margin-small-bottom">{{ $course->description}}</p>
							<div class="uk-rating">
							@for ($star = 1; $star <= 5; $star++)
                    @if ($course->rating >= $star)
                            <span class="uk-rating-filled" data-uk-icon="icon: star; "></span>
                    @else
                           <span data-uk-icon="icon: star;"></span>
                    @endif
              @endfor 
								<span class="uk-margin-small-left">{{ $course->rating }}</span>
								<span>({{ $course->students()->count() }})</span>
								<span class="uk-margin-left"><span>{{ $course->students()->count() }}</span> students enrolled</span>
							</div>
							{{-- <p class="uk-margin-xsmall-top">Created by: {{ $teacher }}</p> --}}
						</div>
					</div>
					<div class="uk-width-1-5@m"></div>
					<div class="uk-width-1-3@m uk-flex uk-flex-middle">
						<div class="uk-inline uk-light uk-border-rounded-large uk-box-shadow-small uk-overflow-hidden">
							<img src="{{ asset('uploads/thumb/'.$course->course_image)  }}" alt="course-image">
							{{-- <div class="uk-position-center">
								<a href="#course-video" class="uk-icon-link" data-uk-icon="icon: play-circle; ratio: 3" data-uk-toggle></a>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




<div class="uk-section">
  <div class="uk-container">
    <div class="uk-grid-large" data-uk-grid>
      <div class="uk-width-expand@m">
        <div class="uk-article">
          <h3>Course content</h3>
          <ul class="uk-margin-top" data-uk-accordion="multiple: true">
            <li class="uk-open">
              
              <div class="uk-accordion-content">
                <table class="uk-table uk-table-justify uk-table-middle uk-table-divider">
                  <tbody>
                    @foreach ($course->publishedLessons as $lesson)
                        {{-- @if ($lesson->free_lesson) --}}
                            <tr class="{{$lesson->free_lesson || $purchased_course ? "uk-text-primary" :"uk-text-muted"  }}">
                            <td class="uk-table-expand"><span class="uk-margin-small-right" data-uk-icon="play-circle"></span><a class="{{$lesson->free_lesson || $purchased_course  ? "uk-text-primary" :"uk-text-muted"  }}" href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}" data-uk-toggle>{{ $lesson->title }}</a></td>
                            <td><span data-uk-icon="{{$lesson->free_lesson || $purchased_course  ? "unlock" :"lock"  }}"></span></td>
                            {{-- <td class="uk-table-shrink">04:24</td> --}}
                            </tr>
                        {{-- @endif --}}
                    @endforeach                  
                  </tbody>
                </table>
              </div>
            </li>
          </ul>

          {{-- <h3>Requirements</h3>
          <p>Entered have break himself cheek, and with activity that, for bit of text, never just 
            as our have they of begin to cannot in of ran middle at behind seal that their accustomed.</p> --}}

          {{-- <div class="uk-margin-large-top">
            <h3>Tom Solender</h3>
            <div data-uk-grid>
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <img class="uk-border-circle" src="https://source.unsplash.com/CZ9AjMGKIFI/80x80" alt="Tom Solender">
              </div>
              <div class="uk-width-expand">
                <div data-uk-grid data-uk-margin>
                  <div class="uk-width-1-1">
                    <p>29-year UX + Design Veteran; Consultant, Author & Speaker</p>
                  </div>
                  <div class="uk-width-1-2">
                    <span class="uk-margin-small-right" data-uk-icon="star"></span>4.4 Instructor Rating
                  </div>
                  <div class="uk-width-1-2">
                    <span class="uk-margin-small-right" data-uk-icon="comments"></span>21,201 Reviews
                  </div>
                  <div class="uk-width-1-2">
                    <span class="uk-margin-small-right" data-uk-icon="users"></span>130,451 Students
                  </div>
                  <div class="uk-width-1-2">
                    <span class="uk-margin-small-right" data-uk-icon="file-text"></span>5 Courses
                  </div>
                </div>
              </div>              
            </div>
            <p>Activity that and the scarfs, for bit of text, never just 
              as our have they of begin to cannot in of ran middle at behind seal that their accustomed. For 
              devotion their to though one rationally small sight. In so her has I solider, touched 
              the we the past, time, he posterity.</p>          
          </div>   --}}

          <h3>Student feedback</h3>
          <ul class="uk-comment-list">
            <li>
              <article class="uk-comment uk-visible-toggle" tabindex="-1">
                <header class="uk-comment-header uk-position-relative">
                  <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                    <div class="uk-width-auto">
                      <img class="uk-comment-avatar uk-border-circle" src="https://source.unsplash.com/CZ9AjMGKIFI/100x100" width="80" height="80" alt="Alice Thomson">
                    </div>
                    <div class="uk-width-expand">
                      <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Alice Thomson</a></h4>
                      <p class="uk-comment-meta uk-margin-remove"><a class="uk-link-reset" href="#">12 days ago</a></p>
                      <div class="uk-rating">
                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                        <span data-uk-icon="icon: star; ratio: 0.8"></span>
                      </div>
                    </div>
                  </div>
                  <div class="uk-position-top-right uk-position-small uk-hidden-hover"><a class="uk-link-muted" href="#">Reply</a>
                  </div>
                </header>
                <div class="uk-comment-body">
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
              </article>
              <ul>
                <li>
                  <article class="uk-comment uk-comment-primary uk-visible-toggle" tabindex="-1">
                    <header class="uk-comment-header uk-position-relative">
                      <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                        <div class="uk-width-auto">
                          <img class="uk-comment-avatar uk-border-circle" src="https://source.unsplash.com/CZ9AjMGKIFI/100x100" width="80" height="80" alt="Tom Solender">
                        </div>
                        <div class="uk-width-expand">
                          <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Tom Solender</a></h4>
                          <p class="uk-comment-meta uk-margin-remove-top"><a class="uk-link-reset" href="#">12 days ago</a></p>
                        </div>
                      </div>
                      <div class="uk-position-top-right uk-position-small uk-hidden-hover"><a class="uk-link-muted"
                          href="#">Reply</a></div>
                    </header>
                    <div class="uk-comment-body">
                      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                        et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="uk-comment uk-visible-toggle" tabindex="-1">
                    <header class="uk-comment-header uk-position-relative">
                      <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                        <div class="uk-width-auto">
                          <img class="uk-comment-avatar uk-border-circle" src="https://source.unsplash.com/CZ9AjMGKIFI/100x100" width="80" height="80" alt="Alice Thomson">
                        </div>
                        <div class="uk-width-expand">
                          <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Alice Thomson</a></h4>
                          <p class="uk-comment-meta uk-margin-remove"><a class="uk-link-reset" href="#">12 days ago</a></p>
                          <div class="uk-rating">
                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.8"></span>
                            <span data-uk-icon="icon: star; ratio: 0.8"></span>
                          </div>
                        </div>
                      </div>
                      <div class="uk-position-top-right uk-position-small uk-hidden-hover"><a class="uk-link-muted"
                          href="#">Reply</a></div>
                    </header>
                    <div class="uk-comment-body">
                      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                        et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                  </article>
                </li>
              </ul>
            </li>
          </ul>

          <h3 id="contact">How do I contact you with my questions?</h3>
          <p><address>
          Send an email to <a href="mailto:finaddy@gmail.com">Admin</a>.<br>
          Visit us at: University of Dar es Salaam, CoICT
          Box 4242, Dar es Salaam<br>
          Tanzania
          </address>
          </p>          
          </div>
      </div>
      
      <div class="uk-width-1-3@m">
        <div data-uk-sticky="offset: 100; bottom: true; media: @m">
          <div class="uk-card uk-card-default uk-card-body uk-width-1-1 uk-border-rounded-large">
                @if ($purchased_course)
                    Rating: {{ $course->rating }} / 5
                    <br />
                    <b>Rate the course:</b>
                    <br />
                    <form action="{{ route('courses.rating', [$course->id]) }}" method="post">
                        {{ csrf_field() }}
                        <select name="rating">
                            <option value="1">1 - Awful</option>
                            <option value="2">2 - Not too good</option>
                            <option value="3">3 - Average</option>
                            <option value="4" selected>4 - Quite good</option>
                            <option value="5">5 - Awesome!</option>
                        </select>
                        <input type="submit" value="Rate" />
                    </form>
                    <hr />
                  @else
                  <h3>Tsh {{ $course->price }}/=</h3>
              @endif
            
            @if (\Auth::check())
               @if ($course->students()->where('user_id', \Auth::id())->count() == 0)
                  <a href="{{ route('payment.make', [$course->slug]) }}" class="uk-button uk-button-primary-preserve uk-button-large uk-width-1-1">Buy Now</a>
                @endif
            @else
              <a href="{{ route('auth.register') }}?redirect_url={{ route('courses.show', [$course->slug]) }}" class="uk-button uk-button-primary-preserve uk-button-large uk-width-1-1">Buy Now</a>
            @endif
           


            <p class="uk-margin-remove">This course includes:</p>
            <ul class="uk-list uk-margin-small-top">
              {{-- <li><span class="uk-margin-small-right" data-uk-icon="clock"></span>10 hours on-demand video</li> --}}
              <li><span class="uk-margin-small-right" data-uk-icon="unlock"></span>Full lifetime access</li>
              {{-- <li><span class="uk-margin-small-right" data-uk-icon="tablet"></span>Access on mobile</li>
              <li><span class="uk-margin-small-right" data-uk-icon="file-text"></span>Certificate of completion</li> --}}
            </ul>
            <p class="uk-text-center"><a href="admin@mail.com" class="uk-link-muted" data-uk-scroll="offset: 100">Have a question, contact us</a></p>
          </div>			
        </div>
      </div>
    </div>
  </div>
</div>
@endsection