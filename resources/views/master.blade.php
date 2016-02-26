<!DOCTYPE html>
<html>
<head>
    <title>Project Sites</title>
    {!! Html::style('css/style.css') !!}
    <!--fonts-->
    {!! Html::style('fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic') !!}
    <!--link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'-->

    <!--//fonts-->
    {!! Html::style('css/bootstrap.css') !!}

    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Revenant Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!-- js -->
    {!! Html::script('js/jquery.min.js') !!}
    <!-- js -->
    <!-- start-smooth-scrolling -->
    {!! Html::script('js/move-top.js') !!}
    {!! Html::script('js/easing.js') !!}
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smooth-scrolling -->

</head>
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-left">
            <ul>
                <li>+565 975 658</li>
                <li><a href="mail-to:project@presenceco.com">project@presenceco.com</a></li>
                <li>Monday - Friday, 8.00 - 20.00</li>
            </ul>
        </div>
        <div class="header-right">
            <ul>
                <li><a href="#">Bienvenido(a) @yield('session_name')</a></li>
                <li><a href="http://project.presenceco.com/auth/logout">Logout</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->
<!-- logo -->
<div id="home" class="logo">
    <div class="container">
        <h1>{!! HTML::decode(HTML::link('/', HTML::image('images/logo_presence.png'),array('class'=>'VinculoImg'))) !!}                     Project Status Site</h1>
        <p></p>
    </div>
</div>
<!-- //logo -->
<!-- navigation -->
<div class="navigation">
    <div class="container">
        <span class="menu">MENU</span>
        <ul class="nav1">
            <li>{!! HTML::decode(HTML::link('projects/', 'Dashboard ' . HTML::image('images/25.png'),array('class'=>'VinculoImg'))) !!}</a></li>
            <li>{!! HTML::decode(HTML::link('projects/create', 'New Project ' . HTML::image('images/25.png'),array('class'=>'VinculoImg'))) !!}</li>
            <li>{!! HTML::decode(HTML::link('charts', 'Charts ' . HTML::image('images/25.png'),array('class'=>'VinculoImg'))) !!}</li>
            <li>{!! HTML::decode(HTML::link('reports', 'Reports ' . HTML::image('images/25.png'),array('class'=>'VinculoImg'))) !!}</li>
            <li>{!! HTML::decode(HTML::link('catalog', 'Catalog ' . HTML::image('images/25.png'),array('class'=>'VinculoImg'))) !!}</li>
        </ul>
        <!-- script for menu -->
        <script>
            $( "span.menu" ).click(function() {
                $( "ul.nav1" ).slideToggle( 300, function() {
                    // Animation complete.
                });
            });
        </script>
        <!-- //script for menu -->
    </div>
</div>
<!-- //navigation -->

<!-- about -->
<div class="about">
    <div class="container">
        <div class="about-grids">
            <div class="about-left">
                <h3>@yield('page')</h3>
                {!! Html::image('images/27.png') !!}

                <p>

                @yield('content')
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //about -->

<!-- contact -->
<div id="contact" class="contact">
    <div class="container">
        <div class="contact-grids">
            <div class="col-md-3 contact-grid">
                <h3>General Status</h3>

                <?php
                $reasons = Lava::DataTable();
                $reasons->addStringColumn('Reasons')
                        ->addNumberColumn('Percent')
                        ->addRow(array('On Time', 5))
                        ->addRow(array('Risk', 2))
                        ->addRow(array('Wait', 4))
                        ->addRow(array('Pilot', 30)
                        );

                $piechart = Lava::PieChart('IMDB')
                        ->setOptions(array(
                                        'datatable' => $reasons,
                                    // 'backgroundColor' => '#fffff',
                                        'title' => 'Project Status',
                                )
                        );
                ?>

                <div id="chart-div" style="background: #ffffff"></div>
                {!! Lava::render('PieChart', 'IMDB', 'chart-div') !!}
                @yield('chart_pie')
            </div>
            <div class="col-md-3 contact-grid">
                <h3>Projects by region</h3>

                <?php
                $votes  = Lava::DataTable();
                $votes->addStringColumn('Region')
                        ->addNumberColumn('Projects')
                        ->addRow(array('CALA', rand(1000,5000)))
                        ->addRow(array('EMEA', rand(1000,5000)))
                        ->addRow(array('USA', rand(1000,5000)))
                        ->addRow(array('Brazil', rand(1000,5000)));

                $barchart = Lava::BarChart('Projects')
                        ->setOptions(array(
                                'datatable' => $votes
                        ));
                    ?>
                <div id="poll_div"></div>
                {!! Lava::render('BarChart', 'Projects', 'poll_div') !!}

            </div>
            <div class="col-md-3 contact-grid a">
                <h3>Projects by year</h3>

                <?php

                $population = Lava::DataTable();

                $population->addDateColumn('Year')
                        ->addNumberColumn('Projects')
                        ->addRow(array('2011', 50))
                        ->addRow(array('2012', 70))
                        ->addRow(array('2013', 90))
                        ->addRow(array('2014', 110));

                $areachart = Lava::AreaChart('Projects')
                        ->setOptions(array(
                                'datatable' => $population,
                                'title' => 'Projects by Year',
                                'legend' => Lava::Legend(array(
                                        'position' => 'in'
                                ))
                        ));
                ?>

                <div id="pop2_div"></div>
                {!! Lava::render('AreaChart', 'Projects', 'pop2_div') !!}

            </div>
            <div class="col-md-3 contact-grid">
                <h3>Recent Update</h3>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //contact -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="footer-left">
                <ul>
                    <li>{!! HTML::link('projects', 'Dashboard') !!}</li>
                    <li>{!! HTML::link('presenceco.com', 'Presence') !!}</li>
                    <li>{!! HTML::link('projects', 'Settings') !!}</li>
                </ul>
            </div>
            <div class="footer-right">
                <p>erick.nava.h'@'gmail.com</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
</body>
</html>