<?php
	require_once "includes/config.php";

?>
<!-- link to custom js file -->
    <script type="text/javascript" src="js/main.js"></script>
<!-- this portion is wrapped under the content section -->
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Crop Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sr No</th>
                <th>CROP NAME</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
            $i = 0;
            $result = mysqli_query($db, "SELECT * FROM crops order by crop_name");
            while ($row = mysqli_fetch_assoc($result))
            {?>
                <tr>
                <td><?php echo ++$i?></td>
                <td><?php echo"$row[crop_name]"?></td>
                <td>
                    <button class="btn btn-danger btn-icon-split" onclick="delete_crop(<?php echo $row['id']; ?>)">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>

<!-- add crops modal in crops.php -->


<!-- Modal for adding crop -->
<div class="modal fade" id="addCropsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Crop Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controllers/crops_controller.php">
                    <input type="text" name="crop_name" placeholder="Enter Crop Name"> 
                    <input type="submit" class="btn btn-primary" value="Add" name="add_crop">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<!-- delete crops modal in crops.php -->


<!-- Modal for deleting crop -->
<div class="modal fade" id="deleteCropsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Crop to delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controllers/crops_controller.php">
                    <select name="crop_to_delete">
                        <?php
                            $result = mysqli_query($db, "SELECT * FROM crops");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=$row[id]>$row[crop_name]</option>";
                            }
                        ?>
                    </select>
                <input type="submit" class="btn btn-danger" value="Delete" name="delete_crop">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
    </div>
</div>