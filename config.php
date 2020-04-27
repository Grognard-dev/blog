

<footer class="footer h-32">
  
  <div class="trifooter">
    <div class="trifooterpartduo bg-blue-500 w-2/6 h-32" >
      <div class="trifooterpart">
        <p>Lorem Ipsum</p>
        <div><a href="#">Lorem Ipsum</a></div>
        <div><a href="#">Lorem Ipsum</a></div>
        <div><a href="#">Lorem Ipsum</a></div>
        
      </div>
      <div class="trifooterpart">
        <p>Lorem Ipsum</p>
        <div><a href="#">Lorem Ipsum</a></div>
        <div><a href="#">Lorem Ipsum</a></div>
        <div><a href="#">Lorem Ipsum</a></div>
      </div>
    </div>
    <div class="zelogo bg-white w-2/6 h-32"><img class="h-32" style="border-style: none" src="img/coq.png" alt=""></div>
    <div class=" bg-red-700 w-2/6 h-32 trifooterpartsoloa">
      <div class="trifooterpartsolo">
        <div>
          <div class="footawesome">
            <div><a href="#"><i class="fab fa-twitter-square"></i></a></div>
            <div><a href="#"><i class="fab fa-facebook-square"></i></a></div>
          </div>
          <p>2020 Simplon</p>
        </div>
      </div>
    </div>
  </div>
</footer>


<div id="back-to-top">
  <button onclick="topFunction()" id="totop" title="back-to-top"><i class="fas fa-chevron-up"></i></button> 
</div><!-- /#back-to-top -->
<script>  
  mybutton = document.getElementById("totop");
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  function topFunction() {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0; //Chrome, Firefox, IE and Opera
  }
</script>