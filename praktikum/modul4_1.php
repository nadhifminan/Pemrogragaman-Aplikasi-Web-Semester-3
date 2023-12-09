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
    <form action="modul4_1.php" method="POST">
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
                    <input type="text" id="email" name="email"><br>
                </div>
                <div class="form">
                    <label for="tanggal" class="kiri">tanggal</label>
                    <input type="text" id="tggl" name="tanggal"><br>
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