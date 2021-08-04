<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buy Now</title>
    <style>
        h4{
            color:white;
            background: rgb(248, 36, 160);
            line-height: 25px;
            text-align: center;
            margin-bottom: 30px;
        }
        .end{
            background: rgb(13, 207, 101);
            color:white;
            padding: 20px 0;
            text-align: center
        }
    </style>
</head>
<body>
    <h4>Welcome Buy Now Shopping</h4>
    <p><?php echo $content; ?></p>
    <img src="<?php echo $img_link ?>" alt="">
    <p class="end"><?php echo $subject; ?></p>
</body>
</html>