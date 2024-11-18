



<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="form-group" id="process" style="display:none; margin-top: 200px;">
    <div class="progress">
        <div class="progress-bar progress-bar-striped active bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style=""></div>
    </div>
</div>

<div id="message"></div>
<?php
    $redirect_url = isset($_COOKIE['product_url_path']) ? $_COOKIE['product_url_path'] : 'admin/products';

?>
<script>
    $(document).ready(function(){

        $('#process').css('display', 'block');
        var percentage = 0;
        var timer = setInterval(function(){
            percentage = percentage + 20;
            progress_bar_process(percentage, timer);
        }, 1000);

        function progress_bar_process(percentage, timer){
            $('.progress-bar').css('width', percentage + '%');
                if(percentage > 100)
                {
                    clearInterval(timer);
                    $('#process').css('display', 'none');
                    $('.progress-bar').css('width', '0%');
                    setTimeout(function(){
                        $('#message').html('');
                        //window.location.href = '<?php //= site_url($redirect_url);?>//';
                    }, 1000);

                }
        }
    });
</script>


</body>
</html>