@include('admin_area.inc.header')
<x-admin-menu/>

<link rel="stylesheet"
      href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center text-center">
            </div>

            <form action="{{ route('update-entity') }}" method="post">
                @csrf
                <div class="col-lg-8">
                    <input type="hidden" name="entity" class="form-control" value="vacancy">
                    <input type="hidden" name="id" class="form-control" value="{{$vacancy->ID}}">

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Title:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="NAME" class="form-control" value="{{$vacancy->NAME}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Country:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="COUNTRY" class="form-control" value="{{$vacancy->COUNTRY}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>City:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="CITY" class="form-control" value="{{$vacancy->CITY}}">
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
                                            @if($category->ID == $vacancy->CATEGORY_ID) selected @endif>
                                        {{$category->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Salary from (USD):</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" max="9999999" required name="SALARY_FROM" class="form-control"
                                   value="{{$vacancy->SALARY_FROM}}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Description:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="DESCRIPTION">{{$vacancy->DESCRIPTION}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Responsibilities:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="RESPONSIBILITY">{{$vacancy->RESPONSIBILITY}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Qualifications:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="QUALIFICATIONS">{{$vacancy->QUALIFICATIONS}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Vacancy benefits:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="BENEFITS">{{$vacancy->BENEFITS}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Activity:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select required name="ACTIVE" class="wide">
                                <option value="1" @if($vacancy->ACTIVE == 1) selected @endif>Active</option>
                                <option value="0" @if($vacancy->ACTIVE == 0) selected @endif>Not Active</option>
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
