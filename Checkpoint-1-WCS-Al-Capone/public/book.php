<?php

require __DIR__ . '/../connec.php';

$connection = new PDO(DSN, USER, PASS);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  $name = '';
  if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
  }

  $payment = 0;
  if (isset($_POST['payment']) && $_POST['payment'] > 0) {
    $payment = $_POST['payment'];
  }

  if(!empty($name) && $payment > 0) {
    $query = 'INSERT INTO bribe(name, payment) VALUES (:name, :payment)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':payment', $payment, PDO::PARAM_INT);
    $statement->execute();
  }
}

    $statement = $connection->query('SELECT * FROM bribe ORDER BY name');
    $bribes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <title>Checkpoint PHP 1</title>
</head>
<body>

<?php include 'header.php'; ?>

<main class="container">

    <section class="desktop">
        <img src="image/whisky.png" alt="a whisky glass" class="whisky"/>
        <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky"/>

        <div class="pages">
            <div class="page leftpage">
                Add a bribe
                <!-- TODO : Form -->
                <form action="" method="post">
                  <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                  </div>
                  <div>
                    <label for="payment">Payment</label>
                    <input type="number" id="payment" name="payment">
                  </div>
                  <button type="submit">Send</button>
                </form>
            </div>

            <div class="page rightpage">
                <!-- TODO : Display bribes and total paiement -->
                <table>
                <tbody>
                <?php $sum = 0; ?>
                <?php foreach($bribes as $bribe) : ?>
                  <?php $sum += $bribe ['payment']; ?>
                  <tr>
                    <td>
                      <?= $bribe ['name'] ?>
                    </td>
                    <td>
                      <?= $bribe ['payment'] ?>
                    </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <td>
                  total
                  </td>
                  <td>
                    <?= $sum ?>
                  </td>
                </tr>
                </tfoot>
                </table>
            </div>
        </div>
        <img src="image/inkpen.png" alt="an ink pen" class="inkpen"/>
    </section>
</main>
</body>
</html>
