const apiURL3 = "../Api/Profile-api.php";

$(function(){

       email=localStorage.getItem("userEmail");
       $.ajax({
        type: "POST",
        url: apiURL3,
        data:JSON.stringify({"email": email}),
        contentType: "application/json",
        success: function(data){
           
            friends= data.Friends;
            posts= data.postsCount;
    
            $("#posts").text(posts);
            $("#friends").text(friends);
    
        },
        error: function(){
     
         alert("Error connecting to the server.");
    
        }
       })
});
 

