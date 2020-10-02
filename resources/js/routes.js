export const routes = [
    
    { path: '/home', component: require('./components/admin/AdminHome.vue').default },
    { path: '/category-list', component: require('./components/admin/Category/List.vue').default },
    { path: '/add-category', component: require('./components/admin/Category/New.vue').default },
    { path: '/edit-category/:categoryid', component: require('./components/admin/Category/Edit.vue').default },
    { path: '/post-list', component: require('./components/admin/post/List.vue').default },
    { path: '/add-post', component: require('./components/admin/post/New.vue').default },
    { path: '/edit-post/:postid', component: require('./components/admin/post/Edit.vue').default },

    //{ path: '/bar', component: Bar }
    //public route
    { path: '/', component: require('./components/public/PublicHome.vue').default },
    { path: '/blog', component: require('./components/public/blog/BlogPost.vue').default },
    { path: '/blog/:id', component: require('./components/public/blog/SingleBlog.vue').default },
    { path: '/categories/:id', component: require('./components/public/blog/BlogPost.vue').default },
    

]