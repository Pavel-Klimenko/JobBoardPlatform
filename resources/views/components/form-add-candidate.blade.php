<form method="POST" action="{{ route('create-candidate') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="input_field">
                <input type="text" name="NAME" placeholder="Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input_field">
                <input type="text" name="SURNAME" placeholder="Surname">
            </div>
        </div>

        <div class="col-md-8">
            <div class="input_field">
                <input type="text" name="LOCATION" placeholder="Your location">
            </div>
        </div>

        <div class="col-md-6">
            <div class="single_field input_field">
                <select name="CATEGORY_ID" class="wide">
                    <option data-display="Specialization">Specialization</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->ID }}">{{ $category->NAME }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="single_field input_field">
                <select name="LEVEL" class="wide">
                    <option selected disabled>Level</option>
                    <option value="trainee">Trainee</option>
                    <option value="junior">Junior</option>
                    <option value="middle">Middle</option>
                    <option value="senior">Senior</option>
                    <option value="team-lead">Team lead</option>
                </select>
            </div>
        </div>
        <br/><br/><br/>

        <div class="col-md-6">
            <div class="input_field">
                <input name="SALARY" placeholder="Salary you want to receive">
            </div>
        </div>
        <div class="col-md-6">
            <div class="single_field input_field">
                <select name="YEARS_EXPERIENCE" class="wide">
                    <option selected disabled>Years experience</option>
                    <option value="less-one">Less 1 year</option>
                    <option value="one-three">1-3 years</option>
                    <option value="three-five">3-5 years</option>
                    <option value="more-five">More than 5 years</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="AVATAR" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                    <label class="custom-file-label" for="inputGroupFile03">Upload avatar</label>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="input_field">
            <textarea name="EXPERIENCE" id="" cols="30" rows="10"
                      placeholder="Describe your experience"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input_field">
            <textarea name="EDUCTION" id="" cols="30" rows="10"
                      placeholder="Describe your education"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input_field">
            <textarea name="SKILLS" id="" cols="30" rows="10"
                      placeholder="List your skills. Every skill from a new line."></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input_field">
            <textarea name="LANGUAGES" id="" cols="30" rows="10"
                      placeholder="List your languages. Every language from a new line."></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input_field">
            <textarea name="ABOUT_ME" id="" cols="30" rows="10"
                      placeholder="Describe yourself. (Hobby, Interests and etc.)"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="submit_btn">
                <button class="boxed-btn3 w-100" type="submit">Add vacancy</button>
            </div>
        </div>
    </div>
</form>