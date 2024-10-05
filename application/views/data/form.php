    <section class="w-1/2">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-center">Entry Data</h2>
                </div>
                <div>
                <a href="<?php echo base_url().'Data/index';  ?>" class='bg-red-500 hover:bg-red-600 text-black font-bold py-1 px-2 rounded'>Cancel</a>
                </div>
            </div>
            <form action="#" method="POST">
                <input type="hidden" name="id" id="id">
                <div>
                    <label class="block text-gray-700">Title</label>
                    <input type="string" name="title" id="title" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>
                
                <div class="mt-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea name="desc" id="desc" rows="5" type="string" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required></textarea>
                </div>

                <button id="submit" type="button" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6"><?php echo ($type == "create" ? "Create" : "Update") ?></button>
            </form>
        </div>
    </section>

    <?php if($type == "edit") { ?>
        <script>
        
        $(window).on('load', function(){
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('api/data/detail/').$id; ?>",
                headers: {
                    "Authorization": localStorage.getItem("token")
                },
                dataType : "JSON",
                success: function(data){
                    if(data.code < 300)
                    {
                        let response = data.data;
                        document.getElementById("id").value = response.id;
                        document.getElementById("title").value = response.title;
                        document.getElementById("desc").value = response.description;
                    }
                    else
                    {
                        console.log(data);
                        alert(data.message);
                    }
                }
            });
        })

        </script>
    <?php } ?>

    <script>
    $(document).ready(function(){
      $('#submit').on('click',function(){
        $.ajax({
            "headers": {
                "Authorization": localStorage.getItem("token")
            },
            type : "POST",
            url  : "<?php echo ($type == 'create' ? base_url('api/data/create') : base_url('api/data/update/').$id ); ?>",
            dataType : "JSON",
            data : {
                title:$('#title').val(),
                description:$('#desc').val(),
            },
            success: function(data){
                if(data.code < 300)
                {
                    window.location.replace("<?php echo base_url('Data/index')?>");
                }
                else
                {
                    alert('error ' + data.message);
                }
            }
        });
      });
    });
  </script>