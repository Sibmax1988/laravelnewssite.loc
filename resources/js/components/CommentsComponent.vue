<template>
    <div>
        <h2 class="comments">{{comment}}</h2>

        <input type="text"
               class="form-control-lg col-lg-4"
               id="commentator" name="commentator"
               :placeholder=placeholderNameCommentator
               v-model="commentatorName" >

        <a @click="publicComment" class="btn btn-info"> Комментировать</a>
        <br>
        <textarea class="commentText form-control-lg col-lg-4"
                  id="comments" name="comments"
                 :placeholder=placeholderTextComment
                  v-model="textComment">
        </textarea>


        <div>
            <div class="card bg-light mb-3 col-lg-4 border-info"  >
                <div v-for="comment in comments">
                    <h6 class="card-title text-left">{{comment.commenterName }}: </h6>
                    <p class="card-text text-left">{{ comment.commentText }}</p>
                    <h6 class="card-title text-left">{{ comment.created_at }} </h6>
                    <hr>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            'newsId',
            'comment',
        ],
        data: function() {
            return {
                placeholderNameCommentator: 'Введите_имя...',
                placeholderTextComment: 'Оставьте_ваш_комментарий...',
                commentatorName: "",
                textComment:"",
                token: '{{ csrf_token() }}',
                comments: [],
            }
        },
        mounted() {
            this.getComment();
        },
        methods: {

            publicComment: function () {
                if (!this.commentatorName || !this.textComment){
                    alert("Представьтесь и напишите свой комментарий");
                    return true;
                }

                axios.post('publishComment', {commentatorName: this.commentatorName,
                                        textComment: this.textComment,
                                        newsId: this.newsId})
                    .then(response => {
                        this.comments = response.data;
                    } );

                this.commentatorName="";
                this.textComment="";
            },

            getComment: function () {
                axios.post ('getComment', {
                    newsId: this.newsId}).
                then(response => {
                    this.comments = response.data;
                });
            },
        }

    }
</script>

