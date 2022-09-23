<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보</title>
    <link rel="stylesheet" href="style/index.css">

    <script type="text/javascript" src="plugins/vanilla-tilt.js"></script>
    <script src="script/index.js"></script>


    <?= file_get_contents("layouts/meta.html") ?>
    <meta property="og:site_name" content = "Infomation">
    <meta property="og:description" content = "disns가 뭐를하는건지 알려줘요!">

</head>
<body>
    <?php include "layouts/header.php"; ?>

    <?php
    

    // $conn = mysqli_connect("127.0.0.1" , "root" , "disns!password" , "");
    ?>

    <main>
        <article>

            <?php
                session_start();

                if (isset($_COOKIE["token"])){
                    echo '<div class="chat-left">'.$discordInfo["username"].'님 안녕하세요!</div>';
                }else{
                    echo '<div class="chat-left">안녕하세요!</div>';
                }

            ?>
            

            <div class="chat-right"></div>

            <section>
                <h1>asdf</h1>
            </section>

        </article>
        
        <!-- <aside>
            <section>
                <h1>asdf</h1>
            </section>
        </aside> -->
    </main>


    <?= file_get_contents("layouts/footer.html") ?>


    <script type="text/javascript">

        VanillaTilt.init(document.querySelector("section"), {
            max: 10,
            speed: 400
        });

    </script>

</body>
</html>