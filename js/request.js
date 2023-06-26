$(document).ready(function(){
    var r = $("#filter_req").val();
    displayDatareq(r);

  });
  $("#filter_req").change(function(){
    var r = $(this).val();
    displayDatareq(r);
  });
  function displayDatareq(r){
    $.ajax({
        url:"request/request_material.php",
        type:'post',
        data:{
          r:r
        },
        success:function(data){
        $('.table').html(data);
        }
    });
  }
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


  