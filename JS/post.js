const apiURL = "../Api/Likes-api.php" ;
getLikes();

$(function()
{

  $(".comment").click(function()
  {
        $(this).parent().next().css({display:"block"});//shows the comment box
        
  })

  $(".cancel").click(function()
  {
     $(this).parent().parent().css({display:"none"});
  })


  $("a").click(function()
  {

    let newLikes=parseInt($(this).find("p").text());
    newLikes++;
    let postId = parseInt($(this).attr("id"));
    updateLikes(postId, newLikes, "Yes");
     
  })


});

function HelperUpdateLikes(username, postId, YesNo, newLikes)
{
   $.ajax({
      type: "POST",
      url: apiURL,
      data: JSON.stringify({"username":username, "postId": postId, "YesNo": YesNo}),
      contentType: "application/json",
      success: function(data)
      {

         if(data.error)
         {
            console.log(data.error);
            if(data.YesNo=="Yes")
            {
               RemoveLikes(postId, username, newLikes-2);
            }
         
         }else
         {
            $(`#${postId}`).find("p").text(newLikes);
         }
       
      },
      error: function()
      {
         alert("Error connecting to the server."); //if error, alert

      }
   })
}

function RemoveLikes(postId, username, newLikes)
{

   $.ajax({
      type: "REMOVE",
      url: apiURL,
      data: JSON.stringify({"postId": postId, "username":username, "newLikes": newLikes}),
      contentType: "application/json",
      success: function(data)
      {       
         $(`#${postId}`).find("p").text(data.newLikes);

      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })

}
function getLikes()
{

   $.ajax({
      type: "GET",
      url: apiURL,
      contentType: "application/json",
      success: function(data)
      {
            for(let i=0; i<data.length; i++)
            {
               $(`#${data[i].postid}`).find("p").text(data[i].likes);
            }
      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })
}

function updateLikes(postId, newLikes, YesNo)
{
   $.ajax({
      type: "PUT",
      url: apiURL,
      data: JSON.stringify({"postId": postId, "newLikes": newLikes}),
      contentType: "application/json",
      success: function(data)
      {

       let username= localStorage.getItem("username");
       HelperUpdateLikes(username, postId, YesNo, data.newLikes);  
    
      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })
}