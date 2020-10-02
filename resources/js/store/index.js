import Axios from "axios"

export default{
    state: {
        category:[],
        post:[],
        blogpost:[],
        singlepost: [],
        allcategories: [],
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state){
          return state.post
        },
        getblogPost(state) {
            return state.blogpost
        },
        singlepost(state) {
            return state.singlepost
        },
        allcategories(state) {
            return state.allcategories
        },
    },
    
    actions: {
        allCategory(context) {
          Axios.get('/category')
          .then((response) => {
              context.commit('categories',response.data.categories)
          })  
        },
        getAllPost(context){
            Axios.get('/post')
                .then((response) => {
                    context.commit('allposts', response.data.posts)
                })
        },
        getblogPost(context) {
            Axios.get('/blogpost')
                .then((response) => {
                    context.commit('blogpost', response.data.posts)
                })
        },
        getPostById(context, payload) {
            axios.get('/singlepost/' + payload)
                .then((response) => {
                    context.commit('siglePost', response.data.post)
                })
        },
        allcategories(context) {
            axios.get('/categories')
                .then((response) => {

                    context.commit('allcategories', response.data.categories)
                })
        },
        getPostByCatId(context,payload){
            axios.get('/categorypost/'+payload)
            .then((res) =>{
                context.commit('getPostByCatId',res.data.posts)
            })
        },
        SearchPost(context,payload){
              axios.get('/search?s='+payload)
              .then((response) =>{
                  context.commit('getSearchPost', response.data.posts)

              })
        }

    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },
        allposts(state,payload){
            return state.post = payload
        },
        blogpost(state, payload) {
            return state.blogpost = payload
        },
        siglePost(state, payload) {
            return state.singlepost = payload
        },
        allcategories(state, payload) {
            return state.allcategories = payload
        },
        getPostByCatId(state,payload){
            return state.blogpost = payload
        },
        getSearchPost(state,payload){
            return state.blogpost = payload
        }
    }
}