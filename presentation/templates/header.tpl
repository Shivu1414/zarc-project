<div class="container-fluid p-0">

  <nav class="navbar navbar-expand-lg main-navbar px-4">

    <div class="d-flex align-items-center">
      <a class="navbar-brand nav-name" href="#">ZARC</a>
    </div>

    <button class="logout-btn">Logout</button>

  </nav>

</div>

{literal}
  <script>
    $(document).ready(function() {
      $(".logout-btn").on("click", function() {
        $.ajax({
          url: 'index.php',
          method: 'GET',
          data: {
            logout: true,
          },
          success: function() {
            window.location.replace("index.php?login=true");
          },
          error: function() {
            console.error("Logout failed");
          }
        });
      });
    });
  </script>

{/literal}