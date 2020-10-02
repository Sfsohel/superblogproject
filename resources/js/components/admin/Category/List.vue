<template>
     <div>
        <section class="content">
            <div class="row justify-content-around" >
                
                <div class="col-8 ">
                    <br/>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-category" style="color:#fff"> Add Category</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <select name="" id="" >
                                            <option value="">Select</option>
                                            <option value="">Delete all</option>
                                        </select><br>
                                        <input type="checkbox">
                                        <span >Check All</span>
                                        <span >Uncheck All</span>
                                    </th>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(category,index) in getallCategory" :key="category.id">
                                    <td><input type="checkbox" ></td>
                                    <td>{{index+1}}</td>
                                    <td>{{category.cat_name}}</td>
                                    <td>{{category.created_at | timeformat}}</td>
                                    <td>
                                        <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                                        <a href="" @click.prevent="deletecategry(category.id)">Delete</a>
                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        mounted() {
           // console.log('Component mounted.')
            return this.$store.dispatch("allCategory")
        },
        computed:{
            getallCategory(){
               return this.$store.getters.getCategory
            }
        },
        methods:{
              deletecategry(id){              
                swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                // send request to the server
                axios.get('/category/'+id).then(() => {
                 
                    swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                 //Fire.$emit('AfterCreate');
                  return this.$store.dispatch("allCategory")

                }).catch(() => { 
                 swal.fire("Failed","There was something wrong","Warning");
                });
                }
            })
              
              }
        }
    }
</script>
