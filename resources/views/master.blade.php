<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping List</title>
</head>

<body>

  <?php

  if (isset($_SESSION["message"])) {
  ?>
    <div class="alert alert-<?= $_SESSION["message_type"]; ?>">
      <p class="message"><?php echo $_SESSION["message"] ?></p>
    </div>
  <?php
    session_unset();
  }
  ?>

  <header>
    <h1>Shopping List</h1>
  </header>


  <div class="main_footer">
    <main>
      <div class="itemNameForm">
        <form action="/add_item" method="post">
          {{ csrf_field() }}
          <input class="newItemInput" type="text" name="item_name" placeholder="Enter item name...">
        </form>
      </div>
      <div class="itemList">
        @yield('items')
      </div>
    </main>

    <footer>
      <form action="index.php?action=delete_all" class="footerForm" method="POST">
        <button type="submit" name="delete_all_items" class="cta">Delete all items</button>
      </form>
    </footer>
  </div>
</body>

</html>