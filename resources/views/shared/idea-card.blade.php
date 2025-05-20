<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{route('idea.destroy', $idea->id)}}" method="POST">
                    <a href="{{route('idea.edit', $idea->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{route('idea.show', $idea->id)}}" class="btn btn-sm btn-primary">View</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">X</button>
                </form>
            </div>
        </div>
    </div>

        <div class="card-body">
            @if ( $editing ?? false)
                <form action={{route('idea.update', $idea)}} method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <textarea class="form-control" name="idea" id="idea" rows="3">{{$idea->content}}</textarea>
                             @error('idea')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-dark"> Update </button>
                        </div>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{$idea->likes}} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{$idea->created_at}} </span>
                </div>
            </div>
            @include('shared.comment')
        </div>
    </div>
