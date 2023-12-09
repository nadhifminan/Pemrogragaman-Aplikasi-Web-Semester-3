<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form php</title>
    <style>
        body{
            background-color: rgb(153,153,255);
            font-family: calibri;
        }
        .register{
            width: 95%;
            height: 550px;
            background-color: white;
            padding-left: 15px;
        }
        .register h1{
            padding-top: 25px;
        }
        .register fieldset{
           background-color: rgb(221,221,255);
           margin-left: 10px;
           margin-right: 10px;
           height: 80%;
        }
        .kiri{
            padding-left: 10px;
            padding-right: 10px;
            text-align: right;
        }
        .form{
            display:flex;
        }
        .form>:first-child{
            width: 150px;

        }
        #alamat{
            height: 30px;
            width: 120px;
        }
        #kirim{
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <form action="processData.php" method="POST">
        <div class="register">
            <h1>Register</h1>
            <fieldset>
                <legend><h3>Person Details</h3></legend>
                <div class="form">
                    <label for="name" class="kiri">Nama Lengkap</label>
                    <input type="text" id="name" name="surname"><br>
                </div>
                
                <div class="form">
                    <label for="email" class="kiri">Email adress</label>
                    <input type="email" id="email" name="email"><br>
                </div>
                
                <div class="form">         
                <label for="pswd" class="kiri">Password</label>
                <input type="password" id="pswd" name="passwd"><br>
                </div>
                <div class="form">
                <label for="alamat" class="kiri">Alamat</label>
                <input type="textarea" id="alamat" name="address"><br>
                </div>
                <div class="form">
                <label for="propinsi" class="kiri">Propinsi :</label>
                <select name="status" id="propinsi" name="state">
                    <option name="Jawa Tengah" value="1">Jawa Tengah</option>
                    <option name="Jawa Timur" value="2">Jawa Timur</option>
                    <option name="Jawa Barat" value="3">Jawa Barat</option>
                    <option name="Yogyakarta" value="4">Yogyakarta</option>
                </select>
                <input type="hidden" name="country" value="Indonesia"><br>
                </div>
                <div class="form">
                
                <label for="sex" class="kiri">Gender</label>
                    <input type="radio" name="sex" value="Male" >
                    Male
                    <input type="radio" name="sex" value="Female">
                    Female<br>
                </div>
                <div class="form">
                <label for="vgt" class="kiri">Vegetarian?</label>
                <input type="checkbox"  id="vgt" value="Ya"><br>
                </div>

                <div class="form">
                    <label for="kirim"></label>
                    <input type="submit" value="Submit" id="kirim" name="submit">
                    <input type="reset" value="Reset" id="reset">
                </div>
            </fieldset>
        </div>
    </form>
</body>
</html>