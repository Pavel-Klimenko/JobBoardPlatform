@include('admin_area.inc.header')
<x-admin-menu/>

<link rel="stylesheet"
      href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center text-center">
                    @if($review->PHOTO)
                        <img class="rounded-circle p-1 bg-primary" width="110" src="{{asset($review->PHOTO)}}" alt="">
                    @endif
                </div>
                <hr class="my-4">
            </div>

            <form action="{{ route('update-entity') }}" method="post">
                @csrf
                <div class="col-lg-8">
                    <input type="hidden" name="entity" class="form-control" value="review">
                    <input type="hidden" required name="id" class="form-control" value="{{$review->ID}}">

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>User name:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="NAME" class="form-control" value="{{$review->NAME}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>User photo:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" required name="PHOTO" class="form-control" value="{{$review->PHOTO}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Review:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea required name="REVIEW">{{$review->REVIEW}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"><b>Activity:</b></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select required name="ACTIVE" class="wide">
                                <option value="1" @if($review->ACTIVE == 1) selected @endif>Active</option>
                                <option value="0" @if($review->ACTIVE == 0) selected @endif>Not Active</option>
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
