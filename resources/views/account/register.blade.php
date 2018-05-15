@extends('layouts.account')

@section('title', 'Register')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>Sign Up</h3>
            <p></p>
            <form class="m-t" role="form" autocomplete="off" method="post" action="{{ route('login') }}">
                <div class="row">
                    <div class="form-group">
                        <input type="text" id="txtEmail" name="name" placeholder="Name" value=""
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" id="txtEmail" name="email" placeholder="Email" value=""
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" id="txtPassword" name="password" placeholder="Password" value=""
                               class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary block full-width m-b" value="Register" name="register">
                    <p class="text-muted text-center">
                        <small>Already have a account?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Sign in</a>
                </div>
                {{csrf_field()}}
            </form>
            <p class="m-t">
                <small>MAJ &copy; <?php echo date( "Y" ); ?></small>
            </p>
        </div>
    </div>
@endsection

