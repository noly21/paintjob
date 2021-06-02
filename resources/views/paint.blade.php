<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/main.js"></script>

    <title>Paint</title>
   

</head>
<body>

<header>
    <div class="header">
        <h1>JUAN'S AUTO PAINT</h1>
    </div>
    <div class="nav">
        <ul>
            <li class="active"><a class="link-active" href="{{url('/')}}">NEW PAINT JOB</a></li>
            <li class="disable"> <a class="link-disable" href="{{url('/paintjobs')}}">PAINT JOBS</a> </li>
        </ul>
    </div>
</header>


    <div class="title">
        <h2>New Paint Job</h2>
    </div>
    <div class="image">
        <img src="public/images/Default-Car.png" alt="" id="current">
        
        <img src="public/images/shape.png" alt="" width="200">

        <img src='public/images/Default-Car.png' alt="" id="target">
    </div>
    <div class="form">
        <h3>Car Details</h3>
        <form action="{{route('save.post')}}" method="post">
        @csrf
        <div class="myinput">
            <label for="plate-no">Plate No.</label>
            <input type="text" name="plate-no" id="plate-no" >
        </div>
        <div class="myinput">
            <label for="current-color">Current Color</label>
            <select type="select" name="current-color" id="current-color" >
            <option></option>
            <option value="RED">RED</option>
            <option value="BLUE">BLUE</option>
            <option value="GREEN">GREEN</option>
            </select>
            
        </div>
       <div class="myinput">
       <label for="target-color">Target Color</label>
       <select type="select" name="target-color" id="target-color" >
            <option></option>
            <option value="RED">RED</option>
            <option value="BLUE">BLUE</option>
            <option value="GREEN">GREEN</option>
            </select>
       </div>

        <input type="submit" name="" id="" value="Submit" class="btn">

        </form>
    
    </div>




</body>
</html>