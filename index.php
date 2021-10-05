<!-- Borrowed from https://github.com/cardanians/adapools.org/blob/master/spo-web/index.php -->
<?php
$my_pool_id = "27b1b4470c84db78ce1ffbfff77bb068abb4e47d43cb6009caaa3523";
function adanice($n)
{
    if ($n > 1000000 * 1000 * 1000) {
        return round($n / (1000000 * 1000 * 1000), 2) . "M";
    } elseif ($n > 1000000 * 1000) {
        return round($n / (1000000 * 1000), 2) . "k";
    } else {
        return round($n / 1000000);
    }
}
$a = json_decode(file_get_contents("https://js.adapools.org/pools/{$my_pool_id}/summary.json", false, stream_context_create(['http' => ['timeout' => 5]])), true);
$a = $a['data'];
?>

<!DOCTYPE html>
<!--[if lt IE 8]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!-->

<html class="no-js" lang="en">
    <!--<![endif]-->
    <head>
        <!--- Basic Page Needs
   ================================================== -->
        <meta charset="utf-8" />
        <title><?php echo "{$a['db_name']} - [{$a['db_ticker']}]"; ?></title>
        <meta name="description" content="<?php echo $a['db_description']; ?>" />
        <meta name="author" content="" />

        <!-- Mobile Specific Metas
   ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- CSS
    ================================================== -->
        <link rel="stylesheet" href="css/default.css" />
        <link rel="stylesheet" href="css/layout.css" />
        <link rel="stylesheet" href="css/media-queries.css" />

        <!-- Script
   ================================================== -->
        <script src="js/modernizr.js"></script>

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="https://www.cloudstruct.net/wp-content/uploads/2018/05/favicon.png" />
        <script id="mcjs">
            !(function (c, h, i, m, p) {
                (m = c.createElement(h)), (p = c.getElementsByTagName(h)[0]), (m.async = 1), (m.src = i), p.parentNode.insertBefore(m, p);
            })(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/58b2969afa1058eb3c2c7a31d/f4461b32f97f8ba8c7f22782b.js");
        </script>
    </head>

    <body>
        <div id="preloader">
            <div id="status">
                <img src="images/preloader.gif" height="64" width="64" alt="" />
            </div>
        </div>

        <!-- Intro Section
   ================================================== -->
        <section id="intro">
            <header class="row">
                <div id="logo">
                    <a href="#">
                        <img src="images/logo.png" alt="CloudStruct" />
                    </a>
                </div>

                <nav id="nav-wrap">
                    <a class="menu-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                    <a class="menu-btn" href="#" title="Hide navigation">Hide navigation</a>

                    <ul id="nav" class="nav">
                        <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
                        <li><a class="smoothscroll" href="#about">About</a></li>
                        <li><a class="smoothscroll" href="#location">Contact</a></li>
                    </ul>
                    <!-- end #nav -->
                </nav>
                <!-- end #nav-wrap -->
            </header>
            <!-- Header End -->

            <!-- more fun PHP stuff -->
            <?php
$l = [
    ["Live Stake", adanice($a['total_stake']) . " ADA"],
    ["Epoch Blocks", $a['blocks_epoch']],
    ["Lifetime Blocks", $a['blocks_epoch'] + $a['blocks_lifetime']],
    ["Delegators", $a['delegators']],
    ["Saturation", round($a['saturated'] * 100) . "%"],
];
$r = [
    ["Active Stake", adanice($a['active_stake']) . " ADA"],
    ["Return of ADA", round($a['roa_lifetime'], 2) . "%"],
    ["Pool Pledge", adanice($a['pledge']) . " ADA"],
    ["Costs (Fixed)", adanice($a['tax_fix']) . " ADA"],
    ["Costs (Margin)", round($a['tax_ratio'] * 100, 2) . "%"],
];
?>

            <div id="main" class="row">
                <div class="twelve columns">
                    <h1>Cardano Staking Pool</h1>

                    <p>CloudStruct is running a production grade Cardano staking pool under ticker</p>
                    <h1><?php echo "{$a['db_ticker']}"; ?></h1>
                    <p>
                        Our pool is dedicated to supporting decentralization of the Cardano blockchain to help protect
                        online privacy and rights. This is why we support the <a href="https://eff.org">
                        Electronic Frontier Foundation</a> (EFF) with donations from our pool operator rewards.
                    </p>
                    <p>
                        To reward our delegators, we have several rewards programs.
                    </p>
                </div>

                <ul class="stats-tabs">
		    <li><p>Payout 10% of operator rewards</p></li>
		    <li><p>Airdrops of <a href="https://pigytoken.com">$PIGY</a></p></li>
		    <li><p>Airdrops of <a href="https://thankcoin.io">$THANK</a></p></li>
                </ul>
                <hr>

                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
                    <form
                        action="https://cloudstruct.us5.list-manage.com/subscribe/post?u=58b2969afa1058eb3c2c7a31d&amp;id=8bddcd8164"
                        method="post"
                        id="mc-embedded-subscribe-form"
                        name="mc-embedded-subscribe-form"
                        class="validate"
                        target="_blank"
                        novalidate
                    >
                        <div id="mc_embed_signup_scroll">
                            <h4><font color="white">Subscribe to CloudStruct Cardano News Letter</font></h4>
                            <div class="mc-field-group">
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" onclick="clear()" />
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display: none;"></div>
                                <div class="response" id="mce-success-response" style="display: none;"></div>
                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_58b2969afa1058eb3c2c7a31d_8bddcd8164" tabindex="-1" value="" /></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" /></div>
                        </div>
                    </form>
                </div>

                <!--End mc_embed_signup-->

                <ul class="social">
                    <li>
                        <a href="https://twitter.com/CSCS_pool"><i class="fa fa-twitter"></i></a>
                    </li>
                </ul>

                <div class="twelve columns">


                <div class="twelve columns">
                    <hr>
                    <h1>Live Stats</h1>

                    <div class="six columns">
                        <ul>
                            <?php for ($i = 0; $i < count($l); $i++) {
                            echo "<li><p>{$l[$i][0]}: <b>{$l[$i][1]}</b></p></li>"; }
                            ?>
                        </ul>
                        </div>
                    <div class="six columns">
                        <ul>
                            <?php for ($i = 0; $i < count($r); $i++) {
                            echo "<li><p>{$r[$i][0]}: <b>{$r[$i][1]}</b></p></li>"; }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- main end -->
        </section>
        <!-- end intro section -->

        <!-- About Section
   ================================================== -->
        <section id="about">
            <div class="row section-header">
                <div class="twelve columns">
                    <div class="icon-wrap">
                        <i class="fa fa-group"></i>
                    </div>

                    <h1>About Us.</h1>

                    <p class="lead">
                        We started CloudStruct after working for over 30 years combined on a variety of large scale SaaS infrastructures. Combining the lessons learned with modern methodology we believed we could provide unparalleled
                        managed infrastructure solutions. With most companies turning to cloud providers like Amazon to manage the hardware end of infrastructure, CloudStruct offers to match that experience for the infrastructure software.
                        We provide a DevOps as a Service model that enables your company to free up time to focus on your product. CloudStruct has a proven method for developing custom fit infrastructure as code, this means automated
                        building and scaling of cloud infrastructure, containerizing applications, enabling continuous integration, testing, and deployment pipelines, and metrics gathering/analysis for an evidence based approach to
                        designing for your growth.
                    </p>
                </div>
            </div>
            <!-- end section-header -->

            <div class="row section-content">
                <div class="six columns">
                    <h3>Our Process.</h3>

                    <p>We intend to use our expertise and advanced cloud automation framework to run highly available crypto services. Stay tuned as build out our offerings beyond staking pools and into hosted staking services.</p>
                </div>

                <div class="six columns">
                    <h3>Our Approach.</h3>

                    <p>
                        We approach our cryptocurrency endeavors with the same principals as our typical DevOps As A Service business model. Security is ALWAYS first. Combined with automation for testing, repeatable builds, and deployment
                        we can ensure highly available and redundant services which you can trust and rely on.
                    </p>
                </div>
            </div>
            <!-- end section-content -->

            <div class="row section-content">
                <div class="six columns">
                    <h3>Our Vision.</h3>

                    <p>Our vision is to make professional enterprise level architecture and reliability available to the crypocurrency masses with the click of a button.</p>
                </div>

                <div class="six columns">
                    <h3>Our Objective.</h3>

                    <p>At CloudStruct we want to remove the barrier for being an expert in systems, networking, databases, and cloud architecture in order to run your own cryptocurrency services.</p>
                </div>
            </div>
            <!-- end section-content -->
        </section>
        <!-- About Section End-->

        <!-- Location Section
   ================================================== -->
        <section id="location">
            <div class="contacts">
                <div class="row contact-details">
                    <div class="columns end">
                        <h3><i class="fa fa-envelope"></i>Contact.</h3>
                        <p>support@cloudstruct.net</p>
                    </div>
                </div>
                <!-- end contact-details -->
            </div>
            <!-- end contacts -->
        </section>
        <!-- end location section -->

        <!-- footer
   ================================================== -->
        <footer>
            <div class="row">
                <div class="twelve columns">
                    <ul class="copyright">
                        <li>&copy; Copyright 2021 CloudStruct</li>
                        <li>Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a></li>
                    </ul>
                </div>
            </div>

            <div id="go-top">
                <a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a>
            </div>
        </footer>
        <!-- Footer End-->

        <!-- Java Script
   ================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>');
        </script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

        <script src="js/gmaps.js"></script>
        <script src="js/waypoints.js"></script>
        <script src="js/jquery.countdown.js"></script>
        <script src="js/jquery.placeholder.js"></script>
        <script src="js/backstretch.js"></script>
        <script src="js/init.js"></script>
        <script>
            function clear() {
                document.getElementById("mce-EMAIL").value = "";
            }
        </script>
    </body>
</html>
