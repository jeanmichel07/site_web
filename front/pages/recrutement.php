<style>

    #demo{
        background-color:#f6f2f2;
        padding-top: 20px;
        padding-left: 30px;
        padding-bottom: 20px;
    }
    #el{
        border-left: #000029 solid 1px;
        border-right:  #000029 solid 1px;
        border-bottom:  #000029 solid 1px;
        padding-top: 20px;
        padding-bottom: 20px;
        height: 400px;

    }
    h2{
        background-color: white;
        font-family: "Times New Roman";
        font-weight: bold;
        text-align: center;
    }
    p{
        background-color: white;
        font-family: "Agency FB";
        font-weight: bold;
        text-align: center;
    }
    #el > img{
       margin-left: 35%;
    }
</style>
<div class="container">
    <h2> <img src="assets/img/recrutement.png" style="width: 100%"; height="162px"></h2>
    <p>NL Technologie recrute? sur les poste suivante si-dessous, vous pouvez envoyer vos dossier sur <a href="#">nltechnologie19@gmail.com</a></p>
</div>
<hr>
<div class="container" id="demo">

</div>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/bootstrap/jquery/jquery.min.js"></script>

<script>
    var xrh=new XMLHttpRequest();
    xrh.open('GET','http://127.0.0.1:8000/api/read/recrutement');
    xrh.onreadystatechange=function () {
        if (this.readyState === 4 && this.status === 200) {

           var arr=JSON.parse(xrh.response);

            for(var i=0;i<arr.length;i++) {
                document.getElementById("demo").innerHTML += '<div class="col-sm-4" id="el"><img class="icone" src="assets/img/icone recrutement.png" width="65px"><br><br> <b>Poste:</b>&#x20;' + arr[i].post + '<br><br><b>Profile:</b><br>' + arr[i].profile + '<br><br><b>Mission:</b><br>' + arr[i].mission+'<br><br><a href="#" class="btn btn-default">Postuler</a></div></div>'
            }
            }
    };
    xrh.send()

</script>
