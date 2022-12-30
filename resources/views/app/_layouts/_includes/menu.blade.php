<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix flex-box">
            <div class="profile_pic">
                <img src="{{ asset('static/images/user.png') }}" alt="..." class="img-circle profile_img">
                <div class="flex-box">
                    <h2><span><?php
                                // $findme   = ' ';
                                // $pos = strpos($_SESSION['vch_nome'], $findme);
                                // if ($pos === false) :
                                //     echo ($_SESSION['vch_nome']);
                                // else :
                                //     echo (strstr($_SESSION['vch_nome'], ' ', true));
                                // endif; 
                                ?>
                        </span></h2>
                </div>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{ route('app.dashboard') }}"><i class="fa fa-home"></i> Home </a>
                    <li><a><i class="fa fa-database"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('app.clientes.indexCliente') }}"><i class="fa fa-users"></i> Clientes</a></li>
                            <li><a href="{{ route('app.produtos.indexProduto') }}"><i class="fa fa-shopping-cart"></i> Produtos</a></li>
                            <li><a href="{{ route('app.formas_pagamento.indexFormaPagamento') }}"><i class="fa fa-usd"></i> Formas Pagamento</a></li>
                            <li><a href="{{ route('app.vendas.indexVenda') }}"><i class="fa fa-shopping-bag"></i> Vendas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>