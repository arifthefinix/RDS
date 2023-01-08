
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/dcb38ccf24.js" crossorigin="anonymous"></script>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">
{{--    <!-- Theme style -->--}}
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{  $incident }}</h3>
                        <p>Total Incident</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <Link :href="route('incidents.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
                </div>
            </div>
            <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{  $respondent }}</h3>
                        <p>Total Respondent</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <Link :href="route('respondents.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
                </div>
            </div>
            <div class="col-md-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{  $team }}</h3>
                        <p>Total Teams</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <Link :href="route('teams.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
                </div>
            </div>
        </div>
        <section>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Incidents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Incident Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($incidents as $key=> $incident)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $incident->title}}</td>
                                <td>{{ $incident->contact_person_name}}</td>
                                <td>{{ $incident->contact_person_number}}</td>
                                <td>{{ $incident->incident_address}}</td>
                                <td>
                                    <p>{{ ($incident->status==2)?'Critical':'Serious' }}</p>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
