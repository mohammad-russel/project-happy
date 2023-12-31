<?php
session_start();
if (!isset($_SESSION["sr_id"])) {
    header("Location:./");
    exit();
}
$sr_id = $_SESSION["sr_id"];
@include "../public/php/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Packing</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@400;600;700;800&family=Baloo+Da+2:wght@400;600;700&family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="order__container">
        <div class="order">
            <a href="dashboard">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20.5" cy="20.5" r="20.5" fill="#F8F8FB" />
                    <path d="M23 15L17 21L23 27" stroke="#8A94A6" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <h3 class="order__title">Order</h3>
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="20" fill="#F8F8FB" />
                <path d="M20 23.5L15.625 19.125L16.85 17.8562L19.125 20.1312V13H20.875V20.1312L23.15 17.8562L24.375 19.125L20 23.5ZM14.75 27C14.2688 27 13.8566 26.8285 13.5136 26.4855C13.1706 26.1425 12.9994 25.7307 13 25.25V22.625H14.75V25.25H25.25V22.625H27V25.25C27 25.7312 26.8285 26.1434 26.4855 26.4864C26.1425 26.8294 25.7307 27.0006 25.25 27H14.75Z" fill="#8A94A6" />
            </svg>
        </div>
        <div class="list">
            <?php
            $sql = "SELECT *,MAX(orders.price) AS per_price,SUM(orders.piece) AS total_piece,COUNT(DISTINCT retailer_id) AS retailer,product_id, SUM(sr_total_amount) AS sr_total,SUM(total_amount) AS main_total FROM orders INNER JOIN product ON orders.product_id = product.id WHERE sr_id = $sr_id GROUP BY product_id";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $sr_total = $row['sr_total'];
                $main_total = $row['main_total'];
                $oc = $main_total - $sr_total;
            ?>
                <div class="order__item">
                    <div class="order__item-header">
                        <h2><?php echo $row['name'] ?> </h2>
                        <h3>Tk <?php echo $row['sr_total'] ?></h3>
                    </div>
                    <div class="order__item-container">
                        <div class="order__item-overview">
                            <h3>পরিমান</h3>
                            <h3><?php echo $row['total_piece'] ?></h3>
                        </div>
                        <div class="order__item-overview">
                            <h3>দোকানদার</h3>
                            <h3><?php echo $row['retailer'] ?></h3>
                        </div>
                        <div class="order__item-overview">
                            <h3>প্রতি পিস</h3>
                            <h3>Tk <?php echo $row['per_price'] ?></h3>
                        </div>
                        <div class="order__item-overview">
                            <h3>O/C</h3>
                            <?php
                            if ($oc > 0) {
                            ?>
                                <h3 class="oc" style="color:green;">+<?php echo number_format(abs($oc), 2) ?></h3>
                            <?php
                            } elseif ($oc < 0) {
                            ?>
                                <h3 class="oc" style="color:red;">-<?php echo number_format(abs($oc), 2) ?></h3>
                            <?php
                            } elseif ($oc == 0) {
                            ?>
                                <h3 class="oc" style="color:gray;"><?php echo number_format(abs($oc), 2) ?></h3>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="total">
            <h2>total :</h2>
            <h2>Tk 550.2</h2>
        </div>
    </div>
</body>

</html>