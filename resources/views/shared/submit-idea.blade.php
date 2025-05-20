<h4> Share yours ideas </h4>
<form action={{route('idea.create')}} method="POST">
    @csrf
    <div class="row">
        <div class="mb-3">
            <textarea class="form-control" name="idea" id="idea" rows="3"></textarea>
            @error('idea')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>

            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </div>
</form>
