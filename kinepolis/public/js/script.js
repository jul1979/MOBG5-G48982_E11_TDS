function myFunction(id) {
    fetch("http://127.0.0.1:8000/api/shows/" + id)
        .then((response) => response.json())
        .then(function (data) {
         const element = document.getElementById("detail");
    if (element != null) {
        element.remove();
    }

    let mydiv = $('<div id="detail">');
    mydiv.addClass("col");
    let table = $('<table>')
    table.addClass("table table-bordered");
    let thead = $('<thead>');
    let trow = $('<tr>')
    let th1 = $('<th scope="col">')
    th1.text('JOUR')
    let th2 = $('<th scope="col">')
    th2.text('HEURE')
    let th3 = $('<th scope="col">')
    th3.text('SALLE#')
    let th4 = $('<th scope="col">')
    th4.text('NOM')

            let tbdy = $('<tbody>')
            for (let i = 0; i <data.length ; i++) {
            let tbrow = $('<tr>')
            let td1= $('<td>')
             td1.text(data[i]['jour'])
            let td2= $('<td>')
                td2.text(data[i]['heure'])
            let td3= $('<td>')
                td3.text(data[i]['idRoom'])
            let td4= $('<td>')
                td4.text(data[i]['title'])
                tbdy.append(tbrow.append(td1,td2,td3,td4))
            }
            //utiliser toujours un élément  présent dans le DOM!!!
   $( '#main').append(mydiv.append(table.append(thead.append(trow.append(th1, th2, th3, th4)),tbdy)))

        });
}
