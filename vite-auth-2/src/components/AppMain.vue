<template>
    <main>
        <div>
            <h2>I nostri posts</h2>
        </div>
        <div>
            <ul class="text-white d-flex gap-3 flex-wrap justify-content-center list-unstyled">
                <li class="col-3" v-for="post in posts" :key="post.id">
                    <div class="card-post">
                        <div class="card-header">
                            <strong>{{ post.title }}</strong>
                            <br>
                            {{ post.slug }}

                            <div>
                                User:
                                <span class="text-danger">{{ post.user.name }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="d-flex list-unstyled gap-3 flex-wrap text-primary  ">
                                <li v-for="tag in post.tags" :key="tag.id">
                                    {{ tag.name }}
                                </li>

                            </ul>
                            <ul v-if="post.resource" class="d-flex list-unstyled gap-3 flex-wrap text-danger mt-3">
                                <li>
                                    {{ post.resource.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <ul class="d-flex list-unstyled gap-3 flex-wrap">
                <li :class="n === currentPage ? 'text-danger' : 'text-black'" @click="changePage(n)"
                    v-for="n in lastPage" :key="n">
                    {{ n }}
                </li>
            </ul>
        </div>
    </main>
</template>

<script>

import axios from 'axios';
import { resolveComponent } from 'vue';
// import bootstrap from 'bootstrap';
export default {
    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: null,
            resourceName: {}
        }
    },
    methods: {
        // resource(post){
        //     if(post.resource.name !==null){
        //         this.resourceName = post.resource.name
        //     }else{
        //         this.resourceName = null
        //     }

        // },

        changePage(n) {
            this.currentPage = n
            this.fetchPost()
        },

        fetchPost() {
            axios.get('http://127.0.0.1:8000/api/posts', {
                params: {
                    page: this.currentPage,
                    perPage: 10

                }
            }).then(res => (
                console.log(res.data.results),
                this.posts = res.data.results.data,
                this.lastPage = res.data.results.last_page

            ))
        }


    },
    created() {
        this.fetchPost()
    }
}
</script>

<style lang="scss">
main {
    background-color: aliceblue;
    .card-post {
        height: 320px;
        border: 1px solid black;
        padding: 8px;
        border-radius: 10px;
        background-color: rgb(61, 94, 59);
    }
}
</style>