<html>
<head></head>
<body>
<div
    style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>{{$data['message']}}</h3></div>
</div>

<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;">

        <p>Company <b>{{$data['company_name']}}</b></p>

        <p>
             {{$data['message']}}
            to vacancy <a href="{{env('APP_URL')}}/detail-page/vacancy/{{$data['vacancy_id']}}">
                <b>{{$data['vacancy_name']}}</b></a>!
            <br/>
            Please contact us for details:
        </p>

        <ul>
            <li style="list-style-type: none;">Email: <a href="mailto:{{$data['company_email']}}">{{$data['company_email']}}</a></li>
            <li style="list-style-type: none;">Phone: <a href="tel:{{$data['company_phone']}}">{{$data['company_phone']}}</a></li>
            <li style="list-style-type: none;">Website: <a href="{{$data['company_website']}}">{{$data['company_website']}}</a></li>
        </ul>
    </div>
</div>

<div
    style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>JobBoard contact email: {{$data['email']}}</h3></div>
</div>

</body>
</html>
