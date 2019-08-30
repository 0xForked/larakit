@extends('layouts.app')

@section('content')
    <div class="main-content">

        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    My Contacts
                </p>
                <p class="sub-header-title">
                    Latest report updated this week and on
                </p>
            </div>
        </div>
        <dashboard-contact></dashboard-contact>
    </div>
@endsection
