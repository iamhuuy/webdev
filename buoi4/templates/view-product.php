<?php
require "../config/connect.php";
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $idtv = $_SESSION['idtv'];

    $sql = "SELECT tensp, hinhanhsp FROM sanpham WHERE idtv = '$idtv'";

    $result = $conn->query($sql);

    $productLinks = [];
    $productNames = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($productNames, $row["tensp"]);
            array_push($productLinks, $row["hinhanhsp"]);
        }
    } else {
        //
    }

} else {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ảnh sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="container">
        <?php include "controller-bar.php" ?>
        <div class="content">
            <h3>Đây là trang xem sản phẩm</h3>
            <form>
                <img id="laptopImg" src="" height="300" width="300" />
                <br/>
                <input type="button" name="previous" value="Previous" onclick="">
                <input type="button" name="next" value="Next" onclick="">
                <br/>
                <select name="laptopSel" onchange="">
                    <!-- <option>Choose a number</option> -->
                </select>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var PRODUCT_LINKS = <?php echo '["' . implode('", "', $productLinks) . '"]' ?>;
        var PRODUCT_NAMES = <?php echo '["' . implode('", "', $productNames) . '"]' ?>;

        function loadDropdown() {
            var select = document.getElementsByName("laptopSel")[0];
            // var options = PRODUCT_LINKS.slice();

            console.log(PRODUCT_LINKS.length);

            for (var i = 0; i < PRODUCT_LINKS.length; i++) {
                var opt = PRODUCT_LINKS[i];
                var el = document.createElement("option");
                el.textContext = opt;
                el.value = opt;
                select.appendChild(el);

                console.log(PRODUCT_LINKS[i]);
            }
        }

        function changeSlide(pos) {
            // get current path to compare with IMAGE_PATHS to get array index
            var positionToSlice = document.getElementById('laptopImg').src.search("img/");
            var path = document.getElementById('laptopImg').src.slice(positionToSlice);

            // get select option element
            var elementSelect = document.getElementsByName('laptopSel')[0];

            // loop to get array index
            var i = 0;
            while (path.localeCompare(PRODUCT_LINKS[i]) != 0) {
                i++;
            }

            var positionArray = i + pos;

            if (positionArray < 0) positionArray = 3;
            else if (positionArray > 3) positionArray = 0;

            document.getElementById('laptopImg').src = "../" + PRODUCT_LINKS[positionArray];

            elementSelect.value = elementSelect.options[positionArray].value;
        }

        function chooseSlide(pos) {
            document.getElementById('laptopImg').src = "../" + PRODUCT_LINKS[pos];
        }

        document.getElementById('laptopImg').src = PRODUCT_LINKS[0];
        loadDropdown();
    </script>
</body>
</html>
