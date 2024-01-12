<html>
<head></head>
<body>

<div style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>{{$data['message']}}</h3></div>
</div>

<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;">
        @if($data['entity_id'])
            <p><b>Admin needs to check created entity and make it active for displaying in the public area of the JobBoard</b></p>
            <p><a href="{{env('APP_URL')}}/admin/detail-page/{{$data['entity_id']}}/{{$data['entity']}}">Open new {{$data['entity']}} in the admin area</a></p>
        @endif

        @if($data['entity'] == 'contact')
            <p>{{$data['text']}}</p>
        @endif
    </div>
</div>

<div style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>JobBoard contact email: {{\App\Constants::EMAIL}}</h3></div>
</div>

</body>
</html>
