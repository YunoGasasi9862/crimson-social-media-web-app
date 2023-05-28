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
   
      $.ajax({
         type: "PUT",
         url: apiURL,
         data: JSON.stringify({"postId": postId, "newLikes": newLikes}),
         contentType: "application/json",
         success: function(data)
         {
            if(data.error)
            {
               //error
            }
            else
            {
               $(`#${postId}`).find("p").text(data.newLikes);

            }
         },
         error: function()
         {
            alert("Error connecting to the server.");
         }

      })
  })


});

function getLikes()
{

   $.ajax({
      type: "GET",
      url: apiURL,
      contentType: "application/json",
      success: function(data)
      {
        
            console.log("Entering");
            for(let i=0; i<data.length; i++)
            {
               $(`#${data[i].postId}`).find("p").text(data[i].likes);
            }
       
         
      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })
}