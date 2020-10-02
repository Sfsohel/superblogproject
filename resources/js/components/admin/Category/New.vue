<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <br/>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form"  @click.prevent="addCategory">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Add New Category</label>
                                    <input type="text" class="form-control" id="categoryId" placeholder="Add New Category" name="cat_name" 
                                    v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        data () {
         return {
            form: new Form({
                cat_name: '',
               
               
            })
         }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          addCategory() {
             this.form.post('/add-category')
                .then(()=>{
                   this.$router.push('/category-list')
                   toast.fire({
                        icon: 'success',
                        title: 'User Created in successfully'
                    })
                })
                .catch(()=>{
                   console.log('data not added');

                })
               
           },
         
         }
    }
</script>
