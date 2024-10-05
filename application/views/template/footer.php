    <script>
        $(window).on('load', function(){
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('api/verify')?>",
                headers: {
                    "Authorization": localStorage.getItem("token")
                },
                dataType : "JSON",
                success: function(data){
                    if(data.code > 300)
                    {
                        localStorage.clear();
                        window.location.replace("<?php echo base_url('Auth/indexLogin')?>");
                    }
                }
            });
        })
    </script>

<script>
    $(document).ready(function(){
      $('#logout').on('click',function(){
        $.ajax({
            type : "GET",
            "headers": {
                    "Authorization": localStorage.getItem("token")
                },
            url  : "<?php echo base_url('api/logout')?>",
            dataType : "JSON",
            success: function(data){
                if(data.code < 300)
                {
                    localStorage.clear();
                    window.location.replace("<?php echo base_url('Auth/indexLogin'); ?>");
                }
                else
                {
                    console.log(data.message);
                    alert("Error while processing data");
                }
            }
        });
      });
    });
  </script>
</body>
</html>