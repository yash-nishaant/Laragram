<template>
    <div>
        <button type="button" @click="likePost" class="btn btn-light">
            <i :class="[status ? 'fa fa-heart fa-lg' : 'fa fa-heart-o fa-lg', 'fa']" id="heart"></i> <span class="likecount"><strong>{{count}}</strong></span>
        </button>
    </div>
</template>

<script>
export default {
    props: ['postId','likeCount','hasLiked'],
    data() {
        return {
            status: this.hasLiked,
            count: this.likeCount
        }
    },
    methods: {
        likePost()
        {
            axios.get('/p/'+this.postId+'/like')
            .then(resonse =>{
                this.status = ! this.status;
                if (!this.status)
                    this.count--;
                else{
                    this.count++;
                }
            }); 
        }
    }
}
</script>

<style>
    #heart{
        color: rgb(167, 21, 21); 
    }
</style>
