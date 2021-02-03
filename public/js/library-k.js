$(function(){
  $('.bookIdInfo').on("click",function(){
    //data属性のbookIdを取得
    // var bookId = $('.get-data').attr('data-category', $(this).attr("data-category"));
    bookId = $(this).attr('data-bookId');  //1しか返らなかった
    // var bookId = $('.bookIdInfo')[0].dataset.bookId = $(this).data("bookId");
    // console.log(bookId);
  });
  // $(".bookIdInfo").mouseover(function(){
  //   $("button").css("background-color","green");
  // }).mouseout(function(){
  //   $("button").css("background-color","");
  // });

  $("#borrow-btn").on("click",function(){
    // console.log(111);
    // $("#bookId").val() = 1;
    $.ajax({
   url: "http://127.0.0.1:8000/library/bookBorrow",
   type: 'post',
   dataType: 'json',
   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   data: {
     // 'userId':$('#userId').val(),
     // 'password':$('#password').val(),
     // 'returnDate':$('#returnDate').val(),
     // 'bookId':$(this).attr('data-bookId')
     'bookId':bookId
     // 'bookId':  $('.bookIdInfo').on("click",function(){
     //     // var bookId = $(this).attr('data-bookId');  //1しか返らなかった
     //     $(this).attr('data-bookId');
       // })

     // 'bookId':bookId.val()
   },
 })
 .done(function(data) {
     // 通信成功時の処理を記述
     // console.log(data);
     console.log("SUCCESS !")
     // var user_id = $("#userId").val();
     // var password = $("#password").val();
     // var returnDate = $("#returnDate").val();
     // var bookId = $(this).attr('data-bookId');

     // $('table').append('<tr><td>' + user_id + '</td><td>' + "test" + '</td><td>' + user_id + '</td></tr>');
     // location.href="http://127.0.0.1:8000/libraryHome";
     location.reload();
 })
     // Ajaxリクエストが失敗した時発動
 .fail(function(data) {
   // console.log("data");
   console.log('FAIL TO AJAX REQUEST');
 })
  });

  $("#return-btn").on("click",function(){
    // console.log(111);
    // $("#bookId").val() = 1;
    $.ajax({
   url: "http://127.0.0.1:8000/library/bookReturn",
   type: 'post',
   dataType: 'json',
   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
   data: {
     // 'userId':$('#userId').val(),
     // 'password':$('#password').val(),
     // 'returnDate':$('#returnDate').val(),
     'bookId':bookId
   },
 })

 .done(function(data) {
     // 通信成功時の処理を記述
     console.log('SUCCESS TO AJAX REQUEST');
     // var user_id = $("#userId").val();
     // var password = $("#password").val();
     // var returnDate = $("#returnDate").val();
     // var bookId = $("#bookId").val();
     // $('table').append('<tr><td>' + user_id + '</td><td>' + "test" + '</td><td>' + user_id + '</td></tr>');

     location.reload();

   })
     // Ajaxリクエストが失敗した時発動
 .fail(function(data) {
   // console.log("data");
   console.log('FAIL TO AJAX REQUEST');
 })
});


  $(".cancel-btn").on("click",function(){
    location.reload();
    //
  });

  // $("#registerBtn").on("click",function(){
  //   var newBookName = $("#newBookName").val();
  //   if (newBookName != "") {
  //     $.ajax({
  //       url: "http://127.0.0.1:8000/library/bookRegister",
  //       type: 'post',
  //       dataType: 'json',
  //       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  //       data: {
  //         // 'userId':$('#userId').val(),
  //         // 'password':$('#password').val(),
  //         // 'returnDate':$('#returnDate').val(),
  //       },
  //     })
  //     .done(function(data) {
  //       // 通信成功時の処理を記述
  //       console.log('SUCCESS TO AJAX REQUEST');
  //       // var user_id = $("#userId").val();
  //       // var password = $("#password").val();
  //       // var returnDate = $("#returnDate").val();
  //       // var bookId = $("#bookId").val();
  //       // $('table').append('<tr><td>' + user_id + '</td><td>' + "test" + '</td><td>' + user_id + '</td></tr>');
  //       // location.reload();
  //
  //     })
  //
  //     // Ajaxリクエストが失敗した時発動
  //     .fail(function(data) {
  //       // console.log("data");
  //       console.log('FAIL TO AJAX REQUEST');
  //
  //     })
  //
  //   }
  //   else
  //   {
  //     return false;
  //   }
  //
  // });





  });



// $(function(){
//
// )};
