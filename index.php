<?php
include 'inc/header.php';
include "config.php";
include "Database.php";
?>
<?php
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read = $db->select($query);
?>
<?php
if (isset($_GET['msg'])) {
    echo "<span style = 'color:green';>" . $_GET['msg'] . "</span>";
}
?>
<table class="tblone">
    <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Email</th>
        <th>Skill</th>
        <th>Action</th>
    </tr>
    <?php if ($read) { ?>
        <?php while ($row = $read->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['skill']; ?>
                </td>
                <td><button class="indicator">
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <p>Data is not available!! </p>
    <?php } ?>
</table>
<a href="create.php">Create</a>
<?php include 'inc/footer.php'; ?>