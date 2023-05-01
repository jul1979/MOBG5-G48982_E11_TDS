function hello(id) {
    fetch("http://127.0.0.1:8000/api/repos/" + id)
       .then((response) => response.json())
       .then(function (data){
           //console.log(data)
           const element = document.getElementById("detail");
    if (element != null) {
        element.remove();
    }

           let mydiv = $('<div id="detail">');


          let repoName = $('<h3 id="reponame">');
           repoName.text('Nom du dépôt')
           let p1 = $('<p id="rname">');
           p1.text( data['repo_name'][0].repo_name )
           //console.log(data['commits'][0].ladate)
           //console.log(data['commits'][0].message)
           //console.log(data['commits'])
           let userName = $('<h3 id="username">');
           userName.text('Nom utilisateur')
           let p2 = $('<p id="user">');
           p2.text(data['user_name'][0].c_name)

           let commitList = $('<h3 id="commitList">');
           commitList.text('Liste des commits')
           let ul = $('<ul id="commitList">');
           for (let i = 0; i <data['commits'].length ; i++) {
               let li = $('<li>');
               li.text("[ " + data['commits'][i].ladate + " ]" + data['commits'][i].message )
               ul.append(li)
           }
           $( '#main').append(mydiv.append(repoName.append(p1),userName.append(p2),commitList.append(ul)))
       });
}
