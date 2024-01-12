<div class="job_details_area">
    <div class="apply_job_form white-bg">
        <form action="{{ route('update-user-info') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h5>Name:</h5>
                    <div class="input_field">
                        <input type="text" required name="NAME" value="{{$user->NAME}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Country:</h5>
                    <div class="input_field">
                        <input type="text" required name="COUNTRY" value="{{$user->COUNTRY}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>City:</h5>
                    <div class="input_field">
                        <input type="text" required name="CITY" value="{{$user->CITY}}">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Phone:</h5>
                    <div class="input_field">
                        <input type="tel" required name="PHONE" value="{{$user->PHONE}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="single_field input_field">
                        <select required name="CATEGORY_ID" class="wide">
                            @foreach($jobCategories as $category)
                                <option value="{{$category->ID}}" @if($category->ID == $user->CATEGORY_ID) selected @endif>
                                    {{$category->NAME}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><br /><br /><br />

                <div class="col-md-6">
                    <div class="single_field input_field">
                        <select required name="LEVEL" class="wide">
                            <option value="Junior" @if($user->LEVEL == 'Junior') selected @endif>
                                Junior
                            </option>
                            <option value="Middle" @if($user->LEVEL == 'Middle') selected @endif>
                                Middle
                            </option>
                            <option value="Senior" @if($user->LEVEL == 'Senior') selected @endif>
                                Senior
                            </option>
                            <option value="Team-lead" @if($user->LEVEL == 'Team-lead') selected @endif>
                                Team-lead
                            </option>
                        </select>
                    </div>
                </div><br /><br /><br />

                <div class="col-md-6">
                    <h5>Years experience:</h5>
                    <div class="input_field">
                        <input type="number" required name="YEARS_EXPERIENCE"
                                max="80" value="{{$user->YEARS_EXPERIENCE}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Desired salary:</h5>
                    <div class="input_field">
                        <input type="number" required name="SALARY"
                               max="99999999999" value="{{$user->SALARY}}">
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Experience:</h5>
                    <div class="input_field">
                        <textarea required name="EXPERIENCE">{{$user->EXPERIENCE}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Education:</h5>
                    <div class="input_field">
                        <textarea required name="EDUCATION">{{$user->EDUCATION}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Technical skills: </h5>
                    <div class="input_field">
                        <textarea required name="SKILLS">{{ $user->SKILLS}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Languages:</h5>
                    <div class="input_field">
                        <textarea required name="LANGUAGES">{{ $user->LANGUAGES}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>About me:</h5>
                    <div class="input_field">
                        <textarea required name="ABOUT_ME">{{ $user->ABOUT_ME}}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="submit_btn">
                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Save</button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

