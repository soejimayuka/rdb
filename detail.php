<?php
  // ファイルの読み込み
  require_once('inc/config.php'); //設定ファイル
  require_once('inc/functions.php'); //独自関数ファイル

  // GETパラメータのチェック
  if ( !isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    // $_GET['id'] が 存在していない、または空、または数値ではないときの場合
    header('Location: index.php');
    exit();
  }
  try {
    // データベースへ接続
    $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);

    // エラー発生時に「PDOException」という例外を投げる設定に変更
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL文の作成
    $sql = 'SELECT p.*, c.category_name
     FROM posts AS p JOIN categories AS c
     ON p.category_id = c.id WHERE p.id = ?';

    // ステートメント用意（?に値を入れる準備、テンプレートの作成）
    $stmt = $dbh->prepare($sql);

    // プレースホルダーに値をガッチャンコ
    $stmt->bindValue(1, (int)$_GET['id'] , PDO::PARAM_INT);

    // ステートメントを実行
    $stmt->execute();

    // 実行結果を連想配列として取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($result);
    // echo '<pre>';

    // データベースとの接続を終了
    $dbh = null;

  } catch (PDOException $e) {
    //　例外発生時の処理
    echo 'エラー' . h($e->getMessage());
    exit();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo h($result['title']); ?> | 近くて 遠い国、台湾</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

  <link rel="icon" type="img/png" href="../img/favicon.png" />
  <link rel="stylesheet" href="css/common.css" />

  <script>
  (function(d) {
    var config = {
        kitId: "srv2rrs",
        scriptTimeout: 3000,
        async: true,
      },
      h = d.documentElement,
      t = setTimeout(function() {
        h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
      }, config.scriptTimeout),
      tk = d.createElement("script"),
      f = false,
      s = d.getElementsByTagName("script")[0],
      a;
    h.className += " wf-loading";
    tk.src = "https://use.typekit.net/" + config.kitId + ".js";
    tk.async = true;
    tk.onload = tk.onreadystatechange = function() {
      a = this.readyState;
      if (f || (a && a != "complete" && a != "loaded")) return;
      f = true;
      clearTimeout(t);
      try {
        Typekit.load(config);
      } catch (e) {}
    };
    s.parentNode.insertBefore(tk, s);
  })(document);
  </script>
  <script src="js/app.js" defer></script>

</head>
<header>
  <nav class="p-header__nav">
    <h2 class="screen-reader-text">サイト内メニュー</h2>
    <button type="button" class="js-drawer" aria-controls="globalNav" aria-expanded="false">
      <span class="p-hamburger__line">
        <span class="screen-reader-text">メニューを開閉</span>
      </span>
    </button>
    <ul id="globalNav" class="drawer u-upper">
      <li><a href="index.php">トップページ</a></li>
      <li><a href="index.php#taiwan">台湾とは</a></li>
      <li><a href="index.php#area">エリア紹介</a></li>
      <li><a href="index.php#access">アクセス</a></li>
      <li><a href="information/index.html">基本情報</a></li>
    </ul>
  </nav>
</header>
<body>
  <section id="taipei" class="l-section -third">
    <div class="d-container">
      <h2 class="c-heading -ten"><?php echo h($result['title']); ?></h2>
      <?php if(!empty($result['post_image']) ) : ?>
      <figure class="p-infoDetail__img">
        <img src="upload/<?php echo h($result['post_image']); ?>" alt="<?php echo h($result['title']); ?>">
      </figure>
      <?php endif; ?>
      <ul class="p-infoDetail__body">
        <div class="d-grid" data-gutter="min:small" data-align="min:justify min:middle">
          <div class="d-grid__item" data-cols="min:6">
            <li><time datetime="<?php echo h($result['created']); ?>"><?php echo h(date('Y年m月d日', strtotime($result['created']))); ?></time></li>
          </div>
          <div class="d-grid__item" data-cols="min:6">
            <li class="p-infoDetail__category"><?php echo h($result['category_name']); ?></li>
          </div>
        </div>
      </ul>
      <p class="p-infoDetail__txt"><?php echo  nl2br(h($result['content']), false); ?></p>

      <div class="p-btn -food">
        <a href="./" class=" p-btn__button">お知らせ一覧に戻る</a>
      </div>
    </div>
  </section>
</body>
</html>