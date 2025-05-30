const RUTA_API = "http://localhost:8000";

var dt = new Date();

$("#print").on("click", () => {
    var billNo_r = $("#billNo_r").val(),
        custName_r = $("#custName_r").val(),
        custNum_r = $("#custNum_r").val(),
        processedBy_r = $("#processedBy_r").val(),
        billDate_r = $("#billDate_r").val(),
        amountPaid_r = $("#amountPaid_r").val(),
        balance_r = $("#balance_r").val(),
        totalItemPrice_r = $("#totalItemPrice_r").val(),
        totalItemQuantity_r = $("#totalItemQuantity_r").val(),
        discount_r = $("#discount_r").val(),
        vat_r = $("#vat_r").val();

    let myPrint = new Impresora(RUTA_API);
    myPrint.setFontSize(1, 1);
    myPrint.setEmphasize(0);
    myPrint.setAlign("center");
    myPrint.write("Ewurays' Mart\n");
    myPrint.write("Phone: 0246507697/0208184635\n");
    myPrint.write("Loc: No1 Junction, Adoteiman, Danfa\n");
    myPrint.write(`Timestamp: ${dt}\n`);
    myPrint.write("--------------------------------\n");
    myPrint.write(`Bill No: ${billNo_r} \n`);
    myPrint.write(`Customer Name: ${custName_r} \n`);
    myPrint.write(`Customer No.: ${custNum_r} \n`);
    myPrint.write(`Processed By: ${processedBy_r} \n`);
    myPrint.write(`Bill Date: ${billDate_r} \n`);
    myPrint.write(`Amount Paid: ${amountPaid_r} \n`);
    myPrint.write(`Balance: ${balance_r} \n`);
    myPrint.write(`Discount: ${discount_r} \n`);
    myPrint.write(`VAT: ${vat_r} \n`);
    myPrint.setAlign("right");
    myPrint.write(`TOTAL ITEM PRICE: GHC ${totalItemPrice_r} \n`);
    myPrint.write("--------------------------------\n");
    myPrint.write(`TOTAL QTY BOUGHT: ${totalItemQuantity_r} \n`);
    myPrint.write("--------------------------------\n");
    myPrint.setAlign("center");
    myPrint.write("***Thanks for Shopping With Us!***");
    myPrint.cut();
    myPrint.cutPartial(); // use both because sometimes cut and/or cutPartial do not work
    myPrint.end();
});