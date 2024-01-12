<html>
<head></head>
<body>
<div style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>{{$data['message']}}</h3></div>
</div>


<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;">
        <h3>
            Candidate sent request to vacancy:
            <a href="{{env('APP_URL')}}/detail-page/vacancy/{{$data['vacancy_id']}}">{{$data['vacancy_name']}}</a>
        </h3>

        @if($data['covering_letter'])
            <h3><b>Candidate`s covering letter:</b></h3>
            <p>{{$data['covering_letter']}}</p>
        @endif
        <ul>
            <li style="list-style-type: none;">Candidate`s CV: <a href="{{env('APP_URL')}}/detail-page/candidate/{{$data['candidate_id']}}">{{$data['candidate_name']}}</a></li>
            <li style="list-style-type: none;">Candidate`s Email: <a href="mailto:{{$data['candidate_email']}}">{{$data['candidate_email']}}</a></li>
            <li style="list-style-type: none;">Candidate`s Phone: <a href="tel:{{$data['candidate_phone']}}">{{$data['candidate_phone']}}</a></li>
        </ul>
    </div>
</div>

<div style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>JobBoard contact email: {{$data['email']}}</h3></div>
</div>

</body>
</html>
