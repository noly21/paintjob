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
            <li class="disable"><a class="link-disable" href="{{url('/')}}">NEW PAINT JOB</a></li>
            <li class="active"><a class="link-active" href="{{url('/paintjobs')}}"> PAINT JOBS </a></li>
        </ul>
    </div>
 </header>



    <div class="title">
        <h2>Paint Jobs</h2>
    </div>
    <div class="container">
    <h3>Paint Jobs Completed</h3>
        <table class="tables" id="tables">
            <thead>
                <tr>
                    <th>Plate No.</th>
                    <th>Current Color</th>
                    <th>Target Color</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($post_completed as $s)
                <tr>
                    <td>{{ $s->Plate_no }}</td>
                    <td>{{ $s->Current_color }}</td>
                    <td>{{ $s->Target_color }}</td>
                    <td>
                        Mark as Completed
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="sub-container">
    <h3>Summary:</h3>
        <table id="tables3">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td>Total Cars Painted: </td>
                    <td>{{$post_count}}</td>
                </tr>

                <tr>
                    <td>Break Down:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Blue:</td>
                    <td>{{$post_blue}}</td>
                </tr>
                <tr>
                    <td>RED</td>
                    <td>{{$post_red}}</td>
                </tr>
                <tr>
                    <td>GREEN</td>
                    <td>{{$post_green}}</td>
                </tr>
            </tbody>
        </table>
        </div>

    
    <div class="container">
    <h3>Paint Jobs In Progress</h3>
        <table class="tables" id="tables1">
            <thead>
                <tr>
                    <th>Plate No.</th>
                    <th>Current Color</th>
                    <th>Target Color</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($post_progress as $s)
                <tr>
                    <td>{{ $s->Plate_no }}</td>
                    <td>{{ $s->Current_color }}</td>
                    <td>{{ $s->Target_color }}</td>
                    <td id="{{ $s->id }}"> 
                        <!-- @if ($s->action == 'On Progress') -->
                            <button id="progress" data-attr="{{ $s->id }}">{{$s->action}}</button>
                        <!-- @else
                        Mark as Completed
                        @endif -->
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    
    <div class="container">
    <h3>Paint Queue</h3>
        <table class="tables" id="tables2">
            <thead>
                <tr>
                    <th>Plate No.</th>
                    <th>Current Color</th>
                    <th>Target Color</th>
                </tr>
            </thead>

            <tbody>
                @foreach($post_queue as $s)
                <tr>
                    <td>{{ $s->Plate_no }}</td>
                    <td>{{ $s->Current_color }}</td>
                    <td>{{ $s->Target_color }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>


    <script>
        $(document).ready(function(){
            var token = $("meta[name='csrf-token']").attr("content");
            const button = $('button#progress');
            button.each(function(index, btn){
                $(this).on('click', function(btn , index){

                    var id = $(this).attr('data-attr');

                    $.ajax({
                        url: 'update_progress/'+ id,
                        type: "POST",
                        data: {
                            "id": id,
                            "_token": '{{ csrf_token() }}'

                        },
                        success: function(data){
                            console.log(data);
                            setTimeout(function(){
                                $("#tables").load(window.location + " #tables");
                                $("#tables1").load(window.location + " #tables1");
                                $("#tables2").load(window.location + " #tables2");
                                $("#tables3").load(window.location + " #tables3");
                            }, 5000);

                        }
                });
                });
            });

        });

    </script>

</body>
</html>