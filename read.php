<?php
$dsn      = 'mysql:dbname=php_db_app;host=localhost;charset=utf8mb4';
$user     = 'root';
$password = 'root';

try {
  $pdo = new PDO($dsn, $user, $password);

  // productsテーブルからすべてのカラムのデータを取得するためのSQL文を変数$sqlに代入する
  $sql_select = 'SELECT * FROM products';

  // SQL文を実行する
  $stmt_select = $pdo->query($sql_select);

  // SQL文の実行結果を配列で取得する
  $products = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  exit($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品一覧</title>
  <link rel="stylesheet" href="css/style.css">

  <!-- Google Fontsの読み込み -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav>
      <a href="index.php">商品管理アプリ</a>
    </nav>
  </header>
  <main>
    <article class="products">
      <h1>商品一覧</h1>
      <div class="products-ui">
        <div>
          <!-- ここに並び替えボタンと検索ボックスを作成する -->
        </div>
        <a href="#" class="btn">商品登録</a>
      </div>
      <table class="products-table">
        <tr>
          <th>商品コード</th>
          <th>商品名</th>
          <th>単価</th>
          <th>在庫数</th>
          <th>仕入先コード</th>
        </tr>
        <?php
        // 配列の中身を順番に取り出し、表形式で出力する
        foreach ($products as $product) {
          $table_row = "
            <tr>
            <td>{$product['product_code']}</td>
            <td>{$product['product_name']}</td>
            <td>{$product['price']}</td>
            <td>{$product['stock_quantity']}</td>
            <td>{$product['vendor_code']}</td>
            </tr>
          ";
          echo $table_row;
        }
        ?>
      </table>
    </article>
  </main>
  <footer>
    <p class="copyright">&copy; 商品管理アプリ All rights reserved.</p>
  </footer>
</body>
</html>