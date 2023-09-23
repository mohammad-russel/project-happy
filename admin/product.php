<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Base styles */

        /* Container */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px;
        }

        /* Add Box */
        .add-box {
            width: 100%;
            max-width: 500px;
            /* Adjust the max-width as needed */
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .add-box form {
            display: flex;
            flex-direction: column;
        }

        .add-box label {
            font-weight: bold;
        }

        .add-box input[type="text"],
        .add-box input[type="number"],
        .add-box textarea,
        .add-box input[type="file"],
        .add-box select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-box input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-box input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* List Box */
        .list-box {
            width: 100%;
        }

        .list-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .list-box th,
        .list-box td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .list-box th {
            background-color: #f2f2f2;
        }

        .list-box tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .list-box img {
            max-width: 100px;
            max-height: 100px;
        }

        .list-box .edit,
        .list-box .delete {
            cursor: pointer;
            color: #007BFF;
            margin-right: 10px;
        }

        .list-box .edit:hover,
        .list-box .delete:hover {
            text-decoration: underline;
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .add-box {
                width: 100%;
                max-width: 100%;
            }

            .list-box {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="add-box">
            <form action="php/add-product" method="post" enctype="multipart/form-data">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*"><br>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="piece">Piece:</label>
                <input type="number" id="piece" name="piece" required><br>

                <label for="buy_rate">Buy Rate:</label>
                <input type="number" id="buy_rate" name="buy_rate" step="0.01" required><br>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required><br>

                <label for="category_id">Category ID:</label>
                <select name="category_id" id="category_id">
                    <?php
                    @include "../public/php/config.php";
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>
                <label for="company_id">Company ID:</label>
                <select name="company_id" id="company_id">
                    <?php
                    @include "../public/php/config.php";
                    $sql1 = "SELECT * FROM company";
                    $result1 = mysqli_query($con, $sql1);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                        <option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
                    <?php } ?>
                </select>
                <label for="box_type">Box Type:</label>
                <select name="box_type" id="box_type">
                    <option value="বক্স">বক্স</option>
                    <option value="পলি">পলি</option>
                    <option value="পিছ">পিছ</option>
                    <option value="জার">জার</option>
                </select>

                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required><br>

                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="list-box">
            <table>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Piece</th>
                    <th>Buy Rate</th>
                    <th>price</th>
                    <th>Category</th>
                    <th>Company</th>
                    <th>Exist</th>
                    <th>Option</th>
                </tr>
                <?php
                @include "../public/php/config.php";
                $sql2 = "SELECT * FROM product";
                $result2 = mysqli_query($con, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="../public/image/product/<?php echo $row2['image'] ?>" alt="">
                        </td>
                        <td><?php echo $row2['name'] ?></td>
                        <td><?php echo $row2['box_type'] ?></td>
                        <td><?php echo $row2['piece'] ?></td>
                        <td>$<?php echo $row2['buy_rate'] ?></td>
                        <td>$<?php echo $row2['price'] ?></td>
                        <td><?php echo $row2['category_id'] ?></td>
                        <td><?php echo $row2['company_id'] ?></td>
                        <td>On</td>
                        <td>
                            <span class="edit">Edit</span>
                            <span class="delete">Delete</span>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>