<!-- HEADER-->
@include ('app._layouts._includes.header')
<!-- END HEADER-->


<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- MENU-->
            @include ('app._layouts._includes.menu')
            <!-- END MENU-->

            <!-- NAVBAR-->
            @include ('app._layouts._includes.navBar')
            <!-- END NAVBAR-->

            <!-- page content -->
            <div class="right_col" role="main">

                <!-- Conteúdo da Página aqui dentro -->

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <!-- TITLE-->
                            @yield('title')
                            <!-- END TITLE-->
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <!-- SUB-TITLE-->
                                    @yield('sub_title')
                                    <!-- END SUB-TITLE-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <!-- MESSAGES-->
                                    @include('app._layouts._includes.messages')
                                    <!-- END MESSAGES-->
                                    <br />

                                    <!-- CONTENT-->
                                    @yield('content')
                                    <!-- END CONTENT -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- FOOTER -->
            @include ('app._layouts._includes.footer')
            <!-- END FOOTER -->
        </div>
        <!-- /main_container -->
    </div>
    <!-- /container body -->

    <!-- SCRIPTS -->
    @include ('app._layouts._includes.scriptsRodape')
    <!-- END SCRIPTS -->
</body>

</html>