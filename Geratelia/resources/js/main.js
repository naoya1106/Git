
//クリックされたラジオボタンによって投稿の絞り込み
$(function() {
  $('input[name="btn"]').change( function() {
    alert('テスト');
    // id=aの場合、全投稿を表示
    if($('[id="a"]').prop('checked')){
      $('.tokyo').fadeIn();
      $('.osaka').fadeIn();
      $('.fukuoka').fadeIn();

    // id=bの場合、class名が'東京'のみ表示
    } else if ($('[id="b"]').prop('checked')) {
      $('.tokyo').fadeIn();
      $('.osaka').fadeOut();
      $('.fukuoka').fadeOut();
    // id=cの場合、class名が'大阪'のみ表示
    } else if ($('[id="c"]').prop('checked')) {
      $('.tokyo').fadeOut();
      $('.osaka').fadeIn();
      $('.fukuoka').fadeOut();
     // id=cの場合、class名が'福岡'のみ表示
    } else if ($('[id="b"]').prop('checked')) {
      $('.tokyo').fadeOut();
      $('.osaka').fadeOut();
      $('.fukuoka').fadeIn();
    };
  });
});