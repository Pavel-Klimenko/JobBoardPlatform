<div class="featured_candidates_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Featured Candidates</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="candidate_active owl-carousel">
                    @foreach ($candidates as $candidate)
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ $candidate['IMAGE'] }}" height="110" alt="">
                            </div>
                            <a href="#"><h4>{{ $candidate['NAME'] }}</h4></a>
                            {{--<a href="{{ route('show-candidate', ['id' => $candidate->id]) }}"><h4>{{ $candidate['NAME'] }}</h4></a>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
