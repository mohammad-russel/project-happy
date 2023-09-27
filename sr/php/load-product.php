<?php
session_start();
$sr_id = $_SESSION["sr_id"];
@include "../../public/php/config.php";

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $sql = "SELECT * FROM product WHERE category_id = $category_id ORDER BY id DESC";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="s-product" onclick="productView()">
                <div class="mb-4 flex h-24 w-full justify-center p-2">
                    <!-- NOTE: image size 100x100 px -->
                    <img class="w-full object-contain" src="../public/image/product/<?php echo $row['image'] ?>" alt="" />
                </div>
                <h4 class="bn mb-4 text-[14px] font-medium text-[#222950]"><?php echo $row['name'] ?><span class="bn ml-2 text-[12px] text-[#8094AA]">(50g)</span></h4>
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-[#007AFF]">৳ <?php echo $row['price'] ?></h1>
                    <a href="#" class="add-to">
                        <ion-icon class="text-2xl" name="add-outline"></ion-icon>
                    </a>
                </div>
            </div>

        <?php
        }
    }
} else {
    $limit = 20;
    // $start = $_POST['page'];
    $sql = "SELECT *,product.id AS product_id FROM product ORDER BY id DESC LIMIT $limit";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="s-product" onclick="productView()">
                <input type="hidden" name="product_id" class="product_id" id="product_id" value="<?php echo $row['product_id'] ?>">
                <div class="mb-4 flex h-24 w-full justify-center p-2">
                    <!-- NOTE: image size 100x100 px -->
                    <img class="w-full object-contain" src="../public/image/product/<?php echo $row['image'] ?>" alt="" />
                </div>
                <h4 class="bn mb-4 text-[14px] font-medium text-[#222950]"><?php echo $row['name'] ?><span class="bn ml-2 text-[12px] text-[#8094AA]">(50g)</span></h4>
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-[#007AFF]">৳ <?php echo $row['price'] ?></h1>
                    <a href="#" class="add-to">
                        <ion-icon class="text-2xl" name="add-outline"></ion-icon>
                    </a>
                </div>
            </div>

<?php }
    }
} ?>