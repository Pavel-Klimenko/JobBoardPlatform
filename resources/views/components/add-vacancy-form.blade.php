<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="apply_job_form white-bg">
                    <h4>Add new vacancy</h4>


                    <form action="{{ route('create-vacancy') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input_field">
                                    <input type="text" name="NAME" value="{{ old('NAME') }}" placeholder="Vacancy title">
                                </div>
                                @error('NAME')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" name="COUNTRY" value="{{ old('COUNTRY') }}" placeholder="Country">
                                </div>
                                @error('COUNTRY')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" name="CITY" value="{{ old('CITY') }}" placeholder="City">
                                </div>
                                @error('CITY')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="single_field input_field">
                                    <select required name="CATEGORY_ID" class="wide">
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
                                    <input type="number" max="9999999" name="SALARY_FROM" value="{{ old('SALARY_FROM') }}" placeholder="Salary from (USD)">
                                </div>
                                @error('SALARY_FROM')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="DESCRIPTION" id="" cols="30" rows="10"
                                                  placeholder="Vacancy description">{{ old('DESCRIPTION') }}</textarea>
                                </div>
                                @error('DESCRIPTION')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="RESPONSIBILITY" id="" cols="30" rows="10"
                                                  placeholder="Responsibilities. Every responsibility on a new line">{{ old('RESPONSIBILITY') }}</textarea>
                                </div>
                                @error('RESPONSIBILITY')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="QUALIFICATIONS" id="" cols="30" rows="10"
                                                  placeholder="Qualifications. Every qualification on a new line">{{ old('QUALIFICATIONS') }}</textarea>
                                </div>
                                @error('QUALIFICATIONS')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="input_field">
                                        <textarea name="BENEFITS" id="" cols="30" rows="10"
                                                  placeholder="Vacancy benefits">{{ old('BENEFITS') }}</textarea>
                                </div>
                                @error('BENEFITS')
                                <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn3 w-100 send-data-form" type="submit">Add vacancy</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>