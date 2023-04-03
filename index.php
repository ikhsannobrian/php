<?php
include "config.php";
/** proses input data **/
if (isset($_POST["simpan"])) {
    $paket = $_POST["paket"];
    mysqli_query($connection,"INSERT INTO paket_kursus VALUES ('','$paket')");
    header("location:index.php");
}


/**query**/
$query = mysqli_query($connection," SELECT * FROM paket_kursus");

?>
<form method="post">
    <input type="text" name="paket">
    <input type="submit" value="simpan" name="simpan">
    <input type="reset" value="batal">
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