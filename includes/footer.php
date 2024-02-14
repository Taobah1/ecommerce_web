<div style="height: 300px;"></div>

<footer class="bg-secondary text-white mt-5">
    <div class="container">
      <div class="row pt-5">
        <div class="col-12 col-md-3 border-end">
          <p>Saepe eveniet ut et voluptates</p>
          <span>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</span>
        </div>
        <div class="col-12 col-md-2 ps-4 border-end">
          <p>Useful Links</p>
          <div class="d-flex flex-column" style="gap: 15px;">
          <span><a class="nav-link" href="index.php">Home</a></span>
          <span><a class="nav-link" href="categories.php">Explore our Categories</a></span>
          <span>POST A RESUME</span>
          <span>PRICING</span>
          <span>FEATURES</span>
          </div>
        </div>
        <div class="col-12 col-md-4 ps-4 border-end">
          <p>Recent Tweets</p>
          <p>Just released Lotus Flower, a Flexible Multi-Purpose Shop <br>Theme <span>http://t.co/0dyw2cdli5</span></p>
          <span>Themeforest WordPress 04:29 AM Oct 31</span>
          <p>Just released Lotus Flower, a Flexible Multi-Purpose Shop <br>Theme <span>http://t.co/0dyw2cdli5</span></p>
          <span>Themeforest WordPress 04:29 AM Oct 31</span>
        </div>
        <div class="col-12 col-md-3 ps-4">
          <p>Singn For news Letter</p>
          <span>At vero eos et accusamus et iusto odio dignissimos ducimus</span><br>
          <?php
          if(!isset($_SESSION['auth'])){
            echo "<a href='register.php' class='bg-warning btn text-white mt-2'>Sign Up</a>";
          }
          
          ?>
          <ul class="mt-5 ps-0 d-flex justify-content-start gap-3" style="list-style: none">
            <li><a class="nav-link" href=""><i class="fa-brands fa-twitter"></i></a></li>
            <li><a class="nav-link" href=""><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a class="nav-link" href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a class="nav-link" href=""><i class="fa-solid fa-rss"></i></a></li>
            <li><a class="nav-link" href=""><i class="fa-brands fa-google-plus-g"></i></a></li>
          </ul>
        </div>
      </div>
      <p class="py-4">2014 &copy Taobah Store. All Right Reserved</p>
    </div>
  </footer>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/script.js"></script>
<!-- <script src="assets/js/script2.js"></script> -->
<!-- alrtify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  alertify.set('notifier','position', 'top-right');
  <?php
  if(isset($_SESSION['message'])){ ?>
    alertify.success('<?= $_SESSION['message']; ?>');
    <?php
    unset($_SESSION['message']);
  }
  ?>
</script>



</body>
</html>


