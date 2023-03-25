function myFunction() {

    //remove table if its already in the DOM
    const element = document.getElementById("mytable");
    if (element != null) {
        element.remove();
    }
    //créer l'élément dynamiquement
    let e = document.getElementById("exampleSelect1");
    let studentId = e.value;
    let text = e.options[e.selectedIndex].text;

    fetch('http://127.0.0.1:8000/api/students/'+studentId)
        .then((response) =>{
            return response.json()
        }).then((data) =>{
            //console.log(response);
        var table = document.createElement('table');
        table.setAttribute('id','mytable');
        table.setAttribute('class','table table-bordered');
        var tr = document.createElement('tr');
        var arrheader = ['Sigle', 'libelle', 'credits'];

        for (var j = 0; j < arrheader.length; j++) {
            var th = document.createElement('th'); //column
            var text = document.createTextNode(arrheader[j]); //cell
            th.appendChild(text);
            tr.appendChild(th);
        }
        table.appendChild(tr);
       // /test/{studentId}/{studentCourse}


        if (data['courses'].length>1) {
            for (var i = 0; i < data['courses'].length; i++) {
                var tr = document.createElement('tr');
                tr.setAttribute("id",data['courses'][i].id );
                var td1 = document.createElement('td');
                td1.innerHTML = '<a'+' ' +'href'+'='+'"' + '#' +  '"'+' >'+'</a>';//make td clickable

               //adding-onclick-to-elements-dynamically-passing-function-parameter
                /***********************************************************************/
                    (function(i) {
                        td1.onclick = function() {

                            //alert('Element #' +studentId+data['courses'][i].id);
                            fetch('api/test/' + studentId + '/' + data['courses'][i].id, {
                                method: 'DELETE',
                            }).then(
                        $('#' + data['courses'][i].id).remove()
                            )
                        }
                    })(i,studentId,data['courses'][i].id);

                /*********************************************************/

                var td2 = document.createElement('td');
                var td3 = document.createElement('td');

                var text1 = document.createTextNode(data['courses'][i].id);
                var text2 = document.createTextNode(data['courses'][i].title);
                var text3 = document.createTextNode(data['courses'][i].credits);

                td1.firstChild.appendChild(text1);//gives the embedded anchor tag
                //td1.appendChild(text1);
                td2.appendChild(text2);
                td3.appendChild(text3);

                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);

                table.appendChild(tr);
            }
        }
        document.getElementById('test').appendChild(table)
        });

}




