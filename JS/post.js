const apiURL = "../Api/Likes-api.php" ;

$(function()
{

   getLikes();

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
               alert(data.message);
            }
            else
            {
               console.log(data);
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
         console.log(data);
         
      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })
}