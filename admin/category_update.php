<?php
include("header.php");
include("connection.php");

$sql = "select * from role";
$result = mysqli_query($conn,$sql);
?>


<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Element</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Category Name</label>
                                <?php
                                $Id = $_GET['id'];
                                $sql = "select * from category where id = $Id";
                                $result = mysqli_query($conn,$sql);
                                $rows = mysqli_fetch_assoc($result);
                                ?>
                                <input type="text" name="categoryname" value="<?php echo $rows['CategoryName'] ?>" class="form-control" placeholder="Enter The Name">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Category Image</label>
                                <h6><span>Category Image : </Span><?php echo $rows['CategoryImage'] ?></h6>
                                <input type="file" name="categoryimage" class="form-control">
                            </div>
                        </div>
                                           
                        <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
<?php

if(isset($_POST['update'])){
    $categoryname = $_POST['categoryname'];
    $categoryimage = $_POST['categoryimage'];

    $sql = "update category set categoryname = '$categoryname', categoryimage = '$categoryimage' where id = $Id";
    $result = mysqli_query($conn,$sql);
            echo "<script>
            alert('Category Updated Successfully');
            window.location.href = 'category_show.php'
            </script>";
}


include("footer.php");
?>