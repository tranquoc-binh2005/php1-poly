$(document).ready(function() {
    function removeVietnameseTones(str) {
        str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        str = str.replace(/đ/g, 'd').replace(/Đ/g, 'D');
        return str;
    }
    function generateSlug(text) {
        text = removeVietnameseTones(text);
        return text.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
    }
    function createSlugCategories() {
        $("#name").on('blur', function(e) {
            var name = $(this).val();
            var slugValue = generateSlug(name);
            $('#slug').val(slugValue); 
        });
    }
    function createSlugCategoriesEdit() {
        $("#nameCategoriesEdit").on('blur', function(e) {
            var name = $(this).val();
            var slugValue = generateSlug(name);
            $('#slugCategoriesEdit').val(slugValue); 
        });
    }

    function showValueEditCategories() {
        $(document).on("click", ".editBtn", function (e) {
            e.preventDefault();
            const categories_id = $(this).attr("id");
    
            $.ajax({
                url: "./admin/editCategories",
                method: "POST",
                data: { categories_id: categories_id },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (!data.error) {
                            $("#nameCategoriesEdit").val(data.name); 
                            $("#idCategoriesEdit").val(data.id); 
                            $("#slugCategoriesEdit").val(data.slug); 
                            $("#updateCategories").modal("show");
                        } else {
                            alert(data.error);
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: ", error);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching category data: ", textStatus, errorThrown);
                }
            });
        });
    }
    function showValueEditProduct() {
        $(document).on("click", ".editBtnProduct", function (e) {
            e.preventDefault();
            const product_id = $(this).attr("id");
    
            $.ajax({
                url: "./admin/editProduct",
                method: "POST",
                data: { product_id: product_id },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (!data.error) {
                            $("#idProductEdit").val(data.id); 
                            $("#nameProductEdit").val(data.name); 
                            $("#priceProductEdit").val(data.price); 
                            $("#descriptionProductEdit").text(data.description); 
                            $("#amountProductEdit").val(data.amount); 
                            $("#categoryProductEdit").val(data.categories); 

                            const pathImg = "./Public/uploads/" + data.img;
                            const imgElement = $("<img>").attr("src", pathImg).attr("alt", "Image Preview").css({"width": "100px", "height": "auto"});
                            $("#imagePreview").empty(); 
                            $("#imagePreview").append(imgElement);

                            $("#editProduct").modal("show");
                        } else {
                            alert(data.error);
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: ", error);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching category data: ", textStatus, errorThrown);
                }
            });
        });
    }
    function showValueEditVoucher() {
        $(document).on("click", ".btnEditVoucher", function (e) {
            e.preventDefault();
            const voucher_id = $(this).attr("id");
    
            $.ajax({
                url: "./admin/editVoucher",
                method: "POST",
                data: { voucher_id: voucher_id },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (!data.error) {
                            $("#nameVoucherEdit").val(data.name); 
                            $("#idVoucherEdit").val(data.id); 
                            $("#slugVoucherEdit").val(data.slug); 
                            $("#dealVoucherEdit").val(data.deal); 
                            $("#updateVoucher").modal("show");
                        } else {
                            alert(data.error);
                        }
                    } catch (error) {
                        console.error("Error parsing JSON: ", error);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching category data: ", textStatus, errorThrown);
                }
            });
        });
    }

    function reviewImageEditProduct(){
        $("#imgProductEdit").on("change", function() {
            const file = this.files[0];
            console.log(file)
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const newImgElement = $("<img>").attr("src", e.target.result).attr("alt", "New Image Preview").css({"width": "100px", "height": "auto"});
                    $("#imagePreview").empty(); 
                    $("#imagePreview").append(newImgElement);
                };
                reader.readAsDataURL(file);
            }
        });
    }


    createSlugCategories();
    createSlugCategoriesEdit();
    showValueEditCategories();
    showValueEditProduct();
    reviewImageEditProduct();
    showValueEditVoucher();
});

