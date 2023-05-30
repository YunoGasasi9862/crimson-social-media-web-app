const apiURL = "../Api/Likes-api.php" ;
const apiURL2 = "../Api/Comments-api.php";

getLikes();
getComments();

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


  $("div.likeclass a:first-child").click(function()
  {

    let newLikes=parseInt($(this).find("p").text());
    newLikes++;
    let postId = parseInt($(this).attr("id"));
    updateLikes(postId, newLikes, "Yes");
     
  })


  $(".postBTN").click(function()
  {
     let postid= $(this).attr("id");
     let parent=findparent(this);
     $(parent).attr("id", postid);
     let comment= $(this).parent().prev().find("textarea").val();
     let username= localStorage.getItem("username");
     let profilename= localStorage.getItem("profile");  
     addCommentPostAjax(username, postid, comment, parent, profilename); //sends to the database

  });

});

function addCommentPostAjax(username, postid, comment, parent, profilename)
{
   $.ajax({
      type: "POST",
      url: apiURL2,
      data: JSON.stringify({"username":username, "postid": postid, "comment": comment}),
      contentType: "application/json",
      success: function(data)
      {
         
         $(parent).find('div.PostComment').append(`
     
        
         <div class="card-body p-4">
         <div class="d-flex flex-start">
         <img style="width:50px; height:50px;" class="rounded-circle shadow-1-strong me-3"
                    src="../PPimages/${profilename}" alt="avatar" width="60"
                    height="60" />
           <div>
             <h6 class="fw-bold mb-1">${data.username}</h6>
             <div class="d-flex align-items-center mb-3">
               <p class="mb-0">
                 March 24, 2021
               </p>
             </div>
             <p class="mb-0">
               ${data.comment}
             </p>
           </div>
         </div>
       </div>
       
         `);
          
      },
      error: function()
      {

         alert("Error connecting to the server."); //if error, alert

      }
   })
}

function getComments()
{
   $.ajax({
      type: "GET",
      url: apiURL2,
      contentType: "application/json",
      success: function(data)
      {
         console.log(data);
         for(let i=0; i<data.length; i++)
         {
            let postid= data[i].postid;
            let profilename= localStorage.getItem("profile"); 

              $(`#${postid}`).parent().parent().parent().find(`div.PostComment`).append(`
               <div class="card-body p-4">
               <div class="d-flex flex-start">
               <img style="width:50px; height:50px;" class="rounded-circle shadow-1-strong me-3"
                        src="../PPimages/${profilename}" alt="avatar" width="60"
                        height="60" />
               <div>
                  <h6 class="fw-bold mb-1">${data[i].username}</h6>
                  <div class="d-flex align-items-center mb-3">
                     <p class="mb-0">
                     March 24, 2021
                     </p>
                  </div>
                  <p class="mb-0">
                     ${data[i].comment}
                  </p>
               </div>
               </div>
            </div>
            
               `);
               
         }

      },
      error: function()
      {
         alert("Error connecting to the server."); //if error, alert
      }

   })
}

function findparent(object)  //helper function to find the parent
{
   while($(object).attr("class")!="card")  //checks against the class name
   {
      object= $(object).parent(); //sets the current object to its parent
   }

   return object;
}

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
       console.log(data);
       let username= localStorage.getItem("username");
       HelperUpdateLikes(username, postId, YesNo, data.newLikes);  
    
      },
      error: function()
      {
         alert("Error connecting to the server.");
      }

   })
}