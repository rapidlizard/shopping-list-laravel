@extends('master')

@section('title', 'Shopping List')

@section('items')

@foreach($items as $item)
<div class="item status{{ $item->item_name }}">
  <div class="itemNameCheckbox">

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : 'none';
    if ($action === 'init_edit_item' && isset($_POST['item_id'])) {
      if ($item->id === $_GET['id']) {
        $id = $_GET['id'];
        $name = $_GET['name'];
    ?>
        <form action="index.php?action=edit_item&id={{ $item->id }}" method="POST">
          <input class="editItemInput" type="text" name="item_new_name" value="{{ $item->item_name }}">
        </form>
      <?php
      } else {
      ?>
        <form action="index.php?action=change_item_status_
        <?php if ($item->status == 1) {
          echo 0;
        } else {
          echo 1;
        } ?>&id={{ $item->id }}" method="POST">
          <button type="submit" name="change_item_status" class="itemName">
            {{ $item->item_name }}
          </button>
        </form>
      <?php
      }
    } else {
      ?>
      <form action="index.php?action=change_item_status_
      <?php if ($item->status == 1) {
        echo 0;
      } else {
        echo 1;
      } ?>&id={{ $item->id }}" method="POST">
        <button type="submit" name="change_item_status" class="itemName">
          {{ $item->item_name }}
        </button>
      </form>
    <?php
    }
    ?>
  </div>
  <div class="itemInteraction">
    <form action="index.php?action=init_edit_item&id={{ $item->id }} ?>&name={{ $item->item_name }}" method="POST">
      <button type="submit" name="item_id" class="itemIcon"><img src="./src/images/icon_edit_item.png" class="icon" alt="edit icon"></button>
    </form>
    <form action="index.php?action=delete_item&id={{ $item->id }}&name={{ $item->item_name }}" method="POST">
      <button type="submit" name="item_id" class="itemIcon"><img src="./src/images/icon_delete_item.png" class="icon" alt="delete icon"></button>
    </form>
  </div>
</div>
@endforeach

@endsection()