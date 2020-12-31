@extends('layouts.app')
@section("title","DelwarIT's Dashboard")

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

        @if(auth()->user()->admin == 1 || auth()->user()->admin == 2)
            <div>
                <h1 class="logo-name mt-5">WELCOME</h1>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary block full-width m-b mt-5">Dashboard Link</a>
            <span class="text-center text-info">(Click Dashboard Link)</span>

            <a href="{{ route('logout') }}" class="btn btn-danger full-width mt-5">Logout</a>

        @else
            <div>
                <h1 class="logo-name">Sorry</h1>
            </div>
            <h3 class="mt-5 text-danger">You have no permission for management.</h3>
            <a href="{{ route('logout') }}" class="btn btn-danger full-width mt-5">Logout</a>
        @endif
            

            <p class="m-t"> <small>All Copyrights Reserved By <a href="https://delwarit.com" target="_blank">DelwarIT</a></small> </p>
        </div>
    </div>

@endsection




