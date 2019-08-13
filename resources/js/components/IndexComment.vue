<template>
    <div class="card-footer w-100">
        <form class="input-group mb-3" @submit.prevent="postComment">
            <textarea class="form-control" rows="1" type="text" name="body" v-model="commentBox2" placeholder="Type your comment..."></textarea>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Post</button>
            </div>
        </form>
        <div class="success text small" v-if="commentsuccess">{{this.successmessage}}</div>
    </div>
</template>

<script>
    export default{
        props: ['postId',],
        
        mounted(){
            this.getComments();
        },

        data: function() {
            return {
                commentslist:{},  
                commentBox2:'',
                commentsuccess: false,
                successmessage: 'Comment posted!'
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
                axios.post('/comment/'+this.postId, {
                    body: this.commentBox2
                })
                .then((response) => {
                    this.commentslist.unshift(response.data);
                    this.commentsuccess = true;
                    this.commentBox2 = '';
                    
                })
                .catch(function(error) {
                    console.log(error);
                });
            }
        }, 
    }
</script>