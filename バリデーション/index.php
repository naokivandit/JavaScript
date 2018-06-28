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

<input type="text" id="koteichi" value="4.87">
<button onclick="tenki()">転記</button>

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
function tenki(){
  var koteichi_value = document.getElementById('koteichi').value;

  for(var i = 0; i < 9; i++) {
    var nyuuryokuran = document.getElementById('nyuryokuchi_' + i).value;
    if(nyuuryokuran == "") {
        document.getElementById('nyuryokuchi_' + i).value = koteichi_value;
        return;
    }

    if(nyuuryokuran == koteichi_value) {
      alert('もう数値が入力されています。');
      return;
    }

    if(document.getElementById('nyuryokuchi_' + i).value >= Number(koteichi_value)) {
      alert('降順に入力してください');
      return;
    }
  }

  if(nyuuryokuran != "") {
  alert('入力できません');
  return;
  }
}

function validationTest(){
var suuji = document.getElementsByName('suuji');
  for(var i = 0; i < suuji.length; i++) {
    if(suuji[i].checked) {
      var check_suuji = suuji[i].value;
    }
  }

for(var i = 0; i < 9; i++) {
  var nyuuryokuran = document.getElementById('nyuryokuchi_' + i).value;
  if(nyuuryokuran != "") {
    if(nyuuryokuran > Number(check_suuji)) {
      alert('チェックした数字以下の値を入力してください');
      return;
    }

    if (i < 8) {
      if(document.getElementById('nyuryokuchi_' + (i + 1)).value != "") {
        if(nyuuryokuran >= document.getElementById('nyuryokuchi_' + (i + 1)).value) {
          alert('降順に入力してください');
          return;
        }
      }
    }

    if(i > 1) {
      if(document.getElementById('nyuryokuchi_' + (i - 1)).value == "") {
        if(nyuuryokuran >= document.getElementById('nyuryokuchi_' + (i - 1)).value) {
          alert('入力欄は詰めて入力してください');
          return;
        }
      }
    }

    if(document.getElementById('nyuryokuchi_' + (i + 1)).value != "") {
      if(nyuuryokuran % 0.25 != 0) {
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