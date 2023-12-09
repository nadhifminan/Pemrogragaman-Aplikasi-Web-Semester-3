<?php
  if (isset($_POST["tombol"]))
	{
		echo "<pre>";
		//print_r($_POST);
		echo "</pre>";
		
		$head = $_POST["head"];
		$detail = $_POST["item"];
		echo "Head Looping Foreach <br/>";
		foreach ($head as $k => $v)
		{
			echo $k . " = " . $v . "<br/>";
		}
		echo "<hr/>Head Tanpa Looping <br/>";
		echo "Tanggal : ". $head["tanggal"] . "<br/>";
		echo "Keterangan : ". $head["keterangan"] ."<br/><br/>";
		
		$items = array();
		
		for ($i = 0; $i < sizeof($detail['id']); $i++) {
                array_push($items, array(
                    "ID" => $detail['id'][$i],
                    "Harga Sewa" => $detail['hargasewa'][$i]
                ));
		}
		echo "<pre>";
		print_r($items);
		echo "</pre>";
		
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
            <td>: <input placeholder="Keterangan" type="text" name="head[keterangan]"  ></td>
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