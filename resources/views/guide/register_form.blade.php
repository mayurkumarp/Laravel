@extends('auth.register')
@section('register_form')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/guide/register') }}">
    {{ csrf_field() }}
     <div class="form-group{{ $errors->has('first_name')||$errors->has('last_name') ? ' has-error' : '' }}">
        <label for="first_name" class="col-sm-3 control-label">Name:</label>

        <div class="col-sm-4">
            <input id="first_name" type="text" class="form-control height-auto" name="first_name" value="{{ old('first_name') }}" placeholder="first name">

            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-4">
            <input id="last_name" type="text" class="form-control height-auto" name="last_name" value="{{ old('last_name') }}" placeholder="last name">

            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Gender</label>
        <div class="col-sm-8">
            
                    <input type="radio" name="gender" value="male"  /> Male <span class="fa fa-male"></span>
                
                    <input type="radio" name="gender" value="female" /> Female <span class="fa fa-female"></span>
               

        @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <label for="phone_number" class="col-sm-3 control-label">Contact</label>

        <div class="col-sm-8">
            <input id="phone_number" type="text" class="form-control height-auto" name="phone_number" value="{{ old('phone_number') }}" placeholder="Mobile number">

            @if ($errors->has('phone_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-8">
            <textarea id="address" type="text" class="form-control height-auto" name="address" placeholder="Place, City, State...">{{ old('address') }}</textarea>

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
        <label for="city" class="col-sm-3 control-label">City</label>
        <div class="col-sm-8">
            <input id="address" type="text" class="form-control height-auto" name="city" value="{{ old('city') }}" placeholder="City"/>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-sm-3 control-label">E-Mail</label>

        <div class="col-sm-8">
            <input id="email" type="email" class="form-control height-auto" name="email" value="{{ old('email') }}" placeholder="Email Address">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-sm-3 control-label">Password</label>

        <div class="col-sm-8">
            <input id="password" type="password" class="form-control height-auto" name="password" placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="col-sm-3 control-label">Confirm Password</label>

        <div class="col-sm-8">
            <input id="password-confirm" type="password" class="form-control height-auto" name="password_confirmation" placeholder="Confirm password">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-3">
            <button type="submit" class="btn btn-primary btn-normal pull-right">
                <i class="fa fa-btn fa-user"></i> Register
            </button>
        </div>
    </div>
</form>
@endsection