<!-- featured_candidates_area_start  -->
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
                        @php
                            $model = \App\Containers\Vacancies\Models\JobCategories::class;
                            $category = \App\Ship\Helpers\Helper::getTableRow($model, 'ID', $candidate->CATEGORY_ID);
                        @endphp
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ $candidate->IMAGE }}" height="110" alt="">
                            </div>
                            <a href="{{ route('show-candidate', ['id' => $candidate->id]) }}"><h4>{{ $candidate->NAME }}</h4></a>
                            <b>{{ ucfirst($category->NAME) }} developer</b>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- featured_candidates_area_end  -->