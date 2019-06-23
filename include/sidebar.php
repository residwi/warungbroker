<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index">
                    <img src="images/icon/wblogo271.png" alt="logo warung broker" />
                </a>
            </div>

            <?php   if (isset($_SESSION['email'])) : ?>
            <div class="account2">
                <div class="image img-cir img-120">
                    <a href="#foto" data-toggle="modal"><img src="images/member/<?= $profile['foto']  ?>" alt="foto profile" /></a>
                </div>
                <h4 class="name"><a href="profile"><?php echo $username; ?></a></h4>
                <a href="logout">Sign Out</a>
            </div>
            <?php   endif; ?>

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php if ($juhal==="broker") : ?>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>List Broker</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="brokers.php?b=fbs">FBS</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=firewoodfx">Firewoodfx</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=insta forex">Insta Forex</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=octafx">Octa FX</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=tickmill">Tickmill</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=xm">XM</a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="brokers.php?b=tifia">Tifia</a>-->
                                <!--</li>-->
                                <li>
                                    <a href="brokers.php?b=just forex">Just Forex</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=weltrade">Weltrade</a>
                                </li>
                            </ul>
                        </li>
                        <?php else : ?>
                        <li class="">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>List Broker</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="brokers.php?b=fbs">FBS</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=firewoodfx">Firewoodfx</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=insta forex">Insta Forex</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=octafx">Octa FX</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=tickmill">Tickmill</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=xm">XM</a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="brokers.php?b=tifia">Tifia</a>-->
                                <!--</li>-->
                                <li>
                                    <a href="brokers.php?b=just forex">Just Forex</a>
                                </li>
                                <li>
                                    <a href="brokers.php?b=weltrade">Weltrade</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if ($juhal==="validasi") : ?>
                        <li class="active has-sub">
                            <a href="validasi">
                                <i class="fas fa-chart-bar"></i>Validasi Akun</a>
                        </li>
                        <?php else : ?>
                        <li>
                            <a href="validasi">
                                <i class="fas fa-chart-bar"></i>Validasi Akun</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($juhal==="layanan") : ?>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Layanan Finansial</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="deposit">Deposit</a>
                                </li>
                                <li>
                                    <a href="withdrawal">Withdrawal</a>
                                </li>
                                <li>
                                    <a href="#">Rebate</a>
                                </li>
                            </ul>
                        </li>
                        <?php else : ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Layanan Finansial</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="deposit">Deposit</a>
                                </li>
                                <li>
                                    <a href="withdrawal">Withdrawal</a>
                                </li>
                                <li>
                                    <a href="#">Rebate</a>
                                </li>
                            </ul>
                        </li>    
                        <?php endif; ?>

                        <?php if ($juhal==="artikel") : ?>
                        <li class="active has-sub">
                            <a href="artikel">
                                <i class="fas fa-table"></i>Artikel</a>
                        </li>
                        <?php else : ?>
                        <li>
                            <a href="artikel">
                                <i class="fas fa-table"></i>Artikel</a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="#">
                                <i class="far fa-check-square"></i>EA & Indikator</a>
                        </li>
                       <!--  <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>ForexCopy</a>
                        </li> -->
                        <!-- <li>
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i>Indikator</a>
                        </li> -->
                        <li>
                            <a href="kontes">
                                <i class="fas fa-map-marker-alt"></i>Kontes Rebate</a>
                        </li>
                        <li>
                            <a href="promo">
                                <i class="fas fa-table"></i>Promo</a>
                        </li>
                        <li>
                            <a href="copytrading">
                                <i class="fas fa-table"></i>Copy Trading</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
