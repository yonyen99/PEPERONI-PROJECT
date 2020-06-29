@extends('layouts.main')
@yield('content')
<div class="auth">
  <div class="auth__header">
    
  </div>
  <div class="auth__body">
    
    
    @if(isset(Auth::user()->email))
    <script>window.location="/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

    <form class="auth__form" autocomplete="off" action="{{ url('/checkregister') }}" method="post">
      @csrf
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea   class="form-control" placeholder="Address" name="adress"></textarea>
          </div>
          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="1" name="role" id="role" >I'm a manager
            </label>
        </div>
        {{-- <div class="form-group">
          <input type="hidden" class="form-control" name="csrf-token" value="{{csrf_token()}}">
        </div> --}}
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="{{ url('/logout') }}" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
