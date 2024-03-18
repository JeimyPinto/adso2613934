<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>04 - Extends</title>
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }

            div {
                display: flex;
                position: relative;
                overflow: hidden;
                justify-content: center;

                span {
                    position: absolute;
                    bottom: -65px;
                    background-color: rgb(0, 0, 0, 0.8);
                    width: 90%;
                    transition: bottom 0.5s ease-in;
                    text-align: center;
                    height: 100px;

                    p {

                        font-size: 10px;
                    }
                }


            }

            div:hover span {
                bottom: 15px;
            }

            div:active span {
                bottom: 15px;
                border: 3px white solid;
            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="../index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
            </svg>
        </a>
    </nav>
    <main>
        <h1>04-Inheritance</h1>
        <?php
        class Pokemon
        {
            //Attribute
            protected $name;
            protected $type;
            protected $healt;
            protected $img;

            public function __construct($name, $type, $healt, $img)
            {
                $this->name = $name;
                $this->type = $type;
                $this->healt = $healt;
                $this->img = $img;
            }
            //Methods
            public function attack()
            {
                return "Attack";
            }
            public function defense()
            {
                return "Defense";
            }
            public function show()
            {
                return
                    '<div>
                <img src="' . $this->img . '" alt="pokemon"/>
                <span>Stats:
                <p>' .
                    'Name: ' . $this->name . '<br/>' .
                    'Type: ' . $this->type . '<br/>' .
                    'Health: ' . $this->healt .
                    '</p>
                </span>
            </div>';
            }
        }

        class Evolve extends Pokemon
        {
            public function levelUp($name, $type, $healt, $img)
            {
                parent::__construct($name, $type, $healt, $img);
            }
        }
        ?>
        <h2>Choose your pokemon</h2>
        <section>
            <?php
            $pk = new Evolve("Charmander", "Fire", 150, 'images/charmander.png');
            echo $pk->show();
            $pk->levelUp("Charmeleon", "Fire", 250, 'images/charmeleon.png');
            echo $pk->show();
            $pk->levelUp("Charizard", "Fire-Fly", 450, 'images/charizard.png');
            echo $pk->show();
            ?>
        </section>
    </main>

</body>

</html>