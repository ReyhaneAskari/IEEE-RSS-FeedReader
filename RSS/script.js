


        function slide(des,auth,date,vol,iss,start,link){
            content = document.createElement("div");

            div1 = document.createElement("div");
            div1.innerHTML = des;
            content.appendChild(div1);

            abs=document.createElement("div");
            vol=document.createElement("div");
            issue=document.createElement("div");
            sPage=document.createElement("div");
            ePage=document.createElement("div");
            link=document.createElement("div");

            newdiv1.appendChild(content);
            alert(auth);
        }
        function setEventHandlers(){
            $("#articleList").children("#innerDiv").children(".article").children(".ttl").click( function(){
           $(this).parent(this).children(".content").slideToggle(1500);
                    }
                )
        }

        function toggleAll(){
            $("#articleList").children("#innerDiv").children(".article").children(".content").slideToggle(1);
        }

    function removes(){
        var  urlAdd = document.getElementById("addressValue").value;
        var s=0;
        for (var r in names){
            if (names[r]!=urlAdd){
                s++;
            }
            else {
                break;
            }
        }
            if (s!=names.length){
                names.splice(s,1);
                localStorage["names"] = JSON.stringify(names);
                show();
            }
    }
