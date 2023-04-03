<?php
include "config.php";
/** proses update data **/
if (isset($_POST["ubah"])) {
    $_id = $_POST["id"];
    $paket = $_POST["paket"];
    mysqli_query($connection,"UPDATE paket_kursus SET nama_paket = '$paket' WHERE id = '$_id'");
    header("location:index.php");
}

/**Tampil data pada form**/
$id = $_GET["update"];
$edit = mysqli_query($connection,"SELECT * FROM paket_kursus WHERE id = '$id'");
if (mysqli_num_rows($edit)== 0) header("location:index.php");
$row_edit = mysqli_fetch_array($edit);

/**query**/
$query = mysqli_query($connection," SELECT * FROM paket_kursus");

?>
<form method="post">
    <input type="text" name="paket" value="<?php echo $row_edit["nama_paket"]?>">
    <input type="submit" value="simpan" name="ubah">
    <input type="reset" value="batal">
    <input type="hidden" name="id" value="<?php echo $row_edit["id"]?>">
</form>
<br /><br />
<table border = 1>
    <tr>
        <th>No</th>
        <th>Paket kursus</th>
        <th>action</th>
    </tr>
    <?php if(mysqli_num_rows($query) > 0) {?>
        <?php $no = 1 ?>
        <?php while($row = mysqli_fetch_array($query)) {?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php  echo $row["nama_paket"]?></td>
        <td>
            <a href="update.php?update=<?php echo $row["id"]?>">Update</a>
            <a href="delete.php?delete=<?php echo $row["id"]?>">delete</a>
        </td>
    </tr>
    <?php $no++; }?>
    <?php }?>
</table>
<?php
mysqli_close($connection);

?>