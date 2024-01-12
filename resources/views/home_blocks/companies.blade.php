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
                @php
                $vacancyModel = \App\Containers\Vacancies\Models\Vacancies::class;
                $companyVacanciesQuantity = \App\Ship\Helpers\Helper::countTableRow($vacancyModel, 'COMPANY_ID', $company->id);
                @endphp
                    @if($companyVacanciesQuantity > 0)
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="single_company">
                                <div class="thumb">
                                    <img src="{{ $company->ICON }}" alt="">
                                </div>
                                <a href="/browse-job?COMPANY_ID={{$company->id}}"><h3>{{ $company->NAME }}</h3></a>
                                <p><span>{{$companyVacanciesQuantity}}</span> Available position</p>
                            </div>
                        </div>
                    @endif
            @endforeach

        </div>
    </div>
</div>