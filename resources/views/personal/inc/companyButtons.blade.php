@if($request->STATUS == 'accepted')
    <p>
        <a href="{{ route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'rejected']) }}"
           type="button" class="btn btn-outline-warning">Reject</a>
    </p>
@elseif($request->STATUS == 'rejected')
    <p>
        <a href="{{ route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'accepted']) }}"
           type="button" class="btn btn-outline-success">Accept</a>
    </p>
@else
    <p>
        <a href="{{ route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'accepted']) }}"
           type="button" class="btn btn-outline-success">Accept</a>
        <a href="{{ route('change-advice-status', ['ADVICE_ID' => $request->ID, 'STATUS' => 'rejected']) }}"
           type="button" class="btn btn-outline-warning">Reject</a>
    </p>
@endif