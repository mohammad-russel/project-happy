<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .retailer {
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
        }

        .money {
            font-size: 1.5rem;
            font-weight: bold;
            color: green;
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        @include "../public/php/config.php";
        $sql = "SELECT * FROM retail_adder";
        $result = mysqli_query($con, $sql);
        $totalSum = 0; // Initialize total sum

        while ($row = mysqli_fetch_assoc($result)) {
            $active = $row['id'];
            $sql1 = "SELECT * FROM retailer WHERE activer_id = $active AND pay ='0'";
            $result1 = mysqli_query($con, $sql1);
            $retailer = mysqli_num_rows($result1);
            $amountSum = 0; // Initialize sum for the current amount-box

            while ($row1 = mysqli_fetch_assoc($result1)) {
                $fields = ['retailer_image' => 35, 'shop_image' => 15, 'name' => 10, 'number' => 10, 'area' => 10, 'shop_name' => 10, 'bazar_id' => 10];
                $progress = 0;

                foreach ($fields as $field => $value) {
                    if (!empty($row1[$field])) {
                        $$field = $value;
                        $progress += $value;
                    } else {
                        $$field = 0;
                    }
                }

                $amountSum += $progress; // Add progress to the amount sum for this amount-box
            }

            $totalSum += $amountSum;
            $pay = $amountSum * 0.10; // Add amount sum for this amount-box to the total sum
        ?>

            <div class="card">
                <div class="name"><?php echo $row['name'] ?></div>
                <div class="retailer"><?php echo  $retailer ?></div>
                <div class="money"><?php echo $pay  ?></div>
                <a href="php/pay?id=<?php echo $row['id'] ?>">Pay</a>
            </div>
        <?php
        }
        ?>


    </div>
</body>

</html>