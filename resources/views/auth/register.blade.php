@extends('layouts.app')

@section('title')
    Registration
@endsection

@section('content')
    <div class="job_details_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                               class="form-control @error('PHONE') is-invalid @enderror" name="PHONE"
                                               value="{{ old('PHONE') }}">
                                        @error('PHONE')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="country"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                    <div class="col-md-6">
                                        <input id="country" type="text"
                                               class="form-control @error('COUNTRY') is-invalid @enderror" name="COUNTRY"
                                               value="{{ old('COUNTRY') }}">
                                            @error('COUNTRY')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                               class="form-control @error('CITY') is-invalid @enderror" name="CITY"
                                               value="{{ old('CITY') }}">
                                           @error('CITY')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>

{{--                                <div class="row mb-3">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" id="inputGroupFileAddon03"><i
                                                            class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="IMAGE" class="custom-file-input"
                                                       id="userUploadImage"
                                                       aria-describedby="inputGroupFileAddon03">
                                                <label class="custom-file-label" for="inputGroupFile03">Upload image</label>
                                            </div>
                                        </div>
                                        <p class="uploaded-file"></p>
                                    </div>
                                </div>--}}


                                <div class="row mb-3">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Account type') }}</label>
                                    <div class="col-md-6">
                                        <select id="account_type" name="role_name" class="wide">
                                            <option value="company">Company</option>
                                            <option value="candidate">Candidate</option>
                                        </select>
                                    </div>
                                </div>


                                {{--company fields--}}

                                <div class="row mb-3" id="EMPLOYEE_CNT_INPUT">
                                        <label for="website"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Amount of workers') }} </label>
                                        <div class="col-md-6">
                                            <input id="website" type="number"
                                                   class="form-control @error('EMPLOYEE_CNT') is-invalid @enderror"
                                                   name="EMPLOYEE_CNT"
                                                   value="{{ old('EMPLOYEE_CNT') }}"
                                                   autocomplete="website" autofocus>
                                            @error('EMPLOYEE_CNT')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" id="WEB_SITE_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                                    <div class="col-md-6">
                                        <input id="website" type="text"
                                               class="form-control @error('WEB_SITE') is-invalid @enderror"
                                               name="WEB_SITE"
                                               value="{{ old('WEB_SITE') }}"
                                               autocomplete="website" autofocus>
                                        @error('WEB_SITE')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" id="DESCRIPTION_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Company description') }}</label>
                                    <div class="col-md-6">
                                <textarea name="DESCRIPTION" id="" cols="26" rows="15"
                                          placeholder="Company description">{{ old('DESCRIPTION') }}</textarea>
                                    </div>
                                    @error('DESCRIPTION')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                {{--candidate fields--}}
                                <div class="row mb-3" id="CATEGORY_ID_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Base technology') }}</label>
                                    <div class="col-md-6">
                                        @php $jobCategories = \App\Models\JobCategories::all();@endphp
                                        <select id="account_type" name="CATEGORY_ID" class="wide">
                                            @foreach($jobCategories as $category)
                                                <option value="{{$category->ID}}">{{$category->NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3" id="LEVEL_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Your level') }}</label>
                                    <div class="col-md-6">
                                        <select id="account_type" name="LEVEL" class="wide">
                                            <option value="Junior" selected>Junior</option>
                                            <option value="Middle">Middle</option>
                                            <option value="Senior">Senior</option>
                                            <option value="Team-lead">Team-lead</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3" id="YEARS_EXPERIENCE_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Years experience') }}</label>

                                    <div class="col-md-6">
                                        <input id="website" type="number"
                                               class="form-control @error('YEARS_EXPERIENCE') is-invalid @enderror"
                                               name="YEARS_EXPERIENCE"
                                               value="{{ old('YEARS_EXPERIENCE') }}"
                                               autocomplete="website" autofocus>
                                        @error('YEARS_EXPERIENCE')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" id="SALARY_INPUT">
                                    <label for="website"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Desired salary') }}</label>

                                    <div class="col-md-6">
                                        <input id="website" type="number"
                                               class="form-control @error('SALARY') is-invalid @enderror"
                                               name="SALARY"
                                               value="{{ old('SALARY') }}"
                                               autocomplete="website" autofocus>
                                        @error('SALARY')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" id="EXPERIENCE_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>
                                    <div class="col-md-6">
                                <textarea name="EXPERIENCE" id="" cols="26" rows="15"
                                          placeholder="Describe your experience"></textarea>
                                    </div>
                                    @error('EXPERIENCE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3" id="EDUCATION_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>
                                    <div class="col-md-6">
                                <textarea name="EDUCATION" id="" cols="26" rows="15"
                                          placeholder="Describe your education"></textarea>
                                    </div>
                                    @error('EDUCATION')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3" id="SKILLS_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>
                                    <div class="col-md-6">
                                <textarea name="SKILLS" id="" cols="26" rows="15"
                                          placeholder="Every skill on a new line"></textarea>
                                    </div>
                                    @error('SKILLS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="row mb-3" id="LANGUAGES_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Languages') }}</label>
                                    <div class="col-md-6">
                                <textarea name="LANGUAGES" id="" cols="26" rows="15"
                                          placeholder="Every language on a new line"></textarea>
                                    </div>
                                    @error('LANGUAGES')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3" id="ABOUT_ME_INPUT">
                                    <label for="account_type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('About me') }}</label>
                                    <div class="col-md-6">
                                <textarea name="ABOUT_ME" id="" cols="26" rows="15"
                                          placeholder="Describe you interests, hobbies and etc."></textarea>
                                    </div>
                                    @error('ABOUT_ME')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
