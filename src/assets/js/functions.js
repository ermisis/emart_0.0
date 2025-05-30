// Array Object
var items = [];

// Document Ready
$(document).ready(function () {
    ///// Adding New User
    $("#add_user_btn").on("click", () => {

        var selectedRole = $("#selectedRole").val(),
            userFirstName = $("#userFirstName").val(),
            userLastName = $("#userLastName").val(),
            userName = $("#userName").val(),
            userPassword = $("#userPassword").val(),
            userNo = $("#userNo").val(),
            userDateCreated = $("#userDateCreated").val(),

            userData = "insert";

        $.post("/emart/src/processphp/process_user.php", {

            selectedRole: selectedRole,
            userFirstName: userFirstName,
            userLastName: userLastName,
            userName: userName,
            userPassword: userPassword,
            userNo: userNo,
            userDateCreated: userDateCreated,
            userData: userData

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "found") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });

    ///// Updating User
    $("#update_user_btn").on("click", () => {

        var userId_v = $("#userId_v").val(),
            selectedRole_v = $("#selectedRole_v").val(),
            userFirstName_v = $("#userFirstName_v").val(),
            userLastName_v = $("#userLastName_v").val(),
            userName_v = $("#userName_v").val(),
            userNo_v = $("#userNo_v").val(),

            userData_v = "update";

        $.post("/emart/src/processphp/update_user.php", {

            userId_v: userId_v,
            selectedRole_v: selectedRole_v,
            userFirstName_v: userFirstName_v,
            userLastName_v: userLastName_v,
            userName_v: userName_v,
            userNo_v: userNo_v,
            userData_v: userData_v

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });
    ///// Updating Profile
    $("#update_profile").on("click", () => {

        var userId_p = $("#userId_p").val(),
            selectedRole_p = $("#selectedRole_p").val(),
            userFirstName_p = $("#userFirstName_p").val(),
            userLastName_p = $("#userLastName_p").val(),
            userName_p = $("#userName_p").val(),
            userPassword_p = $("#userPassword_p").val(),
            userNo_p = $("#userNo_p").val(),
            userDateCreated_p = $("#userDateCreated_p").val(),

            updateProfile = "update";

        $.post("/emart/src/processphp/update_user_profile.php", {

            userId_p: userId_p,
            selectedRole_p: selectedRole_p,
            userFirstName_p: userFirstName_p,
            userLastName_p: userLastName_p,
            userName_p: userName_p,
            userPassword_p: userPassword_p,
            userNo_p: userNo_p,
            userDateCreated_p: userDateCreated_p,
            updateProfile: updateProfile

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });

    // Adding VAT to Product
    // $(".qRate").on("blur", () => {
    //     var qRate = $(".qRate").val(),
    //     pcv = $(".pcv").val(),
    //     vatConf = $("#vatConf").val(),
    //     pDiscnt = $(".pDiscnt").val(),
    //     totalItmPrc = 0,
    //     withDiscount = 0,
    //     finalPrice = 0,
    //     vatRateVal = 0;

    //     totalItmPrc = parseFloat(qRate) * parseFloat(pcv);
    //     vatRateVal = parseFloat(totalItmPrc * (vatConf / 100));
    //     withDiscount = parseFloat(pDiscnt) / 100;
    //     finalPrice = parseFloat(vatRateVal) - parseFloat(withDiscount);

    //     $("#pVat").val(finalPrice.toFixed(2));

    // })

    ///// Functions For Capturing New Products
    $("#saveProBtn").on("click", () => {

        var probcode = $("#probcode").val(),
            proName = $("#proName").val(),
            proBrand = $("#proBrand").val(),
            proDesc = $("#proDesc").val(),
            proCategory = $("#proCategory").val(),
            mValue = $("#mValue").val(),
            proCost = $("#proCost").val(),
            pQuantity = $("#pQuantity").val(),
            pDiscount = $("#pDiscount").val(),
            pUnit = $("#pUnit").val(),
            supplier = $("#supplier").val(),
            manDate = $("#manDate").val(),
            expDate = $("#expDate").val(),
            pcDate = $("#pcDate").val(),

            addPro = "insert";

        $.post("/emart/src/processphp/process_product.php", {

            probcode: probcode,
            proName: proName,
            proBrand: proBrand,
            proDesc: proDesc,
            proCategory: proCategory,
            mValue: mValue,
            proCost: proCost,
            pQuantity: pQuantity,
            pDiscount: pDiscount,
            pUnit: pUnit,
            supplier: supplier,
            manDate: manDate,
            expDate: expDate,
            pcDate: pcDate,
            addPro: addPro

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "found") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });

    ///// Functions For Capturing Products for Update
    $("#updateProBtn").on("click", () => {

        var proId = $("#proId").val(),
            probcode_v = $("#probcode_v").val(),
            proName_v = $("#proName_v").val(),
            proBrand_v = $("#proBrand_v").val(),
            proDesc_v = $("#proDesc_v").val(),
            proCategory_v = $("#proCategory_v").val(),
            mValue_v = $("#mValue_v").val(),
            proCost_v = $("#proCost_v").val(),
            discount_v = $("#discount_v").val(),
            pUnit_v = $("#pUnit_v").val(),
            supplier_v = $("#supplier_v").val(),
            manDate_v = $("#manDate_v").val(),
            expDate_v = $("#expDate_v").val(),
            pcDate_v = $("#pcDate_v").val(),

            updatePro = "update";

        $.post("/emart/src/processphp/update_product.php", {

            proId: proId,
            probcode_v: probcode_v,
            proName_v: proName_v,
            proBrand_v: proBrand_v,
            proDesc_v: proDesc_v,
            proCategory_v: proCategory_v,
            mValue_v: mValue_v,
            proCost_v: proCost_v,
            discount_v: discount_v,
            pUnit_v: pUnit_v,
            supplier_v: supplier_v,
            manDate_v: manDate_v,
            expDate_v: expDate_v,
            pcDate_v: pcDate_v,
            updatePro: updatePro

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });


    ///// Functions For Capturing New Category
    $("#saveCateBtn").on("click", () => {

        var cateName = $("#cateName").val(),
            cateDesc = $("#cateDesc").val(),

            addCate = "insert";

        $.post("/emart/src/processphp/process_category.php", {

            cateName: cateName,
            cateDesc: cateDesc,
            addCate: addCate

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "found") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });
    ///// Functions For Capturing Category for Update
    $("#updateCateBtn").on("click", () => {

        var cateId = $("#cateId").val(),
            cateName_v = $("#cateName_v").val(),
            cateDesc_v = $("#cateDesc_v").val(),

            updateCate = "update";

        $.post("/emart/src/processphp/update_category.php", {

            cateId: cateId,
            cateName_v: cateName_v,
            cateDesc_v: cateDesc_v,
            updateCate: updateCate

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });

    ///// Functions For Capturing New Supplier
    $("#saveSupBtn").on("click", () => {

        var supplierName = $("#supplierName").val(),
            supplierLoc = $("#supplierLoc").val(),
            supplierNum = $("#supplierNum").val(),
            supplierRate = $("#supplierRate").val(),

            addSup = "insert";

        $.post("/emart/src/processphp/process_supplier.php", {

            supplierName: supplierName,
            supplierLoc: supplierLoc,
            supplierNum: supplierNum,
            supplierRate: supplierRate,
            addSup: addSup

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "found") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });
    ///// Functions For Capturing Supplier for Update
    $("#updateSupBtn").on("click", () => {

        var supId = $("#supId").val(),
            supplierName_v = $("#supplierName_v").val(),
            supplierLoc_v = $("#supplierLoc_v").val(),
            supplierNum_v = $("#supplierNum_v").val(),
            supplierRate_v = $("#supplierRate_v").val(),

            updateSup = "update";

        $.post("/emart/src/processphp/update_supplier.php", {

            supId: supId,
            supplierName_v: supplierName_v,
            supplierLoc_v: supplierLoc_v,
            supplierNum_v: supplierNum_v,
            supplierRate_v: supplierRate_v,
            updateSup: updateSup

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });



    // Product Configurations
    $("#applyBtn").on("click", () => {

        var configId = $("#configId").val(),
            vatConfig = $("#vatConfig").val(),
            discountConfig = $("#discountConfig").val(),
            config = "apply";

        $.post("/emart/src/processphp/process_config.php", {
            configId: configId,
            vatConfig: vatConfig,
            discountConfig: discountConfig,
            config: config

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });


    // Product Quantity Update
    $("#updtQtyBtn").on("click", () => {

        var updtProId = $("#updtProId").val(),
            LastUpdate = $("#LastUpdate").val(),
            updateProQty = $("#updateProQty").val();

        $.post("/emart/src/processphp/update_pro_qty.php", {
            updtProId: updtProId,
            LastUpdate: LastUpdate,
            updateProQty: updateProQty

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

    });


    // Capturing Transaction Value into PHP for Processing
    $("#submitTran").on("click", () => {

        var billNo = $("#billNo").val(),
            custName = $("#custName").val(),
            custNum = $("#custNum").val(),
            processedBy = $("#processedBy").val(),
            billDate = $("#billDate").val(),
            amountPaid = $("#amountPaid").val(),
            balance = $("#balance").val(),
            totalItemPrice = $("#totalItemPrice").val(),
            totalItemQuantity = $("#totalItemQuantity").val(),
            discount = $("#discount").val(),
            vat = $("#vat").val(),
            data = items;

        $.post("/emart/src/processphp/process_transaction.php", {

            billNo: billNo,
            custName: custName,
            custNum: custNum,
            processedBy: processedBy,
            billDate: billDate,
            amountPaid: amountPaid,
            balance: balance,
            totalItemPrice: totalItemPrice,
            totalItemQuantity: totalItemQuantity,
            discount: discount,
            vat: vat,
            data: data

        }, function (da) {
            console.log(da);
            var da = JSON.parse(da);
            if (da.ermySuc) {
                alert(da.ermyNote);
            } else if (da.ermySuc == "data") {
                alert(da.ermyNote);
            } else {
                alert(da.ermyNote);
            }
        });

        $("#makePaymentModal").modal("hide");

        console.log(items);

    });


    // Fucntion for Capturing Daily Sales Form and processing for Print Preview
    $(document).ready(function () {
        $("#searchDailyBtn").on("click", (e) => {

            e.preventDefault();

            var dailySalesForm = new FormData(document.getElementById("queryForm_d"));
            dailySalesForm = [...dailySalesForm.entries()];
            window.open("http://localhost/emart/src/daily_sales_pdf.php?dailyrecords=" + btoa(JSON.stringify(dailySalesForm)), "_blank");

        });
    });


    // Capturing OverAll Sales and processing for Print Preview
    $(document).ready(function () {
        $("#overAllSalesBtn").on("click", (e) => {

            e.preventDefault();

            window.open("http://localhost/emart/src/overAllSales_pdf.php?overallsales=", "_blank");

        });
    });


    // Capturing OverAll Expenses and processing for Print Preview
    $(document).ready(function () {
        $("#overAllExpBtn").on("click", (e) => {

            e.preventDefault();

            window.open("http://localhost/emart/src/overAllExpenses_pdf.php?overallexpenses=", "_blank");

        });
    });



    // Final Payment Reciept Processess
    const RUTA_API = "http://localhost:8000";

    $(".printReciept").on("click", () => {

        let myPrint = new Impresora(RUTA_API);

        var getBillNo = $(".getBillNo").val(),
            getCustomerName = $(".getCustomerName").val(),
            getCustomerNo = $(".getCustomerNo").val(),
            getUser = $(".getUser").val(),
            getDate = $(".getDate").val(),
            getPaid = $(".getPaid").val(),
            getBalance = $(".getBalance").val(),
            getAmount = $(".getAmount").val(),
            getTotQty = $(".getTotQty").val(),
            getDiscount = $(".getDiscount").val(),
            getVat = $(".getVat").val();


        myPrint.setFontSize(1, 1);
        myPrint.setEmphasize(0);
        myPrint.setAlign("center");
        myPrint.write("Ewurays' Mart\n");
        myPrint.write("Phone: 0246507697/0557407553\n");
        myPrint.write("Loc: No1 Junction, Adoteiman, Danfa\n");
        myPrint.write(`Timestamp: ${getDate}\n`);
        myPrint.write("--------------------------------\n");
        myPrint.write(`Bill No: ${getBillNo} \n`);
        myPrint.write(`Customer Name: ${getCustomerName} \n`);
        myPrint.write(`Customer No.: ${getCustomerNo} \n`);
        myPrint.write(`Processed By: ${getUser} \n`);
        myPrint.write(`Amount Paid: ${getPaid} \n`);
        myPrint.write(`Balance: ${getBalance} \n`);
        myPrint.write(`Discount: ${getDiscount} \n`);
        myPrint.write(`Vat: ${getVat} \n`);
        myPrint.write("--------------------------------\n");
        myPrint.setAlign("center");
        myPrint.write(" Item Name ");
        myPrint.setAlign("center");
        myPrint.write(" Qty ");
        myPrint.setAlign("right");
        myPrint.write(" Price \n");
        myPrint.write("--------------------------------\n");

        items.forEach(function (printItems) {
            myPrint.setFontSize(1, 1);
            myPrint.setEmphasize(0);
            myPrint.setAlign("center");
            myPrint.write(` ${printItems.productName} `);
            myPrint.setAlign("center");
            myPrint.write(` ${printItems.bougthQty} `);
            myPrint.setAlign("right");
            myPrint.write(` ${printItems.productCost} \n`);
            myPrint.write("--------------------------------\n");
        })

        myPrint.write("--------------------------------\n");
        myPrint.setAlign("right");
        myPrint.write(`TOTAL ITEM QTY: ${getTotQty} \n`);
        myPrint.setAlign("right");
        myPrint.write(`TOTAL ITEM PRICE: GHC ${getAmount} \n`);
        myPrint.write("--------------------------------\n");
        myPrint.setAlign("center");
        myPrint.write("***Thanks for Shopping With Us!*** \n");
        myPrint.write("--------------------------------\n");
        myPrint.cut();
        myPrint.cutPartial(); // use both because sometimes cut and/or cutPartial do not work
        myPrint.end();
        // .then(valor => {
        //     loguear("Response: " + valor);
        // })

    });



    // Payment/Transaction Modal...
    $("#paymnt_modal_btn").on("click", function () {

        // Creating Random No.
        var now = new Date();
        var randomNum = '';
        randomNum += Math.round(Math.random() * 9);
        randomNum += Math.round(Math.random() * 9);
        randomNum += now.getTime().toString().slice(-4);
        $("input#billNo").val(randomNum);

        // Setting Focus to Amount Input Field
        $("#amountPaid").focus();
        //Array of Purchase Record
        console.log(items);
        console.log(purchased);

        var itemsLength = purchased.length;
        if (itemsLength > 0) {

            var content1 = purchased[purchased.length - 1];
            var content2 = purchased[purchased.length - 2];

            console.log(content1);
            console.log(content2);

            $("input#totalItemPrice").val(content1);
            $("input#totalItemQuantity").val(content2);

        }

        // var data = items;
        // $.post("/emart/src/test.php", {

        //     data: data
        // }, function(da) {
        //     console.log(da);
        // });

    });


    // Transaction Form Calculations
    $("#amountPaid").on("blur", () => {

        var amountPaid = $("#amountPaid").val(),
            totalItemPrice = $("#totalItemPrice").val(),
            res = 0;

        if (amountPaid >= totalItemPrice) {

            res = parseFloat(amountPaid) - parseFloat(totalItemPrice);
            $("#balance").val(res.toFixed(2));

        } else if (amountPaid < totalItemPrice) {

            alert("Please Kindly Check The Amount!");

        }

    });


    // Alternative Button for fetching and adding items to Cart/Temporal table
    $("#addToCart").on("click", () => {

        var selectPro = $("#selectPro").val();

        $.post("/emart/src/processphp/fetch_product.php", {
            selectPro: selectPro

        }, function (da) {

            if (da) {
                // JSON encoded Data from PHP page (Responds)
                var da = JSON.parse(da);

                // console.log(da);

                // Fetched Product From Database
                var productsFromDb = da.results;

                var productDbCode = productsFromDb.productBcode;

                var localArray = add(items, productDbCode, productsFromDb);

                var tr = buildTemp(localArray);

                $("#cat-tbody").html(tr);

                sumTotal(items);

            } else {

                alert("Please Check That You Have Typed A Product");

            }

        });

    });



    ///// Fetching Prodruct by Scanned Code
    let code = "";
    let reading = false;
    document.addEventListener('keypress', e => {
        // Setting Focus on Shopping Cart Page
        $("#scanNote").focus();
        //usually scanners throw an 'Enter' key at the end of read
        if (e.key === 13) {
            if (code.length > 10) {
                // console.log(code);

                // Posting scanned value to php page for processing
                $.post("/emart/src/processphp/fetch_product.php", {
                    code: code

                }, function (da) {

                    if (da) {
                        // JSON encoded Data from PHP page (Responds)
                        var da = JSON.parse(da);

                        console.log(da);

                        // Fetched Product From Database
                        var productsFromDb = da.results;

                        var productDbCode = productsFromDb.productBcode;

                        var localArray = add(items, productDbCode, productsFromDb);

                        var tr = buildTemp(localArray);

                        $("#cat-tbody").html(tr);

                        sumTotal(items);

                    } else {

                        alert("Please Check That You Have Scanned A Product");

                    }

                });

                code = "";
            }
        } else {

            code += e.key; //while this is not an 'enter' it stores the every key

        }
    });

    // Function for adding Items Arrays to List/Cart
    function add(localArray, productCodeFromDb, productsFromDb) {

        // Checking if Product Code is Found in LocalArray
        var found = localArray.some(el => el.productBcode === productCodeFromDb);

        if (!found) {

            // If Product Code Not Found Subtract from Product Quantity
            productsFromDb.productQuantity = parseInt(productsFromDb.productQuantity) - 1;

            // Assigning new Quantity bought n Total Price to LocalArray
            productsFromDb = Object.assign({
                bougthQty: "1",
                totalPrice: productsFromDb.productCost
            }, productsFromDb);

            localArray.push(productsFromDb);

        } else {

            objIndex = localArray.findIndex((obj => obj.productBcode == productCodeFromDb));

            //Update object's name property.
            //Creating New Quantity variable and adding one 
            var newQtyBought = parseInt(localArray[objIndex].bougthQty) + 1;

            // Updating Quantity from Database and subtracting one
            var newQty = parseInt(localArray[objIndex].productQuantity) - 1;

            if (parseInt(newQty) >= 0) {

                var totalPrice = parseFloat(newQtyBought) * parseFloat(localArray[objIndex].productCost);

                localArray[objIndex].productQuantity = newQty.toString();

                localArray[objIndex].bougthQty = newQtyBought.toString();

                localArray[objIndex].totalPrice = totalPrice.toFixed(2).toString();

            } else {

                alert("Product Out Of Stock");
                return localArray;

            }

        }

        return localArray;

    }


    // Fucntion for Decreasing Quantity Bought
    function decrease(productBcode, localArray) {

        objIndex = localArray.findIndex((obj => obj.productBcode == productBcode));

        var newQtyBought = parseInt(localArray[objIndex].bougthQty) - 1;

        if (newQtyBought == 0) {

            localArray.splice(objIndex, 1);

        } else {

            var newQty = parseInt(localArray[objIndex].productQuantity) + 1;

            var totalPrice = newQtyBought * parseInt(localArray[objIndex].productCost);

            localArray[objIndex].productQuantity = newQty.toString();

            localArray[objIndex].bougthQty = newQtyBought.toString();

            localArray[objIndex].totalPrice = totalPrice.toFixed(2).toString();

        }

        return localArray;

    }

    // Fucntion for Increasing Quantity Bought
    function increase(productBcode, localArray) {

        objIndex = localArray.findIndex((obj => obj.productBcode == productBcode));

        //Creating New Quantity variable and adding one 
        var newQtyBought = parseInt(localArray[objIndex].bougthQty) + 1;

        // Updating Quantity from Database and subtracting one
        var newQty = parseInt(localArray[objIndex].productQuantity) - 1;

        if (parseInt(newQty) >= 0) {

            var totalPrice = parseFloat(newQtyBought) * parseFloat(localArray[objIndex].productCost);

            localArray[objIndex].productQuantity = newQty.toString();

            localArray[objIndex].bougthQty = newQtyBought.toString();

            localArray[objIndex].totalPrice = totalPrice.toFixed(2).toString();

        } else {

            alert("Product Out Of Stock");
            return localArray;

        }

        return localArray;

    }


    var purchased = [];
    // Function for Summing Item and Price Total In Cart
    function sumTotal(items) {

        if (items.length > 0) {

            var total = items.reduce(function (c, x) {
                if (!c['totals']) c['totals'] = {
                    total_items: 0,
                    total_price: 0
                }
                c['totals'].total_items += parseInt(x.bougthQty)
                c['totals'].total_price += parseInt(x.totalPrice)
                return c;
            }, {});

            var itemTotal = total.totals.total_items;
            var priceTotal = total.totals.total_price;

        } else {

            var itemTotal = 0;
            var priceTotal = 0;

        }

        document.getElementById('iTotal').innerText = itemTotal;
        document.getElementById('pTotal').innerText = priceTotal;

        purchased.push(itemTotal, priceTotal);

    }


    // Button to call Quantity Decrease Fucntion
    $(document).on('click', '.decrease', function () {
        var productid = $(this).data('productid');
        var new_items = decrease(productid, items);
        var tr = buildTemp(new_items);
        // console.log(new_items);
        $("#cat-tbody").html(tr);

        sumTotal(items);

    });

    // Button to call Quantity Increase Fucntion
    $(document).on('click', '.increase', function () {
        var productid = $(this).data('productid');
        var new_items = increase(productid, items);
        var tr = buildTemp(new_items);
        // console.log(new_items);
        $("#cat-tbody").html(tr);

        sumTotal(items);

    });


    // Remove Button for Table Row Content
    $(document).on('click', '.removeItem', function () {
        var productCode = $(this).data('productid');
        // console.log(productCode);
        // Remove Item from Item Array
        for (var i = 0; i < items.length; i++) {
            if (items[i].productBcode == productCode) {
                items.splice(i, 1);
                break;
            }
        }

        // Remove Content from Table Row
        $(this).closest('tr').remove();

        sumTotal(items);

    });


    // Fucntion for Appending values to Temporal Table
    function buildTemp(localArray) {
        var tr = ``;
        if (localArray) {
            localArray.forEach(function (arrayItem) {
                tr += `
                      <tr>  
                      <td>${arrayItem.productName}</td>
                      <td>${arrayItem.productCost}</td>
                      <td><div class="number-input">
                        <button data-productid="${arrayItem.productBcode}" class="decrease"></button>
                        <input class="quantity" min="0" name="quantity" value = "${arrayItem.bougthQty}" type="number">
                        <button data-productid="${arrayItem.productBcode}" class="increase plus"></button>
                        </div></td>
                      <td>${arrayItem.totalPrice}</td>
                      <td><button type="button" data-productid="${arrayItem.productBcode}"
                      class="btn btn-danger removeItem btn-sm" data-placement="top"
                      title="Remove Item" id="" Tooltip on top><i class="fas fa-trash-alt"></i></button></td>
                      </tr>`;
            });
        }
        return tr;
    }


});


//// Function to check if page load and Displays processed data from fetch_sales.php file
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {

        $.get("/emart/src/processphp/fetch_sales.php", function (data) {
            // console.log(data);
            var dateNow = new Date(),
                f = JSON.parse(data),
                t = f.totals,
                s = f.record,
                timeOfPurchase = new Date(s.inputDate);

            var d = Math.abs(dateNow - timeOfPurchase) / 1000, // Get Date Difference
                r = {}, // Result Object
                a = { // Date Object (Millisecond Vals)
                    year: 31536000,
                    month: 2592000,
                    week: 604800,
                    day: 86400,
                    hour: 3600,
                    minute: 60,
                    second: 1
                };

            Object.keys(a).forEach(function (key) {
                r[key] = Math.floor(d / a[key]);
                d -= r[key] * a[key];
            });

            if (r.second <= 59 && r.minute <= 60 && r.hour == 0 && r.day == 0 && r.week == 0) {
                $("#timeDiff").html(`${r.second} - Seconds Ago`);
            } else if (r.minute <= 60 && r.hour <= 3600 && r.day == 0) {
                $("#timeDiff").html(`${r.minute} - Minute Ago`);
            } else if (r.minute <= 60 && r.hour == 0 && r.day == 0) {
                $("#timeDiff").html(`${r.hour} - Hours Ago`);
            } else if (r.minute <= 60 && r.hour <= 3600 && r.day <= 86400) {
                $("#timeDiff").html(`${r.day} - Days Ago`);
            } else {
                $("#timeDiff").html(``);
            }
            // for example: {year:0,month:0,week:1,day:2,hour:34,minute:56,second:7}
            console.log(r);

            $("#proSoldName").html(s.proName);
            $("#proDesc").html(s.proDesc);
            $("#itsPrice").html(`GHC - ${s.proPrice}`);
            $("#soldBy").html(s.processedBy);

            $("#itemSold").html(t.totalQtySold);
            $("#itemLeft").html(t.totalQtyLeft);
            $("#totalPrice").html(t.totalProPrice);
            $("#totalSales").html(t.totalProCost);
            $("#overAllCost").html(t.mainProductCost);
            $("#totalSalePerc").html('+' + t.proSalesPerc + '%');
            $("#totalQtyPerc").html('-' + t.overAllQtyPerc + '%');
            $("#totalStock").html(t.newMainProQuantity);
        });

    }
};