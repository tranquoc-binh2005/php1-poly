$(document).ready(function() {
    $('#formAddCart').on('submit', function(e) {
        var soluong = $('#soluong').val();

        if (soluong < 1 || soluong > 10) {
            e.preventDefault();
            return;
        }
    });

    $('#btnAddCart').on('click', function(e) {
        e.preventDefault();
        var soluong = $('#soluong').val();
        $('#formAddCart').append('<input type="hidden" name="soluong" value="' + soluong + '">');
        $('#formAddCart').submit();
    });

    $('.amountProductCart').on('change', function() {
        var productId = $(this).data('id');
        var newAmount = $(this).val();      

        $.ajax({
            url: './cart/updateCart',
            method: 'POST',
            data: {
                id: productId,
                soluong: newAmount
            },
            success: function(response) {}
            ,
            error: function() {}
        });
    });

    $("#range").on('change', function(e){
        var range = $(this).val();
    
        $.ajax({
            url: './home/getProduct',
            method: 'POST',
            data: {range: range},
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data.html)
                $('.bestsell-product-range').html(data.html);
                $(".bestsell-product").hide();
            },
            error: function() {
                $(".bestsell-product").show();
                alert("Có lỗi xảy ra");
            }
        });
    });


    // address

    $("#province_id").on('change', function() {
        var province_id = $(this).val();
    
        if (province_id) {
            $.ajax({
                url: './bill/getDistrict',
                method: 'POST',
                data: {province_id: province_id},

                success: function(response) {
                    var data;
                    try {
                        data = JSON.parse(response);
                    } catch (error) {
                        console.error("JSON Parse Error: ", error, response); 
                    }
                    $('#district_id').html(data.html);
                },
                error: function() {
                    alert("Có lỗi xảy ra");
                }
            });
        } else {
            $('#district_id').html('<option value="">Chọn quận/huyện</option>');
        }
    });

    $("#district_id").on('change', function() {
        var district_id = $(this).val();
    
        if (district_id) {
            $.ajax({
                url: './bill/getWard',
                method: 'POST',
                data: {district_id: district_id},

                success: function(response) {
                    var data;
                    try {
                        data = JSON.parse(response);
                    } catch (error) {
                        console.error("JSON Parse Error: ", error, response); 
                    }
                    $('#ward_id').html(data.html);
                },
                error: function() {
                    alert("Có lỗi xảy ra");
                }
            });
        } else {
            $('#ward_id').html('<option value="">Chọn Phường/Xã</option>');
        }
    });
    
    
});