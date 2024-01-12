<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">{{$title}}</h4>
    @php
    $isCompanyFlag = \App\Ship\Helpers\Helper::isCompany();
    $isCandidateFlag = \App\Ship\Helpers\Helper::isCandidate();
    @endphp
    <ul class="list cat-list">
        <li>
            <a href="{{ route('personal-info') }}" class="d-flex">
                @if ($title == 'Personal info')
                    <p><b>{{$title}}</b></p>
                @else
                    <p>Personal info</p>
                @endif
            </a>
        </li>
        @if($isCompanyFlag)
            <li>
                <a href="{{ route('personal-vacancies') }}" class="d-flex">
                    @if ($title == 'Company vacancies')
                        <p><b>{{$title}}</b></p>
                    @else
                        <p>Company vacancies</p>
                    @endif
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('interview-requests', ['type' => 'all']) }}" class="d-flex">
                @if ($title == 'All interview requests')
                    <p><b>{{$title}}</b></p>
                @else
                    <p>All interview requests</p>
                @endif

            </a>
        </li>
        <li>
            <a href="{{ route('interview-requests', ['type' => 'accepted']) }}" class="d-flex">
                @if ($title == 'Accepted interview requests')
                    <p><b>{{$title}}</b></p>
                @else
                    <p>Accepted interview requests</p>
                @endif
            </a>
        </li>
        @if($isCompanyFlag)
            <li>
                <a href="{{ route('interview-requests', ['type' => 'rejected']) }}" class="d-flex">
                    @if ($title == 'Rejected interview requests')
                        <p><b>{{$title}}</b></p>
                    @else
                        <p>Rejected interview requests</p>
                    @endif
                </a>
            </li>
        @endif
    </ul>

</aside>

