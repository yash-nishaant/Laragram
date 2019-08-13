<template>
    <div>  
        <section class="mb-3">
            <form class="input-group" @submit.prevent="postComment">
                <textarea class="form-control" rows="1" type="text" name="body" v-model="commentBox" placeholder="Type your comment..."></textarea>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Post</button>
                </div>
            </form>
            <div class="text small" style="font-weight: bold;">{{commentslist.length}} {{'comment' | pluralize(commentslist.length)}}</div>
        </section>
        <section>
            <ul>    
                <li class="list-group-item" v-for="comment in commentslist" v-bind:key="comment.id">
                    <span class="font-weight-bold"> 
                        <a>
                            <span class="text-dark">{{comment.user_username}} </span>
                        </a>
                    </span> {{ comment.body }}  
                    <div><span class="text small">{{comment.created_at}}</span></div>
                </li>
            </ul>
        </section>
    </div>
</template>

<script>
    export default{
        props: ['userId', 'postId',],
        
        mounted(){
            this.getComments();
        },

        data: function() {
            return {
                commentslist:{},
                commentBox:'', 
            }
        },
        methods: {
            getComments() {
                axios.get('/p/'+this.postId+'/comments')
                    .then((response) => {
                        this.commentslist = response.data
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },
            postComment() {
                axios.post('/p/'+this.postId+'/comment', {
                    body: this.commentBox
                })
                .then((response) => {
                    this.commentslist.unshift(response.data);
                    this.getComments();
                    this.commentBox = '';
                })
                .catch(function(error) {
                    console.log(error);
                });
            },   
        },    
    }
</script>