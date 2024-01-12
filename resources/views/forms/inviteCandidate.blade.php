<div class="apply_job_form white-bg">

    @if($invitations ?? '')
        @if($invitations->STATUS == 'accepted')
            <h5>You have already <u>INVITED</u> this candidate for vacancy: </h5>
            - <a href="{{ route('show-vacancy', ['id' => $invitations->VACANCY_ID]) }}">
                {{$invitations->VACANCY_NAME}}
            </a>
        @elseif($invitations->STATUS == 'rejected')
            <h5>You have <u>REFUSED</u> this candidate for vacancy: </h5>
            - <a href="{{ route('show-vacancy', ['id' => $invitations->VACANCY_ID]) }}">
                {{$invitations->VACANCY_NAME}}
            </a>
        @elseif($invitations->STATUS == 'no_status')
            <h5>This candidate has <u>APPLIED</u> for the vacancy: </h5>
            - <a href="{{ route('show-vacancy', ['id' => $invitations->VACANCY_ID]) }}">
                {{$invitations->VACANCY_NAME}}
            </a>
            @if($invitations->CANDIDATE_COVERING_LETTER)
                <br/><br/>
                <h5>Candidate`s covering letter: </h5>
                <p>{{$invitations->CANDIDATE_COVERING_LETTER}}</p>
            @endif
        @endif
    @else

        @if($companyVacancies ?? '')
            <h4>Select a specific vacancy:</h4>
            <form action="{{ route('invite-to-interview') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="single_field input_field">
                            <select name="VACANCY_ID" class="wide">
                                <option selected disabled>Choose your vacancy</option>
                                @foreach ($companyVacancies as $vacancy)
                                    <option value="{{$vacancy->ID}}">{{$vacancy->NAME}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <input type="hidden" name="CANDIDATE_ID" value="{{$candidate->id}}">
                    <input type="hidden" name="CANDIDATE_NAME" value="{{$candidate->NAME}}">

                    <div class="col-md-12">
                        <div class="submit_btn">
                            <button class="boxed-btn3 w-100" type="submit">Invite candidate to interview</button>
                        </div>
                    </div>

                </div>
            </form>
        @endif
    @endif
</div>