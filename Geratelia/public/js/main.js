
//クリックされたラジオボタンによって投稿の絞り込み
$(function() {
  $('input[name="btn"]').change( function() {
    // alert('テスト');
    // id=aの場合、全投稿を表示
    if($('[id="a"]').prop('checked')){
      $('.tokyo').show();
      $('.osaka').show();
      $('.fukuoka').show();

    // id=bの場合、class名が'東京'のみ表示
    } else if ($('[id="b"]').prop('checked')) {
      $('.tokyo').show();
      $('.osaka').hide();
      $('.fukuoka').hide();
    // id=cの場合、class名が'大阪'のみ表示
    } else if ($('[id="c"]').prop('checked')) {
      $('.tokyo').hide();
      $('.osaka').show();
      $('.fukuoka').hide();
     // id=cの場合、class名が'福岡'のみ表示
    } else if ($('[id="d"]').prop('checked')) {
      $('.tokyo').hide();
      $('.osaka').hide();
      $('.fukuoka').show();
    };
  });
});