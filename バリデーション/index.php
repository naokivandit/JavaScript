<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力制御</title>
</head>
<body>
<div>
    <input type="radio" name="suuji" value="5">5
    <input type="radio" name="suuji" value="10">10
    <input type="radio" name="suuji" value="20">20
</div>
<br>

  <table border=1>
    <tr>
      <th>コード</th>
      <th>数値</th>
      <th>名称</th>
    </tr>

<?php for($i=0; $i < 9; $i++) { ?>
        <tr>
          <td><?=$i?></td>
          <td><input type="text" id="nyuryokuchi_<?=$i?>"></td>
          <td><input type="text" id="name_<?=$i?>"></td>
        </tr>
<?php } ?>
  </table>
<input type="button" value="処理" onclick="validationTest()">

<!-- JavaScript -->
<script type="text/javascript">
function validationTest(){
var suuji = document.getElementsByName('suuji');
  for(var i = 0; i < suuji.length; i++) {
    if(suuji[i].checked) {
      var check_suuji = suuji[i].value;
    }
  }

for(var i = 0; i < 9; i++) {
  var f_shindo = document.getElementById('nyuryokuchi_' + i).value;
  if(f_shindo != "") {
    if(f_shindo > Number(check_suuji)) {
      alert('チェックした数字以下の値を入力してください');
      return;
    }

    if (i < 8) {
      if(document.getElementById('nyuryokuchi_' + (i + 1)).value != "") {
        if(f_shindo >= document.getElementById('nyuryokuchi_' + (i + 1)).value) {
          alert('降順に入力してください');
          return;
        }
      }
    }

    if(i > 1) {
      if(document.getElementById('nyuryokuchi_' + (i - 1)).value == "") {
        if(f_shindo >= document.getElementById('nyuryokuchi_' + (i - 1)).value) {
          alert('入力欄は詰めて入力してください');
          return;
        }
      }
    }

    if(document.getElementById('nyuryokuchi_' + (i + 1)).value != "") {
      if(f_shindo % 0.25 != 0) {
        alert('0.25m単位で入力してください');
        return;
      }
    }

    if(document.getElementById('name_' + i).value == "") {
      alert('名称を入力してください');
      return;
    }
  }
}
alert('更新！');
}
</script>

</body>
</html>