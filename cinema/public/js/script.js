
 function myFunction(id){
    //console.log("Hello:"+ id);
    fetch("http://127.0.0.1:8000/api/movie/" + id)
       .then((response) => response.json())
       .then(function (data) {
               const element = document.getElementById("detail");
               if (element != null) {
                   element.remove();
               }
               let col4 = $('<div id="detail">');
               col4.addClass( "col-4" );
               let card = $('<div>');
               card.addClass( "card text-white bg-primary mb-3" );
               card.css( "max-width: 18rem;" );
               let cardheader = $('<div>');
               cardheader.addClass( "card-header" );
               cardheader.text(data[0]['title'])
               let cardbody = $('<div>');
               cardbody.addClass( "card-body" );
               let h5 = $('<h5 >');
               h5.addClass( "card-title" );
               h5.text(data[0]['rating'])
               let p = $('<p>');
               p.addClass( "card-text" );
               p.text(data[0]['synopsis'])
               $( "#row" ).append(col4.append(
                   card.append(cardheader.append(
                       cardbody.append(
                           h5,p
                       )
                       )

                   )
                   )
               )
       }




        /*   < div className = "col-4" >
         < div className = "card text-white bg-primary mb-3" style = "max-width: 18rem;" >
         < div className = "card-header" > Header < /div>
     <div className="card-body">
         <h5 className="card-title">Primary card title</h5>
         <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's
             content.</p>
     </div>
 </div>

 </div>
*/

       );


}
