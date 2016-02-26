@extends('master')

@section('page')
    Tasks
@stop

@section('content')
    <table width="100%">
            <tr><td>Task ID</td><td>Name</td><td>Explain</td><td>Details</td></tr>

        @foreach($tasks as $task)

            <tr height="40"><td>{{$task->id}}</td><td>{{$task->title}}</td><td>{{$task->body}}</td><td><a href="tasks/{{ $task-> id }}"> ver detalle </a></td></tr>

        @endforeach
    </table>

<?php
    $stocksTable = Lava::DataTable(); //if using Laravel

    $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Projected')
            ->addNumberColumn('Official');

    // Random Data For Example
    for ($a = 1; $a < 30; $a++)
    {
        $rowData = array(
                "2016-8-$a", rand(800,1000), rand(800,1000)
        );

        $stocksTable->addRow($rowData);
    }

    $chart = Lava::LineChart('myFancyChart');  // Lava::LineChart() if using Laravel

    $chart->datatable($stocksTable);

    // You could also pass an associative array to setOptions() method
    // $chart->setOptions(array(
    //   'datatable' => $stocksTable
    // ));

    // Example #1, output into a div you already created
    // <div id="myStocks"></div>
    echo Lava::render('LineChart', 'myFancyChart', 'myStocks');

    /* Example #2, have the library create the div
    echo $lava->render('LineChart', 'myFancyChart', 'myStocks', true);

    // Example #3, have the library create the div with a fixed size
    echo $lava->render('LineChart', 'myFancyChart', 'myStocks', array('height'=>300, 'width'=>600));

    echo $linechart->render('myStocks');

*/

?>


    <div id="myStocks"></div>

@stop