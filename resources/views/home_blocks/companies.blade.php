<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Companies</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($companies as $company)
                    @if($company['QUANTITY_OF_VACANCIES'] > 0)
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="single_company">
                                <div class="thumb">
                                    <img src="{{ $company['ICON'] }}" alt="">
                                </div>
                                <a href="/browse-job?COMPANY_ID={{$company['id']}}"><h3>{{ $company['NAME'] }}</h3></a>
                                <p><span>{{$company['QUANTITY_OF_VACANCIES']}}</span> Available position</p>
                            </div>
                        </div>
                    @endif
            @endforeach

        </div>
    </div>
</div>
