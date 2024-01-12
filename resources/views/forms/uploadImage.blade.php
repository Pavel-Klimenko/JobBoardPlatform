<form method="POST" action="{{ route('upload-user-image') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" id="inputGroupFileAddon03"><i
                                class="fa fa-cloud-upload" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="custom-file">
                    <input name="IMAGE" type="file" class="custom-file-input" id="user-image"
                           aria-describedby="inputGroupFileAddon03">
                    <label class="custom-file-label" for="inputGroupFile03">Set image</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <p class="uploaded-file"></p>
        </div>
        <br/><br/>

        <div class="col-md-6" id="sendButton" style="display: none">
            <div class="submit_btn">
                <button class="boxed-btn3 w-100" type="submit">Upload</button>
            </div>
        </div>
    </div>
</form>