<!DOCTYPE html>
<html>
<head>
    <title>page</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        .bgimage{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background:url("{{base_path().'\\public\\img\\white.jpg'}}");
            filter:blur(5px);
            -webkit-filter: blur(5px);
            background-size: cover;
            z-index: -2
        }
        .title{
            text-align: center;
            padding: 50px 0 20px;
        }
        .title{
            margin: 0;
            padding: 0;
            color: #000;
            text-shadow: 1px 1px 1px #000;
            text-transform: uppercase;
            font-size: 36px;
        }
        .container{
            width: 50%;
            height: 400px;
            background:#fff;
            margin:0 auto;
            border:2px solid #fff;
            box-shadow: 0 15px 40px rgba(0,0,0,.5)
        }
        .container .left{
            float: left;
            width: 50%;
            height: 400px;
            background:url("{{base_path().'\\public\\img\\lppm.jpg'}}");
            background-size: cover;
            box-sizing: border-box;
        }
        .container .right{
            float: right;
            width: 50%;
            height: 400px;
            box-sizing: border-box;
        }
        .formbox{
            width: 100%;
            padding: 80px 40px;
            box-sizing: border-box;
            height: 400px;
            background: #fff;
        }
        .formbox p{
            margin:0;
            padding: 0;
            font-weight: bold;
            /* color:#ff3333; */
            color:#000;
        }
        .formbox input{
            width: 100%;
            margin-bottom: 20px;
        }
        .formbox input[type="text"],
        .formbox input[type="password"]{
            border:none;
            border-bottom: 2px solid #000;
            outline: none;
            height: 40px
        }
        .formbox input[type="text"]:focus,
        .formbox input[type="password"]:focus{
            border-bottom: 2px solid #262626
        }
        .formbox input[type="submit"]{
            border:none;
            outline: none;
            height: 40px;
            color: #fff;
            background:#262626;
            cursor: pointer;
            transition: .5s;
        }
        .formbox input[type="submit"]:hover{
            background:#ADD8E6;
        }
        .formbox a{
            color: #262626;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="title"><h1>Login form</h1></div>
    <div class="bgimage"></div>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="formbox">
                <form>
                    <p>Username</p>
                    <input type="text" name="" placeholder="Online">
                    <p>Password</p>
                    <input type="password" name="" placeholder="******">
                    <input type="submit" name="" value="Login">
                </form>
            </div>
        </div>
    </div>

</body>
</html>