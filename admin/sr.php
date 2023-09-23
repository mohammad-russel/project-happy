<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
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
            <form action="php/add-sr" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="sr Name">
                <input type="text" name="number" placeholder="sr Number">
                <input type="file" name="image" placeholder="Image URL">
                <select name="deller_id" id="deller_id">
                    <option value="2">deller</option>
                </select>
                <select name="company_id" id="company_id">
                    <option value="2">company</option>
                </select>
                <select name="route_id" id="route_id">
                    <option value="2">company</option>
                </select>
                <input type="password" name="password" placeholder="Password">
                <label for="activity">Publish product?</label>
                <input type="checkbox" name="activity" id="activity" value="1">
                <input type="submit" name="add" value="Add">
            </form>
        </div>
        <div class="list-box">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Image</th>
                    <th>Deller</th>
                    <th>Company</th>
                    <th>Route</th>
                    <th>Password</th>
                    <th>Activity</th>
                    <th>Options</th>
                </tr>
                <?php
                @include "../public/php/config.php";

                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                $sql = "SELECT * FROM sr";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['number']; ?></td>
                            <td><?php echo $row['image']; ?></td>
                            <td><?php echo $row['deller_id']; ?></td>
                            <td><?php echo $row['company_id']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['activity']; ?></td>
                            <td><?php echo $row['route_id']; ?></td>
                            <td>
                                <span class="edit">Edit</span>
                                <span class="delete">Delete</span>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                $con->close();
                ?>
            </table>
        </div>
    </div>
</body>

</html>