
<script>
  $('#search').hide();
  function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("example");
  if (table) {
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
};
}
  function msg(x, id){
            // alert(x);
            $('#accountName').val(x);
            $('#accountId').val(id);
    }
</script>

<script>
   $('.loading').modal('hide');
      function navigate(action){
      // alert(action);
      $('.loading').modal('show');
      $('#con').load('<?php echo base_url()."satisfood/";?>'+action);
      // $("#loading").hide();
      }
</script>
<script>
$(document).on('click',function(){
  $('#collapseTwo').collapse('hide');
})

function collapseEdit(){
  $('.collapse').collapse('hide');
}

function update(params){
  alert(params);
}
</script> 