<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color:#fff"> Add New Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Photo</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in allpost">
                                    <td>{{index+1}}</td>
                                    <td v-if="post.user">{{post.user.name}}</td>
                                    <td v-if="post.category">{{post.category.cat_name}}</td>
                                    <td>{{post.title | sortlength(20,"......")}}</td>
                                    <td>{{post.description |  sortlength(40,"......")}}</td>
                                    <td><img :src="ourImage(post.photo)" width="40" height="50"></td>
                                    <td>
                                        <router-link :to="`/edit-post/${post.id}`">Edit</router-link>
                                        <a href="" @click.prevent = "deletePost(post.id)" >Delete</a>

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
           this.$store.dispatch('getAllPost')
        },
        computed:{
             allpost(){
                 return this.$store.getters.getAllPost
             }
        },
        methods:{
               ourImage(img){
                   return "uploadimage/"+img;
               },
               deletePost(id){
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
                axios.get('/post/'+id).then(() => {
                 
                    swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                 //Fire.$emit('AfterCreate');
                  return this.$store.dispatch("getAllPost")

                }).catch(() => { 
                 swal.fire("Failed","There was something wrong","Warning");
                });
                }
            })
               }
        }
    }
</script>
