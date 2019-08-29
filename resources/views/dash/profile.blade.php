@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    My Profile
                </p>
                <p class="sub-header-title">
                    Ensure your account is healthy to be used
                </p>
            </div>
        </div>

        <dashboard-profile></dashboard-profile>

    </div>
@endsection
