<style>

.topnav {
  overflow: visible;
  background-color:  #FFCC33;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
  z-index: 5;
}

.topnav a.bt {
  background-color:#1C2934;
  outline: none;
  border: 10px;
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.topnav a.home {
  background-color:#1C2934;
  outline: none;
  border: 10px;
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.topnav a:hover {
  background-color: #800080;
  color: black;
}

.home {
  display: block;
  width: 50px;
  height: 20px;
  background: #194f5a;
  padding: 5px;
  color: white;
  margin: 5px;
  font-size: 14px;
  text-align: center;
  margin-top: 10px;
}

.bt{
  display: block;
  width: 150px;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  color: white;
  margin: 5px;
  text-indent: inherit;
  font-size: 14px;
  margin-top: 10px;
}

img{
  width:65px;
  height: 65px;
  float: left;
  margin-left: 1px;
  margin-top: 1px;
}

h2 {
  color: #1C2934;
  margin-left: 75px;
  margin-top: 15px;
}

</style>



<div class="topnav">
  <a class="home" href="/">Home</a>
  <a class="bt" href={{route('profissional.login')}}>Login Profissional</a>
  <a class="bt" href="/paciente/login">Login Paciente</a>
  <a class="navbar-brand" href="/">
        <div class="logo-image">
              <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
  </a>
  <h2> SAUDOX </h2>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
