<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment for Full-Stack Web Developer | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets') }}/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets') }}/css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets') }}/css/adminlte.min.css">
            @routes
            @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
            @inertiaHead
</head>
<body class="hold-transition sidebar-mini">
@inertia

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/assets') }}/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets') }}/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets') }}/js/adminlte.min.js"></script>
</body>
</html>
