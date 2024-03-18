<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>05 - Abstract</title>
    <style>
        section {
            background-color: rgb(88, 24, 69, 0.8);
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
            padding: 50px;

            h2 {
                margin-bottom: 50px;
            }

            div {
                width: 100%;
                height: 400px;
                overflow: auto;
                scrollbar-width: thin;
                scrollbar-color: rgb(88, 24, 69) #0009;
                position: relative;

            }

            table {
                width: 100%;
                border-collapse: collapse;
                height: inherit;

                thead {
                    background-color: rgb(88, 24, 69);
                    text-align: center;
                    box-shadow:
                        inset 0 -3em 3em rgba(0, 0, 0, 0.1),
                        0 0 0 2px rgb(255, 255, 255),
                        0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
                    position: sticky;
                    top: 0;
                    left: 0;

                    th {
                        padding: 30px;
                        border: 1px solid #0009;
                        color: white;
                    }
                }

                tbody {
                    tr {

                        th {
                            padding: 10px;
                            border: 1px solid #0009;

                            img {
                                width: 50px;

                            }
                        }

                    }

                }

                tbody th:nth-child(odd) {
                    background-color: rgba(255, 192, 203, 0.3);
                }

                tbody th:nth-child(even) {
                    background-color: rgba(255, 0, 255, 0.8, 0.5);
                }
            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="../index.html">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
            </svg>
        </a>
    </nav>
    <main>
        <h2>05 - Abstract class</h2>
        <section>
            <?php
            abstract class DataBase
            {
                //Atrtibutes
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;

                //Methods
                public function __construct($dbname, $host = 'localhost', $user = 'root', $pass = '')
                {
                    $this->host = $host;
                    $this->user = $user;
                    $this->pass = $pass;
                    $this->dbname = $dbname;
                }
                public function connect()
                {
                    try {
                        $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                        return $this->conx;
                    } catch (PDOException $e) {
                        echo "Error " . $e->getMessage();
                    }
                }
            }
            class Pokemon extends DataBase
            {
                public function getData()
                {
                    try {
                        $sql = "SELECT * FROM pokemons";
                        $stmt = $this->conx->prepare($sql);
                        $stmt->execute();
                        return $stmt->fetchAll();
                    } catch (Exception $e) {
                        return "Error " . $e->getMessage();
                    }
                }
            }
            $db = new Pokemon('adso2613934');
            $conx = $db->connect();
            $data = $db->getData();
            ?>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Health</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $pokemon) {
                            echo "<tr>";
                            echo "<th>" . $pokemon['id'] . "</th>";
                            echo "<th>" . $pokemon['name'] . "</th>";
                            echo "<th>" . $pokemon['type'] . "</th>";
                            echo "<th>" . $pokemon['health'] . "</th>";
                            echo "<th><img src='images/" . $pokemon['image'] . "' alt='" . $pokemon['name'] . "'></th>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </section>
    </main>

</body>

</html>