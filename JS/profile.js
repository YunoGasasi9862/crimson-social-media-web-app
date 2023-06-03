const apiURL3 = "../Api/Profile-api.php";

GetProfile();

function GetProfile()
{
   email=localStorage.getItem("userEmail");
   $.ajax({
     type: "GET",
     url: apiURL3,
     data:JSON.stringify({"email": email}),
    contentType: "application/json",
    success: function(data){
       
        friends= data.friends;
        posts= data.posts;

        $("#posts").text(posts);
        $("#friends").text(friends);

    },
    error: function(){
 
     alert("Error connecting to the server.");

    }
   })
}