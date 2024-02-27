<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02- Fundamentals</title>
    <style>
        body {
            background-color: #999595;
        }

        h1 {
            text-align: center;
        }

        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }

            ul {
                padding: 0;
                margin: 0;
            }

            figure {
                background-color: #fff3;
                border: 2px solid #fff6;
                border-radius: 8px;
                font-size: 6rem;
                margin: 0;
            }

            form {
                display: flex;
                justify-content: space-between;
                gap: 1rem;

                button {
                    border: 2px solid #fff6;
                    background-color: #994bde;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 100px;
                    padding: 0.6rem;
                }
            }
        }
    </style>
</head>

<body>
    <main>
        <h1>02- Fundamentals</h1>
        <section>
            <?php
            class Runner
            {
                // Attributes
                public $name;
                public $age;
                public $number;

                // Methods
                public function __construct($name, $age, $number)
                {
                    $this->name   = $name;
                    $this->age    = $age;
                    $this->number = $number;
                }

                public function run()
                {
                    return "<img src='assets/correr.gif'/>";
                }

                public function stop()
                {
                    return "<img src='assets/parar.gif'/>";
                }

                public function jump()
                {
                    return "<img src='assets/saltar.gif'/>";
                }
            }

            $runner = new Runner('El mero mero', 15, 105);

            ?>
            <h2>Class Runner</h2>
            <ul>
                <li>Name: <?= $runner->name ?></li>
                <li>Age: <?= $runner->age ?></li>
                <li>Number: <?= $runner->number ?></li>
            </ul>
            <figure>
                <?php
                if ($_POST) {
                    if (isset($_POST['run'])) {
                        echo $runner->run();
                    } elseif (isset($_POST['stop'])) {
                        echo $runner->stop();
                    } else {
                        echo $runner->jump();
                    }
                } else {
                    echo $runner->stop();
                }
                ?>
            </figure>
            <form action="" method="post">
                <button name="run"> Run </button>
                <button name="stop"> Stop </button>
                <button name="jump"> Jump </button>
            </form>
        </section>
    </main>
</body>

</html>