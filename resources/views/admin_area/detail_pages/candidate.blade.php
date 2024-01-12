@include('admin_area.inc.header')
<x-admin-menu/>

<link rel="stylesheet"
      href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center text-center">

                    @if($user->IMAGE)
                        <img class="rounded-circle p-1 bg-primary" width="110" src="{{asset($user->IMAGE)}}" alt="">
                    @endif

                    <div class="mt-3">
                        <h4>{{$user->NAME}}</h4>
                        <p class="text-secondary mb-1">
                            {{ $user->LEVEL }}
                            {{ ucfirst($category->NAME)}}
                            developer
                        </p>
                        <p class="text-muted font-size-sm">{{$user->CITY}}, {{$user->COUNTRY}}</p>
                    </div>
                </div>
                <hr class="my-4">
            </div>


            <form action="{{ route('admin-update-user') }}" method="post">
                @csrf
                <div class="col-lg-8">
                    <input type="hidden" required name="id" class="form-control" value="{{$user->id}}">
                    <input type="hidden" required name="role_id" class="form-control" value="{{$user->role_id}}">

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Image url:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="IMAGE" class="form-control" value="{{$user->IMAGE}}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Name:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="NAME" class="form-control" value="{{$user->NAME}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Country:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="COUNTRY" class="form-control" value="{{$user->COUNTRY}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>City:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="CITY" class="form-control" value="{{$user->CITY}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Phone:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="PHONE" class="form-control" value="{{$user->PHONE}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Category:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select required name="CATEGORY_ID" class="wide">
                                @foreach($jobCategories as $category)
                                    <option value="{{$category->ID}}"
                                            @if($category->ID == $user->CATEGORY_ID) selected @endif>
                                        {{$category->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Level:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
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
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Years experience:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" required name="YEARS_EXPERIENCE"
                                   max="80" value="{{$user->YEARS_EXPERIENCE}}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Desired salary ($):</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" required name="SALARY"
                                   max="99999999999" value="{{$user->SALARY}}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Experience:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="EXPERIENCE">{{$user->EXPERIENCE}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Education:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="EDUCATION">{{$user->EDUCATION}}</textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Technical skills:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="SKILLS">{{ $user->SKILLS}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Languages:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="LANGUAGES">{{ $user->LANGUAGES}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>About me:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="ABOUT_ME">{{ $user->ABOUT_ME}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Activity:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select required name="ACTIVE" class="wide">
                                <option value="1" @if($user->ACTIVE == 1) selected @endif>Active</option>
                                <option value="0" @if($user->ACTIVE == 0) selected @endif>Not Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                        </div>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>


@include('admin_area.inc.footer')
