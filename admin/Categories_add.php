<?php
require_once "../includes/DB.php";

require_once "../includes/Sessions.php";
ob_start();
require_once "../includes/Function.php";
include "head.php";
include "left_panel.php";
?>
<?php
if (isset($_POST["Submit"])) {
    $Category = $_POST["CategoryTitle"];
    $Admin = "Ahror";
    date_default_timezone_set("Asia/Tashkent");
    $CurrentTime = time();
    $DataTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
    if (empty($Category)) {
        $_SESSION["ErrorMessage"] = "Categoriyani kiriting";
        Redirect_to("Categories_add.php");
    } elseif (strlen($Category) < 3) {
        $_SESSION["ErrorMessage"] = "Categoriya harflar soni 2 tadan ko'p bo'lsin";
        Redirect_to("Categories_add.php");
    } elseif (strlen($Category) > 49) {
        $_SESSION["ErrorMessage"] = "Categoriya harflar soni 50 tadan ko'p bo'lishi mumkin";
        Redirect_to("Categories_add.php");
    } else {
        $sql = "INSERT INTO category(title, author, datetime)";
        $sql .= "VALUES(:categoryName,:adminName,:dateTime)";

        $stmt = $ConnectionDB->prepare($sql);
        $stmt->bindValue(':categoryName', $Category);
        $stmt->bindValue(':adminName', $Admin);
        $stmt->bindValue(':dateTime', $DataTime);
        $Execute = $stmt->execute();
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Categoriya omadli qo'shildi";
            Redirect_to("Categories_add.php");
        } else {
            $_SESSION["ErrorMessage"] = "Xatolik yuz berdi";
            Redirect_to("Categories_add.php");
        }
    }
}
?>

    <div id="right-panel" class="right-panel">
        <?php
        include "header.php";
        include "clearfix.php";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Category</h1>
                    <div class="row my-5">
                        <div class="col-6 offset-3">
                            <h3 class="mb-3 text-info">Add Category</h3>
                            <?php
                            echo ErrorMassage();
                            echo SuccessMassage();
                            ?>
                            <form action="Categories_add.php" method="post">
                                <div class="form-group">
                                    <label for="categories" class="text-primary  d-block">Category Title</label>
                                    <input type="text" id="category" name="CategoryTitle" placeholder="Category"
                                           class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="index.php" class="btn btn-danger btn-block">
                                            Dashboard
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="Submit" class="btn btn-success btn-block">
                                            Publish
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-8 offset-2">
                            <h3>All Categories</h3>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>N</th>
                                    <th>Category name</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Yangiliklar</td>
                                    <th>
                                        <button class="btn btn-info" style="width: 45%">Edit</button>
                                        <button class="btn btn-danger" style="width: 45%">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Farovon yurt</td>
                                    <th>
                                        <button class="btn btn-info" style="width: 45%">Edit</button>
                                        <button class="btn btn-danger" style="width: 45%">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tahliliy maqolalar</td>
                                    <th>
                                        <button class="btn btn-info" style="width: 45%">Edit</button>
                                        <button class="btn btn-danger" style="width: 45%">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Suhbatlar</td>
                                    <th>
                                        <button class="btn btn-info" style="width: 45%">Edit</button>
                                        <button class="btn btn-danger" style="width: 45%">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Foydali maslahatlar</td>
                                    <th>
                                        <button class="btn btn-info" style="width: 45%">Edit</button>
                                        <button class="btn btn-danger" style="width: 45%">Delete</button>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
<?php
include "script.php";
?>