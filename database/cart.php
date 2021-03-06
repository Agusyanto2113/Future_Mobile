<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    

    Public function insertIntoCartNew($userid, $itemid, $qtyorder, $price, $productname,$image, $table='cart'){
      if($itemid != null){
        $result = $this->db->con->query("INSERT INTO {$table} (user_id,item_id,qtyorder,price,product_name,item_image)  VALUES ('$userid','$itemid','$qtyorder','$price','$productname','$image')");
        if($result){
          header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
      }
    }

    Public function updateQty($qty, $itemid, $userid,$itemprice,$table='cart'){
      $totprice = $qty * $itemprice;
      if($qty != null){
        $result = $this->db->con->query("UPDATE {$table} SET qtyorder={$qty},totprice={$totprice} WHERE item_id ={$itemid} AND user_id={$userid}");
        if($result){
          header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
      }

    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid, $qtyorder, $price,){
        if (isset($userid) && isset($itemid) && isset($qtyorder) && isset($price)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "qtyorder" => $qtyorder,
                "price" => $price,

            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE user_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }



    public function deleteCartItem($item_id = null, $table = 'cart'){
      if($item_id != null){
          $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
          if($result){
              header("Location:" . $_SERVER['PHP_SELF']);
          }
          return $result;
      }
    }

    public function deleteWishItem($item_id = null, $table = 'wishlist'){
      if($item_id != null){
          $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
          if($result){
              header("Location:" . $_SERVER['PHP_SELF']);
          }
          return $result;
      }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function saveForOrder($item_id, $saveTable = "orderinfo", $fromTable = "cart"){
      if ($item_id != ""){
          $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
          $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

          // execute multiple query
          $result = $this->db->con->multi_query($query);

          if($result){
              header("Location :" . $_SERVER['PHP_SELF']);
          }
          return $result;
      }
  }

    public function getData($table = 'cart'){
      $result = $this->db->con->query("SELECT * FROM {$table}");

      $resultArray = array();

      // fetch product data one by one
      while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultArray[] = $item;
      }

      return $resultArray;
  }

  // get product using item id
  public function getProduct($item_id = null, $table= 'cart'){
      if (isset($item_id)){
          $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

          $resultArray = array();

          // fetch product data one by one
          while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              $resultArray[] = $item;
          }

          return $resultArray;
      }
  }


  public function getDataOrder($table = 'orderinfo'){
    $result = $this->db->con->query("SELECT * FROM {$table}");

    $resultArray = array();

    // fetch product data one by one
    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $item;
    }

    return $resultArray;
    }

    // get product using item id
    public function getProductOrder($item_id = null, $table= 'orderinfo'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

}