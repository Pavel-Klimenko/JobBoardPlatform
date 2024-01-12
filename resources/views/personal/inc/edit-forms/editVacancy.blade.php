<div class="job_details_area">
    <div class="apply_job_form white-bg">

        <form action="{{ route('update-vacancy') }}" method="post" class="edit_vacancy_form">
            @csrf

            <div class="row">
                <input type="hidden" name="VACANCY_ID" class="vacancy VACANCY_ID">


                <div class="col-md-12">
                    <div class="input_field">
                        <input type="text" name="NAME" class="vacancy NAME" placeholder="Vacancy title" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input_field">
                        <input type="text" name="COUNTRY" class="vacancy COUNTRY" placeholder="Country" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input_field">
                        <input type="text" name="CITY" class="vacancy CITY" placeholder="City" required>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="single_field input_field">
                        <select required name="CATEGORY_ID" class="wide vacancy CATEGORY_ID">
                            <option selected disabled>Programming language</option>
                            @foreach($jobCategories as $category)
                                <option value="{{$category->ID}}">
                                    {{$category->NAME}}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div><br /><br /><br />


                <div class="col-md-6">
                    <div class="input_field">
                        <input type="number" max="9999999" name="SALARY_FROM" class="vacancy SALARY_FROM" placeholder="Salary from (USD)" required>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="DESCRIPTION" class="vacancy DESCRIPTION" cols="30" rows="10"
                                  placeholder="Vacancy description" required></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="RESPONSIBILITY" class="vacancy RESPONSIBILITY" cols="30" rows="10"
                                  placeholder="Responsibilities. Every responsibility on a new line" required></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="QUALIFICATIONS" class="vacancy QUALIFICATIONS" cols="30" rows="10"
                                  placeholder="Qualifications. Every qualification on a new line" required></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input_field">
                        <textarea name="BENEFITS" class="vacancy BENEFITS" cols="30" rows="10"
                                  placeholder="Vacancy benefits" required></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="submit_btn">
                        <button class="boxed-btn3 w-100 send-data-form" type="submit">Save vacancy</button>
                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

