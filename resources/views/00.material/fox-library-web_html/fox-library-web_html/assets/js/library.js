var config = {
    domain: "http://localhost:8765/",
    ajaxList:{
        "book-list":{path:"book",type:"get",action:"bookList"},
        "borrow":{path:"borrow",type:'post',action:"borrow"},
        "return":{path:"return",type:'post',action:"returnBook"},
    }
};
var requestData = {
    book_id: 0,
}
var selectBook;
$(document).ready(function(){
    library.init();
});
var library = {
    init: function(){
        var self = this;
        self.executeAjax(config.ajaxList['book-list']);
        $(".nav .link").on('click',function(){
            self.executeAjax(config.ajaxList['book-list'])
        });
        $(".close").on('click',function(){
            $('.close').parent('.alert').hide();
        });
        $("#borrow-btn").on('click',function(){
            requestData.password = $(".modal-body input[name=password]").val();
            requestData.user_id = $(".modal-body input[name=user_id]").val();
            requestData.return_date = $(".modal-body input[name=return_date]").val();
            if(requestData.password && requestData.user_id && requestData.return_date){
                self.executeAjax(config.ajaxList['borrow'],requestData);
            }
        });
        $("#return-btn").on('click',function(){
            if(requestData.book_id){
                self.executeAjax(config.ajaxList['return'],requestData);
            }
        });
    },
    bookList:function(data){
        $("#area-book-list table tbody tr").remove();
        for (var i = 0; i < data.books.length; i++) {
            var b = data.books[i];
            var tr = $("#area-book-list table tbody")
                .append('<tr class="'+(b.isAvailable == 0? 'borrowing':'')+'"><td>'+b.id+'</td><td>'+b.title+'</td><td>'+(b.isAvailable == 0? 'borrowing':'available')+'</td></tr>');
        }
        $("#area-book-list table tbody tr").off('click');
        $("#area-book-list table tbody tr").on('click',function(){
            selectBook = $(this);
            $('.modal-body h4').text($(this).find('td').eq(1).text());
            requestData.book_id = $(this).find('td').eq(0).text();
            if(!$(this).hasClass('borrowing')){
                $('#borrowModal').modal('show');
            }else{
                $('#returnModal').modal('show');
            }
        });
    },
    borrow:function(result){
        selectBook.addClass('borrowing');
        selectBook.find('td').eq(2).text('borrowing')
        $('#borrowModal').modal('hide');
    },
    returnBook:function(result){
        selectBook.removeClass('borrowing');
        selectBook.find('td').eq(2).text('available')
        $("#success-alert").fadeIn();
        setTimeout(function(){$("#success-alert").fadeOut();}, 3000);
        $('#returnModal').modal('hide');
    },
    executeAjax:function(conf,data){
        var self = this;
        $.ajax(config.domain+conf.path,{
                type: conf.type,
                dataType: 'json',
                data: data
            }).done(function(data) {
                self[conf.action](data);
                return data;
            }).fail(function() {
              $("#error-alert").show();
              $('#borrowModal,#returnModal').modal('hide');
        });
    }
}