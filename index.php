<?php
  // ファイルの読み込み
  require_once('inc/config.php'); //設定ファイル
  require_once('inc/functions.php'); //独自関数ファイル

  try {
    // データベースへ接続
    $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);

    // エラー発生時に「PDOException」という例外を投げる設定に変更
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL文の作成
    $sql = 'SELECT * FROM posts ORDER BY created DESC';

    // SQLを実行
    $stmt = $dbh->query($sql);

    // 実行結果を連想配列として取得
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>近くて 遠い国、台湾</title>

  <meta name="description" content="台湾の人気観光スポットを台北や台南、台中、高雄などエリア別にご紹介します。" />
  <meta property="og:title" content="近くて 遠い国、台湾" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="#" />
  <meta property="og:site_name" content="近くて 遠い国、台湾" />
  <meta property="og:description" content="台湾の人気観光スポットを台北や台南、台中、高雄などエリア別にご紹介します。。" />
  <meta name="format-detection" content="telephone=no" />
  <!-- Favicon –––––– -->
  <link rel="icon" type="img/png" href="img/favicon.png" />
  <link rel="canonical" href="#" />
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

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
  <script src="js/app.js" defer=""></script>
  <script src="js/swiper.js" defer=""></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <!-- あらかじめcssを読み込んでいるので設定しなくてOK-->
</head>

<body>
  <!-- ここから記述しよう -->
  <div class="p-hero">
    <div class="p-hero__eyecatch">
      <h1 class="p-hero__title"><a href="index.html">近くて 遠い国、台湾</a></h1>
    </div>
  </div>
  <header>
    <nav class="p-header__nav">
      <h2 class="screen-reader-text">サイト内メニュー</h2>
      <button type="button" class="js-drawer" aria-controls="globalNav" aria-expanded="false">
        <span class="p-hamburger__line">
          <span class="screen-reader-text">メニューを開閉</span>
        </span>
      </button>
      <ul id="globalNav" class="drawer u-upper">
        <li><a href="#taiwan">台湾とは</a></li>
        <li><a href="#area">エリア紹介</a></li>
        <li><a href="#taipei">観光スポット</a></li>
        <li><a href="#act">アクティビティ</a></li>
        <li><a href="#info">お知らせ</a></li>
        <li><a href="food/index.html">台湾グルメ</a></li>
        <li><a href="#access">アクセス</a></li>
        <li><a href="information/index.html">基本情報</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="taiwan" class="l-section">
      <div class="d-container">
        <div class="p-about">
          <div class="d-grid" data-gutter="min:small" data-align="min:justify min:start">
            <div class="d-grid__item" data-cols="min:12 lg:6">
              <h2 class="c-heading -primary"><span class="-one">台湾</span>とは？</h2>
              <p class="c-txt -primary d-spacer" data-y="min:minBottom">
                  台湾本島は東シナ海の南方に浮かぶ、日本の九州ほどの大きさの島。日本から4時間ほどと気軽に行ける海外旅行先として人気。
                </p>
              <p class="c-txt -primary d-spacer" data-y="min:minBottom">
                  昭和的な風情の下町、そこにはもちろん中華的な雰囲気も相まって、台湾特有の街の路地の魅力を生み出しています。
                </p>
              <p class="c-txt -primary d-spacer" data-y="min:xsmallBottom lg:smallBottom">
                  歴史と伝統を守りながら新しい文化を創造する台湾のパワーを感じることができる台湾をご紹介します。
                </p>
              <div class="p-btn">
                <a href="#access" class="p-btn__button">アクセス情報</a>
              </div>
            </div>
            <div class="d-grid__item" data-cols="min:12 lg:6">
              <img src="img/about.jpg" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="area" class="l-section">
      <h2 class="c-heading -secondary">エリア紹介<span class="-caption">Area Information</span></h2>
      <div class="p-area">
        <div class="p-area__item">
          <a href="index.html#taipei"> <img src="img/area01.png" alt="写真" decoding="async" /> </a>
          <p class="p-area__title"><a href="index.html#taipei">台北市 </a></p>
        </div>
        <div class="p-area__item">
          <img src="img/area02.png" alt="写真" decoding="async" />
          <p class="p-area__title">台中市</p>
        </div>
        <div class="p-area__item">
          <img src="img/area03.png" alt="写真" decoding="async" />
          <p class="p-area__title">台南市</p>
        </div>
        <div class="p-area__item">
          <img src="img/area04.png" alt="写真" decoding="async" />
          <p class="p-area__title">高雄市</p>
        </div>
        <div class="p-area__item">
          <img src="img/area05.png" alt="写真" decoding="async" />
          <p class="p-area__title">花蓮市</p>
        </div>
      </div>
    </section>

    <section id="taipei" class="l-section">
      <div class="d-container">
        <div class="p-local">
          <div class="p-local__body">
            <h2 class="c-heading -third">台北市<span class="-caption">Tâi-pak-tshī</span></h2>
            <p class="c-txt -primary">
                絶えず変わり続ける都市、台北。<br />台湾といえば台北のイメージが強いのではないでしょうか。九份や十分、国立故宮博物院、士林夜市、龍山寺、台北101といった名所が豊富に存在しています。<br />変化に富んだこの土地で、初めて訪れたあなたにもリピーターのあなたにも、新たな発見あるはずです。<br />台北観光は2泊3日のスケジュールでも満喫できるので弾丸旅行にもおすすめです。<br />
              </p>
          </div>
          <div class="p-local__img">
            <div class="p-local__imginnner">
              <img src="img/area01.png" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="spot" class="l-section">
      <div class="l-spot__wrapper">
        <div class="l-spot__center">
          <h2 class="vertical_text">台湾・台北市近郊の<br class="br-sp" />おすすめ観光スポット</h2>
        </div>
        <!-- spot01 -->
        <div class="l-spot">
          <div class="l-spot__left">
            <div class="l-spot__img">
              <img src="img/taipei_spot01.jpg" alt="写真" decoding="async" />
            </div>
            <div class="p-spot__wrap -left">
              <p class="p-spot__subtitle">基本情報</p>
              <p class="p-spot__description">
                  住所： No. 221, Sec 2, Zhi Shan Rd, Shilin District, Taipei City, 台湾 111<br />電話：+886-2-6610-3600<br />営業時間：9:00～17:00<br />休業日：月曜（祝日の場合は開館）<br />アクセス：
                  MRT士林駅からバスで約15分<br />料金：350台湾ドル／約1,552円（18歳以上）
                </p>
            </div>
          </div>

          <div class="l-spot__right">
            <div class="p-spot__wrap -right">
              <h3 class="p-spot__title">国立故宮博物院</h3>
              <p class="p-spot__description">
                  歴史に翻弄されたお宝の数々が並ぶ世界一の中国美術工芸コレクションとして名高いここ故宮博物院は、フランスのルーブル、アメリカのメトロポリタン､ロシアのエルミタージュと並んで世界四大博物館の1つにも数えられています｡中国美術工芸品を中心に70万点ほどのコレクションがあり、そのうちの6,000～8,000点ほどが常時展示されていて、その数なんと世界最大級！1日あっても回れないほどの見どころが詰まった博物館です。
                </p>
            </div>
            <div class="l-spot__img">
              <img src="img/taipei_spot011.jpg" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
        <!-- spot02 -->
        <div class="l-spot">
          <div class="l-spot__left">
            <div class="l-spot__img">
              <img src="img/taipei_spot02.jpg" alt="写真" decoding="async" />
            </div>
            <div class="p-spot__wrap -left">
              <p class="p-spot__subtitle">基本情報</p>
              <p class="p-spot__description">
                  住所： No. 211, Guangzhou St, Wanhua District, Taipei City, 台湾 10853<br />電話：+886-2-2881-5162<br />営業時間：9:00～17:00<br />アクセス：
                  MRT龍山寺駅出口から徒歩すぐ<br />
                  料金：無料
                </p>
            </div>
          </div>

          <div class="l-spot__right">
            <div class="p-spot__wrap -right">
              <h3 class="p-spot__title">龍山寺</h3>
              <p class="p-spot__description">
                  龍山寺は、台北市街にある台北最古のお寺。国家古跡のひとつにも数えられていて、観光客だけでなく地元の人も熱心に信仰する由緒あるお寺です。正月や受験シーズンなどには、とくに多くの人がお参りにくる、まさに台湾のパワースポット！
                </p>
            </div>
            <div class="l-spot__img">
              <img src="img/taipei_spot022.jpg" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
        <!-- spot03 -->
        <div class="l-spot">
          <div class="l-spot__left">
            <div class="l-spot__img">
              <img src="img/taipei_spot03.jpg" alt="写真" decoding="async" />
            </div>
            <div class="p-spot__wrap -left">
              <p class="p-spot__subtitle">基本情報</p>
              <p class="p-spot__description">
                  住所：No. 101, Jihe Rd, Shilin District, Taipei City, 台湾 111<br />電話：+886-2-2881-5557<br />営業時間：店舗により異なる<br />休業日：店舗により異なる<br />アクセス：
                  MRT剣潭駅から徒歩約5分<br />料金：店舗により異なる
                </p>
            </div>
          </div>
          <div class="l-spot__right">
            <div class="p-spot__wrap -right">
              <h3 class="p-spot__title">士林夜市</h3>
              <p class="p-spot__description">
                  士林夜市は、台湾観光のなかでも定番のナイトグルメスポット。夜市の規模は、台湾の数ある夜市のなかでも最大規模を誇り、夕方になるとずらりと多くの露天が並びます。B級グルメが楽しめる屋台エリアや、かき氷などを味わえる地下の美食區（メイシーチュー）などのグルメエリア、射的やスロット、雑貨までまるで縁日のように活気ある雰囲気を楽しめます。
                </p>
            </div>
            <div class="l-spot__img">
              <img src="img/taipei_spot033.jpg" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
        <!-- spot04 -->
        <div class="l-spot">
          <div class="l-spot__left">
            <div class="l-spot__img">
              <img src="img/taipei_spot04.jpg" alt="写真" decoding="async" />
            </div>
            <div class="p-spot__wrap -left">
              <p class="p-spot__subtitle">基本情報</p>
              <p class="p-spot__description">
                  住所：Jishan St, Ruifang DistrictNew Taipei City, 台湾 224<br />アクセス：MRT忠孝復興駅から金瓜石行きの基隆客運バスに乗り換え、九份老街バス停下車、台北市内から車で約1時間半<br />料金：無料
                </p>
            </div>
          </div>
          <div class="l-spot__right">
            <div class="p-spot__wrap -right">
              <h3 class="p-spot__title">九份</h3>
              <p class="p-spot__description">
                  言わずと知れた日本人にも人気の台北郊外にある有名な観光スポット。夜になると街の至る所にあるちょうちんが灯り、幻想的な世界が広がります。その美しい世界観は映画「千と千尋の神隠し」のモデルにもなったと言われているほど。元々は金鉱の街として栄えていて、古い町並みが今もなお残されています。
                </p>
            </div>
            <div class="l-spot__img">
              <img src="img/taipei_spot044.jpg" alt="写真" decoding="async" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="act" class="l-section">
      <div class="d-container">
        <h2 class="c-heading -force">アクティビティ<span class="-caption">Activity</span></h2>
        <div class="d-grid" data-gutter="min:small" data-align="min:justify min:middle">
          <div class="d-grid__item" data-cols="min:12 md:6">
            <h3 class="p-act__title">台北 101</h3>
            <div class="p-act">
              <div class="p-act__body">
                <p class="p-act__subtitle">高層からの眺望を楽しむ</p>
                <p class="p-act__txt">
                    市内では最も象徴的な建造物。ショッピング、食事、そして景色を楽しむのに素晴らしい場所です。台北の金融街の中心部にあり、高さは509.2
                    メートルで見る者を圧倒します。世界で最も高いビルという称号を6年間保持していたこの建物は、印象的な観光スポットであり、必見です。
                  </p>
              </div>
              <div class="p-act__img">
                <figure><img src="img/taipei_act01.jpg" alt="" /></figure>
              </div>
            </div>
          </div>

          <div class="d-grid__item" data-cols="min:12 md:6">
            <h3 class="p-act__title">猫空ロープウェイ</h3>
            <div class="p-act">
              <div class="p-act__body">
                <p class="p-act__subtitle">便利なロープウェイで郊外へ</p>
                <p class="p-act__txt">
                    台北動物園と台北市南部郊外にある猫空の小さな町を4.3km
                    に渡って結ぶ猫空ロープウェイ。美しく緑豊かな山々を通り抜け、指南宮駅に停車し、終点に到着します。
                    所要時間は17〜37分。道中には台北の都市の景観や周辺の田園風景も楽しめます。
                  </p>
              </div>
              <div class="p-act__img">
                <figure><img src="img/taipei_act02.jpg" alt="" /></figure>
              </div>
            </div>
          </div>
          <div class="d-grid__item" data-cols="min:12 lg:6">
            <h3 class="p-act__title">十分</h3>
            <div class="p-act">
              <div class="p-act__body">
                <p class="p-act__subtitle">願い事を書いたランタンを空に飛ばそう</p>
                <p class="p-act__txt">
                    台北市内から車で1時間ほどの場所にある十分。周辺にはオレンジ色の電車・平渓線が走るローカルで昔懐かしい雰囲気のエリアです。なかでも旧正月に行われるランタンフェスティバル（平渓天燈節）が有名で、真っ暗な夜空にオレンジ色のランタンが浮かび上がる姿は幻想的で、心奪われる景色。ランタンフェスティバルの期間以外にも、ランタンを購入して願い事を書いて空に飛ばす天燈上げ体験ができます。
                  </p>
              </div>
              <div class="p-act__img">
                <figure><img src="img/taipei_act03.jpg" alt="" /></figure>
              </div>
            </div>
          </div>
          <div class="d-grid__item" data-cols="min:12 lg:6">
            <h3 class="p-act__title">台北市立動物園</h3>
            <div class="p-act">
              <div class="p-act__body">
                <p class="p-act__subtitle">ジャイアントパンダのトアントアンとユエンユエンに会いに行こう！</p>
                <p class="p-act__txt">
                    台北動物園で1番の人気者は、ジャイアントパンダのトアントアンとユエンユエンに、台湾で初めて誕生したパンダ、ユエンザイ。165
                    ヘクタールの敷地内には、12,000羽以上の鳥、人気の子ども動物園、昆虫館、両生爬虫類館があるほか、ペンギン、コアラ、夜行性の動物などが飼育されています。
                  </p>
              </div>

              <div class="p-act__img">
                <figure><img src="img/taipei_act04.jpg" alt="" /></figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="info" class="l-section">
      <div class="d-container">
        <h2 class="c-heading -force">お知らせ<span class="-caption">Information</span></h2>
        <div class="d-grid" data-gutter="min:small" data-align="min:justify min:middle">
          <?php foreach($result as $row) : ?>
          <div class="d-grid__item" data-cols="min:12">
            <div class=" d-grid p-info__wrapper" data-gutter="min:small" data-align="min:justify min:top">
              <div class="d-grid__item" data-cols="min:4">
                <?php if( !empty($row['post_image']) ) : ?> <figure>
                  <img src="upload/<?php echo h($row['post_image']); ?>" alt="<?php echo h($row['title']); ?>">
                </figure>
                <?php endif; ?>
              </div>
              <div class="d-grid__item" data-cols="min:8">
                <p class="p-info__time"><time datetime="<?php echo h($row['created']); ?>"><?php echo h(date('Y年m月d日', strtotime($row['created']))); ?></time></p>
                <p class="p-info__title">
                <a href="detail.php?id=<?php echo h($row['id']); ?>">
                  <?php echo h($row['title']); ?>
                </a>
              </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </section>
    <section id="food" class="l-section">
      <div class="d-container">
        <h2 class="c-heading -force">台湾グルメ<span class="-caption">Gourmet</span></h2>
      </div>
      <!-- swiper -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide c-img -nth">
            <img src="img/gourmet01.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">タピオカドリンク</p>
          </div>
          <div class="swiper-slide c-img">
            <img src="img/gourmet02.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">豆花</p>
          </div>
          <div class="swiper-slide c-img -nth">
            <img src="img/gourmet03.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">パイナップルケーキ</p>
          </div>
          <div class="swiper-slide c-img">
            <img src="img/gourmet04.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">魯肉飯</p>
          </div>
          <div class="swiper-slide c-img -nth">
            <img src="img/gourmet05.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">小籠包</p>
          </div>
          <div class="swiper-slide c-img">
            <img src="img/gourmet06.jpg" alt="写真" decoding="async" />
            <p class="swiper_txt">牛肉麺</p>
          </div>
        </div>
      </div>

      <!-- swiper -->
      <div class="p-btn -food">
        <a href="food/index.html" class="p-btn__button -food">詳しくはこちら</a>
      </div>
    </section>
    <section id="access" class="l-section">
      <div class="d-container">
        <h2 class="c-heading -secondary">アクセス<span class="-caption">access</span></h2>
      </div>
      <div class="map-wrap">
        <div id="map" class="map"></div>
      </div>
      <script type="text/javascript">
      window.initMap = () => {
        let map;

        const area = document.getElementById("map");
        // マップの中心位置
        const center = {
          lat: 25.033992560695435,
          lng: 121.56006454545934,
        };

        //マップ作成
        map = new google.maps.Map(area, {
          center,
          zoom: 12,
        });
        const myLatlng = new google.maps.LatLng(24.992101643090916, 121.56630753905603);

        //マーカーオプション設定👇追記
        const markerOption = {
          position: myLatlng, // マーカーを立てる位置を指定
          map: map, // マーカーを立てる地図を指定
          icon: {
            url: "img/map_logo.png", // お好みの画像までのパスを指定
          },
        };

        //マーカー作成
        const marker = new google.maps.Marker(markerOption);
      };
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=&callback=initMap" async defer></script>
    </section>
  </main>


  <footer>
    <div class="l-footer">
      <p class="p-footer__title">近くて 遠い国、台湾</p>
      <p class="p-footer__copy"><small>copyrights ソエジマユカ All right reserved.</small></p>
    </div>
  </footer>


</body>
</html>