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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
        <title><?= $this->fetch('title') ?></title>
        <meta charset="utf-8">
    </head>

    <body>
        <table style="margin: 10px auto;" border="0" width="700px">
            <tbody>
                <tr >
                    <td style="border-bottom: 1px solid #4caf50;"><a class="i_face" href="http://www.samuicleaner.com/" target="_blank" rel="noopener">
                            <img style="display: block; margin-left: auto; margin-right: auto;padding-bottom: 10px;" src="https://www.samuicleaner.com/img/logo/samui_cleaner_logo.png" width="180px" height="auto" />
                        </a>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td><?= $this->fetch('content') ?></td>
                </tr>
                <tr style="background: #F5F5F5;">
                    <td style="padding: 20px; text-align: center;">
                        <h3 style="color: #4caf50;padding: 0px;margin: 0px;">Professional quality cleaning with a personal touch</h3>
                        <p style="text-align: center; padding: 10px 0px 0px 0px; margin: 0px;font-size: 16px;">Samui Cleaner</p>

                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>