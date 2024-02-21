<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamentals</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        section {
            background-color: #0009;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 5px;

            h2 {
                margin: 0;
            }

        }

        figure {
            font-size: 6rem;
        }
    </style>
</head>

<body>
    <main>
        <h1>02 - Fundamentals</h1>
        <section>
            <figure>
                <?php
                class Runner
                { //Atributes
                    private $name;
                    private $age;
                    private $number;

                    //Methods
                    public function __construct($name, $age, $number)
                    {
                        $this->name = $name;
                        $this->age = $age;
                        $this->number = $number;
                    }
                    public  function run()
                    {
                        return "🏃‍♂️";
                    }
                    public function stop()
                    {
                        return "🧍‍♂️";
                    }
                    public function jump()
                    {
                        return "🙆‍♂️";
                    }
                }
                $runner = new Runner("Usaint Bolt", 35, 105);
                echo $runner->run();
                echo $runner->stop();
                echo $runner->jump();
                echo $runner->run();
                ?>
            </figure>
            <input type="submit" value="Run"></input>
            <input type="submit" value="Stop"></input>
            <input type="submit" value="Jump"></input>
        </section>
    </main>
</body>

</html>