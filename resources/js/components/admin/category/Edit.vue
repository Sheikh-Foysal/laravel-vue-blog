<template>
    <div>
        <div class="card card-default m-5">
              <div class="card-header">
                <h3 class="card-title">Edit Category id is {{ this.$route.params.categoryid }}</h3>
                  <div class="card-tools">
                      <router-link to="/category-list"  class="btn btn-success">Back</router-link>
                  </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryname">Category Name</label>
                    
                        <input type="text" class="form-control" id="categoryId" placeholder="Edit Category" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                        <has-error :form="form" field="cat_name"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
    </div>
</template>

<script>
 export default {
        name: "Edit",
        mounted(){
            axios.get(`/editcategory/${this.$route.params.categoryid}`)
                .then((response)=>{
                    this.form.fill(response.data.category)
                })
        },
        data(){
            return {
                form: new Form({
                    cat_name:''
                })
            }
        },
        methods:{
            addCategory(){
                this.form.post('/add-category')
                    .then((response)=>{
                       this.$router.push('/category-list')
                        toast.fire({
                            type: 'success',
                            title: 'Category Added successfully'
                        })
                    })
                    .catch(()=>{
                    })
            }
        }
    }
</script>

<style>

</style>
