<?php
// $koneksi=mysqli_connect("localhost","root","","perpustakaan");
if (isset($_POST["tombol"])) {
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "perpustakaan";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $head = $_POST["head"];
    $detail = $_POST["item"];

    
    $query = "INSERT INTO peminjaman (tanggal, keterangan) VALUES ('" . $head['tanggal'] . "', '" . $head['keterangan'] . "')";

    if (mysqli_query($conn, $query)) {
        $lastInsertId = mysqli_insert_id($conn); 

        
        for ($i = 0; $i < count($detail['id']); $i++) {
            $id = $detail['id'][$i];
            $hargaSewa = $detail['hargasewa'][$i];
            $detailQuery = "INSERT INTO perpustakaan_detail (id_perpustakaan, id_buku, harga_sewa) VALUES ('$lastInsertId', '$id', '$hargaSewa')";
            if (!mysqli_query($conn, $detailQuery)) {
                echo "Error: " . $detailQuery . "<br>" . mysqli_error($conn);
            }
        }

        echo "Data has been successfully inserted into the database.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <td>Tanggal </td>
            <td>: <input type="date" name="head[tanggal]" ></td>
        </tr>
		<tr>
            <td>Keterangan </td>
            <td>: <input type="text" name="head[keterangan]" value="KEterangan" ></td>
        </tr>
    </table>
    <hr/>
    <table width ="30%">
        <tr>
            <th><input placeholder="Id Buku" type="text" class="span1" name="id" id="id"/></th>
            <th><input placeholder="Harga Sewa" type="text" class="span3" name="hargasewa" id="hargasewa"/></th>
            <th>Action</th>
        </tr>
        <tbody id="itemlist">
			
			<tr>
				<td><input type="hidden" name="item[id][]" value="0">ITEM002</td>
				<td><input type="text" class="span2" name="item[hargasewa][]" value="10000"></td>
				<td><a hr	ef="javascript:void(0);" id="hapus">Remove</a></td>
			</tr>
        </tbody>
    </table>
    <input type="submit" name="tombol" value="Save"/>
</form>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<script type="text/javascript">
    $('#hargasewa').on('keypress', function(e) {
        if(e.keyCode==13){
            $('#id').focus();
        }
    });
   
    function clear (){
        $("#id").val("");
        $("#hargasewa").val("");
    }
     $("tbody#itemlist").on("click","#hapus",function(){
        $(this).parent().parent().remove();
    });
    $('#hargasewa').on('keypress', function(e) {
        if(e.keyCode==13){
            e.preventDefault();
            var id = $("#id").val();
            var hargasewa = $("#hargasewa").val();
            var items = "";
            items += "<tr>";
            items += "<td><input type='hidden' name='item[id][]' value='"+ id +"'>"+id+"</td>";
            items += "<td><input type='text' class='span2' name='item[hargasewa][]' value='"+ hargasewa +"'></td>";
            items += "<td><a href='javascript:void(0);' id='hapus'>Remove</a></td>";
			items += "</tr>";
        
            if ($("tbody#itemlist tr").length == 0)
            {
                $("#itemlist").append(items);
                clear();
            }else{
                var callback = checkList(id);
                if(callback === true){
                    $("#itemlist").append(items);
                    clear();
                    return false;
                }
            }
        }
    });

    function checkList(val){
        var cb = true;
        console.log($(id).val());
    
        $("#itemlist tr").each(function(index){
            var input = $(this).find("input[type='hidden']:first");
            if (input.val() == $(id).val()){
                cb = false;
            }
        });
        return cb;
    }

   
</script>