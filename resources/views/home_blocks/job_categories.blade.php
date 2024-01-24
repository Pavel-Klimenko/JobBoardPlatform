<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Job Categories</h3>
                </div>
            </div>
        </div>
            <div class="row">
                @foreach ($jobCategories as $category)
                    @if($category['QUANTITY_OF_VACANCIES'] > 0)
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="single_catagory">
                                <a href="/browse-job?CATEGORY_ID={{$category['ID']}}">
                                    <h4>{{ucfirst($category['NAME'])}}</h4>
                                </a>
                                <p><span>{{$category['QUANTITY_OF_VACANCIES']}}</span> Available positions</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </form>
    </div>
</div>
