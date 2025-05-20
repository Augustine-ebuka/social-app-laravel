@extends('layouts.layout')

@section('content')
<!DOCTYPE html>
<html lang="EN">
        <div class="row">
            {{-- left card --}}
            <div class="col-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">
                                    <span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Explore</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Feed</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/terms">
                                    <span>Terms</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Support</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="#">View Profile </a>
                    </div>
                </div>
            </div>
            {{-- middle card --}}
            <div class="col-6">
                @include('shared.success-message')

                @include('shared.submit-idea')
                <hr>
                @foreach ( $ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                        @endforeach
                </div class="mt-3">
                        {{ $ideas->links() }}

            </div>
            {{-- right card --}}
            <div class="col-3">
                @include('shared.search')
            </div>
        </div>
</html>
@endsection
