<template>
    <div>
        <section class="content m-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                            <div class="card-tools">
                                <router-link to="/add-category"  class="btn btn-success">Add Category</router-link>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(category,index) in getAllCategory" :key="category.id">
                                    <td>{{index+1}}</td>
                                    <td>{{category.cat_name}}</td>
                                    <td>{{category.created_at | timeformat}}</td>
                                        <td>
                                            <router-link :to="`/edit-category/${category.id}`" class="btn btn-sm btn-primary">Edit</router-link>
                                            <a href="" @click.prevent = "deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
            getAllCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{
            deleteCategory(id){
                axios.get('/category/'+id)
                    .then(()=>{
                            this.$store.dispatch("allCategory")
                        toast.fire({
                            type: 'success',
                            title: 'Category Deleted successfully'
                        })
                    })
                // console.log(id);
            }
        }
    }
</script>

<style>

</style>