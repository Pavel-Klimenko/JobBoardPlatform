<div class="job_filter white-bg">
    <div class="form_inner white-bg">
        <h3>Vacancy filter</h3>

        @if($filterSetFlag)
            <a href="{{ route('browse-job') }}" class="btn btn-outline-danger">Reset filter</a>
            <br/><br/><br/>
        @endif

        <form action="{{ route('browse-job') }}">
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

                @if (count($jobCategories) > 0)
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
                @endif

                <div class="col-lg-12">
                    <div class="single_field">
                        <select class="sorting-list" name="SORT" class="wide">
                            <option selected disabled>Sorting</option>
                            <option value="highestSalary" @if(isset($_GET['SORT'])) @if($_GET['SORT'] == 'highestSalary') selected @endif @endif>
                                Highest salary
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