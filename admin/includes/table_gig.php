<!-- delete older gigs -->


<div class="table">
<?php 
   deleteExpiredEvent();
    $table_count = countNumRows("gig_date", "gigs")
     
?>
<h1>Total gigs in <?php  echo date("Y"). " - " . $table_count; ?></h1>
<table>
                

    <?php 
 
    //select all gigs 
    $query = "SELECT * FROM gigs ORDER BY gig_date";
    $select_all_gigs = mysqli_query($connection, $query);
    $all_items = mysqli_num_rows($select_all_gigs);
    for($i = 1; $i <= $all_items;){
        while($row = mysqli_fetch_assoc($select_all_gigs)){
            $gig_id = $row["gig_id"];
            $gig_date = $row["gig_date"];
            $gig_place = $row["gig_place"];
            $gig_start = $row["gig_start"];
            $gig_end = $row["gig_end"];
            $gig_cost = $row["gig_cost"];
            $gig_date = strtotime($gig_date);
        
        ?>
        <tr>
        <td id="no"><?php echo $i++;?></td>
            <td id="td-date"><?php echo date("l jS F Y",$gig_date);?></td>

            <td class="td-content"><?php echo $gig_place;?></td>

            <td>Start: <?php echo $gig_start;?></td>
            <td>End: <?php if($gig_end == 00 ) echo "Midnight"; else echo $gig_end;?></td>
            <td>Enter: <?php echo $gig_cost;?></td>
            <td class="td-hidden" id="edit"><a href="index.php?source=edit_gig&get_gig_id=<?php echo $gig_id?>">Edit</a></td>
            <td class="td-hidden" id="delete"><a href="index.php?source=show_table&delete=<?php echo $gig_id?>">Delete</a></td>
        </tr>

    <?php } }?>

    <?php
    deleteItem("delete","gigs","gig_id","index.php?source=show_table");
    ?>  
</table>
</div>