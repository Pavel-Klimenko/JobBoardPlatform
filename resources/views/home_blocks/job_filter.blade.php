<!-- catagory_area -->
<div class="catagory_area">

    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Find job:</h3>
                </div>
            </div>
        </div>
        <form action="{{ route('browse-job') }}">
            @csrf
            <div class="row cat_search">
                <div class="col-lg-4 col-md-4">
                    <div class="single_input">
                        <select name="CITY" class="wide">
                            <option selected disabled>City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->CITY }}">{{ $city->CITY }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="single_input">
                        <select name="CATEGORY_ID" class="wide">
                            <option selected disabled>Base technology</option>
                            @foreach ($jobCategories as $category)
                                <option value="{{ $category->ID }}">{{ $category->NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn" id="find_job">
                        <button type="submit" class="boxed-btn3">Find Job</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/ catagory_area -->