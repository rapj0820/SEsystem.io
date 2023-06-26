$(document).ready(function(){
    var gr_lv = $("#filter_glvl").val();
    var invtype = $("#invtype").val();
    displayData(invtype, gr_lv);

  });

  //filter function
  $(document).on('change', "#filter_glvl", function(){
    var gr_lvv = $(this).val();
    var invtypee = $("#invtype").val();
    displayData(invtypee, gr_lvv);

  });
    


  //display table with filter
  function displayData(type, grade){
    $.ajax({
        url:"display/display_lm.php",
        type:'post',
        data:{
          inv_type:type,
          grade_lvl:grade
        },
        success:function(data,status){
          $('#filter_glvl').val(grade);
          $('.table').html(data);
        }
    });
  }

  //open add modal
  function btn_add_lm(){
    $("#add_lm").modal('show');
  }
  
  //add material
  $("#lerningM").submit(function(e){
    e.preventDefault();
    var article = $("#article").val();
    var description = $("#description").val();
    var propnum = $("#propnum").val();
    var d_acquire = $("#d_acquire").val();
    var unitmeasure = $("#unitmeasure").val();
    var unitvalue = $("#unitvalue").val();
    var q_propcard = $("#q_propcard").val();
    var q_physical = $("#q_physical").val();
    var so_quantity = $("#so_quantity").val();
    var so_value = $("#so_value").val();
    var remark = $("#remark").val();
    var gr = $("#gradelevel").val();
    var material_typ = $("#invtype").val(); 

      $.ajax({
          url:"add/addlm.php",
          type:'post',
          data:{
            article:article,
            description:description,
            propnum:propnum,
            d_acquire:d_acquire,
            unitmeasure:unitmeasure,
            unitvalue:unitvalue,
            q_propcard:q_propcard,
            q_physical:q_physical,
            so_quantity:so_quantity,
            so_value:so_value,
            remark:remark,
            gr:gr,
            material_typ:material_typ,
            addLM:1
          },
          success:function(data,status){
            // alert(fname+password+uname+stat+ ulvl)
            //alert(data);
            if(data == 'Success!'){
              $("#add_close").click();
              // $('#add_lm').modal('hide');
              $("#alertSuccess").modal('toggle');
              displayData(material_typ, gr);
              
            }else{
              alert(data);
              $("#alertNotSave").modal('toggle');
            }
            
          }
      });  
  });

  //update material
  $("#update_lerningM").submit(function(e){
    e.preventDefault();
    var u_num = $("#update_number").val();
    var u_article = $("#update_article").val();
    var u_description = $("#update_description").val();
    var u_propnum = $("#update_propnum").val();
    var u_d_acquire = $("#update_d_acquire").val();
    var u_unitmeasure = $("#update_unitmeasure").val();
    var u_unitvalue = $("#update_unitvalue").val();
    var u_q_propcard = $("#update_q_propcard").val();
    var u_q_physical = $("#update_q_physical").val();
    var u_so_quantity = $("#update_so_quantity").val();
    var u_so_value = $("#update_so_value").val();
    var u_remark = $("#update_remark").val();
    var u_gr = $("#update_gradelevel").val();
    var u_material_typ = $("#invtype").val(); 

      $.ajax({
          url:"update/update_m.php",
          type:'post',
          data:{
            article:u_article,
            description:u_description,
            propnum:u_propnum,
            d_acquire:u_d_acquire,
            unitmeasure:u_unitmeasure,
            unitvalue:u_unitvalue,
            q_propcard:u_q_propcard,
            q_physical:u_q_physical,
            so_quantity:u_so_quantity,
            so_value:u_so_value,
            remark:u_remark,
            gr:u_gr,
            material_type:u_material_typ,
            updateM:u_num
          },
          success:function(data,status){
            // alert(fname+password+uname+stat+ ulvl)
            if(data == 'Success!'){
              $("#update_close").click();
              // $('#add_lm').modal('hide');
              $("#alertSuccess").modal('toggle');
              displayData(u_material_typ, u_gr);
              $("#filter_glvl").val(u_gr);
            }else{
              alert(data);
              $("#alertNotSave").modal('toggle');
            }
            
          }
      }); 

  });

  $(document).on('keyup', '#unitvalue', function(){
    if($("#so_quantity").val() != ""){
      $("#so_value").val($(this).val() * $("#so_quantity").val());
    }
  });
  $(document).on('keyup', '#so_quantity', function(){
    if($("#unitvalue").val() != ""){
      $("#so_value").val($(this).val() * $("#unitvalue").val());
    }
  });

 



    //ACTIONS

    function editM(m_id){
      $.post("update/update_m.php",{m_id:m_id},function(data,status){
        var tbl_m = JSON.parse(data);
        $("#update_number").val(tbl_m.lm_id);
        $("#update_article").val(tbl_m.lm_article);
        $("#update_description").val(tbl_m.lm_description);
        $("#update_propnum").val(tbl_m.lm_propnum);
        $("#update_d_acquire").val(tbl_m.lm_aquire);
        $("#update_unitmeasure").val(tbl_m.lm_unitm);
        $("#update_unitvalue").val(tbl_m.lm_unitv);
        $("#update_q_propcard").val(tbl_m.lm_q_propertycard);
        $("#update_q_physical").val(tbl_m.lm_q_physical);
        $("#update_so_quantity").val(tbl_m.lm_so_quantity);
        $("#update_so_value").val(tbl_m.lm_so_value);
        $("#update_remark").val(tbl_m.lm_remark);
        $("#update_gradelevel").val(tbl_m.grade_lvl);
        $("#update_lm").modal('toggle');
    });
  }
  function deleteM(m_id){
    var invtype = $("#invtype").val();
    var gr_lv = $("#filter_glvl").val();
    $("#ConfirmDelete").modal('toggle');
    $("#delete_yes").click(function(){
      $.ajax({
        url:"delete/deleteM.php",
        type:'post',
        data:{
          materialID:m_id
        },
        success:function(data,status){
          displayData(invtype, gr_lv);
          $("#filter_glvl").val(gr_lv);
          $("#ConfirmDelete").modal('hide');
          $("#alertDeleteSuccess").modal('toggle');
        }
      });
    });
  }

    //end of actions

  //accept only nunmber and validate
  function onlyNumberKey(evt) {
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 46 || ASCIICode > 57 || ASCIICode == 47))
        return false;
    return true;
  }
  //log out
  $("#signout").click(function (){
    $('#ConfirmLogout').modal('toggle');
    $('#logout_yes').click(function(){
      window.location.href = "../logout.php";
    });
  });