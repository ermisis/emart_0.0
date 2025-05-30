<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/emart/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/emart/src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/emart/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/emart/src/assets/datatables/jquery.dataTables.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/emart/src/dist/js/app-style-switcher.js"></script>
    <script src="/emart/src/dist/js/feather.min.js"></script>
    <script src="/emart/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/emart/src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/emart/src/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/emart/src/assets/extra-libs/c3/d3.min.js"></script>
    <script src="/emart/src/assets/extra-libs/c3/c3.min.js"></script>
    <script src="/emart/src/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="/emart/src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/emart/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/emart/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/emart/src/dist/js/pages/dashboards/dashboard1.min.js"></script>

    <!-- My Custom JavaScript -->
    <script src="/emart/Impresora.js"></script>
    <!-- <script src="/emart/src/assets/jQuery-Scanner-Detection-master/jquery.scannerdetection.js"></script> -->
    <script src="/emart/src/assets/js/functions.js"></script>
    <script src="/emart/src/assets/js/script.js"></script>

    

    
  <!-- Script for Getting Current Date Time  -->
  <script type="text/javascript">
      $(document).ready(function() {
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleString();          
      });

  </script>
  
  
  <!-- <script>

  const $btnPrint = document.querySelector("#btnPrint");
  $btnPrint.addEventListener("click", () => {
    window.print();
  });

  </script> -->


  <!-- Script for Setting Payment Receipt Form  -->
  <script type="text/javascript">
      $(document).ready(function() {
          $('#salesTable').DataTable({
              "info": false,
              "responsive": true,
              "order": [
                  [0, "ascd"]
              ],
              "columnDefs": [{
                  "targets": [0,10,11],
                  "visible": false,
                  "searchable": false
              }]
          });

          var table = $('#salesTable').DataTable();

          $('#salesTable tbody').on('dblclick', 'tr', function() {
              var data = table.row(this).data();
              document.getElementById("id_r").value = data[0];
              document.getElementById("billNo_r").value = data[1];
              document.getElementById("custName_r").value = data[2];
              document.getElementById("custNum_r").value = data[3];
              document.getElementById("processedBy_r").value = data[4];
              document.getElementById("billDate_r").value = data[5];
              document.getElementById("amountPaid_r").value = data[6];
              document.getElementById("balance_r").value = data[7];
              document.getElementById("totalItemPrice_r").value = data[8];
              document.getElementById("totalItemQuantity_r").value = data[9];
              document.getElementById("discount_r").value = data[10];
              document.getElementById("vat_r").value = data[11];
              $('#receiptModal').modal('show');
          });
      });

  </script>


  <!-- Script for Setting Up UserTable  -->
  <script type="text/javascript">
      $(document).ready(function() {
          $('#userTable').DataTable({
              "info": false,
              "responsive": true,
              "order": [
                  [0, "desc"]
              ],
              "columnDefs": [{
                  "targets": [0],
                  "visible": false,
                  "searchable": false
              }]
          });

          var table = $('#userTable').DataTable();

          $('#userTable tbody').on('dblclick', 'tr', function() {
              var data = table.row(this).data();
              document.getElementById("userId_v").value = data[0];
              document.getElementById("selectedRole_v").value = data[1];
              document.getElementById("userFirstName_v").value = data[2];
              document.getElementById("userLastName_v").value = data[3];
              document.getElementById("userName_v").value = data[4];
              document.getElementById("userNo_v").value = data[5];
              $("#userEditModal").modal("show");
          });
      });

  </script>


<!-- Script for Setting Up Product Table  -->
<script type="text/javascript">
      $(document).ready(function() {
          $('#product_tb').DataTable({
              "info": false,
              "responsive": true,
              "order": [
                  [0, "desc"]
              ],
              "columnDefs": [{
                  "targets": [0],
                  "visible": false,
                  "searchable": false
              }]
          });

          var table = $('#product_tb').DataTable();

          $('#product_tb tbody').on('dblclick', 'tr', function() {
              var data = table.row(this).data();
              document.getElementById("proId").value = data[0];
              document.getElementById("probcode_v").value = data[1];
              document.getElementById("proName_v").value = data[2];
              document.getElementById("proBrand_v").value = data[3];
              document.getElementById("proDesc_v").value = data[4];
              document.getElementById("proCategory_v").value = data[5];
              document.getElementById("mValue_v").value = data[6];
              document.getElementById("proCost_v").value = data[7];
              document.getElementById("pQuantity_v").value = data[8];
              document.getElementById("discount_v").value = data[9];
              document.getElementById("pUnit_v").value = data[10];
              document.getElementById("supplier_v").value = data[11];
              document.getElementById("manDate_v").value = data[12];
              document.getElementById("expDate_v").value = data[13];
              $("#updateProduct").modal("show");
          });
      });

  </script>


<!-- Script for Fetching Product Quantity Stock to Modal  -->
<script type="text/javascript">
      $(document).ready(function() {
        $(".updateQtyBtn").on('click', function (e) {

            e.preventDefault();

            // var currentDate = new Date(),
            // y = currentDate.getFullYear(),
            // m = currentDate.getMonth(),
            // d = currentDate.getDate();
            
            var updat_id = $(this).attr("id"),
            updat_name = $(this).attr("name");
            $("input#updtProId").val(updat_id);
            // $("input#LastUpdate").val(y + "/" + m + "/" + d);
            $("input#updtProName").val(updat_name);
            
            $("#updateProQtyModal").modal("show");

        });

      });

  </script>


<!-- Script for Setting Up Category Table  -->
<script type="text/javascript">
      $(document).ready(function() {
          $('#category_tb').DataTable({
              "info": false,
              "responsive": true,
              "order": [
                  [0, "desc"]
              ],
              "columnDefs": [{
                  "targets": [0],
                  "visible": false,
                  "searchable": false
              }]
          });

          var table = $('#category_tb').DataTable();

          $('#category_tb tbody').on('dblclick', 'tr', function() {
              var data = table.row(this).data();
              document.getElementById("cateId").value = data[0];
              document.getElementById("cateName_v").value = data[1];
              document.getElementById("cateDesc_v").value = data[2];
              $("#updateCategory").modal("show");
          });
      });

  </script>


<!-- Script for Setting Up Supplier Table  -->
<script type="text/javascript">
      $(document).ready(function() {
          $('#supplier_tb').DataTable({
              "info": false,
              "responsive": true,
              "order": [
                  [0, "desc"]
              ],
              "columnDefs": [{
                  "targets": [0],
                  "visible": false,
                  "searchable": false
              }]
          });

          var table = $('#supplier_tb').DataTable();

          $('#supplier_tb tbody').on('dblclick', 'tr', function() {
              var data = table.row(this).data();
              document.getElementById("supId").value = data[0];
              document.getElementById("supplierName_v").value = data[1];
              document.getElementById("supplierLoc_v").value = data[2];
              document.getElementById("supplierNum_v").value = data[3];
              document.getElementById("supplierRate_v").value = data[4];
              $("#updateSupplier").modal("show");
          });
      });

  </script>
  


  <!-- Scripts for Deleting User -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".user_delBtn").on('click', function (e) {

          e.preventDefault();
          var user_id = $(this).attr("id");
          if (confirm("You Are About to Delete User...")) {
              $.post('/emart/src/processphp/delete_user.php', {
                  user_id: user_id
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Restoring User -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".user_RestBtn").on('click', function (e) {

          e.preventDefault();
          var user_idH = $(this).attr("id");
          if (confirm("You are About to Restore User?")) {
              $.post('/emart/src/processphp/delete_user.php', {
                  user_idH: user_idH
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>

  <!-- Scripts for Deleting Product -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deletePro").on('click', function (e) {

          e.preventDefault();
          var pro_id = $(this).attr("id");
        //   console.log(pro_id)
          if (confirm("You Are About to Delete Product...")) {
              $.post('/emart/src/processphp/delete_product.php', {
                  pro_id: pro_id
              }, function (data) {
                  console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Restoring Product -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deleteProH").on('click', function (e) {

          e.preventDefault();
          var pro_idH = $(this).attr("id");
          if (confirm("You are About to Restore Product?")) {
              $.post('/emart/src/processphp/delete_product.php', {
                  pro_idH: pro_idH
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Deleting Product Permanently -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".clearProHistory").on('click', function (e) {

          e.preventDefault();
          var clrProHis = $(this).attr("id");
          if (confirm("This Will Delete Trash...")) {
              $.post('/emart/src/processphp/delete_product.php', {
                  clrProHis: clrProHis
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>

  <!-- Scripts for Deleting Category -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deleteCate").on('click', function (e) {

          e.preventDefault();
          var cat_id = $(this).attr("id");
          if (confirm("You Are About to Delete Category...")) {
              $.post('/emart/src/processphp/delete_category.php', {
                  cat_id: cat_id
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Restoring Category -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deleteCateH").on('click', function (e) {

          e.preventDefault();
          var cat_idH = $(this).attr("id");
          if (confirm("Are You are About to Restore Category?")) {
              $.post('/emart/src/processphp/delete_category.php', {
                  cat_idH: cat_idH
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Deleting Category Permanently -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".clearCateHistory").on('click', function (e) {

          e.preventDefault();
          var clrCatHis = $(this).attr("id");
          if (confirm("This Will Delete Trash...")) {
              $.post('/emart/src/processphp/delete_product.php', {
                  clrCatHis: clrCatHis
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>

  <!-- Scripts for Deleting Supplier -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deleteSup").on('click', function (e) {

          e.preventDefault();
          var sup_id = $(this).attr("id");
          if (confirm("You Are About to Delete Supplier...")) {
              $.post('/emart/src/processphp/delete_supplier.php', {
                  sup_id: sup_id
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Restoring Supplier -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".deleteSupH").on('click', function (e) {

          e.preventDefault();
          var sup_idH = $(this).attr("id");
          if (confirm("You are About to Restore Supplier?")) {
              $.post('/emart/src/processphp/delete_supplier.php', {
                  sup_idH: sup_idH
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>
  <!-- Scripts for Deleting Supplier Permanently -->
  <script type="text/javascript">
  $(document).ready(function () {
      $(".clearSupHistory").on('click', function (e) {

          e.preventDefault();
          var clrSupHis = $(this).attr("id");
          if (confirm("This Will Delete Trash...")) {
              $.post('/emart/src/processphp/delete_product.php', {
                  clrSupHis: clrSupHis
              }, function (data) {
                console.log(data);
                    var data = JSON.parse(data);
                    if (data.ermySuc) {
                        alert(data.ermyNote);
                    } else if (data.ermySuc == "data") {
                        alert(data.ermyNote);
                    } else {
                        alert(data.ermyNote);
                    }
              });
          }

      });   
  });  
  </script>

  









</body>

</html>