@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile -->
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <profile-component></profile-component>
        </div>
    </div>
    <!-- Profile End -->
</div>
@endsection
