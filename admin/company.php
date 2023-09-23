<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset some default browser styles */
        body,
        h1,
        h2,
        p,
        ul,
        li,
        form {
            margin: 0;
            padding: 0;
        }

        /* Apply a background color and text color to the body */
        body {
            background-color: #f0f0f0;
            color: #333;
            font-family: Arial, sans-serif;
        }

        /* Style the container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the add-box */
        .add-box {
            margin-bottom: 20px;
        }

        /* Style the form inside the add-box */
        .add-box form {
            display: flex;
            justify-content: space-between;
        }

        .add-box input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .add-box input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style the list-box */
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
            background-color: #007bff;
            color: #fff;
        }

        /* Style the table rows alternately */
        .list-box tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style the <td> element */
        td {
            text-align: center;
            padding: 10px;
        }

        /* Style the "Edit" and "Delete" spans */
        .edit,
        .delete {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            /* Change to your desired background color */
            color: #fff;
            /* Change to your desired text color */
            cursor: pointer;
            margin-right: 5px;
            /* Add some spacing between the spans */
            border-radius: 5px;
        }

        /* Hover effect for the spans */
        .edit:hover,
        .delete:hover {
            background-color: #0056b3;
            /* Change to your desired hover background color */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="add-box">
            <form action="php/add-company" method="post">
                <input type="text" name="company" id="company" placeholder="Company Name">
                <input type="submit" name="add" value="Add">
            </form>
        </div>
        <div class="list-box">
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
                <?php
                @include "../public/php/config.php";
                $sql = "SELECT * FROM company";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>#<?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
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