<form class="form-contact contact_form" method="POST" action="{{ route('contact-us') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <textarea class="form-control w-100" name="MESSAGE" id="message" cols="30"
                          rows="9" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Type your message'"
                          placeholder='Enter Message'>{{ old('MESSAGE') }}</textarea>
            </div>
{{--            @error('MESSAGE')
            <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
            @enderror--}}
        </div>


        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" name="NAME" id="name" type="text"
                       onfocus="this.placeholder = ''"
                       value="{{ old('NAME') }}"
                       onblur="this.placeholder = 'Name'"
                       placeholder='Enter your name'>
            </div>
{{--            @error('NAME')
            <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
            @enderror--}}
        </div>


        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" name="EMAIL" id="email" type="email"
                       onfocus="this.placeholder = ''"
                       value="{{ old('EMAIL') }}"
                       onblur="this.placeholder = 'Email address'"
                       placeholder='Enter email address'>
            </div>
{{--            @error('EMAIL')
            <div class="alert alert-danger">{{ mb_strtoupper($message) }}</div>
            @enderror--}}
        </div>

    </div>

    <div class="form-group mt-3">
        <button type="submit" class="button button-contactForm btn_4 boxed-btn send-data-form">
            Send Message
        </button>
    </div>
</form>