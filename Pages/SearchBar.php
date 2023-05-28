<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/searchbar.css">
    <title>Search Bar</title>
    <style>
        .gradient-custom-2 {
        background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
        min-height: 800px;
        }   
        .container{
            width: 350px; 
            margin: auto;
            padding-top: 50px;
        }
        .main {
        background-color: white;
        border-radius: 2%;
        width: 800px;
        margin: auto;
        min-height: 800px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #live_search{
            margin-right: 5px;
        }

        #live_search {
            background-color: #ef00ff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            box-shadow: 0px 0px 10px #97268E;
        }
        #live_search::placeholder{
            color: white;
        }

        #live_search:hover {
            background: linear-gradient(135deg, #ff00ff, #6c00ff);
            color: white;
            box-shadow: 0px 0px 15px #5B3DA8;
        }

        #live_search:active {
            color: white;
            background-color: #37268E;
            box-shadow: none;
        }
    </style>
</head>
<body>

    <div class="h-100 gradient-custom-2 ">
        <div class="main">
        <div class="container">
            <div class="input-group">
                <input type="search" id="live_search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            </div>      
        </div>

    <div id="searchresult">

    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            if(input !=""){
                $.ajax({
                    url:"LiveSearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                    }
                })
            }else{
                $("#searchresult").html("");
            }
        })
        
    })


    </script>

    </div>
    </div>
</body>
</html>