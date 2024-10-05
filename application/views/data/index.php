    <section>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-center">Data List</h2>
                </div>
                <div>
                    <a href="<?php echo base_url().'Data/form/create/new';  ?>" class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded'>Add</a>
                </div>
            </div>
            <table id="dataTable" class="display w-full">
                <thead>
                    <tr>
                        <th class="text-left">ID</th>
                        <th class="text-left">Title</th>
                        <th class="text-left">Description</th>
                        <th class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </section>

    <script>
        window.onload = loaddata;
        var table;

        function loaddata()
        {
            table = $('#dataTable').DataTable({
                ajax: {
                    "headers": {
                        "Authorization": localStorage.getItem("token")
                    },
                    // type:"GET",
                    url: "<?php echo base_url('api/data/index'); ?>",
                    // data: function (d) {
                    //     console.log(d);
                    // },
                    dataSrc: 'data',
                },
                columns: [ 
                    {
                        "sName": "Index",    
                        "render": function (data, type, row, meta) {
                                    return meta.row + 1; // This contains the row index
                        }
                    },
                    { data: 'title' },
                    { data: 'description' },
                    {
                        mData: null,
                        "bSortable": false,
                        "mRender": function(data, type, response) {
                            return '<a href="<?php echo base_url("Data/form/edit/"); ?>'+ response.id[0]+'" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-1 px-2 rounded">Edit</a>';
                        }
                    },
                    {
                        mData: null,
                        "bSortable": false,
                        "mRender": function(data, type, response) {
                            return "<button id='hapus' onclick='hapusData("+response.id[0]+")' class='bg-red-500 hover:bg-red-800 text-white font-bold py-1 px-2 rounded'>Delete</button>";
                        }
                    }
                ],
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 5,
            });

            return table;
        }

        function hapusData(id){
            console.log(table);
            if (confirm("Are you sure want to delete the Data ?") == true) 
            {
                var url = "<?php echo base_url('api/data/delete/')?>" + id;
                $.ajax({
                    type : "GET",
                    "headers": {
                            "Authorization": localStorage.getItem("token")
                        },
                    url  : url,
                    dataType : "JSON",
                    success: function(data){
                        if(data.code < 300)
                        {
                            table.destroy();
                            loaddata();
                        }
                        else
                        {
                            console.log(data.message);
                            alert("Error while processing data");
                        }
                    }
                });
            }
        }

        // table
        //     .on('order.dt search.dt', function () {
        //         let i = 1;
        
        //         table
        //             .cells(null, 0, { search: 'applied', order: 'applied' })
        //             .every(function (cell) {
        //                 this.data(i++);
        //             });
        //     })
        //     .draw();
    </script>