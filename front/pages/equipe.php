<style>
    #demo
    {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #DCDCDC;
    }
    #demo img{
        border: #fff solid 6px;
        border-radius: 5px;
    }
    .titre{
        text-align: center;
    }
    p{
        background-color: white;
        font-family: "Agency FB";
        font-weight: bold;
        text-align: center;
    }
</style>
<div class="container">
    <h2 class="titre">Equipes</h2>
    <p>Voicie nos équipes:</p>
</div>
<hr>
<div class="container" id="demo">

</div>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/bootstrap/jquery/jquery.min.js"></script>

<script>
    var xrh=new XMLHttpRequest();
    xrh.open('GET','http://127.0.0.1:8000/api/read/equipe');
    xrh.onreadystatechange=function () {
        if (this.readyState === 4 && this.status === 200) {

            var arr=JSON.parse(xrh.response);

            for(var i=0;i<arr.length;i++) {
                document.getElementById("demo").innerHTML += '<div class="col-lg-3 col-md-4 col-6"><img src="http://127.0.0.1:8000/uploads/'+arr[i].image +'" width="175px" height="200px"></br><b>Nom:</b>' + arr[i].nom + '</br><b>Poste:</b>' + arr[i].poste+'</div>'
            }
        }
    };
    xrh.send()

</script>
