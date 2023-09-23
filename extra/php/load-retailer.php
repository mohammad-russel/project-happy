<?php
session_start();
$aid = $_SESSION["user_id"];
@include "../../public/php/config.php";
if (isset($_POST['bazar'])) {
    $filter = $_POST['bazar'];
    $sql = "SELECT *,retailer.id AS retailer_id FROM retailer INNER JOIN bazar ON retailer.bazar_id = bazar.id WHERE bazar_id = $filter ORDER BY retailer.id DESC LIMIT 10 ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {

            $fields = ['retailer_image' => 35, 'shop_image' => 15, 'name' => 10, 'number' => 10, 'area' => 10, 'shop_name' => 10, 'bazar_id' => 10];
            $progress = 0;

            foreach ($fields as $field => $value) {
                if (!empty($row[$field])) {
                    $$field = $value;
                    $progress += $value;
                } else {
                    $$field = 0;
                }
            }
?>
            <a href="#" class="tran relative flex flex-col items-center rounded-2xl border border-[#2E318514] bg-white text-center shadow-lg shadow-blue-800/5 hover:ring-1">
                <img class="tran edit-btn absolute right-0 top-0 w-10 lg:w-8 rounded-bl-2xl rounded-tr-2xl border-b border-l border-[#2E318514] p-2 hover:bg-slate-100" src="edit.svg" alt="edit" />
                <div class="flex flex-col items-center justify-center p-4">
                    <img class="mb-3 h-[80px] w-[80px] rounded-xl object-cover" src="../public/image/retailer/<?php echo $row['retailer_image'] ?>" alt="" />
                    <h3 class="bn mb-0.5 text-[14px] font-semibold text-[#222950]"><?php echo $row['name'] ?></h3>
                    <p class="bn mb-0.5 text-[14px] font-medium text-blue-500"><?php echo $row['bazar_name'] ?></p>
                    <span class="bn text-[13px] text-[#3c424d]"><?php echo $row['area'] ?></span>
                </div>
                <div class="flex w-full items-center gap-4 bg-[#007AFF0A] px-4 py-3">
                    <span class="text-sm font-medium text-[#007AFF]"><?php echo $progress ?>%</span>
                    <div class="h-2 w-full overflow-hidden rounded-full bg-[#007AFF1F]">
                        <div style="width:<?php echo $progress ?>%" class="h-full rounded-full bg-[#007AFF]"></div>
                    </div>
                </div>
            </a>
        <?php
        }
    }
} else {

    $sql = "SELECT *,retailer.id AS retailer_id,bazar.id AS bazar_id FROM retailer INNER JOIN bazar ON retailer.bazar_id = bazar.id  INNER JOIN unions ON bazar.union_id = unions.id WHERE activer_id = $aid AND pay = 0  ORDER BY retailer.id DESC LIMIT 10 ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $fields = ['retailer_image' => 35, 'shop_image' => 15, 'name' => 10, 'number' => 10, 'area' => 10, 'shop_name' => 10, 'bazar_id' => 10];
            $progress = 0;

            foreach ($fields as $field => $value) {
                if (!empty($row[$field])) {
                    $$field = $value;
                    $progress += $value;
                } else {
                    $$field = 0;
                }
            }
        ?>
            <a href="#" class="tran relative flex flex-col items-center rounded-2xl border border-[#2E318514] bg-white text-center shadow-lg shadow-blue-800/5 hover:ring-1">
                <input type="hidden" name="amount" id="amount" class="amount" value="<?php echo $progress ?>">
                <img class="tran edit-btn absolute right-0 top-0 w-10 lg:w-8 rounded-bl-2xl rounded-tr-2xl border-b border-l border-[#2E318514] p-2 hover:bg-slate-100" src="edit.svg" alt="edit" />
                <div class="flex flex-col items-center justify-center p-4">
                    <img class="mb-3 h-[80px] w-[80px] rounded-xl object-cover" src="../public/image/retailer/<?php echo $row['retailer_image'] ?>" alt="" />
                    <h3 class="bn mb-0.5 text-[14px] font-semibold text-[#222950]"><?php echo $row['name'] ?></h3>
                    <p class="bn mb-0.5 text-[14px] font-medium text-blue-500"><?php echo $row['bazar_name'] ?></p>
                    <span class="bn text-[13px] text-[#3c424d]"><?php echo $row['area'] ?></span>
                </div>
                <div class="flex w-full items-center gap-4 bg-[#007AFF0A] px-4 py-3">
                    <span class="text-sm font-medium text-[#007AFF]"><?php echo $progress ?>%</span>
                    <div class="h-2 w-full overflow-hidden rounded-full bg-[#007AFF1F]">
                        <div style="width:<?php echo $progress ?>%" class="h-full rounded-full bg-[#007AFF]"></div>
                    </div>
                </div>
                <div class="edit-popup bg-[#007AFF]">
                    <div class="edit-box relative mt-20 min-w-[315px] rounded-xl bg-white p-5 md:min-w-[580px]">
                        <ion-icon class="close-edit absolute -top-16 right-0 h-6 w-6 cursor-pointer overflow-hidden rounded-full bg-white p-2 text-blue-600" name="close-outline"></ion-icon>
                        <div class="mb-8 flex items-center justify-between">
                            <h1 class="bn text-[18px] font-semibold text-[#595F84]">EDIT Retailer</h1>
                        </div>
                        <form action="php/edit-retailer" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                            <input type="hidden" name="id" id="id" value="<?php echo $row['retailer_id'] ?>" required>
                            <?php
                            if (empty($row['number'])) {
                            ?>
                                <input type="number" name="number" id="number" placeholder="Reatailer Number" class="empty reatailer-input text-[#222950]" value="<?php echo $row['number'] ?>" required>
                            <?php } else { ?>
                                <input class="" type="number" name="number" id="number" placeholder="Reatailer Number" class="exist reatailer-input text-[#222950]" value="<?php echo $row['number'] ?>" required>
                            <?php } ?>
                            <?php
                            if (empty($row['number'])) {
                            ?>
                            <?php } ?>
                            <label for="shop-image">Shop Image</label>
                            <input type="file" name="shop-image" id="shop-image" class="reatailer-input text-[#222950]">
                            <label for="shop-image">Retailer Image</label>
                            <input type="file" name="retailer-image" id="retailer-image" class="reatailer-input text-[#222950]">
                            <input type="text" name="name" id="name" placeholder="Reatailer Name" class="reatailer-input text-[#222950]" value="<?php echo $row['name'] ?>" required>
                            <input type="text" name="shop" id="shop" placeholder="Shop Name" class="reatailer-input text-[#222950]" value="<?php echo $row['shop_name'] ?>" required>
                            <select name="upazila" id="upazila" class="upazila reatailer-input text-[#222950]">
                                <option value="">Select Upazila</option>
                                <?php
                                @include "../../public/php/config.php";
                                $sql1 = "SELECT * FROM upazila";
                                $result1 = mysqli_query($con, $sql1);
                                while ($row1 = mysqli_fetch_assoc($result1)) {

                                ?>
                                    <option value="<?php echo $row1['id'] ?>"><?php echo $row1['upazila_name'] ?></option>
                                <?php } ?>
                            </select>
                            <select name="union" id="union" class="union reatailer-input text-[#222950]">
                                <option value="">Select union</option>
                            </select>
                            <select name="bazar" id="bazar" class="bazar reatailer-input text-[#222950]" required>
                                <option value="<?php echo $row['bazar_id'] ?>"><?php echo $row['bazar_name'] ?></option>
                            </select>
                            <!-- <input type="text" name="other" id="OtherBazarInput" class="hidden reatailer-input text-[#222950]" placeholder="Enter your Hat/Bazar/Mor/Para" value="<?php echo $row['area'] ?>"> -->
                            <input type="text" name="area" id="area" placeholder="area" class="reatailer-input text-[#222950]" value="<?php echo $row['area'] ?>" required>
                            <button type="submit" name="add" class="w-full py-4 rounded-xl bg-gradient-to-t from-[#0063FF] to-[#258AFF] font-semibold text-white transition-all duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700">Edit
                                Reatailer</button>
                        </form>
                    </div>
                </div>
            </a>
<?php }
    }
} ?>