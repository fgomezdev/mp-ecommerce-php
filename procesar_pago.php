<?php
function redirect_post($url, $payment_status)
{
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <script type="text/javascript">
                function closethisasap() {
                    document.forms["to_redirect"].submit();
                }
            </script>
        </head>
        <body onload="closethisasap();">
            <form name="to_redirect" method="post" action="<? echo $url . '?payment_status=' . $payment_status; ?>">
            </form>
        </body>
    </html>
    <?php
    exit;
}

redirect_post('detail.php', $_POST["payment_status"]);