<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>03 - Visibility</title>
    <style>
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

            table {
                border-collapse: collapse;

                tr {
                    td {
                        padding: 8px;
                        border: 1px solid #fff;
                    }
                }

                tr:nth-child(odd) {
                    background-color: #fff2;
                }


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
        <h1>Visibility</h1>
        <section>
            <?php
            class TableMaker
            {
                //Attributes
                private $nr; //Number of rows
                private $nc; //Number of columns
                //Methods
                public function __construct($nr, $nc)
                {
                    $this->nr = $nr;
                    $this->nc = $nc;
                }
                public function drawTable()
                {
                    echo $this->startTable();
                    echo $this->contentTable();
                    echo $this->endTable();
                }
                private function startTable()
                {
                    return "<table>";
                }
                private function contentTable()
                {
                    $content = "";
                    for ($i = 0; $i < $this->nr; $i++) {
                        $content .= "<tr>";
                        for ($j = 0; $j < $this->nc; $j++) {
                            $content .= "<td>" . $i . " , " . $j . "</td>";
                        }
                        $content .= "</tr>";
                    }
                    return $content;
                }
                private function endTable()
                {
                    return "</table>";
                }
            }

            ?>
            <h2>Table Maker</h2>

            <form action="" method="post">
                <label>
                    <p>Rows:</p>
                    <input type="range" name="nr" min="1" max="20" step="1" value="1" oninput="o1.value=this.value">
                    <output id="o1">0</output>
                </label>
                <label>
                    <p>Columns:</p>
                    <input type="range" name="nc" min="1" max="20" step="1" value="1" oninput="o2.value=this.value">
                    <output id="o2">0</output>
                </label>
                <button> Make Table </button>
            </form>
            <?php
            if (isset($_POST['nr']) && isset($_POST['nc'])) {
                $rows = $_POST['nr'];
                $columns = $_POST['nc'];
                $table = new TableMaker($rows, $columns);
                $table->drawTable();
            }
            ?>
        </section>

    </main>

</body>

</html>