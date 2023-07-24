<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/login.css') }}" rel="stylesheet">
</head>

<body>
    <div class="col-md-2 col-md-offset-4 form-login">

        @if ($message = Session::get('gagal'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Warning!</strong> {{ $message }}
            </div>
        @endif

        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>
            <form action="{{ url('auth-login') }}" class="inner-login" method="post">
                @csrf
                <h3 class="text-center title-login">Halaman Login</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama_admin" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="kata_sandi" placeholder="Password">
                </div>

                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />

                <div class="text-center forget">
                    <p>Desa Penusupan</p>
                    <a href="/">Halaman Awal</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
</body>

</html>
