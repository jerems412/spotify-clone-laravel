function likeEcoute(url){
        $.ajax({
        url:url,
        success:function(response){
            if(response.success){
                //alert("like")
            }else{
                //alert("Error")
            }
        },
        error:function(error){
            console.log(error)
        }
        });
}

function likeSpotifyPlaylist(url){
    $.ajax({
    url:url,
    success:function(response){
        if(response.success){
            //alert("like")
        }else{
            //alert("Error")
        }
    },
    error:function(error){
        console.log(error)
    }
    });
}

function likeAlbumSpotify(url){
    $.ajax({
    url:url,
    success:function(response){
        if(response.success){
            //alert("like")
        }else{
            //alert("Error")
        }
    },
    error:function(error){
        console.log(error)
    }
    });
}

function deletePlaylist(url){
    let proced = confirm("Voulez vous vraiment supprimer cette playlist ?");
    if(proced){
        $.ajax({
            url:url,
            success:function(response){
                if(response.success){
                    //alert("like")
                }else{
                    window.location.replace('http://127.0.0.1:8000/library/playlist');
                }
            },
            error:function(error){
                console.log(error)
            }
            });
    }
}

function deleteMusicXPlaylist(url,id){
    let proced = confirm("Voulez vous vraiment supprimer cette musique ?");
    if(proced){
        $.ajax({
            url:url,
            success:function(response){
                if(response.success){
                    document.getElementById('musicDelete'+id).style.display = "none";
                }else{
                    document.getElementById('musicDelete'+id).style.display = "none";
                }
            },
            error:function(error){
                console.log(error)
            }
            });
    }
}

function addMusicXPlaylist(url,id){
    let proced = confirm("Voulez vous ajouter cette musique ?");
    if(proced){
        $.ajax({
            url:url,
            success:function(response){
                if(response.success){
                    document.getElementById('musicAjout'+id).style.display = "none";
                }else{
                    document.getElementById('musicAjout'+id).style.display = "none";
                }
            },
            error:function(error){
                console.log(error)
                document.getElementById('musicAjout'+id).style.display = "none";
            }
            });
    }
}

function addAbo(url){
    $.ajax({
    url:url,
    success:function(response){
        if(response.success){

        }else{

        }
    },
    error:function(error){
        console.log(error)
    }
    });
}

function updateNamePlaylist(url,Element){
    $.ajax({
    url:url+"/"+Element.value,
    success:function(response){
        if(response.success){

        }else{
            
        }
    },
    error:function(error){
        console.log(error)
    }
    });
}

function updateDescPlaylist(url,Element){
    $.ajax({
    url:url+"/"+Element.value,
    success:function(response){
        if(response.success){

        }else{
            
        }
    },
    error:function(error){
        console.log(error)
    }
    });
}

//search
function SearchValeur(url,Element) {
    if(Element.value!= ""){
        $.ajax({
        url: url+Element.value,
        type: "get",
        data: {
            ValSearch: Element.value
        },
        dataType: "json",
        success: function(data) {
            if(Element.value =="") {
                let content = document.getElementsByClassName("Search");
                for (let i = 0; i < 3; i++) {
                    content[i].style.display = "block";
                    document.getElementById("divSearchResult").style.display = "none";
                }
            }else {
                let content = document.getElementsByClassName("Search");
                for (let i = 0; i < 3; i++) {
                    content[i].style.display = "none";
                }
                document.getElementById("divSearchResult").style.display = "block";
                if(data != "0"){
                    document.getElementById("listSearchResult").innerHTML="";
                    data.forEach(element => {
                        document.getElementById("listSearchResult").innerHTML +='<a href="http://127.0.0.1:8000/playmusic'+element['id']+'"><img src="http://127.0.0.1:8000/SpaceUser/img/bg'+Math.floor(Math.random() * (48 - 2) + 2)+'.jpg" alt=""><br><h4>'+(element["titre"].length>14?element["titre"].substr(0,12)+"...":element["titre"])+'</h4><p>'+element["nameArtist"]+'</p></a>';
                    });
                }
            }
        },
    });
    }else{
        let content = document.getElementsByClassName("Search");
                for (let i = 0; i < 3; i++) {
                    content[i].style.display = "block";
                    document.getElementById("divSearchResult").style.display = "none";
                }
    }
}

//serach artist
function SearchValeurArtist(url,Element) {
    if(Element.value != "")
    {
        $.ajax({
            url: url+Element.value,
            type: "get",
            dataType: "json",
            success: function(data) {
                if(Element.value =="") {
                    let content = document.getElementsByClassName("Search");
                    for (let i = 0; i < 3; i++) {
                        content[i].style.display = "block";
                        document.getElementById("divSearchResult1").style.display = "none";
                    }
                }else {
                    let content = document.getElementsByClassName("Search");
                    for (let i = 0; i < 3; i++) {
                        content[i].style.display = "none";
                    }
                    document.getElementById("divSearchResult1").style.display = "block";
                    console.table(data);
                    if(data != "0"){
                        document.getElementById("listSearchResult1").innerHTML="";
                        data.forEach(element => {
                            document.getElementById("listSearchResult1").innerHTML +='<a href="http://127.0.0.1:8000/home/spaceArtist'+element["id"]+'"><img src="http://127.0.0.1:8000/SpaceUser/img/bg'+Math.floor(Math.random() * (48 - 2) + 2)+'.jpg" alt="" style="border-radius: 100px;"><br><h4>'+(element["nameArtist"].length>14?element["nameArtist"].substr(0,12)+"...":element["nameArtist"])+'</h4></a>';
                        });
                    }
                }
            },
        });
    }else{
        let content = document.getElementsByClassName("Search");
                    for (let i = 0; i < 3; i++) {
                        content[i].style.display = "block";
                        document.getElementById("divSearchResult1").style.display = "none";
                    }
    }
    
}

//add search
function addSearchVal(url,Element) {
    if(Element.value != ""){
        $.ajax({
            url: url+Element.value,
            type: "get",
            success: function() {
            },
        });
    }
}

//next
function next(url) {
    if(Element.value != ""){
        $.ajax({
            url: url,
            type: "get",
            success: function() {
                window.location.reload(true);
            },
        });
    }
}

//prev
function prev(url) {
    if(Element.value != ""){
        $.ajax({
            url: url,
            type: "get",
            success: function() {
                window.location.reload(true);
            },
        });
    }
}