<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" @keyup="RealSearch" type="text" v-model="keyword" class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">

                 <li v-for="category in allcategories"><i class="icon-angle-right"></i><router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link><span> (20)</span></li>
                
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li v-for="(post,index) in blogpost" v-if="index<5">
                    <img :src="`uploadimage/${post.photo}`" class="pull-left" alt="" width="65" height="65" margin=" 0px 15px 15px 0px">
                    <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
                    <p>
                     {{post.description | sortlength(200,"....")}}
                    </p>
                  </li>
                 
                  
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
          </div>
    </span>
</template>

<script>
   import _ from 'lodash'

    export default {
      data(){
         return {
           keyword:''
         }
      },
        mounted() {
             this.$store.dispatch('getblogPost');
             this.$store.dispatch('allcategories');
        },
        computed:{
         allcategories(){
                return this.$store.getters.allcategories;
            },
         blogpost(){
                return this.$store.getters.getblogPost
            }
        },
        methods:{
              RealSearch:_.debounce(function () {
                this.$store.dispatch('SearchPost',this.keyword);
            },2000)
        },
    }
</script>
