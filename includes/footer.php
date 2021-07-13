 <!-- FOOTER -->
 <footer class="container">
       <?php
          if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
            ?>
             <p class="float-right"><a href="#">Back to top</a></p>
         <?php   
          }else{
          ?>
            <!-- <p class="float-right"><a href="#">Back to top</a></p> -->
          <?php
          }
       ?>
        <p>&copy; 2021 Arecent Solutions, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">godwintombrown@gmail.com</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../dist/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../dist/js/vendor/holder.min.js"></script>
  </body>
</html>
