<?php
setlocale(LC_TIME, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?=$encoding ?? 'UTF-8'?>" />
    </head>
    <body>
        <table style="width: 100%; font-family: 'Segoe UI'">
            <tr>
                <td style="background-color: #E30713; text-align: center; vertical-align: middle; height: 110px">
                    <center>
                        <table style="width: 90%; color: white">
                            <tr>
                                <td><h2><?= $title ?></h2></td>
                            </tr>
                        </table>
                    </center>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <center>
                        <br/>
                        
                        <table style="width: 90%;">
                            <tr>
                                <td>
                                    <?= $body ?>
                                </td>
                            </tr>
                        </table>

                        <br/>
                        <br/>
                        <br/>
                    </center>
                </td>
            </tr>
            <tr>
                <td style="background-color: #E30713; height: 60px; vertical-align: middle">
                    <center>
                        <table style="width: 90%; color: white; font-size: 12px;">
                            <tr>
                                <td align="left">
                                    <?php if (isset($isExternal) && $isExternal === true): ?>
                                        <a style="color: #ccc;" href="https://servdebt.com/">www.servdebt.com</a>
                                    <?php else: ?>
                                        <a style="color: #ccc;" href="https://sls.servdebt.pt/">sls.servdebt.pt</a>
                                    <?php endif;?>
                                </td>
                                <td align="right">
                                    <?php if (isset($isExternal) && $isExternal == true): ?>
                                        Servdebt
                                    <?php else: ?>
                                        SLS
                                    <?php endif;?>
                                </td>
                            </tr>
                        </table>
                    </center>
                </td>
            </tr>
        </table>

        <br/>

        <table style="width: 100%; font-family: 'Segoe UI'">
            <tr>
                <td style="font-size: 10px; text-align: center; vertical-align: middle;">
                    This is an automatic message. Please do not respond to this e-mail.
                </td>
            </tr>
        </table>
    </body>
</html>