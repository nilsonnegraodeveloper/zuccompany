<!-- HEADER-->
@include ('app._layouts._includes.header')
<!-- END HEADER-->

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">

                <section class="login_content">

                    <!-- MESSAGES-->
                    @include('app._layouts._includes.messages')
                    <!-- END MESSAGES-->

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf
                        <h1>Login</h1>
                        <div>
                            <input type="text" name="email" class="form-control" placeholder="E-mail" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Senha" required="" />
                        </div>
                        <div class="flex-box">
                            <input type="submit" name="login" class="btn btn-success" value="Logar">
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class=""></i> ZUCCOMPANY</h1>
                                <p>©<?php echo date('Y') ?></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>