@extends('template')

@section('page')

    <div class="row">
        <div class="col-md-6">
            <h3>Offering {{ $offering->project_name }}</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>
@stop

@section('content')

    <script>
        $(function () {
            $('#settings a').click(function (e) {
                e.preventDefault();
                $('a[href="' + $(this).attr('href') + '"]').tab('settings');
            })
        });
    </script>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Offering</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Comments</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Primera pestaña General -->
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                @include('offerings/generaltab')
            </div>
            <!-- Fin Primera pestaña General -->

            <!-- Pestaña Comentarios -->
            <div role="tabpanel" class="tab-pane fade" id="settings">
                @include('offerings/comments')
            </div>
            <!-- fin pestaña comentarios-->

        </div>

    </div>



@stop
