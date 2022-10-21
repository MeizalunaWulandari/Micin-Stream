
        
        <script src="<?= site_url('js/jquery-3.6.1.min.js')?>" type="text/javascript"></script>
        <script src="<?= site_url('js/script.js')?>" type="text/javascript"></script>
        <script type="text/javascript">
            

function myFunction() {
  let text;
  let folder_name = prompt("Add new collection:", "");

  $.ajax({
    type : "POST",
    url : "<?= base_url('home/folder') ?>",
    data : {folder_name:folder_name},
    success: function(data){
      location.reload();
    }
  });
}

        </script>
    </body>
</html>