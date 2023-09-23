<?php
@include "../../public/php/config.php";
$sql = "SELECT *,bazar_id FROM retailer INNER JOIN bazar ON retailer.bazar_id = bazar.id   GROUP BY bazar_id LIMIT 3";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bazar = $row['bazar_id'];
?>

        <!-- location name -->
        <div class="flex justify-center items-center bg-[#F7FAFE] py-2 rounded-xl gap-2">

            <ion-icon class="w-6 text-[#3796FF]" name="location"></ion-icon>
            <h1 class="text-[#222950] font-semibold bn"><?php echo $row['bazar_name'] ?></h1>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <?php
            $sql1 = "SELECT * FROM retailer WHERE bazar = $bazar ORDER BY id DESC";
            $result1 = mysqli_query($con, $sql);
            while ($row1 = mysqli_fetch_assoc($result1)) {
            ?>
                <a href="products?retailer_id=<?php echo $row1['id'] ?>" class="reatailer-info tran">
                    <div class="relative mb-4 flex justify-center">
                        <img class="mb-3 h-[70px] w-[70px] rounded-xl object-cover" src="../public/image/retailer/0D467930-5DA3-44F5-B6B3-C971458F2A1C.png" alt="" />
                        <span class="rea-serial">#<?php echo $row1['roll'] ?></span>
                    </div>
                    <h3 class="mb-1 text-[14px] font-semibold text-[#222950] bn"><?php echo $row1['name'] ?></h3>
                    <p class="mb-1 text-[14px] font-medium text-blue-500 bn"><?php echo $row1['name'] ?></p>
                    <span class="text-[13px] text-[#3c424d] bn"><?php echo $row['area'] ?></span>
                </a>
            <?php } ?>
        </div>

<?php     }
} ?>