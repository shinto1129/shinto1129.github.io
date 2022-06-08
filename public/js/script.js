$(function(){
  let goodQuestionId;
  let badQuestionId;
  $(".good").click(function () {
    goodQuestionId = $(this).data('good-id');
    $(this).toggleClass('like');
    $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
    $.ajax({
      //POST通信
      type: "post",
      //ここでデータの送信先URLを指定します。
      url: "/good",
      dataType: "json",
      data: {
        'question_id': goodQuestionId,
      },
  
    })
      //通信が成功したとき
      .done(function (data) {
      })
      //通信が失敗したとき
      .fail((error) => {
        console.log(error.statusText);
      });
  });
  $(".bad").click(function () {
    badQuestionId = $(this).data('bad-id');
    $(this).toggleClass('like');
    $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
    $.ajax({
      //POST通信
      type: "post",
      //ここでデータの送信先URLを指定します。
      url: "/bad",
      dataType: "json",
      data: {
        'question_id': badQuestionId,
      },
  
    })
      //通信が成功したとき
      .done(function (data) {
      })
      //通信が失敗したとき
      .fail((error) => {
        console.log(error.statusText);
      });
  });
});

$(window).scroll(function(){
  $('.fadein').each(function(){
    var targetElement = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if(scroll > targetElement - windowHeight +100){
      $(this).addClass('scrollin');
    }else{
      $(this).removeClass('scrollin');
    }
  })
})
$(".delete").click(function() {
  if(!confirm("削除を実行しますか？")) {
      return false;
  } else {
      return true;
  }
});
$(".logout").click(function() {
  if(!confirm("ログアウトしますか？")) {
      return false;
  } else {
      return true;
  }
});