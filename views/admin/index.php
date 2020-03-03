<?php
$current_page = "HOME";
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/includes/utility/isAuth.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/revise/controller/services/admin/__usersList.php';
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="company_data" width="100%">
                <thead>
                    <tr>
                        <th class="text-right">id</th>
                        <th class="text-center">user</th>
                        <th class="text-center">status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
						<tr>
						<td class="text-right">' . $row["uid"] . '</td>
						<td class="text-center">' . $row["username"] . '</td>
                        <td class="text-center">' . $row["status"] . '</td>
                        <td class="text-center"><a href="http://localhost/revise/controller/services/admin/__usersDelete.php?uid=' . $row["uid"] . '&&type='.$row["type"].'">DELETE</td>
						</tr>
						';
                    } //end of while
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('../../includes/layouts/admin_layout_footer.php');
?>