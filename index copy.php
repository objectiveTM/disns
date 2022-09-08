<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인패이지</title>
    <link rel="stylesheet" href="style/index.css">

    <script type="text/javascript" src="plugins/vanilla-tilt.js"></script>
    <script src="script/index.js"></script>

</head>
<body>
    
    <?= file_get_contents("layouts/header.html") ?>

    <main>
        <article>

            <?php
                echo var_dump($_SESSION);
                if (isset($_SESSION["name"])){
                    echo '<div class="chat-left">'.$_COOKIE["name"].'님 안녕하세요!</div>';
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