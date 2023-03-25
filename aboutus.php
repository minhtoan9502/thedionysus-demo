<?php
include 'header.php';
include('includes/config.php');

?>


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>theDionysus</h1>
  <p>Chúng tôi chuyên về đồng hồ nam luxury dỏm nhưng giá bằng hàng thật.</p>
  <p>Hãy cứ mua vì cuộc đời cho phép.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="Images/1293917.png" alt="Bocchi" height="400" style="width:100%">
      <div class="container">
        <h2>Bocchi the rock</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="Images/minhtoan9502.png" alt="Toàn" width="400" height="400" style="width:100%; height: 400;">
      <div class="container">
        <h2>Minh Toàn</h2>
        <p class="title">Nhà tạo mẫu tóc</p>
        <p>Tôi là Minh Toàn nhà đại vĩ.</p>
        <p>voton@gmail.com</p>
        <p><button class="button">Liên hệ</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="https://scontent.fsgn5-5.fna.fbcdn.net/v/t39.30808-1/278006799_3204273779899889_7728174567244413776_n.jpg?stp=dst-jpg_p200x200&amp;_nc_cat=100&amp;ccb=1-7&amp;_nc_sid=7206a8&amp;_nc_ohc=hsxgwgd81nMAX8bqjxh&amp;_nc_ht=scontent.fsgn5-5.fna&amp;oh=00_AfA9_6gu_esUoaMfso6_8INTOr-WgG-NfXojQev-b_6BQw&amp;oe=641AD060" alt="Lợi" height="400" style="width:100%">
      <div class="container">
        <h2>Lợi Crypto</h2>
        <p class="title">Nhà kinh tế lõi lạc</p>
        <p>Chơi crypto đi bạn ơi!</p>
        <p>john@example.com</p>
        <p><button class="button">Liên hệ</button></p>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>