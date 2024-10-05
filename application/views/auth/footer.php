    <?php if($this->uri->uri_string() == 'Auth/indexLogin') { ?>

    <script>
      $(document).ready(function(){
        $('#login').on('click',function(){
          console.log('proses login')
            var password=$('#password').val();
            if(password.length == 0)
            {
              alert('insert password first');
            }
            else
            {
              $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url('api/login')?>",
                  dataType : "JSON",
                  data : {
                    user:$('#user').val(),
                    password:$('#password').val(),
                  },
                  success: function(data){
                    switch(data.code){
                      case 205:
                      {
                        localStorage.clear();
                        console.log(data.data);
                        console.log(data.data[0]);
                        let response = data.data[0];
                        /* 
                        $obj->id = $getuser->id;
                        $obj->name = $getuser->name;
                        $obj->email = $getuser->email;
                        $obj->username = $getuser->username;
                        $obj->token = $token;
                        */
                        localStorage.setItem("id", response.id);
                        localStorage.setItem("token", "Bearer " + response.token);
                        window.location.replace("<?php echo base_url('Data/index')?>");
                        break;
                      }
                      default:
                      {
                        alert('error ' + data.message)
                      }
                    }
                  }
              });
            }
        });
      });
    </script>
    <?php } ?>  
  </body>
</html>