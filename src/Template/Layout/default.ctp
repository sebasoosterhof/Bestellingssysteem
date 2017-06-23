<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Het Theehuis';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://use.fontawesome.com/e6aaf199a7.js"></script>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class=" large-3 medium-4 columns">
            <div class="logo"></div>
        </ul>
            <div class="top-bar-section">
                <ul class="right">
                   <?php if (isset($_SESSION['Auth'])) { ?>
                    <li class="logout-dropdown">
                        <span class="navbar-content accordion clickable"><?= $_SESSION['Auth']['User']['username']; ?></span>
                        <div class="panel">
                            <a href="/users/login" class="clickable">Uitloggen</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <div class="footer">
            <div class="footer-left">
                <img class="wifi" alt="wifi" src="http://www.hettheehuis.nl/images/wifi.png" height="69" width="100">
                <p> Ons terras is voorzien van
                    gratis draadloos internet.
            </div>
            <div class="footer-middle">
                <br>
                    Meersweg 9, 9001BG Grou
                </br>
                    Telefoon: 0566 - 621630
                <br>
                    E-mail: info@hettheehuis.nl
                </br>
            </div>
            <div class="footer-right">
                ©2017 Het Theehuis. Alle rechten voorbehouden.
                Ontwikkeld door <a href="https://www.linkedin.com/in/sebastian-oosterhof-b92021137/" style="color:white;"><b>Sebastian Oosterhof</b></a>.
            </div>

        </div>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].onclick = function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                }
            }
        </script>
    </footer>
</body>
</html>
