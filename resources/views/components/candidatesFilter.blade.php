<div class="job_filter white-bg">
    <div class="form_inner white-bg">
        <h3>Candidate filter</h3>

        @if($filterSetFlag)
            <a href="{{ route('candidates') }}" class="btn btn-outline-danger">Reset filter</a>
            <br/><br/><br/>
        @endif

        <form action="{{ route('candidates') }}">
            <div class="row">
                @if (count($cities) > 0)
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="cities-list" name="CITY" class="wide">
                                <option selected disabled>City</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->CITY}}"
                                            @if(isset($_GET['CITY']))
                                                @if($_GET['CITY'] == $city->CITY)
                                                    selected
                                                @endif
                                            @endif
                                    >
                                        {{$city->CITY}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="categories-list" name="CATEGORY_NAME" class="wide">
                                <option selected disabled>Base technology</option>
                                @foreach($jobCategories as $category)
                                    <option value="{{$category->NAME}}"
                                            @if(isset($_GET['CATEGORY_NAME']))
                                                @if($_GET['CATEGORY_NAME'] == $category->NAME)
                                                    selected
                                                @endif
                                            @endif
                                    >
                                        {{$category->NAME}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="sorting-list" name="LEVEL" class="wide">
                                <option selected disabled>Level</option>
                                <option value="Junior" @if(isset($_GET['LEVEL'])) @if($_GET['LEVEL'] == 'Junior') selected @endif @endif>
                                    Junior
                                </option>
                                <option value="Middle" @if(isset($_GET['LEVEL'])) @if($_GET['LEVEL'] == 'Middle') selected @endif @endif>
                                    Middle
                                </option>
                                <option value="Senior" @if(isset($_GET['LEVEL'])) @if($_GET['LEVEL'] == 'Senior') selected @endif @endif>
                                    Senior
                                </option>
                                <option value="Team-lead" @if(isset($_GET['LEVEL'])) @if($_GET['LEVEL'] == 'Team-lead') selected @endif @endif>
                                    Team-lead
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="sorting-list" name="SORT" class="wide">
                                <option selected disabled>Sorting</option>
                                <option value="maxExperience" @if(isset($_GET['SORT'])) @if($_GET['SORT'] == 'maxExperience') selected @endif @endif>
                                    Most experienced
                                </option>
                                <option value="newest" @if(isset($_GET['SORT'])) @if($_GET['SORT'] == 'newest') selected @endif @endif>
                                    Newest
                                </option>
                            </select>
                        </div>
                    </div>
            </div>

            <div class="reset_btn">
                <button class="boxed-btn3 w-100" type="submit">Filter results</button>
            </div>
            <br/>
        </form>
    </div>
</div>