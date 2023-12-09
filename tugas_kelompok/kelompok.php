<?php 

    if(isset($_POST["tombol"])) {

    }

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <td>No </td>
            <td>: <input type="text" name="head[nofaktur]" value="xxx-103-001" ></td>
        </tr>
		<tr>
            <td>Nama Kasir </td>
            <td>: <input type="text" name="head[namakasir]" value="Suhendra" ></td>
        </tr>
        <tr>
            <td>Tanggal </td>
            <td>: <?php echo date("d, M Y"); ?></td>
        </tr>
    </table>
    <hr/>
    <table width ="50%">
        <tr>
            <th><input placeholder="Code" type="text" class="span1" name="id_" id="itemcode"/></th>
            <th><input placeholder="Item Name" type="text" class="span3" name="itemname" id="itemname"/></th>
            <th><input placeholder="Price" type="text" class="span2" name="itemprice" id="itemprice"/></th>
            <th><input placeholder="Qty" type="text" class="span2" name="itemqty" id="itemqty"/></th>
            <th>Action</th>
        </tr>
        <tbody id="itemlist">
			<tr>
				<td><input type="hidden" name="item[code][]" value="ITEM001">ITEM001</td>
				<td>Item 1</td>
				<td><input type="text" class="span2" name="item[price][]" value="5000"></td>
				<td><input type="text" class="span2" name="item[qty][]" value="10"></td>
				<td><a href="javascript:void(0);" id="hapus">Remove</a></td>
			</tr>
			<tr>
				<td><input type="hidden" name="item[code][]" value="ITEM002">ITEM002</td>
				<td>Item 1</td>
				<td><input type="text" class="span2" name="item[price][]" value="10000"></td>
				<td><input type="text" class="span2" name="item[qty][]" value="10"></td>
				<td><a href="javascript:void(0);" id="hapus">Remove</a></td>
			</tr>
        </tbody>
    </table>
    <input type="submit" name="tombol" value="Save"/>
</form>